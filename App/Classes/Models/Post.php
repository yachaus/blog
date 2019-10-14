<?php

namespace App\Classes\Models;

use App\Classes\Db;

class Post extends Model
{
    const TABLE = 'posts';
    public $id;
    public $text;
    public $author;
    public $date;

    /**
     * Магический метод поиска комментариев
     * @param $key
     * @return Author
     */
    public function __get($key)
    {
        switch ($key) {
            case 'comments' :
                {
                    return Comment::findByPostId($this->id);
                }
                break;
            default :
                return null;
                break;
        }
    }

    public static function getCharts()
    {
        $db = Db::instance();
        $query = '
            SELECT
            COUNT(id) as comments_quantity, post_id
            FROM blog.comments
            GROUP BY post_id
            ORDER BY comments_quantity DESC
            LIMIT 5
        ';
        $res = $db->query($query);
        foreach ($res as $r) {
            $charts[] = Post::findById($r['post_id']);
        }
        return $charts;
    }
}