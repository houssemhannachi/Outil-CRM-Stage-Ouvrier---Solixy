<?php
require_once ("db_conn.php");

if (isset($_POST['submit'])){
    if (empty($_POST['rs'])|| empty($_POST['email'])|| empty($_POST['adresse'])|| empty($_POST['ville'])|| empty($_POST['pays'])|| empty($_POST['tel'])|| empty($_POST['fb'])|| empty($_POST['sw']) )
    {
        echo "Please fill the blanks";
    }
    else {
        $rs = $_POST['rs'];
        $email = $_POST['email'];
        $adresse = $_POST['adresse'];
        $ville = $_POST['ville'];
        $pays = $_POST['pays'];
        $tel = $_POST['tel'];
        $fb = $_POST['fb'];
        $sw = $_POST['sw'];
        

        $query = "Insert into propects (rs_prospect,adresse_prospect,email_prospect,ville_prospect,pays_prospect,tel_prospect,facebook_prospect,siteweb_prospect) values ('$rs','$adresse','$email','$ville','$pays','$tel','$fb','$sw')";
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
