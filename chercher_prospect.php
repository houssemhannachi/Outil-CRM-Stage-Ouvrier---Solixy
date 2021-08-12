<link rel="stylesheet" href="assets/css/bootstrap.min.css?v=<?php echo time();?>">
<link rel="stylesheet" href="assets/css/font-awesome.min.css?v=<?php echo time();?>">
<link rel="stylesheet" href="assets/css/line-awesome.min.css?v=<?php echo time();?>">
<link rel="stylesheet" href="assets/css/select2.min.css?v=<?php echo time();?>">
<link rel="stylesheet" href="assets/css/style.css?v=<?php echo time();?>">
<?php
require_once ("db_conn.php");
$pageName = "Prospects";
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
                    <div class="col">
							<h3 class="page-title">Prospects</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
								<li class="breadcrumb-item active">Prospects</li>
							</ul>
						</div>
						<div class="col-auto float-right ml-auto">
							<a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_client"><i class="fa fa-plus"></i>Ajouter un prospect</a>
						</div>
					</div>
				</div>
                <div class="row filter-row">
					<form action = "chercher_prospect.php" method ="POST" >
						<div class=""style="float:left;">  
							<div class="form-group form-focus">
								<input type="text" class="form-control floating" name="rsch">
								<label class="focus-label">Raison sociale</label>
							</div>
						</div>
						<div class=""style="float:left;">  
							<div class="form-group form-focus">
								<input type="text" class="form-control floating" name="telch">
								<label class="focus-label">Téléphone</label>
							</div>
						</div>

						<div class="" style="float:left;">  
							<button type="submit" class="btn btn-success btn-block" name="submit-search"> Chercher un client </button>
						</div>
					</form>     
</div>   
				</div>
                <div class="row">
					<div class="col-md-12">
						<div class="table-responsive">
							<table class="table table-striped custom-table datatable">
								<thead>
									<tr>
                                        <th>ID</th>
										<th>Raison sociale </th>
                                        <th>Email</th>
										<th>Adresse</th>
										<th>Ville</th>
										<th>Pays</th>
										<th>Téléphone</th>
										<th>Facebook</th>
                                        <th>Site Web</th>
										<th>Action</th>
									</tr>
								</thead>    
<?php



if (isset($_POST['submit-search'])){
    $recherche_rs = $_POST['rsch'];
    $recherche_tel = $_POST['telch'];

   $sql = "SELECT * FROM propects WHERE rs_prospect LIKE '%$recherche_rs%' AND tel_prospect LIKE '%$recherche_tel%'  ";
   $result = mysqli_query ($conn,$sql);
   $queryResult = mysqli_num_rows($result);
   if($queryResult > 0) {
       while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['id_prospect'];
            $rs = $row['rs_prospect'];
            $email = $row['email_prospect'];
            $adresse = $row['adresse_prospect'];
            $ville = $row['ville_prospect'];
            $pays = $row['pays_prospect'];
            $tel = $row['tel_prospect'];
            $fb = $row['facebook_prospect'];
            $sw = $row['siteweb_prospect'];
       ?>
       <tr>
           <td><?php echo $id?></td>
			<td><?php echo $rs?></td>
			<td><?php echo $email?></td>
			<td><?php echo $adresse?></td>
			<td><?php echo $ville?></td>
			<td><?php echo $pays?></td>
			<td><?php echo $tel?></td>
			<td><?php echo $fb?></td>
            <td><?php echo $sw?></td>
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
}
else
{
    header ('location:clients.php');

}

?>

<script src="script.js?v=<?php echo time();?>"></script>
</body>
</html>
