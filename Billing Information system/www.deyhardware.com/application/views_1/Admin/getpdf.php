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
$invoice="";
// set default header data
$chanal_invoice;
if(!empty($data3))
{ 
    if($data3->payment == $data3->total)
      {
         $chanal_invoice='INVOICE NO';
		 $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, "                                                                         TAX INVOICE");
      }
    else{
         $chanal_invoice='CHALAN NO';
		 $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, "                                                                             CHALAN");
      }
}
else {
    $chanal_invoice='INVOICE NO';
	$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, "                                                                              TAX INVOICE");
}

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
//$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

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


function convert_in_words($number)
{
   $no = round($number);
   $point = round($number - $no, 2) * 100;
   $hundred = null;
   $digits_1 = strlen($no);
   $i = 0;
   $str = array();
  $words = array('0' => '', '1' => 'One', '2' => 'Two',
    '3' => 'Three', '4' => 'Four', '5' => 'Five', '6' => 'Six',
    '7' => 'Seven', '8' => 'Eight', '9' => 'Nine',
    '10' => 'Ten', '11' => 'Eleven', '12' => 'Twelve',
    '13' => 'Thirteen', '14' => 'Fourteen',
    '15' => 'Fifteen', '16' => 'Sixteen', '17' => 'Seventeen',
    '18' => 'Eighteen', '19' =>'Nineteen', '20' => 'Twenty',
    '30' => 'Thirty', '40' => 'Forty', '50' => 'Fifty',
    '60' => 'Sixty', '70' => 'Seventy',
    '80' => 'Eighty', '90' => 'Ninety');
   $digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');
   while ($i < $digits_1) {
     $divider = ($i == 2) ? 10 : 100;
     $number = floor($no % $divider);
     $no = floor($no / $divider);
     $i += ($divider == 10) ? 1 : 2;
     if ($number) {
        $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
        $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
        $str [] = ($number < 21) ? $words[$number] .
            " " . $digits[$counter] . $plural . " " . $hundred
            :
            $words[floor($number / 10) * 10]
            . " " . $words[$number % 10] . " "
            . $digits[$counter] . $plural . " " . $hundred;
     } else $str[] = null;
  }
  $str = array_reverse($str);
  $result = implode('', $str);
  $points = ($point) ?
    "." . $words[$point / 10] . " " . 
          $words[$point = $point % 10] : '';
  return  $result . "Rupees Only ";

}

// $short_name=$data1->com_name;
// if($data1->gst_no=='27AACCB8955A1ZR')
// {
//   $short_name="BG";
// }
// if($data1->gst_no=='19AAFFM0833Q1ZE')
// $short_name="MI";
//   $date;
//   $pos;
//   $id;
//   $total_invoice_no;
//   $q=0;
//     foreach ($data2 as $row) {
//        $date=$row->date;
//        $pos=$row->pos;
//        $id=$row->no_invoice_day;
//        $total_invoice_no=$row->total_invoice_no;
//        if($pos!=NULL)
//          $q=1;
//        break;
//     }
$date;

  $pmnt;
  $q=FALSE;
  $r=FALSE;
  $max_invoice;
  $payment_mode;
    foreach ($data2 as $row) {
       $date=$row->date;
       $pmnt=$row->payment;
       $max_invoice=$row->no_invoice_day;
	   $invoice_no=$row->invoice_no;
	   $payment_mode= $row->payment_mode;
       break;
    }


