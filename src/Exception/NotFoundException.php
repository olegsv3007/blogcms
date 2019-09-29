<?php

namespace App\Exception;

class NotFoundException extends HttpException implements \App\Renderable
{
    public function render()
    {
        echo "Произошла ошибка: " .  $this->message;
    }
}