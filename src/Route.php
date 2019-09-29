<?php

namespace App;

class Route
{
    private $method;
    private $path;
    private $callback;

    public function __construct($method, $path, $callback)
    {
        $this->method = $method;
        $this->path = $this->formatPath($path);
        $this->callback = $this->prepareCallback($callback);
    }

    private function prepareCallback($callback)
    {
        if (! is_callable($callback)) {
            return explode('@', $callback);
        }
        return $callback;
    }

    private function formatPath($path)
    {
        return '/' . trim($path, '/');
    }

    public function getPath()
    {
        return $this->path;
    }

    public function math($method, $uri) : bool
    {
        if (strlen($uri) > 1) {
            $uri = rtrim($uri, '/');
        }
        return ($this->method == $method && preg_match('/^' . str_replace(['*', '/'], ['\w+', '\/'], $this->getPath()) . '$/', $uri));
    }

    public function run($uri)
    {
        if (! is_callable($this->callback)) {
            return;
        }
        $patternWords = array_filter(explode('*', $this->getPath()));
        $pattern = '/^(' . str_replace('/', '\/', implode(')|(', $patternWords)) . ')/';
        $params = preg_split($pattern, $uri, 0, PREG_SPLIT_NO_EMPTY);

        return call_user_func_array($this->callback, $params);
    }
}