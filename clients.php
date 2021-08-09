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
	$query = "select * from clients";
	$result = mysqli_query($conn,$query);
?>
<?php
$pageName = "Clients";
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
							<h3 class="page-title">Clients</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
								<li class="breadcrumb-item active">Clients</li>
							</ul>
						</div>
						<div class="col-auto float-right ml-auto">
							<a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_client"><i class="fa fa-plus"></i>Ajouter un client</a>
						</div>
					</div>
				</div>
				<!-- /Page Header -->
				
				<!-- Search Filter -->
				<div class="row filter-row">
					<div class="col-sm-6 col-md-3">  
						<div class="form-group form-focus">
							<input type="text" class="form-control floating">
							<label class="focus-label">Client ID</label>
						</div>
					</div>
					<div class="col-sm-6 col-md-3">  
						<div class="form-group form-focus">
							<input type="text" class="form-control floating">
							<label class="focus-label">Client Name</label>
						</div>
					</div>
					<div class="col-sm-6 col-md-3">  
						<div class="form-group form-focus">
							<input type="text" class="form-control floating">
							<label class="focus-label">Email	</label>
						</div>
					</div>	
					<div class="col-sm-6 col-md-3">  
						<a href="#" class="btn btn-success btn-block"> Search </a>  
					</div>     
				</div>
				<!-- Search Filter -->

				<div class="row">
					<div class="col-md-12">
						<div class="table-responsive">
							<table class="table table-striped custom-table datatable">
								<thead>
									<tr>
										<th> ID </th>
										<th>Nom </th>
										<th>Référence</th>
										<th>Adresse</th>
										<th>Email</th>
										<th>Téléphone</th>
										<th>Pays</th>
										<th>Matricule</th>
										<th>Action</th>
									</tr>
								</thead>
								<?php 
									while($row=mysqli_fetch_assoc($result)) {
										$id = $row['id_client'];
										$nom = $row['nom_client'];
										$reference = $row['reference_client'];
										$adresse = $row['adresse_client'];
     									$email = $row['email_client'];
        								$pays = $row['pays_client'];
        								$tel = $row['tel_client'];
        								$matricule = $row['matricule_client'];
								?>
									<tr>
										<td><?php echo $id?></td>
										<td><?php echo $nom?></td>
										<td><?php echo $reference?></td>
										<td><?php echo $adresse?></td>
										<td><?php echo $email?></td>
										<td><?php echo $tel?></td>
										<td><?php echo $pays?></td>
										<td><?php echo $matricule?></td>
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
									<?php }
									?>
								
							</table>
						</div>
					</div>
				</div>
			</div>
			<!-- /Page Content -->
		
			<!-- Add Client Modal -->
			<div id="add_client" class="modal custom-modal fade" role="dialog">
				<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Ajouter un Client</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form action = "ajouter.php" method ="POST">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label">Nom <span class="text-danger">*</span></label>
											<input class="form-control" name ="nom" type="text">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label">E-mail <span class="text-danger">*</span></label>
											<input class="form-control" name ="email" type="email">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label">Référence <span class="text-danger">*</span></label>
											<input class="form-control" name ="reference" type="text">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label">Adresse <span class="text-danger">*</span></label>
											<input class="form-control floating" name ="adresse" type="text">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label">Pays <span class="text-danger">*</span></label>
											<input class="form-control" name ="pays" type="text">
										</div>
									</div>
									<div class="col-md-6">  
										<div class="form-group">
											<label class="col-form-label">Téléphone <span class="text-danger">*</span></label>
											<input class="form-control floating" name="tel" type="tel">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label">Matricule fiscale <span class="text-danger">*</span> </label>
											<input class="form-control" name="matricule" type="text">
										</div>
									</div>
								</div>
								<div class="submit-section">
									<button class="btn btn-primary submit-btn" name ="submit">Enregistrer</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- /Add Client Modal -->
			
			<!-- Edit Client Modal -->
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
							<form action ="update.php" method ="POST" >
							<div class="row">
								<input type="hidden" name ="id" id="id">
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label">Nom <span class="text-danger">*</span></label>
											<input class="form-control" type="text" name="nom" id="nom">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label">E-mail <span class="text-danger">*</span></label>
											<input class="form-control" type="text" name="email" id="email">
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
											<label class="col-form-label">Adresse <span class="text-danger">*</span></label>
											<input class="form-control floating" type="text" name="adresse" id="adresse">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label">Pays <span class="text-danger">*</span></label>
											<input class="form-control" type="text" id="pays" name="pays">
										</div>
									</div>
									<div class="col-md-6">  
										<div class="form-group">
											<label class="col-form-label">Téléphone <span class="text-danger">*</span></label>
											<input class="form-control floating" type="text" id="tel" name="tel">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label">Matricule fiscale <span class="text-danger">*</span> </label>
											<input class="form-control" type="text" id="matricule" name="matricule">
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
						<form action ="deletecode.php" method="POST">
						<input type="hidden" name="delete_id" id="delete_id">
						<div class="modal-body">
							<div class="form-header">
								<h3>Delete Client</h3>
								<p>Are you sure want to delete?</p>
							</div>
							<div class="modal-btn delete-action">
								
								<div class="row">
									<div class="col-6">
										<button type="submit" name="deletedata" class="btn btn-primary continue-btn">Delete</a>
									</div>
									<div class="col-6">
										<button type="button" data-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
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
