
<link rel="stylesheet" href="assets/css/styleinvoice.css?v=<?php echo time();?>">
<link rel="stylesheet" href="assets/css/bootstrap.min.css?v=<?php echo time();?>">
<link rel="stylesheet" href="assets/css/font-awesome.min.css?v=<?php echo time();?>">
<link rel="stylesheet" href="assets/css/line-awesome.min.css?v=<?php echo time();?>">
<link rel="stylesheet" href="assets/css/select2.min.css?v=<?php echo time();?>">
<link rel="stylesheet" href="assets/css/styles.css?v=<?php echo time();?>">
<?php 
session_start();
include('dashboard.php');
include 'Invoice.php';
$pageName ="Factures";
$invoice = new Invoice();
$invoice->checkLoggedIn();
?>
<title>Invoice System</title>
<script src="js/invoice.js"></script>
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
								<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
								<li class="breadcrumb-item active">Facture</li>
							</ul>
						</div>
						<div class="col-auto float-right ml-auto">


							<a href="ajouter_facture.php" class="btn add-btn"><i class="fa fa-plus"></i>Ajouter une facture</a>

						</div>
					</div>
				</div>
				<!-- /Page Header -->
        <div class="row filter-row">
					<div class="col-sm-6 col-md-3">  
						<div class="form-group form-focus">
							<input type="text" class="form-control floating">
							<label class="focus-label">FActure  ID</label>
						</div>
					</div>
					<div class="col-sm-6 col-md-3">  
						<div class="form-group form-focus">
							<input type="text" class="form-control floating">
							<label class="focus-label">Reference</label>
						</div>
					</div>
						
					<div class="col-sm-6 col-md-3">  
						<a href="#" class="btn btn-success btn-block"> Search </a>  
					</div>     
				</div>
        <!-- /Page Header -->
               <div class="row">
			           <div class="col-md-10 mx-auto">
	                  <div class="container">		
                      <div class="row">
				              	<div class="col-md-12">
					              	<div class="table-responsive">
                                <table id="data-table" class="table table-striped custom-table datatable">
                                    <thead>
                                       <tr>
                                          <th>N° Facture</th>
                                          <th>Client</th>
                                          <th> Date Facture</th>
                                          <th>Total</th>
                                          <th>Print</th>
                                          <th>Edit</th>
                                          <th>Delete</th>
                                        </tr>
                                    </thead>
        <?php		
	    	$invoiceList = $invoice->getInvoiceList();
        foreach($invoiceList as $invoiceDetails){
			$invoiceDate = date("d/M/Y, H:i:s", strtotime($invoiceDetails["order_date"]));
            echo '
              <tr>
                <td>'.$invoiceDetails["order_id"].'</td>
                <td>'.$invoiceDetails["order_receiver_name"].'</td>
                <td>'.$invoiceDate.'</td>
                <td>$'.$invoiceDetails["order_total_after_tax"].'</td>
                <td><a href="print_invoice.php?invoice_id='.$invoiceDetails["order_id"].'" title="Print Invoice"><button class="btn btn-primary btn-sm"><i class="fa fa-print"></i></button></a></td>
                <td><a href="edit_invoice.php?update_id='.$invoiceDetails["order_id"].'"  title="Edit Invoice"><button class="btn btn-success btn-sm"><i class="fa fa-edit"></i></button></a></td>
                <td><a href="delete-invoice.php?order_id='.$invoiceDetails['order_id'].'" title="Delete Invoice"><button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button></a></td>
              </tr>
            ';
        }       
        ?>
      </table>	
</div>	
