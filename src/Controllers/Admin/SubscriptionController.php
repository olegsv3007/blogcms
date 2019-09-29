<?php

namespace App\Controllers\Admin;

class SubscriptionController
{
    public static function index()
    {
        return new \App\View("admin\subscriptions\index");
    }
}