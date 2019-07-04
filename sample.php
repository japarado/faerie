<?php

require_once getcwd() . '/vendor/autoload.php';

use Faerie\Models\ContactForm;
use Faerie\Database\Connector;

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

$query = Connector::TabledInstance('posts');
$res = $query->join('postmeta', 'postmeta.post_id', '=', 'posts.ID')->where('posts.ID', 7)->get();
debug($res);

/* $submission = new ContactForm(); */
/* $submission->name = "Nicole"; */
/* $submission->email = "admin@admin.com"; */
/* $submission->number = "121212"; */
/* $submission->message = "Faeries"; */
/* $submission->checked = 2; */
/* $submission->save(); */
