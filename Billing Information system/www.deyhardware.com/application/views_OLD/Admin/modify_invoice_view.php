<!-- Header part -->
<?php include_once('admin_header.php') ?>

<!-- color change of create invoice button -->
<script type="text/javascript">
  $('.m_invoice').css('background-color','#76CEBE');

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


  <div class="form-group text-right container">
    <span style="padding-right: 3px"> </span>
    <?php echo 
    form_button(['class'=>'btn btn-primary print','type'=>'anchor','name'=>'print','content'=>'Print','href'=>'print_invoice/'.$ph_no.'/'.$date.'/'.$no_invoice_day])?>
  </div>


  <?php  }

} ?>
          <div class="text-center ">  
             <h6> </h6>
         </div>

<?php echo form_open('admin/search_partial_payment_by_ph_no',['class'=>'form-horizontal']) ?>
<div class="form-group">
  <?php echo form_label('Mobile No','ph_no',['class'=>'col-lg-2 col-md-2 control-label']);?>
  <div class="col-lg-2 col-md-2">
   <?php echo form_input(['class'=>'form-control','name'=>'ph_no','placeholder'=>'Mobile No']);?>
 </div>
  <!--  <?php echo form_label('Name','customer_name',['class'=>'col-lg-2 col-md-2 control-label']);?>
  <div class="col-lg-1 col-md-1">
   <?php echo form_input(['class'=>'form-control','name'=>'customer_name','placeholder'=>'Customer Name']);?>
 </div>-->
    
 <?php echo form_label('Date','date',['class'=>'col-lg-2 col-md-2 control-label']);?>
 <div class="col-lg-2 col-md-2">
   <?php echo form_input(['class'=>'form-control date','name'=>'date','placeholder'=>'DD-MM-YYYY']);?>
 </div>
 <div class="col-lg-2">
  <?php echo form_button(['class'=>'btn btn-primary add control-label','type'=>'submit','name'=>'search','content'=>'Search'])?>
</div>
</div>
</form>



<!-- Start of table of showing customer personel details -->
<div class="container partial_payment_table">
  <?php
  if($this->session->flashdata('result')) 
  {
    $result=$this->session->flashdata('result');
    $result1=$this->session->flashdata('result1');
    ?>
    <h4 class="text-center">Customer Partial payment</h4>
    <table class="table table-striped table-hover text-center" style="border: 1px solid #dff;box-shadow: 2px 2px 14px #888">
      <thead>
        <tr >
          <th  class="text-center">SL No</th>
          <th colspan="2" class="text-center">Ph No</th>
          <th colspan="2" class="text-center">Date</th>
          <th colspan="2" class="text-center">Payment Given</th>
          <th colspan="2" class="text-center">Total</th>
          <th colspan="2" class="text-center">Remaining</th>
          <th class="text-center">Action</th>
        </tr>
      </thead>
      <tbody>

        <?php
        $p=0;
        foreach ($result as $row) {
          echo "<tr>
          <td class='text-center'>".($p+1)."</td>
          <td colspan='2' class='text-center'>".$row->ph_no."</td>
          <td colspan='2' class='text-center'>".$row->date."</td>
          <td colspan='2' class='text-center'>".$row->payment."/-</td>
          <td colspan='2' class='text-center'>".$row->total."/-</td>
          <td colspan='2' class='text-center'>".($row->total-$row->payment)."/-</td>
          <td >".form_button(['type'=>'button','content'=>'Payment','class'=>'btn btn-primary','href'=>'#myModal'.$p,'data-toggle'=>"modal"])."</td>
        </tr>";


        echo '<div class="modal" id="myModal'.$p.'">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title">Add Payment</h4>
            </div>
            <div class="modal-body">

              '.form_open('admin/set_edit_remained_blance',['class'=>'form-horizontal']).'
              <div class="form-group">
               '.form_label("<span>* </span> Remaining Payment","rem_payment",["class"=>' control-label']).'
               <div class="">'.form_input(['class'=>'form-control','name'=>'rem_payment','placeholder'=>'Remaining','value'=>($row->total-$row->payment)]).'</div>
             </div>  

             <div class="form-group" style="display:none">
               '.form_label("<span>* </span> Ph No","ph_no",["class"=>' control-label']).'
               <div class="">'.form_input(['class'=>'form-control','name'=>'ph_no','placeholder'=>'Ph_no','value'=>$row->ph_no]).'</div>
             </div> 

             <div class="form-group" style="display:none">
               '.form_label("<span>* </span> Total","total",["class"=>' control-label']).'
               <div class="">'.form_input(['class'=>'form-control','name'=>'total','placeholder'=>'total','value'=>$row->total]).'</div>
             </div> 

             <div class="form-group" style="display:none">
               '.form_label("<span>* </span> Date","date",["class"=>' control-label']).'
               <div class="">'.form_input(['class'=>'form-control','name'=>'date','placeholder'=>'date','value'=>$row->date]).'</div>
             </div> 

             <div class="form-group" style="display:none">
               '.form_label("<span>* </span> Payment","payment",["class"=>' control-label']).'
               <div class="">'.form_input(['class'=>'form-control','name'=>'payment','placeholder'=>'Payment','value'=>$row->payment]).'</div>
             </div>    

             <div class="form-group" style="display:none">
               '.form_label("<span>* </span> No invoice Day","no_invoice_day",["class"=>' control-label']).'
               <div class="">'.form_input(['class'=>'form-control','name'=>'no_invoice_day','placeholder'=>'No Invoice Day','value'=>$row->no_invoice_day]).'</div>
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
  $p++;
} 
?>

</tbody>
</table>
<?php }

// if($this->session->flashdata('result')==NULL)
// {
//     echo '<h4 class="text-center">No Such Customer Found</h4>';

//   } ?>
</div>
<!-- End Of table of showing customer personel details -->






</div>
<!-- End of Dashboard -->

<!-- Footer part -->
<?php include_once('admin_footer.php') ?>