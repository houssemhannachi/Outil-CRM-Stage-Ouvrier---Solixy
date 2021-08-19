<?php
require_once ("db_conn.php");

if (isset($_POST['submit'])){
    if (empty($_POST['idclient'])|| empty($_POST['client'])|| empty($_POST['matriculefiscale'])|| empty($_POST['date'])|| empty($_POST['reference'])|| empty($_POST['designation'])|| empty($_POST['quantite'])|| empty($_POST['puht'])|| empty($_POST['montantht'])|| empty($_POST['taxe']) || empty($_POST['tva'])|| empty($_POST['timberfiscale']) )
    {
        echo "Please fill the blanks";
    }
    else {
        $idclient = $_POST['idclient'];
        $client = $_POST['client'];
        $matriculefiscale = $_POST['matriculefiscale'];
        $date = $_POST['date'];
        $reference = $_POST['reference'];
        $designation = $_POST['designation'];
        $quantite = $_POST['quantite'];
        $puht = $_POST['puht'];
        $montantht = $_POST['montantht'];

        $taxe = $_POST['taxe'];
        $tva = $_POST['tva'];
        $timberfiscale = $_POST['timberfiscale'];
       $totaletaxe = $_POST['totaletaxe'];
       $montanttt = $_POST['montanttt'];
      
        

        $query = "INSERT INTO facture (id_client,adresse_client,matriculefiscale_client,date_facture,reference_facture,designation_facture,quantite_facture,puht_facture,montantht_facture,taxe_facture,tauxtva_client,timber_fiscale_client,totaletaxe_facture,montanttt_facture) values ('$idclient','$client','$matriculefiscale','$date','$reference','$designation','$quantite','$puht','$montantht','$taxe','$tva','$timberfiscale','$totaletaxe' ,'$montanttt')";
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