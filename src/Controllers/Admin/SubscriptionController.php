<?php

namespace App\Controllers\Admin;

class SubscriptionController
{
    public static function index($page = 1)
    {
        if ((int)$page == 0) {
            $page = 1;
        }
        $_SESSION['qty_items'] = isset($_POST['qty_items']) ? $_POST["qty_items"] : (isset($_SESSION['qty_items']) ? $_SESSION['qty_items'] : 20);
        $quantityItemsPerPage = $_SESSION['qty_items'];
        $totalItems = \App\Model\Email::all()->count();
        if ($quantityItemsPerPage == "Все") {
            $quantityItemsPerPage = $totalItems;
        }
        $data['emails'] = \App\Model\Email::skip(($page - 1) * $quantityItemsPerPage)->take($quantityItemsPerPage)->get();
        $data['paginator'] = new \App\Helpers\Paginator($totalItems, $quantityItemsPerPage, $page);

        return new \App\View("admin\subscriptions\index", $data);
    }

    public static function change()
    {
        if (isset($_POST['id'])) {
            $email = \App\Model\Email::find($_POST['id']);
            if ($email) {
                $email->is_subscribe = $email->is_subscribe ? 0 : 1;
                $email->save();
            }
        }
        return self::index();
    }
}