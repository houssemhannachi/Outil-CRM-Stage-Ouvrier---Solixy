<?php 

    require_once("db_conn.php");


    if (isset($_POST['update'])){
        $Identifiant = $row['id_client'];
        $Nom_client = $row['nom_client'];
        $Reference = $row['reference_client'];
        $Adresse = $row['adresse_client'];
        $Date = $row['date'];
        $Designation = $row['designation'];
        $Quantite = $row['quantite'];
        $TVA = $row['TVA'];
            
    
            $query = "UPDATE devis SET nom_client = '$nom', reference_client='$Reference',adresse_client='$Adresse',date='$Date',designation='$Designation',quantite='$Quantite',TVA='$TVA' WHERE id_client='$Identifiant'";
            $result = mysqli_query($conn,$query);
    
            if($result) {
                header ("location:devis.php");
    
            }
            else 
            {
                echo "Please check your query";
    
            }
    
    

    
    }
    else
    {
        header ('location:devis.php');
    
    }
    


?>
