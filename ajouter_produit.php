<?php
require_once ("db_conn.php");

if (isset($_POST['submit'])){
    if (empty($_POST['reference'])|| empty($_POST['designation'])|| empty($_POST['quantite'])|| empty( $_POST['puht'])|| empty($_POST['montantht']) )
    {
        echo "Please fill the blanks";
    }
    else {
        $reference = $_POST['reference'];
        $designation = $_POST['designation'];
        $quantite = $_POST['quantite'];
        $puht = $_POST['puht'];
        $montantht = $_POST['montantht'];

        $query = "INSERT INTO produits (reference,designation,quantite,puht,montantht) VALUES ('$reference','$designation','$quantite','$puht','$montantht')";
        $result = mysqli_query($conn,$query);

        if($result) {
            header ("location:ajouter_facture.php");

        }
        else 
        {
            echo "Please check your query";

        }


    }

}
else
{
    header ('location:facture.php');

}
