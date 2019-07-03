<?php 

namespace Faerie\Models;

use Faerie\Models\ModelInterface;
use Faerie\Database\Operations;

abstract class BaseModel implements ModelInterface
{

    protected static function Evaluate($query, $args)
    {
        foreach($args as $attr => $options)
        {
            if(!isset($options['op']))
            {
                $options['op'] = 'where';
            }
            else 
            {
                if(!Operations::isValidValue($options['op']))
                {
                    throw new \Exception("Operation {$options['op']} is not valid");
                }
            }

            $options['eq'] = isset($options['eq']) ?: '=';

            $temp = $options['op'];

            // Incrementally append clauses to the SQL query
            $query = $temp($attr, $options['eq'], $options['val']);
        }

        return $query;
    }
}
