<?php

require_once getcwd() . '/vendor/autoload.php';

use Faerie\Models\ContactForm;
use Faerie\Database\Connector;
use Faerie\Models\Posts;
use Faerie\Models\Comments;

Connector::Instance();

function debug($args)
{
    echo "<pre>";
    print_r($args);
    echo "</pre>";
}

Connector::$config = 
    [
        'driver' => 'mysql',
    'host' => 'localhost',
    'database' => 'jnr',
    'username' => 'root',
    'password' => '',
    'prefix' => 'wp_'];


$comment = new Comments();
$comment->setAttrs(Comments::findById(2));
$post = $comment->post();
debug($post);
