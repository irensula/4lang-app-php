<?php

function connectDB(){
        static $connection;
        if(!isset($connection)) {
            $connection = connect();
        }      
        return $connection;
}

function connect() {
        $host = 'localhost';
        $dbname = 'langsapp'; 
        $user = 'root'; 
        $password = ''; 

        $connectionString = "mysql:host=$host;dbname=$dbname;charset=utf8";

        try {       
                $pdo = new PDO($connectionString, $user, $password);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $pdo;
        } catch (PDOException $e){
                echo "Connection failed: " . $e->getMessage();
                die();
        }
}