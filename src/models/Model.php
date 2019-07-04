<?php

namespace Faerie\Models;

use Faerie\Models\ModelInterface;
use Faerie\Database\Connector;

abstract class Model implements ModelInterface
{
    protected static $table;
    protected static $hasTimestamps = false;
    protected static $timestamps = [
        'create' => 'created_at',
        'update' => 'updated_at',
    ];

    protected $pk = 'id';

    public function __set($name, $value)
    {
        if($name == 'atts')
        {
            foreach($value as $attribute => $value)
            {
                $this->$attribute = $value;
            }
        }
        else 
        {
            $class_name = static::class;
            throw new \Exception("Assigning member variale $name to $class_name is not 
                permitted. Assign to +{$class_name}::atts instead");
        }
    }

    protected static $QBInstance = null;

    public static function all()
    {
        return Connector::TabledInstance(static::$table)->select('*')->get();;
    }

    public static function where($key, $operator = null, $value = null)
    {
        if(func_num_args() == 2)
        {
            $value = $operator;
            $operator = '=';
        }

        $result = Connector::TabledInstance(static::$table)->where($key, $operator, $value);
        static::reset();
        return $result;
    }

    public static function whereNot($key, $operator = null, $value = null)
    {
        if(func_num_args() == 2)
        {
            $value = $operator;
            $operator = '=';
        }

        $result = Connector::TabledInstance(static::$table)->whereNot($key, $operator, $value);
        static::reset();
        return $result;
    }

    public static function orWhere($key, $operator = null, $value = null)
    {
        if(func_num_args() == 2)
        {
            $key = $operator;
            $operator = '=';
        }
        $result =  Connector::TabledInstance(static::$table)->orWhere($key, $operator, $value);
        static::reset();
        return $result;
    }

    public static function orWhereNot($key, $operator = null, $value = null)
    {
        if(func_num_args() == 2)
        {
            $value = $operator;
            $operator = '=';
        }
        $result = Connector::TabledInstance(static::$table)->orWhereNot($key, $operator, $value);
        static::reset();
        return $result;
    }

    public static function whereIn($key, array $list)
    {
        $result = Connector::TabledInstance(static::$table)->whereIn($key, $list);
        static::reset();
        return $result;
    }

    public static function orWhereIn($key, array $list)
    {
        $result = Connector::TabledInstance(static::$table)->orWhereIn($key, $list);
        static::reset();
        return $result;
    }

    public static function whereNotIn($key, array $list)
    {
        $result = Connector::TabledInstance(static::$table)->whereNotIn($key, $list);
        static::reset();
        return $result;
    }

    public static function orWhereNotIn($key, array $list)
    {
        $result = Connector::TabledInstance(static::$table)->orWhereNot($key, $list);
        static::reset();
        return $result;
    }

    public static function whereBetween($key, $valueFrom, $valueTo)
    {
        $result = Connector::TabledInstance(static::$table)->whereBetween($key, $valueFrom, $valueTo);
        static::reset();
        return $result;
    }

    public static function orWhereBetween($key, $valueFrom, $valueTo)
    {
        $result = Connector::TabledInstance(static::$table)->orWhereBetween($key, $valueFrom, $valueTo);
        static::reset();
        return $result;
    }

    public static function whereNull($key)
    {
        $result = Connector::TabledInstance(static::$table)->whereNull($key);
        static::reset();
        return $result;
    }

    public static function orWhereNull($key)
    {
        $result = Connector::TabledInstance(static::$table)->orWhereNull($key);
        static::reset();
        return $result;
    }

    public static function whereNotNull($key)
    {
        $result = Connector::TabledInstance(static::$table)->whereNotNull($key);
        static::reset();
        return $result;
    }

    public static function orWhereNotNull($key)
    {
        $result  = Connector::TabledInstance(static::$table)->orWhereNotNull($key);
        static::reset();
        return $result;
    }

    public static function groupBy($key)
    {
        $result = Connector::TabledInstance(static::$table)->groupBy($key);
        static::reset();
        return $result;
    }

    public static function orderBy($key, $order = 'ASC')
    {
        $result = Connector::TabledInstance(static::$table)->orderBy($key, $order);
        static::reset();
        return $result;
    }

    public static function having($key, $operator ='', $value)
    {
        if(func_num_args() == 2)
        {
            $value = $operator;
            $operator = '=';
        }
        $result = Connector::TabledInstance(static::$table)->having($key, $operator, $value);
        static::reset();
        return $result;
    }

    public static function orHaving($key, $operator ='', $value)
    {
        if(func_num_args() == 2)
        {
            $value = $operator;
            $operator = '=';
        }

        $result =  Connector::TabledInstance(static::$table)->orHaving($key, $operator, $value);
        static::reset();
        return $result;
    }

    public static function limit($limit)
    {
        $result = Connector::TabledInstance(static::$table)->limit($limit);
        static::reset();
        return $result;
    }

    public static function offset($offset)
    {
        $result = Connector::TabledInstance(static::$table)->offset($offset);
        static::reset();
        return $result;
    }

    public static function join($table, $key, $operator = null, $value = null, $type = 'inner')
    {
        $result = Connector::TabledInstance(static::$table)->join($table, $key, $operator, $value, $type);
        static::reset();
        return $result;
    }

    public function insert(array $data)
    {
        $result = Connector::TabledInstance(static::$table)->insert($data);
        static::reset();
        return $result;
    }

    public function onDuplicateKeyUpdate($dataUpdate)
    {
        $result = Connector::TabledInstance(static::$table)->onDuplicateKeyUpdate($dataUpdate);
        static::reset();
        return $result;
    }

    /* public static function update(array $data) */
    /* { */
    /*     $result = Connector::TabledInstance(static::$table)->update($data); */
    /*     static::reset(); */
    /*     return $result; */
    /* } */

    /* public static function delete() */
    /* { */
    /*     $result = Connector::TabledInstance(static::$table)->delete(); */
    /* } */

    public static function getQuery()
    {
        $result = Connector::TabledInstance(static::$table)->getQuery();
        static::reset();
        return $result;
    }

    public static function getSql()
    {
        $result = Connector::TabledInstance(static::$table)->getSql();
        static::reset();
        return $result;
    }

    public static function getBindings()
    {
        $result = Connector::TabledInstance(static::$table)->getBindings();
        static::reset();
        return $result;
    }

    // Instance methods 
    public function save()
    {
        $attributes = get_object_vars($this);
        $qb = Connector::TabledInstance(static::$table);
        $qb->insert($attributes);
    }

    public function destroy()
    {
        $attributes = get_object_vars($this);
        $qb = Connector::TabledInstance(static::$table);
        foreach($attributes as $attribute => $value)
        {
            $qb = $qb->where($attribute, $value);
        }
        $deletedIds = $qb->delete();
        return $deletedIds;
    }

    private static function reset()
    {
        static::$QBInstance = null;
    }
}

