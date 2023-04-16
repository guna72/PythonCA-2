<!-- Header part -->
<?php include_once('admin_header.php') ?>

<!-- color change of create invoice button -->
<script type="text/javascript">
  $('.prf_loss_report').css('background-color','#76CEBE');

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

<?php echo form_open('admin/report_profit_loss',['class'=>'form-horizontal']) ?>
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
  <h4 class="text-center">Profit And Loss</h4>
    <h4 class="text-center"><?php if(!empty($frm_date)){ echo "From  ".$frm_date."   TO";}?> <?php if(!empty($to_date)){ echo $to_date;}?></h4>
    <div id="table_wrapper">
    <table class="table table-striped table-hover text-center" style="border: 1px solid #dff;box-shadow: 2px 2px 14px #888"  id="table">
      <thead>
        <tr >
          <th  class="text-center">SL No</th>
          <th colspan="2" class="text-center">Type</th>
          <th colspan="2" class="text-center">Amount(Paid)</th>
          <th colspan="2" class="text-center">Amount</th>
          <th colspan="2" class="text-center">Total Amount</th>
        </tr>
      </thead>
      <tbody>

        <?php
        $p=1;
        $total_pro_or_loss=0;
        if(!empty($GetProfitAndLoss)){
        foreach ($GetProfitAndLoss as $row) {?>
          <tr>
          <td class='text-center'><?php echo $p; ?></td>
          <td colspan='2' class='text-center'>
              <?php if($row->type=='P')
                        {   echo 'Purches';
                            $total_pro_or_loss =$total_pro_or_loss - $row->pay_amount;
                        }  
                    if($row->type=='S')
                    { echo 'Salse';
                    $total_pro_or_loss =$total_pro_or_loss + $row->pay_amount;
                    }
                    if($row->type=='E')
                    { echo 'Employee Salery';
                    $total_pro_or_loss =$total_pro_or_loss - $row->pay_amount;
                    }
                ?>
          </td>
          <td colspan='2' class='text-center'><?php echo $row->pay_amount;?></td>
          <td colspan='2' class='text-center'><?php echo $row->total_amount ;?></td>
          <td colspan='2' class='text-center'><?php echo $row->total_amount - $row->pay_amount;?><?php if($row->type=='P'){ echo ' /- ( Due )';}  
                    if($row->type=='S'){ echo '/- ( GST Paid)';}
                    if($row->type=='E'){ echo '/- ( Salery Paid)';}
                ?></td>
          </tr>
 <?php 
$p++;} }
?>
          <?php if($p>1){  ?>
 <tr <?php if($total_pro_or_loss>1)
                    {
                        echo 'class="success"';
                        $amnt=number_format($total_pro_or_loss)." /-(Profit)";
                    }
                    else
                    {
                         echo 'class="danger"';
                        $amnt=number_format(-1 * $total_pro_or_loss)." /-(Loss)";
                    }
              ?>>
          <td class='text-center'>Total</td>  
          <td colspan='2' class='text-center'></td> 
          <td colspan='2' class='text-center'>
              <?php echo $amnt;?>
          </td>
          <td colspan='2' class='text-center'></td>
          <td colspan='2' class='text-center'></td>
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