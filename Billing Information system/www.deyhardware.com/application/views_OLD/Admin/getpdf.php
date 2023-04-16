<?php
//============================================================+
// File name   : example_005.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 005 for TCPDF class
//               Multicell
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Multicell
 * @author Nicola Asuni
 * @since 2008-03-04
 */
 
// Include the main TCPDF library (search for installation path).
// require_once('tcpdf_include.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('WEBTESLA');
$pdf->SetTitle('INVOICE BY DEY HARDWARE');
$pdf->SetSubject('INVOICE');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
// $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('times', '', 10);

// add a page
$pdf->AddPage();

// set cell padding
$pdf->setCellPaddings(1, 1, 1, 1);

// set cell margins
$pdf->setCellMargins(1, 1, 1, 1);

// set color for background
$pdf->SetFillColor(255, 255, 127);

// MultiCell($w, $h, $txt, $border=0, $align='J', $fill=0, $ln=1, $x='', $y='', $reseth=true, $stretch=0, $ishtml=false, $autopadding=true, $maxh=0)

  $date;
  $pmnt;
  $q=FALSE;
  $r=FALSE;
  $max_invoice;
    foreach ($data2 as $row) {
       $date=$row->date;
       $pmnt=$row->payment;
       $max_invoice=$row->no_invoice_day;
       break;
    }
   
$table='<div style="margin: 0 auto;">
		<table>
			<tbody>
				<tr>
					<td colspan="2">
						<img src="http://exotel.in/wp-content/uploads/2013/03/exotel.png"> <!-- your logo here -->
					</td>
					<td>
						<h2>Tax Invoice</h2><br>
						<strong>Date:</strong> <br>
						<strong>Invoice Number:</strong> BF123<br>
						<strong>GSTN:</strong> 19ADRPD8176AIZD<br>
						
					</td>
				</tr>
				
				<tr>
					<td colspan="1">
						<div style="text-align: justify; margin: 0 auto;width: 30em;">
							B-7/26(S),Kalyani Nadia, West Bengal,Near Central Park<br>
							Pin:741235, Contact:(033) 2582-3878, 9748824351<br>
							E-mail- deyhardware26@gmail.com
						</div>
					</td>
					
					
				</tr>
			</tbody>
		</table>
        
		 <table style="text-align:center">
         <tr>
         <td></td>
         <td></td>
         <td></td>
         <td></td>
         </tr>
         <tr>
         <td></td>
         <td></td>
         <td></td>
         <td></td>
         </tr>
         <tr>
         <td colspan="2" style="height:120px;border:1px solid #000;">Buyers Details 
         <br><br>
     
         Name:'.$data1->customer_name.'<br>
        <br>Address:'.$data1->address.'<br>
		<br>Contact No:'.$data1->ph_no.'<br>
		<br>GSTIN(if any):..............................................................<br>
         
         </td>
         <td colspan="3"style="height:120px;border:1px solid #000;">Buyer Signature on Deliever:</td>
         <td></td>
         <td></td>
         </tr>
         <tr>
         <td></td>
         <td></td>
         <td></td>
         <td></td>
         </tr>
         </table>';
