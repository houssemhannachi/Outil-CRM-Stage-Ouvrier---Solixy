<?php 
	require_once('db_conn.php');
	$query = "select * from paiements";
	$result = mysqli_query($conn,$query);

?>

<?php
$pageName = "Paiments";
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
							<h3 class="page-title">Paiements</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
								<li class="breadcrumb-item active">Paiements</li>
							</ul>
						</div>
						<div class="col-auto float-right ml-auto">
							<a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_paiement"><i class="fa fa-plus"></i>Ajouter un paiement</a>
						</div>
					</div>
				</div>
				<!-- /Page Header -->
				
				<!-- Search Filter -->
				<div class="row filter-row">
					<form action = "chercher_paiement.php" method ="POST" >
						<div class="col-sm-6 col-md-3"style="float:left;">  
							<div class="form-group form-focus">
								<input type="text" class="form-control floating" name="tranch">
								<label class="focus-label">N° Transaction</label>
							</div>
						</div>
						<div class="col-sm-6 col-md-2"style="float:left;">  
							<div class="form-group form-focus">
								<input type="text" class="form-control floating" name="factch">
								<label class="focus-label">N° Facture</label>
							</div>
						</div>
						<div class="col-sm-6 col-md-3 "style="float:left;">  
							<div class="form-group form-focus select-focus">
								<select class="select floating"> 
									<option>Moyen de paiement</option>
									<option value="Virement bancaire">Virement bancaire</option>
									<option value="Chèque">Chèque</option>
									<option value="Espèces">Espèces</option>
									<option value="Versement">Versement</option>
								</select>
								<label class="focus-label">Status</label>
							</div>
						</div>

						<div class="col-sm-6 col-md-4" style="float:left;">  
							<button type="submit" class="btn btn-success btn-block" name="submit-search"> Chercher un paiement </button>
						</div>
					</form>     
				</div>

				<!-- Search Filter -->

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
									while($row=mysqli_fetch_assoc($result)) {
										$id_paiement = $row['id_paiement'];
										$rs_client = $row['rs_client'];
										
										$id_client  = $row['id_client'];
										$date_paiement = $row['date_paiement'];
     									$mode_de_paiement = $row['mode_de_paiement'];
        								$id_facture  = $row['id_facture'];
        								$prix = $row['prix'];
        								$status_paiement = $row['status_paiement'];
								?>
									<tr>
										<td><?php echo $id_paiement?></td>
										<td><?php echo $date_paiement?></td>
										<td><a href="profile_client.php?id=<?php echo $id_client;?>"><?php echo $rs_client?></a></td>
										<td class="none"><?php echo  $id_client?></td>
										<td><?php echo $mode_de_paiement?></td>
										<td><?php echo '<a >'.$id_facture.'</a>'?></td>
										<td><?php echo $prix?></td>
										<td><?php echo  '<span class="badge bg-inverse-info">'.$status_paiement.'</span>'?></td>
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
									<?php }
									?>
								</table>
							</div>
						</div>
					</div>
                </div>
			<!-- /Page Content -->
		
			<!-- Add Client Modal -->
			<div id="add_paiement" class="modal custom-modal fade" role="dialog">
				<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Ajouter un Paiement</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form action = "ajouter_paiement.php" method ="POST">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label">ID Client<span class="text-danger">*</span></label>
											<input class="form-control" name ="id_client" type="text">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label">Raison sociale du client<span class="text-danger">*</span></label>

											<div class="input-group-prepend">
														<span class="input-group-text" id="basic-addon1">@</span>
														<input class="form-control" name ="rs_client" type="text">
											</div>
										</div>
									</div>
									
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label">Date <span class="text-danger">*</span></label>
											<input class="form-control" name ="date" type="date">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label">Moyen de paiement <span class="text-danger">*</span></label>
											<select class="form-control floating" name="mode_de_paiement">
															<option>Moyen de paiement</option>
															<option value="Virement bancaire">Virement bancaire</option>
															<option value="Chèque">Chèque</option>
															<option value="Espèces">Espèces</option>
															<option value="Versement">Versement</option>
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label">N° Facture <span class="text-danger">*</span></label>
											<input class="form-control" name ="num_facture" type="text">
										</div>
									</div>
									<div class="col-md-6">  
										<div class="form-group">
											<label class="col-form-label">Prix <span class="text-danger">*</span></label>
											<div class="input-group">
													<input type="number" class="form-control floating" name="prix">
													<div class="input-group-prepend">
														<span class="input-group-text">DT</span>
													</div>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label">Status <span class="text-danger">*</span> </label>
											<input class="form-control" name="status" type="text">
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
			<div id="edit_paiement" class="modal custom-modal fade" role="dialog">
				<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Modifier</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form action ="modifier_paiement.php" method ="POST" >
									<div class="row">
									<input type="hidden" name ="id" id="id">
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label">ID Client<span class="text-danger">*</span></label>
											<input class="form-control" name ="id_client" type="text" id ="id_client">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label">Raison sociale du client<span class="text-danger">*</span></label>
											<input class="form-control" name ="rs_client"  id ="rs_client" type="text">
										</div>
									</div>
									
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label">Date <span class="text-danger">*</span></label>
											<input class="form-control" name ="date" id ="date" type="date">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label">Mode de paiement <span class="text-danger">*</span></label>
											<select class="form-control floating" name="mode_de_paiement" id="mode_de_paiement">
															<option>Moyen de paiement</option>
															<option value="Virement bancaire">Virement bancaire</option>
															<option value="Chèque">Chèque</option>
															<option value="Espèces">Espèces</option>
															<option value="Versement">Versement</option>
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label">N° Facture <span class="text-danger">*</span></label>
											<input class="form-control" name ="num_facture" id ="num_facture" type="text">
										</div>
									</div>
									<div class="col-md-6">  
										<div class="form-group">
											<label class="col-form-label">Prix <span class="text-danger">*</span></label>
											<div class="input-group">
													
													<input type="number" class="form-control floating" name="prix" id="prix">
													<div class="input-group-prepend">
														<span class="input-group-text">DT</span>
													</div>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label">Status <span class="text-danger">*</span> </label>
											<input class="form-control" name="status" type="text" id="statut">
										</div>
									</div>
								</div>
								<div class="submit-section">
									<button class="btn btn-primary submit-btn" name ="update">Enregistrer</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- /Edit Client Modal -->
			
			<!-- Delete Client Modal -->
			<div class="modal custom-modal fade" id="effacer_paiement" role="dialog">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<form action ="effacer_paiement.php" method="POST">
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
