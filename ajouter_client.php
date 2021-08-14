<?php
require_once ("db_conn.php");

if (isset($_POST['submit'])){
    if (empty($_POST['raisonsociale'])|| empty($_POST['reference'])|| empty($_POST['formejuridique'])|| empty( $_POST['email'])|| empty($_POST['adresse'])|| empty($_POST['ville'])|| empty($_POST['pays']) )
    {
        echo "Please fill the blanks";
    }
    else {
        $raisonsociale = $_POST['raisonsociale'];
        $reference = $_POST['reference'];
        $formejuridique = $_POST['formejuridique'];
        $email = $_POST['email'];
        $adresse = $_POST['adresse'];
        $ville = $_POST['ville'];
        $pays = $_POST['pays'];
        $telephone = $_POST['telephone'];
        $siteweb = $_POST['siteweb'];
        $matriculefiscale = $_POST['matriculefiscale'];
        $ribrip = $_POST['ribrip'];
        $tauxtva = $_POST['tauxtva'];
        

        $query = "INSERT INTO clients (rs_client,ref_client,fj_client,email_client,adresse_client,ville_client,pays_client,tel_client,sw_client,mf_client,riprib_client,tauxtva_client) VALUES ('$raisonsociale','$reference','$formejuridique','$email','$adresse','$ville','$pays','$telephone','$siteweb','$matriculefiscale','$ribrip','$tauxtva' )";
        $result = mysqli_query($conn,$query);

        if($result) {
            header ("location:clients.php");

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