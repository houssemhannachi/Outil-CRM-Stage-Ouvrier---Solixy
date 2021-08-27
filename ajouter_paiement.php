<?php 
session_start();
$pageName = "Paiments";
include 'dashboard.php';

require_once('db_conn.php');
include 'Invoice.php';
$pageName ="Ajouter facture";
$paiement = new Invoice();

	
if(!empty($_POST['id_client']) ) {	
	$paiement->savePaiement($_POST);
	header("Location:paiments.php");
   
}
?>

?>
<div class="home-content">
		<div class="page-wrapper">
		
			<!-- Page Content -->
			<div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col">
								<h3 class="page-title">Ajouter un paiement</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="home.php">Dashboard</a></li>
									<li class="breadcrumb-item">Paiements</li>
									<li class="breadcrumb-item active">Ajouter un paiement</li>

								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-lg-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title mb-0">Paiement</h4>
								</div>
								<div class="card-body">
									
										<div class="form-group row">
											<label class="col-form-label col-md-2">Référence Client</label>
											<div class="form-recherche col-md-10">
                     							<form action="" method="POST">
                        							<input type="text" class="recherche_input" name="ref_client" id="ref_client" placeholder="REF client" autocomplete="off">
                        							<button name="search" class="btn btn-success"> Trouver ce client </button>
                     							</form>
                  							</div>
										</div>
										<form action =""method="post">
										<?php if( isset($_POST['search']) AND !empty($_POST) )
                           					{   $recherche_rs = $_POST['ref_client'];
												$sql = "SELECT * FROM clients WHERE ref_client LIKE '%$recherche_rs%' ";
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

														<?php echo '<input type="text" id="id_client" name="id_client" value="'.$id_client.'" readonly>' ?>
														<?php echo '<div class="form-group row">
											<label class="col-form-label col-md-2">Client</label>
											<div class="col-md-10">
												<input type="text" class="form-control"  name="raison" value="'.$rs_client.'" >
											</div>
										</div>'?>
					   
					   
					   <?php }?>
					   <?php
						  }
						  else {
							  echo 'Aucun client trouvé';
					   
						  }
					   }
					   else
					   {
						   echo '';
					   
					   }
					   
					   ?>
										
											
											
										<div class="form-group row">
											<label class="col-form-label col-md-2">Date</label>
											<div class="col-md-10">
												<input type="date" class="form-control" name="date_paiement">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-form-label col-md-2">N° Facture </label>
											<div class="col-md-10">
												<input type="number" class="form-control"  name="id_facture">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-form-label col-md-2">Moyen de paiement</label>
											<div class="col-md-10">
												<select class="form-control" name="mode_de_paiement">
															<option>Moyen de paiement</option>
															<option value="Virement bancaire">Virement bancaire</option>
															<option value="Chèque">Chèque</option>
															<option value="Espèces">Espèces</option>
															<option value="Versement">Versement</option>
												</select>
											</div>
										</div>
										

										<div class="form-group row">
											<label class="col-form-label col-md-2">Statuts</label>
											<div class="col-md-10">
												<input type="number" class="form-control" name="status_paiement">
											</div>
										</div>
									

										<div class="form-group mb-0 row">
											<label class="col-form-label col-md-2">Prix</label>
											<div class="col-md-10">
												<div class="input-group">
													<div class="input-group-prepend">
														<span class="input-group-text">DT</span>
													</div>
													<input class="form-control" type="text" name="prix">
													<div class="input-group-append">
														<button class="btn btn-primary" type="submit" name ="submit">Enregistrer</button>
													</div>
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>

							</div>
						</div>
	
			</div>
			<!-- /Main Wrapper -->
		
        </div>

		<!-- /Main Wrapper -->
<?php include 'footer.php' ?>