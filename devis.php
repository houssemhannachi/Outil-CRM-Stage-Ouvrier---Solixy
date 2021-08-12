<link rel="stylesheet" href="assets/css/bootstrap.min.css?v=<?php echo time();?>">
			
			<!-- Fontawesome CSS -->
			<link rel="stylesheet" href="assets/css/font-awesome.min.css?v=<?php echo time();?>">
			
			<!-- Lineawesome CSS -->
			<link rel="stylesheet" href="assets/css/line-awesome.min.css?v=<?php echo time();?>">
			
			<!-- Select2 CSS -->
			<link rel="stylesheet" href="assets/css/select2.min.css?v=<?php echo time();?>">
			
			<!-- Main CSS -->
			<link rel="stylesheet" href="assets/css/style.css?v=<?php echo time();?>">

<?php 
	require_once('db_conn.php');
	$query = "select * from devis";
	$result = mysqli_query($conn,$query);

?>
<?php
$pageName = "Devis";
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

?>
  <?php require "dashboard.php";?>
  
<!-- Main Wrapper -->
<div class="home-content">
		<div class="page-wrapper">
		
			<!-- Page Content -->
			<div class="content container-fluid">
			
				<!-- Page Header -->
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
				<!-- /Page Header -->
				
				<!-- Search Filter -->
				<div class="row filter-row">
					<form action = "chercher_devis.php" method ="POST" >
						<div class=""style="float:left;">  
							<div class="form-group form-focus">
								<input type="text" class="form-control floating" name="search">
								<label class="focus-label">Référence</label>
							</div>
						</div>

						<div class="" style="float:left;">  
							<button type="submit" class="btn btn-success btn-block" name="submit-search"> Chercher un devis </button>
						</div>
					</form>     
				</div>
				<!-- Search Filter -->

				<div class="row">
					<div class="col-md-12">
						<div class="table-responsive">
							<table class="table table-striped custom-table datatable">
								<thead>
									<tr>
										<th>Nom_client </th>
										<th>Identifiant </th>
										<th>Reference</th>
										<th>Adresse</th>
										<th>Date</th>
										<th>Designation</th>
										<th>Quantite</th>
										<th>TVA</th>
									</tr>
								</thead>
								
								<?php 
									while($row=mysqli_fetch_assoc($result)) {
										$identifiant = $row['id_client'];
										$nom_client = $row['nom_client'];
										$reference = $row['reference_client'];
										$adresse = $row['adresse_client'];
     									$date= $row['date'];
        								$designation = $row['designation'];
        								$quantite = $row['quantite'];
        								$TVA = $row['TVA'];
								?>
									<tr>
										<td><?php echo $nom_client?></td>
										<td><?php echo $identifiant?></td>	
										<td><?php echo $reference?></td>
										<td><?php echo $adresse?></td>
										<td><?php echo $date?></td>
										<td><?php echo $designation?></td>
										<td><?php echo $quantite?></td>
										<td><?php echo $TVA?></td>
										<td class=>
											<div class="dropdown dropdown-action">
												<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
												<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item editbtndevis"><i class="fa fa-pencil m-r-5"></i> Edit</a>
													<a class="dropdown-item deletebtn"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
												</div>
											</div>
										</td>
									</tr>
									<?php }
									?>

								
							</table>
						</div>
					</div>
				</div>
			</div>
			<!-- /Page Content -->
		
			<!-- Add Client Modal -->
			<div id="add_devis" class="modal custom-modal fade" role="dialog">
				<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Ajouter un devis</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form action="ajouter_devis.php" method="POST">
												<div class="form-row">
													<div class="col-md-4 mb-3">
														<label for="validationCustom01">Société et/ou Nom du client</label>
														<input type="text" class="form-control" id="validationCustom01" placeholder="Name" required="" name="nom">
														<div class="valid-feedback">
															Looks good!
														</div>
													</div>
													<div class="col-md-4 mb-3">
														<label for="validationCustom01">Identifiant </label>
														<input type="number" class="form-control" id="validationCustom01" placeholder="ID"  required="" name="identifiant">
														<div class="valid-feedback">
															Looks good!
														</div>
													</div>
													<div class="col-md-4 mb-3">
														<label for="validationCustom01">Adresse </label>
														<input type="text" class="form-control" id="validationCustom01" placeholder="Adresse" required="" name="adresse">
														<div class="valid-feedback">
															Looks good!
														</div>
													</div>
													
													<div class="col-md-4 mb-3">
														<label for="validationCustom01">Référence </label>
														<input type="text" class="form-control" id="validationCustom01" placeholder="Référence"  required="" name="reference">
														<div class="valid-feedback">
															Looks good!
														</div>
													</div>
													<div class="col-md-4 mb-3">
														<label for="validationCustom01">Date </label>
														<input type="date" class="form-control" id="validationCustom01" placeholder="Date" required="" name="date">
														<div class="valid-feedback">
															Looks good!
														</div>
													</div>
													<div class="col-md-4 mb-3">
														<label for="validationCustom01">Désignation</label>
														<input type="text" class="form-control" id="validationCustom01" placeholder="Désignation" required="" name="designation">
														<div class="valid-feedback">
															Looks good!
														</div>
													</div>
													
													<div class="col-md-4 mb-3">
														<label for="validationCustom01">Quantité </label>
														<input type="number" class="form-control" id="validationCustom01" placeholder="0" required="" name="quantite">
														<div class="valid-feedback">
															Looks good!
														</div>
													</div>
													<div class="col-md-4 mb-3">
														<label for="validationCustom01">TVA à </label>
														<input type="number" class="form-control" id="validationCustom01" placeholder="0" required="" name="TVA">
														<div class="valid-feedback">
															Looks good!
														</div>
													</div>
												</div>
												<div class="form-group">
													<div class="form-check">
														<input class="form-check-input" type="checkbox" value="" id="invalidCheck" required="">
														<label class="form-check-label" for="invalidCheck">
															Agree to terms and conditions
														</label>
														<div class="invalid-feedback">
															You must agree before submitting.
														</div>
													</div>
												</div>
												<div>
												<button class="btn btn-primary" type="submit" name="submit">Submit</button>
												<button class="btn btn-primary" type="submit" >Print</button>
												</div>
											</form>
						</div>
					</div>
				</div>
			</div>
			<!-- /Add Client Modal -->
			
			<!-- Edit Client Modal -->
			<div id="edit_devis" class="modal custom-modal fade" role="dialog">
				<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Modifier</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form action ="modifier_devis.php" method ="POST" >
							<div class="row">
								<input type="hidden" name ="id" id="id">
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label">Nom client <span class="text-danger">*</span></label>
											<input class="form-control" type="text" name="nom" id="nom">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label">Identifiant <span class="text-danger">*</span></label>
											<input class="form-control" type="number" name="nom" id="identifiant">
										</div>
									</div>
								    <div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label">Adresse <span class="text-danger">*</span></label>
											<input class="form-control floating" type="text" name="adresse" id="adresse">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label">Référence <span class="text-danger">*</span></label>
											<input class="form-control" type="text" name="reference" id="reference">
										</div>
									</div>
									
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label">Date <span class="text-danger">*</span></label>
											<input class="form-control" type="date" id="date" name="date">
										</div>
									</div>
									<div class="col-md-6">  
										<div class="form-group">
											<label class="col-form-label">Désignation<span class="text-danger">*</span></label>
											<input class="form-control floating" type="text" id="designation" name="designation">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label">Quantité <span class="text-danger">*</span> </label>
											<input class="form-control" type="number" id="quantite" name="quantite">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label">TVA <span class="text-danger">*</span> </label>
											<input class="form-control" type="number" id="TVA" name="TVA">
										</div>
									</div>
								</div>
								<div class="submit-section">
									<button class="btn btn-primary submit-btn " name = "update">Enregistrer</button>
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
						<form action ="effacer_client.php" method="POST">
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
			<!-- /Delete Client Modal -->
			
		</div>
		<!-- /Page Wrapper -->
		
	</div>
	<!-- /Main Wrapper -->
	
	<!-- jQuery -->
	<script src="assets/js/jquery-3.5.1.min.js"></script>
	
	<!-- Bootstrap Core JS -->
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	
	<!-- Slimscroll JS -->
	<script src="assets/js/jquery.slimscroll.min.js"></script>
	
	<!-- Datatable JS -->
	<script src="assets/js/jquery.dataTables.min.js"></script>
	<script src="assets/js/dataTables.bootstrap4.min.js"></script>
	
	<!-- Select2 JS -->
	<script src="assets/js/select2.min.js"></script>
	
	<!-- Custom JS -->
	<script src="assets/js/app.js"></script>	
</section>


<script src="script.js?v=<?php echo time();?>"></script>
</body>
</html>
<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?> 
