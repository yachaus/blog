<?php

namespace App\Classes\Models;

use App\Classes\Models\Model;

class Comment
    extends Model
{
    const TABLE = 'comments';
    public $author;
    public $text;
    public $date;
    public $id;
    public $post_id;

}