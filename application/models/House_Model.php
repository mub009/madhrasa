<?php

class House_Model extends CI_Model
{

private $queryResource;

    public function __construct()
    {

        parent::__construct();

        $this->load->database();
    

    }



    public function HouseDetails($housId)
    {

        
       $this->db->select('*');

       $this->db->join('tbl_study', 'tbl_study.HouseDetailsId = tbl_house_details.Id', 'join');
       
       $this->queryResource=$this->db->get('tbl_house_details');
       
       return $this->queryResource->row_array();
       
    }

}

?>