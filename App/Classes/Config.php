<?php


namespace App\Classes;


use App\Singleton;

class Config
{
    use Singleton;

    public $data = [
        'db' => [
            'host' => 'localhost',
            'dbname' => 'blog',
            'username' => 'root',
            'passwd' => 'root'
        ]
    ];



}