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
$pageName = "Prospects";
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {}

?>
<?php require "dashboard.php";?>

<script src="script.js?v=<?php echo time();?>"></script>
