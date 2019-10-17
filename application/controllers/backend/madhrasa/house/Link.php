
<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Link extends Madhrasa_Controller
{
    const tbl_admin='tbl_admin';

    /**
     *  Dashboard Title name
     */

    protected $title_name;

    /**
     * Dashboard Nav Bar Link
     */

    protected $title_nav_bar;


    public function __construct()
    {
        parent::__construct();


        /**
         * Assign title value
         */

        $this->title_name = 'House List';

        /**
         * Assign title nav bar value
         */

        $this->title_nav_bar = array('Home' => 'backend/admin/dashboard', 'House' => 'backend/admin/user/house/house', 'House' => 'backend/admin/user/house/house');


        $this->data['title_nav_bar'] = $this->title_nav_bar;

        $this->data['title'] = $this->title_name;

        $this->data['legancy']=$this->Legancy->design(array('add','actions','view'),'House');


    }


    public function insert()
    {

        $this->_AdminPrivilegeChecking('AdminAdd');

        $this->template('house/link/insert', $this->data);

    }

    // public function update($id)
    // {

    
    //     $this->_AdminPrivilegeChecking('AdminEdit');

    //     $this->data['Id'] = $id;

    //     $this->load->view('backend/admin/house/link/Update', $this->data);
    // }

    // public function delete($id)
    // {

    //     $this->_AdminPrivilegeChecking('AdminDelete');

    //     $this->data['Id'] = $id;

    //     $this->load->view('backend/admin/house/link/Delete', $this->data);

    // }

    // public function details($id)
    // {

    //     $this->_AdminPrivilegeChecking('AdminView');

    //     $this->data['user_details'] = $this->Base_Model->select('tbl_member', '*', $where = array('Id' => $id, 'StatusId !=' => 3), $order_desc = null, $order_asc = null, $limit = null, $start = null, $return = 'row_array');

    //     return $this->data;

    // }
    
    // public function view($id)
    // {

    //     $this->data['view'] = $this->Admin_Model->admininfo($id);
   
    //     $this->load->view('backend/admin/house/link/view', $this->data);

    // }
   
    // public function customerview($id)
    // {
        
    //     $this->data['customerview'] = $this->Base_Model->select('tbl_customer', '*', $where = array('UserId' => $id), $order_desc = null, $order_asc = null, $limit = null, $start = null, $return = 'row_array');
    
   
    //     $this->load->view('backend/admin/house/link/customerview', $this->data);

    // }
  
   

}