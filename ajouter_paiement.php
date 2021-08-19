<?php
require_once ("db_conn.php");

if (isset($_POST['submit'])){
    if (empty($_POST['rs_client'])|| empty($_POST['id_client'])|| empty($_POST['date'])|| empty( $_POST['mode_de_paiement'])|| empty($_POST['num_facture'])|| empty($_POST['prix'])|| empty($_POST['status']) )
    {
        echo "Vérifiez les informations saisies, puis cliquez sur Enregistrer.";
    }
    else {
        $raisonsociale = $_POST['rs_client'];
        $id_client = $_POST['id_client'];
        $date = $_POST['date'];
        $mode_de_paiement = $_POST['mode_de_paiement'];
        $num_facture = $_POST['num_facture'];
        $prix = $_POST['prix'];
        $status = $_POST['status'];

        

        $query = "INSERT INTO paiements (rs_client,id_client,date_paiement,mode_de_paiement,id_facture,prix,status_paiement) VALUES ('$raisonsociale','$id_client','$date','$mode_de_paiement','$num_facture','$prix','$status')";
        $result = mysqli_query($conn,$query);

        if($result) {
            header ("location:paiments.php");

        }
        else 
        {
            echo "Please check your query";

        }


    }

}
else
{
    header ('location:clients.php');

}








?>