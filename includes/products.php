<?php
/// for products page

include 'connect.php';

function getAllProducts(){
    $query = "SELECT * FROM product";

    $cn = ConnectDB();//connect to db
    $result = $cn->query($query);//execute SQL

    $data = [];
    while($row = $result->fetch_assoc()){
        $data[] = $row;
    }

    return $data;
}