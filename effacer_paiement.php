<?php 
    require_once("db_conn.php");
    if (isset($_GET['id_paiement'])){
            $id = $_GET['id_paiement'];
            $query = "DELETE FROM paiements WHERE id_paiement='$id'";
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
        header ('location:index.php');
    
    }
    


?>