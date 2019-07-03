<?php

namespace Faerie\Database;

use Pixie\Connection;
use Faerie\Constructs\Singleton;
use Pixie\QueryBuilder\QueryBuilderHandler;

final class Connector extends Singleton
{
    public static $config = [
        'driver' => 'mysql',
        'host' => 'localhost',
        'database' => '',
        'username' => 'root',
        'password' => '',
        'prefix' => ''
    ];

    public static function PixieConnection(string $alias = '')
    {
        if(empty(trim($alias)))
        {
            new Connection(self::$config['driver'], static::$config);
            return;
        }
        else 
        {
            $connection = new Connection(self::$config['driver'], self::$config, $alias);
            return $connection;
        }
    }

    public static function QBInstance(string $alias = '')
    {
        $connection = self::PixieConnection($alias) ;
        $qb = new QueryBuilderHandler($connection);
        return $qb;
    }

    public static function TabledInstance(string $table_name, string $alias = '')
    {
        $qb = self::QBInstance($alias);
        $query = $qb->table($table_name);
        return $query;
    }
}
