<!DOCTYPE html>
<html>
<head>
	<title></title>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.min.css'; ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo  base_url().'assets/css/login_style.css';?>">
  <style type="text/css">
    body{
      overflow-x: hidden;
    }
    *{
      padding: 0px;
    }
  </style>
</head>
<body>
  <?php if( $this->session->flashdata('feedback')){
            ?>
  <div class="alert alert-dismissible alert-danger text-center">
   <button type="button" class="close" data-dismiss="alert">&times;</button>
  <p><?php echo $this->session->flashdata('feedback'); ?></p>
  </div>
  <?php } echo form_open('login/user_login',['class'=>'form-horizontal user_login']); ?>
  <fieldset>
    <legend>Billing System</legend>
    <div class="form-group">
       <?php echo form_label('User Name','username',['class'=>'col-lg-2 col-md-2 control-label']) ?>
      <div class="col-lg-6 col-md-6">
        <?php echo form_input(['class'=>'form-control','name'=>'username','placeholder'=>'User Name','value'=>set_value('username')]); ?>
      </div>
      <div class="col-lg-4 col-md-4">
        <?php echo form_error('username',"<p class='text-danger'>","</p>"); ?>
      </div>
    </div>
    <div class="form-group">
       <?php echo form_label('Password','password',['class'=>'col-lg-2 col-md-2 control-label']) ?>
      <div class="col-lg-6 col-md-6">
        <?php echo form_password(['class'=>'form-control','name'=>'password','placeholder'=>'Password']); ?>
      </div>
      <div class="col-lg-4 col-md-4">
        <?php echo form_error('password',"<p class='text-danger'>","</p>"); ?>
      </div>
    </div>
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <?php echo form_button(['class'=>'btn btn-default','type'=>'reset','content'=>'Reset','name'=>'reset']); ?> 
        <span style="padding-right: 3px"> </span>
        <?php echo form_button(['class'=>'btn btn-primary','type'=>'submit','name'=>'submit','content'=>'Login']); ?>
      </div>
    </div>
  </fieldset>
</form>
<!-- For Bootstrap CDN for JQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- For Bootstrap CDN Javascript -->
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>
</html>