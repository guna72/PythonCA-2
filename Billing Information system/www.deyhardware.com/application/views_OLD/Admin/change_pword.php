 
<?php include_once('admin_header.php') ?>
<script type="text/javascript">
  $('.c_pword').css('background-color','#76CEBE');
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
      echo form_open('admin/set_password',['class'=>'form-horizontal']);?>
  <fieldset>
    <legend>Change Password</legend>

    <div class="text-center ">  
        <h6>* Fields Must Be Required.</h6>
     </div>

     
    <div class="form-group">
       <?php echo form_label('<span> *</span> Current Password','cpword',['class'=>'col-lg-2 col-md-2 control-label']);?>
      <div class="col-lg-6 col-md-6"><?php  echo form_password(['class'=>'form-control','name'=>'cpword','placeholder'=>'Current Password',]);?></div>
      <div class="col-lg-4 col-md-4"><?php echo form_error('cpword',"<p class='text-danger'>","</p>");?></div>
    </div>
    <div class="form-group"><?php echo form_label('<span> *</span> New Password','npword',['class'=>'col-lg-2 col-md-2 control-label']);?><div class="col-lg-6 col-md-6">
         <?php echo form_password(['class'=>'form-control','name'=>'npword','placeholder'=>'New Password'])?>
      </div>
      <div class="col-lg-4 col-md-4"><?php echo  form_error('npword',"<p class='text-danger'>","</p>");?>
      </div>
    </div>

    <div class="form-group"><?php echo form_label('<span> *</span> Retype New Password','rnpword',['class'=>'col-lg-2 col-md-2 control-label']);?><div class="col-lg-6 col-md-6">
         <?php echo form_password(['class'=>'form-control','name'=>'rnpword','placeholder'=>'Retype New Password']);?>
      </div>
      <div class="col-lg-4 col-md-4"><?php echo  form_error('rnpword',"<p class='text-danger'>","</p>");?>
      </div>
    </div>
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2"><?php echo
        form_button(['class'=>'btn btn-default','type'=>'reset','content'=>'Cancel','name'=>'cancel']);?>
        <span style="padding-right: 3px"> </span><?php echo 
        form_button(['class'=>'btn btn-primary','type'=>'submit','name'=>'save','content'=>'Save'])?>
      </div>
    </div>
  </fieldset>
</form>
</div>


<?php include_once('admin_footer.php') ?>