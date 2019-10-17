<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Settings extends Madhrasa_Controller
{

    public function index()
    {

        $this->data['title_nav_bar'] = array('home' => 'admin/dashboard');

        $this->data['title'] = 'settings';

        //$this->template('user/test',$this->data);

        // $this->load->view('backend/admin/settings');

        $this->template('settings', $this->data);

    }
  



}
