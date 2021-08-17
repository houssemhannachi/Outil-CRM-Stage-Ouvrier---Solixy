<?php
$pageName = "Home" ;
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

 ?>


  <?php require "dashboard.php"?>
  
    <div class="home-content">
      <div class="overview-boxes">
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Clients</div>
            <div class="number">44</div>

          </div>
          <i class='fa fa-user cart'></i>
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Factures</div>
            <div class="number">22</div>
          </div>
          <i class='fa fa-usd cart two' ></i>
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Total Profit</div>
            <div class="number">$12,876</div>
            <div class="indicator">
              <i class='bx bx-up-arrow-alt'></i>
              <span class="text">Up from yesterday</span>
            </div>
          </div>
          <i class='bx bx-cart cart three' ></i>
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Total Return</div>
            <div class="number">11,086</div>
            <div class="indicator">
              <i class='bx bx-down-arrow-alt down'></i>
              <span class="text">Down From Today</span>
            </div>
          </div>
          <i class='bx bxs-cart-download cart four' ></i>
        </div>
      </div>



<div class="sales-boxes">
						<div class="recent-sales box">
							<div class="card card-table flex-fill">
								<div class="card-header">
									<h3 class="card-title mb-0">Clients</h3>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="table custom-table mb-0">
											<thead>
												<tr>
													<th>Name</th>
													<th>Email</th>
													<th>Status</th>
													<th class="text-right">Action</th>
												</tr>
											</thead>
											<tbody>

											</tbody>
										</table>
									</div>
								</div>
								<div class="card-footer">
									<a href="clients.html">View all clients</a>
								</div>
							</div>
						</div>
      </div>
    </div>
</section>
</body>
<script src="assets/js/jquery-3.5.1.min.js?v=<?php echo time();?>""></script>
<script src="assets/js/popper.min.js?v=<?php echo time();?>""></script>
<script src="assets/js/bootstrap.min.js?v=<?php echo time();?>"></script>
<script src="assets/js/jquery.slimscroll.min.js?v=<?php echo time();?>"></script>
<script src="assets/js/jquery.dataTables.min.js?v=<?php echo time();?>"></script>
<script src="assets/js/dataTables.bootstrap4.min.js?v=<?php echo time();?>"></script>
<script src="assets/js/select2.min.js?v=<?php echo time();?>"></script>
<script src="assets/js/app.js?v=<?php echo time();?>"></script>	
<script src="script.js?v=<?php echo time();?>"></script>




</html>
<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?> 
