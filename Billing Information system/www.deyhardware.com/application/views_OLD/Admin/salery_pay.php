<?php include_once('admin_header.php'); ?>
<script type="text/javascript">
  $('.s_employy').css('background-color','#76CEBE');
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
     <?php echo form_open('/index.php/admin/PaySalery',['class'=>'form-horizontal']); ?>
      <fieldset>
    <legend>Product Parches</legend>

     <div class="text-center ">  
        <h6>* Fields Must Be Required.</h6>
     </div>
         
    <div class="form-group"><?php echo form_label('<span>* </span>Select Employee','employee',['class'=>'col-lg-2 col-md-2 control-label']);?>
        <div class="col-lg-4 col-md-3">
        <select class="form-control" name="employee_id" required>
            <option value=""><?php echo '--Select--';?></option>
          <?php foreach($getEmployee as $prd){?>
            <option value="<?php echo $prd->employee_id;?>"><?php echo $prd->name;?></option>
          <?php } ?>
        </select>
     </div>
    </div>
          
      
    <div class="form-group"><?php echo form_label('<span>* </span> Pay Date:','date',['class'=>'col-lg-2 col-md-2 control-label']);?>
        <div class="col-lg-4 col-md-4">
         <?php echo form_input(['class'=>'form-control','type'=>'date','name'=>'pay_date','placeholder'=>'dt']);?>
      </div>
      <div class="col-lg-4 col-md-4"><?php echo  form_error('pay_date',"<p class='text-danger'>","</p>");?>
      </div>
    </div>
<div class="form-group"><?php echo form_label('<span>* </span>Pay Amount:','date',['class'=>'col-lg-2 col-md-2 control-label']);?>
        <div class="col-lg-4 col-md-4">
         <?php echo form_input(['class'=>'form-control','type'=>'number','name'=>'pay_amount','placeholder'=>'pay amount']);?>
      </div>
      <div class="col-lg-4 col-md-4"><?php echo  form_error('pay_amount',"<p class='text-danger'>","</p>");?>
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