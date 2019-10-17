
<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Modal extends Mahal_Controller
{

    public function __construct()
    {
        parent::__construct();

    }

    public function insert()
    {
        
        $this->load->view('backend/mahal/user/madhrasa/modal/insert', $this->data);

    }

    public function update($id)
    {

        $this->data['id'] = $id;

        $this->load->view('backend/mahal/user/madhrasa/modal/Update', $this->data);
    }

    public function delete($id)
    {
    //    $this->_mahalPrivilegeChecking('DealerDelete');

        $this->data['id'] = $id;

        $this->load->view('backend/mahal/user/madhrasa/modal/Delete', $this->data);

    }

    public function details($id)
    {

        // $this->_mahalPrivilegeChecking('DealerView');

        $this->data['state_details'] = $this->Base_Model->select('tbl_user', '*', $where = array('Id' => $id, 'StatusId !=' => 3), $order_desc = null, $order_asc = null, $limit = null, $start = null, $return = 'result_array');

        return $this->data;

    }

}
