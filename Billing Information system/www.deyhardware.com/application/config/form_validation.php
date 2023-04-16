<?php 
$config=[
        'login_rules' => [ 

                            [ 
                              'field'=> 'username',
                              'label'=> '*username',
                              'rules'=> 'required|alpha_numeric'
                            ],

                             [
                               'field'=>'password',
                               'label'=>'*password',
                               'rules'=>'required|alpha_dash'
                             ]

                         ],
      'change_password_rules'=> [
                                   [ 
                                     'field'=> 'cpword',
                                     'label'=> '*Current Password',
                                     'rules'=> 'required|alpha_dash'
                                   ], 
                                   [
                                      'field'=> 'npword',
                                     'label'=> '*New Password',
                                     'rules'=> 'required|alpha_dash'
                                   ],
                                   [
                                      'field'=> 'rnpword',
                                     'label'=> '*Retype New Password',
                                     'rules'=> 'required|alpha_dash'
                                   ]
                                ],

    'add_customer_rules'=> [
                                   
                                   [ 
                                     'field'=> 'customer_name',
                                     'label'=> '*Customer Name',
                                     'rules'=> 'required'
                                   ], 
                                   [
                                      'field'=> 'address',
                                     'label'=> '*Address',
                                     'rules'=> ''
                                   ],
                                   [
                                      'field'=> 'ph_no',
                                     'label'=> '*Phone No',
                                     'rules'=> 'numeric|max_length[10]|required'
                                   ]
                                ],

      'gold_buy_rules'=>        [
                                   [
                                      'field'=> 'ph_no',
                                     'label'=> 'Phone No',
                                     'rules'=> 'required|numeric|max_length[10]'
                                   ],
                                   [
                                      'field'=> 'raw_gold',
                                     'label'=> 'Gold',
                                     'rules'=> 'required|numeric|max_length[10]'
                                   ],
                                   [
                                      'field'=> 'raw_gold_total_cost',
                                     'label'=> 'Total Amount',
                                     'rules'=> 'required|numeric|max_length[20]'
                                   ],
                                   [
                                      'field'=> 'tax_rate',
                                     'label'=> 'Tax Rate',
                                     'rules'=> 'required|numeric|max_length[2]'
                                   ],
                                   [
                                      'field'=> 'raw_gold_cost_given',
                                     'label'=> 'Given Cost',
                                     'rules'=> 'required|numeric|max_length[20]'
                                   ]
                                ],

          "invoice_rules"=>     [
                                    [
                                      'field'=> 'ph_no',
                                     'label'=> '*ph_no',
                                     'rules'=> 'required|numeric|max_length[10]'
                                   ],
                                   
                                   [
                                      'field'=> 'product_name0',
                                     'label'=> '*Product Name',
                                     'rules'=> 'required'
                                   ],
                                   [
                                      'field'=> 'cgst0',
                                     'label'=> '*CGST',
                                     'rules'=> 'numeric|max_length[20]'
                                   ],
                                   [
                                      'field'=> 'sgst0',
                                     'label'=> '*SGST',
                                     'rules'=> 'numeric|max_length[20]'
                                   ]
                                   ,
                                   [
                                      'field'=> 'igst0',
                                     'label'=> '*IGST',
                                     'rules'=> 'numeric|max_length[20]'
                                   ],
                                   [
                                     'field'=> 'qnty0',
                                     'label'=> '*QUENTITY',
                                     'rules'=> 'required'
                                   ]
              

                                ],
        "add_product_rules"=>[
                                  [
                                     'field'=> 'product_code',
                                     'label'=> '*PRODUCT CODE',
                                     'rules'=> 'required'
                                   ],
                                   [
                                     'field'=> 'product_name',
                                     'label'=> '*Product Name',
                                     'rules'=> 'required'
                                   ],
                                   [
                                     'field'=> 'mrp',
                                     'label'=> '*NRP',
                                     'rules'=> 'required|numeric'
                                   ]
                             ],
    "add_vendor_rules"=>[
                                   [
                                     'field'=> 'vendor_name',
                                     'label'=> '*Vendor Name',
                                     'rules'=> 'required'
                                   ],
                                   [
                                     'field'=> 'bank_name',
                                     'label'=> '*Product Name',
                                     'rules'=> 'required'
                                   ],
                                   [
                                     'field'=> 'account_no',
                                     'label'=> '*Account No',
                                     'rules'=> 'required|numeric'
                                   ],
                                   [
                                     'field'=> 'ifsc_code',
                                     'label'=> '*IFSC code',
                                     'rules'=> 'required|alpha_numeric'
                                   ],
                                   [
                                     'field'=> 'bank_address',
                                     'label'=> '*Bank Address',
                                     'rules'=> 'required'
                                   ]
                        ],
    "add_parches_product_rules"=>[
                                   
                                   [
                                     'field'=> 'vender_id',
                                     'label'=> '*Vendor Name',
                                     'rules'=> 'required'
                                   ],
                                   [
                                     'field'=> 'amount',
                                     'label'=> '*Amount',
                                     'rules'=> 'required|alpha_numeric'
                                   ],[
                                     'field'=> 'invoice_no',
                                     'label'=> '* Invoice No',
                                     'rules'=> 'required'
                                   ],
                                    [
                                     'field'=> 'invoice_dt',
                                     'label'=> '* invoice_dto',
                                     'rules'=> 'required'
                                   ]
        
        
        
                                ],
     "add_employee_rules"=>[
                                    [
                                     'field'=> 'employee_name',
                                     'label'=> '*Employee Name',
                                     'rules'=> 'required'
                                   ],
                                   [
                                     'field'=> 'age',
                                     'label'=> '*Age',
                                     'rules'=> 'required'
                                   ],
                                   [
                                     'field'=> 'mobile_no',
                                     'label'=> '*MOBILE No',
                                     'rules'=> 'required|numeric'
                                   ],
                                   [
                                     'field'=> 'email_id',
                                     'label'=> '*Email',
                                     'rules'=> 'required'
                                   ],
                                   [
                                     'field'=> 'reg_date',
                                     'label'=> '* Reg Date',
                                     'rules'=> 'required'
                                   ]
        
        
                                ],
     "add_salery_rules"=>[
                                    [
                                     'field'=> 'employee_id',
                                     'label'=> '*Employee Name',
                                     'rules'=> 'required'
                                   ],
                                   [
                                     'field'=> 'pay_date',
                                     'label'=> '*Date',
                                     'rules'=> 'required'
                                   ],
                                   [
                                     'field'=> 'pay_amount',
                                     'label'=> '* Amount',
                                     'rules'=> 'required'
                                   ]
                                ],
     "purches_payment_ruls"=>[
                                    [
                                     'field'=> 'cheque_no',
                                     'label'=> '*cheque_no',
                                     'rules'=> 'required'
                                   ],
                                   [
                                     'field'=> 'invoice_name',
                                     'label'=> '*invoice name',
                                     'rules'=> 'required'
                                   ],
                                   [
                                     'field'=> 'amount_pay',
                                     'label'=> '* Amount',
                                     'rules'=> 'required'
                                   ],
                                   [
                                     'field'=> 'payment_date',
                                     'label'=> '* payment_date',
                                     'rules'=> 'required'
                                   ]
                                ]


];
?>