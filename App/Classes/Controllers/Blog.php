<?php

namespace App\Classes\Controllers;

use App\Classes\Models\Comment;
use App\Classes\Models\Post;
use App\Classes\Method;

class Blog extends Base
{
    protected function actionShowAll()
    {
        $pagination = Method::Pagination();
        $this->view['page'] = $pagination['page'];
        $this->view['total'] = $pagination['total'];
        $this->view['content'] = __DIR__ . '/../../templates/index.php';
        $this->view['charts'] = Post::getCharts();
        $this->view['posts'] = Post::findAll(
            'ORDER BY date DESC LIMIT ' .
            $pagination['start'] . ', ' . $pagination['num']);
        $this->view->display($this->layout);
    }

    protected function actionPost()
    {
        $this->view['post'] = \App\Classes\Models\Post::findById($_GET['id']);
        if (null == $this->view['post']) {
            throw new \App\Exceptions\E404();
        }
        $this->view['content'] = __DIR__ . '/../../templates/post.php';
        $this->view->display($this->layout);
    }

    public function actionAddComment()
    {
        $this->view['data'] = ['author' => $_POST['author'], 'text' => $_POST['text']];
        if (($_POST['author'] == '') || ($_POST['text'] == '')) {
            $this->view['error'] = 'Fill in all fields';
            $this->view['data'] = ['author' => $_POST['author'], 'text' => $_POST['text']];
        } elseif (!preg_match('/.{2,}/', $_POST['author']) || !preg_match('/.{10,}/', $_POST['text'])) {
            $this->view['error'] = 'Input valid data!';
        } else {
            $news = new Comment();
            $news->fill($_POST);
            $news->insert();
        }
        $this->actionPost();
    }

    public function actionAddPost()
    {
        $this->view['data'] = ['author' => $_POST['author'], 'text' => $_POST['text']];
        if (($_POST['author'] == '') || ($_POST['text'] == '')) {
            $this->view['error'] = 'Fill in all fields';
            $this->view['data'] = ['author' => $_POST['author'], 'text' => $_POST['text']];
        } elseif (!preg_match('/.{2,}/', $_POST['author']) || !preg_match('/.{10,}/', $_POST['text'])) {
            $this->view['error'] = 'Input valid data!';
        } else {
            $news = new Post();
            $news->fill($_POST);
            $news->insert();
        }
        $this->actionShowAll();
    }
}
