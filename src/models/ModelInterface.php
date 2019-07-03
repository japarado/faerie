<?php

namespace Faerie\Models;

interface ModelInterface
{
    public static function all();

    public static function find(array $args);

    public static function findOne(array $args);

    public static function findById($id);

    public static function delete(array $args);

    public static function deleteById($id);

    public static function update(array $attrs, array $conditions);

    public static function updateById(array $attrs, $id);
}
