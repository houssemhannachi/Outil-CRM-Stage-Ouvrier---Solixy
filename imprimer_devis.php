<?php
session_start();
include 'dev.php';
$invoice = new Dev();
$invoice->checkLoggedIn();
if(!empty($_GET['id_devis']) && $_GET['id_devis']) {
	echo $_GET['id_devis'];
	$invoiceValues = $invoice->getDevis($_GET['id_devis']);		
	$invoiceItems = $invoice->getDevisItems($_GET['id_devis']);		
}
$invoiceDate = date("d/M/Y, H:i:s", strtotime($invoiceValues['date']));
$output = '';
$output .= '<img src="images\facture.jpg" width="100%" style="padding-top:80px;padding-bottom:30px;">
	<table width="100%" border="2" cellpadding="5" cellspacing="0">
	<tr>
	<td colspan="2" align="center" style="font-size:20px"><b>Devis</b></td>
	</tr>
	<tr>
	<td colspan="2">
	<table width="100%" cellpadding="5">
	<tr>
	<td width="65%">
	À,<br />

	Client : <b>'.$invoiceValues['nom_client'].'</b><br /> 
	Adresse Client : '.$invoiceValues['adresse_client'].'<br />
	</td>
	<td width="35%">         
	FACTURE N° : '.$invoiceValues['id_devis'].'<br />
	Date Facture : '.$invoiceDate.'<br />
	</td>
	</tr>
	</table>
	<br />
	<table width="100%" border="1" cellpadding="5" cellspacing="0">
	<tr>
	<th align="left">Sr No.</th>
	<th align="left">Réf</th>
	<th align="left">Désignation</th>
	<th align="left">Quantité</th>
	<th align="left">PU HT</th>
	<th align="left">Montant HT</th> 
	</tr>';
$count = 0;   
foreach($invoiceItems as $invoiceItem){
	$count++;
	$output .= '
	<tr>
	<td align="left">'.$count.'</td>
	<td align="left">'.$invoiceItem["item_code"].'</td>
	<td align="left">'.$invoiceItem["item_name"].'</td>
	<td align="left">'.$invoiceItem["order_item_quantity"].'</td>
	<td align="left">'.$invoiceItem["order_item_price"].'</td>
	<td align="left">'.$invoiceItem["order_item_final_amount"].'</td>   
	</tr>';
}
$output .= '
	<tr>
	<td align="right" colspan="5"><b>Total HT:</b></td>
	<td align="left"><b>'.$invoiceValues['totalht'].'</b></td>
	</tr>
	<tr>
	<td align="right" colspan="5"><b>Taux T.V.A:</b></td>
	<td align="left">'.$invoiceValues['TVArate'].'</td>
	</tr>
	<tr>
	<td align="right" colspan="5">Total T.V.A:</td>
	<td align="left">'.$invoiceValues['TVAamount'].'</td>
	</tr>
	<tr>
	<td align="right" colspan="5">Total TTC: </td>
	<td align="left">'.$invoiceValues['totalttc'].'</td>
	</tr>
	<tr>
	<td align="right" colspan="5">Remise:</td>
	<td align="left">'.$invoiceValues['remise'].'</td>
	</tr>
	<tr>
	<td align="right" colspan="5"><b>Base HT:</b></td>
	<td align="left">'.$invoiceValues['baseht'].'</td>
	</tr>';
$output .= '
	</table>
	</td>
	</tr>
	</table>';

	$output .= '
	<div style="display:inline-block;vertical-align:top;">
	<table  style="margin-top:20px; border: 1px solid grey; font-size:14px">
	<tr><td>Règlement par virement sur le compte bancaire suivant:</td></tr>
	<tr><td><b>Banque:</b> Banque Al Baraka Gabés</td></tr>
	<tr><td><b>Numéro de compte :</b> 32016788116120143169 </td></tr>
	<tr><td><b>Code IBAN:</b>  TN59 32016788116120143169 </td></tr>
	<tr><td><b>Code BIC/SWIFT:</b>  BEITTNTT</td></tr>

	</table>
	</div>';
	$output .= '<div style="display:inline-block;vertical-align:top; float:right">
	<table style="margin-top:20px; border: 1px solid grey; width:300px; height:80px">
	<tr><td style=" font-weight: bold; font-size:15px; text-align:center; margin:0px">Signature<br><br><br></td>
	</tr>



	
	</table>
	</div>';

$output .= '
	<img src="images\facture1.jpg" width="100%" style="position: fixed;top: 95%;">
';

// create pdf of invoice	
$invoiceFileName = 'Facture_'.$invoiceValues['id_devis'].'.pdf';
require_once 'dompdf/src/Autoloader.php';
Dompdf\Autoloader::register();
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$dompdf->loadHtml(html_entity_decode($output));
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream($invoiceFileName, array("Attachment" => false));
?>   
   