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
								<li class="breadcrumb-item"><a href="home.php">Dashboard</a></li>
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
										<th>Référence</th>
										<th>Raison sociale</th>
										<th>Adresse</th>
										<th>Email</th>
										<th>Téléphone</th>
										<th>Pays</th>
										<th  class="none">Matricule Fiscale</th>
										<th  class="none">Forme juridique</th>
										<th  class="none">Ville</th>
										<th  class="none">Site Web</th>
										<th  class="none">RIB/RIP</th>
										<th  class="none">Taux TVA</th>
										<th>Action</th>
									</tr>
								</thead>
								
								<?php 
									while($row=mysqli_fetch_assoc($result)) {
										
										$id_client = $row['id_client'];
										$ref_client = $row['ref_client'];
										$rs_client = $row['rs_client'];
										$fj_client = $row['fj_client'];
     									$email_client = $row['email_client'];
        								$adresse_client = $row['adresse_client'];
        								$ville_client = $row['ville_client'];
        								$pays_client = $row['pays_client'];
										$tel_client = $row['tel_client'];
										$sw_client = $row['sw_client'];
										$mf_client = $row['mf_client'];
										$riprib_client = $row['riprib_client'];
										$tauxtva_client = $row['tauxtva_client'];
								?>
									<tr>
										<td><?php echo $id_client?></td>
										
										<td><?php echo $ref_client?></td>
										<td><?php echo $rs_client?></td>
										<td><?php echo $adresse_client?></td>
										<td><?php echo $email_client?></td>
										<td><?php echo $tel_client?></td>
										<td><?php echo $pays_client?></td>
										<td  class="none"><?php echo$mf_client?></td>
										<td  class="none"><?php echo$fj_client?></td>
										<td  class="none"><?php echo$ville_client?></td>
										<td  class="none"><?php echo$sw_client?></td>
										<td  class="none"><?php echo$riprib_client?></td>
										<td  class="none"><?php echo$tauxtva_client?></td>
										<td class=>
											<div class="dropdown dropdown-action">
												<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
												<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item " href="profile_client.php?id=<?php echo $row['id_client'];?>"><i class="fa fa-id-card m-r-5"></i> Profile</a>
													
													<a class="dropdown-item editbtn"><i class="fa fa-pencil m-r-5"></i> Modifier</a>
													<a class="dropdown-item deletebtn"><i class="fa fa-trash-o m-r-5"></i> Supprimer</a>
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
											<label class="col-form-label">Raison sociale <span class="text-danger">*</span></label>
											<input class="form-control" name ="raisonsociale" type="text">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label">Référence<span class="text-danger">*</span></label>
											<input class="form-control" name ="reference" type="text">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label">Forme juridique <span class="text-danger">*</span></label>
											<input class="form-control" name ="formejuridique" type="text">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label">Email <span class="text-danger">*</span></label>
											<input class="form-control floating" name ="email" type="text">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label">Adresse<span class="text-danger">*</span></label>
											<input class="form-control" name ="adresse" type="text">
										</div>
									</div>
									<div class="col-md-6">  
										<div class="form-group">
											<label class="col-form-label">Ville <span class="text-danger">*</span></label>
											<input class="form-control floating" name="ville" type="text">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label">Pays <span class="text-danger">*</span> </label>
											<input class="form-control" name="pays" type="text">
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label">Téléphone <span class="text-danger">*</span> </label>
											<input class="form-control" name="telephone" type="text">
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label">Site web<span class="text-danger">*</span> </label>
											<input class="form-control" name="siteweb" type="text">
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label">Matricule fiscale <span class="text-danger">*</span> </label>
											<input class="form-control" name="matriculefiscale" type="text">
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label">RIB/RIP <span class="text-danger">*</span> </label>
											<input class="form-control" name="ribrip" type="text">
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label">Taux T.V.A<span class="text-danger">*</span> </label>
											<input class="form-control" name="tauxtva" type="text">
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
											<label class="col-form-label">Raison sociale <span class="text-danger">*</span></label>
											<input class="form-control" name ="raisonsociale" id ="raisonsociale" type="text">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label">Référence<span class="text-danger">*</span></label>
											<input class="form-control" name ="reference" id ="reference" type="text">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label">Forme juridique <span class="text-danger">*</span></label>
											<input class="form-control" name ="formejuridique" id ="formejuridique" type="text">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label">Email <span class="text-danger">*</span></label>
											<input class="form-control floating" name ="email" id ="email" type="text">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label">Adresse<span class="text-danger">*</span></label>
											<input class="form-control" name ="adresse" id ="adresse" type="text">
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
			<!-- ,ref_client,fj_client,email_client,adresse_client,ville_client,pays_client,tel_client,sw_client,mf_client,riprib_client,tauxtva_client -->

			<!-- View Client Details -->

			
		</div>
		<!-- /Page Wrapper -->
		
	</div>
	<!-- /Main Wrapper -->
	
	<!-- jQuery -->
	<!-- <script src="assets/js/jquery-3.5.1.min.js?v=<?php echo time();?>""></script>
	<script src="assets/js/popper.min.js?v=<?php echo time();?>""></script>
	<script src="assets/js/bootstrap.min.js?v=<?php echo time();?>"></script>
	<script src="assets/js/jquery.slimscroll.min.js?v=<?php echo time();?>"></script>
	<script src="assets/js/jquery.dataTables.min.js?v=<?php echo time();?>"></script>
	<script src="assets/js/dataTables.bootstrap4.min.js?v=<?php echo time();?>"></script>
	<script src="assets/js/select2.min.js?v=<?php echo time();?>"></script>
	<script src="assets/js/app.js?v=<?php echo time();?>"></script>	 -->
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
