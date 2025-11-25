<?php
/// for orders page

include 'connect.php';

function getAllOrders() {

    $cn = ConnectDB(); // connect to DB

    // Join invoice + customer
    $query = "
        SELECT 
            i.inv_number,
            i.inv_date,
            i.inv_subtotal,
            i.inv_tax,
            i.inv_total,
            c.cus_fname,
            c.cus_lname
        FROM invoice i
        LEFT JOIN customer c ON i.cus_code = c.cus_code
        ORDER BY i.inv_number ASC
    ";

    $result = $cn->query($query);

    // Convert rows → array
    $data = [];
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    return $data;
}
