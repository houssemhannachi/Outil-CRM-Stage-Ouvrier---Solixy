<link rel="stylesheet" href="assets/css/bootstrap.min.css?v=<?php echo time();?>">
<link rel="stylesheet" href="assets/css/font-awesome.min.css?v=<?php echo time();?>">
<link rel="stylesheet" href="assets/css/line-awesome.min.css?v=<?php echo time();?>">
<link rel="stylesheet" href="assets/css/select2.min.css?v=<?php echo time();?>">
<link rel="stylesheet" href="assets/css/style.css?v=<?php echo time();?>">
<?php
$pageName = "Clients";
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {}

?>
<?php
require_once ("db_conn.php");

if (isset($_POST['submit-search'])){
    $recherche = $_POST['search'];
   $search = mysqli_real_escape_string($conn,$_POST['search']);
   $sql = "SELECT * FROM clients WHERE nom_client LIKE '%$recherche%'";
   $result = mysqli_query ($conn,$sql);
   $queryResult = mysqli_num_rows($result);
   if($queryResult > 0) {
       while ($row = mysqli_fetch_assoc($result)) {
           echo $row['id_client'];

       }

   }
   else {
       echo 'NO DATA';

   }
}
else
{
    header ('location:clients.php');

}








?>