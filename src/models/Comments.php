<?php 

namespace Faerie\Models;

use Faerie\Models\Model;
use Faerie\Models\Posts;

class Comments extends Model
{
    public static $table = 'comments';
    public static $pk = 'comment_ID' ;

    public function post()
    {
        return $this->belongsTo(Posts::$table, 'comment_post_ID', 'ID');
    }
}
