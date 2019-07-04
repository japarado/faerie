<?php

require_once getcwd() . '/vendor/autoload.php';

use Faerie\Models\ContactForm;
use Faerie\Database\Connector;

Connector::Instance();

Connector::$config = 
    [
        'driver' => 'mysql',
    'host' => 'localhost',
    'database' => 'jnr',
    'username' => 'root',
    'password' => '',
    'prefix' => 'wp_'];

$submission = new ContactForm();
$submission->name = "Nicole";
$submission->email = "admin@admin.com";
$submission->number = "121212";
$submission->message = "Faeries";
$submission->checked = 2;
$submission->save();
