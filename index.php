<?php

    require_once("inc/db_login.inc.php");
    $mysqli = db_login("webshop");

    $data = array();

    if(isset($_GET['getKategorien'])){
        $query = 'SELECT DISTINCT `Kategorie` FROM `produkte`';

    }else{
    
        $query = $mysqli->escape_string($_GET['textFeld']);
        $query = 'SELECT * FROM produkte where name like "%' . $query . '%"';


    }

    $result = $mysqli->query($query);

    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }


   
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($data);

?>