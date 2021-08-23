<?php

session_start();

include 'db_conn.php';

if (isset($_GET['id_devis']))
{
    $id_devis=$_GET['id_devis'];
    $deleteQuery="DELETE FROM devis where id_devis=$id_devis"; 
    mysqli_query($conn, $deleteQuery);

    echo "<script>window.location = 'devis.php';</script>";
} else {
    echo "ERR!";
}


?>