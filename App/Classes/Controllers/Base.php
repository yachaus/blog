<?php

namespace App\Classes\Controllers;

use App\Classes\View\View;

class Base
{
    protected $view;
    protected $layout = __DIR__ . '/../../templates/layout.php';

    public function __construct()
    {
        $this->view = new View();
    }

    public function beforeAction()
    {

    }

    public function action($method)
    {
        $this->beforeAction();
        $methodName = 'action' . $method;
        $this->$methodName();
    }

    public function ctrl()
    {
        $url = $this->url();
        if ('index.php' == $url[0] || '' == $url[0]) {
            $ctrl = '\App\Classes\Controllers\Blog';
        } else {
            $ctrl = '\App\Classes\Controllers\\' . $url[0];
        }
        return $ctrl;
    }

    public function act()
    {
        $url = $this->url();
        if (empty($url[1]) || ($url[1]{0} == '?')) {
            $action = 'ShowAll';
        } elseif (isset($url[1])) {
            $action = $url[1];
        } else {
            $action = $url[1];
        }
        if (isset($url[1]) && 'index.php' == $url[1]) {
            $action = 'ShowAll';
        }
        return $action;
    }

    private function url()
    {
        $url = $_SERVER['REQUEST_URI'];
        $url = str_replace('/', '\\', $url);
        $url = substr($url, 1);
        $url = rtrim($url, '\\');
        $url = explode('\\', $url);
        return $url;
    }
}
