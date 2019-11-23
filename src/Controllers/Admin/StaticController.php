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
        if ($quantityItemsPerPage == "Все") {
            $quantityItemsPerPage = $totalItems;
        }
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
        $page['filename'] = $_POST['filename'];
        $page['url'] = $_POST['url'];
        $page['name'] = $_POST['name'];
        $page['html'] = str_replace("/r/n", "<br>", $_POST['content']);

        $validateInfo = self::validatePageForm($page);

        if (isset($validateInfo['errors'])) {
            return self::add($page, $validateInfo);
        }
        self::createPage($page);
        self::savePageToDb($page);
        return header("Location: /admin/pages/");
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

    private static function validatePageForm($page)
    {
        $validator = new \App\Helpers\Validator;

        $validator->requiredValidate('filename', $page['filename']);
        $validator->requiredValidate('url', $page['url']);
        $validator->requiredValidate('name', $page['name']);

        return $validator->getResultValidate();
    }

    public static function edit($page, $validateInfo = null)
    {
        $page['html'] = file_get_contents( PAGES_DIR . $page->filename . ".php");
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

        file_put_contents(PAGES_DIR . $page['filename'] . ".php", $_POST['content'], LOCK_EX);
        self::savePageToDb($page);
        return header("Location: /admin/pages/");
    }

    public static function removePage()
    {
        $page = \App\Model\Page::find($_POST['id']);
        if (isset($_POST['id']) && $page) {
            $page->delete();
        }
        if (file_exists(PAGES_DIR . $page->filename . ".php")) {
            unlink(PAGES_DIR . $page->filename . ".php");
        }
        return header("Location: /admin/pages/");
    }
}