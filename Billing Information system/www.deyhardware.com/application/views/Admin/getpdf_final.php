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
   // if($pmnt!=$data3->payment)
   // {
   //   $date=date('d-m-Y');
   //   $q=TRUE;
   // }  
   // $date_now=date('d-m-Y');
   // if($date_now==$date)
   // {
   //    $r=TRUE;
   // }
$table='<table>';
$table.='<tr>
               <td colspan="2"><b>DEY HARDWARE</b></td>
               <td><b>TAX INVOICE</b></td>
         </tr>
         <tr>
             <td colspan="2"></td>
             <td></td>
         </tr>
         <tr>
               <td colspan="2">8 BAIDYNATH MULLICK LANE</td>
               <td>Date:'.$date.'</td>
         </tr>
         <tr>
               <td colspan="2">KOLKATA</td>
               <td><b>INVOICE  NO :</b>DH@'.$date.'/'.$data1->ph_no.'/'.$max_invoice.'</td>
         </tr>
         <tr>
               <td colspan="2">PIN 700007</td>
               <td></td>
         </tr>
         <tr>
               <td colspan="2">WEST BENGAL</td>
               <td></td>
         </tr>
         <tr>
               <td colspan="2"></td>
               <td></td>
         </tr>
         <tr>
               <td colspan="2"><b>CUSTOMER DETAILS</b></td>
               <td></td>
         </tr>
         <tr>
               <td colspan="2"></td>
               <td></td>
         </tr>
         <tr>
               <td colspan="2"><b>NAME: '.$data1->customer_name.' </b></td>
               <td></td>
         </tr>
         <tr>
               <td colspan="7"><b>ADDRESS:</b>'.$data1->address.'</td>
               <td></td>
         </tr>
         <tr>
               <td colspan="2"><b>Ph NO:'.$data1->ph_no.'</b></td>
               <td></td>
         </tr>
         <tr>
               <td colspan="2"></td>
               <td></td>
         </tr>
         <tr>
               <td colspan="2"></td>
               <td></td>
         </tr>
         </table>
         <table style="border: 1px solid #000;text-align:center;padding:5px;">
         <tr>
               <th style="border: 1px solid #000;text-align:center"><b>SL NO</b></th>
               <th style="border: 1px solid #000;text-align:center" colspan="2"><b>Product Name</b></th>
               <th style="border: 1px solid #000;text-align:center"><b>SAC</b></th>
               <th style="border: 1px solid #000;text-align:center"><b>MRP</b></th>
               <th style="border: 1px solid #000;text-align:center"><b>Discount</b></th>
               <th style="border: 1px solid #000;text-align:center"><b>Date</b></th>
               <th style="border: 1px solid #000;text-align:center"><b>TOTAL without GST</b></th>
         </tr>';
         $i=1;
         $grand_total=0;
         $cgst=0;
         $sgst=0;
         $igst=0;

         foreach($data2 as $row1)
         {
         	$table.='<tr>
               <td style="border: 1px solid #000;text-align:center">'.$i.'</td>
               <td style="border: 1px solid #000;text-align:center" colspan="2">'.$row1->product_name.'</td>
               <td style="border: 1px solid #000;text-align:center">'.$row1->sac.'</td>
               <td style="border: 1px solid #000;text-align:center">'.$row1->mrp.'/-</td>
               <td style="border: 1px solid #000;text-align:center">'.$row1->discount.'%</td>
               <td style="border: 1px solid #000;text-align:center">'.$row1->date.'</td>
               <td style="border: 1px solid #000;text-align:center">'.$row1->grand_total_not_gst.'/-</td>
         </tr>';
         $grand_total=$grand_total+$row1->grand_total_not_gst;
         $cgst=$row1->cgst;
         $sgst=$row1->sgst;
         $igst=$row1->igst;
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
         <td colspan="2" style="height:120px;border:1px solid #000;">PARTY SIGNATURE</td>
         <td colspan="3"style="height:120px;border:1px solid #000;">AUTHORISED SIGNATURE</td>
         <td></td>
         <td></td>
         </tr>
         </table>

         <table>
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
$table.='</table>';
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
