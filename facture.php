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
	$query = "SELECT * from facture";
	$result = mysqli_query($conn,$query);
?>
<?php
$pageName = "Facture";
session_start();

if (isset($_SESSION['id'])) {

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
							<h3 class="page-title">Facture</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
								<li class="breadcrumb-item active">Facture</li>
							</ul>
						</div>
						<div class="col-auto float-right ml-auto">


							<a href="ajouter_facture.php" class="btn add-btn"><i class="fa fa-plus"></i>Ajouter une facture</a>

						</div>
					</div>
				</div>
				<!-- /Page Header -->
				
				<!-- Search Filter -->
				<div class="row filter-row">
					<div class="col-sm-6 col-md-3">  
						<div class="form-group form-focus">
							<input type="text" class="form-control floating">
							<label class="focus-label">FActure  ID</label>
						</div>
					</div>
					<div class="col-sm-6 col-md-3">  
						<div class="form-group form-focus">
							<input type="text" class="form-control floating">
							<label class="focus-label">Reference</label>
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
							<table class="table table-striped custom-table datatable" id="data_table">
								<thead>
									<tr>
										<th>N° Facture </th>
										<th>Date Facture</th>
										<th>Client</th>
										<th>Total</th>
										<th>Action</th>
									</tr>
								</thead>
								<?php 
									while($row=mysqli_fetch_assoc($result)) {
										$id_facture = $row['id'];
										$date_facture= $row['date_facture'];
										$rs_client = $row['adresse_client'];
										$total_ttc = $row['montanttt_facture'];
     									
								?>
									<tr>
										<td><?php echo $id_facture?></td>
										<td><?php echo $date_facture?></td>
										<td><?php echo $rs_client?></td>

										<td><?php echo $total_ttc?></td>

										<td class=>
											<div class="dropdown dropdown-action">
												<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
												<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item editbtn"><i class="fa fa-pencil m-r-5"></i> Edit</a>
													<a class="dropdown-item deletebtn"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
													<a class="dropdown-item imprimerbtn"><i class="fa fa-trash-o m-r-5"></i> Imprimer</a>
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
		

			<!-- Add Facture Modal -->
			<div id="add_facture" class="modal custom-modal fade" role="dialog">
				<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Ajouter un Facture</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form action = "ajouter_fact.php" method ="POST">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label">id client <span class="text-danger">*</span></label>
											<input class="form-control" name ="client" type="text">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label">Reference <span class="text-danger">*</span></label>
											<input class="form-control" name ="refernece" type="reference">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label">Designation <span class="text-danger">*</span></label>
											<input class="form-control" name ="reference" type="text">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label">Date <span class="text-danger">*</span></label>
											<input class="form-control floating" name ="date" type="date">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label class="col-form-label">Quantite<span class="text-danger">*</span></label>
											<input class="form-control" name ="quantite" type="number">
										</div>
									</div>
									<div class="col-md-4">  
										<div class="form-group">
											<label class="col-form-label">PU HT <span class="text-danger">*</span></label>
											<input class="form-control floating" name="puht" type="number">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label class="col-form-label">Mantant HT <span class="text-danger">*</span> </label>
											<input class="form-control" name="montantht" type="number">
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
			<!-- /Add Facture Modal -->

			<!-- Add Client Modal -->

			<!-- /Add Client Modal -->

			
			<!-- Edit Facture Modal -->
			<div id="edit_facture" class="modal custom-modal fade" role="dialog">
				<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Modifier</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<<form action = "ajouter_fact.php" method ="POST">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label">id client <span class="text-danger">*</span></label>
											<input class="form-control" name ="client" type="text">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label">Reference <span class="text-danger">*</span></label>
											<input class="form-control" name ="refernece" type="reference">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label">Designation <span class="text-danger">*</span></label>
											<input class="form-control" name ="reference" type="text">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label">Date <span class="text-danger">*</span></label>
											<input class="form-control floating" name ="date" type="date">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label class="col-form-label">Quantite<span class="text-danger">*</span></label>
											<input class="form-control" name ="quantite" type="number">
										</div>
									</div>
									<div class="col-md-3">  
										<div class="form-group">
											<label class="col-form-label">PU HT <span class="text-danger">*</span></label>
											<input class="form-control floating" name="puht" type="number">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label class="col-form-label">Mantant HT <span class="text-danger">*</span> </label>
											<input class="form-control" name="montantht" type="number">
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
			<!-- /Edit Facture Modal -->
			
			<!-- Delete Facture Modal -->
			<div class="modal custom-modal fade" id="delete_facture" role="dialog">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<form action ="deletecode.php" method="POST">
						<input type="hidden" name="delete_id" id="delete_id">
						<div class="modal-body">
							<div class="form-header">
								<h3>Delete Facture</h3>
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
			<!-- /Delete Facture Modal -->
			
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
