 
<?php include_once('admin_header.php') ?>
<script type="text/javascript">
  $('.c_product').css('background-color','#76CEBE');
</script>


<div class="dashboard">
 <?php if( $this->session->flashdata('feedback1')){?>        
  <div class="alert alert-dismissible alert-danger text-center container">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <p style="color: #fff"><?php echo $this->session->flashdata('feedback1')?></p>
  </div>


 <?php } if( $this->session->flashdata('feedback2'))
   {?>
   <div class="alert alert-dismissible alert-success text-center container">
   <button type="button" class="close" data-dismiss="alert">&times;</button>
  <p style="color: #fff"><?php echo $this->session->flashdata('feedback2')?></p>
  </div>
  
  <?php }
      echo form_open('admin/add_product',['class'=>'form-horizontal']);?>
  <fieldset>
    <legend>Create Product</legend>

     <div class="text-center ">  
        <h6>* Fields Must Be Required.</h6>
     </div>

      <div class="form-group"><?php echo form_label('<span>* </span>Select Product Type','product_type',['class'=>'col-lg-2 col-md-2 control-label']);?>
        <div class="col-lg-4 col-md-4">
        <select class="form-control" id="select" name="product_type">
            <!--<option>Select Product</option>-->
          <?php foreach($ProductypeDetails as $prdD){?>
            <option value="<?php echo $prdD->product_cat_id;?>"><?php echo $prdD->product_cat_name;?></option>
          <?php } ?>
        </select>
     </div>
    </div>
      
      
    <div class="form-group"><?php echo form_label('<span>* </span> Product Code','sac',['class'=>'col-lg-2 col-md-2 control-label']);?><div class="col-lg-6 col-md-6">
         <?php echo form_input(['class'=>'form-control','name'=>'product_code','placeholder'=>'Product code'])?>
      </div>
      <div class="col-lg-4 col-md-4"><?php echo  form_error('product_code',"<p class='text-danger'>","</p>");?>
      </div>
    </div>

    <div class="form-group"><?php echo form_label('<span>* </span> Product Name','product_name',['class'=>'col-lg-2 col-md-2 control-label']);?><div class="col-lg-6 col-md-6">
         <?php echo form_textarea(['class'=>'form-control','name'=>'product_name','placeholder'=>'Product Name','rows'=>4]);?>
      </div>
      <div class="col-lg-4 col-md-4"><?php echo  form_error('product_name',"<p class='text-danger'>","</p>");?>
      </div>
    </div>

    <div class="form-group"><?php echo form_label('<span>* </span> NRP','mrp',['class'=>'col-lg-2 col-md-2 control-label']);?><div class="col-lg-6 col-md-6">
         <?php echo form_input(['class'=>'form-control','name'=>'mrp','placeholder'=>'NRP']);?>
      </div>
      <div class="col-lg-4 col-md-4"><?php echo  form_error('mrp',"<p class='text-danger'>","</p>");?>
      </div>
    </div>
<div class="form-group"><?php echo form_label('<span>* </span> Purches Amount','Purches Amount',['class'=>'col-lg-2 col-md-2 control-label']);?><div class="col-lg-6 col-md-6">
         <?php echo form_input(['class'=>'form-control','name'=>'purches_amount','placeholder'=>'Purches amount']);?>
      </div>
      <div class="col-lg-4 col-md-4"><?php echo  form_error('purches_amount',"<p class='text-danger'>","</p>");?>
      </div>
    </div>
    <!--div class="form-group"><?php echo form_label('<span>* </span> Discount','discount',['class'=>'col-lg-2 col-md-2 control-label']);?><div class="col-lg-6 col-md-6">
         <?php echo form_input(['class'=>'form-control','name'=>'discount','placeholder'=>'Discount only Number']);?>
      </div>
      <div class="col-lg-4 col-md-4"><?php echo  form_error('discount',"<p class='text-danger'>","</p>");?>
      </div>
    </div-->

    <div class="form-group"><?php echo form_label('Total Number','count',['class'=>'col-lg-2 col-md-2 control-label']);?><div class="col-lg-6 col-md-6">
         <?php echo form_input(['class'=>'form-control','type'=>'number','name'=>'count','placeholder'=>'Number Of Same Product']);?>
      </div>
      <div class="col-lg-4 col-md-4"><?php echo  form_error('count',"<p class='text-danger'>","</p>");?>
      </div>
    </div>
      
      
      
      
      
      <!--div class="form-group"><?php echo form_label('<span>* </span> Purches By','Purches by',['class'=>'col-lg-2 col-md-2 control-label']);?><div class="col-lg-6 col-md-6">
         <?php echo form_input(['class'=>'form-control','name'=>'purches_by','placeholder'=>'Purches By']);?>
      </div>
      <div class="col-lg-4 col-md-4"><?php echo  form_error('purches_by',"<p class='text-danger'>","</p>");?>
      </div>
    </div-->

    
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