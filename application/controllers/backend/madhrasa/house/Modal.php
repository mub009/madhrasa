
<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Modal extends Madhrasa_Controller
{
    const tbl_admin='tbl_admin';

    public function __construct()
    {
        parent::__construct();

        // $this->load->model("online/backend/admin/user/Admin_Model", 'Admin_Model');

        // $this->data += $this->Admin_Model->read_modal_member();


    }


    public function insert()
    {

        $this->_AdminPrivilegeChecking('AdminAdd');

        $this->load->view('backend/admin/user/admin/modal/insert', $this->data);

    }

    public function update($id)
    {

    
        $this->_AdminPrivilegeChecking('AdminEdit');

        $this->data['Id'] = $id;

        $this->load->view('backend/admin/user/admin/Modal/Update', $this->data);
    }

    public function delete($id)
    {

        $this->_AdminPrivilegeChecking('AdminDelete');

        $this->data['Id'] = $id;

        $this->load->view('backend/admin/user/admin/Modal/Delete', $this->data);

    }

    public function details($id)
    {

        $this->_AdminPrivilegeChecking('AdminView');

        $this->data['user_details'] = $this->Base_Model->select('tbl_member', '*', $where = array('Id' => $id, 'StatusId !=' => 3), $order_desc = null, $order_asc = null, $limit = null, $start = null, $return = 'row_array');

        return $this->data;

    }
    
    public function view($id)
    {

        $this->data['view'] = $this->Admin_Model->admininfo($id);
   
        $this->load->view('backend/admin/user/admin/Modal/view', $this->data);

    }
   
    public function customerview($id)
    {
        
        $this->data['customerview'] = $this->Base_Model->select('tbl_customer', '*', $where = array('UserId' => $id), $order_desc = null, $order_asc = null, $limit = null, $start = null, $return = 'row_array');
    
   
        $this->load->view('backend/admin/user/admin/Modal/customerview', $this->data);

    }
  
   

}
