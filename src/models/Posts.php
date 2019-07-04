<?php 

namespace Faerie\Models;

use Faerie\Models\Model;
use Faerie\Models\Postmeta;
use Faerie\Models\Comments;

class Posts extends Model
{
    public static $table = 'posts';
    public static $pk = 'ID';

    public function comments()
    {
        return $this->hasMany(Comments::$table, 'comment_post_ID');
    }
}

