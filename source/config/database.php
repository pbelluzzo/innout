<?php

class Database {
    public static function getConnection(){  
        $env = self::getEnvIni();
        $conn = new mysqli ($env['host'],$env['username'],$env['password'],$env['database']);
        self::checkConnectionError($conn);
        return $conn;

    }

    private static function getEnvIni(){
        $envpath = realpath(dirname(__FILE__) . '/../env.ini');
        $env = parse_ini_file($envpath);
        return $env;
    }

    private static function checkConnectionError($conn) {
        if($conn->connect_error){
            die("Erro: " . $conn->connect_error);
        }
    }

    public static function getResultFromQuery($sql){
        $conn = self::getConnection();
        $result = $conn->query($sql);
        $conn->close();
        return $result;
    }
    
}