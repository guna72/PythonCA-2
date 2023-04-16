 
<!-- Header part -->
<?php include_once('admin_header.php') ?>



<!-- color change of create invoice button -->
<script type="text/javascript">
  $('.c_inv').css('background-color','#76CEBE');
</script>




<!-- Start Of all logic in jquery -->
<script type="text/javascript">
  $(function(){
   var i=0;
   var f=1;
   var k;
   var l='0';

      // For print option
      $('.print').click(function(){
         window.open(
          $('.print').attr('href'),
           '_blank' 
         );
      });

       // For Chalan option
      $('.chalan').click(function(){
         window.open(
          $('.chalan').attr('href'),
           '_blank' 
         );
      });



      // for add more description=======================================================
      $(document).on('click','.add',function(){

       i++;
       if(f)
       {
         l=l+i;
       }
       else
       {
        k=k+i;
      }
      $value_cgst= $('.cgst0').val();
      $value_sgst= $('.sgst0').val();
      $value_igst= $('.igst0').val();
      $('.des_all').append("<div class='form-group blck"+i+"' style='margin-top:80px'> <div class='form-group blck1"+i+"'><label for='Product Type'"+i+" class='col-lg-2 col-md-2 control-label'> Product Type"+i+"</label><div class='col-lg-6 col-md-6'><select class='form-control' id='product_type_id"+i+"' name='product_type' onchange='ResetProductCode("+i+")'> <option>Select Product</option>                                 '<?php foreach($ProductypeDetails as $prdD){?>'<option value='<?php echo $prdD->product_cat_id;?>'><?php echo $prdD->product_cat_name;?></option><?php } ?>' </select> </div></div>       <div class='form-group'><label for='product_name'"+i+" class='col-lg-2 col-md-2 control-label'><span>* </span>Product Name"+i+"</label><div class='col-lg-6 col-md-6'><input class='form-control product_name"+i+"' name='product_name"+i+"' placeholder='Product Name' onkeyup='showHints("+i+")' autocomplete='off'/><div id='show"+i+"' onclick='getProductDetails("+i+")'></div>  <input type='hidden' name='product_price"+i+"' id='product_price"+i+"' class='form-control product_price"+i+"'> </div><button class='btn btn-danger dlt' id='"+i+"' >Delete</button>  <button name='add' type='button' class='btn btn-primary add control-label'>Mores</button> </div></div>  <div class='form-group blck1"+i+"'><label for='qnty'"+i+" class='col-lg-2 col-md-2 control-label'> qnty"+i+"</label><div class='col-lg-6 col-md-6'><input class='form-control qnty"+i+"' name='qnty"+i+"' placeholder='QUENTITY' value='' /></div></div>    <div class='form-group blck2"+i+"'><label for='cgst'"+i+" class='col-lg-2 col-md-2 control-label'> CGST"+i+"</label><div class='col-lg-6 col-md-6'><input class='form-control cgst"+i+"' name='cgst"+i+"' placeholder='CGST' value='"+$value_cgst+"' /></div></div>    <div class='form-group blck2"+i+"'><label for='sgst'"+i+" class='col-lg-2 col-md-2 control-label'> SGST"+i+"</label><div class='col-lg-6 col-md-6'><input class='form-control sgst"+i+"' name='sgst"+i+"' placeholder='SGST' value='"+$value_sgst+"'/></div></div>     <div class='form-group blck3"+i+"'><label for='igst'"+i+" class='col-lg-2 col-md-2 control-label'> IGST"+i+"</label><div class='col-lg-6 col-md-6'><input class='form-control igst"+i+"' name='igst"+i+"' placeholder='IGST' value=''/></div></div>");
      if(f)
        $('.bkd').attr('action','<?php echo base_url()?>index.php/admin/store_invoice/'+l);
      else
        $('.bkd').attr('action','<?php echo base_url()?>index.php/admin/store_invoice/'+k);

    });




    // for delete the field of each description===============================
    $(document).on('click','.dlt',function()
    {
        
     var btn_id=$(this).attr('id');
     $('.blck'+btn_id).remove();
     $('.blck1'+btn_id).remove();
     $('.blck2'+btn_id).remove();
     $('.blck3'+btn_id).remove();
     if(f)
     {
       k=l.replace(''+btn_id,'');
       f=0;
       $('.bkd').attr('action','<?php echo base_url()?>index.php/admin/store_invoice/'+k);
     }
     else
     {
       l=k.replace(''+btn_id,'');
       f=1;
       $('.bkd').attr('action','<?php echo base_url()?>index.php/admin/store_invoice/'+l);

     }
     
   });



    if(l=='0')
      $('.bkd').attr('action','<?php echo base_url()?>index.php/admin/store_invoice/'+l);




// for show the table for veryfying--------------------------------------
var count_fun=0;
$('.show_table').click(function(){
    //alert("call here ");
  if(count_fun!=0)
  {
   $('#tbdy').remove();
   $('table').append(' <tbody id="tbdy"></tbody>');
 }
  var str;//str used for store the id of each description part as a string
  if(f) str=l;
  else
    str=k;
  var count=0;
  while(count<str.length)
  {
      var abc='<input type="text" name="product_price_sss'+str.charAt(count)+'" value="'+$('.product_price'+str.charAt(count)).val()+'">';
	  //alert(abc);
    $('#tbdy').append(`<tr>
      <td>`+(count+1)+`</td>
      <td>`+$('.ph_no').val()+`</td>
      <td>`+$('.product_name'+str.charAt(count)).val()+`</td>
      <td>`+$('.qnty'+str.charAt(count)).val()+`</td>
      <td>`+$('.cgst'+str.charAt(count)).val()+`</td>
      <td>`+$('.sgst'+str.charAt(count)).val()+`</td>
      <td>`+abc+`</td>
    </tr>`);
    count++;
    count_fun++;
  }
});


// for click the submit button of modal then send the form values==========================================
$('.final_submit').click(function(){
  $('.submit').click();
});


});
    
    function getProductDetails(a)
    {
      //  alert("here"+a);
    var path ='get_product_mrp';
    var id='product_price'+a;
    var ss =$('.product_name'+a).val();
    //alert("id"+id);
    var data_json={ product_code:ss};
    $.ajax({
    method: 'POST',
    url: path,
    data:data_json,
    success: function(data_val)
        {
            
        var jsn = JSON.parse(data_val);
        if(jsn.count<=2)
        {
            alert("your current stock less the 2,Please update stock.");
        }   
        //alert("your curent stock of the product "+jsn.product_name+" stock is ="+jsn.count);
        document.getElementById(id).value=jsn.mrp;
        // alert(data_val);
        //$('#show'+id).html(data_val);
       // alert(data_val);
    }

  });
        }
    
    function ResetProductCode(idd)
    {
        $(".product_name"+idd).val("");
     }
