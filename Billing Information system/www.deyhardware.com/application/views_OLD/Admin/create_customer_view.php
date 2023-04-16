 
<?php include_once('admin_header.php') ?>
<script type="text/javascript">
  $('.c_customer').css('background-color','#76CEBE');
</script>


<div class="dashboard">
 <?php if( $this->session->flashdata('feedback1')){?>        
  <div class="alert alert-dismissible alert-danger text-center container">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <p><?php echo $this->session->flashdata('feedback1')?></p>
  </div>


 <?php } if( $this->session->flashdata('feedback2'))
   {?>
   <div class="alert alert-dismissible alert-success text-center container">
   <button type="button" class="close" data-dismiss="alert">&times;</button>
  <p><?php echo $this->session->flashdata('feedback2')?></p>
  </div>
  
  <?php }
      echo form_open('admin/add_customer',['class'=>'form-horizontal']);?>
  <fieldset>
    <legend>Create customer</legend>

     <div class="text-center ">  
        <h6>* Fields Must Be Required.</h6>
     </div>

    <div class="form-group"><?php echo form_label('<span>* </span> Customer Name','customer_name',['class'=>'col-lg-2 col-md-2 control-label']);?><div class="col-lg-6 col-md-6">
         <?php echo form_input(['class'=>'form-control','name'=>'customer_name','placeholder'=>'Customer Name'])?>
      </div>
      <div class="col-lg-4 col-md-4"><?php echo  form_error('customer_name',"<p class='text-danger'>","</p>");?>
      </div>
    </div>

    <div class="form-group"><?php echo form_label('Address','address',['class'=>'col-lg-2 col-md-2 control-label']);?><div class="col-lg-6 col-md-6">
         <?php echo form_textarea(['class'=>'form-control','name'=>'address','placeholder'=>'Address','rows'=>4]);?>
      </div>
      <div class="col-lg-4 col-md-4"><?php echo  form_error('address',"<p class='text-danger'>","</p>");?>
      </div>
    </div>

    <div class="form-group"><?php echo form_label('<span>* </span> Mobile No','ph_no',['class'=>'col-lg-2 col-md-2 control-label']);?><div class="col-lg-6 col-md-6">
         <?php echo form_input(['class'=>'form-control','name'=>'ph_no','placeholder'=>'Phone No']);?>
      </div>
      <div class="col-lg-4 col-md-4"><?php echo  form_error('ph_no',"<p class='text-danger'>","</p>");?>
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