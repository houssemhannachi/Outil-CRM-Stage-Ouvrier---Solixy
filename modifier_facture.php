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
include 'Invoice.php';
$invoice = new Invoice();
$invoice->checkLoggedIn();
if(!empty($_POST['companyName']) && $_POST['companyName'] && !empty($_POST['invoiceId']) && $_POST['invoiceId']) {	
	$invoice->updateInvoice($_POST);	
	header("Location:facture.php");	
}
if(!empty($_GET['update_id']) && $_GET['update_id']) {
	$invoiceValues = $invoice->getInvoice($_GET['update_id']);		
	$invoiceItems = $invoice->getInvoiceItems($_GET['update_id']);		
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
                                <li class="breadcrumb-item active">Modifier une facture</li>
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
               			<?php echo $_SESSION['address']; ?><br>  <?php echo $_SESSION['ville']; ?><br> 
               			<?php echo $_SESSION['mobile']; ?><br>	      						      									
		      		</div>      		
		      		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
		      			<h3>À,</h3>
		      			<div class="form-group">
							<input value="<?php echo $invoiceValues['order_receiver_name']; ?>" type="text" class="form-control" name="companyName" id="companyName" placeholder="Company Name" autocomplete="off">
						</div>
						<div class="form-group">
							<textarea class="form-control" rows="3" name="address" id="address" placeholder="Your Address"><?php echo
							 $invoiceValues['order_receiver_address']; ?></textarea>
						</div>
						
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
									<th width="15%">N°</th>
                     				<th width="38%">Désignation</th>
                     				<th width="15%">Quantité</th>
                     				<th width="15%">Pu HT</th>
                   				 	<th width="15%">Montant HT</th>
							</tr>
							<?php 
							$count = 0;
							foreach($invoiceItems as $invoiceItem){
								$count++;
							?>								
							<tr>
								<td><div class="custom-control custom-checkbox">
		                        <input type="checkbox" class="custom-control-input itemRow" id="itemRow">
		                        <label class="custom-control-label" for="itemRow"></label>
		                        </div></td>
								<td><input type="text" value="<?php echo $invoiceItem["item_code"]; ?>" name="productCode[]" id="productCode_<?php echo $count; ?>" class="form-control" autocomplete="off"></td>
								<td><input type="text" value="<?php echo $invoiceItem["item_name"]; ?>" name="productName[]" id="productName_<?php echo $count; ?>" class="form-control" autocomplete="off"></td>			
								<td><input type="number" value="<?php echo $invoiceItem["order_item_quantity"]; ?>" name="quantity[]" id="quantity_<?php echo $count; ?>" class="form-control quantity" autocomplete="off"></td>
								<td><input type="number" value="<?php echo $invoiceItem["order_item_price"]; ?>" name="price[]" id="price_<?php echo $count; ?>" class="form-control price" autocomplete="off"></td>
								<td><input type="number" value="<?php echo $invoiceItem["order_item_final_amount"]; ?>" name="total[]" id="total_<?php echo $count; ?>" class="form-control total" autocomplete="off"></td>
								
							</tr>	
							<?php } ?>		
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
							<div class="form-group mt-3 mb-3">
								<label>Total HT: &nbsp;</label>
								<div class="input-group">
									<div class="input-group-prepend currency">
										<span class="input-group-text currency">$</span>
									</div>
									<input value="<?php echo $invoiceValues['order_total_before_tax']; ?>" type="number" class="form-control" name="subTotal" id="subTotal" placeholder="Subtotal">
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
							<div class="form-group">
								<label>Taux T.V.A: &nbsp;</label>
								<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text">%</span>
								</div>
									<input value="<?php echo $invoiceValues['order_tax_per']; ?>" type="number" class="form-control" name="taxRate" id="taxRate" placeholder="Tax Rate">
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
							<div class="form-group">
								<label>Total T.V.A: &nbsp;</label>
								<div class="input-group">
									<div class="input-group-append currency"><span class="input-group-text">$</span></div>
									<input value="<?php echo $invoiceValues['order_total_tax']; ?>" type="number" class="form-control" name="taxAmount" id="taxAmount" placeholder="Tax Amount">
								</div>
							</div>	
							</div>
							<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">						
							<div class="form-group">
								<label>Total TTC: &nbsp;</label>
								<div class="input-group">
									<div class="input-group-append currency"><span class="input-group-text">$</span></div>
									<input value="<?php echo $invoiceValues['order_total_after_tax']; ?>" type="number" class="form-control" name="totalAftertax" id="totalAftertax" placeholder="Total">
								</div>
							</div>
							</div>
							<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
							<div class="form-group">
								<label>Montant payé: &nbsp;</label>
								<div class="input-group">
									<div class="input-group-append currency"><span class="input-group-text">$</span></div>
									<input value="<?php echo $invoiceValues['order_amount_paid']; ?>" type="number" class="form-control" name="amountPaid" id="amountPaid" placeholder="Amount Paid">
								</div>
							</div>
							</div>
							<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
							<div class="form-group">
								<label>Montant à payer: &nbsp;</label>
								<div class="input-group">
									<div class="input-group-append currency"><span class="input-group-text">$</span></div>
									<input value="<?php echo $invoiceValues['order_total_amount_due']; ?>" type="number" class="form-control" name="amountDue" id="amountDue" placeholder="Amount Due">
								</div>
							</div>
							</div>
		     		<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 center">
		      			<h3>Notes: </h3>
		      			<div class="form-group">
							<textarea class="form-control txt" rows="5" name="notes" id="notes" placeholder="Your Notes"><?php echo $invoiceValues['note']; ?></textarea>
						</div>
						<br>
						<div class="form-group">
							<input type="hidden" value="<?php echo $_SESSION['userid']; ?>" class="form-control" name="userId">
							<input type="hidden" value="<?php echo $invoiceValues['order_id']; ?>" class="form-control" name="invoiceId" id="invoiceId">
			      			<input data-loading-text="Updating Invoice..." type="submit" name="invoice_btn" value="Save Invoice" class="btn btn-success submit_btn invoice-save-btm">
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
