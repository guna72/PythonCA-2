<!-- Header part -->
<?php include_once('admin_header.php') ?>

<!-- color change of create invoice button -->
<script type="text/javascript">
  $('.v_report').css('background-color','#76CEBE');

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

<?php echo form_open('admin/vendor_report',['class'=>'form-horizontal']) ?>
  
 <?php echo form_label('<span>* </span>Select Vendor','vender',['class'=>'col-lg-2 col-md-2 control-label']);?>
 <div class="col-lg-4 col-md-3">
        <select class="form-control" name="vender">
            <option value="">Select Vendor</option>
          <?php foreach($VendorDetails as $prd){?>
            <option value="<?php echo $prd->vendor_id;?>" <?php echo $vendor_id == $prd->vendor_id ? 'selected' : '' ?>><?php echo $prd->vendor_name;?></option>
          <?php } ?>
        </select>
     </div>
 <div class="col-lg-2">
  <?php echo form_button(['class'=>'btn btn-primary add control-label','type'=>'submit','name'=>'search','content'=>'Search'])?>
</div>
</div>
</form>



<!-- Start of table of showing customer personel details -->
<div class="container partial_payment_table">
  <h4 class="text-center">Vendor Report</h4>
    <table class="table table-striped table-hover text-center" style="border: 1px solid #dff;box-shadow: 2px 2px 14px #888"  id="table">
      <thead>
        <tr >
          <th  class="text-center">SL No</th>
          <th colspan="2" class="text-center">Invoice No</th>
          <th colspan="2" class="text-center">Date</th>
          <th colspan="2" class="text-center">Payment Status</th>
          <th colspan="2" class="text-center">Payment Date</th>
          <th colspan="2" class="text-center">Cheque No</th>
          <th colspan="2" class="text-center">Balance</th>
        </tr>
      </thead>
      <tbody>

        <?php
        $p=1;
        $total=0;
        if(!empty($rpt_vendor)){
        foreach ($rpt_vendor as $row) {?>
          <tr>
          <td class='text-center'><?php echo $p; ?></td>
          <td colspan='2' class='text-center'><?php echo $row['invoice_no'];?></td>
          <td colspan='2' class='text-center'><?php echo date('d-m-Y', strtotime($row['invoice_date']));?></td>
          <td colspan='2' class='text-center'><?php echo $row['payment_status']=='1' ? 'Done' : 'Not Done' ;?></td>
          <td colspan='2' class='text-center'><?php echo $row['payment_date']!=0 ? date('d-m-Y', strtotime($row['payment_date'])) : 'Na';?></td>
          <td colspan='2' class='text-center'><?php echo $row['cheque_no'];?></td>
          <td colspan='2' class='text-center'><?php $total =($row['total_amount'] - $row['amount_pay']); echo number_format($total);?></td>
        </tr>
 <?php 
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