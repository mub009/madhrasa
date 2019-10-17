<?php

class CustomerSystemModel extends CI_Model
{

    public function __construct()
    {

        parent::__construct();

        $this->load->database();
    }
    public function CurrentBalance($CustomerUsertypeid)
    {

        $this->db->select_sum('Points');

        $this->db->where(array('CustomerUserTypeId' => $CustomerUsertypeid));

        $query = $this->db->get('tbl_LoyalityCustomerLedger');

        return $query->row_array();

    }

    public function GetLastPointData($CustomerUsertypeid)
    {

        $this->db->select('*');

        $this->db->where(array('CustomerUserTypeId' => $CustomerUsertypeid));

        $this->db->order_by('Id', "desc");

        $query = $this->db->get('tbl_LoyalityCustomerLedger');

        return $query->row_array();

    }

    public function ReadUserTypeDetails($mobile, $countryId, $UserType)
    {

        $this->db->select('*');

        $this->db->join('tbl_country', 'tbl_country.Id=tbl_user.CountryId', 'join');

        $this->db->join('tbl_currencymaster', 'tbl_currencymaster.CountryId=tbl_country.Id', 'join');
       
        $this->db->join('tbl_customer', 'tbl_customer.UserId=tbl_user.UserId', 'join');

        $this->db->where(array('tbl_user.MobileNo' => $mobile, 'tbl_user.CountryId' => $countryId, 'tbl_user.UserMasterId' => $UserType));

        if ($query = $this->db->get('tbl_user')) {

            return $query->row_array();
        } else {
            return false;
        }
    }

    // public function pendingBalance($CustomerUsertypeid)
    // {

    //     $this->db->select_sum('Points');

    //     $this->db->where(array('CustomerUserTypeId' => $CustomerUsertypeid,'OrderStatusId'));

    //     $query = $this->db->get('tbl_LoyalityCustomerLedger');

    //     return $query->row_array();

    // }


}