$table.='<table style="border: 1px solid #000;text-align:center;padding:5px;">
         <tr>
               <th style="border: 1px solid #000;text-align:center" colspan="1"><b>SL NO</b></th>
               <th style="border: 1px solid #000;text-align:center" colspan="2"><b>Product Code</b></th>
               <th style="border: 1px solid #000;text-align:center" colspan="2"><b>PRODUCT DESCRIPTION</b></th>
               <th style="border: 1px solid #000;text-align:center"><b>QUANTITY</b></th>
               <th style="border: 1px solid #000;text-align:center"><b>RATE</b></th>
               <th style="border: 1px solid #000;text-align:center"><b>AMOUNT</b></th>
         </tr>';
         $i=1;
         $grand_total=0;
         $cgst=0;
         $sgst=0;
         $igst=0;

         foreach($data2 as $row1)
         {
         	$table.='<tr>
               <td style="border: 1px solid #000;text-align:center" colspan="1">'.$i.'</td>
               <td style="border: 1px solid #000;text-align:center" colspan="2">'.$row1->product_name.'</td>
               <td style="border: 1px solid #000;text-align:center" colspan="2">'.$row1->sac.'</td>
               <td style="border: 1px solid #000;text-align:center">'.$row1->qunty.'</td>
               <td style="border: 1px solid #000;text-align:center">'.$row1->mrp.'</td>
               <td style="border: 1px solid #000;text-align:center">'.$row1->grand_total_not_gst.'</td>
               <!--td style="border: 1px solid #000;text-align:center">'.$row1->grand_total_not_gst.'/-</td-->
         </tr>';
         $grand_total=$grand_total+$row1->grand_total_not_gst;
         $cgst=$row1->cgst * $row1->qunty;
         $sgst=$row1->sgst * $row1->qunty;
         $igst=$row1->igst * $row1->qunty;
         $total1;
         $total2;
         $total3;
         $i++;
         } 
         if($igst==0)
         {
             $total1=$grand_total*$cgst/100;
             $total2=$grand_total*$sgst/100;
             $grand_total=$grand_total+$total1+$total2;
         }
         else
         {
             $total3=$grand_total*$igst/100;
             $grand_total=$grand_total+$total3;
         }
         $table.="</table>";
