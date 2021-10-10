<?php
require_once("db_conn.php");
$pageName = "Prospects";
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
						<h3 class="page-title">Prospects</h3>
						<ul class="breadcrumb">
							<li class="breadcrumb-item"><a href="home.php">Dashboard</a></li>
							<li class="breadcrumb-item active">Prospects</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="row filter-row">
				<form action="chercher_prospect.php" method="POST">
					<div class="" style="float:left;">
						<div class="form-group form-focus">
							<input type="text" class="form-control floating" name="rsch">
							<label class="focus-label">Raison sociale</label>
						</div>
					</div>
					<div class="" style="float:left;">
						<div class="form-group form-focus">
							<input type="text" class="form-control floating" name="telch">
							<label class="focus-label">Téléphone</label>
						</div>
					</div>

					<div class="" style="float:left;">
						<button type="submit" class="btn btn-success btn-block" name="submit-search"> Chercher un prospect </button>
					</div>
				</form>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<table class="table table-striped custom-table datatable">
						<thead>
							<tr>
								<th class="none">ID</th>
								<th>Raison sociale </th>
								<th>Email</th>
								<th>Adresse</th>
								<th class="none">Ville</th>
								<th>Pays</th>
								<th>Téléphone</th>
								<th>Facebook</th>
								<th>Site Web</th>
							</tr>
						</thead>
						<?php
						if (isset($_POST['submit-search'])) {
							$recherche_rs = $_POST['rsch'];
							$recherche_tel = $_POST['telch'];

							$sql = "SELECT * FROM propects WHERE rs_prospect LIKE '%$recherche_rs%' AND tel_prospect LIKE '%$recherche_tel%'  ";
							$result = mysqli_query($conn, $sql);
							$queryResult = mysqli_num_rows($result);
							if ($queryResult > 0) {
								while ($row = mysqli_fetch_assoc($result)) {
									$id = $row['id_prospect'];
									$rs = $row['rs_prospect'];
									$email = $row['email_prospect'];
									$adresse = $row['adresse_prospect'];
									$ville = $row['ville_prospect'];
									$pays = $row['pays_prospect'];
									$tel = $row['tel_prospect'];
									$fb = $row['facebook_prospect'];
									$sw = $row['siteweb_prospect'];
						?>
									<tr>
										<td class="none"><?php echo $id ?></td>
										<td><?php echo $rs ?></td>
										<td><?php echo $email ?></td>
										<td><?php echo $adresse ?></td>
										<td class="none"><?php echo $ville ?></td>
										<td><?php echo $pays ?></td>
										<td><?php echo $tel ?></td>
										<td><?php echo $fb ?></td>
										<td><?php echo $sw ?></td>

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
							header('location:prospects.php');
						}

?>
<?php include('footer.php') ?>