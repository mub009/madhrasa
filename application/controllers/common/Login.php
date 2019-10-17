<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends MY_Controller
{
    
     /**
     * Set const value in  tbl_vendor;
     * @var string const 
     */

    const  tbl_address='tbl_address';

    
    public $data=array();
    
    public function __construct()
    {
        parent::__construct();

        // $this->load->model("online/backend/common/Login_Modal", 'Login_Modal');

    }

    public function index()
    {
      

    // echo "there site is under maintance... please visit again few hours later";
    
    // die();    
    
  
        $this->data['country']=$this->Location_Model->country();

        $this->load->view('common/login2',$this->data);
      

    }

    public function logout()
    {

        $this->session->sess_destroy();

        redirect('common/login');

    }





    public function action()
    {

        
        $this->form_validation->set_rules('MobileNo', 'MobileNo', 'required');

        $this->form_validation->set_rules('password', 'Password', 'required');

        $this->form_validation->set_error_delimiters('<div class="alert alert-danger display-show">
                    <button class="close" data-close="alert"></button>', '</div>');


                  

        if ($this->form_validation->run() == true) {

            $email_exists = $this->Login_Modal->login($this->input->post('MobileNo'));

       

            if ($email_exists == true) {

                $login = password_verify($this->input->post('password'), $email_exists['Password']);

                if ($login) {

                    
                    if ($email_exists['StatusId'] == 1) {

                        
                    
                        $logged_in_sess = array('userId'=>$email_exists['UserId']);

                        $this->session->set_userdata(array('token' => $this->authorization_token->GenerateToken($logged_in_sess,$this->config->item('web_token_key'),$this->config->item('web_jwt_algorithm'))));

                        if ($email_exists['UserMasterId'] == 1) {

                           
                            redirect('backend/admin/dashboard', 'refresh');
                        
                        } elseif ($email_exists['UserMasterId'] == 2) {

                            redirect('backend/mahal/dashboard', 'refresh');

                        } elseif ($email_exists['UserMasterId'] == 3) {
                          
                            redirect('backend/madhrasa/dashboard', 'refresh');
                           
                        } 

                    } else {
                        //

                        if ($email_exists['StatusId'] == 2) {

                            $this->data['errors'] = 'Your Account is Pending';

                            $this->load->view('common/login', $this->data);

                        } elseif ($email_exists['StatusId'] == 3) {

                            $this->data['errors'] = 'Your Account was Deleted';

                            $this->load->view('common/login', $this->data);

                        } elseif ($email_exists['StatusId'] == 4) {

                            $this->data['errors'] = 'Your Account is Blocked';

                            $this->load->view('common/login', $this->data);

                        } elseif ($email_exists['OtpVerification'] == '2') {
                            $this->data['errors'] = 'Please Active Your Account';

                            $this->load->view('common/login', $this->data);

                        }
                    }

                } else {

                    $this->data['errors'] = 'Incorrect username/password combination';
                    $this->load->view('common/login2', $this->data);
                }
            } else {

                $this->data['errors'] = 'Account does not exists';

            $this->index();            }
        } else {
            // false case
            $this->index();
        }

    }
   
}
