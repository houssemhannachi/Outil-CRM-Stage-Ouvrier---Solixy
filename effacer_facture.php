<?php

session_start();

include 'db_conn.php';

if (isset($_GET['order_id']))
{
    $order_id=$_GET['order_id'];
    $deleteQuery="DELETE FROM invoice_order where order_id=$order_id"; 
    mysqli_query($conn, $deleteQuery);

    echo "<script>window.location = 'facture.php';</script>";
} else {
    echo "ERR!";
}


?>