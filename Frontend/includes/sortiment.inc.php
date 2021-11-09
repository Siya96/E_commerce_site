<?php

include_once 'header.php';
require_once 'db_handler.php';


function fetchAllRows($connection) {

    $sql = "SELECT * FROM items;";

    $result = mysqli_query($connection, $sql);

    $num_rows = mysqli_num_row($result);

    $array = array();


    if ($num_rows > 0) {

        $index = 0;

        while ($row = mysqli_fetch_assoc($result)) {

            $array[$index] = $row;
            $index++;

        }

    }
    return $array;

}

