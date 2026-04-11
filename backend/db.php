<?php

#env variables 
$host = "localhost";
$db = "taskboard";
$user = "root";
$password = "password";

#Data source Name  DSN
$dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";

try{
    #open a connection - PDO procedure
    $conn = new PDO($dsn,$user,$password);
    #set the PDO error mode to exception
    $conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}catch (\PDOException $e){
    die("Database Connection Failed: ".$e->getMessage());
}