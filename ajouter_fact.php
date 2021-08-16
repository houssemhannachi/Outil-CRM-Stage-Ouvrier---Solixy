<?php
require_once ("db_conn.php");

if (isset($_POST['submit'])){
    if (empty($_POST['client'])|| empty($_POST['reference'])|| empty($_POST['designation'])|| empty($_POST['date'])|| empty($_POST['quantite'])|| empty($_POST['puht'])|| empty($_POST['montantht']) )
    {
        echo "Please fill the blanks";
    }
    else {
        $client = $_POST['client'];
        $reference = $_POST['reference'];
        $designation = $_POST['designation'];
        $date = $_POST['date'];
        $quantite = $_POST['quantite'];
        $puht = $_POST['puht'];
        $montantht = $_POST['montantht'];
      
        

        $query = "INSERT INTO facture (id_client,reference_facture,designation_facture,date_facture,quantite_facture,puht_facture,montantht_facture) values ('$client','$reference','$designation','$date','$quantite','$puht','$montantht')";
        $result = mysqli_query($conn,$query);

        if($result) {
            header ("location:facture.php");

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








?>