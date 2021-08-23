<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);                                                                //Supprime les espaces
	   $data = stripslashes($data);                                                        //Supprime les anti/
	   $data = htmlspecialchars($data);                                                      //sanshtmlbalises
	   return $data;
	}

	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);

	if (empty($uname)) {
		header("Location: index.php?error=Donner le nom d'utilisateur");
	    exit();
	}else if(empty($pass)){
        header("Location: index.php?error=Donner le mot de passe");
	    exit();
	}else{
		$sql = "SELECT * FROM users WHERE user_name='$uname' AND password='$pass'";

		$result = mysqli_query($conn, $sql);                                                //Exécute une requête sur la base de données

		if (mysqli_num_rows($result) === 1) {                                              //nombre de lignes dans un résultat
			$row = mysqli_fetch_assoc($result);                                            //Récupère une ligne de résultat sous forme de tableau associatif
            if ($row['user_name'] === $uname && $row['password'] === $pass) {
            	$_SESSION['user_name'] = $row['user_name'];
            	
            	$_SESSION['id'] = $row['id'];
				$_SESSION["user_id"]= 1;
				$_SESSION["name"]= "Solixy";
				$_SESSION["address"]="Avenue de la république </br> Immeuble Al Ahram 4ème étage";
				$_SESSION["ville"] = "Gabes - Tunisie";
				$_SESSION["mobile"]="+216 75 270 938";
            	header("Location: home.php");
		        exit();
            }else{
				header("Location: index.php?error=Incorect User name or password");
		        exit();
			}
		}else{
			header("Location: index.php?error=Incorect User name or password");
	        exit();
		}
	}
	
}else{
	header("Location: index.php");
	exit();
}