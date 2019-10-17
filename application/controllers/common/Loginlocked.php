<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Loginlocked extends MY_Controller
{
    

    
    public $data=array();
    
    public function __construct()
    {
        parent::__construct();
    }

    
    public function index()
    {


//  $this->data['personal_info_updation'] = $this->Base_Model->select(self::tbl_admin, '*', array('UserId' => $this->data['user_id']));
        


//         $user=$this->input->cookie('Userinfo',true);

        die();
        $this->load->view('common/Loginlocked');

    }
}