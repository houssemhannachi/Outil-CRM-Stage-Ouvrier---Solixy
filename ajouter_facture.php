<link rel="stylesheet" href="assets/css/styleinvoice.css?v=<?php echo time();?>">
<link rel="stylesheet" href="assets/css/bootstrap.min.css?v=<?php echo time();?>">
<link rel="stylesheet" href="assets/css/font-awesome.min.css?v=<?php echo time();?>">
<link rel="stylesheet" href="assets/css/line-awesome.min.css?v=<?php echo time();?>">
<link rel="stylesheet" href="assets/css/select2.min.css?v=<?php echo time();?>">
<link rel="stylesheet" href="assets/css/styles.css?v=<?php echo time();?>">
         


<?php 
   session_start();
   $_SESSION["user_id"]= 1;
   $_SESSION["name"]= "Solixy";
   $_SESSION["address"]="Avenue de la république </br> Immeuble Al Ahram 4ème étage";
   $_SESSION["ville"] = "Gabes - Tunisie";
   $_SESSION["mobile"]="+216 75 270 938";
    $pageName="Factures";

   include('dashboard.php');
   require('db_conn.php');
   include 'Invoice.php';
   $pageName ="Ajouter facture";
   $invoice = new Invoice();
   
   	
   if(!empty($_POST['id_client']) && $_POST['id_client']) {	
   	$invoice->saveInvoice($_POST);
   	header("Location:facture.php");
      
   }
   ?>

<script src="js/invoice.js?v=<?php echo time();?>"></script>
<div class="home-content">
		<div class="page-wrapper">
		
			<!-- Page Content -->
			<div class="content container-fluid">
			
				<!-- Page Header -->
				<div class="page-header">
					<div class="row align-items-center">
						<div class="col">
							<h3 class="page-title">Facture</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="home.php">Dashboard</a></li>
								<li class="breadcrumb-item"><a href="facture.php">Facture</a></li>
                                <li class="breadcrumb-item active">Ajouter une facture</li>
							</ul>
						</div>
					</div>
            </div>
               <div class="row">
			        <div class="col-md-10 mx-auto">
                  <div class="container content-invoice">
                     <div class="cards">
                       <div class="card-bodys">
                          <form action="" id="invoice-form" method="post" class="invoice-form" role="form" novalidate="">
                            <div class="load-animate animated fadeInUp">
                              <div class="row">
                                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
              
          
            </div>
         </div>
         <input id="currency" type="hidden" value="$">
         <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
               <h3>De,</h3>
               <b><?php echo $_SESSION['name']; ?> </b><br> 
               <?php echo $_SESSION['address']; ?><br>  
               <?php echo $_SESSION['ville']; ?><br> 
               <?php echo $_SESSION['mobile']; ?><br>

            </div>
            <div class="col">
               
               <div class="form-group">
                  <div class="form-recherche"><h3>À,</h3></div>
                  <div class="form-recherche">
                     <form action="" method="POST">
                        <input type="text" class="recherche_input" name="ref_client" id="ref_client" placeholder="REF client" autocomplete="off">
                        <button name="search" class="btn btn-success"> Trouver ce client </button>
                     </form>
                  </div>
               </div>
         

               <?php if( isset($_POST['search']) AND !empty($_POST) )
                           {
                              $recherche_rs = $_POST['ref_client'];
                              $sql = "SELECT * FROM clients WHERE ref_client LIKE '%$recherche_rs%' ";
                              $result = mysqli_query ($conn,$sql);
                              $queryResult = mysqli_num_rows($result);
                              
                              if($queryResult > 0) {
                                 while ($row = mysqli_fetch_assoc($result)) {
                                                        $id_client = $row['id_client'];
                                                        $rs_client = $row['rs_client'];
                                                        $ref_client = $row['ref_client'];
                                                        $fj_client = $row['fj_client'];
                                                          $email_client = $row['email_client'];
                                                          $adresse_client = $row['adresse_client'];
                                                          $ville_client = $row['ville_client'];
                                                          $pays_client = $row['pays_client'];
                                                        $tel_client = $row['tel_client'];
                                                        $sw_client = $row['sw_client'];
                                                        $mf_client = $row['mf_client'];
                                                        $riprib_client = $row['riprib_client'];
                                                        $tauxtva_client = $row['tauxtva_client'];
                                 ?>

                                 <?php echo '<input type="hidden" id="id_client" name="id_client" value="'.$id_client.'" readonly>' ?>
                                 <?php echo 'Raison sociale: <b>'.$rs_client.'</b>'?> </b><br> 
                                 <?php echo 'Adresse: <b>'. $adresse_client.'</b>'?> <br> 
                                 <?php echo 'Matricule fiscale: <b>'. $mf_client.'</b>'?> <br> <br> 


<?php }?>
<?php
   }
   else {
       echo 'Aucun client trouvé';

   }
}
else
{
    echo '';

}

