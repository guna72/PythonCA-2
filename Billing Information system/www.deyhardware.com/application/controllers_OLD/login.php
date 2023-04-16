<?php class Login extends MY_Controller{


    public function __construct()
    {
        parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
        $this->load->helper('form');
	}
    
	public function index(){
		if($this->session->userdata('user_id'))
			return redirect('admin/create_invoice');
		else
		{

			
			$this->load->view('User/user_login');
		}
	}
    
    
	public function user_login(){
		if($this->input->post()){
			$this->load->library('form_validation');
			if($this->form_validation->run('login_rules')){
				$username=$this->input->post('username');
				$password=$this->input->post('password');
				$this->load->model('adminmodel');
				
				if($this->adminmodel->login_valid($username,$password)){
					$user_id=$this->adminmodel->login_valid($username,$password);
					$this->session->set_userdata('user_id',$user_id);
                    foreach ($user_id as $usr_data){
                        $id= $usr_data['user_id'];
                        }
                    $this->session->set_userdata('role_id',$id);
					return redirect('admin/create_invoice');
				}
				else
				{
					$flashdata=$this->session->set_flashdata('feedback',' Incorrect Username or Password');
					$this->load->view('User/user_login');

				}
				
			}
			else{
				$this->load->view('User/user_login');
				
			}
		}
		else{
			return redirect('login');
		}
	}
}
?>