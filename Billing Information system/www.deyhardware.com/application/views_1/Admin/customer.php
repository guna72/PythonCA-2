 
<?php include_once('admin_header.php'); $data; ?>
<script type="text/javascript">
  $('.c_details').css('background-color','#76CEBE');
  $(function(){
     $("#select").change(function(){
  var id = $(this).find("option:selected").attr("id");

   if(id=="date")
   {
    $('.search').attr('type','date');
    $('.to').css('display','block');
    $('.to_text').css('display','block');
   }
   else
   {
     $('.search').attr('type','text');
      $('.search').val('');
       $('.to').css('display','none');
       $('.to_text').css('display','none');

   }
}); 
     
  });
</script>



<div class="dashboard">

<?php 
     if($this->session->flashdata('feedback3'))
     {
     	echo '<div class="alert alert-dismissible alert-success text-center container">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <p style="color:#fff">'.$this->session->flashdata('feedback3').'</p>
  </div>';
     }

      if($this->session->flashdata('feedback2'))
     {
     	echo '<div class="alert alert-dismissible alert-danger text-center container">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <p style="color:#fff">'.$this->session->flashdata('feedback2').'</p>
  </div>';
     }

 ?>
  <?php if($this->session->flashdata('feedback1'))
     { ?>
     <div class="alert alert-dismissible alert-danger text-center container">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <p style="color: #fff"><?php echo $this->session->flashdata('feedback1')?></p>
     </div>

 <?php } echo form_open('admin/search_customer_details',['class'=>'form-horizontal']); ?>
  <fieldset>
    <legend>Customer Details</legend>
    

 <div class="form-group">
    <div class="col-lg-2 col-lg-offset-2">
        <select class="form-control" id="select" name="select">
        
          <option id="name">Name</option>
          <option id="gst_no">Ph No</option>
          <option id="date">Date</option>
          <option id="all">All</option>
        </select>
     </div>

     <div class="col-lg-3 col-md-3">
        <?php echo form_input(['class'=>'form-control search','name'=>'search','placeholder'=>'Search','type'=>'text']);?>
        <label class="to_text">To</label>
         <?php echo form_input(['class'=>'form-control to','name'=>'to','placeholder'=>'Search','type'=>'date']);?>
     </div>

     <div class="col-lg-2 col-md-2">
       <?php echo form_button(['class'=>'btn btn-primary search_btn','type'=>'submit','name'=>'submit','content'=>'Submit','id'=>'search_btn'])?>
      </div>

  </div> 
</fieldset>
</form>
</div>

  <!-- Start of table of showing customer personel details -->
<div class="container per_table">
  <?php
      if($this->session->flashdata('per_details')) 
      {
      	$per_details=$this->session->flashdata('per_details');
   ?>
  <h4 class="text-center">Customer Personel Details</h4>
  <table class="table table-striped table-hover text-center" style="border: 1px solid #dff;box-shadow: 2px 2px 14px #888">
  <thead>
    <tr >
      <th  class="text-center">SL No</th>
      <th colspan="2" class="text-center">Ph No</th>
      <th colspan="2" class="text-center">Customer Name</th>
      <th colspan="2" class="text-center">Address</th>
       <th colspan="2" class="text-center">GSTIN</th>
      <th class="text-center">Action</th>
    </tr>
  </thead>
  <tbody>
 
    <?php
     $p=0;
	 if(!empty($per_details)){
        foreach ($per_details as $row) {
         	echo "<tr>
         	       <td class='text-center'>".($p+1)."</td>
         	       <td colspan='2' class='text-center'>".$row->ph_no."</td>
                   <td colspan='2' class='text-center'>".$row->customer_name."</td>
                   <td colspan='2' class='text-center'>".$row->address."</td>
                   <td colspan='2' class='text-center'>".$row->customer_gstin."</td>
                   <td >".form_button(['type'=>'button','content'=>'Edit','class'=>'btn btn-primary','href'=>'#myModal'.$p,'data-toggle'=>"modal"])."</td>
         	      </tr>";
         	      echo '<div class="modal" id="myModal'.$p.'">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Edit Personal Details</h4>
      </div>
      <div class="modal-body">
        
        '.form_open('admin/set_edit',['class'=>'form-horizontal']).'
       

      <div class="form-group" style="display:none">
       '.form_label("<span>* </span> Ph NO","ph_no",["class"=>' control-label']).'
      <div class="">'.form_input(['class'=>'form-control','name'=>'ph_no','placeholder'=>'Ph No','value'=>$row->ph_no]).'</div>
      </div>
  
    <div class="form-group">'.form_label('<span>* </span> Customer Name','customer_name',['class'=>' control-label']).'<div class="">
         '.form_input(['class'=>'form-control','name'=>'customer_name','placeholder'=>'Customer Name','value'=>$row->customer_name]).'
      </div>
    </div>

    <div class="form-group">'.form_label('<span>* </span> Address','address',['class'=>' control-label']).'<div class="">
         '.form_textarea(['class'=>'form-control','name'=>'address','placeholder'=>'Address','rows'=>4,'value'=>$row->address]).
      '</div>
    </div>
    <div class="form-group">'.form_label('<span>* </span> GSTIN','address',['class'=>' control-label']).'<div class="">
         '.form_textarea(['class'=>'form-control','name'=>'customer_gstin','placeholder'=>'GSTIN','rows'=>4,'value'=>$row->customer_gstin]).
      '</div>
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
         } } 
     ?>
    
  </tbody>
</table>
<?php } ?>
</div>
<!-- End Of table of showing customer personel details -->


