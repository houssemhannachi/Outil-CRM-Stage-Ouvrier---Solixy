<?php
require_once ("db_conn.php");

if (isset($_POST['submit'])){
    if (empty($_POST['nom'])|| empty($_POST['identifiant'])|| empty($_POST['adresse'])|| empty($_POST['reference'])|| empty($_POST['date'])|| empty($_POST['designation'])|| empty($_POST['quantite']) || empty($_POST['TVA']) )
    {
        echo "Please fill the blanks";
    }
    else {
        $Nom_du_client = $_POST['nom'];
        $identifiant = $_POST['identifiant'];
        $adresse = $_POST['adresse'];
        $reference = $_POST['reference'];
        $date = $_POST['date'];
        $designation = $_POST['designation'];
        $quantite = $_POST['quantité'];
        $TVA = $_POST['TVA'];
        
        

        $query = "Insert into devis (nom_client,id_client,adresse_client,reference_client,date,designation,quantite,TVA) values ('$nom_du_client','$identifiant','$adresse','$reference','$date','$designation','$quantite','$TVA')";
        $result = mysqli_query($conn,$query);

        if($result) {
            header ("location:devis.php");

        }
        else 
        {
            echo "Please check your query";

        }


    }

}
else
{
    header ('location:devis.php');

}








?>