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
					<form action = "chercher_client.php" method ="POST" >
						<div class="col-sm-6 col-md-3"style="float:left;">  
							<div class="form-group form-focus">
								<input type="text" class="form-control floating" name="rsch">
								<label class="focus-label">Raison sociale</label>
							</div>
						</div>
						<div class="col-sm-6 col-md-3"style="float:left;">  
							<div class="form-group form-focus">
								<input type="text" class="form-control floating" name="refch">
								<label class="focus-label">Référence</label>
							</div>
						</div>
						<div class="col-sm-6 col-md-3 "style="float:left;">  
							<div class="form-group form-focus">
								<input type="text" class="form-control floating" name="telch">
								<label class="focus-label">Téléphone</label>
							</div>
						</div>

						<div class="col-sm-6 col-md-3" style="float:left;">  
							<button type="submit" class="btn btn-success btn-block" name="submit-search"> Chercher un client </button>
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
										<th>ID</th>
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
													<a class="dropdown-item editbtn"><i class="fa fa-pencil m-r-5"></i> Modifier</a>
													<a class="dropdown-item deletebtn"><i class="fa fa-trash-o m-r-5"></i> Supprimer</a>
													<a class="dropdown-item detailsbtn"><i class="fa fa-id-card m-r-5"></i> Détails</a>
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
							<form action = "ajouter_client.php" method ="POST">
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
							<form action ="modifier_client.php" method ="POST" >
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
			<div id="view_client" class="modal custom-modal fade" role="dialog">
				<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Détails</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<div class="row">
								<input type="hidden" name ="id" id="a">
								<div class="col-md-5">
													<div class="profile-info-left">
														<h3 class=" m-t-0 mb-0"><?php echo '<input class="view user-name " id="raison_sociale_cl" disabled>'?></h3>
														<h6 class="text-muted"> Forme juridque</h6>
														<small class="text-muted">Reference</small>
														<div class="small doj text-muted">RIB/RIP</div>
													</div>
												</div>
												<div class="col-md-7">
													<ul class="personal-info">
														<li>
															<div class="title">Email:</div>
															 <?php echo ' <div class="text"> <input class="view text" id="email_cl" disabled></div>'?>
														</li>
														<li>
															<div class="title">Téléphone:</div>
															<?php echo ' <div class="text"> <input class="view text" id="tel_cl" disabled></div>'?>
														</li>
														<li>
															<div class="title">Mat. Fiscale:</div>
															<?php echo ' <div class="text"> <input class="view text" id="matricule_cl" disabled></div>'?>
														</li>
														<li>
															<div class="title">Adresse:</div>
															<?php echo ' <div class="text"> <input class="view text" id="adresse_cl" disabled></div>'?>
														</li>
														<li>
															<div class="title">Ville:</div>
															<div class="text">xx</div>
														</li>
														<li>
															<div class="title">Pays:</div>
															<?php echo ' <div class="text"> <input class="view text" id="pays_cl" disabled></div>'?>
														</li>
														<li>
															<div class="title">Site web:</div>
															<div class="text">xx</div>
														</li>
														

													</ul>
												</div>
								</div>

							
						</div>
					</div>
				</div>
			</div>
			
		</div>
		<!-- /Page Wrapper -->
		
	</div>
	<!-- /Main Wrapper -->
	
	<!-- jQuery -->
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
