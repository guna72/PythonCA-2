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
   public function get_hints($val,$prd_type_id)
   {
       
     $arr=[];
     if($val==NULL)
    {
      return $arr;
    }
    else
    {
     $q="SELECT * FROM product where prdoduct_cat_id=$prd_type_id";
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
                                              'bank_name'=>$data['bank_name'],'account_no'=>$data['account_no'],'bank_address'=>$data['bank_address'],'ifsc_code'=>$data['ifsc_code']]);
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
                                              'bank_name'=>$data['bank_name'],'account_no'=>$data['account_no'],'bank_address'=>$data['bank_address'],'ifsc_code'=>$data['ifsc_code']]);
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
public function add_product($product_name,$sac,$mrp,$discount,$count,$purches_amount,$product_type)
{
   $query1=$this->db->insert('product',['product_name'=>$product_name,'sac'=>$sac,'mrp'=>$mrp,'discount'=>$discount,'count'=>$count,'purches_amount'=>$purches_amount,'prdoduct_cat_id'=>$product_type]);
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
public function getProductPrice($sac)
{
  $q=$this->db->where(['sac'=>$sac])
              ->get('product');
    if($this->db->affected_rows())
    {
      return $q->row();
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
public function get_productsss($product_name)
{
    if($product_name=='0'){
  $q=$this->db->get('product');
  return $q->result();}
    else{
        $q=$this->db->where(['sac'=>$product_name])
               ->get('product');
        return $q->result();
        }
}
      
      public function get_products($product_name,$product_type)
{
    if($product_name=='0')
    {
        if($product_type!='0'){
            $q=$this->db->where(['prdoduct_cat_id'=>$product_type])
               ->get('product');
        return $q->result();
           }else {
  $q=$this->db->get('product');
  return $q->result();
    }}
    else{
        $q=$this->db->where(['sac'=>$product_name])
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
public function get_manage_id($flg)
{
	 $max_chalan_invoice_no=0;
	 $query ="SELECT * FROM manege_id WHERE id=1";
     $res=$this->db->query($query);
     $p=$res->result();
     $i=0;
     if($this->db->affected_rows())
     {
        foreach ($p as $row ) {
			if($flg==0)
			{
				$max_chalan_invoice_no=$row->max_chalan_id+1;
			}
			else
			{
				$max_chalan_invoice_no=$row->max_invoice_id+1;
			}
		}
		return $max_chalan_invoice_no;
	 }
 }


public function add_invoice($data,$active,$x)
{
	$flag_chalan =0;
	$flag_invoice =0;
	$flg=0;
	$flg_value=0;
	$invoice_id =0;
  if($active==0)
  {    
    $flag_chalan = $this->get_manage_id(0); // chalan no
	  $flg_value=$flag_chalan;
  }
  else
  {
	  $flag_invoice = $this->get_manage_id(1); // invoice no
	  $flg_value=$flag_invoice;
	  $flg=1;
  }  
  $query1=$this->db->insert_batch('invoice',$data);
  //$query1=$this->db->insert('invoice',$data);
  $invoice_id =$this->db->insert_id();
  while ( $x !=-1)
  {
	  $q="UPDATE invoice SET con_invoice_no = $flag_invoice where invoice_no=$invoice_id";
	   $query_result = $this->db->query($q);
	  $invoice_id++;
	  $x--;
 
  }
  
 // if($this->db->affected_rows())
	 if($x==-1)
  {
	$flg111=$this->update_manage_id($flg,$flg_value);
    return $invoice_id;
  } 
  else { 
    return $invoice_id;
	} 
}
public function update_manage_id($flg,$value)
{
	if($flg==0)
	{
		$q="UPDATE manege_id SET max_chalan_id = $value where id=1";
	}
	else
	{
		$q="UPDATE manege_id SET max_invoice_id = $value where id=1";
	}
    $query_result = $this->db->query($q);
    if($this->db->affected_rows())
     return TRUE;
    else  
     return FALSE;

}


// Partial payment store on partial_payment table++++++++++++++++++++++++++
public  function partial_payment($data_send,$invoice_id)
{
  $q=$this->db->insert('partial_payment',$data_send);
  $chalan_id =$this->db->insert_id();

  if($this->db->affected_rows())
  {
	$q2="update invoice set con_chanal_no = $chalan_id where invoice_no=$invoice_id"; 
	//echo $q2;
	//die;
	$query_result = $this->db->query($q2);
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
   $cheque_no=0;
   if($q==1)
   {
        $cheque_no =$this->get_manage_id(1); // invoice no
        $data=['con_invoice_no'=>$cheque_no,'payment'=>$total_payment,'date'=>$date1,'active'=>$q,'no_invoice_day'=>$current_max_invoice,'date_diffr'=>$diff->format('%R%a')];
   }
   else
   {
        $data=['payment'=>$total_payment,'date'=>$date1,'active'=>$q,'no_invoice_day'=>$current_max_invoice,'date_diffr'=>$diff->format('%R%a')];
   }
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
  $q="SELECT a.no_invoice_day,a.ph_no,c.customer_name,c.address,a.con_invoice_no,a.con_chanal_no,a.active,a.date,b.total,b.payment 
	    FROM invoice a,partial_payment b,customer c WHERE a.no_invoice_day = b.no_invoice_day and 
		c.customer_name=a.customer_name and a.customer_name = '$customer_name' and b.chalan_no = a.con_chanal_no and a.ph_no = b.ph_no and a.ph_no = c.ph_no
		union select a.no_invoice_day,a.ph_no,c.customer_name,c.address,a.con_invoice_no,a.con_chanal_no,a.active,a.date,0 as total,0 as payment 
		from invoice a,customer c where c.customer_name=a.customer_name and a.ph_no = c.ph_no and a.customer_name = '$customer_name' ";
  //return $q->result();
  echo $q;
  //die();
  $query=$this->db->query($q);
  return $query->result();
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
	/*$q="SELECT * FROM invoice a,partial_payment b,customer c WHERE a.no_invoice_day = b.no_invoice_day and c.customer_name=a.customer_name 
	and a.ph_no = b.ph_no and a.ph_no = c.ph_no and a.ph_no = $ph_no";*/
	
	$q="SELECT a.no_invoice_day,a.ph_no,c.customer_name,c.address,a.con_invoice_no,a.con_chanal_no,
		a.active,a.date,b.total,b.payment 
	    FROM invoice a,partial_payment b,customer c WHERE a.no_invoice_day = b.no_invoice_day and 
		c.customer_name=a.customer_name and b.chalan_no = a.con_chanal_no and a.ph_no = b.ph_no 
		and a.ph_no = c.ph_no
		and a.ph_no =$ph_no and a.active=0
		union select a.no_invoice_day,a.ph_no,c.customer_name,c.address,a.con_invoice_no,a.con_chanal_no,
		a.active,a.date, a.payment as total,sum(a.grand_total_not_gst) as payment 
		from invoice a,customer c where c.customer_name=a.customer_name and a.ph_no = c.ph_no and 
		a.ph_no =$ph_no and a.active=1 group by a.con_invoice_no ";
 //exit($q);
 $query=$this->db->query($q);
 
 
 return $query->result();
 
  /* $q=$this->db
  ->where('ph_no',$ph_no)
  ->get('invoice');
  return $q->result(); */
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
		/*$q="SELECT * FROM invoice a,partial_payment b,customer c WHERE a.no_invoice_day = b.no_invoice_day and c.customer_name=a.customer_name 
	and a.ph_no = b.ph_no and a.ph_no = c.ph_no";*/
	
		/*$q="SELECT a.no_invoice_day,a.ph_no,c.customer_name,c.address,a.con_invoice_no,a.con_chanal_no,a.active,a.date,b.total,b.payment 
	    FROM invoice a,partial_payment b,customer c WHERE a.no_invoice_day = b.no_invoice_day and 
		c.customer_name=a.customer_name and b.chalan_no = a.con_chanal_no and a.ph_no = b.ph_no and a.ph_no = c.ph_no
		union select a.no_invoice_day,a.ph_no,c.customer_name,c.address,a.con_invoice_no,a.con_chanal_no,a.active,a.date,0 as total,0 as payment 
		from invoice a,customer c where c.customer_name=a.customer_name and a.ph_no = c.ph_no";*/
    $q="SELECT a.no_invoice_day,a.ph_no,c.customer_name,c.address,a.con_invoice_no,a.con_chanal_no,
		a.active,a.date,b.total,b.payment 
	    FROM invoice a,partial_payment b,customer c WHERE a.no_invoice_day = b.no_invoice_day and 
		c.customer_name=a.customer_name and b.chalan_no = a.con_chanal_no and a.ph_no = b.ph_no 
		and a.ph_no = c.ph_no
		 and a.active=0
		union select a.no_invoice_day,a.ph_no,c.customer_name,c.address,a.con_invoice_no,a.con_chanal_no,
		a.active,a.date, a.payment as total,sum( a.grand_total_not_gst) as payment 
		from invoice a,customer c where c.customer_name=a.customer_name and a.ph_no = c.ph_no and 
		 a.active=1 and a.con_invoice_no>0 group by a.con_invoice_no";

     //exit($q);
 $query=$this->db->query($q);
 
 
 return $query->result();
/*  $q=$this->db->order_by('date desc,ph_no,no_invoice_day asc')
 ->get('invoice');
 return $q->result(); */
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
 //$q="SELECT * FROM invoice p WHERE p.date between '$form' AND '$to'";
 //$q="SELECT * FROM invoice p WHERE p.date between '$form' AND '$to' and con_invoice_no!=0";
 $q="SELECT p.date,p.con_invoice_no,sum(p.grand_total_not_gst) as grand_total_not_gst,p.cgst,p.sgst,p.discount_total FROM invoice p WHERE p.date >= '$form' AND p.date<= '$to' and con_invoice_no!=0 group by con_invoice_no";
   

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
    $query1=$this->db->insert('parches',['vendor_id'=>$data['vender_id'],
                                         'amount'=>$data['amount'],'invoice_date'=>$data['invoice_dt'],'invoice_no'=>$data['invoice_no'],
'payment_status'=>0]);
 
       if($this->db->affected_rows()){
      //$this->update_stock($data['quentity'],$data['product_id']);
     return TRUE;
    }
   
   else{
    return FALSE;
   }
}
      public function check_invoice($data)
       {   
          $q=$this->db->where(['invoice_no'=>$data['invoice_no']])
              ->get('parches');
         if($this->db->affected_rows())
        {
            return 1;
        }
        else
            return 0;
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
       public function getInvoiceamountss($invoice_no)
      {
          $amount=0;
          $q1="SELECT sum(payment_amount) as payment_amount,cheque_no,payment_date FROM parches_payment WHERE invoice_no='$invoice_no' group by invoice_no";
     $res=$this->db->query($q1);
     //$p=$res->result();
     /*if($this->db->affected_rows())
     {
              foreach ($p as $row ) {
              $amount = $row->payment_amount;
                }
                 $query_result = $this->db->query($admin_query);
    $result = $query_result->result_array();
	return $result;
     } */   
        if($this->db->affected_rows())
        {
            return $res->result_array();
        }
        else
        return 0;
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
          
          /*$q="(select 'P' as type ,sum(a.pay_amount) as pay_amount ,sum(a.amount) as total_amount from parches a where date_format(date, '%d-%m-%Y') between '$form' AND '$to') UNION (SELECT 'S' as type,sum(b.grand_total_not_gst) as pay_amount,sum(b.payment)as total_amount FROM invoice b where date between '$form' AND '$to' and b.active=1) UNION (SELECT 'E' as type,sum(c.payment_amount) as pay_amount ,0 as total_amount FROM employee_salery_details c WHERE date_format(c.date_of_payment, '%d-%m-%Y') between '$form' AND '$to')";*/
          $q="(SELECT 'S' as type,sum(b.grand_total_not_gst) as pay_amount,sum(b.payment)as total_amount FROM invoice b where date between '$form' AND '$to' and b.active=1) UNION (SELECT 'E' as type,sum(c.payment_amount) as pay_amount ,0 as total_amount FROM employee_salery_details c WHERE date_format(c.date_of_payment, '%d-%m-%Y') between '$form' AND '$to')";
          $query=$this->db->query($q);
            return $query->result();
          

      }
// get product type 
      public function getProductType()
         { 
          $q=$this->db->get('product_master');
          return $q->result();
          }
      
      
     public function get_invoice_details($val,$vendor_id)
      {
           $arr=[];
     if($val==NULL)
    {
      return $arr;
    }
    else
    {
     $q="SELECT * FROM parches where payment_status=0 and vendor_id=$vendor_id";
	 //echo $q;
     $res=$this->db->query($q);
     $p=$res->result();
     $i=0;
     if($this->db->affected_rows())
     {
		// print_r($p);
		 
        foreach ($p as $row ) {
          if(strpos(strtolower($row->invoice_no),$val)!==FALSE)
          {
            $arr[$i]=$row->invoice_no;
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
      
      
      public function getInvoiceamount($invoice_no)
      {
          $amount=0;
          $q1="SELECT sum(payment_amount) as payment_amount FROM parches_payment WHERE invoice_no='$invoice_no' group by invoice_no";
     $res=$this->db->query($q1);
     $p=$res->result();
     if($this->db->affected_rows())
     {
              foreach ($p as $row ) {
              $amount = $row->payment_amount;
                }
     }    
            $q=$this->db->where(['invoice_no'=>$invoice_no])
              ->get('parches');
        if($this->db->affected_rows())
        {
            return ($q->row()->amount - $amount);
        }
        else
        return -1;
      }  
      
      
      public function savePaymentProduct($data,$flag)
        {  
             $query1=$this->db->insert('parches_payment',['invoice_no'=>$data['invoice_name'],
                                                          'payment_amount'=>$data['amount_pay'],'cheque_no'=>$data['cheque_no'],'payment_date'=>$data['payment_date']]);
          if($this->db->affected_rows()){ 
              if($flag==1)
              {   
                $this->updatePayment($data['invoice_name']);
              }
              return TRUE;
          }
          else  { 
              return FALSE; }   
      
        }  
      
      public function updatePayment($invoice_name){
          $q="UPDATE parches SET payment_status =1 where invoice_no='".$invoice_name."'";
          $query_result = $this->db->query($q);
		        $result=$this->db->affected_rows();
		        if($result)
		        {
			      return TRUE;
		        }
                  else
                  {
			         return FALSE;
		          }
      }
      

}
?>