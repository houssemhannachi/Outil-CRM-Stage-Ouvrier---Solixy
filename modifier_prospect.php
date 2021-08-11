<?php 

    require_once("db_conn.php");


    if (isset($_POST['update'])){
            $id = $_POST['id'];
            $rs = $_POST['rs'];
            $email = $_POST['email'];
            $adresse = $_POST['adresse'];
            $ville = $_POST['ville'];
            $pays = $_POST['pays'];
            $tel = $_POST['tel'];
            $fb = $_POST['fb'];
            $sw = $_POST['sw'];
            
    
            $query = "UPDATE propects SET rs_prospect = '$rs', adresse_prospect='$adresse',email_prospect='$email',pays_prospect='$pays',ville_prospect='$ville',tel_prospect='$tel',facebook_prospect='$fb',siteweb_prospect='$sw' WHERE id_prospect='$id'";
            $result = mysqli_query($conn,$query);
    
            if($result) {
                header ("location:prospects.php");
    
            }
            else 
            {
                echo "Please check your query";
    
            }
    
    

    
    }
    else
    {
        header ('location:prospects.php');
    
    }
    


?>