?>

            </div>
         </div>
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
               <table class="table table-condensed table-striped" id="invoiceItem">
                  <tr>
                     <th width="2%">
                      <div class="custom-control custom-checkbox mb-3">
                        <input type="checkbox" class="custom-control-input" id="checkAll" name="checkAll">
                        <label class="custom-control-label" for="checkAll"></label>
                        </div>
                    </th>
                     <th width="15%">Réf</th>
                     <th width="38%">Désignation</th>
                     <th width="15%">Quantité</th>
                     <th width="15%">Pu HT</th>
                     <th width="15%">Montant HT</th>
                  </tr>
                  <tr>
                     <td><div class="custom-control custom-checkbox">
                        <input type="checkbox" class="itemRow custom-control-input" id="itemRow_1">
                        <label class="custom-control-label" for="itemRow_1"></label>
                        </div></td>
                     <td><input type="text" name="productCode[]" id="productCode_1" class="form-control" autocomplete="off"></td>
                     <td><input type="text" name="productName[]" id="productName_1" class="form-control" autocomplete="off"></td>
                     <td><input type="number" name="quantity[]" id="quantity_1" class="form-control quantity" autocomplete="off"></td>
                     <td><input type="number" name="price[]" id="price_1" class="form-control price" autocomplete="off"></td>
                     <td><input type="number" name="total[]" id="total_1" class="form-control total" autocomplete="off"></td>
                  </tr>
               </table>
            </div>
         </div>
         <div class="row" style="display : table; margin : 0 auto;">
            <div class="col-xs-12">
               <button class="btn btn-danger delete btn-item" id="removeRows" type="button">-</button>
               <button class="btn btn-success btn-item" id="addRows" type="button">+</button>
            </div>
         </div>
         <div class="row">
          <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
            <div class="form-group mt-3 mb-3 ">
              <label>Total HT: &nbsp;</label>
                 <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text currency">$</span>
            </div>
            <input value="" type="number" class="form-control" name="subTotal" id="subTotal" placeholder="Total HT" >
          </div>
              </div>
          </div>
          <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
            <div class="form-group mt-3 mb-3 ">
              <label>Taux T.V.A: &nbsp;</label>
                 <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text currency">%</span>
            </div>
           <input value="" type="number" class="form-control" name="taxRate" id="taxRate" placeholder="Taux T.V.A">
          </div>
              </div>
          </div>
          <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
            <div class="form-group mt-3 mb-3 ">
              <label>Total T.V.A: &nbsp;</label>
                 <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text currency">$</span>
            </div>
            <input value="" type="number" class="form-control" name="taxAmount" id="taxAmount" placeholder="Total T.V.A" readonly>
          </div>
              </div>
          </div>
          <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
            <div class="form-group mt-3 mb-3 ">
              <label>Total TTC: &nbsp;</label>
                 <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text currency">$</span>
            </div>
             <input value="" type="number" class="form-control" name="totalAftertax" id="totalAftertax" placeholder="Total" readonly>
          </div>
              </div>
          </div>
          <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
            <div class="form-group mt-3 mb-3 ">
              <label>Montant payé: &nbsp;</label>
                 <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text currency">$</span>
            </div>
            <input value="" type="number" class="form-control" name="amountPaid" id="amountPaid" placeholder="Amount Paid">
          </div>
              </div>
          </div>
          <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
            <div class="form-group mt-3 mb-3 ">
              <label>Montant à payer: &nbsp;</label>
                 <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text currency">$</span>
            </div>
             <input value="" type="number" class="form-control" name="amountDue" id="amountDue" placeholder="Amount Due">
          </div>
              </div>
          </div>
            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 center ">
               <h3>Notes: </h3>
               <div class="form-group ">
                  <textarea class="form-control txt" rows="5" name="notes" id="notes" placeholder="Your Notes"></textarea>
               </div>
               <br>
               <div class="form-group ">
                  <input data-loading-text="Enregistrer facture ..." type="submit" name="invoice_btn" value="Ajouter facture" class="btn btn-primary submit-btn invoice-save-btm" style="display : table; margin : 0 auto;">           
               </div>
            </div>
         </div>
         <div class="clearfix"></div>
      </div>
   </form>
     </div>
   </div>
</div>
</div>	
