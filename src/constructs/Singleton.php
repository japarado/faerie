<?php

namespace Faerie\Constructs;

class Singleton
{
    private static $instance = null;

    private function __construct()
    {
    }

    public static function Instance()
    {
        if (self::$instance == null) {
            self::$instance = new Singleton();
        }

        return self::$instance;
    }
}
