<?php 

namespace Faerie\Database;

use ReflectionClass;
use Faerie\Constructs\Enum;

class Operations extends Enum 
{
    const where = 'where';
    const whereNot = 'whereNot';
    const orWhere = 'orWhere';
    const orWhereNot = 'orWhereNot';
    const whereIn = 'whereIn';
    const orWhereIn = 'orWhereIn';
    const orWhereNotIn = 'orWhereNotIn';
    const whereBetween = 'whereBetween';
    const orWhereBetween = 'orWhereBetween';
    const whereNull = 'whereNull';
    const whereNotNull = 'whereNotNull';
    const orWhereNotNull = 'orWhereNotNull';

    static function getConstants()
    {
        $oClass = new ReflectionClass(__CLASS__);
        return $oClass->getConstants();
    }
}
