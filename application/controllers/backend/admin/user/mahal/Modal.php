
<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Modal extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();

    }

    public function insert()
    {
        
        $this->load->view('backend/admin/user/mahal/modal/Insert', $this->data);

    }

    public function update($id)
    {

        $this->data['id'] = $id;

        $this->load->view('backend/admin/user/mahal/modal/Update', $this->data);
    }

    public function delete($id)
    {
    //    $this->_AdminPrivilegeChecking('DealerDelete');

        $this->data['id'] = $id;

        $this->load->view('backend/admin/user/mahal/modal/Delete', $this->data);

    }

    public function details($id)
    {

        // $this->_AdminPrivilegeChecking('DealerView');

        $this->data['state_details'] = $this->Base_Model->select('tbl_user', '*', $where = array('Id' => $id, 'StatusId !=' => 3), $order_desc = null, $order_asc = null, $limit = null, $start = null, $return = 'result_array');

        return $this->data;

    }

}
