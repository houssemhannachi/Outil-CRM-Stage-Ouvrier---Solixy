<?php 
	require_once('db_conn.php');
	$query = "select * from clients";
	$result = mysqli_query($conn,$query);

?>
<?php
$pageName = "Clients";
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {}

?>

<?php require "dashboard.php";?>
<?php
	$id=$_GET['id'];
   	$sql = "SELECT * FROM clients where id_client='$id'";
   	$result = mysqli_query ($conn,$sql);
  	$queryResult = mysqli_num_rows($result);
  	if($queryResult > 0) {
       while ($row = mysqli_fetch_assoc($result)) {
										$id_client = $row['id_client'];
										$rs_client = $row['rs_client'];
										$ref_client = $row['ref_client'];
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
								<li class="breadcrumb-item"><a href="clients.php">Clients</a></li>
								<li class="breadcrumb-item active"><?php echo $rs_client ?> </li>
							</ul>
						</div>
					</div>
					</div>
					<!-- /Page Header -->
					
					<div class="card mb-0">
						<div class="card-body">
							<div class="row">
								<div class="col-md-12">
									<div class="profile-view">
										
											<div class="row">
												<div class="col-md-5">
													<div class="profile-info-left">
														<h3 class="user-name m-t-0"><?php echo $rs_client ?></h3>
														<h5 class="company-role m-t-0 mb-0">Référence: <?php echo $ref_client ?> </h5>
														<div class="informations">
															<small class="text-muted">Forme juridique: <?php echo $fj_client ?></small> </br>
															<small class="text-muted">Matricpule fiscale: <?php echo$mf_client?></small> </br>
															<small class="text-muted">RIP/RIB: <?php echo$riprib_client?></small> </br>
															<small class="text-muted">Taux T.V.A: <?php echo$tauxtva_client?> </small>
	                                                    </div>
														<div class="staff-id">ID Client : <?php echo $id_client ?></div>
													</div>
												</div>
												<div class="col-md-7">
													<ul class="personal-info">
														<li>
															<span class="title">Email:</span>
															<span class="text"><a> <?php echo $email_client ?> </a></span>
														</li>
														<li>
															<span class="title">Téléphone:</span>
															<span class="text"><?php echo $tel_client?></span>
														</li>
														<li>
															<span class="title">Adresse:</span>
															<span class="text"><?php echo $adresse_client .' '. $ville_client?></span>
														</li>
														<li>
															<span class="title">Pays:</span>
															<span class="text"><?php echo $pays_client?></span>
														</li>
														<li>
															<span class="title">Site Web:</span>
															<span class="text"><a><?php echo$sw_client?></a></span>
														</li>
													</ul>
												</div>
											

									</div>
								</div>
							</div>
						</div>
					</div>
	   </div>

		<?php }?>

</div>


<?php
   }
?>


<script src="assets/js/jquery-3.5.1.min.js?v=<?php echo time();?>""></script>
	<script src="assets/js/popper.min.js?v=<?php echo time();?>""></script>
	<script src="assets/js/bootstrap.min.js?v=<?php echo time();?>"></script>
	<script src="assets/js/jquery.slimscroll.min.js?v=<?php echo time();?>"></script>
	<script src="assets/js/jquery.dataTables.min.js?v=<?php echo time();?>"></script>
	<script src="assets/js/dataTables.bootstrap4.min.js?v=<?php echo time();?>"></script>
	<script src="assets/js/select2.min.js?v=<?php echo time();?>"></script>
	<script src="assets/js/app.js?v=<?php echo time();?>"></script>	
	<script src="script.js?v=<?php echo time();?>"></script>