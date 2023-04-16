<?php include_once('admin_header.php'); ?>
<script type="text/javascript">
  $('.p_product').css('background-color','#76CEBE');
    
    var hints_id;
function showHints()
{
  var path ='getInviceDetails';
  var str=$('.invoice_name').val();
  var vendor_id=document.getElementById('vender_id').value;
    var data_json={ val: str,vendor_id: vendor_id};
	//alert(JSON.stringify(data_json));
    $.ajax({
    method: 'POST',
    url: path,
    data:data_json,
    success: function(data_val){
       $('#show').html(data_val);
    }

  });
   
}
     function getProductDetails()
    {
      //  alert("here"+a);
    var path ='getInvoiceAmount';
    var id='product_amount';
    var ss =$('.invoice_name').val();
    var data_json={ invoice_no:ss};
    $.ajax({
    method: 'POST',
    url: path,
    data:data_json,
    success: function(data_val){
        //alert("loop"+id);
        document.getElementById(id).value=data_val;
        // alert(data_val);
        //$('#show'+id).html(data_val);
       // alert(data_val);
    }

  });
    }
function fun_need(value)
{
  $('.invoice_name').val(value);
  $('#show').html(" ");
}
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
     <?php echo form_open('admin/PaymentProduct',['class'=>'form-horizontal']); ?>
      <fieldset>
    <legend>Payment </legend>

     <div class="text-center ">  
        <h6>* Fields Must Be Required.</h6>
     </div>
         
    <div class="form-group"><?php echo form_label('<span>* </span>Select Vendor','vendor',['class'=>'col-lg-2 col-md-2 control-label']);?>
        <div class="col-lg-4 col-md-3">
        <select class="form-control" name="vender_name" id="vender_id" required>
            <!--<option>Select Vendor</option>-->
          <?php foreach($VendorDetails as $prd){?>
            <option value="<?php echo $prd->vendor_id;?>"><?php echo $prd->vendor_name;?></option>
          <?php } ?>
        </select>
     </div>
    </div>

<div class="form-group">
  <?php echo form_label('<span>* </span> Invoice No','invoice_name',['class'=>'col-lg-2 col-md-2 control-label ']);?>
  <div class="col-lg-4 col-md-3">
   <?php echo form_input(['class'=>'form-control invoice_name','name'=>'invoice_name','placeholder'=>'Invoice No','onkeyup'=>'showHints();','autocomplete'=>'off']);?>

   <div id="show" onclick="getProductDetails()"></div>
 </div>
 <div class="col-lg-4 col-md-4"><?php echo  form_error('invoice_name',"<p class='text-danger'>","</p>");?>
 </div>
</div>
          
          
          
    <div class="form-group">
        <?php echo form_label('<span>* </span>Total Amount','amount',['class'=>'col-lg-2 col-md-2 control-label']);?>
        <div class="col-lg-4 col-md-4">
            <input type="text" name="product_amounts" readonly id="product_amount" class="form-control product_price0">
      </div>
      <div class="col-lg-4 col-md-4"><?php echo  form_error('amount',"<p class='text-danger'>","</p>");?>
      </div>
    </div>

          
      <div class="form-group">
        <?php echo form_label('<span>* </span>Amount Pay','amount_pay',['class'=>'col-lg-2 col-md-2 control-label']);?>
        <div class="col-lg-4 col-md-4">
         <?php echo form_input(['class'=>'form-control amount_pay','name'=>'amount_pay','placeholder'=>'Amount Pay']);?>
      </div>
      <div class="col-lg-4 col-md-4"><?php echo  form_error('amount_pay',"<p class='text-danger'>","</p>");?>
      </div>
    </div>  
          
          <div class="form-group">
        <?php echo form_label('<span>* </span>Cheque No','cheque_no',['class'=>'col-lg-2 col-md-2 control-label']);?>
        <div class="col-lg-4 col-md-4">
         <?php echo form_input(['class'=>'form-control cheque_no','name'=>'cheque_no','placeholder'=>'Cheque No']);?>
      </div>
      <div class="col-lg-4 col-md-4"><?php echo  form_error('cheque_no',"<p class='text-danger'>","</p>");?>
      </div>
    </div>   
          
           <div class="form-group">
        <?php echo form_label('<span>* </span>Payment Date','payment_date',['class'=>'col-lg-2 col-md-2 control-label']);?>
        <div class="col-lg-4 col-md-4">
         <?php echo form_input(['class'=>'form-control','type'=>'date','name'=>'payment_date']);?>
      </div>
      <div class="col-lg-4 col-md-4"><?php echo  form_error('payment_date',"<p class='text-danger'>","</p>");?>
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