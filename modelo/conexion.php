<?php

class Conexion{

    static public function conectar(){

        $host = '92.204.135.2';
        $user ='labperu_school_system';
        $db = 'labperu_school_system';
        $pass = 'sistema_escolar_2021';
        $pdo = new PDO('mysql:host='.$host.';dbname='.$db.';charset=utf8',$user,$pass);

        $pdo ->exec("set names utf8");

        return $pdo;
    }
}
