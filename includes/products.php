<?php
/// for products page

include 'connect.php';

function getAllProducts($search = ""){

    $cn = ConnectDB(); // connect to db

    if (!empty($search)) {

        // search product
        $query = "SELECT * FROM product
                  WHERE p_code LIKE '%$search%'
                  OR p_descript LIKE '%$search%'";
    }
    else {
        // No filter → get all products
        $query = "SELECT * FROM product";
    }

    $result = $cn->query($query); // execute SQL

    // Convert result into array
    $data = [];
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    return $data;
}
