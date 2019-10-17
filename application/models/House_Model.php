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

        
       $this->db->select('tbl_house_details.Id,tbl_house_details.RegNo,tbl_house_details.Name,tbl_house_details.Address,tbl_house_details.WardNo,tbl_house_details.HouseNo,tbl_house_details.MobNo,tbl_house_details.WhatsappNo,tbl_house_details.Occupation,tbl_house_details.Feedback,tbl_house_details.NoOfMembers,`tbl_study`.`is_Study`,`tbl_study`.`NoTotalStudyStudents`,`tbl_study`.`NoStudyGirls`,`tbl_study`.`NoStudyBoys`,`tbl_study`.`is_AdmisionNextYear`,`tbl_study`.`NoTotalAdmisionNextYearStudents`,`tbl_study`.`NoAdmisionNextYearGirls`,`tbl_study`.`NoAdmisionNextYearBoys`,`tbl_study`.`is_PriviousStudent`,`tbl_study`.`NoTotalPriviousStudent`,`tbl_study`.`NoTotalPriviousGirlStudent`,`tbl_study`.`NoTotalPriviousBoyStudent`');

       $this->db->join('tbl_study', 'tbl_study.HouseDetailsId = tbl_house_details.Id', 'join');

       $this->db->where(array('tbl_house_details.Id'=>$housId));

       $this->queryResource=$this->db->get('tbl_house_details');
       
       
       return $this->queryResource->row_array();
       
    }

}

?>