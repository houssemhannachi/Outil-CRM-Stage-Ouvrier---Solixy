
<link rel="stylesheet" href="assets/css/styleinvoice.css?v=<?php echo time();?>">
<link rel="stylesheet" href="assets/css/bootstrap.min.css?v=<?php echo time();?>">
<link rel="stylesheet" href="assets/css/font-awesome.min.css?v=<?php echo time();?>">
<link rel="stylesheet" href="assets/css/line-awesome.min.css?v=<?php echo time();?>">
<link rel="stylesheet" href="assets/css/select2.min.css?v=<?php echo time();?>">
<link rel="stylesheet" href="assets/css/styles.css?v=<?php echo time();?>">
<?php 
session_start();
$pageName ="Factures";
include('dashboard.php');
include 'Invoice.php';

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
							<label class="focus-label">N° Facture</label>
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

				              	<div class="col-md-12">
					              	<div class="table-responsive">
                                <table id="data-table" class="table table-striped custom-table datatable">
                                    <thead>
                                       <tr>
                                          <th>N° Facture</th>
                                          <th>Client</th>
                                          <th> Date Facture</th>
                                          <th>Total</th>
										  <th>Action</th>

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
				<td class=>
											<div class="dropdown dropdown-action">
												<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
												<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" href="imprimer_facture.php?invoice_id='.$invoiceDetails["order_id"].'"><i class="fa fa-print"></i> Imprimer</a>
												<a class="dropdown-item" href="modifier_facture.php?update_id='.$invoiceDetails["order_id"].'"><i class="fa fa-edit"></i> Modifier</a>
												<a class="dropdown-item" href="effacer_facture.php?order_id='.$invoiceDetails['order_id'].'"><i class="fa fa-trash"></i> Supprimer</a>
												</div>
											</div>
										</td>

              </tr>
            ';
        }       
        ?>
      </table>	
</div>	
