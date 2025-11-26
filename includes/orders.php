<?php
/// for orders page

include 'connect.php';

function getAllOrders($search = '', $dateFrom = '', $dateTo = '') {

    $cn = ConnectDB(); // connect to DB

    // Base query
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
        WHERE 1
    ";

    // SEARCH FILTER
    if (!empty($search)) {
        $search = $cn->real_escape_string($search);
        $query .= "
            AND (
                i.inv_number LIKE '%$search%' OR
                c.cus_fname LIKE '%$search%' OR
                c.cus_lname LIKE '%$search%'
            )
        ";
    }

    // DATE FROM FILTER
    if (!empty($dateFrom)) {
        $dateFrom = $cn->real_escape_string($dateFrom);
        $query .= " AND i.inv_date >= '$dateFrom 00:00:00' ";
    }

    // DATE TO FILTER
    if (!empty($dateTo)) {
        $dateTo = $cn->real_escape_string($dateTo);
        $query .= " AND i.inv_date <= '$dateTo 23:59:59' ";
    }

    // Sorting
    $query .= " ORDER BY i.inv_number ASC";

    // Execute
    $result = $cn->query($query);

    // Convert rows → array
    $data = [];
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    return $data;
}
