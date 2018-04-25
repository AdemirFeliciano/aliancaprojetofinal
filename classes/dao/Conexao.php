<?php

abstract class Conexao {
    private static $SERVER = "localhost";
    private static $USER ="root";
    private static $PASSWORD = "";
    private static $DATABASE = "db_alianca";
    
    public static function conectar(){
    return mysqli_connect(Conexao::$SERVER, Conexao::$USER, Conexao::$PASSWORD, Conexao::$DATABASE);
    }
}

