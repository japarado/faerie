<?php 

namespace Faerie\Relationships;

use Faerie\Database\Connector;

trait Relationship
{
    public function hasMany(string $child_table, $foreign_key = null, $local_key = null)
    {
        if(func_num_args() == 1)
        {
            $foreign_key = static::$table . "_id";
        }
        if(func_num_args() == 2)
        {
            $local_key = static::$pk;
        }

        $parent_table = static::$table;

        $parent_pk_name = static::$pk;
        $parent_pk_value = (int)$this->$parent_pk_name;

        $qb = Connector::TabledInstance(static::$table);
        $query = $qb->join($child_table, "{$child_table}.{$foreign_key}", '=', "{$parent_table}.{$local_key}")
                         ->where("${parent_table}.{$parent_pk_name}", $parent_pk_value);
        /* echo $query->getQuery()->getRawSql(); */
        return static::filterColumnsByTable($child_table, $query->get());
    }

    public function belongsTo(string $parent_table, string $foreign_key = null, string $other_key = null)
    {
        if(func_num_args() == 1)
        {
            $foreign_key = $parent_table . '_id';
        }
        else if(func_num_args() == 2)
        {
            $other_key = 'id';
        }

        $child_table = static::$table;
        $child_pk_name = static::$pk;
        $child_pk_value = (int) $this->$child_pk_name;

        $qb = Connector::TabledInstance(static::$table);
        $query = $qb->join($parent_table, "{$parent_table}.{$other_key}", '=', "{$child_table}.{$foreign_key}")
                      ->where("{$child_table}.{$child_pk_name}", "=", $child_pk_value);
        echo $query->getQuery()->getRawSql();
        return static::filterColumnsByTable($parent_table, $query->get());
    }

    /* public function belongsToMany(string $parent_table, string $pivot_table, string $foreign_key, string $other_key) */
    /* { */
    /*     $current_table = static::$table; */
    /*     $current_table_pk = static::$pk; */

    /*     $parent_table_pk = ($parent_table)::$pk; */

    /*     $qb = Connector::TabledInstance(static::$table); */
    /*     $query = $qb->join('postmeta', 'postmeta.post_id', '=', 'posts.ID'); */
    /*     die($query->getQuery()->getRawSql()); */
    /* } */

    private static function filterColumnsByTable(string $table_name, $query_results = null)
    {
        $data_columns = static::getDbFields($table_name);

        foreach($query_results as $row)
        {
            foreach($row as $key => $value)
            {
                if(!in_array($key, $data_columns))
                {
                    unset($row->$key);
                }
            }
        }
        return $query_results;
    }
}
