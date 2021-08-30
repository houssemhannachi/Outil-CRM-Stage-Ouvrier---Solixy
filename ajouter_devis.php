<?php 
   session_start();
   $_SESSION["user_id"]= 1;
   $_SESSION["name"]= "Solixy";
   $_SESSION["address"]="Avenue de la république </br> Immeuble Al Ahram 4ème étage";
   $_SESSION["ville"] = "Gabes - Tunisie";
   $_SESSION["mobile"]="+216 75 270 938";
    $pageName="Devis";

   include('dashboard.php');
   include 'Dev.php';
   $pageName ="Ajouter devis";
   $invoice = new Dev();
   
   	
   if(!empty($_POST['companyName']) && $_POST['companyName']) {	
   	$invoice->saveDevis($_POST);
   	header("Location:devis.php");
      
   }
   ?>

<script src="assets\js\devis.js?v=<?php echo time();?>"></script>
<div class="home-content">
		<div class="page-wrapper">
		
			<!-- Page Content -->
			<div class="content container-fluid">
			
				<!-- Page Header -->
				<div class="page-header">
					<div class="row align-items-center">
						<div class="col">
							<h3 class="page-title">Devis</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="home.php">Dashboard</a></li>
								<li class="breadcrumb-item"><a href="devis.php">Devis</a></li>
                                <li class="breadcrumb-item active">Ajouter une devis</li>
							</ul>
						</div>
					</div>
            </div>
               <div class="row">
			        <div class="col-md-10 mx-auto">
                  <div class="container content-invoice">
                     <div class="cards">
                       <div class="card-bodys">
                          <form action="" id="invoice-form" method="post" class="invoice-form" role="form" novalidate="">
                            <div class="load-animate animated fadeInUp">
                              <div class="row">
                                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
              
          
            </div>
         </div>
         <input id="currency" type="hidden" value="$">
         <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
               <h3>De,</h3>
               <b><?php echo $_SESSION['name']; ?> </b><br> 
               <?php echo $_SESSION['address']; ?><br>  <?php echo $_SESSION['ville']; ?><br> 
               <?php echo $_SESSION['mobile']; ?><br>

            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
               <h3>À,</h3>
               <div class="form-group">
                  <input type="text" class="form-control" name="companyName" id="companyName" placeholder="Raison sociale" autocomplete="off">
               </div>
               <div class="form-group">
                  <textarea class="form-control" rows="3" name="address" id="address" placeholder="Adresse"></textarea>
               </div>
               
            </div>
         </div>
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
               <table class="table table-condensed table-striped" id="invoiceItem">
                  <tr>
                     <th width="2%">
                      <div class="custom-control custom-checkbox mb-3">
                        <input type="checkbox" class="custom-control-input" id="checkAll" name="checkAll">
                        <label class="custom-control-label" for="checkAll"></label>
                        </div>
                    </th>
                     
                     <th width="38%">Désignation</th>
                     <th width="15%">Quantité</th>
                     <th width="15%">Pu HT</th>
                     <th width="15%">Montant HT</th>
                  </tr>
                  <tr>
                     <td><div class="custom-control custom-checkbox">
                        <input type="checkbox" class="itemRow custom-control-input" id="itemRow_1">
                        <label class="custom-control-label" for="itemRow_1"></label>
                        </div></td>
                    
                     <td><input type="text" name="productName[]" id="productName_1" class="form-control" autocomplete="off"></td>
                     <td><input type="number" name="quantity[]" id="quantity_1" class="form-control quantity" autocomplete="off"></td>
                     <td><input type="number" name="price[]" id="price_1" class="form-control price" autocomplete="off"></td>
                     <td><input type="number" name="total[]" id="total_1" class="form-control total" autocomplete="off"></td>
                  </tr>
               </table>
            </div>
         </div>
         <div class="row" style="display : table; margin : 0 auto;">
            <div class="col-xs-12">
               <button class="btn btn-danger delete btn-item" id="removeRows" type="button">-</button>
               <button class="btn btn-success btn-item" id="addRows" type="button">+</button>
            </div>
         </div>
         <div class="row"> 
          <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
            <div class="form-group mt-3 mb-3 ">
              <label>Base HT: &nbsp;</label>
                 <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text currency">$</span>
            </div>
            <input value="" type="number" class="form-control" name="baseht" id="baseht" placeholder="Base HT" >
          </div>
              </div>
          </div>
          <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
            <div class="form-group mt-3 mb-3 ">
              <label>Remise &nbsp;</label>
                 <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text currency">$</span>
            </div>
           <input value="" type="number" class="form-control" name="remise" id="remise" placeholder="Remise">
          </div>
              </div>
          </div>
          <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
            <div class="form-group mt-3 mb-3 ">
              <label>Total HT: &nbsp;</label>
                 <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text currency">$</span>
            </div>
            <input value="" type="number" class="form-control" name="totalht" id="totalht" placeholder="Total HT">
          </div>
              </div>
          </div>
          <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
            <div class="form-group mt-3 mb-3 ">
              <label>Taux T.V.A:   &nbsp;</label>
                 <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text currency">%</span>
            </div>
             <input value="" type="number" class="form-control" name="tauxtva" id="tauxtva" placeholder="Taux T.V.A: ">
          </div>
              </div>
          </div>
          <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
            <div class="form-group mt-3 mb-3 ">
              <label>Total T.V.A:  &nbsp;</label>
                 <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text currency">$</span>
            </div>
            <input value="" type="number" class="form-control" name="totaltva" id="totaltva" placeholder="Total T.V.A:  ">
          </div>
              </div>
          </div>
          <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
            <div class="form-group mt-3 mb-3 ">
              <label>Total TTC: &nbsp;</label>
                 <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text currency">$</span>
            </div>
             <input value="" type="number" class="form-control" name="totalttc" id="totalttc" placeholder="Total TTC">
          </div>
              </div>
          </div>
            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 center ">

               <br>
               <div class="form-group ">
                  <input type="hidden" value="<?php echo $_SESSION['user_id']; ?>" class="form-control" name="userId">
                  <input data-loading-text="Enregistrer devis ..." type="submit" name="invoice_btn" value="Ajouter devis" class="btn btn-primary submit-btn invoice-save-btm" style="display : table; margin : 0 auto;">           
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
