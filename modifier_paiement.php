<?php 

    require_once("db_conn.php");


    if (isset($_POST['update'])){
        $id = $_POST['id'];
        $raisonsociale = $_POST['rs_client'];
        $id_client = $_POST['id_client'];
        $date = $_POST['date'];
        $mode_de_paiement = $_POST['mode_de_paiement'];
        $num_facture = $_POST['num_facture'];
        $prix = $_POST['prix'];
        $status = $_POST['status'];
        
        $query = "UPDATE paiements SET rs_client = '$raisonsociale', id_client='$id_client',date_paiement='$date',mode_de_paiement='$mode_de_paiement',id_facture='$num_facture',prix='$prix',status_paiement='$status' WHERE id_paiement='$id'";
            $result = mysqli_query($conn,$query);
    
            if($result) {
                header ("location:paiments.php");
    
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
