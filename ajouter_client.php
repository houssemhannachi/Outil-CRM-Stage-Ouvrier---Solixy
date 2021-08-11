<?php
require_once ("db_conn.php");

if (isset($_POST['submit'])){
    if (empty($_POST['nom'])|| empty($_POST['email'])|| empty($_POST['reference'])|| empty($_POST['adresse'])|| empty($_POST['pays'])|| empty($_POST['tel'])|| empty($_POST['matricule']) )
    {
        echo "Please fill the blanks";
    }
    else {
        $nom = $_POST['nom'];
        $reference = $_POST['reference'];
        $adresse = $_POST['adresse'];
        $email = $_POST['email'];
        $ville = $_POST['ville'];
        $pays = $_POST['pays'];
        $tel = $_POST['tel'];
        $matricule = $_POST['matricule'];
        

        $query = "Insert into clients (nom_client,reference_client,adresse_client,email_client,ville_client,pays_client,tel_client,matricule_client) values ('$nom','$reference','$adresse','$email','$ville','$pays','$tel','$matricule')";
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