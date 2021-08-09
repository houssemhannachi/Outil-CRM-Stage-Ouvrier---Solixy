<?php
$pageName = "Devis";
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {}

?>
<?php require "dashboard.php";?>

<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
<script src="script.js?v=<?php echo time();?>"></script>






<div class="row">
					<div class="col-md-12">
						<div class="table-responsive">
							<table class="table table-striped custom-table datatable">
								<thead>
									<tr>
										<th> ID </th>
										<th>Nom </th>
										<th>Référence</th>
										<th>Adresse</th>
										<th>Email</th>
										<th>Téléphone</th>
										<th>Pays</th>
										<th>Matricule</th>
										<th>Action</th>
									</tr>
								</thead>
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
									<tr>
										<td><?php echo $id?></td>
										<td><?php echo $nom?></td>
										<td><?php echo $reference?></td>
										<td><?php echo $adresse?></td>
										<td><?php echo $email?></td>
										<td><?php echo $tel?></td>
										<td><?php echo $pays?></td>
										<td><?php echo $matricule?></td>
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
								
							</table>
						</div>
					</div>
				</div>
			</div>