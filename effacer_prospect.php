<?php 
    require_once("db_conn.php");
    if (isset($_POST['deletedata'])){
            $id = $_POST['delete_id'];
            $query = "DELETE FROM propects WHERE id_prospect='$id'";
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
        header ('location:index.php');
    
    }
    


?>