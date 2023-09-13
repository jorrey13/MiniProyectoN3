<?php

try {
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "funval";
    $mysqli = new mysqli($host,$username,$password,$database);

} catch (mysqli_sql_exception $e) {
    echo "Error " .$e->getMessage();
}