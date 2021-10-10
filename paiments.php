<?php
require_once('db_conn.php');
$query = "select * from paiements";
$result = mysqli_query($conn, $query);

?>

<?php
$pageName = "Paiements";
session_start();
include 'Invoice.php';
$paiement = new Invoice();
if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

?>
	<?php require "dashboard.php"; ?>

	<div class="home-content">
		<div class="page-wrapper">

			<div class="content container-fluid">

				<div class="page-header">
					<div class="row align-items-center">
						<div class="col">
							<h3 class="page-title">Paiements</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
								<li class="breadcrumb-item active">Paiements</li>
							</ul>
						</div>
						<div class="col-auto float-right ml-auto">
							<a href="ajouter_paiement.php" class="btn add-btn"><i class="fa fa-plus"></i>Ajouter un paiement</a>
						</div>
					</div>
				</div>

				<div class="row filter-row">
					<form action="chercher_paiement.php" method="POST">
						<div class="" style="float:left;">
							<div class="form-group form-focus">
								<input type="text" class="form-control floating" name="tranch">
								<label class="focus-label">N° Transaction</label>
							</div>
						</div>
						<div class="" style="float:left;">
							<div class="form-group form-focus">
								<input type="text" class="form-control floating" name="factch">
								<label class="focus-label">N° Facture</label>
							</div>
						</div>


						<div class="" style="float:left;">
							<button type="submit" class="btn btn-success btn-block" name="submit-search"> Chercher un paiement </button>
						</div>
					</form>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="table-responsive">
							<table class="table table-striped custom-table mb-0 datatable">
								<thead>
									<tr>
										<th>N° Transaction</th>
										<th>Date</th>
										<th>Client</th>
										<th>Mode de paiement</th>
										<th>N° Facture</th>
										<th>Prix</th>
										<th>Statuts</th>
										<th>Action</th>
									</tr>
								</thead>
								<?php
								$paiementList = $paiement->getPaiementList();
								foreach ($paiementList as $paiementDetails) {

									echo '
              <tr>
                <td>' . $paiementDetails["id_paiement"] . '</td>
                <td>' . $paiementDetails["date_paiement"] . '</td>
                <td><a href="profile_client.php?id=' . $paiementDetails["id_client"] . '">' . $paiementDetails["rs_client"] . '</a></td>
                <td>' . $paiementDetails["mode_de_paiement"] . '</td>
				<td><a href="imprimer_facture.php?invoice_id=' . $paiementDetails["id_facture"] . '">' . $paiementDetails["id_facture"] . '</a></td>
				<td>' . $paiementDetails["prix"] . '</td>
				<td>' . $paiementDetails["status_paiement"] . '</td>
				<td class=>
											<div class="dropdown dropdown-action">
												<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
												<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" href="modifier_paiement.php?update_id=' . $paiementDetails["id_paiement"] . '"><i class="fa fa-edit"></i> Modifier</a>
												<a class="dropdown-item" href="effacer_paiement.php?id_paiement=' . $paiementDetails['id_paiement'] . '"><i class="fa fa-trash"></i> Supprimer</a>
												</div>
											</div>
										</td>

              </tr>
            ';
								}
								?>
							</table>
						</div>
					</div>
				</div>
			</div>



		</div>

	</div>

	<?php include('footer.php') ?>
<?php
} else {
	header("Location: index.php");
	exit();
}
?>