<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Admin Dashboard
 *
 * @author: mubashir
 *
 * @version: 1.0.0
 *
 **@extends:Mahal_Controller
 *
 */
class Dashboard extends Mahal_Controller
{
 /**
  *  Dashboard Title name
  */

 protected $title_name;

 /** Dashboard Nav Bar Link */

 protected $title_nav_bar;

 public function __construct()
 {
  parent::__construct();

  /**
   * Assign title value
   */

  $this->title_name = 'Member';

  /**
   * Assign title nav bar value
   */

  $this->title_nav_bar = array('home' => 'admin/dashboard');

 }

 public function index()
 {

  $this->data['title_nav_bar'] = $this->title_nav_bar;

  $this->data['title'] = $this->title_name;




   $this->data['country_admin_Dealer_count'] = 0;

   $this->data['admin_total_house'] = 0;
   
   $this->data['admin_total_members'] = 0;

   $this->data[''] = 0;

  /**
   * Load Dashboard Template
   */
  
    $this->template('dashboard', $this->data);

 }


 public function Country_via_Customer_list()
 {

   // $country=$this->Base_Model->query('SELECT tbl_country.CountryName, COUNT(CountryName) as count FROM tbl_user left join tbl_country on tbl_country.Id=tbl_user.CountryId where UserTypeId=44  GROUP BY tbl_country.CountryName');
   
       $country=$this->Base_Model->query('SELECT tbl_country.CountryName as country, COUNT(CountryName) as visits FROM tbl_country left join tbl_user on tbl_country.Id=tbl_user.CountryId where tbl_user.UserMasterId=33 GROUP BY tbl_country.CountryName order by visits desc ');
     
       $max=$this->Base_Model->query('SELECT MAX(visits)+20 as max FROM (SELECT tbl_country.CountryName as country, COUNT(CountryName) as visits  FROM tbl_country left join tbl_user on tbl_country.Id=tbl_user.CountryId where tbl_user.UserMasterId=33 GROUP BY tbl_country.CountryName order by visits desc) as a','row_array');
     

      echo json_encode(array('list'=>$country,'max'=>$max));

      
      
     //ssSELECT tbl_country.CountryName, COUNT(*) as count FROM tbl_user join tbl_country on tbl_country.Id=tbl_user.CountryId GROUP BY tbl_country.CountryName
 }

}
