<?php
class Dev{
	private $host  = 'localhost';
    private $user  = 'root';
    private $password   = "";
    private $database  = "sol";   
	private $invoiceUserTable = 'invoice_user';	
    private $invoiceOrderTable = 'devis';
	private $invoiceOrderItemTable = 'devis_item';
	private $dbConnect = false;
    public function __construct(){
        if(!$this->dbConnect){ 
            $conn = new mysqli($this->host, $this->user, $this->password, $this->database);
            if($conn->connect_error){
                die("Error failed to connect to MySQL: " . $conn->connect_error);
            }else{
                $this->dbConnect = $conn;
            }
        }
    }
	private function getData($sqlQuery) {
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		if(!$result){
			die('Error in query: '. mysqli_error($this->dbConnect));
		}
		$data= array();
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			$data[]=$row;            
		}
		return $data;
	}
	private function getNumRows($sqlQuery) {
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		if(!$result){
			die('Error in query: '. mysqli_error($this->dbConnect));
		}
		$numRows = mysqli_num_rows($result);
		return $numRows;
	}
	public function loginUsers($email, $password){
		$sqlQuery = "
			SELECT id, email, first_name, last_name, address, mobile 
			FROM ".$this->invoiceUserTable." 
			WHERE email='".$email."' AND password='".$password."'";
        return  $this->getData($sqlQuery);
	}	
	public function checkLoggedIn(){
		if(!$_SESSION['user_id']) {
			header("Location:index.php");
		}
	}		
	public function saveDevis($POST) {		
		$sqlInsert = "INSERT INTO ".$this->invoiceOrderTable."(nom_client, user_id, adresse_client, baseht, remise, totalht, TVArate,TVAamount, totalttc) VALUES ( '".$POST['companyName']."','".$POST['userId']."', '".$POST['address']."', '".$POST['baseht']."', '".$POST['remise']."', '".$POST['subTotal']."', '".$POST['taxRate']."', '".$POST['taxAmount']."', '".$POST['totalAftertax']."')";		
		mysqli_query($this->dbConnect, $sqlInsert);
		$lastInsertId = mysqli_insert_id($this->dbConnect);
		for ($i = 0; $i < count($POST['productName']); $i++) {
			$sqlInsertItem = "INSERT INTO ".$this->invoiceOrderItemTable."(id_devis, item_name, order_item_quantity, order_item_price, order_item_final_amount) VALUES ('".$lastInsertId."', '".$POST['productName'][$i]."', '".$POST['quantity'][$i]."', '".$POST['price'][$i]."', '".$POST['total'][$i]."')";			
			mysqli_query($this->dbConnect, $sqlInsertItem);
		}       	
	}	
	public function updateDevis($POST) {
		if($POST['invoiceId']) {	
			$sqlInsert = "UPDATE ".$this->invoiceOrderTable." 
				SET nom_client = '".$POST['companyName']."', adresse_client= '".$POST['address']."', totalht = '".$POST['subTotal']."', baseht = '".$POST['baseht']."', TVAamount = '".$POST['taxAmount']."', TVArate = '".$POST['taxRate']."', totalttc = '".$POST['totalAftertax']."', remise = '".$POST['remise']."'
				WHERE user_id = '".$POST['userId']."' AND id_devis = '".$POST['invoiceId']."'";		
			mysqli_query($this->dbConnect, $sqlInsert);	
		}		
		$this->deleteDevisItems($POST['invoiceId']);
		for ($i = 0; $i < count($POST['productName']); $i++) {			
			$sqlInsertItem = "INSERT INTO ".$this->invoiceOrderItemTable."(id_devis, item_name, order_item_quantity, order_item_price, order_item_final_amount) 
				VALUES ('".$POST['invoiceId']."', '".$POST['productName'][$i]."', '".$POST['quantity'][$i]."', '".$POST['price'][$i]."', '".$POST['total'][$i]."')";			
			mysqli_query($this->dbConnect, $sqlInsertItem);			
		}       	
	}	
	public function getDevisList(){
		$sqlQuery = "SELECT * FROM ".$this->invoiceOrderTable." ";	
			return  $this->getData($sqlQuery);
	}	
	public function getDevis($invoiceId){
		$sqlQuery = "SELECT * FROM ".$this->invoiceOrderTable." 
			WHERE  id_devis = '$invoiceId'";
		$result = mysqli_query($this->dbConnect, $sqlQuery);	
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		return $row;
	}	
	public function getDevisItems($invoiceId){
		$sqlQuery = "SELECT * FROM ".$this->invoiceOrderItemTable." 
			WHERE id_devis = '$invoiceId'";
		return  $this->getData($sqlQuery);	
	}
	public function deleteDevisItems($invoiceId){
		$sqlQuery = "DELETE FROM ".$this->invoiceOrderItemTable." 
			WHERE id_devis = '".$invoiceId."'";
		mysqli_query($this->dbConnect, $sqlQuery);				
	}
	public function deleteDevis($invoiceId){
		$sqlQuery = "DELETE FROM ".$this->invoiceOrderTable." 
			WHERE id_devis = '".$invoiceId."'";
		mysqli_query($this->dbConnect, $sqlQuery);	
		$this->deleteDevisItems($invoiceId);	
		return 1;
	}
}
?>