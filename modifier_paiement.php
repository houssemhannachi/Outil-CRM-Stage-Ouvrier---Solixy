

<?php 
   session_start();

  $pageName="Paiements";
include('dashboard.php');
include 'Invoice.php';
$paiement = new Invoice();

if( !empty($_POST['invoiceId']) && $_POST['invoiceId']) {	
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
                                        
                                        <div class="form-group row">
											<label class="col-form-label col-md-2">Date</label>
											<div class="col-md-10">
												<input tsype="date" class="form-control" name="date_paiement" value="<?php echo $paiementValues['date_paiement']; ?>">
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
													<input class="form-control" type="text" name="prix" value="<?php echo $paiementValues['prix']; ?>">
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
							</div>
							<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
							<div class="form-group">
								<label>Montant à payer: &nbsp;</label>
								<div class="input-group">
									<div class="input-group-append currency"><span class="input-group-text">DT</span></div>
									<input value="" type="number" class="form-control" name="amountDue" id="amountDue" placeholder="Amount Due">
								</div>
							</div>
							</div>
		     		<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 center">
		      			<h3>Notes: </h3>
		      			<div class="form-group">
							<textarea class="form-control txt" rows="5" name="notes" id="notes" placeholder="Vos Notes"><?php echo $invoiceValues['note']; ?></textarea>
						</div>
						<br>
						<div class="form-group">
							<input type="hidden" value="<?php echo $invoiceValues['id_paiement']; ?>" class="form-control" name="id_paiement" id="id_paiement">
			      			<input data-loading-text="Mise à jour facture ..." type="submit" name="invoice_btn" value="Modifier" class="btn btn-primary submit-btn invoice-save-btm" style="display : table; margin : 0 auto;">
			      		</div>
						
		      		</div>
		      	</div>
		      	<div class="clearfix"></div>		      	
	      	</div>
		</form>	
    		</div>
    	</div>		
    </div>
</div>	
