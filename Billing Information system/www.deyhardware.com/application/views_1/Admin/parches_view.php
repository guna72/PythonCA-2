<?php include_once('admin_header.php'); ?>
<script type="text/javascript">
  $('.c_parches').css('background-color','#76CEBE');
 </script>



<div class="dashboard">
	<?php 

	if($this->session->flashdata('feedback1'))
	{  
   echo '<div class="alert alert-dismissible alert-success text-center container">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <p style="color:#fff">'.$this->session->flashdata('feedback1').'</p>
  </div>';
	} 

	if($this->session->flashdata('feedback2'))
	{  
   echo '<div class="alert alert-dismissible alert-danger text-center container">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <p style="color:#fff">'.$this->session->flashdata('feedback2').'</p>
  </div>';
	} 
	?>
     <?php echo form_open('admin/ParchesProduct',['class'=>'form-horizontal']); ?>
      <fieldset>
    <legend>Product Purches</legend>

     <div class="text-center ">  
        <h6>* Fields Must Be Required.</h6>
     </div>
         
    <div class="form-group"><?php echo form_label('<span>* </span>Select Vendor','vendor',['class'=>'col-lg-2 col-md-2 control-label']);?>
        <div class="col-lg-4 col-md-3">
        <select class="form-control" id="select" name="vender_id" required>
            <!--<option>Select Vendor</option>-->
          <?php foreach($VendorDetails as $prd){?>
            <option value="<?php echo $prd->vendor_id;?>"><?php echo $prd->vendor_name;?></option>
          <?php } ?>
        </select>
     </div>
    </div>
          
           <!--<div class="form-group"><?php echo form_label('<span>* </span>Select Product','product_id',['class'=>'col-lg-2 col-md-2 control-label']);?>
        <div class="col-lg-4 col-md-4">
        <select class="form-control" id="select" name="product_id">
            <option>Select Product</option>
          <?php foreach($ProductDetails as $prdD){?>
            <option value="<?php echo $prdD->sac;?>"><?php echo $prdD->product_name ." (".$prdD->mrp.")";?></option>
          <?php } ?>
        </select>
     </div>
    </div>-->
          
   
    <!--<div class="form-group"><?php echo form_label('<span>* </span> Quantity','quentity',['class'=>'col-lg-2 col-md-2 control-label']);?>
        <div class="col-lg-4 col-md-4">
         <?php echo form_input(['class'=>'form-control','type'=>'number','name'=>'quentity','placeholder'=>'Quantity']);?>
      </div>
      <div class="col-lg-4 col-md-4"><?php echo  form_error('quentity',"<p class='text-danger'>","</p>");?>
      </div>
    </div>-->

    <div class="form-group">
        <?php echo form_label('<span>* </span>Total Amount','amount',['class'=>'col-lg-2 col-md-2 control-label']);?>
        <div class="col-lg-4 col-md-4">
         <?php echo form_input(['class'=>'form-control','type'=>'number','name'=>'amount','placeholder'=>'Total Amount(Number)']);?>
      </div>
      <div class="col-lg-4 col-md-4"><?php echo  form_error('amount',"<p class='text-danger'>","</p>");?>
      </div>
    </div>

     <!--<div class="form-group">
        <?php echo form_label('<span>* </span>Amount To be Pay','pay_amount',['class'=>'col-lg-2 col-md-2 control-label']);?>
        <div class="col-lg-4 col-md-4">
         <?php echo form_input(['class'=>'form-control','type'=>'number','name'=>'pay_amount','placeholder'=>'Payable amount(Number)']);?>
      </div>
      <div class="col-lg-4 col-md-4"><?php echo  form_error('pay_amount',"<p class='text-danger'>","</p>");?>
      </div>
    </div>-->     
          
           <div class="form-group">
        <?php echo form_label('<span>* </span>Invoice No','invoice_no',['class'=>'col-lg-2 col-md-2 control-label']);?>
        <div class="col-lg-4 col-md-4">
         <?php echo form_input(['class'=>'form-control','name'=>'invoice_no','placeholder'=>'Invoice No']);?>
      </div>
      <div class="col-lg-4 col-md-4"><?php echo  form_error('invoice_no',"<p class='text-danger'>","</p>");?>
      </div>
    </div>     
          
           <div class="form-group">
        <?php echo form_label('<span>* </span>Invoice Date','invoice_dt',['class'=>'col-lg-2 col-md-2 control-label']);?>
        <div class="col-lg-4 col-md-4">
         <?php echo form_input(['class'=>'form-control','type'=>'date','name'=>'invoice_dt','placeholder'=>'Invoice No']);?>
      </div>
      <div class="col-lg-4 col-md-4"><?php echo  form_error('invoice_dt',"<p class='text-danger'>","</p>");?>
      </div>
    </div>     
          
          
    
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
      <?php echo
        form_button(['class'=>'btn btn-default','type'=>'reset','content'=>'Cancel','name'=>'cancel']);?>
        <span style="padding-right: 3px"> </span>
        <?php echo 
        form_button(['class'=>'btn btn-primary','type'=>'submit','name'=>'submit','content'=>'Submit'])?>
      </div>
    </div>

  </fieldset>
</form>
</div>
<?php include_once('admin_footer.php') ?>