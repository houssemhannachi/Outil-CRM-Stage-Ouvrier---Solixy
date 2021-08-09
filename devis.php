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
									<h5 class="card-title mb-0">Custom Bootstrap Form Validation</h5>
									<p class="card-text">For custom Bootstrap form validation messages, you’ll need to add the <code>novalidate</code> boolean attribute to your form. For server side validation <a href="../docs/4.1/components/forms/index.htm#server-side" target="_blank">read full documentation</a>.</p>
								</div>
								<div class="card-body">
									<div class="row">
										<div class="col-sm">
											<form class="needs-validation" novalidate="">
												<div class="form-row">
													<div class="col-md-4 mb-3">
														<label for="validationCustom01">First Name</label>
														<input type="text" class="form-control" id="validationCustom01" placeholder="First Name" value="Mark" required="">
														<div class="valid-feedback">
															Looks good!
														</div>
													</div>
													<div class="col-md-4 mb-3">
														<label for="validationCustom02">Last Name</label>
														<input type="text" class="form-control" id="validationCustom02" placeholder="Last Name" value="Otto" required="">
														<div class="valid-feedback">
															Looks good!
														</div>
													</div>
													<div class="col-md-4 mb-3">
														<label for="validationCustomUsername">Username</label>
														<div class="input-group">
															<div class="input-group-prepend">
																<span class="input-group-text" id="inputGroupPrepend">@</span>
															</div>
															<input type="text" class="form-control" id="validationCustomUsername" placeholder="Username" aria-describedby="inputGroupPrepend" required="">
															<div class="invalid-feedback">
																Please choose a username.
															</div>
														</div>
													</div>
												</div>
												<div class="form-row">
													<div class="col-md-6 mb-3">
														<label for="validationCustom03">City</label>
														<input type="text" class="form-control" id="validationCustom03" placeholder="City" required="">
														<div class="invalid-feedback">
															Please provide a valid city.
														</div>
													</div>
													<div class="col-md-3 mb-3">
														<label for="validationCustom04">State</label>
														<input type="text" class="form-control" id="validationCustom04" placeholder="State" required="">
														<div class="invalid-feedback">
															Please provide a valid state.
														</div>
													</div>
													<div class="col-md-3 mb-3">
														<label for="validationCustom05">Zip</label>
														<input type="text" class="form-control" id="validationCustom05" placeholder="Zip" required="">
														<div class="invalid-feedback">
															Please provide a valid zip.
														</div>
													</div>
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
												<button class="btn btn-primary" type="submit">Submit form</button>
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
