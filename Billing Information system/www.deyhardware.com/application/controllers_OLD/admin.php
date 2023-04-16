<?php 
class Admin extends MY_Controller{

  function __construct(){
   parent::__construct();
   $this->load->model('adminmodel');
      $this->load->library('session');
		$this->load->helper('url');
        $this->load->helper('form');
   if(!$this->session->userdata('user_id'))
    return redirect('login');
}


public function admin_view(){
 $this->load->helper('form');
 $this->load->view('Admin/dashboard');

}




// for logout ------------------------
public function logout(){
 $this->session->unset_userdata('user_id');
 return redirect('login');
}


// for change admin password----------------------------
public function change_admin_pword(){
 $this->load->helper('form');
 $this->load->view('Admin/change_pword');

}


// Setting Password---------------------
public function set_password(){

  if($this->input->post()){
   $this->load->library('form_validation');
   if($this->form_validation->run('change_password_rules')){
    $cpword=$this->input->post('cpword');
    $npword=$this->input->post('npword');
    $rnpword=$this->input->post('rnpword');
     
    if($npword!=$rnpword){
      $this->session->set_flashdata('feedback1','New Password Field & Retype Password Field must be same');
      return redirect('Admin/change_admin_pword');

    }
    if($this->adminmodel->new_password_set($cpword,$npword)){
      $this->session->set_flashdata('feedback2','Password Change Successful');
      return redirect('Admin/change_admin_pword');
    }

    else
    {
      $flashdata=$this->session->set_flashdata('feedback1','Enter correct current password');
      return redirect('Admin/change_admin_pword');
    }
  }
  else{
   $this->load->view('Admin/change_pword');
   return;
 }
}
else{
 return redirect('Admin/change_admin_pword');
}  
}



// for create vendor //
    public function create_vendor()
    {
        $this->load->helper('form');
        $vendor_name=$this->input->post('product_name0');
        $data['get_vendor_details']=$this->adminmodel->get_vendor_details($vendor_name);
        $this->load->view('Admin/create_vendor_view.php',$data);
    }
// for add vendor    
    public function AddVendor()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        if($this->form_validation->run('add_vendor_rules')){
            $data=$this->input->post();
            if($this->adminmodel->add_vendor($data))
            {
                $flashdata=$this->session->set_flashdata('success','Vendor Add Succesfully');
                return redirect('Admin/create_vendor');
            }
            
         }
        $this->load->view('Admin/add_vendor.php');
    }
    // for edit vendor details
    public function edit_vendor_details()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        if($this->form_validation->run('add_vendor_rules')){
            $data=$this->input->post();
            if($this->adminmodel->edit_vendor($data))
            {
                $flashdata=$this->session->set_flashdata('feedback1','Update Succesfully Done');
                return redirect('Admin/create_vendor');
            }
            
         }
        else
        {
            $this->session->set_flashdata('feedback2','Can\'t submit
                      Without giving required Value !!');
                    return redirect('admin/create_vendor');
        }
    }
   



//+++++++++++++++++++++++++++++++++Start Of Customer creation Logic ++++++++++++++++++++++++++++++
  // Call  Create Customer view -------------------
public function create_customer()
{
 $this->load->helper('form');
 $this->load->view('Admin/create_customer_view.php');
}

// Add customer entries ----------------------
public function add_customer()
{
  if($this->input->post()){
   $this->load->library('form_validation');
   if($this->form_validation->run('add_customer_rules')){
    $customer_name=$this->input->post('customer_name');
    $address=$this->input->post('address');
    $ph_no=$this->input->post('ph_no');
    
    if($this->adminmodel->add_customer_set($customer_name,$address,$ph_no)){
      $this->session->set_flashdata('feedback2','Successfully Customer Added');
      return redirect('Admin/create_customer');
    }
    else
    {
      $flashdata=$this->session->set_flashdata('feedback1','Customer Addition Failed Try Again!');
      return redirect('Admin/create_customer');
    }
  }
  else
  {
    $this->load->view('Admin/create_customer_view');
  }
}
else
{
 return redirect('Admin/create_customer');
}  
}
//+++++++++++++++++++++++++++++++++ End Of Customer Creation Logic ++++++++++++++++++++++++++++++++++++



// ++++++++++++++++++++++++++Create category part+++++++++++++++++++++++++++++++

// call create categories view call-----------------
public function create_categories_call()
{
  
}
// +++++++++++++++++++++++++End Of Create Category Part++++++++++++++++++++++++

// +++++++++ //
public function create_category()
{
 $this->load->helper('form');
 $this->load->view('Admin/add_category');
}

