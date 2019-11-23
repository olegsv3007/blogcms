<?php

namespace App\Controllers\Admin;

class ArticleController
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
        $data['articles'] = \App\Model\Article::skip(($page - 1) * $quantityItemsPerPage)->take($quantityItemsPerPage)->get();
        $data['paginator'] = new \App\Helpers\Paginator($totalItems, $quantityItemsPerPage, $page);
        return new \App\View('admin\articles\index', $data);
    }

    public static function add($article = null, $validateInfo = null)
    {
        $data['article'] = $article;
        $data['validation_info'] = $validateInfo;
        return new \App\View('admin\articles\add', $data);
    }

    public static function addArticle()
    {
        
        $article['header'] = $_POST['header'];
        $article['content'] = $_POST['content'];
        $article['image'] = $_FILES['image'];

        $validateInfo = self::validateArticleForm($article);

        if (isset($validateInfo['errors'])) {
            return self::add($article, $validateInfo);
        }

        $article = self::saveArticle($article);

        foreach(\App\Model\Email::where('is_subscribe', 1)->get() as $email) {
            sendEmail($email->email, $article->header, substr($article->content, 0, 250), $_SERVER['HTTP_HOST'] . "/news/" . $article->id, $_SERVER['HTTP_HOST'] . "/unsub/" . $email->unsub_id);
        }

        return header("Location: /admin/articles/");
    }

    public static function saveArticle($arrArticle)
    {
        if (isset($arrArticle['id'])) {
            $article = \App\Model\Article::find($arrArticle['id']);
        } else {
            $article = new \App\Model\Article;
        }

        $article->header = $arrArticle['header'];
        $article->content = $arrArticle['content'];
        $article->author_id = getUser($_SESSION['email'])->id;

        if ($image = saveFile($arrArticle['image'], APP_DIR . ARTICLE_PHOTOS)) {
            $article->image = $image;
        }

        $article->save();

        return $article;
    }

    public static function edit($article, $validationInfo = null)
    {
        $data['article'] = $article;
        $data['validation_info'] = $validationInfo;

        return new \App\View('admin\articles\edit', $data);
    }

    public static function updateArticle() {
        $article['id'] = $_POST['id'];
        $article['header'] = $_POST['header'];
        $article['content'] = $_POST['content'];
        $article['image'] = $_FILES['image'];

        $validationInfo = self::validateArticleForm($article);

        if (isset($validationInfo['errors'])) {
            return self::edit(\App\Model\Article::find($_POST['id']), $validationInfo);
        }

        self::saveArticle($article);
        return header("Location: /admin/articles/");
    }

    public static function removeArticle()
    {
        if (isset($_POST['id']) && $article = \App\Model\Article::find($_POST['id'])) {
            $article->delete();
        }

        return header("Location: /admin/articles/");
    }

    private static function validateArticleForm($article)
    {
        $formValidator = new \App\Helpers\Validator;

        $formValidator->maxLengthValidate('header', $article['header'], 255);
        $formValidator->requiredValidate('header', $article['header']);

        $mimeTypes = ["image/jpeg", "image/png"];

        if (!$article['image']['error']) {
            $formValidator->validateFile("image", $article['image'], $mimeTypes);
        }

        return $formValidator->getResultValidate();
    }
}