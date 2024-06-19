<?php
    class ConnectionFactory{
        static $connection;

        public static function getConnection(){
            if(!isset($connection)){
                $host = "localhost";
                $dbName = "projeto";
                $userDb = "root";
                $pass = "";
                $port = "3306";
                try{
                    $connection = new PDO("mysql:host=$host;dbname=$dbName;port=$port",$userDb,$pass);
                    return $connection;
                }catch(PDOException $ex){
                    echo "Erro! ".$ex->getMessage();
                }
            }
            return $connection;
        }
    }
?>