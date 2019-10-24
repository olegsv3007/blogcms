<?php

namespace App\Controllers\Admin;

class ArticleController
{
    public static function index()
    {
        $data['articles'] = \App\Model\Article::get();
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
        $validateInfo = self::validateArticleForm();

        $article['header'] = $_POST['header'];
        $article['content'] = $_POST['content'];
        $article['image'] = $_FILES['image'];
        $article['photos'] = getArrFiles($_FILES['photos']);

        if (isset($validateInfo['errors'])) {
            return self::add($article, $validateInfo);
        }

        self::saveArticle($article);

        return self::index();
    }

    public static function saveArticle($arrArticle)
    {
        $article = new \App\Model\Article;
        $article->header = $arrArticle['header'];
        $article->content = $arrArticle['content'];
        $article->author_id = getUser($_SESSION['email'])->id;

        if ($image = saveFile($arrArticle['image'], APP_DIR . ARTICLE_PHOTOS)) {
            $article->image = $image;
        }

        $article->save();

        foreach ($arrArticle['photos'] as $photo) {
            if ($image = saveFile($photo, APP_DIR . ARTICLE_PHOTOS)) {
                $photo = new \App\Model\Photo;
                $photo->name = $image;
                $photo->article_id = $article->id;
                $photo->save();
            }
        }
    }

    public static function edit()
    {
        return new \App\View('admin\articles\edit');
    }

    private static function validateArticleForm()
    {
        $formValidator = new \App\Helpers\Validator;

        $formValidator->maxLengthValidate('header', $_POST['header'], 255);
        $formValidator->requiredValidate('header', $_POST['header']);

        $mimeTypes = ["image/jpeg", "image/png"];

        if (!$_FILES['image']['error']) {
            $formValidator->validateFile("image", $_FILES['image'], $mimeTypes);
        }

        $photos = getArrFiles($_FILES['photos']);

        foreach ($photos as $photo) {
            if (!$photo['error']) {
                $formValidator->validateFile("photos", $photo, $mimeTypes);
            }
        }

        return $formValidator->getResultValidate();
    }
}