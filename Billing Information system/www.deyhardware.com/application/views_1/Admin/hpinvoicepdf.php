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
$pdf->SetTitle('HP INVOICE BY PURNA CHAND MULA');
$pdf->SetSubject('INVOICE');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
 $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

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
    foreach ($data2 as $row) {
       $date=$row->date;
       break;
    }
$table='<table style="text-align:center">';
$table.='<tr>
               <td style="text-decoration:underline"><b>TAX INVOICE</b></td>
         </tr>
         </table>


         <table >
         <tr>
             <td colspan="2"></td>
             <td></td>
         </tr>
         <tr>
               <td colspan="2"></td>
               <td><table style="text-align:center">
                 <tr>
                 <td style="border:1px solid #000"></td>
                 <td colspan="2" style="border:1px solid #000">Original for Recipient</td>
                 </tr>

                 <tr>
                 <td style="border:1px solid #000"></td>
                 <td colspan="2" style="border:1px solid #000">Duplicate for Transporter</td>
                 </tr>

                 <tr>
                 <td style="border:1px solid #000"></td>
                 <td colspan="2" style="border:1px solid #000">Riplicate for Supplier</td>
                 </tr>

               </table></td>
         </tr>
         </table>

          <table style="padding:3px">
            <tr>
              <td style="text-decoration:underline;border:1px solid #000"><b>GSTIN:</b></td>
              <td style="border:1px solid #000"><span style="text-decoration:underline;"><b>INVOICE NO </b></span>: PCM/17-18/HP</td>
            </tr>

            <tr>
              <td style="border:1px solid #000"><span style="text-decoration:underline;"><b>NAME: </b></span>M/S PURNA CHANDRA MULA</td>
              <td style="text-decoration:underline;border:1px solid #000"><b>DATE OF SUPPLY</b>: </td>
            </tr>

            <tr>
              <td style="border:1px solid #000"><span style="text-decoration:underline;"><b>ADDRESS: </b></span> 8, BAIDYANATH MULLICK LANE,KOLKATA-700007</td>
              <td style="border:1px solid #000"><span style="text-decoration:underline;"><b>TRANSPORT MODE: </b></span></td>
            </tr>

            <tr>
              <td style="border:1px solid #000"><span style="text-decoration:underline;"><b>EMAIL: </b></span> :PURNACHANDRAMULA123@GMAIL.COM</td>
              <td style="border:1px solid #000"><span style="text-decoration:underline;"><b>VHICLENUMBER: </b></span></td>
            </tr>
          </table>
           
           <table>
             <tr><td></td></tr>
           </table>

           <table style="border:1px solid #000;padding:2px">
            <tr><td style="padding:2px"><span style="text-dcoration:underline;text-align:center;"><b>BANK DETAILS</b></span></td>
            </tr>
            <tr>
            <td ><span style="text-decoration:underline"><b>BANK NAME :</b></span></td>
            </tr>
            <tr>
            <td ><span style="text-decoration:underline"><b>BRANCH NAME :</b></span></td>
            </tr>
            <tr>
            <td ><span style="text-decoration:underline"><b>A/C HOLDER NAME :</b></span></td>
            </tr>
            <tr>
            <td ><span style="text-decoration:underline"><b>A/C NUMBER :</b></span></td>
            </tr>
            <tr>
            <td ><span style="text-decoration:underline"><b>IFSC CODE :</b></span></td>
            </tr>
           </table>

           <table>
            <tr>
            <td></td>
            </tr>
           </table>

           <table style="border:1px solid #000;padding:2px">
            <tr><td><span style="text-dcoration:underline;text-align:center;"><b>BILL TO PARTY</b></span></td>
            </tr>
            <tr>
            <td><span style="text-decoration:underline"><b>*NAME </b></span>:'.$data1->com_name.'</td>
            </tr>
            <tr>
            <td><span style="text-decoration:underline"><b>*ADDRESS </b></span>:'.$data1->address.'</td>
            </tr>
            <tr>
            <td><span style="text-decoration:underline"><b>*GSTIN </b></span>:'.$data1->gst_no.'</td>
            </tr>
            <tr>
            <td><span style="text-decoration:underline"><b>*PAN  </b></span>:'.substr($data1->gst_no,2,10).'</td>
            </tr>
            <tr>
            <td><span style="text-decoration:underline"><b>CONTACT  NUMBER </b></span>:</td>
            </tr>
           </table>


           <table>
           <tr><td></td></tr>
           </table>
        
         <table style="border: 1px solid #000;text-align:center;padding:3px;">
         <tr>
               <th style="border: 1px solid #000;text-align:center"><b>SL NO</b></th>
               <th style="border: 1px solid #000;text-align:center" colspan="2"><b>DESCRIPTION</b></th>
               <th style="border: 1px solid #000;text-align:center"><b>HSN/SAC</b></th>
               <th style="border: 1px solid #000;text-align:center"><b>PURITY</b></th>
               <th style="border: 1px solid #000;text-align:center"><b>GROSS WT.</b></th>
               <th style="border: 1px solid #000;text-align:center"><b>NET WT.</b></th>
               <th style="border: 1px solid #000;text-align:center"><b>UNIT</b></th>
               <th style="border: 1px solid #000;text-align:center"><b>VALUE(Before Gst)</b></th>
         </tr>';
         $i=1;
         $grand_total=0;
          $grand_total_before_gst=0;
         $cgst=0;
         $sgst=0;
         $igst=0;
         $total3;
         foreach($data2 as $row1)
         {
            $table.='<tr>
               <td style="border: 1px solid #000;text-align:center">'.$i.'</td>
               <td style="border: 1px solid #000;text-align:center" colspan="2">'.$row1->des.'</td>
               <td style="border: 1px solid #000;text-align:center">'.$row1->sac.'</td>
               <td style="border: 1px solid #000;text-align:center"></td>
               <td style="border: 1px solid #000;text-align:center">'.$row1->gw.'</td>
                <td style="border: 1px solid #000;text-align:center">'.$row1->nw.'</td>
                 <td style="border: 1px solid #000;text-align:center">Gram</td>
               <td style="border: 1px solid #000;text-align:center">'.$row1->total.'</td>
         </tr>';
         $grand_total=$grand_total+$row1->total;
          $grand_total_before_gst=$grand_total;
         $cgst=$row1->cgst;
         $sgst=$row1->sgst;
         $igst=$row1->igst;
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
$table.='


         <table style=" #000;text-align:center;padding:5px;">
         <tr>
         <td colspan="2"></td>
         <td></td>
         <td></td>
         <td></td>
         <td></td>
         </tr>
         </table>

         <table style="">
            <tr>
            <td style="border: 1px solid #000;">
            <table style="padding:2px;">
              <tr><td>VALUE: '.$grand_total_before_gst.'</td></tr>
              <tr><td>CGST '.$cgst.'%: '.$total1.'</td></tr>
              <tr><td>SGST '.$sgst.'%: '.$total2.' </td></tr>
              <tr><td>TOTAL VALUE: '.round($grand_total).'</td></tr>
            </table>
            </td>

            <td style="border: 1px solid #000;">
            <table style="padding:2px;">
              <tr><td>TOTAL AMOUNT IN WORDS:</td></tr>
              <tr><td></td></tr>
              <tr><td></td></tr>
              <tr><td></td></tr>
            </table>
            </td>
            </tr>
         </table>

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
         <td  colspan="2" style="height:130px; border:1px solid #000;" >PARTY SIGNATURE</td>
         <td  colspan="3" style="height:130px;border:1px solid #000;">AUTHORISED SIGNATURE</td>
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
         <td colspan="3">*THIS IS A COMPUTER GENERATED INVOICE</td>
         <td ></td>
         <td></td>
         <td></td>
         </tr>
          ';
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
