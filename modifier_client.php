<?php 

    require_once("db_conn.php");


    if (isset($_POST['update'])){
        $id = $_POST['id'];
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
        
        $query = "UPDATE clients SET rs_client = '$raisonsociale', ref_client='$reference',fj_client='$formejuridique',email_client='$email',adresse_client='$adresse',ville_client='$ville',pays_client='$pays',tel_client='$telephone',sw_client='$siteweb',mf_client='$matriculefiscale' ,riprib_client='$ribrip' ,tauxtva_client='$tauxtva' WHERE id_client='$id'";
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
