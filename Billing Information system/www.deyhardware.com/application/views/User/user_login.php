<!DOCTYPE html>
<html>
<head>
	<title>Dey Hardware Billing System</title>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.min.css'; ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo  base_url().'assets/css/login_style.css';?>">
  <meta name="keywords" content="Jaquar, Essco, Kerovit, parryware, sintex, tata pipes, venus, Bajaj, showers, shower enclosures, sanitary ware, flushing systems, wellness products, concealed cisterns, water heaters, and lighting solutions"/>
<meta property="og:url" content="http://www.deyhardware.com" />
<meta name="description" content="Dey Hardware in Kalyani" />
<meta name="organization" content="Dey Hardware" />
<link rel="shortcut icon" href="images/logo.jpg?v=3" />
<meta property="og:description" content="Destination for Conclusive Bath Fittings and Plumbing. Please Come & Visit Our Executive Gallery or Call Us: 03325827126 / 9748824351 for Your Magical Bathing Solutions." />
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
    <legend>Welcome To <u>DEY HARDWARE</u> Billing System</legend>
    <div class="form-group text-center">
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
<br>
<br>
<br>
<footer class="ms-footer">
        <div class="text-center">
          <p><b>Copyright &copy; Dey Hardware, B-7/26(S), Central Park, Kalyani, West Bengal - 741235. Mobile - <b>97488 24351<b/> & PSTN - <b>(033) 2582 7126</b>.  | All rights reserved</b></p>
        </div>
        <br>
        <div class="text-center">
          <p><b>WWW.DEYHARDWARE.COM</b></p>
          <ul class="copy w3ls , agileinfo_social_icons w3l, text-center">
					<li><a href="http://www.facebook.com/deyhardware26/" class="w3_agileits_facebook" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
					<!--<li><a href="#" class="wthree_twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
					<li><a href="#" class="agileinfo_google"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
					<li><a href="#" class="agileits_pinterest"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
					<li><a href="#" class="w3ls_rss"><i class="fa fa-rss" aria-hidden="true"></i></a></li>-->
				</ul>
        </div>
      </footer>
<!-- For Bootstrap CDN for JQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- For Bootstrap CDN Javascript -->
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>
</html>