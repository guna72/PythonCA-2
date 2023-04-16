<?php include_once('admin_header.php'); ?>
<script type="text/javascript">
  $('.c_vendor').css('background-color','#76CEBE');
 </script>



<div class="dashboard">
	<?php 

	if($this->session->flashdata('feedback1'))
	{  
   echo '<div class="alert alert-dismissible alert-success text-center container">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <p style="color:#fff">'.$this->session->flashdata('feedback1').'</p>
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
     <?php echo form_open('admin/create_vendor',['class'=>'form-horizontal']); ?>
    <fieldset>
    <legend>Vendor Details</legend>
    

 <div class="form-group">
    <div class="col-lg-2 col-lg-offset-2">
        
     </div>

     <div class="col-lg-3 col-md-3">
    <div class="form-group">
        <?php echo form_input(['class'=>'form-control product_name0','name'=>'product_name0','placeholder'=>'Vendor Name','onkeyup'=>'showHints('."'0'".');','autocomplete'=>'off']);?>

   <div id="show0"></div>
   <button style="display: none" id="btn_get_product" href="<?php echo base_url().'index.php/admin/back_vendor'; ?>"></button>
     </div>
 </div>
     <div class="col-lg-2 col-md-2">
       <?php echo form_button(['class'=>'btn btn-primary search_btn','type'=>'submit','name'=>'submit','content'=>'Submit','id'=>'search_btn'])?>
      </div>
     
     <div class="col-lg-2 col-md-2">
         <a class='btn btn-primary' href="<?php echo base_url().'index.php/admin/AddVendor'; ?>">ADD</a>
      
      </div>
  </div> 
</fieldset>
    </form>
    
    
	<div class="container per_table">
  <table class="table table-striped table-hover text-center" style="border: 1px solid #dff;box-shadow: 2px 2px 14px #888">
  <thead>
    <tr >
      <th  class="text-center">SL No</th>
      <th colspan="2" class="text-center">Vendor Name</th>
      <th colspan="2" class="text-center">Bank Name</th>
      <th colspan="2" class="text-center">Account No</th>
      <th  class="text-center">Bank Address</th>
      <th  class="text-center">IFSC Code</th>
      <th class="text-center">Action</th>
    </tr>
  </thead>
  <tbody>
 
    <?php
     $p=0;
        foreach ($get_vendor_details as $row) {
         	echo "<tr>
         	       <td class='text-center'>".($p+1)."</td>
                   <td colspan='2' class='text-center'>".$row->vendor_name."</td>
                   <td colspan='2' class='text-center'>".$row->bank_name."</td>
                   <td colspan='2' class='text-center'>".$row->account_no."</td>
                   <td class='text-center'>".$row->bank_address."</td>
                   <td class='text-center'>".$row->ifsc_code."</td>
                   <td class='text-center'>".form_button(['type'=>'button','content'=>'Edit','class'=>'btn btn-primary','href'=>'#myModal'.$p,'data-toggle'=>"modal"])."</td>
         	      </tr>";
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
        
        '.form_open('admin/edit_vendor_details',['class'=>'form-horizontal']).'
       

      <div class="form-group" style="display:none">
       '.form_label("<span>* </span> vendor id","Nmae",["class"=>' control-label']).'
      <div class="">'.form_input(['class'=>'form-control','name'=>'vendor_id','placeholder'=>'Product Code','value'=>$row->vendor_id]).'</div>
      <div class="">'.form_error('vendor_id',"<p class='text-danger'>","</p>").'</div>
      </div>
  
    <div class="form-group">'.form_label('<span>* </span> Vendor Name','vendor_name',['class'=>' control-label']).'<div class="">
         '.form_input(['class'=>'form-control','name'=>'vendor_name','placeholder'=>'Vendor Name','value'=>$row->vendor_name]).'
      </div>
      <div class="">'.form_error('vendor_name',"<p class='text-danger'>","</p>").'
      </div>
    </div>

    <div class="form-group">'.form_label('<span>* </span> Bank Name','mrp',['class'=>' control-label']).'<div class="">
         '.form_input(['class'=>'form-control','name'=>'bank_name','placeholder'=>'MRP','value'=>$row->bank_name]).
      '</div>
      <div class="">'.form_error('bank_name',"<p class='text-danger'>","</p>").'</div>
    </div>

    <div class="form-group">'.form_label('<span>* </span> Account No','discount',['class'=>' control-label']).
    '<div class="">'.form_input(['class'=>'form-control','name'=>'account_no','placeholder'=>'Discount','value'=>$row->account_no]).'</div>
      <div class="">'.form_error('account_no',"<p class='text-danger'>","</p>").'</div>
    </div>
    
    <div class="form-group">'.form_label('<span>* </span> IFSC code','IFSC code',['class'=>' control-label']).
    '<div class="">'.form_input(['class'=>'form-control','name'=>'ifsc_code','placeholder'=>'IFSC Code','value'=>$row->ifsc_code]).'</div>
      <div class="">'.form_error('ifsc_code',"<p class='text-danger'>","</p>").'</div>
    </div>
    
    <div class="form-group">'.form_label('<span>* </span>Bank Address','Bank Address',['class'=>' control-label']).
    '<div class="">'.form_input(['class'=>'form-control','name'=>'bank_address','placeholder'=>'Bank Address','value'=>$row->bank_address]).'</div>
      <div class="">'.form_error('bank_address',"<p class='text-danger'>","</p>").'</div>
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
</div>
<!-- End Of table of showing customer personel details -->

</div>
<script type="text/javascript">
var hints_id;
function showHints(id)
{
  hints_id=id;
  var path=$('#btn_get_product').attr('href');
  var str=$('.product_name'+id).val();
    $.ajax({
    method: 'POST',
    url: path,
    data: "val="+str,
    success: function(data_val){
       $('#show'+id).html(data_val);
       // alert(data_val);
    }

  });
}
    function fun_need(value)
{
  //alert("CALLED");
  $('.product_name'+hints_id).val(value);
  $('#show'+hints_id).html(" ");
}
    
</script>

 <?php include_once('admin_footer.php') ?>