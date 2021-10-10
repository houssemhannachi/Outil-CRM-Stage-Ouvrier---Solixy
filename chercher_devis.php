<link rel="stylesheet" href="assets/css/bootstrap.min.css?v=<?php echo time(); ?>">
<link rel="stylesheet" href="assets/css/font-awesome.min.css?v=<?php echo time(); ?>">
<link rel="stylesheet" href="assets/css/line-awesome.min.css?v=<?php echo time(); ?>">
<link rel="stylesheet" href="assets/css/select2.min.css?v=<?php echo time(); ?>">
<link rel="stylesheet" href="assets/css/style.css?v=<?php echo time(); ?>">
<?php
require_once("db_conn.php");
$pageName = "Devis";
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
}

?>
<?php require "dashboard.php"; ?>
<div class="home-content">
	<div class="page-wrapper">
		<div class="content container-fluid">
			<div class="page-header">
				<div class="row align-items-center">
					<div class="col">
						<h3 class="page-title">Devis</h3>
						<ul class="breadcrumb">
							<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
							<li class="breadcrumb-item active">Devis</li>
						</ul>
					</div>
					<div class="col-auto float-right ml-auto">
						<a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_devis"><i class="fa fa-plus"></i>Ajouter un devis</a>
					</div>
				</div>
			</div>
			<div class="row filter-row">
				<form action="chercher_devis.php" method="POST">
					<div class="" style="float:left;">
						<div class="form-group form-focus">
							<input type="text" class="form-control floating" name="raison">
							<label class="focus-label">Raison sociale</label>
						</div>
					</div>
					<div class="" style="float:left;">
						<button type="submit" class="btn btn-success btn-block" name="submit-search"> Chercher un devis </button>
					</div>
				</form>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="table-responsive">
						<table class="table table-striped custom-table datatable">
							<thead>
								<tr>
									<th>Réference</th>
									<th>Client</th>
									<th>Date Devis</th>
									<th>Total</th>
									<th>Action</th>
								</tr>
							</thead>
							<?php



							if (isset($_POST['submit-search'])) {
								$recherche_rs = $_POST['raison'];

								$sql = "SELECT * FROM devis WHERE nom_client LIKE '%$recherche_rs%'";
								$result = mysqli_query($conn, $sql);
								$queryResult = mysqli_num_rows($result);
								if ($queryResult > 0) {
									while ($row = mysqli_fetch_assoc($result)) {

										$Nom_client = $row['nom_client'];
										$Reference = $row['id_devis'];
										$Date = $row['date'];
										$Total = $row['totalttc'];

							?>
										<tr>
											<td><?php echo $Reference ?></td>
											<td><?php echo $Nom_client ?></td>
											<td><?php echo $Date ?></td>
											<td><?php echo $Total ?></td>



											<td class=>
												<div class="dropdown dropdown-action">
													<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
													<div class="dropdown-menu dropdown-menu-right">
														<a class="dropdown-item editbtn"><i class="fa fa-pencil m-r-5"></i> Edit</a>
														<a class="dropdown-item deletebtn"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
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
								header('location:devis.php');
							}

?>

<?php include('footer.php') ?>