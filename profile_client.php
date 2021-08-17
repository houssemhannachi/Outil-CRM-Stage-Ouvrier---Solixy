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
       <tr>
										<td class="none"><?php echo $id_client?></td>
										<td><?php echo $rs_client?></td>
										<td><?php echo $ref_client?></td>
										<td><?php echo $adresse_client?></td>
										<td><?php echo $email_client?></td>
										<td><?php echo $tel_client?></td>
										<td><?php echo $pays_client?></td>
										<td  class="none"><?php echo$mf_client?></td>
										<td  class="none"><?php echo$fj_client?></td>
										<td  class="none"><?php echo$ville_client?></td>
										<td  class="none"><?php echo$sw_client?></td>
										<td  class="none"><?php echo$riprib_client?></td>
										<td  class="none"><?php echo$tauxtva_client?></td>
										<td class=>
											<div class="dropdown dropdown-action">
												<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
												<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item editbtn"><i class="fa fa-pencil m-r-5"></i> Modifier</a>
													<a class="dropdown-item deletebtn"><i class="fa fa-trash-o m-r-5"></i> Supprimer</a>
													<a class="dropdown-item detailsbtn"><i class="fa fa-id-card m-r-5"></i> Détails</a>
													
												</div>
											</div>
										</td>
									</tr>
		<?php }?>

								
							</table>
						</div>
					</div>
				</div>
			</div>

<?php
   }
   else {
       echo 'NO DATA';

   }

?>