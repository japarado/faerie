<?php
use Dotenv\Dotenv;
use Faerie\Database\Connector;

require_once getcwd() . '/vendor/autoload.php';

$dotenv = Dotenv::create(__DIR__);
$dotenv->load();

Connector::Instance();
Connector::$config['database'] = getenv('DB_NAME');
Connector::$config['prefix'] = getenv('DB_PREFIX');

$qb = Connector::QBInstance();
$result = $qb->table('contact_form')->select('*')->get();
foreach($result as $item)
{
    echo $item->id;
}
