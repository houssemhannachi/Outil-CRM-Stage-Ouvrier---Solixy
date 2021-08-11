<?php 

    require_once("db_conn.php");


    if (isset($_POST['update'])){
            $id = $_POST['id'];
            $nom = $_POST['nom'];
            $reference = $_POST['reference'];
            $adresse = $_POST['adresse'];
            $email = $_POST['email'];
            $ville = $_POST['ville'];
            $pays = $_POST['pays'];
            $tel = $_POST['tel'];
            $matricule = $_POST['matricule'];
            
    
            $query = "UPDATE clients SET nom_client = '$nom', reference_client='$reference',adresse_client='$adresse',email_client='$email',pays_client='$pays',tel_client='$tel',matricule_client='$matricule' WHERE id_client='$id'";
            $result = mysqli_query($conn,$query);
    
            if($result) {
                header ("location:clients.php");
    
            }
            else 
            {
                echo "Please check your query";
    
            }
    
    

    
    }
    else
    {
        header ('location:clients.php');
    
    }
    


?>