$table='<table  style="padding:0px 10px ; text-align:left">
         <tr style="text-align:center">
            <td colspan="3" style="border-left: 1px solid #000;border-top: 1px solid #000; text-align:left"><img src="assets/images/logo1.png" width="100" height="35"/></td>
            <td style="border: 1px solid #000;"> 
            '.$chanal_invoice.' :'.$invoice_no.'</td>
            <td style="border: 1px solid #000;">DATE:'.$date.'</td>
         </tr>
         
         <tr>
          <td colspan="3" style="border-left: 1px solid #000;text-align:"><b>
          B-7/26(S), KALYANI NADIA , WESTBENGAL , NEAR CENTRAL PARK
          PIN : 741235 , CONTACT : (033)2582-3878, 9748824351</b>
          </td>
          
          <td style="border: 1px solid #000;text-align:left" colspan="2">
             <b>GSTIN: 19ADRPD8176AIZD<br/>
             PAN: ADRPD8176AIZ</b>
          </td>
         </tr>

         <tr>
         <td style="border-left: 1px solid #000;text-align:left border-bottom:1px solid #000" colspan="3">
             <b>EMAIL : deyhardware26@gmail.com 
          www.facebook.com/deyhardware26</b>
         </td>
         <td style="border: 1px solid #000;" colspan="2">
            <b>PAYMENT MODE :'.$payment_mode.'</b>
         </td>
         </tr>

         
         <tr>
           <td colspan="5" style="border-left: 1px solid #000; border-right:1px solid #000">
                <b>BUYER\'S DETAILS:</b>
           </td>
       </tr>
 
       <tr>
       <td colspan="3" style="border-left: 1px solid #000; "><b>NAME:</b> '.$data1->customer_name.'</td>
       <td colspan="2" style="border-right: 1px solid #000;"><b>CONTACT NUMBER:</b>'.$data1->ph_no.'</td>
       </tr>


        <tr>
       <td colspan="3" style="border-left: 1px solid #000;border-bottom: 1px solid #000; "><b>ADDRESS:</b> '.$data1->address.'</td>
       <td colspan="2" style="border-right: 1px solid #000;border-bottom: 1px solid #000; "><b>GSTIN(IF ANY): </b></td>
       </tr>

         
       </table>';


       $table.='</table>';

$table.='<table style="padding:5px">';

$table.='<tr  style="text-align:center">

            <th style="border:1px solid #000"><b>SL NO</b></th>
            <th style="border:1px solid #000"><b>PRD CODE</b></th>
            <th colspan="2" style="border:1px solid #000"><b>PRD DESC</b></th>
            <th style="border:1px solid #000"><b>QUANTITY</b></th>
            <th style="border:1px solid #000"><b>RATE</b></th>
            <th colspan="2" style="border:1px solid #000"><b>AMOUNT</b></th>
        </tr>';

         $i=1;
         $grand_total=0;
         $cgst=0;
         $sgst=0;
         $igst=0;
         $total_=0;
		 $total_discount=0;
         $total_discount_per=0;
		 $count_loop=0;
         foreach($data2 as $row1)
         {
         	$table.='<tr style="text-align:center">
               <td style="border: 1px solid #000">'.$i.'</td>
               <td style="border: 1px solid #000">'.$row1->product_name.'</td>
               <td colspan="2" style="border: 1px solid #000">'.$row1->sac.'</td>
               <td style="border: 1px solid #000">'.$row1->qunty.'</td>
               <td style="border: 1px solid #000">'.$row1->mrp.'</td>
               <td colspan="2" style="border: 1px solid #000">'.$row1->grand_total_not_gst.'</td>
         </tr>';
		 $count_loop++;
         $grand_total=$grand_total+$row1->grand_total_not_gst;
         $total_=$total_+$row1->grand_total_not_gst;
		 $total_discount_per = $row1->discount_total;
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
			 if($total_discount_per>0){
					$total_discount= $total_ - ($total_ * $total_discount_per )/100;
					$total1=$total_discount*$cgst/100;
					$total2=$total_discount*$sgst/100;
					$grand_total=$grand_total+$total1+$total2 - ($total_ * $total_discount_per )/100;
				 }
				 else{
					 $total_discount= 0;
					 $grand_total=$grand_total+$total1+$total2 - ($total_ * $total_discount_per )/100;
				}
			 
             
         }
         else
         {
             $total3=$grand_total*$igst/100;
			 $total_discount= ($total_ * $total_discount_per )/100;
             $grand_total=$grand_total+$total3 - $total_discount;
         }

		 
			 $count_loop=13-$count_loop;
		 for($t_c=0;$t_c<$count_loop;$t_c++)
{
$table.='<tr style="text-align:center">
           <td style="border-left:1px solid #000"></td>
           <td style="border-left:1px solid #000"></td>
           <td colspan="3" style="border-left:1px solid #000"></td>
           <td style="border-left:1px solid #000"></td>
           <td style="border-left:1px solid #000"></td>
           <td colspan="2" style="border-left:1px solid #000;border-right:1px solid #000"></td>
         </tr>';
  }

