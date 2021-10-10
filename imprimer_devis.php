<?php
session_start();
include 'dev.php';
$invoice = new Dev();

if(!empty($_GET['id_devis']) && $_GET['id_devis']) {
	echo $_GET['id_devis'];
	$invoiceValues = $invoice->getDevis($_GET['id_devis']);		
	$invoiceItems = $invoice->getDevisItems($_GET['id_devis']);		
}
$invoiceDate = date("d/M/Y, H:i:s", strtotime($invoiceValues['date']));
$fac = str_pad($invoiceValues['id_devis'],4,"0",STR_PAD_LEFT);
$date = date('d-m-y');
$year = date("y");
$output = '';
$output .= '<img src="assets\images\facture.jpg" width="100%" style="padding-top:80px;padding-bottom:30px;">
	<table width="100%" border="2" cellpadding="4" cellspacing="0">
	<tr>
	<td colspan="2" align="center" style="font-size:20px;font-family:  sans-serif;">Devis N° DE-D'.$fac.' </td>
	</tr>
	<tr>
	<td colspan="2">
	<table width="100%" cellpadding="4">
	<tr>
	<td width="65%">
	
	<b style="font-size:20px; font-family:sans-serif">SOLIXY SARL</b> <br/><br/>
	<b>Matricule :</b> 1531620 KAM 000<br/>
	<b>Adresse :</b> Avenue de la république_<br/>
	Imm Al Ahram 4éme étage_Gabés<br/>
	<b>Téléphone :</b> +216.75.270.938<br/>
	<b>Email :</b> contact@solixy.com<br/>
	<br/>
	<br/>
	Intitulé : (Prix en DT) :
	</td>
	<td> </td>
	<td width="35%">
	À,<br />
	<b>Client : </b>'.$invoiceValues['nom_client'].'<br /> 
	<b>Adresse : </b>'.$invoiceValues['adresse_client'].'<br />
	<b>Date Devis : </b>'.$date.'<br />
	<br/><br/><br/><br/>	<br/>
	
	

	</td>
	</tr>
	</table>
	<br />
	<table width="100%" border="1" cellpadding="4" cellspacing="0">
	<tr>
	<th align="left">Num</th>
	<th align="left">Désignation</th>
	<th align="left">PU HT</th>
	<th align="left">Quantité</th>
	<th align="left">Prix Total HT</th> 
	</tr>';
$count = 0;   
foreach($invoiceItems as $invoiceItem){
	$count++;
	$output .= '
	<tr>
	<td align="left">'.$count.'</td>
	<td align="left">'.$invoiceItem["item_name"].'</td>
	<td align="left">'.$invoiceItem["order_item_price"].'</td>
	<td align="left">'.$invoiceItem["order_item_quantity"].'</td>
	<td align="left">'.$invoiceItem["order_item_final_amount"].'</td>   
	</tr>';
}
$output .= '
	<tr>
	<td align="right" colspan="4"><b>Base HT:</b></td>
	<td align="left">'.$invoiceValues['baseht'].'</td>
	</tr>
	<tr>
	<td align="right" colspan="4"><b>Remise:</b></td>
	<td align="left">'.$invoiceValues['remise'].'</td>
	</tr>
	<tr>
	<td align="right" colspan="4"><b>Total HT:</b></td>
	<td align="left">'.$invoiceValues['totalht'].'</td>
	</tr>
	<tr>
	<td align="right" colspan="4"> <b>TVA à'.$invoiceValues['tauxtva'].'%:</b> </td>
	<td align="left">'.$invoiceValues['totaltva'].'</td>
	</tr>
	<tr>
	<td align="right" colspan="4"><b>TOTAL TTC en Dinars</b></td>
	<td align="left">'.$invoiceValues['totalttc'].'</td>
	</tr>';
$output .= '
	</table>
	</td>
	</tr>
	</table>';

	$output .= '
	
	<table  style="margin-top:20px; margin-left:20px; border-style: none; font-size:16px">
	<tr> <td>Nous restons à votre disposition pour toute information complémentaire.<br>Cordialement.</td></tr>

	</table>
	';
	$output .= '
	<div div style="margin-left:550px;"> 
	<table  style="margin-top:20px; border-style: none; font-size:17px; font-weight: bold;">
	<tr><td>Signature</td></tr>

	</table>
	</div>
	';


$output .= '
	<img src="assets\images\facture1.jpg" width="100%" style="position: fixed;top: 95%;">
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
