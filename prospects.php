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
	$query = "select * from propects";
	$result = mysqli_query($conn,$query);
?>
<?php
$pageName = "Prospects";
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

?>
<?php require "dashboard.php";?>
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
								<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
								<li class="breadcrumb-item active">Prospects</li>
							</ul>
						</div>
						<div class="col-auto float-right ml-auto">
							<a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_prospect"><i class="fa fa-plus"></i>Ajouter un Prospect</a>
						</div>
					</div>
				</div>
				<!-- /Page Header -->
				
				<!-- Search Filter -->
				<div class="row filter-row">
					<form action = "chercher_prospect.php" method ="POST" >
						<div class="col-sm-8 col-md-4"style="float:left;">  
							<div class="form-group form-focus">
								<input type="text" class="form-control floating" name="rsch">
								<label class="focus-label">Raison sociale</label>
							</div>
						</div>
						<div class="col-sm-8 col-md-4"style="float:left;">  
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
				<!-- Search Filter -->

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
										<th>Action</th>
									</tr>
								</thead>
								<?php 
									while($row=mysqli_fetch_assoc($result)) {
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
										<td class="none"><?php echo $id?></td>
										<td><?php echo $rs?></td>
										<td><?php echo $email?></td>
										<td><?php echo $adresse?></td>
										<td class="none"><?php echo $ville?></td>
										<td><?php echo $pays?></td>
										<td><?php echo $tel?></td>
										<td><?php echo $fb?></td>
                                        <td><?php echo $sw?></td>
										<td class=>
											<div class="dropdown dropdown-action">
												<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
												<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item editbtnprospect"><i class="fa fa-pencil m-r-5"></i> Edit</a>
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
		
			<!-- Ajouter Prospect -->
			<div id="add_prospect" class="modal custom-modal fade" role="dialog">
				<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Ajouter un propsect</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form action = "ajouter_prospect.php" method ="POST">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label">Raison Sociale<span class="text-danger">*</span></label>
											<input class="form-control" name ="rs" type="text">
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
											<label class="col-form-label">Adresse <span class="text-danger">*</span></label>
											<input class="form-control" name ="adresse" type="text">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label">Ville <span class="text-danger">*</span></label>
											<input class="form-control floating" name ="ville" type="text">
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
											<label class="col-form-label">Facebook <span class="text-danger">*</span> </label>
											<input class="form-control" name="fb" type="text">
										</div>
									</div>
                                    <div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label">Site Web <span class="text-danger">*</span> </label>
											<input class="form-control" name="sw" type="text">
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
			<!-- /Ajouter Prospect Modal -->
			
			<!-- Modifier prospect -->
			<div id="edit_prospect" class="modal custom-modal fade" role="dialog">
				<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Modifier</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form action ="modifier_prospect.php" method ="POST" >
							<div class="row">
								<input type="hidden" name ="id" id="id">
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label">Raison Sociale <span class="text-danger">*</span></label>
											<input class="form-control" type="text" name="rs" id="rs">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label">E-mail  <span class="text-danger">*</span></label>
											<input class="form-control" type="text" name="email" id="email">
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
											<label class="col-form-label">Ville <span class="text-danger">*</span> </label>
											<input class="form-control" type="text" id="ville" name="ville">
										</div>
									</div>
                                    <div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label">facebook <span class="text-danger">*</span> </label>
											<input class="form-control" type="text" id="fb" name="fb">
										</div>
									</div>
                                    <div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label">Site Web <span class="text-danger">*</span> </label>
											<input class="form-control" type="text" id="sw" name="sw">
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
						<form action ="effacer_prospect.php" method="POST">
						<input type="hidden" name="delete_id" id="delete_id">
						<div class="modal-body">
							<div class="form-header">
								<h3>Supprimer ce prospect</h3>
								<p>Êtes-vous sûr de vouloir supprimer?</p>
							</div>
							<div class="modal-btn delete-action">
								
								<div class="row">
									<div class="col-6">
										<button type="submit" name="deletedata" class="btn btn-primary continue-btn">Supprimer</a>
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
	
	<script src="assets/js/jquery-3.5.1.min.js?v=<?php echo time();?>""></script>
	<script src="assets/js/popper.min.js?v=<?php echo time();?>""></script>
	<script src="assets/js/bootstrap.min.js?v=<?php echo time();?>"></script>
	<script src="assets/js/jquery.slimscroll.min.js?v=<?php echo time();?>"></script>
	<script src="assets/js/jquery.dataTables.min.js?v=<?php echo time();?>"></script>
	<script src="assets/js/dataTables.bootstrap4.min.js?v=<?php echo time();?>"></script>
	<script src="assets/js/select2.min.js?v=<?php echo time();?>"></script>
	<script src="assets/js/app.js?v=<?php echo time();?>"></script>	
	<script src="script.js?v=<?php echo time();?>"></script>	
</section>

</body>
</html>
<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?> 
