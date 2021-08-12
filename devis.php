<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
		
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css?v=<?php echo time();?>">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css?v=<?php echo time();?>">
    
		<!-- Lineawesome CSS -->
        <link rel="stylesheet" href="assets/css/line-awesome.min.css?v=<?php echo time();?>">
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="assets/css/style.css?v=<?php echo time();?>">
<?php
$pageName = "Devis";
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {}

?>
<?php require "dashboard.php";?>

<div class="home-content">
		<div class="page-wrapper">
		
			<!-- Page Content -->
			<div class="content container-fluid">
			
				<!-- Page Header -->
				<div class="page-header">
					<div class="row align-items-center">
                        <div class="card">
								<div class="card-header">
									<h5 class="card-title mb-0">DEVIS</h5>
									<p>                    </p>
								</div>
								<div class="card-body">
									<div class="row">
										<div class="col-sm">
											<form class="needs-validation" novalidate="">
												<div class="form-row">
													<div class="col-md-4 mb-3">
														<label for="validationCustom01">Société et/ou Nom du client</label>
														<input type="text" class="form-control" id="validationCustom01" placeholder="First Name" value="Mark" required="" name="">
														<div class="valid-feedback">
															Looks good!
														</div>
													</div>
													<div class="col-md-4 mb-3">
														<label for="validationCustom01">Identifiant </label>
														<input type="text" class="form-control" id="validationCustom01" placeholder="First Name" value=" 00000000000000" required="">
														<div class="valid-feedback">
															Looks good!
														</div>
													</div>
													<div class="col-md-4 mb-3">
														<label for="validationCustom01">Adresse </label>
														<input type="text" class="form-control" id="validationCustom01" placeholder="First Name" value="Adresse" required="">
														<div class="valid-feedback">
															Looks good!
														</div>
													</div>
													
													<div class="col-md-4 mb-3">
														<label for="validationCustom01">Référence </label>
														<input type="text" class="form-control" id="validationCustom01" placeholder="First Name" value=" AA-A000" required="">
														<div class="valid-feedback">
															Looks good!
														</div>
													</div>
													<div class="col-md-4 mb-3">
														<label for="validationCustom01">Date </label>
														<input type="text" class="form-control" id="validationCustom01" placeholder="First Name" value=" 01/01/2021" required="">
														<div class="valid-feedback">
															Looks good!
														</div>
													</div>
													<div class="col-md-4 mb-3">
														<label for="validationCustom01">Désignation</label>
														<input type="text" class="form-control" id="validationCustom01" placeholder="First Name" value="......." required="">
														<div class="valid-feedback">
															Looks good!
														</div>
													</div>
													
													<div class="col-md-4 mb-3">
														<label for="validationCustom01">Quantité </label>
														<input type="number" class="form-control" id="validationCustom01" placeholder="First Name" value="0" required="">
														<div class="valid-feedback">
															Looks good!
														</div>
													</div>
													<div class="col-md-4 mb-3">
														<label for="validationCustom01">TVA à </label>
														<input type="number" class="form-control" id="validationCustom01" placeholder="First Name" value="0" required="">
														<div class="valid-feedback">
															Looks good!
														</div>
													</div>
													
													

													
													
												</div>
												<div class="form-row">
													
													
												
												</div>
												<div class="form-group">
													<div class="form-check">
														<input class="form-check-input" type="checkbox" value="" id="invalidCheck" required="">
														<label class="form-check-label" for="invalidCheck">
															Agree to terms and conditions
														</label>
														<div class="invalid-feedback">
															You must agree before submitting.
														</div>
													</div>
												</div>
												<button class="btn btn-primary" type="submit">Submit</button>
												<button class="btn btn-primary" type="submit">Print</button>
											</form>
										</div>
									</div>
								</div>
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<script src="script.js?v=<?php echo time();?>"></script>
