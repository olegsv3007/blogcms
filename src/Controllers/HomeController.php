<?php

namespace App\Controllers;

class HomeController
{
    public static function index($page = 1)
    {
        $itemsPerPage = \App\Helpers\Settings::getInstance()->get("articles_per_page");
        $totalItems = \App\Model\Article::all()->count();
        $data['articles'] = \App\Model\Article::orderBy('created_at', 'desc')->skip(($page - 1) * $itemsPerPage)->take($itemsPerPage)->get();
        $data['paginator'] = new \App\Helpers\Paginator($totalItems, $itemsPerPage, $page);
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
        if (isset($_SESSION['email'])) {
            $comment = new \App\Model\Comment;
            $comment->text = $_POST['comment'];
            $comment->author_id = $_POST['author_id'];
            $comment->article_id = $_POST['article_id'];

            if (userHasRole("Администратор|Контент менеджер")) {
                $comment->is_published = 1;
            }
            
            $comment->save();

            return header("Location: /news/" . $_POST['article_id']);
        }
    }

    public static function subscribe()
    {
        $sendEmail = $_POST['email'];
        $email = \App\Model\Email::where('email', $sendEmail)->first();

        if (is_null($email)) {
            $email = new \App\Model\Email();
            $email->email = $sendEmail;
            $email->unsub_id = uniqid();
        }
        $email->is_subscribe = 1;
        $email->save();

        return header("Location: /");
    }

    public static function unsub($unsub_id)
    {
        $email = \App\Model\Email::where('unsub_id', $unsub_id)->first();
        if ($email) {
            $email->is_subscribe = 0;
            $email->save();
        }

        return header("Location: /");
    }
}