<!DOCTYPE html>
<html>
<head>
	<title></title>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/admin_style.css'); ?>">
  <!-- For Bootstrap CDN for JQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- For Bootstrap CDN Javascript -->
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style type="text/css">
    body{
      overflow-x: hidden;
    }
    *{
      padding: 0px;
     }
     
  </style>
  <script type="text/javascript">
    $(document).ready(function(){
    
// for all input elements of admin page
      var elm=document.getElementsByTagName('input');
        $('.btn1').click(function(){
          for(var i=0;i<elm.length;i++){
            elm[i].style.backgroundColor='';
          }
        });

// for change password
        $('.c_pword').click(function(){
          window.location.href="<?php echo base_url(); ?>./index.php/admin/change_admin_pword";
        });
// for logout
        $('.logout').click(function(){
            window.location.href='<?php echo base_url()."index.php/admin/logout"; ?>'
        });
// for settings
        $('.settings').click(function(){

            // window.location.href='<?php echo base_url()."index.php/admin/abc_get_pdf"; ?>'
          // $('.settings').css('background-color','#76CEBE');
        });
 // for create invoice
    $('.c_inv').click(function(){
          // $('.c_inv').css('background-color','#76CEBE');
          window.location.href="<?php echo base_url(); ?>./index.php/admin/create_invoice";
        });
//  for customer details

      $('.c_details').click(function(){
          // $('.c_details').css('background-color','#76CEBE');
          window.location.href="<?php echo base_url(); ?>./index.php/admin/customer_details";

        });
// add vendor 
        
         $('.c_vendor').click(function(){
          // $('.v_inv').css('background-color','#76CEBE');
          window.location.href="<?php echo base_url(); ?>./index.php/admin/create_vendor";

        });
//  view invoice
      $('.c_customer').click(function(){
          // $('.v_inv').css('background-color','#76CEBE');
          window.location.href="<?php echo base_url(); ?>./index.php/admin/create_category";

        });

//  For product Entries++++++++++++
      $('.c_product').click(function(){
          
          window.location.href="<?php echo base_url(); ?>./index.php/admin/create_product";

        });
//  For parches product ++++++++++++
      $('.c_parches').click(function(){
          
          window.location.href="<?php echo base_url(); ?>./index.php/admin/parches_product";

        });
 // For payment  product p_product
         $('.p_product').click(function(){
          window.location.href="<?php echo base_url(); ?>./index.php/admin/payment_product";
        });
        
//  For Showing Present stock products++++++++++++
      $('.p_stock').click(function(){
          
          window.location.href="<?php echo base_url(); ?>./index.php/admin/present_stock_product";

        });
//Modify invoice +++++++++++++++++++++++++++
          $('.m_invoice').click(function(){
          
          window.location.href="<?php echo base_url(); ?>./index.php/admin/modify_invoice_call";
        });
        
// report 
        
         $('.s_report').click(function(){
          
          window.location.href="<?php echo base_url(); ?>./index.php/admin/tax_report";
        });
        
        // report 
        
         $('.v_report').click(function(){
          
          window.location.href="<?php echo base_url(); ?>./index.php/admin/vendor_report";
        });
        
        // report 
        
         $('.d_employy').click(function(){
          
          window.location.href="<?php echo base_url(); ?>./index.php/admin/employee_add_view";
        });
        
        // salery 
          $('.s_employy').click(function(){
          window.location.href="<?php echo base_url(); ?>./index.php/admin/employee_salery";
        });
        
        // profit and loss report 
        
        $('.prf_loss_report').click(function(){
          window.location.href="<?php echo base_url(); ?>./index.php/admin/report_profit_loss";
        });

// Create Categories++++++++++++++++++++

      // // Raw Gold Supply
      // $('.g_buy').click(function(){
      //     // $('.v_inv').css('background-color','#76CEBE');
      //     // window.location.href="<?php echo base_url(); ?>./index.php/admin/gold_buy";

      //   });
    });

  </script>
</head>
<body>
<div class="bill_header">
  <h4>Dey Hardware</h4>
</div>
<div class="bill_category ">
  <ul>
      
    <?php if($this->session->userdata('role_id')==1){ ?>
    <li><?php echo form_input(['type'=>'button','value'=>'Customer','class'=>'btn1 c_details']); ?></li>
    <li><?php echo form_input(['type'=>'button','value'=>'Vendor','class'=>'btn1 c_vendor']); ?></li>
    <li><?php echo form_input(['type'=>'button','value'=>'Product','class'=>'btn1 c_product']); ?></li>
    <li><?php echo form_input(['type'=>'button','value'=>'Invoice Entry','class'=>'btn1 c_parches']); ?></li>
    <li><?php echo form_input(['type'=>'button','value'=>'Vendor Payment','class'=>'btn1 p_product']); ?></li>
    <li style="display: none;"><?php echo form_input(['type'=>'button','value'=>'Create Category','class'=>'btn1 c_customer']); ?></li>
    <li style="display: none;"><?php echo form_input(['type'=>'button','value'=>'Buying Details','class'=>'btn1 g_buy']); ?></li>
    <li><?php echo form_input(['type'=>'button','value'=>'Create Invoice','class'=>'btn1 c_inv']); ?></li>
    <li><?php echo form_input(['type'=>'button','value'=>'Present Stocks','class'=>'btn1 p_stock']); ?></li>
    <li style="display: none;"><?php echo form_input(['type'=>'button','value'=>'Change Password','class'=>'btn1 c_pword']); ?></li>
    <li><?php echo form_input(['type'=>'button','value'=>'Edit Invoice','class'=>'btn1 m_invoice']); ?></li>
    <li><?php echo form_input(['type'=>'button','value'=>'Tax','class'=>'btn1 s_report']); ?></li>
    <li><?php echo form_input(['type'=>'button','value'=>'Report','class'=>'btn1 v_report']); ?></li>
    <li><?php echo form_input(['type'=>'button','value'=>'Profit','class'=>'btn1 prf_loss_report']); ?></li>
    <li><?php echo form_input(['type'=>'button','value'=>'Employee','class'=>'btn1 d_employy']); ?></li>
    <li><?php echo form_input(['type'=>'button','value'=>'Salery','class'=>'btn1 s_employy']); ?></li>
    <li style="display: none;"><?php echo form_input(['type'=>'button','value'=>'Settings','class'=>'btn1 settings']); ?></li>
    <li><?php echo form_input(['type'=>'button','value'=>'Logout','class'=>'btn1 logout']); ?></li>
    <?php } if($this->session->userdata('role_id')==2) { ?>
    <li><?php echo form_input(['type'=>'button','value'=>'Create Invoice','class'=>'btn1 c_inv']); ?></li>
    <li><?php echo form_input(['type'=>'button','value'=>'Modify Invoice','class'=>'btn1 m_invoice']); ?></li>
    <li><?php echo form_input(['type'=>'button','value'=>'Present Stocks','class'=>'btn1 p_stock']); ?></li>
    <li><?php echo form_input(['type'=>'button','value'=>'Logout','class'=>'btn1 logout']); ?></li>
    <?php } ?>
      
  </ul>
</div>
<div style="clear: left;"></div>