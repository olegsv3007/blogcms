<?php

namespace App\Controllers\Admin;

class StaticController
{
    public static function index($page = 1)
    {
        if ((int)$page == 0) {
            $page = 1;
        }

        $_SESSION['qty_items'] = isset($_POST['qty_items']) ? $_POST["qty_items"] : (isset($_SESSION['qty_items']) ? $_SESSION['qty_items'] : 20);
        $quantityItemsPerPage = $_SESSION['qty_items'];
        $totalItems = \App\Model\Article::all()->count();

        $data['pages'] = \App\Model\Page::skip(($page - 1) * $quantityItemsPerPage)->take($quantityItemsPerPage)->get();
        $data['paginator'] = new \App\Helpers\Paginator($totalItems, $quantityItemsPerPage, $page);
        return new \App\View('admin\statics\index', $data);
    }

    public static function add($page = null, $validateInfo = null)
    {
        $data['page'] = $page;
        $data['validation_info'] = $validateInfo;

        return new \App\View('admin\statics\add', $data);
    }

    public static function addPage()
    {
        $validateInfo = self::validatePageForm();

        $page['filename'] = $_POST['filename'];
        $page['url'] = $_POST['url'];
        $page['name'] = $_POST['name'];
        $page['html'] = $_POST['content'];

        if (isset($validateInfo['errors'])) {
            return self::add($page, $validateInfo);
        }
        self::createPage($page);
        self::savePageToDb($page);
        return self::index();
    }

    private static function createPage($page)
    {
        $file = PAGES_DIR . $page['filename'] . ".php";
        file_put_contents($file, $page['html'], LOCK_EX);
    }

    private static function savePageToDb($pageArr)
    {
        $page = new \App\Model\Page;
        if (isset($pageArr['id'])) {
            $page = \App\Model\Page::find($pageArr['id']);
        }
        $page->filename = $pageArr['filename'];
        $page->url = $pageArr['url'];
        $page->name = $pageArr['name'];

        $page->save();
    }

    private static function validatePageForm()
    {
        $validator = new \App\Helpers\Validator;

        $validator->requiredValidate('filename', $_POST['filename']);
        $validator->requiredValidate('url', $_POST['url']);
        $validator->requiredValidate('name', $_POST['name']);

        return $validator->getResultValidate();
    }

    public static function edit($page, $validateInfo = null)
    {
        $file = PAGES_DIR . $page->filename . ".php";
        $html = file_get_contents($file);
        $page['html'] = $html;
        $data['page'] = $page;
        $data['validation_info'] = $validateInfo;
        return new \App\View('admin\statics\edit', $data);
    }

    public static function updatePage()
    {
        $validateInfo = self::validatePageForm();

        if (isset($validateInfo['errors'])) {
            return self::edit(\App\Model\Page::find($_POST['id']), $validateInfo);
        }

        $page['id'] = $_POST['id'];
        $page['name'] = $_POST['name'];
        $page['url'] = $_POST['url'];
        $page['filename'] = $_POST['filename'];

        self::savePageToDb($page);
        return self::index();
    }

    public static function removePage()
    {
        if (isset($_POST['id']) && $page = \App\Model\Page::find($_POST['id'])) {
            $page->delete();
        }

        return self::index();
    }
}