$table.='<table style="border: 1px solid #000;text-align:center;padding:5px;">
         
         <tr>
         <td colspan="2"></td>
         <td></td>
         <td></td>
         <td></td>
         <td></td>
         </tr>

         <tr>
         <td colspan="2"></td>
         <td></td>
         <td></td>
         <td></td>
         <td></td>
         </tr>
         </table>

         <table style="border: 1px solid #000;text-align:center;padding:5px;">

         <tr>
         <td colspan="2" style="border-top:  1px solid #000; border-bottom:  1px solid #000;text-align:center"></td>
         <td style="border-top:  1px solid #000;border-bottom:  1px solid #000;text-align:center"></td>
         <td style="border-top: 1px solid #000;border-bottom:  1px solid #000;text-align:center"></td>
         <td style="border: 1px solid #000;text-align:center">CGST</td>
         <td style="border: 1px solid #000;text-align:center" >'.$cgst.'%</td>
         <td style="border: 1px solid #000;text-align:center" >'.$total1.'/-</td>
         </tr>


         <tr>
         <td colspan="2" style="border-top:  1px solid #000; border-bottom:  1px solid #000;text-align:center"></td>
         <td style="border-top:  1px solid #000;border-bottom:  1px solid #000;text-align:center"></td>
         <td style="border-top: 1px solid #000;border-bottom:  1px solid #000;text-align:center"></td>
         <td style="border: 1px solid #000;text-align:center">SGST</td>
         <td style="border: 1px solid #000;text-align:center" >'.$sgst.'%</td>
         <td style="border: 1px solid #000;text-align:center" >'.$total2.'/-</td>
         </tr>

         <tr>
         <td colspan="2" style="border-top:  1px solid #000; border-bottom:  1px solid #000;text-align:center"></td>
         <td style="border-top:  1px solid #000;border-bottom:  1px solid #000;text-align:center"></td>
         <td style="border-top: 1px solid #000;border-bottom:  1px solid #000;text-align:center"></td>
         <td style="border: 1px solid #000;text-align:center">IGST</td>
         <td style="border: 1px solid #000;text-align:center" >'.$igst.'%</td>
         <td style="border: 1px solid #000;text-align:center" >'.$total3.'/-</td>
         </tr>

          <tr>
         <td colspan="2" style="border-top:  1px solid #000; border-bottom:  1px solid #000;text-align:center"></td>
         <td style="border-top:  1px solid #000;border-bottom:  1px solid #000;text-align:center"></td>
         <td style="border-top: 1px solid #000;border-bottom:  1px solid #000;text-align:center"></td>
         <td style="border: 1px solid #000;text-align:center">TOTAL</td>
         <td style="border: 1px solid #000;text-align:center" colspan="2">'.$grand_total.'/-</td>
         </tr>

         <tr>
         <td colspan="2" style="border-top:  1px solid #000; border-bottom:  1px solid #000;text-align:center"></td>
         <td style="border-top:  1px solid #000;border-bottom:  1px solid #000;text-align:center"></td>
         <td style="border-top: 1px solid #000;border-bottom:  1px solid #000;text-align:center"></td>
         <td style="border: 1px solid #000;text-align:center">Payment Done</td>
         <td style="border: 1px solid #000;text-align:center" colspan="2">'.$pmnt.'/-</td>
         </tr>

         <tr>
         <td colspan="2" style="border-top:  1px solid #000; border-bottom:  1px solid #000;text-align:center"></td>
         <td style="border-top:  1px solid #000;border-bottom:  1px solid #000;text-align:center"></td>
         <td style="border-top: 1px solid #000;border-bottom:  1px solid #000;text-align:center"></td>
         <td style="border: 1px solid #000;text-align:center">Remaining</td>
         <td style="border: 1px solid #000;text-align:center" colspan="2">'.($data3->total-$pmnt).'/-</td>
         </tr>';
        if($q)
        {
            $table=$table.'<tr>
         <td colspan="2" style="border-top:  1px solid #000; border:  1px solid #000;text-align:center">New Added on '.$date.'</td>
         <td style="border-top:  1px solid #000;border-bottom:  1px solid #000;text-align:center"></td>
         <td style="border-top: 1px solid #000;border-bottom:  1px solid #000;text-align:center"></td>
         <td style="border: 1px solid #000;text-align:center">Adding</td>
         <td style="border: 1px solid #000;text-align:center" colspan="2">'.($data3->$payment-$pmnt).'/-</td>
         </tr>

         <td colspan="2" style="border-top:  1px solid #000; border:  1px solid #000;text-align:center"></td>
         <td style="border-top:  1px solid #000;border-bottom:  1px solid #000;text-align:center"></td>
         <td style="border-top: 1px solid #000;border-bottom:  1px solid #000;text-align:center"></td>
         <td style="border: 1px solid #000;text-align:center">Remaing</td>
         <td style="border: 1px solid #000;text-align:center" colspan="2">'.($data3->total-$data3->payment).'/-</td>
         </tr>';
        }
         
         $table=$table.'</table>


          <table>
         <tr>
         <td></td>
         <td></td>
         <td></td>
         <td></td>
         </tr>
         </table>
         <table>
			<tbody>
				<tr>
					<td>
						<div class="center-justified"><strong>In Words:...........................................................................</strong>
							
						</div>
					</td>
					<td>
						<div style="text-align: justify; margin: 0 auto;width: 30em;">
						<strong>For Dey Hardware</strong><br>
						Signature Here
					</td>
				</tr>
			</tbody>
		</table>
		<hr>
		<table>
			<tbody>
				<tr>
					<td>
						<div style="text-align: justify; margin: 0 auto;width: 30em;"><strong>Declaration:</strong><br>
							Your payment options<br>
							 Your service tax number<br>
							 Service tax category<br>
							 Service tax code<br>
						</div>
					</td>
					<td>
						<div style="text-align: justify; margin: 0 auto;width: 30em;">
						
						
					</td>
				</tr>
			</tbody>
		</table>
         <tr>
         <td ></td>
         <td ></td>
         <td></td>
         <td></td>
         </tr>

         <tr>
         <td colspan="3">*THIS IS A COMPUTER GENERATED <b>';
         


         $table=$table.'</b> INVOICE</td>
         <td ></td>
         <td></td>
         <td></td>
         </tr>';
$table.='</table> </div>';
$pdf->writeHTMLCell(0,0,'','',$table,0,1,0,true,'',true);
// move pointer to last page
$pdf->lastPage();

// ---------------------------------------------------------
ob_clean();
//Close and output PDF document
$pdf->Output('bill.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
