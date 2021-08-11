<?php
require_once ("db_conn.php");

if (isset($_POST['submit'])){
    if (empty($_POST['rs'])|| empty($_POST['email'])|| empty($_POST['adresse'])|| empty($_POST['ville'])|| empty($_POST['pays'])|| empty($_POST['tel'])|| empty($_POST['fb'])|| empty($_POST['sw']) )
    {
        echo "Please fill the blanks";
    }
    else {
        $rs = $row['rs'];
        $email = $row['email'];
        $adresse = $row['adresse'];
        $ville = $row['ville'];
        $pays = $row['pays'];
        $tel = $row['tel'];
        $fb = $row['facebook'];
        $sw = $row['siteweb'];
        

        $query = "Insert into clients (nom_client,reference_client,adresse_client,email_client,ville_client,pays_client,tel_client,matricule_client) values ('$nom','$reference','$adresse','$email','$ville','$pays','$tel','$matricule')";
        $result = mysqli_query($conn,$query);

        if($result) {
            header ("location:prospects.php");

        }
        else 
        {
            echo "Please check your query";

        }


    }

}
else
{
    header ('location:prospects.php');

}
