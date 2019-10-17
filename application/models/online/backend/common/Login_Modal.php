<?php

class Login_Modal extends CI_Model
{

    public function __construct()
    {

        parent::__construct();

        $this->load->database();
    }

    public function login($MobileNo, $country_name = 0)
    {

        
        // if (!empty($MobileNo) && !empty($country_name)) {
        //     $this->db->select('tbl_user.Password as Password,tbl_user.UserId as UserId,tbl_user.CountryId as CountryId,tbl_user.MobileNo as MobileNo,tbl_user.InsertBy as InsertBy,tbl_user.is_OtpVerification as is_OtpVerification,tbl_user.UserMasterId as UserMasterId,tbl_user.StatusId as StatusId,tbl_usermaster.UserType as UserType,tbl_currencymaster.Currency as Currency,tbl_currencymaster.CurrencySymbol as CurrencySymbol');
        //     $this->db->join('tbl_usermaster', 'tbl_usermaster.id=tbl_user.UserMasterId', 'join');
        //     $this->db->join('tbl_currencymaster', 'tbl_currencymaster.CountryId=tbl_user.CountryId', 'left');
        //     $this->db->where(array('tbl_user.MobileNo' => $MobileNo, 'tbl_user.CountryId' => $country_name));
        //     $query = $this->db->get('tbl_user');
        //     return $query->row_array();

        // } else {
        
        //     $this->db->select('tbl_user.Password as Password,tbl_user.UserId as UserId,tbl_user.CountryId as CountryId,tbl_user.MobileNo as MobileNo,tbl_user.InsertBy as InsertBy,tbl_user.is_OtpVerification as is_OtpVerification,tbl_user.UserMasterId as UserMasterId,tbl_user.StatusId as StatusId,tbl_usermaster.UserType as UserType,tbl_currencymaster.Currency as Currency,tbl_currencymaster.CurrencySymbol as CurrencySymbol');
        //     $this->db->join('tbl_usermaster', 'tbl_usermaster.id=tbl_user.UserMasterId', 'join');
        //     $this->db->join('tbl_currencymaster', 'tbl_currencymaster.CountryId=tbl_user.CountryId', 'left');
        //     $this->db->where(array('tbl_user.MobileNo' => $MobileNo,'tbl_user.UserMasterId' => 1));
        //     $query = $this->db->get('tbl_user');
        //     return $query->row_array();
        
        // }
        
        $this->db->select('tbl_user.Password as Password,tbl_user.UserId as UserId,tbl_user.CountryId as CountryId,tbl_user.MobileNo as MobileNo,tbl_user.InsertBy as InsertBy,tbl_user.is_OtpVerification as is_OtpVerification,tbl_user.UserMasterId as UserMasterId,tbl_user.StatusId as StatusId,tbl_usermaster.UserType as UserType,tbl_currencymaster.Currency as Currency,tbl_currencymaster.CurrencySymbol as CurrencySymbol');
       
        $this->db->join('tbl_usermaster', 'tbl_usermaster.id=tbl_user.UserMasterId', 'join');
       
        $this->db->join('tbl_currencymaster', 'tbl_currencymaster.CountryId=tbl_user.CountryId', 'left');
       
        $this->db->where(array('tbl_user.MobileNo' => $MobileNo));
       
        $query = $this->db->get('tbl_user');
        
        return $query->row_array();

    

    }

    public function loginDetails($userId=null)
    {

        if($userId)
        {
        $this->db->select('tbl_country.TimeZone,tbl_country.TotalMobileNumberDigits,tbl_user.Password as Password,tbl_user.UserId as UserId,tbl_user.CountryId as CountryId,tbl_user.MobileNo as phone,tbl_user.InsertBy as InsertBy,tbl_user.is_OtpVerification as is_OtpVerification,tbl_user.UserMasterId as UserMasterId,tbl_user.StatusId as status,tbl_usermaster.UserType as HeaderName,tbl_currencymaster.Currency as Currency,tbl_currencymaster.CurrencySymbol as CurrencySymbol');
        $this->db->join('tbl_usermaster', 'tbl_usermaster.id=tbl_user.UserMasterId', 'join');
        $this->db->join('tbl_country', 'tbl_country.Id=tbl_user.CountryId', 'left');
        $this->db->join('tbl_currencymaster', 'tbl_currencymaster.CountryId=tbl_user.CountryId', 'left');
        $this->db->where(array('tbl_user.UserId ' => $userId));
        $query = $this->db->get('tbl_user');
        return $query->row_array();
        }
        else
        {
         die('Unauthorized access');
        }
    }

}
