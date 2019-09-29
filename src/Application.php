<?php

namespace App;

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;

class Application
{
    private $router;

    public function __construct(Router $router)
    {
        $this->router = $router;
        $this->initialize();
    }

    public function run()
    {
        try {
            $result = $this->router->dispatch();
            if ($result instanceof Renderable) {
                $result->render();
            } else if (is_string($result)) {
                echo $result;
            }
        } catch (\App\Exception\NotFoundException $e) {
            $this->renderException($e);
        }
    }

    private function initialize()
    {
        $capsule = new Capsule;

        $capsule->addConnection([
            'driver' => 'mysql',
            'host' => 'localhost',
            'database' => 'cmsdb',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
        ]);

        $capsule->setAsGlobal();
        $capsule->bootEloquent();
    }

    private function renderException(\Exception $e)
    {
        if ($e instanceof Renderable) {
            $e->render();
            return;
        }

        if ($e->getCode == 0) {
            $e->setCode = 500;
        }
        echo "Код ошибки: " . $e->getCode() . ". Текст ошибки: " . $e->getMessage();
    }
}