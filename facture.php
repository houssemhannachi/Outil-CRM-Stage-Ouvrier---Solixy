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
	$query = "select * from Facture";
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
							<a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_facture"><i class="fa fa-plus"></i>Ajouter un Facture</a>
						</div>
					</div>
				</div>

				<!-- /Page Header -->
					<!--Add Facture -->
				<div id="add_facture" class="modal custom-modal fade" role="dialog">
				<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Modifier</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body" >
							<form action = "ajouter_fact.php" method ="POST">
								<div class="row">
									<div class="col-sm-6 col-md-3">
										<div class="form-group">
											<label>Client <span class="text-danger">*</span></label>
											<input class="form-control" type="number">
										</div>
									</div>
									<div class="col-sm-6 col-md-3">
										<div class="form-group">
											<label>Project <span class="text-danger">*</span></label>
											<input class="form-control" type="text">
										</div>
									</div>
									
									<div class="col-sm-6 col-md-3">
										<div class="form-group">
											<label>Email</label>
											<input class="form-control" type="email">
										</div>
									</div>
									<div class="col-sm-6 col-md-3">
										<div class="form-group">
											<label>TVA</label>
											<input class="form-control" type="number" %>
										</div>
									</div>
									<div class="col-sm-6 col-md-3">
										<div class="form-group">
											<label> Address Client</label>
											<textarea class="form-control" rows="1"></textarea>
										</div>
									</div>
								
									<div class="col-sm-6 col-md-3">
										<div class="form-group">
											<label>Date <span class="text-danger">*</span></label>
											
												<input class="form-control datetimepicker" type="date">
											</div>
										</div>
									</div>
									<table class="table table-hover table-white">
												<thead>
													<tr>
														<th style="width: 20px">ID</th>
														<th class="col-sm-2">Réference</th>
														<th class="col-md-6">Désignation</th>
														<th style="width:100px;">Qte</th>
														<th style="width:80px;">PU HT</th>
														<th>Montant HT</th>
														<th> </th>
													</tr>
												</thead>
												<tbody>
												<tr>
													<td>1</td>
													<td>
														<input class="form-control" type="text" style="min-width:150px">
													</td>
													<td>
														<input class="form-control" type="text" style="min-width:150px">
													</td>
													<td>
														<input class="form-control" style="width:100px" type="text">
													</td>
													<td>
														<input class="form-control" style="width:80px" type="text">
													</td>
													<td>
														<input class="form-control" style="width:120px" type="text">
													</td>
													
													
												<tr>
													<td>2</td>
													<td>
														<input class="form-control" type="text" style="min-width:150px">
													</td>
													<td>
														<input class="form-control" type="text" style="min-width:150px">
													</td>
													<td>
														<input class="form-control" style="width:100px" type="text">
													</td>
													<td>
														<input class="form-control" style="width:80px" type="text">
													</td>
													<td>
														<input class="form-control"  style="width:120px" type="text">
                           </td> 
													 <td>
													
													
                          </tr> 
												</tbody>
											</table>
										
									
								</div>
								<div class="submit-section">
									<button class="btn btn-primary submit-btn" name ="submit">Enregistrer</button>
									<button class="btn btn-succes succes-btn" name ="imprimer">Imprimer</button>
								</div>
             </form>
						 </div>
					</div>
				</div>
			</div>
						 
			<!-- /Add Facture -->
				
			<!-- Search Filter -->
      <div class="row filter-row">
					<div class="col-sm-6 col-md-3">  
						<div class="form-group form-focus">
							<input type="text" class="form-control floating">
							<label class="focus-label">Facture ID</label>
						</div>
					</div>
					<div class="col-sm-6 col-md-3">  
						<div class="form-group form-focus">
							<input type="text" class="form-control floating">
							<label class="focus-label" >Facture reference</label>
						</div>
					</div>
						
					<div class="col-sm-6 col-md-3">  
						<a href="#" class="btn btn-success btn-block"> Search </a>  
					</div>     
				</div>
				<!-- Search Filter -->

				<div class="content container-fluid">
				
					
				
								<div class="row">
									<div class="col-md-12 col-sm-12">
										<div class="table-responsive">
											<table class="table table-hover table-white">
												<thead>
													<tr>
														<th style="width: 20px">ID</th>
														<th class="col-sm-2">Réference</th>
														<th class="col-md-5">Designation</th>
														<th style="width:100px;">Date</th>
														<th style="width:80px;">Qte</th>
														<th style="width:80px;">PU HT</th>
														<th style="col-sm-2">Montant HT</th>
														
													</tr>
												</thead>
												<?php 
									while($row=mysqli_fetch_assoc($result)) {
										$id = $row['id_facture'];
										
										$reference = $row['reference_facture'];
										$designation = $row['designation_facture'];
     									$date = $row['date_email'];
        								$qte = $row['quantite_facture'];
        								$puht = $row['puht_facture'];
        								$montantht = $row['montantht_facture'];
								?>
												<tbody>
												<tr>
										<td><?php echo $id?></td>
										
										<td><?php echo $reference?></td>
										<td><?php echo $designation?></td>
										<td><?php echo $date?></td>
										<td><?php echo $qte?></td>
										<td><?php echo $puht?></td>
										<td><?php echo $$montantht?></td>
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
												</tbody>
											</table>
									
		
			
			
			
			
			
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