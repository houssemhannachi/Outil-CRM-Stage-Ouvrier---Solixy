<?php
session_start();
$pageName = "Paiements";
include 'dashboard.php';

require_once('db_conn.php');
include 'Invoice.php';

$paiement = new Invoice();


if (!empty($_POST['id_client'])) {
	$paiement->savePaiement($_POST);
	header("Location:paiments.php");
}
?>

?>
<div class="home-content">
	<div class="page-wrapper">
		<div class="content container-fluid">
			<div class="page-header">
				<div class="row">
					<div class="col">
						<h3 class="page-title">Ajouter un paiement</h3>
						<ul class="breadcrumb">
							<li class="breadcrumb-item"><a href="home.php">Dashboard</a></li>
							<li class="breadcrumb-item">Paiements</li>
							<li class="breadcrumb-item active">Ajouter un paiement</li>

						</ul>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="card">
						<div class="card-header">
							<h4 class="card-title mb-0">Paiement</h4>
						</div>
						<div class="card-body">
							<div class="form-group row">
								<label class="col-form-label col-md-2">Référence Client</label>
								<div class="form-recherche col-md-10">
									<form action="" method="POST">
										<input type="text" class="recherche_input" name="ref_client" id="ref_client" placeholder="REF client" autocomplete="off">
										<label class="col-form-label col-md-2">&nbsp &nbsp N° Facture</label>
										<input type="number" class="recherche_input" name="n_facture" id="n_facture" placeholder="Numéro facture" autocomplete="off">
										<button name="search" class="btn btn-success  "> Trouver ce client </button>
									</form>
								</div>
							</div>
							<form action="" method="post">
								<?php if (isset($_POST['search']) and !empty($_POST)) {
									$recherche_rs = $_POST['ref_client'];
									$recherche_f = $_POST['n_facture'];
									$sql = "SELECT * FROM clients c, facture f WHERE c.ref_client LIKE '%$recherche_rs%' AND f.id_facture LIKE '%$recherche_f%'";
									$result = mysqli_query($conn, $sql);
									$queryResult = mysqli_num_rows($result);

									if ($queryResult > 0) {
										while ($row = mysqli_fetch_assoc($result)) {
											$id_client = $row['id_client'];
											$rs_client = $row['rs_client'];
											$id_facture = $row['id_facture'];
											$p_facture = $row['order_total_after_tax'];

								?>

											<?php echo '<input type="hidden" id="id_client" name="id_client" value="' . $id_client . '" readonly>' ?>
											<?php echo '<div class="form-group row">
											<label class="col-form-label col-md-2">Client</label>
											<div class="col-md-10">
												<input type="text" class="form-control"  name="raison" value="' . $rs_client . '" readonly >
											</div>
										</div>' ?>
											<?php echo '<div class="form-group row">
											<label class="col-form-label col-md-2">N° Facture</label> 
											<div class="col-md-10">
											<input type="text" class="form-control" id="id_facture" name="id_facture" value="' . $id_facture . '" readonly> </div>
											</div>' ?>
											<div class="form-group row">
												<label class="col-form-label col-md-2">Date</label>
												<div class="col-md-10">
													<input type="date" class="form-control" name="date_paiement">
												</div>
											</div>

											<div class="form-group row">
												<label class="col-form-label col-md-2">Moyen de paiement</label>
												<div class="col-md-10">
													<select class="form-control" name="mode_de_paiement">
														<option>Moyen de paiement</option>
														<option value="Virement bancaire">Virement bancaire</option>
														<option value="Chèque">Chèque</option>
														<option value="Espèces">Espèces</option>
														<option value="Versement">Versement</option>
													</select>
												</div>
											</div>


											<div class="form-group row">
												<label class="col-form-label col-md-2">Statuts</label>
												<div class="col-md-10">
													<input type="text" class="form-control" name="status_paiement">
												</div>
											</div>


											<div class="form-group mb-0 row">
												<label class="col-form-label col-md-2">Prix</label>
												<div class="col-md-10">
													<div class="input-group">
														<div class="input-group-prepend">
															<span class="input-group-text">DT</span>
														</div>
														<?php echo '<input class="form-control" type="text" name="prix" value="' . $p_facture . '" >' ?>
														<div class="input-group-append">
															<button class="btn btn-primary" type="submit" name="submit">Enregistrer</button>
														</div>
													</div>
												</div>
											</div>
							</form>
						</div>
					</div>


				<?php } ?>
		<?php
									} else {
										echo 'Aucun client trouvé';
									}
								} else {
									echo '';
								}

		?>

				</div>
			</div>
		</div>
	</div>
	<?php include 'footer.php' ?>