  <?php 
  class Adminmodel extends CI_Model{


    public function login_valid($uname,$pword){
       
      $query=$this->db->select('user_id')
      ->where(['uname'=>$uname,'pword'=>$pword])
      ->get('admin');
    $result = $query->result_array();
	return $result;
      //return $query->num_rows();
    }
    public function new_password_set($cpword,$npword){
     $user_id=$this->session->userdata('user_id');
     $query= $this->db->where(['user_id'=>$user_id,'pword'=>$cpword])
     ->update('admin',['pword'=>$npword]);
     if($this->db->affected_rows()){
       return TRUE;
     }
     else
       return FALSE;

   }
   // Get hints+++++++++++++++++++++++++++++++++++
   public function get_hints($val)
   {

     $arr=[];
     if($val==NULL)
    {
      return $arr;
    }
    else
    {
     $q="SELECT * FROM product";
     $res=$this->db->query($q);
     $p=$res->result();
     $i=0;
     if($this->db->affected_rows())
     {
        foreach ($p as $row ) {
          if(strpos(strtolower($row->sac),$val)!==FALSE)
          {
            $arr[$i]=$row->sac;
            $i++;
          }
        }
        if($i==0)
        {
           $arr[0]="No Suggeston....";

        }
        return $arr;
     }
     
   }
   }
      
      public function get_hints_for_vendor($val)
      {
           $arr=[];
     if($val==NULL)
    {
      return $arr;
    }
    else
    {
     $q="SELECT * FROM vendor";
     $res=$this->db->query($q);
     $p=$res->result();
     $i=0;
     if($this->db->affected_rows())
     {
        foreach ($p as $row ) {
          if(strpos(strtolower($row->vendor_name),$val)!==FALSE)
          {
            $arr[$i]=$row->vendor_name;
            $i++;
          }
        }
        if($i==0)
        {
           $arr[0]="No Suggeston....";

        }
        return $arr;
     }
     
   }
      } 
      
      
      public function get_hints_for_employee($val)
      {
           $arr=[];
     if($val==NULL)
    {
      return $arr;
    }
    else
    {
     $q="SELECT * FROM employee_details";
     $res=$this->db->query($q);
     $p=$res->result();
     $i=0;
     if($this->db->affected_rows())
     {
        foreach ($p as $row ) {
          if(strpos(strtolower($row->name),$val)!==FALSE)
          {
            $arr[$i]=$row->name;
            $i++;
          }
        }
        if($i==0)
        {
           $arr[0]="No Suggeston....";

        }
        return $arr;
     }
     
   }
      }
      
      
      
      // add vendor 
      public function add_vendor($data)
      {
          $query1=$this->db->insert('vendor',['vendor_name'=>$data['vendor_name'],
                                              'bank_name'=>$data['bank_name'],'account_no'=>$data['account_no'],'ifsc_code'=>$data['ifsc_code']]);
          if($this->db->affected_rows())
              return TRUE;
          else  
              return FALSE;
      }
      // edit vendor
      public function edit_vendor($data)
      {
          $q=$this->db->where(['vendor_id'=>$data['vendor_id']])
              ->update('vendor',['vendor_name'=>$data['vendor_name'],
                                              'bank_name'=>$data['bank_name'],'account_no'=>$data['account_no'],'ifsc_code'=>$data['ifsc_code']]);
    if($this->db->affected_rows())
    {
      return TRUE;
    }
    else
    {
      return FALSE;
    }
      }

// Add Customer+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
   public function add_customer_set($customer_name,$address,$ph_no,$customer_gst)
   {
    $query1=$this->db->insert('customer',['customer_name'=>$customer_name,'address'=>$address,'ph_no'=>$ph_no,'customer_gstin'=>$customer_gst]);


    if($this->db->affected_rows())
      
     return TRUE;
   
   else  
    return FALSE;
}

// Get all products++++++++++++++++++++++++++++
public function get_vendor_details($vendor_name)
{
    if($vendor_name!='')
    {
         $q=$this->db->where(['vendor_name'=>$vendor_name])
              ->get('vendor');
    }else
    {
        $q=$this->db->get('vendor');
    }
  
  return $q->result();
}

      
      

// Add Product +++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function add_product($product_name,$sac,$mrp,$discount,$count)
{

   $query1=$this->db->insert('product',['product_name'=>$product_name,'sac'=>$sac,'mrp'=>$mrp,'discount'=>$discount,'count'=>$count]);


    if($this->db->affected_rows())
      
     return TRUE;
   
   else  
    return FALSE;
}

// Verify Product in same sac number already created or not++++++++++++++++++++++++
public function verify_product($sac)
{
  $q=$this->db->where(['sac'=>$sac])
              ->get('product');
    if($this->db->affected_rows())
    {
      return $q->row()->count;
    }
    else
      return -1;
}

// Get old values of product if you submitting a old product for stocking+++++++++

public function old_values_product($sac)
{
  $q=$this->db->where(['sac'=>$sac])
              ->get('product');
      return $q->row();
}

// Add Same Product++++++++++++++++++++++++++++++++++++
public function add_same_product($product_name,$sac,$mrp,$discount,$count)
{
  $q=$this->db->where(['sac'=>$sac])
              ->update('product',['count'=>$count]);
    if($this->db->affected_rows())
    {
      return TRUE;
    }
    else
    {
      return FALSE;
    }
}

// Get all products++++++++++++++++++++++++++++
public function get_products($product_name)
{
    if($product_name=='0'){
  $q=$this->db->get('product');
  return $q->result();}
    else{
        $q=$this->db->where(['product_name'=>$product_name])
               ->get('product');
        return $q->result();
        }
}

// Update product Details+++++++++++++++++++++++++
public function update_product_details($data,$sac)
{
  $q=$this->db->where(['sac'=>$sac])
              ->update('product',$data);
    
      return TRUE;
}


// For Getting Discount of any product++++++++++++++++++++++++++
public function get_discount($product_name)
{
   $q=$this->db->where(['sac'=>$product_name])
               ->get('product');
    return $q->row();
   
}

// Getting customer+++++++++
public function get_customer_details($ph_no)
{
    $q=$this->db->where(['ph_no'=>$ph_no])
                 ->get('customer');
    return $q->row();
}

// Add Invoice details+++++++++++++++++++++++++
public function add_invoice($data)
{
   
  $query1=$this->db->insert_batch('invoice',$data);
  if($this->db->affected_rows())
    return TRUE;
  else  
    return FALSE;
}

// Partial payment store on partial_payment table++++++++++++++++++++++++++
public  function partial_payment($data_send)
{
  $q=$this->db->insert('partial_payment',$data_send);
  if($this->db->affected_rows())
  {
    
    return TRUE;
  }
  else
  {
    return FALSE;
  }
}

// Change total number of product after selling product+++++++++++++++++++++
public function change_no_of_total_product($sac,$qnty)
{
  $q=$this->db->where(['sac'=>$sac])
              ->get('product');
  $count=$q->row()->count;
  if($count==0)
    return -1;
  $q=$this->db->where(['sac'=>$sac])
              ->update('product',['count'=>$count-$qnty]);
    return 0;
}
// max no of invoice in a day till now------------
public function get_no_invoice_day($ph_no,$date)
{
 $q=$this->db->select_max('no_invoice_day')
 ->where(['ph_no'=>$ph_no,'date'=>$date])
 ->get('invoice');
 if($this->db->affected_rows())
 {
  $val=$q->row()->no_invoice_day;
  return ($val+1);
}
}
    

  // customer exist or not verifying using PH_NO+++++++++++++++++++++++++++
public function verify_customer($ph_no)
{
  $q=$this->db
  ->where('ph_no',$ph_no)
  ->get('customer');
  if($this->db->affected_rows())
  {
    return TRUE;
  }
  else
  {
    return FALSE;
  }
}


// Getting customer details using gst_no return as an array ++++++++++++++++
public function get_customer($ph_no)
{
  $q=$this->db
  ->where(['ph_no'=>$ph_no])
  ->get('customer');
  return $q->row();
}

   // Getting invoice on a particular date and ph_no+++++++++++++++++++
public function get_invoice($ph_no,$date,$no_invoice_day)
{
 $q=$this->db->where(['ph_no'=>$ph_no,'date'=>$date,'no_invoice_day'=>$no_invoice_day])
 ->get('invoice');
 return $q->result();
}

// For getting particular users at a time partial payment +++++++++++++++++++++++++++++

public function get_partial_payment($ph_no,$date,$no_invoice_day)
{
   $q=$this->db->where(['ph_no'=>$ph_no,'date'=>$date,'no_invoice_day'=>$no_invoice_day])
               ->get('partial_payment');
    return $q->row();
}
// For getting particular users all partial payment++++++++++++
public function get_all_partial_payment_details($ph_no,$date,$flg)
{
    $sql_sub = "";
if($flg==1)
    {
        $sql_sub= "p.ph_no=$ph_no";
    }
  if($flg==2)
    {
      $sql_sub= "p.ph_no=$ph_no AND p.date='$date'";
    }
    if($flg==3)
    {
        $sql_sub= "p.date='$date'";
    }
        
  $q="SELECT * FROM partial_payment p WHERE $sql_sub AND p.total!=p.payment";

 $query=$this->db->query($q);
   return $query->result();
}

public function get_invoice_in_day($ph_no,$date,$flg)
{
   
    if($flg==1)
       { 
        $q=$this->db->where(['ph_no'=>$ph_no])
              ->get('invoice');
        }
    if($flg==2)
       { 
        $q=$this->db->where(['ph_no'=>$ph_no,'date'=>$date])
              ->get('invoice');
        }
    if($flg==3)
       { 
        $q=$this->db->where(['date'=>$date])
              ->get('invoice');
        }
    return $q->result();
}
 public function set_partial_payment($ph_no,$date,$no_invoice_day,$total_payment,$x)
 {
   date_default_timezone_set("Asia/kolkata");
    $date1=date('d-m-Y');
    
      
    $data=['payment'=>$total_payment,'date'=>$date1,'no_invoice_day'=>$x];
    $q=$this->db->where(['ph_no'=>$ph_no,'no_invoice_day'=>$no_invoice_day,'date'=>$date])
                ->update('partial_payment',$data);
    if($this->db->affected_rows())
    {
      return TRUE;
    }
    else
      return FALSE;
                
 }
public function set_invoice_payment($ph_no,$date,$no_invoice_day,$total_payment,$q,$current_max_invoice)
{
  date_default_timezone_set("Asia/kolkata");
   $date1=date('d-m-Y');
    $form=date_create("04-09-2017");
      $to=date_create($date1);
      $diff=date_diff($form,$to);

  $data=['payment'=>$total_payment,'date'=>$date1,'active'=>$q,'no_invoice_day'=>$current_max_invoice,'date_diffr'=>$diff->format('%R%a')];
    $q=$this->db->where(['ph_no'=>$ph_no,'no_invoice_day'=>$no_invoice_day,'date'=>$date])
                ->update('invoice',$data);
    if($this->db->affected_rows())
    {
      return TRUE;
    }
    else
      return FALSE;
}
// For Customer Details view============================================================================

    // customer exist or not verifying using Name for customer details view +++++++++++++++++++
public function verify_customer_by_name($name)
{
  $q=$this->db
  ->where('customer_name',$name)
  ->get('customer');
  if($this->db->affected_rows())
  {
    return TRUE;
  }
  else
  {
    return FALSE;
  }
}

// Getting customer details using company name for customer details view
public function get_customer_by_name($customer_name)
{
  $q=$this->db
  ->where('customer_name',$customer_name)
  ->get('customer');
  return $q->result();
}
   // Getting invoice details using company name for customer details view
public function get_invoice_by_name($customer_name)
{
  $q=$this->db
  ->where('customer_name',$customer_name)
  ->get('invoice');
  return $q->result();
}
// Getting customer details using gst_no return as an array of objectfor customer details view+++++++
public function get_customer_by_ph($ph_no)
{
  $q=$this->db
  ->where('ph_no',$ph_no)
  ->get('customer');
  return $q->result();
}

 // Getting invoice details using gst_no for customer details view++++++++++++++++++++++
public function get_invoice_by_ph($ph_no)
{
  $q=$this->db
  ->where('ph_no',$ph_no)
  ->get('invoice');
  return $q->result();
}
  // Getting invoice details using gst_no ,date,no_invoice_day for customer details view
public function get_customer_by_gst_no_date_invoice_day($gst_no,$date,$no_invoice_day)
{
  $q=$this->db
  ->where(['gst_no'=>$gst_no,'date'=>$date,'no_invoice_day'=>$no_invoice_day])
  ->get('invoice');
  return $q->result();
}
// Update customer personal details in customer details view+++++++++++++++++++++
public function update_per_details($data,$ph_no)
{
 $q=$this->db->where(['ph_no'=>$ph_no])
 ->update('customer',$data);
   $customer_name=$data['customer_name'];
   $qry=$this->db->where(['ph_no'=>$ph_no])
   ->update('invoice',['customer_name'=>$customer_name]);
   
   return TRUE;
}
// Get All Customer personal details
public function get_All_customer()
{
  $q=$this->db->get('customer');
  return $q->result();
}

// Get All invoice Details
public function get_All_invoice()
{
 $q=$this->db->order_by('date desc,ph_no,no_invoice_day asc')
 ->get('invoice');
 return $q->result();
}

   // Getting invoice details using date
public function get_All_invoice_using_date($form,$to)
{
 $q="SELECT * FROM invoice p WHERE p.date_diffr>='$form' AND p.date_diffr<= '$to'";
    

     //exit($q);
 $query=$this->db->query($q);
 
 
 return $query->result();
 
}

// End Of customer details function for database interaction



  // Getting invoice details using date
public function get_invoice_date($form,$to)
{
 $q="SELECT * FROM invoice p WHERE p.date between '$form' AND '$to'";
    

     //exit($q);
 $query=$this->db->query($q);
 
 
 return $query->result();
 
}





    // getting remaining from raw_gold_table=============================================================
public function get_remaining()
{
  $q=$this->db->where('q',select_max('q'))
  ->get('raw_gold_table');
  if($this->db->affected_rows())
  {
   return $q->row()->remaining;
 }
 else
 {
  return FALSE;
}
}


   // Getting Tax===========================================================================
public function get_tax()
{

  $q=$this->db->where('user_id',$this->session->userdata('user_id'))
  ->get('tax_table');
  return $q->row();
}



// Unset current invoice value======================================================================

public function unset_current()
{
 $data=['current'=>0];
 $q=$this->db->where('current',1)
 ->update('invoice',$data);
 if($this->db->affected_rows())
 {
  return TRUE;
}
else
{
  return FALSE;
}
}

// Add Customer+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
   public function add_product_parches($data)
   {
      
    $query1=$this->db->insert('parches',['vendor_id'=>$data['vender_id'],'product_id'=>$data['product_id'],
                                         'quntity'=>$data['quentity'],'amount'=>$data['amount'],'pay_amount'=>$data['pay_amount'],'invoice_no'=>$data['invoice_no']]);


    if($this->db->affected_rows()){
      $this->update_stock($data['quentity'],$data['product_id']);
     return TRUE;
    }
   
   else  {
    return FALSE;}
}
      public function update_stock($count,$product_id)
      {
            $q="UPDATE product SET count = count + $count where sac='$product_id'";
            $query_result = $this->db->query($q);
		$result=$this->db->affected_rows();
		if($result)
		{
			return(1);
		}else{
			return(0);
		}
		return $result;
      }

public function get_rpt_vendor($vendor_id)
      {
        $q="SELECT * FROM parches WHERE vendor_id='$vendor_id'";

 $query=$this->db->query($q);
 
 
 return $query->result();
      }
      
      
      
      // Get all products++++++++++++++++++++++++++++
public function get_employee_details($employee_name)
{
    if($employee_name!='')
    {
         $q=$this->db->where(['name'=>$employee_name])
              ->get('employee_details');
    }else
    {
        $q=$this->db->get('employee_details');
    }
  
  return $q->result();
}
      
      
      // add employee 
      public function add_employee($data)
      {
         
          $query1=$this->db->insert('employee_details',['name'=>$data['employee_name'],'age'=>$data['age'],'sex'=>$data['gander'],'mobile_no'=>$data['mobile_no'],
                                              'email_id'=>$data['email_id'],'role'=>$data['role'],'reg_date'=>$data['reg_date']]);
          if($this->db->affected_rows())
              return TRUE;
          else  
              return FALSE;
      }
      // edit vendor
      public function edit_employee($data)
      {
          $q=$this->db->where(['employee_id'=>$data['employee_id']])
              ->update('employee_details',['name'=>$data['employee_name'],'age'=>$data['age'],'mobile_no'=>$data['mobile_no'],
                                              'email_id'=>$data['email_id']]);
    if($this->db->affected_rows())
    {
      return TRUE;
    }
    else
    {
      return FALSE;
    }
      }
      
      public function getSaleryDetails($emp_id)
      {
          $this->db->select("employee_salery_details.date_of_payment,employee_salery_details.payment_amount,employee_salery_details.employee_id,employee_salery_details.id,employee_details.name");
  $this->db->from('employee_salery_details');
  $this->db->join('employee_details', 'employee_salery_details.employee_id = employee_details.employee_id');
  $this->db->where(['employee_salery_details.employee_id'=>$emp_id]);
  $query = $this->db->get();
  return $query->result();
          
          
       /*   if($emp_id!='')
          {
              $q=$this->db->where(['employee_id'=>$emp_id])
              ->get('employee_salery_details');
            }
            else
            {
              $q=$this->db->get('employee_salery_details');
            }
  
  return $q->result();*/

      }
      
      public function add_salery($data)
      {
           $query1=$this->db->insert('employee_salery_details',['employee_id'=>$data['employee_id'],
                                              'date_of_payment'=>$data['pay_date'],'payment_amount'=>$data['pay_amount']]);
          if($this->db->affected_rows())
              return TRUE;
          else  
              return FALSE;
      }
      public function edit_emp_salery($pay_amount,$id)
      {
           $q=$this->db->where(['id'=>$id])
              ->update('employee_salery_details',['payment_amount'=>$pay_amount]);
          if($this->db->affected_rows())
          {
            return TRUE;
         }
        else
        {
            return FALSE;
        }
      }
      
      public function get_profit_loss_data($form,$to)
      {
          
          $q="(select 'P' as type ,sum(a.pay_amount) as pay_amount ,sum(a.amount) as total_amount from parches a where date_format(date, '%d-%m-%Y') between '$form' AND '$to') UNION (SELECT 'S' as type,sum(b.grand_total_not_gst) as pay_amount,sum(b.payment)as total_amount FROM invoice b where date between '$form' AND '$to' and b.active=1) UNION (SELECT 'E' as type,sum(c.payment_amount) as pay_amount ,0 as total_amount FROM employee_salery_details c WHERE date_format(c.date_of_payment, '%d-%m-%Y') between '$form' AND '$to')";
          $query=$this->db->query($q);
            return $query->result();
          

      }

      

}
?>