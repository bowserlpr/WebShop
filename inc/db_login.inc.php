<?php
function db_login($database){
    $server = "localhost";
    $user = "root";
    $password = "PpD@biyobeb4y8!g";

    $mysqli = new mysqli($server,$user,$password,$database);

    if($mysqli->connect_errno){
        echo "Keine DB-Verbindung: ({$mysqli->connect_errno})"
            . $mysqli->connect_errno;
        exit();
    }

    $mysqli -> set_charset("utf8");

    return $mysqli;
}
?>