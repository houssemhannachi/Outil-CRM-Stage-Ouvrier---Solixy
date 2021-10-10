<?php
require_once("db_conn.php");
$pageName = "Paiements";
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
}

?>
<?php require "dashboard.php"; ?>
<div class="home-content">
	<div class="page-wrapper">

		<!-- Page Content -->
		<div class="content container-fluid">

			<!-- Page Header -->
			<div class="page-header">
				<div class="row align-items-center">
					<div class="col">
						<h3 class="page-title">Paiements</h3>
						<ul class="breadcrumb">
							<li class="breadcrumb-item"><a href="home.php">Dashboard</a></li>
							<li class="breadcrumb-item">Paiements</li>
							<li class="breadcrumb-item active">Chercher paiement</li>
						</ul>
					</div>

				</div>
			</div>
			<!-- /Page Header -->

			<div class="row">
				<div class="col-md-12">
					<div class="table-responsive">
						<table class="table table-striped custom-table datatable">
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
							if (isset($_POST['submit-search'])) {
								$recherche_tran = $_POST['tranch'];
								$recherche_fact = $_POST['factch'];


								$sql = "SELECT * FROM paiements WHERE id_paiement LIKE '%$recherche_tran%' AND id_facture LIKE '%$recherche_fact%' ";
								$result = mysqli_query($conn, $sql);
								$queryResult = mysqli_num_rows($result);
								if ($queryResult > 0) {
									while ($row = mysqli_fetch_assoc($result)) {
										$id_paiement = $row['id_paiement'];
										$id_client = $row['id_client'];

										$date_paiement = $row['date_paiement'];
										$mode_de_paiement = $row['mode_de_paiement'];
										$id_facture  = $row['id_facture'];
										$prix = $row['prix'];
										$status_paiement = $row['status_paiement'];
							?>
										<tr>
											<td><?php echo $id_paiement ?></td>
											<td><?php echo $date_paiement ?></td>
											<td><a href="profile_client.php?id=<?php echo $id_client; ?>"><?php echo $id_client ?></a></td>

											<td><?php echo $mode_de_paiement ?></td>
											<td><a href="imprimer_facture.php?invoice_id=<?php echo $id_facture; ?>"><?php echo $id_facture ?></a></td>
											<td><?php echo $prix ?></td>
											<td><?php echo  '<span class="badge bg-inverse-info">' . $status_paiement . '</span>' ?></td>
											<td class=>
												<div class="dropdown dropdown-action">
													<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
													<div class="dropdown-menu dropdown-menu-right">
														<a class="dropdown-item detailsbtn"><i class="fa fa-id-card m-r-5"></i> Détails</a>
														<a class="dropdown-item editbtnpaiement"><i class="fa fa-pencil m-r-5"></i> Modifier</a>
														<a class="dropdown-item deletebtnpaiement"><i class="fa fa-trash-o m-r-5"></i> Supprimer</a>
													</div>
												</div>
											</td>
										</tr>
									<?php } ?>


						</table>
					</div>
				</div>
			</div>
		</div>

<?php
								} else {
									echo '<tr style="background-color:initial"> <td >Aucune donnée disponible</td> </tr>';
								}
							} else {
								header('location:clients.php');
							}

?>
<div id="edit_client" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Modifier</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="modifier_client.php" method="POST">
					<div class="row">
						<input type="hidden" name="id" id="id">
						<div class="col-md-6">
							<div class="form-group">
								<label class="col-form-label">Raison sociale <span class="text-danger">*</span></label>
								<input class="form-control" name="raisonsociale" id="raisonsociale" type="text">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="col-form-label">Référence<span class="text-danger">*</span></label>
								<input class="form-control" name="reference" id="reference" type="text">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="col-form-label">Forme juridique <span class="text-danger">*</span></label>
								<input class="form-control" name="formejuridique" id="formejuridique" type="text">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="col-form-label">Email <span class="text-danger">*</span></label>
								<input class="form-control floating" name="email" id="email" type="text">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="col-form-label">Adresse<span class="text-danger">*</span></label>
								<input class="form-control" name="adresse" id="adresse" type="text">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="col-form-label">Ville <span class="text-danger">*</span></label>
								<input class="form-control floating" name="ville" id="ville" type="text">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="col-form-label">Pays <span class="text-danger">*</span> </label>
								<input class="form-control" name="pays" id="pays" type="text">
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label class="col-form-label">Téléphone <span class="text-danger">*</span> </label>
								<input class="form-control" name="telephone" id="telephone" type="text">
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label class="col-form-label">Site web<span class="text-danger">*</span> </label>
								<input class="form-control" name="siteweb" id="siteweb" type="text">
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label class="col-form-label">Matricule fiscale <span class="text-danger">*</span> </label>
								<input class="form-control" name="matriculefiscale" id="matriculefiscale" type="text">
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label class="col-form-label">RIB/RIP <span class="text-danger">*</span> </label>
								<input class="form-control" name="ribrip" id="ribrip" type="text">
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label class="col-form-label">Taux T.V.A<span class="text-danger">*</span> </label>
								<input class="form-control" name="tauxtva" id="tauxtva" type="text">
							</div>
						</div>
					</div>
					<div class="submit-section">
						<button class="btn btn-primary submit-btn " name="update">Enregistrer</button>

					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- /Edit Client Modal -->

<!-- Delete Client Modal -->
<div class="modal custom-modal fade" id="delete_client" role="dialog">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<form action="effacer_client.php" method="POST">
				<input type="hidden" name="delete_id" id="delete_id">
				<div class="modal-body">
					<div class="form-header">
						<h3>Supprimer ce client</h3>
						<p>Êtes-vous sûr de vouloir supprimer?</p>
					</div>
					<div class="modal-btn delete-action">

						<div class="row">
							<div class="col-6">
								<button type="submit" name="deletedata" class="btn btn-primary continue-btn">Suprrimer</a>
							</div>
							<div class="col-6">
								<button type="button" data-dismiss="modal" class="btn btn-primary cancel-btn">Annuler</a>
							</div>
						</div>
					</div>
				</div>
		</div>
	</div>
</div>
<?php include('footer.php') ?>