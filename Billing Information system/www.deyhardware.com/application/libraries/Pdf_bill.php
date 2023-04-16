<?php 

   require_once dirname(__file__).'/tcpdf/tcpdf.php';
   class Pdf_bill extends TCPDF
   {
   	protected $ci;
   	function __construct()
   	{
   		$this->ci & (get_instance());
   	}
   }
 ?>