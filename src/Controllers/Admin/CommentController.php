<?php

namespace App\Controllers\Admin;

class CommentController
{
    public static function index($page = 1)
    {
        if ((int)$page == 0) {
            $page = 1;
        }

        $_SESSION['qty_items'] = isset($_POST['qty_items']) ? $_POST["qty_items"] : (isset($_SESSION['qty_items']) ? $_SESSION['qty_items'] : 20);
        $_SESSION['view_state'] = isset($_POST['view_state']) ? $_POST["view_state"] : (isset($_SESSION['view_state']) ? $_SESSION['view_state'] : "%");
        $quantityItemsPerPage = $_SESSION['qty_items'];
        $data['view_state'] = $_SESSION['view_state'] ?? '%';

        $totalItems = \App\Model\Comment::where('is_published', $data['view_state'])->count();

        $data['paginator'] = new \App\Helpers\Paginator($totalItems, $quantityItemsPerPage, $page);
        $data['comments'] = \App\Model\Comment::where('is_published', 'LIKE', $data['view_state'])->skip(($page - 1) * $quantityItemsPerPage)->take($quantityItemsPerPage)->get();

        return new \App\View("admin\comments\index", $data);
    }

    public static function changeStatus()
    {
        $commentId = $_POST['id'];
        $comment = \App\Model\Comment::find($commentId);
        $comment->is_published = $comment->is_published ? 0 : 1;
        $comment->save();

        return self::index();
    }

    public static function delete()
    {
        $commentId = $_POST['id'];
        $comment = \App\Model\Comment::find($commentId);
        $comment->delete();

        return self::index();
    }
}