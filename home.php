<?php
$pageName = "Home" ;
session_start();

	require_once('db_conn.php');
	
	$sql_client = "SELECT * FROM clients";
  if ($result_client=mysqli_query($conn,$sql_client)) {
    $rowcount_client=mysqli_num_rows($result_client);
   
  }
  $sql_invoice = "SELECT * FROM facture";
  if ($result_invoice=mysqli_query($conn,$sql_invoice)) {
    $rowcount_invoice=mysqli_num_rows($result_invoice);
   
  }
  $sql_devis = "SELECT * FROM devis";
  if ($result_devis=mysqli_query($conn,$sql_devis)) {
    $rowcount_devis=mysqli_num_rows($result_devis);
   
  }
  $sql_paiements = "SELECT * FROM paiements";
  if ($result_paiements=mysqli_query($conn,$sql_paiements)) {
    $rowcount_paiements=mysqli_num_rows($result_paiements);
   
  }
  
 

  if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

 ?>


  <?php require "dashboard.php"?>
  
    <div class="home-content">
      <div class="overview-boxes">
        <div class="box">
          <a href="clients.php">
          <div class="right-side">
            <div class="box-topic">Clients</div>
            <div class="number"><?php  echo $rowcount_client;  ?></div>
          </div>
          </a>
          <i class='bx bx-user cart'></i>
        </div>
        <div class="box">
          <div class="right-side">
            <a href="facture.php">
            <div class="box-topic">Factures</div>
            <div class="number"><?php  echo $rowcount_invoice;  ?></div>
          </div>
          </a>
          <i class='bx bx-copy-alt cart two' ></i>
        </div>
        <div class="box">
          <div class="right-side">
            <a href="devis.php">
            <div class="box-topic">Devis</div>
            <div class="number"><?php  echo $rowcount_devis?></div>
          </div>
          </a>
          <i class='bx bx-dollar-circle cart three' ></i>
        </div>
        <div class="box">
          <div class="right-side">
            <a href="paiements.php">
            <div class="box-topic">Paiements</div>
            <div class="number"><?php  echo $rowcount_paiements;  ?></div>
          </div>
          </a>
          <i class='bx bx-dollar cart four' ></i>
        </div>
      </div>


      <?php include('footer.php')?>

<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?> 
