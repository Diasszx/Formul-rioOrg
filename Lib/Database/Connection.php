<?php
class Connection{
    private function __construct(){}

    public static function open($name)
    {
        if(file_exists("config/{$name}.ini"))
        {
        parse_ini_file("config/{$name}.ini");
    } 
        else
        {
            throw new Exception("Arquivo {$name} não encontrado");
        }

        $user = isset($db['user']) ? $db['user'] : null;
        $pass = isset($db['pass']) ? $db['pass'] : null;
        $name = isset($db['name']) ? $db['name'] : null;
        $host = isset($db['host']) ? $db['host'] : null;
        $type = isset($db['type']) ? $db['type'] : null;
        $port = isset($db['port']) ? $db['port'] : null;

        switch($type){
            case 'pgsql':
                $port = isset($db['port']) ? $db['port'] : '5432';
                $conn = new PDO("pgsql:dbname={$name}; user={$user}; password={$pass}; host{$host}; port={$port}");
                break;
            case 'mysql':
                $port = isset($db['port']) ? $db['port'] : '3306';
                $conn = new PDO("mysql:host={$host}; port={$port}; dbname={$name}");
                break;
            case 'sqlite':
                $conn = new PDO ("sqlite:{$name}");
                break;
        }

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    }
} 
