 
<?php include_once('admin_header.php') ?>
<script type="text/javascript">
  $('.d_employy').css('background-color','#76CEBE');
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
      echo form_open('admin/add_employee',['class'=>'form-horizontal']);?>
  <fieldset>
    <legend>Create Employee</legend>

     <div class="text-center ">  
        <h6>* Fields Must Be Required.</h6>
     </div>

    <div class="form-group"><?php echo form_label('<span>* </span>Employee Name','employee_name',['class'=>'col-lg-2 col-md-2 control-label']);?><div class="col-lg-6 col-md-6">
         <?php echo form_input(['class'=>'form-control','name'=>'employee_name','required','placeholder'=>'Employee Name'])?>
      </div>
      <div class="col-lg-4 col-md-4"><?php echo  form_error('employee_name',"<p class='text-danger'>","</p>");?>
      </div>
    </div>

      <div class="form-group"><?php echo form_label('<span>* </span>Age','age',['class'=>'col-lg-2 col-md-2 control-label']);?><div class="col-lg-6 col-md-6">
         <?php echo form_input(['class'=>'form-control','name'=>'age','required','placeholder'=>'Age']);?>
      </div>
      <div class="col-lg-4 col-md-4"><?php echo  form_error('age',"<p class='text-danger'>","</p>");?>
      </div>
    </div>
      
    <div class="form-group"><?php echo form_label('<span>* </span> Select Gender','gender',['class'=>'col-lg-2 col-md-2 control-label']);?>
        <div class="col-lg-6 col-md-6">
    <?php 
            $data =['name'=>'gander','class'=>'form-control'];
            $option =['Male'=>'Male','Female'=>'Female' ];
            echo form_dropdown($data,$option)?>
        </div>
    </div>

    <div class="form-group"><?php echo form_label('<span>* </span> Mobile no','mobile_no',['class'=>'col-lg-2 col-md-2 control-label']);?>
    <div class="col-lg-6 col-md-6">
         <?php echo form_input(['class'=>'form-control','name'=>'mobile_no','required','placeholder'=>'Mobile no']);?>
    </div>
      <div class="col-lg-4 col-md-4"><?php echo form_error('mobile_no',"<p class='text-danger'>","</p>");?>
      </div>
    </div>
      <div class="form-group"><?php echo form_label('<span>* </span> Email Id','email_id',['class'=>'col-lg-2 col-md-2 control-label']);?><div class="col-lg-6 col-md-6">
         <?php echo form_input(['class'=>'form-control','name'=>'email_id','required','placeholder'=>'Email Id']);?>
      </div>
      <div class="col-lg-4 col-md-4"><?php echo  form_error('email_id',"<p class='text-danger'>","</p>");?>
      </div>
    </div>
      
       <div class="form-group"><?php echo form_label('<span>* </span> Select Role','role',['class'=>'col-lg-2 col-md-2 control-label']);?>
           <div class="col-lg-6 col-md-6">
               <?php 
            $data =['name'=>'role','class'=>'form-control'];
            $option =['emp'=>'Employee'];
            echo form_dropdown($data,$option)?>
     </div>
           </div>
 <div class="form-group"><?php echo form_label('<span>* </span> Reg Date','reg_date',['class'=>'col-lg-2 col-md-2 control-label']);?>
     <div class="col-lg-6 col-md-6">
         <?php echo form_input(['class'=>'form-control','name'=>'reg_date','type'=>'date','required','placeholder'=>'Reg date']);?>
      </div>
      <div class="col-lg-4 col-md-4"><?php echo  form_error('reg_date',"<p class='text-danger'>","</p>");?>
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