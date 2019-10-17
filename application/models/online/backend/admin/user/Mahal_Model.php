<?php

class Mahal_Model extends CI_Model
{

    public function __construct()
    {

        parent::__construct();

        $this->load->database();
    }


  
    public function index($id)
    {

        $this->db->select('*');

        $this->db->where(array('UserTypeId' => $CountryAdminUserTypeId));

        $query = $this->db->get('tbl_settings_country_admin');

        return $query->row_array();

    }

}