<!-- Start of Edit part -->
<?php

?>
<!-- End Of Edit Part -->




<!-- Start of table for invice details -->
<div class="container invoice_table">
  <?php
      if($this->session->flashdata('invoice_details')) 
      {
      	$invoice_details=$this->session->flashdata('invoice_details');
   ?>
  <h4 class="text-center">Customer Invoice Details</h4>
  <p class="text-danger"> *Red Color For Not Full Payment. <br>*Green Color For Full Payment</p>
  <table class="table table-striped table-hover text-center" style="border: 1px solid #dff;box-shadow: 2px 2px 14px #888">
  <thead>
    <tr>
      <th  class="text-center">SL No</th>
      <th  class="text-center">Ph No</th>
      <th  class="text-center" colspan="3" >Customer Name</th>
      <th  class="text-center">Address</th>
      <th  class="text-center">Invoice NO</th>
      <th  class="text-center">Date of PURCHASE</th>
      <th  class="text-center">Total Payment</th>
      <th  class="text-center">Due Payment</th>
	  <th class="text-center" >Action</th>
      <!--th  class="text-center">Igst</th>
      <th class="text-center">date</th>
      <th class="text-center">total_not_gst</th>
      <th class="text-center">Payment</th>
      <th class="text-center" >Action</th-->

    </tr>
  </thead>
  <tbody>
    <?php
    $i=0;
    $j=1;
    $class="success";
    
        foreach ($invoice_details as $row) {
        	 $data=$row;
             $pdf_link="";
			 $due =$row->total - $row->payment;
        	 if($i==4)
         	   	$i=0;
         	       if($row->active==0)
                 {
                     $class="danger";
                     $pdf_link="print_invoice";
                 }
                 else
                  $class="success";
                  $pdf_link="print_invoice";
                  //$pdf_link="print_final_invoice";
         	echo form_open('admin/'.$pdf_link.'/'.$row->ph_no.'/'.$row->date.'/'.$row->no_invoice_day,['target'=>'_blank'])."<tr class=".$class.">
         	       <td >".$j."</td>
         	       <td name='gst_no'>".$row->ph_no."</td>
                   <td  colspan='3' name='com_name'>".$row->customer_name."</td>
         	       <td name='des'>".$row->address."</td>
                   <td name='sac'>".$row->invoice_no."</td>
                   <td name='sac'>".$row->date."</td>
                   <td name='gw'>".$row->total."</td>
                   <td name='nw'>".$due."</td>
                   <td>".form_button(['class'=>'btn btn-primary','type'=>'submit','content'=>'Print'])."
                   </td>
         	      </tr></form>";
         	  
         	   $i++;
         	   $j++;
         } 
     ?>
    
  </tbody>
</table>
<?php }  ?>
</div>
<!-- End Of Invoice details table -->





<?php include_once('admin_footer.php') ?>