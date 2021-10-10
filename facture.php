<?php
session_start();
$pageName = "Factures";
include('dashboard.php');
include 'Invoice.php';

$invoice = new Invoice();

?>

<script src="js/invoice.js?v=<?php echo time(); ?>"></script>
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
				<form action="chercher_facture.php" method="POST">
					<div class="col-sm-8 col-md-4" style="float:left;">
						<div class="form-group form-focus">
							<input type="text" class="form-control floating" name="numfch">
							<label class="focus-label">N° Facture</label>
						</div>
					</div>
					<div class="col-sm-8 col-md-4" style="float:left;">
						<div class="form-group form-focus">
							<input type="text" class="form-control floating" name="clientch">
							<label class="focus-label">Client</label>
						</div>
					</div>


					<div class="" style="float:left;">
						<button type="submit" class="btn btn-success btn-block" name="submit-search"> Chercher une facture </button>
					</div>
				</form>
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
									<th>Tranche à payer</th>
									<th>Action</th>
								</tr>
							</thead>

							<?php
							$invoiceList = $invoice->getInvoiceList();
							foreach ($invoiceList as $invoiceDetails) {
								$invoiceDate = date("d/M/Y, H:i:s", strtotime($invoiceDetails["order_date"]));
								$date = date('d-m-y');
								echo '
              <tr>
                <td>' . $invoiceDetails["id_facture"] . '</td>
                <td>' . $invoiceDetails["rs_client"] . '</td>
                <td>' . $date . '</td>
                <td>' . $invoiceDetails["order_total_after_tax"] . ' DT</td>
				<td>' . $invoiceDetails["order_total_amount_due"] . ' DT</td>
				<td class=>
											<div class="dropdown dropdown-action">
												<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
												<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" href="imprimer_facture.php?invoice_id=' . $invoiceDetails["id_facture"] . '"><i class="fa fa-print"></i> Imprimer</a>
												<a class="dropdown-item" href="modifier_facture.php?update_id=' . $invoiceDetails["id_facture"] . '"><i class="fa fa-edit"></i> Modifier</a>
												<a class="dropdown-item" href="effacer_facture.php?order_id=' . $invoiceDetails['id_facture'] . '"><i class="fa fa-trash"></i> Supprimer</a>
												</div>
											</div>
										</td>

              </tr>
            ';
							}
							?>
						</table>
					</div>
					<?php include('footer.php') ?>