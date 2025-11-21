<?php
const HOST = 'localhost'; //DB Location
const USER = 'root';
const PWD = '';
const DBNAME = 'salecodb';

function ConnectDB(){

    $conn = new mysqli(HOST, USER, PWD, DBNAME);
    if($conn->connect_error){
        die('Error Connection');
        exit;
    }
    return $conn;
}
