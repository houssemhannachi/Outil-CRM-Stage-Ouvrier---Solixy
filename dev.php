<?php
class Dev{
	private $host  = 'localhost';
    private $user  = 'root';
    private $password   = "";
    private $database  = "sol";   

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

	public function saveDevis($POST) {		
		$sqlInsert = "INSERT INTO devis (nom_client, adresse_client, baseht, remise, totalht, tauxtva,totaltva, totalttc) VALUES ( '".$POST['companyName']."', '".$POST['address']."', '".$POST['baseht']."', '".$POST['remise']."', '".$POST['totalht']."', '".$POST['tauxtva']."', '".$POST['totaltva']."', '".$POST['totalttc']."')";		
		mysqli_query($this->dbConnect, $sqlInsert);
		$lastInsertId = mysqli_insert_id($this->dbConnect);
		for ($i = 0; $i < count($POST['productName']); $i++) {
			$sqlInsertItem = "INSERT INTO devis_item(id_devis, item_name, order_item_quantity, order_item_price, order_item_final_amount) VALUES ('".$lastInsertId."', '".$POST['productName'][$i]."', '".$POST['quantity'][$i]."', '".$POST['price'][$i]."', '".$POST['total'][$i]."')";			
			mysqli_query($this->dbConnect, $sqlInsertItem);
		}       	
	}	
	public function updateDevis($POST) {
		if($POST['updateDevis']) {	
			$sqlInsert = "UPDATE devis
				SET nom_client = '".$POST['companyName']."', adresse_client= '".$POST['address']."', totalht = '".$POST['totalht']."', baseht = '".$POST['baseht']."', totaltva = '".$POST['totaltva']."', tauxtva = '".$POST['tauxtva']."', totalttc = '".$POST['totalttc']."', remise = '".$POST['remise']."'
				WHERE id_devis = '".$POST['updateDevis']."'";		
			mysqli_query($this->dbConnect, $sqlInsert);	
		}		
		$this->deleteDevisItems($POST['updateDevis']);
		for ($i = 0; $i < count($POST['productName']); $i++) {			
			$sqlInsertItem = "INSERT INTO devis_item (id_devis, item_name, order_item_quantity, order_item_price, order_item_final_amount) 
				VALUES ('".$POST['updateDevis']."', '".$POST['productName'][$i]."', '".$POST['quantity'][$i]."', '".$POST['price'][$i]."', '".$POST['total'][$i]."')";			
			mysqli_query($this->dbConnect, $sqlInsertItem);			
		}       	
	}	
	public function getDevisList(){
		$sqlQuery = "SELECT * FROM devis";	
			return  $this->getData($sqlQuery);
	}	
	public function getDevis($invoiceId){
		$sqlQuery = "SELECT * FROM devis
			WHERE  id_devis = '$invoiceId'";
		$result = mysqli_query($this->dbConnect, $sqlQuery);	
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		return $row;
	}	
	public function getDevisItems($invoiceId){
		$sqlQuery = "SELECT * FROM devis_item 
			WHERE id_devis = '$invoiceId'";
		return  $this->getData($sqlQuery);	
	}
	public function deleteDevisItems($invoiceId){
		$sqlQuery = "DELETE FROM devis_item
			WHERE id_devis = '".$invoiceId."'";
		mysqli_query($this->dbConnect, $sqlQuery);				
	}
	public function deleteDevis($invoiceId){
		$sqlQuery = "DELETE FROM devis
			WHERE id_devis = '".$invoiceId."'";
		mysqli_query($this->dbConnect, $sqlQuery);	
		$this->deleteDevisItems($invoiceId);	
		return 1;
	}
}
?>