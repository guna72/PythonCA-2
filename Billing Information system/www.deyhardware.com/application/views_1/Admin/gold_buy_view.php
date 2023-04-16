 
<?php include_once('admin_header.php') ?>
<script type="text/javascript">
  $('.g_buy').css('background-color','#76CEBE');
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
      echo form_open('admin/store_buy_deatils',['class'=>'form-horizontal']);?>
  <fieldset>
    <legend>Buy Raw Gold</legend>
    <div class="form-group"><?php echo form_label('Mobile No','ph_no',['class'=>'col-lg-2 col-md-2 control-label']);?><div class="col-lg-6 col-md-6">
         <?php echo form_input(['class'=>'form-control','name'=>'ph_no','placeholder'=>'Phone No']);?>
      </div>
      <div class="col-lg-4 col-md-4"><?php echo  form_error('ph_no',"<p class='text-danger'>","</p>");?>
      </div>
    </div>

    <div class="form-group"><?php echo form_label('Given Gold in kg','raw_gold',['class'=>'col-lg-2 col-md-2 control-label']);?><div class="col-lg-6 col-md-6">
         <?php echo form_input(['class'=>'form-control','name'=>'raw_gold','placeholder'=>'Gold Given in kg']);?>
      </div>
      <div class="col-lg-4 col-md-4"><?php echo  form_error('raw_gold',"<p class='text-danger'>","</p>");?>
      </div>
    </div>

    <div class="form-group"><?php echo form_label('Amount ','raw_gold_total_cost',['class'=>'col-lg-2 col-md-2 control-label']);?><div class="col-lg-6 col-md-6">
         <?php echo form_input(['class'=>'form-control','name'=>'raw_gold_total_cost','placeholder'=>'Total amount for raw gold']);?>
      </div>
      <div class="col-lg-4 col-md-4"><?php echo  form_error('raw_gold_total_cost',"<p class='text-danger'>","</p>");?>
      </div>
    </div>

    <div class="form-group"><?php echo form_label('Tax Rate','tax_rate',['class'=>'col-lg-2 col-md-2 control-label']);?><div class="col-lg-6 col-md-6">
         <?php echo form_input(['class'=>'form-control','name'=>'tax_rate','placeholder'=>'Tax Rate']);?>
      </div>
      <div class="col-lg-4 col-md-4"><?php echo  form_error('tax_rate',"<p class='text-danger'>","</p>");?>
      </div>
    </div>
    <div class="form-group"><?php echo form_label('Given Cost','raw_gold_cost_given',['class'=>'col-lg-2 col-md-2 control-label']);?><div class="col-lg-6 col-md-6">
         <?php echo form_input(['class'=>'form-control','name'=>'raw_gold_cost_given','placeholder'=>'Cost Given']);?>
      </div>
      <div class="col-lg-4 col-md-4"><?php echo  form_error('raw_gold_cost_given',"<p class='text-danger'>","</p>");?>
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