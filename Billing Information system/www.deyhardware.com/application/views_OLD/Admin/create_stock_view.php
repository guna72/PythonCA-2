<?php include_once('admin_header.php'); ?>
<script type="text/javascript">
  $('.p_stock').css('background-color','#76CEBE');
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
     <?php echo form_open('admin/present_stock_product',['class'=>'form-horizontal']); ?>
    <fieldset>
    <legend>Stock Product Details</legend>
    

 <div class="form-group">
    <div class="col-lg-2 col-lg-offset-2">
        
     </div>

     <div class="col-lg-3 col-md-3">
    <div class="form-group">
        <?php echo form_input(['class'=>'form-control product_name0','name'=>'product_name0','placeholder'=>'Product Name','onkeyup'=>'showHints('."'0'".');','autocomplete'=>'off']);?>

   <div id="show0"></div>
   <button style="display: none" id="btn_get_product" href="<?php echo base_url().'index.php/admin/back'; ?>"></button>
     </div>
 </div>
     <div class="col-lg-2 col-md-2">
       <?php echo form_button(['class'=>'btn btn-primary search_btn','type'=>'submit','name'=>'submit','content'=>'Submit','id'=>'search_btn'])?>
      </div>
  </div> 
</fieldset>
    </form>
    
    
	<div class="container per_table">
  <table class="table table-striped table-hover text-center" style="border: 1px solid #dff;box-shadow: 2px 2px 14px #888">
  <thead>
    <tr >
      <th  class="text-center">SL No</th>
      <th colspan="2" class="text-center">Product Code</th>
      <th colspan="2" class="text-center">Product Name</th>
      <th colspan="2" class="text-center">NRP</th>
      <th  class="text-center">Discount</th>
      <th  class="text-center">Total Count</th>
        <?php if($this->session->userdata('role_id')==1){ ?>
        <th class="text-center">Action</th>
        <?php } ?>
    </tr>
  </thead>
  <tbody>
 
    <?php
     $p=0;
        foreach ($prod_details as $row) {
            
            if($this->session->userdata('role_id')==2){
                echo "<tr>
         	       <td class='text-center'>".($p+1)."</td>
         	       <td colspan='2' class='text-center'>".$row->sac."</td>
                   <td colspan='2' class='text-center'>".$row->product_name."</td>
                   <td colspan='2' class='text-center'>".$row->mrp."/-</td>
                   <td  class='text-center'>".$row->discount."%</td>
                   <td  class='text-center'>".$row->count."</td>
         	      </tr>";
                }
            if($this->session->userdata('role_id')==1){
         	echo "<tr>
         	       <td class='text-center'>".($p+1)."</td>
         	       <td colspan='2' class='text-center'>".$row->sac."</td>
                   <td colspan='2' class='text-center'>".$row->product_name."</td>
                   <td colspan='2' class='text-center'>".$row->mrp."/-</td>
                   <td  class='text-center'>".$row->discount."%</td>
                   <td  class='text-center'>".$row->count."</td>
                   <td >".form_button(['type'=>'button','content'=>'Edit','class'=>'btn btn-primary','href'=>'#myModal'.$p,'data-toggle'=>"modal"])."</td>
         	      </tr>";
         	      echo '<div class="modal" id="myModal'.$p.'">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Edit Stock Product Details</h4>

         <div class="text-center ">  
            <h6>* Fields Must Be Required.</h6>
        </div>

      </div>
      <div class="modal-body">
        
        '.form_open('admin/edit_product_details',['class'=>'form-horizontal']).'
       

      <div class="form-group" style="display:none">
       '.form_label("<span>* </span> Product Code","Product Code",["class"=>' control-label']).'
      <div class="">'.form_input(['class'=>'form-control','name'=>'product_code','placeholder'=>'Product Code','value'=>$row->sac]).'</div>
      <div class="">'.form_error('product_code',"<p class='text-danger'>","</p>").'</div>
      </div>
  
    <div class="form-group">'.form_label('<span>* </span> Product Name','product_name',['class'=>' control-label']).'<div class="">
         '.form_input(['class'=>'form-control','name'=>'product_name','placeholder'=>'Product Name','value'=>$row->product_name]).'
      </div>
      <div class="">'.form_error('product_name',"<p class='text-danger'>","</p>").'
      </div>
    </div>

    <div class="form-group">'.form_label('<span>* </span> MRP','mrp',['class'=>' control-label']).'<div class="">
         '.form_input(['class'=>'form-control','name'=>'mrp','placeholder'=>'MRP','value'=>$row->mrp]).
      '</div>
      <div class="">'.form_error('mrp',"<p class='text-danger'>","</p>").'</div>
    </div>

    <div class="form-group">'.form_label('Discount','discount',['class'=>' control-label']).
    '<div class="">'.form_input(['class'=>'form-control','name'=>'discount','placeholder'=>'Discount','value'=>$row->discount]).'</div>
      <div class="">'.form_error('discount',"<p class='text-danger'>","</p>").'</div>
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