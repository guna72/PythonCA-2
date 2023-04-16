<!-- Header part -->
<?php include_once('admin_header.php') ?>

<!-- color change of create invoice button -->
<script type="text/javascript">
  $('.s_report').css('background-color','#76CEBE');

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

<?php echo form_open('admin/tax_report',['class'=>'form-horizontal']) ?>
<div class="form-group">
  <?php echo form_label('From Date','from_date',['class'=>'col-lg-2 col-md-2 control-label']);?>
  <div class="col-lg-2 col-md-2">
   <?php echo form_input(['class'=>'form-control','name'=>'from_date','type'=>'date','placeholder'=>'Mobile No']);?>
 </div>
  
 <?php echo form_label('To Date','date',['class'=>'col-lg-2 col-md-2 control-label']);?>
 <div class="col-lg-2 col-md-2">
   <?php echo form_input(['class'=>'form-control date','type'=>'date','name'=>'to_date','placeholder'=>'Date']);?>
 </div>
 <div class="col-lg-2">
  <?php echo form_button(['class'=>'btn btn-primary add control-label','type'=>'submit','name'=>'search','content'=>'Search'])?>
</div>
</div>
</form>



<!-- Start of table of showing customer personel details -->
<div class="container partial_payment_table">
    <div id="table_wrapper">
  <h4 class="text-center">TAX Details</h4>
    <h4 class="text-center"><?php if(!empty($frm_date)){ echo "From  ".$frm_date."   TO";}?> <?php if(!empty($to_date)){ echo $to_date;}?></h4>
    <div id="table_wrapper">
    <table class="table table-striped table-hover text-center" style="border: 1px solid #dff;box-shadow: 2px 2px 14px #888"  id="table">
      <thead>
        <tr >
          <th  class="text-center">SL No</th>
          <th colspan="2" class="text-center">Invoice No</th>
          <th colspan="2" class="text-center">Date</th>
          <th colspan="2" class="text-center">CGST</th>
          <th colspan="2" class="text-center">AMT</th>
          <th colspan="2" class="text-center">SGST</th>
          <th colspan="2" class="text-center">AMT</th>
          <th colspan="2" class="text-center">Total GST Amount</th>
        </tr>
      </thead>
      <tbody>

        <?php
        $p=1;
        $total=0;
        if(!empty($InvoiceDetails)){
        foreach ($InvoiceDetails as $row) {?>
          <tr>
          <td class='text-center'><?php echo $p; ?></td>
          <td colspan='2' class='text-center'><?php echo $row->invoice_no;?></td>
          <td colspan='2' class='text-center'><?php echo $row->date;?></td>
          <td colspan='2' class='text-center'><?php echo $row->cgst;?>%</td>
          <td colspan='2' class='text-center'><?php echo ($row->grand_total_not_gst * $row->cgst )/100;?></td>
          <td colspan='2' class='text-center'><?php echo $row->sgst;?>%</td>
          <td colspan='2' class='text-center'><?php echo ($row->grand_total_not_gst * $row->sgst )/100;?></td>
		  <td colspan='2' class='text-center'><?php $total = $total + (($row->grand_total_not_gst * $row->cgst )/100 + ($row->grand_total_not_gst * $row->sgst )/100); 
		  echo (($row->grand_total_not_gst * $row->cgst )/100 + ($row->grand_total_not_gst * $row->sgst )/100); ?></td>
          
        </tr>
 <?php 
$p++;} }
?>
          <?php if($total!=0){  ?>
 <tr>
          <td class='text-center'>Total</td>  
          <td colspan='2' class='text-center'></td>
          <td colspan='2' class='text-center'></td> 
          <td colspan='2' class='text-center'></td>
          <td colspan='2' class='text-center'></td>
          <td colspan='2' class='text-center'></td>
          <td colspan='2' class='text-center'></td>
          <td colspan='2' class='text-center'><?php echo $total;" /-"?></td>
        </tr>
          <?php } ?>
</tbody>
</table>
</div>
        </div> 
 <button id="btnExport" class="btn btn-success">Export to xls</button>
 
<!-- End Of table of showing customer personel details -->  





</div>
<!-- End of Dashboard -->
 <script language="javascript">
     $(document).ready(function() {
  $("#btnExport").click(function(e) {
    e.preventDefault();

    //getting data from our table
    var data_type = 'data:application/vnd.ms-excel';
    var table_div = document.getElementById('table_wrapper');
    var table_html = table_div.outerHTML.replace(/ /g, '%20');

    var a = document.createElement('a');
    a.href = data_type + ', ' + table_html;
    a.download = 'exported_table_' + Math.floor((Math.random() * 9999999) + 1000000) + '.xls';
    a.click();
  });
});
    </script>
 </head>
<!-- Footer part -->
<?php include_once('admin_footer.php') ?>