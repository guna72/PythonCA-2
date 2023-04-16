 
<?php include_once('admin_header.php') ?>
<script type="text/javascript">
  $('.c_vendor').css('background-color','#76CEBE');
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
      echo form_open('admin/AddVendor',['class'=>'form-horizontal']);?>
  <fieldset>
    <legend>Create Vendor</legend>

     <div class="text-center ">  
        <h6>* Fields Must Be Required.</h6>
     </div>

    <div class="form-group"><?php echo form_label('<span>* </span> Vendor Name','vendor_name',['class'=>'col-lg-2 col-md-2 control-label']);?><div class="col-lg-6 col-md-6">
         <?php echo form_input(['class'=>'form-control','name'=>'vendor_name','required','placeholder'=>'Vendor Name'])?>
      </div>
      <div class="col-lg-4 col-md-4"><?php echo  form_error('vendor_name',"<p class='text-danger'>","</p>");?>
      </div>
    </div>

      <div class="form-group"><?php echo form_label('<span>* </span> Bank Name','bank_name',['class'=>'col-lg-2 col-md-2 control-label']);?><div class="col-lg-6 col-md-6">
         <?php echo form_input(['class'=>'form-control','name'=>'bank_name','required','placeholder'=>'Bank Name']);?>
      </div>
      <div class="col-lg-4 col-md-4"><?php echo  form_error('bank_name',"<p class='text-danger'>","</p>");?>
      </div>
    </div>
      
    <div class="form-group">
        <?php echo form_label('<span>* </span> Account No','account_no',['class'=>'col-lg-2 col-md-2 control-label']);?>
        <div class="col-lg-6 col-md-6">
         <?php echo form_input(['class'=>'form-control','name'=>'account_no','required','placeholder'=>'Account No','rows'=>4]);?>
        </div>
      <div class="col-lg-4 col-md-4"><?php echo  form_error('account_no',"<p class='text-danger'>","</p>");?>
      </div>
    </div>

    <div class="form-group"><?php echo form_label('IFSC Code','ifsc_code',['class'=>'col-lg-2 col-md-2 control-label']);?><div class="col-lg-6 col-md-6">
         <?php echo form_input(['class'=>'form-control','name'=>'ifsc_code','required','placeholder'=>'Enter IFSC Code']);?>
      </div>
      <div class="col-lg-4 col-md-4"><?php echo  form_error('ifsc_code',"<p class='text-danger'>","</p>");?>
      </div>
    </div>
    
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
      <span style="padding-right: 3px"> </span>
        <?php echo 
        form_button(['class'=>'btn btn-primary','type'=>'submit','name'=>'submit','content'=>'Submit'])?>
      </div>
    </div>

  </fieldset>
</form>
</div>

<?php include_once('admin_footer.php') ?>