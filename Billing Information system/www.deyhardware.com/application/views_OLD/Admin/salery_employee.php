<!-- Header part -->
<?php include_once('admin_header.php') ?>

<!-- color change of create invoice button -->
<script type="text/javascript">
  $('.s_employy').css('background-color','#76CEBE');

  // For going to control to the link of print 
  $(function(){
    $('.print').click(function(){
      window.open(
        $('.print').attr('href'),
        '_blank'
        );
    });
  });
</script>



<div class="dashboard container">
	
  <?php 
  if($this->session->flashdata('feedback1'))
  {
    echo '<div class="alert alert-dismissible alert-danger text-center container">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <p style="color:#fff">'.$this->session->flashdata('feedback1').'</p>
  </div>';
}?>



<?php
if($this->session->flashdata('feedback2'))
{
 if($this->session->flashdata('ph_no')){  
   $ph_no=$this->session->flashdata('ph_no');
   $date=$this->session->flashdata('date');
   $no_invoice_day=$this->session->flashdata('no_invoice_day');
   ?>

   <div class="alert alert-dismissible alert-success text-center container">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <p style="color:#fff"><?php echo $this->session->flashdata('feedback2')?></p>
  </div>

  <?php  }

} ?>
          <div class="text-center ">  
             <h6> </h6>
         </div>

<?php echo form_open('index.php/admin/employee_salery',['class'=>'form-horizontal']) ?>
  
 <?php echo form_label('<span>* </span>Select Employee','employee_id',['class'=>'col-lg-2 col-md-2 control-label']);?>
 <div class="col-lg-4 col-md-3">
        <select class="form-control" name="employee_id">
            <option value="">Select Emp</option>
          <?php foreach($getEmployee as $prd){?>
            <option value="<?php echo $prd->employee_id;?>" <?php echo $prd->employee_id==$emp_id ? 'selected': '' ?>><?php echo $prd->name;?></option>
          <?php } ?>
        </select>
     </div>
 <div class="col-lg-2">
  <?php echo form_button(['class'=>'btn btn-primary add control-label','type'=>'submit','name'=>'search','content'=>'Search'])?>
</div>
    <div class="col-lg-2 col-md-2">
         <a class="btn btn-primary" href="<?php echo base_url(); ?>./index.php/admin/PaySalery">Pay</a>
      
      </div>
</div>
</form>



<!-- Start of table of showing customer personel details -->
<div class="container partial_payment_table">
  <h4 class="text-center">EMP Salery</h4>
    <table class="table table-striped table-hover text-center" style="border: 1px solid #dff;box-shadow: 2px 2px 14px #888"  id="table">
      <thead>
        <tr >
          <th  class="text-center">SL No</th>
          <th colspan="2" class="text-center">Employee Name</th>
          <th colspan="2" class="text-center">Date of Payment</th>
          <th colspan="2" class="text-center">Payment Amount</th>
          <th colspan="3" class="text-center">Edit</th>
        </tr>
      </thead>
      <tbody>

        <?php
        $p=1;
        if(!empty($getSaleryDetails)){
        foreach ($getSaleryDetails as $row) {?>
          <tr>
          <td class='text-center'><?php echo $p; ?></td>
          <td colspan='2' class='text-center'><?php echo $row->name;?></td>
          <td colspan='2' class='text-center'><?php echo date('d-m-Y', strtotime($row->date_of_payment));?></td>
          <td colspan='2' class='text-center'><?php echo $row->payment_amount;?></td>
          <td colspan='2' class='text-center'></td>
          <td class='text-center'><?php echo form_button(['type'=>'button','content'=>'Edit','class'=>'btn btn-primary','href'=>'#myModal'.$p,'data-toggle'=>"modal"])?></td>
        </tr>
     <?php
            echo '<div class="modal" id="myModal'.$p.'">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Edit Vendor Details</h4>

         <div class="text-center ">  
            <h6>* Fields Must Be Required.</h6>
        </div>

      </div>
      <div class="modal-body">
        
        '.form_open('index.php/admin/edit_salery_amount',['class'=>'form-horizontal']).'
       
       <div class="form-group"  style="display:none">
       '.form_label("<span>* </span>Name","Nmae",["class"=>' control-label']).'
      <div class="">'.form_input(['class'=>'form-control','name'=>'salery_id','readonly'=>'true','placeholder'=>'Product Code','value'=>$row->id]).'</div>
      <div class="">'.form_error('salery_id',"<p class='text-danger'>","</p>").'</div>
      </div>
      
      <div class="form-group">
       '.form_label("<span>* </span>Name","Nmae",["class"=>' control-label']).'
      <div class="">'.form_input(['class'=>'form-control','name'=>'emp_name','readonly'=>'true','placeholder'=>'Product Code','value'=>$row->name]).'</div>
      <div class="">'.form_error('emp_name',"<p class='text-danger'>","</p>").'</div>
      </div>
  
    <div class="form-group">'.form_label('<span>* </span>Payment Amount','payment_amount',['class'=>' control-label']).'<div class="">
         '.form_input(['class'=>'form-control','name'=>'payment_amount','required','type'=>'number','placeholder'=>'Enter Paymentg amount','value'=>$row->payment_amount]).'
      </div>
      <div class="">'.form_error('payment_amount',"<p class='text-danger'>","</p>").'
      </div>
    </div>

    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>';
  
$p++;} }
?>
          
</tbody>
</table>
</div>  
<!-- End Of table of showing customer personel details -->  





</div>
<!-- End of Dashboard -->

 </head>
<!-- Footer part -->
<?php include_once('admin_footer.php') ?>