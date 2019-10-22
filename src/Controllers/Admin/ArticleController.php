<?php

namespace App\Controllers\Admin;

class ArticleController
{
    public static function index()
    {
        return new \App\View('admin\articles\index');
    }

    public static function add()
    {
        return new \App\View('admin\articles\add');
    }

    public static function addArticle()
    {
        return self::add();
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

        if ($_FILES['image']['name']) {
            $formValidator->validateFile("avatar", $_FILES['image'], $mimeTypes);
        }

        return $formValidator->getResultValidate();
    }
}