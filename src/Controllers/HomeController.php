<?php

namespace App\Controllers;

class HomeController
{
    public static function index($page = 1)
    {
        $qtyItems = 10;
        $totalItems = \App\Model\Article::all()->count();
        $data['articles'] = \App\Model\Article::orderBy('created_at', 'desc')->skip(($page - 1) * $qtyItems)->take($qtyItems)->get();
        $data['paginator'] = new \App\Helpers\Paginator($totalItems, $qtyItems, $page);
        return new \App\View('index', $data);
    }

    public static function news($articleId)
    {

        if (!$data['article'] = \App\Model\Article::find($articleId)) {
            return new \App\View('404');
        }
        return new \App\View('detail', $data);
    }

    public static function addComment()
    {
        $comment = new \App\Model\Comment;
        $comment->text = $_POST['comment'];
        $comment->author_id = $_POST['author_id'];
        $comment->article_id = $_POST['article_id'];

        $comment->save();

        return self::news($_POST['article_id']);
    }

    public static function subscribe()
    {
        $sendEmail = $_POST['email'];
        $email = \App\Model\Email::where('email', $sendEmail)->first();

        if (is_null($email)) {
            $email = new \App\Model\Email();
            $email->email = $sendEmail;
        }
        $email->is_subscribe = 1;
        $email->save();
        return self::index();
    }
}