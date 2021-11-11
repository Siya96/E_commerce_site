<?php

include_once 'header.php';
require_once 'db_handler.php';


function fetchAllRows($connection) {

    $sql = "SELECT * FROM items;";

    

    $result = mysqli_query($connection, $sql);

    

    $array = array();

    

    $index = 0;

    while ($row = mysqli_fetch_array($result)) {

        $array[$index] = $row;
        $index++;

    }

    return $array;

}

