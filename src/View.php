<?php

namespace App;

class View implements Renderable
{
    private $page;
    private $data;

    public function __construct($page, $data = null)
    {
        $this->page = $page;
        $this->data = $data;
    }
    
    public function render()
    {
        $file = VIEW_DIR . '/' . $this->page . '.php';
        if (file_exists($file)) {
            require $file;
        }
    }
}