<?php include_once('admin_header.php'); ?>
<script type="text/javascript">
  $('.d_employy').css('background-color','#76CEBE');
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
     <?php echo form_open('admin/employee_add_view',['class'=>'form-horizontal']); ?>
    <fieldset>
    <legend>Employee Details</legend>
    

 <div class="form-group">
    <div class="col-lg-2 col-lg-offset-2">
        
     </div>

     <div class="col-lg-3 col-md-3">
    <div class="form-group">
        <?php echo form_input(['class'=>'form-control product_name0','name'=>'product_name0','placeholder'=>'Employee Name','onkeyup'=>'showHints('."'0'".');','autocomplete'=>'off']);?>

   <div id="show0"></div>
   <button style="display: none" id="btn_get_product" href="<?php echo base_url().'index.php/admin/back_employee'; ?>"></button>
     </div>
 </div>
     <div class="col-lg-2 col-md-2">
       <?php echo form_button(['class'=>'btn btn-primary search_btn','type'=>'submit','name'=>'submit','content'=>'Submit','id'=>'search_btn'])?>
      </div>
     
     <div class="col-lg-2 col-md-2">
         <a class='btn btn-primary' href="<?php echo base_url().'index.php/admin/AddEmployee'; ?>">ADD</a>
      
      </div>
  </div> 
</fieldset>
    </form>
    
    
	<div class="container per_table">
  <table class="table table-striped table-hover text-center" style="border: 1px solid #dff;box-shadow: 2px 2px 14px #888">
  <thead>
    <tr >
      <th  class="text-center">SL No</th>
      <th colspan="2" class="text-center">Employee Name</th>
      <th colspan="2" class="text-center">Mobile No</th>
      <th colspan="2" class="text-center">Email Id</th>
      <th  class="text-center">Reg. Date</th>
      <th class="text-center">Action</th>
    </tr>
  </thead>
  <tbody>
 
    <?php
     $p=0;
        foreach ($get_employee_details as $row) {
         	echo "<tr>
         	       <td class='text-center'>".($p+1)."</td>
                   <td colspan='2' class='text-center'>".$row->name."</td>
                   <td colspan='2' class='text-center'>".$row->mobile_no."</td>
                   <td colspan='2' class='text-center'>".$row->email_id."</td>
                   <td class='text-center'>".$row->reg_date."</td>
                   <td class='text-center'>".form_button(['type'=>'button','content'=>'Edit','class'=>'btn btn-primary','href'=>'#myModal'.$p,'data-toggle'=>"modal"])."</td>
                   
         	      </tr>";
            
         	      echo '<div class="modal" id="myModal'.$p.'">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Edit Employee Details</h4>

         <div class="text-center ">  
            <h6>* Fields Must Be Required.</h6>
        </div>

      </div>
      <div class="modal-body">
        
        '.form_open('admin/edit_employee_details',['class'=>'form-horizontal']).'
       

      <div class="form-group" style="display:none">
       '.form_label("<span>* </span> employee id","Nmae",["class"=>' control-label']).'
      <div class="">'.form_input(['class'=>'form-control','name'=>'employee_id','placeholder'=>'Product Code','value'=>$row->employee_id]).'</div>
      <div class="">'.form_error('employee_id',"<p class='text-danger'>","</p>").'</div>
      </div>
  
    <div class="form-group">'.form_label('<span>* </span>Employee Name','employee_name',['class'=>' control-label']).'<div class="">
         '.form_input(['class'=>'form-control','name'=>'employee_name','placeholder'=>'Employee Name','value'=>$row->name]).'
      </div>
      <div class="">'.form_error('employee_name',"<p class='text-danger'>","</p>").'
      </div>
    </div>

    <div class="form-group">'.form_label('<span>*</span>Age','age',['class'=>' control-label']).'<div class="">
         '.form_input(['class'=>'form-control','name'=>'age','placeholder'=>'AGE','value'=>$row->age]).
      '</div>
      <div class="">'.form_error('age',"<p class='text-danger'>","</p>").'</div>
    </div>

    <!--div class="form-group">'.form_label('<span>* </span>Gander','discount',['class'=>' control-label']).
    '<div class="">'.form_input(['class'=>'form-control','name'=>'sex','placeholder'=>'Gender','value'=>$row->sex]).'</div>
      <div class="">'.form_error('sex',"<p class='text-danger'>","</p>").'</div>
    </div-->
    
    <div class="form-group">'.form_label('<span>* </span>Mobile No','Mobile No',['class'=>' control-label']).
    '<div class="">'.form_input(['class'=>'form-control','name'=>'mobile_no','placeholder'=>'Mobile No','value'=>$row->mobile_no]).'</div>
      <div class="">'.form_error('ifsc_code',"<p class='text-danger'>","</p>").'</div>
    </div>
    
     <div class="form-group">'.form_label('<span>* </span>Email Id','Email Id',['class'=>' control-label']).
    '<div class="">'.form_input(['class'=>'form-control','name'=>'email_id','placeholder'=>'Email Id','value'=>$row->email_id]).'</div>
      <div class="">'.form_error('email_id',"<p class='text-danger'>","</p>").'</div>
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
            echo '<div class="modal" id="myModal_sa'.$p.'">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Edit Employee Details</h4>

         <div class="text-center ">  
            <h6>* Fields Must Be Required.</h6>
        </div>

      </div>
      <div class="modal-body">
      '.form_open('admin/edit_employee_details',['class'=>'form-horizontal']).'
      <div class="form-group" style="display:none">
       '.form_label("<span>* </span> employee id","Nmae",["class"=>' control-label']).'
      <div class="">'.form_input(['class'=>'form-control','name'=>'employee_id','placeholder'=>'Product Code','value'=>$row->employee_id]).'</div>
      <div class="">'.form_error('employee_id',"<p class='text-danger'>","</p>").'</div>
      </div>
      
      <div class="form-group">'.form_label('Employee Name','employee_name',['class'=>' control-label']).'<div class="">
         '.form_input(['class'=>'form-control','name'=>'employee_name','readonly','placeholder'=>'Employee Name','value'=>$row->name]).'
      </div>
      <div class="">'.form_error('employee_name',"<p class='text-danger'>","</p>").'
      </div>
    </div>

    <div class="form-group">'.form_label('<span>*</span>Age','age',['class'=>' control-label']).'<div class="">
         '.form_input(['class'=>'form-control','name'=>'age','placeholder'=>'AGE','value'=>$row->age]).
      '</div>
      <div class="">'.form_error('age',"<p class='text-danger'>","</p>").'</div>
    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
      </form>
      
      ';
            $q++;
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