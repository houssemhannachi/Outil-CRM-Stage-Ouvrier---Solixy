<?php
class Invoice{
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
			die('Error in query: '.mysqli_error($this->dbConnect));
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
			die('Error in query: '. mysqli_error());
		}
		$numRows = mysqli_num_rows($result);
		return $numRows;
	}

	public function saveInvoice($POST) {		
		$sqlInsert = "INSERT INTO facture (id_client, order_total_before_tax, order_total_tax, order_tax_per, order_total_after_tax, order_amount_paid, order_total_amount_due, note) VALUES ('".$POST['id_client']."', '".$POST['subTotal']."', '".$POST['taxAmount']."', '".$POST['taxRate']."', '".$POST['totalAftertax']."', '".$POST['amountPaid']."', '".$POST['amountDue']."', '".$POST['notes']."')";		
		mysqli_query($this->dbConnect, $sqlInsert);
		$lastInsertId = mysqli_insert_id($this->dbConnect);
		for ($i = 0; $i < count($POST['productCode']); $i++) {
			$sqlInsertItem = "INSERT INTO facture_item(id_facture, item_code, item_name, order_item_quantity, order_item_price, order_item_final_amount) VALUES ('".$lastInsertId."', '".$POST['productCode'][$i]."', '".$POST['productName'][$i]."', '".$POST['quantity'][$i]."', '".$POST['price'][$i]."', '".$POST['total'][$i]."')";			
			mysqli_query($this->dbConnect, $sqlInsertItem);
		}       	
	}	
	public function updateInvoice($POST) {
		if($POST['invoiceId']) {	
			$sqlInsert = "UPDATE facture 
				SET id_client = '".$POST['id_client']."',  order_total_before_tax = '".$POST['subTotal']."', order_total_tax = '".$POST['taxAmount']."', order_tax_per = '".$POST['taxRate']."', order_total_after_tax = '".$POST['totalAftertax']."', order_amount_paid = '".$POST['amountPaid']."', order_total_amount_due = '".$POST['amountDue']."', note = '".$POST['notes']."' 
				WHERE id_facture = '".$POST['invoiceId']."'";		
			mysqli_query($this->dbConnect, $sqlInsert);	
		}		
		$this->deleteInvoiceItems($POST['invoiceId']);
		for ($i = 0; $i < count($POST['productCode']); $i++) {			
			$sqlInsertItem = "INSERT INTO facture_item(id_facture, item_code, item_name, order_item_quantity, order_item_price, order_item_final_amount) 
				VALUES ('".$POST['invoiceId']."', '".$POST['productCode'][$i]."', '".$POST['productName'][$i]."', '".$POST['quantity'][$i]."', '".$POST['price'][$i]."', '".$POST['total'][$i]."')";			
			mysqli_query($this->dbConnect, $sqlInsertItem);			
		}       	
	}	
	public function getInvoiceList(){
		$sqlQuery = "SELECT f.id_facture,f.id_client,f.order_total_before_tax,f.order_total_tax,f.order_tax_per,f.order_total_after_tax,f.order_amount_paid,f.order_total_amount_due,f.order_date,f.note,c.id_client,c.rs_client,c.adresse_client
		FROM facture f, clients c
		WHERE f.id_client= c.id_client";
		return  $this->getData($sqlQuery);
	}	
	public function getInvoice($invoiceId){
		$sqlQuery = "SELECT f.id_facture,f.id_client,f.order_total_before_tax,f.order_total_tax,f.order_tax_per,f.order_total_after_tax,f.order_amount_paid,f.order_total_amount_due,f.order_date,f.note,c.id_client,c.rs_client,c.adresse_client,c.ref_client,c.mf_client
			FROM facture f, clients c
			WHERE f.id_facture = '$invoiceId' AND f.id_client= c.id_client";
		$result = mysqli_query($this->dbConnect, $sqlQuery);	
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		return $row;
	}	
	public function getInvoiceItems($invoiceId){
		$sqlQuery = "SELECT * FROM facture_item
			WHERE id_facture = '$invoiceId'";
		return  $this->getData($sqlQuery);	
	}
	public function deleteInvoiceItems($invoiceId){
		$sqlQuery = "DELETE FROM facture_item
			WHERE id_facture = '".$invoiceId."'";
		mysqli_query($this->dbConnect, $sqlQuery);				
	}
	public function deleteInvoice($invoiceId){
		$sqlQuery = "DELETE FROM facture
			WHERE id_facture = '".$invoiceId."'";
		mysqli_query($this->dbConnect, $sqlQuery);	
		$this->deleteInvoiceItems($invoiceId);	
		return 1;
	}

	public function savePaiement($POST) {		
		$sqlInsert = "INSERT INTO paiements (id_client, date_paiement, mode_de_paiement, id_facture, prix, status_paiement) VALUES ('".$POST['id_client']."', '".$POST['date_paiement']."', '".$POST['mode_de_paiement']."', '".$POST['id_facture']."', '".$POST['prix']."', '".$POST['status_paiement']."')";		
		mysqli_query($this->dbConnect, $sqlInsert);
		       	
	}
	public function getPaiementList(){
		$sqlQuery = "SELECT p.id_paiement ,p.id_client ,p.date_paiement,p.mode_de_paiement,p.id_facture,p.prix,p.status_paiement,c.id_client,c.rs_client,f.id_facture,f.order_total_after_tax
		FROM paiements p, clients c, facture f
		WHERE p.id_client= c.id_client AND f.id_facture= p.id_facture";
		return  $this->getData($sqlQuery);
	}
	public function getPaiement($invoiceId){
		$sqlQuery = "SELECT p.id_paiement ,p.id_client ,p.date_paiement,p.mode_de_paiement,p.id_facture,p.prix,p.status_paiement,c.id_client,c.rs_client
			FROM paiements p, clients c
			WHERE p.id_paiement = '$invoiceId' AND p.id_client= c.id_client " ;
		$result = mysqli_query($this->dbConnect, $sqlQuery);	
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		return $row;
	}
	public function updatepaiement($POST) {
		if($POST['id_paiement']) {	
			$sqlInsert = "UPDATE paiements 
				SET date_paiement = '".$POST['date_paiement']."', mode_de_paiement = '".$POST['mode_de_paiement']."', prix = '".$POST['prix']."', status_paiement = '".$POST['status_paiement']."'
				WHERE id_paiement = '".$POST['id_paiement']."'";		
			mysqli_query($this->dbConnect, $sqlInsert);	
		}}		

}
