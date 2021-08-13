<?php 
	require_once('db_conn.php');
	$query = "select * from clients";
	$result = mysqli_query($conn,$query);

?>
<?php

session_start();
$pageName = "Details";


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
								<li class="breadcrumb-item active">Clients <?php echo "/ user_name" ?></li>
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
                                        <div class="profile-basic">
											<div class="row">
												<div class="col-md-5">
													<div class="profile-info-left">
                                                        
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
                                                        <h3 class="user-name m-t-0"><?php echo $nom?></h3>
														<h5 class="company-role m-t-0 mb-0">Forme juridique : Barry Cuda</h5>
														<small class="text-muted">Référence : <?php echo $reference?></small>
														<div class="staff-id">Matricule Fiscale : <?php echo $matricule?></div>
													</div>
												</div>
												<div class="col-md-7">
													<ul class="personal-info">
														<li>
															<span class="title">Phone:</span>
															<span class="text"><a href=""><?php echo $tel?></a></span>
														</li>
														<li>
															<span class="title">Email:</span>
															<span class="text"><a href=""><?php echo $email?></a></span>
														</li>
														<li>
															<span class="title">Birthday:</span>
															<span class="text">2nd August</span>
														</li>
														<li>
															<span class="title">Address:</span>
															<span class="text"><?php echo $adresse?></span>
														</li>
														<li>
															<span class="title">Pays:</span>
															<span class="text"><?php echo $pays?></span>
														</li>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
                    <?php }
									?>


				</div>
				<!-- /Page Content -->
				
            </div>
        </div>
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