//+++++++++++++++++++++++++++++++++ Start Of  Products Addition logic ++++++++++++++++++++++++++++++
// call product entries view-----------------------------
public function create_product(){
 $this->load->helper('form');
 $this->load->view('Admin/create_product_entries_view.php');
}
// Add Product entries ------------------------------
public function add_product()
{
  if($this->input->post()){
      
   $this->load->library('form_validation');
   if($this->form_validation->run('add_product_rules')){
    $product_name=$this->input->post('product_name');
    $sac=$this->input->post('product_code');
    $mrp=$this->input->post('mrp');
    $discount=$this->input->post('discount');
    $count=$this->input->post('count');
    //$purches_by=$this->input->post('purches_by');
    //$purches_amount=$this->input->post('purches_amount');
    if($count==NULL)
      $count=1;
     
    $val=$this->adminmodel->verify_product($sac);

    // New product submission
  if($val==-1)
  {
      if($this->adminmodel->add_product($product_name,$sac,$mrp,$discount,$count))
    {
      $this->session->set_flashdata('feedback2','Successfully Product Entered');
      return redirect('Admin/create_product');
    }
    else
    {
      $this->session->set_flashdata('feedback1','Product Enter Failed Try Again!');
      return redirect('Admin/create_product');
    }
  }
  // Old Product Submission
  else
  {
          $old_values=$this->adminmodel->old_values_product($sac);
          if($old_values->product_name!=$product_name)
          {
              $this->session->set_flashdata('feedback1','Product Enter Failed For Mismatch Product Name 
                You Entered With SAC Number:'.$sac.' With Your Old Name Which Already Stored along Same SAC Number !');
              return redirect('Admin/create_product');
          }
    if($this->adminmodel->add_same_product($product_name,$sac,$mrp,$discount,$val+$count))
    {
      $this->session->set_flashdata('feedback2','Successfully Product Entered');
      return redirect('Admin/create_product');
    }
    else
    {
      $flashdata=$this->session->set_flashdata('feedback1','Product Enter Failed Try Again!');
      return redirect('Admin/create_product');
    }
  }
    
  }
  else
  {
    $this->load->view('Admin/create_product_entries_view');
  }
}
else
{
 return redirect('Admin/create_product');
}  
}
//+++++++++++++++++++++++++++++++++End Of  Products Addition logic +++++++++++++++++++++++++++++++++++++++++




//+++++++++++++++++++++++++++++++++ Start Of  Stock Products View logic ++++++++++++++++++++++++++++++++++
// For call view of stock products---------------------
public function present_stock_product()
{
    $product_name = $this->input->post('product_name0');
    if($product_name==null)
     {
        $product_name='0';
     }else
        {
        $product_name=$product_name;
     }
   $this->load->helper('form');
    
   $prod_details=$this->adminmodel->get_products($product_name);
   $this->load->view('Admin/create_stock_view.php',['prod_details'=>$prod_details]);
}
// Edit product Details----------------------------------
public function edit_product_details()
{
  if($this->input->post())
  {
   $sac=$this->input->post('product_code');
   $product_name=$this->input->post('product_name');
   $mrp=$this->input->post('mrp');
   $discount=$this->input->post('discount');
   //$count=$this->input->post('count');
   if($product_name==NULL || $mrp==NULL)
   {
     $this->session->set_flashdata('feedback2','Can\'t updated
      Without giving Product Name Or MRP Value !!');
    return redirect('admin/present_stock_product');
   }
  if($discount==NULL)
   {
    $discount=0;
   }
   if(!is_numeric($mrp))
   {
       $this->session->set_flashdata('feedback2','Can\'t updated. MRP Must Be As A Numeric Value!!');
       return redirect('admin/present_stock_product');
   }
   if(!is_numeric($discount))
   {
       $this->session->set_flashdata('feedback2','Can\'t updated. Discount Must Be As A Numeric Value!!');
       return redirect('admin/present_stock_product');
   } 
   
   $data=['product_name'=>$product_name,'mrp'=>$mrp,'discount'=>$discount];
    
   if($this->adminmodel->update_product_details($data,$sac))
   {
     $this->session->set_flashdata('feedback1','Product Details updated');
     return redirect('admin/present_stock_product');
   }
   else
    {
    $this->session->set_flashdata('feedback2','Product Details Can\'t updated Try Again!!');
    return redirect('admin/present_stock_product');
    }
 }
 else
  {
    return redirect('admin/present_stock_product'); 
  }
}
//+++++++++++++++++++++++++++++++++ End Of Stock Product View Logic +++++++++++++++++++++++++++++++++++++








//+++++++++++++++++++++++++++++++++Start Of Create and Store Invoice Logic ++++++++++++++++++++++++++++++
// for creating invoice-----------------------
public function create_invoice()
{
 $this->load->helper('form');
 $this->load->view('Admin/create_invoice_view.php');
}
// Storing Invoice--------------------------
public function store_invoice($t)
{
    
  if($this->input->post())
  {

   $this->load->library('form_validation');
   if($this->form_validation->run('invoice_rules'))
   {
    
    $x=1;
    $data=[strlen($t)];
     
    $ph_no=$this->input->post('ph_no');
    $cus_name=$this->input->post('customer_name');
    $address=$this->input->post('address');
    $customer_gst = $this->input->post('customer_gst');
    $grand_total;
    $flg = $this->adminmodel->verify_customer($ph_no);
    if($flg==FALSE)
    {
       $this->adminmodel->add_customer_set($cus_name,$address,$ph_no,$customer_gst);
       //echo 'customer created ';
    } 
       
    if($this->adminmodel->verify_customer($ph_no))
    { 
       
      date_default_timezone_set("Asia/kolkata");
      $date=date('d-m-Y');
      $row=$this->adminmodel->get_customer_details($ph_no);
      $max_no_invoice_day=$this->adminmodel->get_no_invoice_day($ph_no,$date);
      $time=strtotime('04-09-2017')-strtotime($date);
      $form=date_create("04-09-2017");
      $to=date_create($date);
      $diff=date_diff($form,$to);
      while($x<=strlen($t))
      {
        $k=$x-1;
        $product_name=$this->input->post('product_name'.$t[$k]);
        $qnty=$this->input->post('qnty'.$t[$k]);
        $cgst=$this->input->post('cgst'.$t[$k]);
        $sgst=$this->input->post('sgst'.$t[$k]);
        $igst=$this->input->post('igst'.$t[$k]);
        if($cgst==NULL)
          $cgst=0;
        if($sgst==NULL)
          $sgst=0;
        if($igst==NULL)
          $igst=0;
        $b1=FALSE;
        $b2=FALSE;
        if($cgst==$sgst && $cgst!=0 && $igst==0)
        {
           $b1=TRUE;
        }
        if($cgst==$sgst && $cgst==0 && $igst!=0)
          $b2=TRUE;
         if(!$b1 && !$b2)
        {
          $flashdata=$this->session->set_flashdata('feedback1','Error in entries of  gst Fields!');
          return redirect('Admin/create_invoice');
        }

        $prod_details=$this->adminmodel->get_discount($product_name);
        if($prod_details==NULL)
        {
          $flashdata=$this->session->set_flashdata('feedback1','Error in entries of non storing product!');
          return redirect('Admin/create_invoice');
        }
  
       $total_without_qnty= ($prod_details->mrp)-($prod_details->mrp*($prod_details->discount/100));
       $total = $total_without_qnty * $qnty;
       $data[$k]=['ph_no'=>$ph_no,'customer_name'=>$row->customer_name,'product_name'=>$prod_details->product_name,'sac'=>$prod_details->sac,'mrp'=>$prod_details->mrp,'discount'=>$prod_details->discount,'qnty'=>$qnty,'cgst'=>$cgst,'sgst'=>$sgst,'igst'=>$igst,'date'=>$date,'grand_total_not_gst'=>$total,'current'=>1,'no_invoice_day'=>$max_no_invoice_day,'date_diffr'=>$diff->format('%R%a')];
       $x++;
     }
        $this->session->set_flashdata(['data_main'=>$data,'ph_no'=>$ph_no,'customer_name'=>$row->customer_name,'t'=>$t]);
        return redirect('Admin/create_invoice');
  }
  else
  {
    $flashdata=$this->session->set_flashdata('feedback1','No Such Customer Found !! atfirst create New customer with this Ph number Or may wrong Mobile No');
    return redirect('Admin/create_invoice');
  } 
}
else
{

  $this->load->view('Admin/create_invoice_view.php');
}
}
else
{
  
  return redirect('Admin/create_invoice');
}  

}
//+++++++++++++++++++++++++++++++++ End Of  invoice logic ++++++++++++++++++++++++++++++






//+++++++++++++++++++++++++++++++++Start Of Confirmation of Payment  ++++++++++++++++++++++++++++++
// For confirm Total payment i.e may be partial or may be fulll------------
 public function end_submit()
 {
    if($this->input->post())
    {
       $t=$this->input->post('t');
       $ph_no=$this->input->post('ph_no');
       $customer_name=$this->input->post('customer_name');
       $g_payment=$this->input->post('g_payment');
       $all_total=$this->input->post('all_total');
       if($g_payment==NULL)
       {
        $g_payment=0;
       }
       if(!is_numeric($g_payment))
       {
           $this->session->set_flashdata('feedback1','Enter Payment as a Numeric Value!');
           return redirect('Admin/create_invoice');
       }

       if($g_payment>$all_total)
       {
           $this->session->set_flashdata('feedback1','Cancelled Payment. Payment can\'t 
            take more than Total!!');
           return redirect('Admin/create_invoice');
       }
       $date;
       $no_invoice_day;
       $active=1;
       
       if($g_payment<$all_total)
        $active=0;
       $p=strlen($t);
       $x=0;
       $data=[$p];
         
       while($x<$p)
       {
        $product_name=$this->input->post('product_name'.$t[$x]);
        $sac=$this->input->post('sac'.$t[$x]);
        $mrp=$this->input->post('mrp'.$t[$x]);
        $qnty=$this->input->post('qnty'.$t[$x]);
        $discount=$this->input->post('discount'.$t[$x]);
        $cgst=$this->input->post('cgst'.$t[$x]);
        $sgst=$this->input->post('sgst'.$t[$x]);
        $igst=$this->input->post('igst'.$t[$x]);
        $date=$this->input->post('date'.$t[$x]);
        $total=$this->input->post('total'.$t[$x]);
        //$current=$this->input->post('current'.$t[$x]);
        $no_invoice_day=$this->input->post('no_invoice_day'.$t[$x]);
        $date_diffr=$this->input->post('date_diffr'.$t[$x]);
         $data[$x]=['ph_no'=>$ph_no,'customer_name'=>$customer_name,'product_name'=>$product_name,'sac'=>$sac,'mrp'=>$mrp,'discount'=>$discount,'qunty'=>$qnty,'cgst'=>$cgst,'sgst'=>$sgst,'igst'=>$igst,'date'=>$date,'grand_total_not_gst'=>round($total),'payment'=>$g_payment,'no_invoice_day'=>$no_invoice_day,'date_diffr'=>$date_diffr,'active'=>$active];
          $res=$this->adminmodel->change_no_of_total_product($sac,$qnty);
          if($res==-1)
          {
            $flashdata=$this->session->set_flashdata('feedback1','Can\'t make any bill for not remain the product with sac number: '.$sac);
            return redirect('Admin/create_invoice');
          }
         $x++;
       }  
       
      // $this->adminmodel->unset_current();



       if($this->adminmodel->add_invoice($data))
      {

           if($active==0)
           {
              $data_send=['Date'=>$date,'no_invoice_day'=>$no_invoice_day,'ph_no'=>$ph_no,'payment'=>$g_payment,'total'=>$all_total];

              if(!$this->adminmodel->partial_payment($data_send))
              {
                $this->session->set_flashdata('feedback1','storing Failed Try Again!');
                return redirect('Admin/create_invoice');
              }
           }
        $this->session->set_flashdata('feedback2','Payment Completed Successfully.');
        $this->session->set_flashdata('feedback5',$ph_no);
        $this->session->set_flashdata('feedback6',$date);
        $this->session->set_flashdata('feedback7',$no_invoice_day);
        return redirect('Admin/create_invoice');
      }
       else
      {
        $flashdata=$this->session->set_flashdata('feedback1','storing Failed Try Again!');
        return redirect('Admin/create_invoice');
      }
    }
    else
    {
      
      return redirect('Admin/create_invoice');
    }
 }
// For printing invoice--------------------------
public function print_invoice($ph_no,$date,$no_invoice_day)
{
  
 $data1=$this->adminmodel->get_customer($ph_no);
 $data2=$this->adminmodel->get_invoice($ph_no,$date,$no_invoice_day);
 $data3=$this->adminmodel->get_partial_payment($ph_no,$date,$no_invoice_day);
 $this->load->library('pdf_bill');
 $this->load->view('Admin/getpdf.php',['data3'=>$data3,'data2'=>$data2,'data1'=>$data1]);
}
// For final invoice--------------------------
public function print_final_invoice($ph_no,$date,$no_invoice_day)
{
  
 $data1=$this->adminmodel->get_customer($ph_no);
 $data2=$this->adminmodel->get_invoice($ph_no,$date,$no_invoice_day);
 $data3=$this->adminmodel->get_partial_payment($ph_no,$date,$no_invoice_day);
 $this->load->library('pdf_bill');
 $this->load->view('Admin/getpdf_final.php',['data3'=>$data3,'data2'=>$data2,'data1'=>$data1]);
}

//Modify Invoice view call------------------------

public function modify_invoice_call()
{
    $this->load->helper('form');
 $this->load->view('Admin/modify_invoice_view.php');
}
// search for modify invoice------------------------------------------------------------------------------
public function search_partial_payment_by_ph_no()
{
  if($this->input->post())
  {
    $flag=0;
    $ph_no=$this->input->post('ph_no');
    $date=$this->input->post('date');
     
    if($ph_no!=null)
    {
        $flag=1; // only ph number 
        if($date!=null)
        {
            $flag=2;    // 2 for all  
        }
    }
    if($date!=null)
    {
        $flag=3; // only date 
    }
    
     
    if($this->adminmodel->verify_customer($ph_no) || $date!=null)
    {
        $res=$this->adminmodel->get_all_partial_payment_details($ph_no,$date,$flag);


        $res1=$this->adminmodel->get_invoice_in_day($ph_no,$date,$flag);
        $this->session->set_flashdata(['result'=>$res,'result1'=>$res1]);
        return redirect('Admin/modify_invoice_call');
    }
    else
    {
      $flashdata=$this->session->set_flashdata('feedback1','No such customer!');
       return redirect('Admin/modify_invoice_call');
    }
  }
  else
  {
    return redirect('admin/modify_invoice_call');
  }
}
// Add remaining blance--------------------------
public function set_edit_remained_blance()
{
  if($this->input->post())
  {
     $rem_payment=$this->input->post('rem_payment');
     if($rem_payment==NULL)
     {
       $rem_payment=0;
     }

     if(!is_numeric($rem_payment))
     {
        $this->session->set_flashdata('feedback1','Payment Cancelled!! Payment Must Be As A Numeric Value!');
       return redirect('Admin/modify_invoice_call');
     }
     $ph_no=$this->input->post('ph_no');
     $date=$this->input->post('date');
     $no_invoice_day=$this->input->post('no_invoice_day');
     $total=$this->input->post('total');
     $payment=$this->input->post('payment');
      $now=$total-($payment+$rem_payment);
      $total_payment=$payment+$rem_payment;
      $q=0;
      if($now==0)
        $q=1;
     if($now<0)
     {
      $this->session->set_flashdata('feedback1','Can\'t add payment because giving payment more than remaining!');
       return redirect('Admin/modify_invoice_call');
     }
     else
     {
        date_default_timezone_set("Asia/kolkata");
        $date1=date('d-m-Y');
         
        // testing sucessful---
        $max_no_invoice_day=$this->adminmodel->get_no_invoice_day($ph_no,$date1);
        if($this->adminmodel->set_partial_payment($ph_no,$date,$no_invoice_day,$total_payment,$max_no_invoice_day))
        {
          $this->adminmodel->set_invoice_payment($ph_no,$date,$no_invoice_day,$total_payment,$q,$max_no_invoice_day);
           $this->session->set_flashdata(['feedback2'=>'Successfully Payment Completed','ph_no'=>$ph_no,'date'=>$date1,'no_invoice_day'=>$max_no_invoice_day]);
          return redirect('Admin/modify_invoice_call');
        }
        else
        {
          exit("PROBLEM OCCURED");
        }
     }
  }
  else
  {
    return redirect('admin/modify_invoice_call');
  }
}
//+++++++++++++++++++++++++++++++++ End Of Partial payment Logic ++++++++++++++++++++++++++++++




public function print_chalan($gst_no,$date)
{
 if($gst_no=='27AACCB8955A1ZR'){
  $add_data=['gst_no'=>$gst_no,'date'=>$date];
  $this->session->set_flashdata('add_data',$add_data);
  return redirect('Admin/Bhawani_Gold_chalan');
}

if($gst_no=='19AFTPP2385R1Z5'){
 $add_data=['gst_no'=>$gst_no,'date'=>$date];
 $this->session->set_flashdata('add_data',$add_data);
 return redirect('Admin/HP_chalan');
}

 
$data1=$this->adminmodel->get_customer($gst_no);
$data2=$this->adminmodel->get_invoice($gst_no,$date,1);
$this->load->library('pdf_bill');
$this->load->view('Admin/chalanpdf.php',['data2'=>$data2,'data1'=>$data1]); 
}

public function Bhawani_Gold_chalan()
{
 $add_data=$this->session->flashdata('add_data');
 $gst_no=$add_data['gst_no'];
 $date=$add_data['date'];
  
 $data1=$this->adminmodel->get_customer($gst_no);
 $data2=$this->adminmodel->get_invoice($gst_no,$date,1);
 $this->load->library('pdf_bill');
 $this->load->view('Admin/bhwanigoldchalanpdf.php',['data2'=>$data2,'data1'=>$data1]); 
}

public function HP_chalan()
{
 $add_data=$this->session->flashdata('add_data');
 $gst_no=$add_data['gst_no'];
 $date=$add_data['date'];
  
 $data1=$this->adminmodel->get_customer($gst_no);
 $data2=$this->adminmodel->get_invoice($gst_no,$date,1);
 $this->load->library('pdf_bill');
 $this->load->view('Admin/hpchalanpdf.php',['data2'=>$data2,'data1'=>$data1]); 
}

public function HP_invoice()
{
 $add_data=$this->session->flashdata('add_data');
 $gst_no=$add_data['gst_no'];
 $date=$add_data['date'];
  
 $data1=$this->adminmodel->get_customer($gst_no);
 $data2=$this->adminmodel->get_invoice($gst_no,$date,1);
 $this->load->library('pdf_bill');
 $this->load->view('Admin/hpinvoicepdf.php',['data2'=>$data2,'data1'=>$data1]); 
}

// Get the invoice of particular person on specific date








// for customer details view get
public function customer_details()
{
 $this->load->helper('form');

 $this->load->view('Admin/customer');
}





//+++++++++++++++++++++++++++++++++ Start of customer details logic ++++++++++++++++++++++++++++++
// for getting the customer details from database----------------
public function search_customer_details()
{
  if($this->input->post())
  {
   $key=$this->input->post('select');
   $value=$this->input->post('search');
   if($key=='Name')
   {
      
     if($this->adminmodel->verify_customer_by_name($value))
     {
       $per_details=$this->adminmodel->get_customer_by_name($value);
       $this->load->helper('form');
       $invoice_details=$this->adminmodel->get_invoice_by_name($value);
       $this->session->set_flashdata(['per_details'=>$per_details,'invoice_details'=>$invoice_details]);
     //  $this->load->view('Admin/customer');
       return redirect('Admin/customer_details');

     }
     else
     {
      $flashdata=$this->session->set_flashdata('feedback1','No Customer Found  with this name!!');
      return redirect('Admin/customer_details');
    }
  }
  if($key=='Ph No')
  {
    
   if($this->adminmodel->verify_customer($value))
   {
     $per_details=$this->adminmodel->get_customer_by_ph($value);
     $this->load->helper('form');
     $invoice_details=$this->adminmodel->get_invoice_by_ph($value);
     $this->session->set_flashdata(['per_details'=>$per_details,'invoice_details'=>$invoice_details]);
     // $this->load->view('Admin/customer');
     return redirect('Admin/customer_details');
   }
   else
   {
    $flashdata=$this->session->set_flashdata('feedback1','No Customer Found  with this Ph No!!');
    return redirect('Admin/customer_details');
  }
}
if($key=='Date')
{
  $form=$this->input->post('search');
  $to=$this->input->post('to');
  $form=date_create($form);
  $to=date_create($to);
  $time1=date_diff(date_create('04-09-2017'),$form);
  $time2=date_diff(date_create('04-09-2017'),$to);

  $time1_diff=$time1->format('%R%a');
  $time2_diff=$time2->format('%R%a');
  if($time1_diff<0 ||$time2_diff<0)
  {
    $flashdata=$this->session->set_flashdata('feedback1','Your billing system start from 04-09-2017. Can\'t get any invoice before 04-09-2017!! ');
    return redirect('Admin/customer_details');
  }
  if($time1_diff>$time2_diff)
  {
    $flashdata=$this->session->set_flashdata('feedback1','You first date input must be small than second date input!! ');
    return redirect('Admin/customer_details');
  }
   
  $per_details=$this->adminmodel->get_All_customer();
  $this->load->helper('form');
  $invoice_details=$this->adminmodel->get_All_invoice_using_date($time1_diff,$time2_diff);

  $this->session->set_flashdata(['per_details'=>$per_details,'invoice_details'=>$invoice_details]);
  //$this->load->view('Admin/customer');
   return redirect('Admin/customer_details');
  
}
if($key=='All')
{
  
 $per_details=$this->adminmodel->get_All_customer();
 $this->load->helper('form');
 $invoice_details=$this->adminmodel->get_All_invoice();
 $this->session->set_flashdata(['per_details'=>$per_details,'invoice_details'=>$invoice_details]);
 // $this->load->view('Admin/customer');
 return redirect('Admin/customer_details');
}
}
else
{
  $this->load->helper('form');
  $this->load->view('Admin/customer');
}
}

// For Editing personal details------------------
public function set_edit()
{
  if($this->input->post())
  {
   $ph_no=$this->input->post('ph_no');
   $customer_name=$this->input->post('customer_name');
   $address=$this->input->post('address');
   $customer_gst=$this->input->post('customer_gstin');

   $data=['customer_name'=>$customer_name,'address'=>$address,'customer_gstin'=>$customer_gst];
    
   if($this->adminmodel->update_per_details($data,$ph_no))
   {
     $this->session->set_flashdata('feedback3','Personal Details updated');
     return redirect('admin/customer_details');
   }
   else
   {
    $this->session->set_flashdata('feedback2','Personal Details Can\'t updated Try Again!!');
    return redirect('admin/customer_details');
  }
}
else
{
  return redirect('admin/customer_details');
  
}
}
//+++++++++++++++++++++++++++++++++ End Of Customer Details Logic ++++++++++++++++++++++++++++++
// get vendor azax
    
    public function back_vendor()
    {
        if($this->input->post())
   {
    // echo "FROM ADMIN ".$this->input->post('val');
     $val=strtolower($this->input->post('val'));
       
      $res=$this->adminmodel->get_hints_for_vendor($val);
      // print_r($res);
      $c='<ul style="list-style-type:none" class="hints_list">';
      for($i=0;$i<count($res);$i++)
      {
        $c.='<li onclick="fun_need('."'".$res[$i]."'".')">'.$res[$i].'</li>';
      }
      $c.='</ul>';
      echo $c;
   }
   else
   {
     return redirect('create_invoice');
   }
    }
    // get employee azax
    
    public function back_employee()
    {
        if($this->input->post())
   {
    // echo "FROM ADMIN ".$this->input->post('val');
     $val=strtolower($this->input->post('val'));
       
      $res=$this->adminmodel->get_hints_for_employee($val);
      // print_r($res);
      $c='<ul style="list-style-type:none" class="hints_list">';
      for($i=0;$i<count($res);$i++)
      {
        $c.='<li onclick="fun_need('."'".$res[$i]."'".')">'.$res[$i].'</li>';
      }
      $c.='</ul>';
      echo $c;
   }
   else
   {
     return redirect('create_invoice');
   }
    }
// ++++++++++++++++++++++++Show Hints++++++++++++++++++++++++++++
 public function back()
 {
   if($this->input->post())
   {
    // echo "FROM ADMIN ".$this->input->post('val');
     $val=strtolower($this->input->post('val'));
       
      $res=$this->adminmodel->get_hints($val);
      // print_r($res);
      $c='<ul style="list-style-type:none" class="hints_list">';
      for($i=0;$i<count($res);$i++)
      {
        $c.='<li onclick="fun_need('."'".$res[$i]."'".')">'.$res[$i].'</li>';
      }
      $c.='</ul>';
      echo $c;
   }
   else
   {
     return redirect('create_invoice');
   }
 }
// +++++++++++++++++++++++End Of Show Hints++++++++++++++++++++++
    //++++ parches product //
    
 public function parches_product()
 {
 $this->load->helper('form');
 $ProductDetails = $this->adminmodel->get_products("0");
 $VendorDetails = $this->adminmodel->get_vendor_details('');
 $this->load->view('Admin/parches_view',['ProductDetails'=>$ProductDetails,'VendorDetails'=>$VendorDetails]);
 }   
    
 public function ParchesProduct()
 {
 $this->load->helper('form');
      $this->load->library('form_validation');
        if($this->form_validation->run('add_parches_product_rules')){
            $data=$this->input->post();
           if($this->adminmodel->add_product_parches($data))
            {
                $flashdata=$this->session->set_flashdata('feedback1','Success fully enter');
                return redirect('Admin/parches_product');
            }
           
         }
 return redirect('Admin/parches_product');
 }    
    

    // report function 
    public function tax_report()
    {
        $this->load->helper('form');
        
        if($this->input->post()){
        $frm_date= date("d-m-Y", strtotime($this->input->post('from_date')));
        $to_date= date("d-m-Y", strtotime($this->input->post('to_date')));
        
        
        $data_inv=$this->adminmodel->get_invoice_date($frm_date,$to_date);
            $this->load->view('Admin/rpt_tax',['InvoiceDetails'=>$data_inv,'frm_date'=>$frm_date,'to_date'=>$to_date]);
        }else{
        $this->load->view('Admin/rpt_tax');}
        
    }
    
public function vendor_report()
{
 $this->load->helper('form');
 $VendorDetails = $this->adminmodel->get_vendor_details('');
    if($this->input->post()){
        $vendor_id=$this->input->post('vender');
        $rptDetails = $this->adminmodel->get_rpt_vendor($vendor_id);
        $this->load->view('Admin/rpt_vendor',['VendorDetails'=>$VendorDetails,'rpt_vendor'=>$rptDetails]);
        }
    else
    {
        $this->load->view('Admin/rpt_vendor',['VendorDetails'=>$VendorDetails]);
    }
}    
public function employee_add_view() {
   $this->load->helper('form');
 
    if($this->input->post()){
        $emp_name=$this->input->post('product_name0');
        $get_employee_details = $this->adminmodel->get_employee_details($emp_name);
        $this->load->view('Admin/emp_add_edit_view',['get_employee_details'=>$get_employee_details]);
        }
    else
    {$get_employee_details = $this->adminmodel->get_employee_details('');
        $this->load->view('Admin/emp_add_edit_view',['get_employee_details'=>$get_employee_details]);
    }  
    }
    
    public function AddEmployee()
    {
        $this->load->view('Admin/add_employee');
    }
 public function add_employee()
 {
      $this->load->helper('form');
      $this->load->library('form_validation');
     
      if($this->form_validation->run('add_employee_rules'))
      {
      $data=$this->input->post();
      if($this->adminmodel->add_employee($data))
      {
              $flashdata=$this->session->set_flashdata('feedback1','Employee Add Succesfully done!');
                return redirect('Admin/employee_add_view');
      } 
      }
      else
      {
            $this->load->view('Admin/add_employee');
        } 
 } 
    
    
    public function edit_employee_details()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        if($this->load->helper('form')){
            $data=$this->input->post();
            if($this->adminmodel->edit_employee($data))
            {
                $flashdata=$this->session->set_flashdata('feedback1','Update Succesfully Done');
                return redirect('Admin/employee_add_view');
            }
            
         }
        else
        {
            $this->session->set_flashdata('feedback2','Can\'t submit
                      Without giving required Value !!');
                    return redirect('Admin/AddEmployee');
        }
    }
    public function employee_salery()
    {   $getSaleryDetails=[];
        $emp_id='';
     if($this->input->post())
        {
            $emp_id=$this->input->post('employee_id');
            $getSaleryDetails=$this->adminmodel->getSaleryDetails($emp_id);
        }
        $getEmployee = $this->adminmodel->get_employee_details('');
        $this->load->view('Admin/salery_employee',['getEmployee'=>$getEmployee,'getSaleryDetails'=>$getSaleryDetails,'emp_id'=>$emp_id]);
        
    }
    public function PaySalery()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $getEmployee = $this->adminmodel->get_employee_details('');
        
        if($this->form_validation->run('add_salery_rules')){
            $data=$this->input->post();
            if($this->adminmodel->add_salery($data))
            {
                $flashdata=$this->session->set_flashdata('feedback2','Payment Succesfully Done');
                return redirect('Admin/employee_salery');
            }
            
         }
        else
        {
             $this->load->view('Admin/salery_pay',['getEmployee'=>$getEmployee]);
        }
    }
    
    public function edit_salery_amount()
    {
        $payment_amount=$this->input->post('payment_amount');
        $getEmployee = $this->adminmodel->get_employee_details('');
        $salery_id=$this->input->post('salery_id');
        if($payment_amount!='')
        {
            $this->adminmodel->edit_emp_salery($payment_amount,$salery_id);
            $flashdata=$this->session->set_flashdata('feedback2','Payment Update Succesfully Done');
            return redirect('Admin/employee_salery');
        }
        else
        {
            $flashdata=$this->session->set_flashdata('feedback1','Not Update!tray again');
             $this->load->view('Admin/salery_pay',['getEmployee'=>$getEmployee]);
        }
        
    }
    
    // report profit vand loss
    public function report_profit_loss()
    { 
        $this->load->helper('form');
        if($this->input->post())
        {
        $frm_date= date("d-m-Y", strtotime($this->input->post('from_date')));
        $to_date= date("d-m-Y", strtotime($this->input->post('to_date')));
        $getResultProfitorloss=$this->adminmodel->get_profit_loss_data($frm_date,$to_date);
            $this->load->view('Admin/rpt_profit_loss',['GetProfitAndLoss'=>$getResultProfitorloss,'frm_date'=>$frm_date,'to_date'=>$to_date]);
        }
        else
        {
            $this->load->view('Admin/rpt_profit_loss');
        }
        
    }
   /* select 'purchase' as type ,sum(a.pay_amount) as pay_amount ,sum(a.amount) as total_amount from parches a where date_format(date, '%d-%m-%Y') between '09-08-2017' and '19-10-2017' UNION SELECT 'sales' as type,sum(b.grand_total_not_gst) as pay_amount,sum(b.payment)as total_amount FROM invoice b where date between '09-08-2017' and '19-10-2017' UNION SELECT 'Employee Salery Details' as type,sum(c.payment_amount) as pay_amount ,'0' as total_amount FROM employee_salery_details c WHERE date_format(c.date_of_payment, '%d-%m-%Y') between '09-08-2017' and '19-10-2017'*/
    
    
}
?>