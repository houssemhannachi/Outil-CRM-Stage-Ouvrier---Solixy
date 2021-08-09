<?php
$pageName = "Devis";
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {}

?>
<?php require "dashboard.php";?>


<script src="script.js?v=<?php echo time();?>"></script>