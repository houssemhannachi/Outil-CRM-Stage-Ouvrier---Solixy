

<?php 
   session_start();

  $pageName="Paiements";
include('dashboard.php');
include 'Invoice.php';
$paiement = new Invoice();

if( !empty($_POST['id_paiement']) && $_POST['id_paiement']) {	
	$paiement->updatepaiement($_POST);	
	header("Location:paiments.php");	
}
if(!empty($_GET['update_id']) && $_GET['update_id']) {
	$paiementValues = $paiement->getPaiement($_GET['update_id']);		
		
}
?>

<div class="home-content">
		<div class="page-wrapper">
		
			<!-- Page Content -->
			<div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col">
								<h3 class="page-title">Modifier un paiement</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="home.php">Dashboard</a></li>
									<li class="breadcrumb-item">Paiements</li>
									<li class="breadcrumb-item active">Modifier un paiement</li>

								</ul>
							</div>
						</div>
					</div>
	
					<div class="row">
						<div class="col-lg-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title mb-0">Paiement</h4>
								</div>
								<div class="card-body">
                                <form action="" method="post">

                                        <div class="form-group row">
											<label class="col-form-label col-md-2">Client</label>
											<div class="col-md-10">
												<input tsype="date" class="form-control" name="id_client" value="<?php echo $paiementValues['rs_client']; ?> "readonly>
											</div>
										</div>
											
										<div class="form-group row">
											<label class="col-form-label col-md-2">Date</label>
											<div class="col-md-10">
                                                <input type="date" class="form-control" name="date_paiement" value="<?php echo $paiementValues['date_paiement']; ?>">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-form-label col-md-2">N° Facture </label>
											<div class="col-md-10">
												<input type="number" class="form-control"  name="id_facture" value="<?php echo $paiementValues['id_facture']; ?>">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-form-label col-md-2">Moyen de paiement</label>
											<div class="col-md-10">
												<select class="form-control" name="mode_de_paiement" >
                                                            <option> <?php echo $paiementValues['mode_de_paiement'] ?> </option>
															
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
												<input type="text" class="form-control" name="status_paiement" value="<?php echo $paiementValues['status_paiement']; ?>">
											</div>
										</div>
									

										<div class="form-group mb-0 row">
											<label class="col-form-label col-md-2">Prix</label>
											<div class="col-md-10">
												<div class="input-group">
													<div class="input-group-prepend">
														<span class="input-group-text">DT</span>
													</div>
													<input class="form-control" type="number" name="prix" value="<?php echo $paiementValues['prix']; ?>">
													<div class="input-group-append">
                                                        <input type="hidden" value="<?php echo $paiementValues['id_paiement']; ?>" class="form-control" name="id_paiement" id="id_paiement">

                                                        <button data-loading-text="Mise à jour facture ..." type="submit" name="invoice_btn" class="btn btn-primary" >Modifier</button>											</div>
												</div>
											</div>
										</div>
									</form>
								</div>


			<!-- /Main Wrapper -->
		
        </div>

		<!-- /Main Wrapper -->
<?php include 'footer.php' ?>
