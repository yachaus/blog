<?php

namespace App\Classes\Controllers;

use App\Classes\View\View;

class Error extends Base
{
    protected $message;

    public function __construct(string $message = NULL)
    {
        $this->message = $message;
        $this->view = new View();
    }

    protected function actionMessage()
    {
        $this->view['message'] = $this->message;
        $this->view['content'] = __DIR__ . '/../../templates/exception.php';
        $this->view->display($this->layout);
    }

    protected function actionE404()
    {
        $this->view['content'] = __DIR__ . '/../../templates/404.php';
        $this->view->display($this->layout);
    }
}