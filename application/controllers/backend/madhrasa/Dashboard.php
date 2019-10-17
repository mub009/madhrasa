<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Admin Dashboard
 *
 * @author: mubashir
 *
 * @version: 1.0.0
 *
 **@extends:Madhrasa_Controller
 *
 */
class Dashboard extends Madhrasa_Controller
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


 

}