// Shohint from database=========================
var hints_id;
function showHints(id)
{
 hints_id=id;
  var path=$('#btn_get_product').attr('href');
  var str=$('.product_name'+id).val();
  var idsss = '#product_type_id'+id;
    //alert(idsss);
  var prd_type_id=$(idsss).val();
    var data_json={ val: str,prd_type_id: prd_type_id};
    //alert("prd_type_id"+prd_type_id);
    $.ajax({
    method: 'POST',
    url: path,
    data:data_json,
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
<!-- End of all logic in jquery================================== -->


<div class="dashboard">
 <?php
  if( $this->session->flashdata('feedback1')){?>        
 <div class="alert alert-dismissible alert-danger text-center container">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <p style="color: #fff"><?php echo $this->session->flashdata('feedback1');?></p>
</div>


<?php } if( $this->session->flashdata('feedback2'))
{?>
 <div class="alert alert-dismissible alert-success text-center container">
   <button type="button" class="close" data-dismiss="alert">&times;</button>
   <p style="color: #fff"><?php echo $this->session->flashdata('feedback2')?></p>
 </div>
 
 <?php }?>
 <?php if($this->session->flashdata('feedback5')){  
     $ph_no=$this->session->flashdata('feedback5');
     $date=$this->session->flashdata('feedback6');
     $no_invoice_day=$this->session->flashdata('feedback7');
  ?>
    <div class="form-group text-right container">
    <span style="padding-right: 3px"> </span>
    <?php echo 
    form_button(['class'=>'btn btn-primary print','type'=>'anchor','name'=>'print','content'=>'Print','href'=>'print_invoice/'.$ph_no.'/'.$date.'/'.$no_invoice_day])?>
   </div>
<?php } ?>

<!-- Creation of modal using jquery for after submitting the values show these for partial or full payment -->
<?php 
   
     if($this->session->flashdata('data_main'))
    {
      echo "<div class='text-center'>";
      echo form_button(['class'=>'btn btn-primary','type'=>'button','name'=>'go_payment','content'=>'Continue payment','id'=>'go_payment','data-toggle'=>"modal",'href'=>'#myModal1']);
      echo "</div>";
   ?>
<div class="modal" id="myModal1">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <?php
    
        $data_main=$this->session->flashdata('data_main');
        $ph_no=$this->session->flashdata('ph_no');
        $t=$this->session->flashdata('t');
		$total_discount=$this->session->flashdata('discount_total');
        $customer_name=$this->session->flashdata('customer_name');
        echo "<h4>Customer Name: ".$customer_name."</h4>";
        echo "<h4>Mobile No: ".$ph_no."</h4>";
		echo "<h4>Discount: ".$total_discount."%</h4>";
     ?>
      </div>

      <div class="modal-body">
        <table class="table table-striped table-hover ">
          <thead>
            <tr>
              <th>Sl No</th>
              <th>Product</th>
              <th>Product Code</th>
              <th>MRP</th>
              <!--th>Discount</th-->
              <th>QNTY</th>
              <th>CGST</th>
              <th>SGST</th>
              <th>IGST</th>
              <th>Total</th>
            </tr>
          </thead>
          <tbody>
          <?php 
          $c_p=1;
          $all_total=0;
          $cgst=0;
          $sgst=0;
          $igst=0;
          $qnty=0;
             foreach($data_main as $row)
             {
               echo "<tr><td>".$c_p."</td>
                     <td>".$row['product_name']."</td>
                     <td>".$row['sac']."</td>
                     <td>".$row['mrp']."/-</td>
                     <!--td>".$row['discount']."%</td-->
                     <td>".$row['qnty']."</td>
                     <td>".$row['cgst']."%</td>
                     <td>".$row['sgst']."%</td>
                     <td>".$row['igst']."%</td>
                     <td>".$row['grand_total_not_gst']."</td></tr>";
                  $all_total=$all_total+$row['grand_total_not_gst'];

                  $cgst=$row['cgst'];
                  $sgst=$row['sgst'];
                  $igst=$row['igst'];
                  $qnty=$row['qnty'];
             }
          $t_withou_dis = $all_total - ($all_total * $total_discount)/100 ;
        if($igst==0)
        {
         $total1=($t_withou_dis*$cgst)/100 ;
         $total2=($t_withou_dis*$sgst)/100 ;
         $all_total=$t_withou_dis+$total1+$total2;
       }
       else
       {
         $total1=($t_withou_dis*$igst)/100;
         $all_total=$t_withou_dis+$total1;
       }
          ?>
          </tbody>
        </table>




<?php
// START OF SUBMIITING FINAL FORM OF DATA 
     echo form_open('admin/end_submit',['class'=>'form-horizontal']);
      echo "<input name='customer_name' value='".$customer_name."' type='text' style='display:none'/>
                  <input name='ph_no' value='".$ph_no."'  type='text' style='display:none' />
             <label>Payment:(With GST) </label><input class='g_payment' name='g_payment' value='".round($all_total)."' type='text' />
			 <br>
             <input style='display:none'  class='total_discount' name='total_discount' value='".$total_discount."' type='text' />
			 <label>Payment Mode</label> 
			 <select class='form-control' id='payment_mode' name='payment_mode' onchange='ResetProductCode(0)'>
			 <option value='CASH'>CASH</option> <option value='CHEQUE'>CHEQUE</option>  <option value='CARD'>CARD</option> 
			</select>
             <input name='t' value='".$t."'  type='text' style='display:none' />
             <input name='all_total' value='".round($all_total)."'  type='text' style='display:none' />
         ";
         $sp=0;
      foreach($data_main as $row)
      {
        echo "<input name='product_name".$t[$sp]."' value='".$row['product_name']."' type='text' style='display:none' />
       <input name='sac".$t[$sp]."' value='".$row['sac']."' type='text' style='display:none'/>
        <input name='mrp".$t[$sp]."' value='".$row['mrp']."' type='text' style='display:none'/>
        <input name='qnty".$t[$sp]."' value='".$row['qnty']."' type='text' style='display:none'/>
       <input name='discount".$t[$sp]."' value='".$row['discount']."' type='text' style='display:none'/>
        <input name='cgst".$t[$sp]."' value='".$row['cgst']."' type='text' style='display:none'/>
       <input name='sgst".$t[$sp]."' value='".$row['sgst']."' type='text' style='display:none'/>
        <input name='igst".$t[$sp]."' value='".$row['igst']."' type='text' style='display:none'/>
       <input name='date".$t[$sp]."' value='".$row['date']."' type='text' style='display:none'/>
       <input name='total".$t[$sp]."' value='".$row['grand_total_not_gst']."' type='text' style='display:none'/>
       <input name='no_invoice_day".$t[$sp]."' value='".$row['no_invoice_day']."' type='text'style='display:none' />
       <input name='date_diffr".$t[$sp]."' value='".$row['date_diffr']."' type='text' style='display:none'/>
        ";
        $sp++;
      }
    ?>
     
  
      </div>

      <div class="modal-footer">
          <?php echo 
         form_button(['class'=>'btn btn-primary ','type'=>'submit','name'=>'submit','content'=>'Submit'])?>
         </form>
      </div>

    </div>
  </div>
</div>
<!-- End Of MOdal2 ====================================================================== -->


<!-- Start of sending data using form -->

<?php   
 } 

 else
{
 ?>

 <form class="form-horizontal bkd" action="" method="post">
  <fieldset>
    <legend>Create Invoice</legend>
    <div class="text-center ">  
        <h6>* Fields Must Be Required.</h6>
     </div>
    <div class="form-group">
    <?php echo form_label('<span>* </span> Mobile No','ph_no',['class'=>'col-lg-2 col-md-2 control-label']);?>
    <div class="col-lg-6 col-md-6">
     <?php echo form_input(['class'=>'form-control ph_no','maxlength'=>'10','name'=>'ph_no','placeholder'=>'Mobile No']);?>
    </div>
   <div class="col-lg-4 col-md-4">
   <?php echo  form_error('ph_no',"<p class='text-danger'>","</p>");?>
   </div>
   </div>
   <div class="form-group">
    <?php echo form_label('Customer Name','customer_name',['class'=>'col-lg-2 col-md-2 control-label']);?>
    <div class="col-lg-6 col-md-6">
     <?php echo form_input(['class'=>'form-control','name'=>'customer_name','placeholder'=>'Customer Name']);?>
    </div>
   <div class="col-lg-4 col-md-4">
   <?php echo  form_error('customer_name',"<p class='text-danger'>","</p>");?>
   </div>
   </div>
   <div class="form-group">
    <?php echo form_label('Address','Address',['class'=>'col-lg-2 col-md-2 control-label']);?>
    <div class="col-lg-6 col-md-6">
     <?php echo form_input(['class'=>'form-control','name'=>'address','placeholder'=>'Customer Address']);?>
    </div>
   <div class="col-lg-4 col-md-4">
   <?php echo  form_error('address',"<p class='text-danger'>","</p>");?>
   </div>
   </div>
    <div class="form-group">
    <?php echo form_label('Customer GSTIN','customer_gst',['class'=>'col-lg-2 col-md-2 control-label']);?>
    <div class="col-lg-6 col-md-6">
     <?php echo form_input(['class'=>'form-control','name'=>'customer_gst','placeholder'=>'Customer GSTIN']);?>
    </div>
   <div class="col-lg-4 col-md-4">
   <?php echo  form_error('customer_gst',"<p class='text-danger'>","</p>");?>
   </div>
   </div>
      

 <div class="des_all">
     <div class="form-group">
  <?php echo form_label('<span>* </span> Product Type','product_type',['class'=>'col-lg-2 col-md-2 control-label ']);?>
  <div class="col-lg-6 col-md-6">
   <select class="form-control" id="product_type_id0" name="product_type" onchange="ResetProductCode(0)">
          <?php 
            foreach($ProductypeDetails as $prdD){?>
            <option value="<?php echo $prdD->product_cat_id;?>"><?php echo $prdD->product_cat_name;?></option>
          <?php } ?>
        </select>
 </div>
 <div class="col-lg-4 col-md-4"><?php echo  form_error('product_name0',"<p class='text-danger'>","</p>");?>
 </div>
</div>
     

  <div class="form-group">
  <?php echo form_label('<span>* </span> Product Code','product_name0',['class'=>'col-lg-2 col-md-2 control-label ']);?>
  <div class="col-lg-6 col-md-6">
   <?php echo form_input(['class'=>'form-control product_name0','name'=>'product_name0','placeholder'=>'Product Code','onkeyup'=>'showHints('."'0'".');','autocomplete'=>'off']);?>

   <div id="show0" onclick="getProductDetails('0')"></div>
        <input type="hidden" name="product_price0" id="product_price0" class="form-control product_price0">
      <!--<div id="mrp0" style="display: none"></div>-->
   <button style="display: none" id="btn_get_product" href="<?php echo base_url().'index.php/admin/back'; ?>"></button>
 </div>
 <div class="col-lg-4 col-md-4"><?php echo  form_error('product_name0',"<p class='text-danger'>","</p>");?>
 </div>
</div>

<div class="form-group"><?php echo form_label('<span>* </span>Quantity','qnty0',['class'=>'col-lg-2 col-md-2 control-label']);?>
<div class="col-lg-6 col-md-6">
 <?php echo form_input(['class'=>'form-control qnty0','name'=>'qnty0','type'=>'number','placeholder'=>'Quantity']);?>
</div>
<div class="col-lg-4 col-md-4">
<?php echo  form_error('qnty0',"<p class='text-danger'>","</p>");?>
</div>
</div>
     
<div class="form-group"><?php echo form_label('CGST','cgst0',['class'=>'col-lg-2 col-md-2 control-label']);?>
<div class="col-lg-6 col-md-6">
 <?php echo form_input(['class'=>'form-control cgst0','name'=>'cgst0','placeholder'=>'CGST']);?>
</div>
<div class="col-lg-4 col-md-4">
<?php echo  form_error('cgst0',"<p class='text-danger'>","</p>");?>
</div>
</div>
     
<div class="form-group"><?php echo form_label('SGST','sgst0',['class'=>'col-lg-2 col-md-2 control-label']);?>
<div class="col-lg-6 col-md-6">
 <?php echo form_input(['class'=>'form-control sgst0','name'=>'sgst0','placeholder'=>'SGST']);?>
</div>
<div class="col-lg-4 col-md-4">
<?php echo  form_error('sgst0',"<p class='text-danger'>","</p>");?>
</div>
</div>

<div class="form-group">
<?php echo form_label('IGST','igst0',['class'=>'col-lg-2 col-md-2 control-label']);?>
<div class="col-lg-6 col-md-6">
 <?php echo form_input(['class'=>'form-control igst0','name'=>'igst0','placeholder'=>'IGST']);?>
</div>
<div class="col-lg-4 col-md-4"><?php echo  form_error('igst0',"<p class='text-danger'>","</p>");?>
</div>
</div>


<div class="form-group">
  <div class="col-lg-10 col-lg-offset-2">
    <?php echo form_button(['class'=>'btn btn-primary add control-label','type'=>'button','name'=>'add','content'=>'Mores'])?>
  </div>
</div>

</div>

<div class="form-group">
  <div class="col-lg-10 col-lg-offset-2">
    <?php echo
    form_button(['class'=>'btn btn-default','type'=>'reset','content'=>'Cancel','name'=>'cancel']);?>
    <span style="padding-right: 3px"> </span>
    <?php echo 
    form_button(['class'=>'btn btn-primary submit','type'=>'submit','name'=>'submit','content'=>'Submit','id'=>'submit'])?>
    <?php echo 
    form_button(['class'=>'btn btn-primary show_table','type'=>'button','name'=>'submit','content'=>'Submit','data-toggle'=>"modal",'href'=>'#myModal'])?>
  </div>
</div>

</fieldset>




<!-- Creation of modal using jquery for after submitting the values show these for veryfying -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Do you Want to submit???</h4>
      </div>

      <div class="modal-body">
        <table class="table table-striped table-hover .tbl">
          <thead>
            <tr>
              <th>Sl No</th>
              <th>Mobile No</th>
              <th>Product Name</th>
              <th>Qunty</th>
              <th>CGST</th>
              <th>SGST</th>
              <th>MRP(per unit)</th>
            </tr>
          </thead>
          <tbody id="tbdy">
            
          </tbody>
        </table>
		<label>Discount(%)</label><input class="total_discounts" name="total_discounts" value="0" type="text/>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-primary final_submit">Submit</button>
      </div>
    </div>
  </div>
</div>
     </form>
<!-- End of form==================================================================================== -->

<!-- End Of MOdal ====================================================================== -->


<?php } ?>





</div>
<!-- End Of Whole dashboard part where the part of all without header part and footer part -->




<!-- Footer part -->
<?php include_once('admin_footer.php') ?>