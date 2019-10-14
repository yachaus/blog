<?php

namespace App;

use App\Classes\Models\Post;

/**
 * Функция, которая обрезает строку по словам
 * @param $maxlen int Максимальная длинна текста
 * @param $text string Текст, который нужно обрезать
 * @return string
 */
class Method
{
    public static function cutByWords($maxlen, $text)
    {
        $len = (mb_strlen($text) > $maxlen) ? mb_strripos(mb_substr($text, 0, $maxlen), ' ') : $maxlen;
        $cutStr = mb_substr($text, 0, $len);
        $temp = (mb_strlen($text) > $maxlen) ? $cutStr . '...' : $cutStr;
        return $temp;
    }

    public static function Pagination()
    {
        $num = 5;
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $posts = Post::count();
        $total = intval(($posts - 1) / $num) + 1;
        $page = intval($page);
        if (empty($page) or $page < 0) $page = 1;
        if ($page > $total) $page = $total;
        $start = $page * $num - $num;
        $res = ['num','page','posts','total','start'];
        return compact($res);
    }
}