$table.='<tr style="text-align:center">
             
             <td colspan="2" style="border-left:1px solid #000;border-top:1px solid #000;"><b>BUYER\'S SIGNATURE</b></td>
             <td colspan="5" style="border:1px solid #000"><b>TOTAL :</b></td>
             <td colspan="2" style="border:1px solid #000"><b>'.$total_.'</b></td>
        </tr>';

$table.='<tr style="text-align:center">

             <td colspan="2" style="border-left:1px solid #000;"><b>ON DELIVERY :</b></td>
             <td colspan="5" style="border:1px solid #000"><b>DISCOUNT :'.$total_discount_per.' %</b></td>
             <td colspan="2" style="border:1px solid #000"><b></b>'.$total_discount.'</td>

        </tr>';

 $table.='<tr style="text-align:center">

             <td colspan="2" style="border-left:1px solid #000;"><b></b></td>
             <td colspan="5" style="border:1px solid #000"><b>SGST :'.$cgst.' % </b></td>
             <td colspan="2" style="border:1px solid #000"><b> </b>'.$total1.'</td>

        </tr>';

$table.='<tr style="text-align:center">

             <td colspan="2" style="border-left:1px solid #000;"><b></b></td>
             <td colspan="5" style="border:1px solid #000"><b>CGST :'.$cgst.'% </b></td>
             <td colspan="2" style="border:1px solid #000"><b> </b>'.$total2.'</td>

        </tr>';       

$table.='<tr style="text-align:center">

             <td colspan="2" style="border-left:1px solid #000;border-bottom:1px solid #000"><b></b></td>
             <td colspan="5" style="border:1px solid #000"><b>NET TAXABLE  AMOUNT : </b></td>
             <td colspan="2" style="border:1px solid #000"><b>'.$grand_total.'/-</b></td>

        </tr>';
    
        if(!empty($data3))
        {
            $table.='<tr style="text-align:center">

             <td colspan="2" style="border-left:1px solid #000;border-bottom:1px solid #000"><b></b></td>
             <td colspan="5" style="border:1px solid #000"><b>Payment AMOUNT : </b></td>
             <td colspan="2" style="border:1px solid #000"><b>'.$data3->payment.'/-</b></td>

            </tr>';
        if($data3->payment != $data3->total)
        {
         $table.='<tr style="text-align:center">

             <td colspan="2" style="border-left:1px solid #000;border-bottom:1px solid #000"><b></b></td>
             <td colspan="5" style="border:1px solid #000"><b>Remaing: </b></td>
             <td colspan="2" style="border:1px solid #000"><b>'.($data3->total-$data3->payment).'/-</b></td>

            </tr>';
            }
         /*$table=$table.'<tr>
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
         </tr>';*/
        }



$table.='</table>';


$table.='<table>';

$table.='<tr>
            <td></td>
         </tr>';
$table.='<tr>
            <td>IN WORDS: ' .convert_in_words($grand_total).' </td>
         </tr>';

$table.='<tr>
            <td></td>
         </tr>';
$table.='</table>';



$table.='<table style="border:1px solid #000">';

$table.='<tr>
            <td>DECLARATION :</td>
         </tr>';
$table.='<tr>
            <td>1.  Goods once sold are not to be returned  or exchanged on any circumstances</td>
         </tr>';

$table.='<tr>
            <td>2.  Please retain the bill for warranty purpose(10 Years for JAQUAR Products) and must be shown when required.</td>
         </tr>';
$table.='<tr>
            <td>3.  Each & every items should be checked by the customer when delivered or else no complaints  will  be  entertained  further. If any manufactural  defects are found, Customer  should call the Customer Care for replacements</td>
         </tr>';
$table.='<tr>
            <td>4.  For any query please contact the customer care given overleaf.</td>
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
