<?php
   class My_Controller extends CI_Controller{
      function construct(){
           parent::_construct();
           if(!$this->session->userdata('user_id'))
            return redirect('login');

      }
   }
?>