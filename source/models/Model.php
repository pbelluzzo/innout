<?php

class Model{
    protected static $tableName = '';
    protected static $columns = [];
    protected $values = [];

    function __construct($arr){
        $this->loadFromArray($arr);
    }

    public function loadFromArray($arr){
        if($arr) {
            foreach($arr as $key => $value) {
                $this->$key = $value;
            }
        }
    }

    public function __get($key){
        return $this->values($key);
    }

    public function __set($key, $value){
        $this->values[$key] = $value;
    }
    
    public static function getAll($filters = [], $columns = '*') {
        $objects = [];
        $result = static::getSelect($filters, $columns);
        if ($result) {
            $class = get_called_class();
            while($row = $result->fetch_assoc()) {
                array_push($objects, new $class($row));
            }
        }
        return $objects;
    }

// Existem casos não cobertos pela montagem da query feita no método getSelect,
// nestes casos deve-se passar a query diretamente para o getResultSetFromSelect

    public static function getSelect($filters = [],$columns = '*') {
        $sql = ('SELECT ' . 
                static::$columns .
                ' FROM ' .
                static::$tableName .
                static::getFilters($filters));
        static::getResultSetFromSelect($sql);
    }

    public static function getResultSetFromSelect($sql){
        $result = Database::getResultFromQuery($sql);
        if($result->num_rows === 0) {
            return null;
        }
        return $result;
    }


    private static function getFilters($filters){
        $sql = '';
        if (count($filters) > 0){
            $sql .= " WHERE 1 = 1";
            foreach($filters as $colum => $value){
            $sql .= " AND ${column} = " . static::getFormatedValue($value);
            }
        }
        return $sql;
    }

    private static function getFormatedValue($value){
        if(is_null($value)){
            return "null";
        }
        if(is_string($value)){
            return "'${value}'";
        }
            return $value;
    }
}