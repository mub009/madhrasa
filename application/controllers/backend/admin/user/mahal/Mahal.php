<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Mahal
 * @author: mubashir  * @phn:+91-9633871889
 * @author:(sub) raseel
 * @version: 1.0.0
 *
 *@extends:Admin_Controller
 *
 */

class Mahal extends Admin_Controller
{

    /** title nav bar */
    protected $title_nav_bar = array();
    /**
     * @var array
     * store title nav bar
     */

     /** title name */

     protected $title;

     /**
      * @var string
      *store title name
      */

      /** Mahal details */
     protected $Mahal_details = array();

     /**
      * @var array
      *store Mahal details
      */


    
    public function __construct()
    {
        parent::__construct();
        //Load Dependencies

        $this->title_nav_bar = array('Home' => 'backend/admin/dashboard', 'User' => 'backend/admin/user/Mahal/Mahal', 'Mahal' => 'backend/admin/user/Mahal/Mahal');

        $this->title = 'Mahal List';

    }

    
/**
 *@func showing Mahal list
 *@param no param
 *author mubashir
 */

//its default function and using for Mahal list

    public function index()
    {
 

        /** set privilege */
        $this->_AdminPrivilegeChecking('MahalView');

        $this->data['title_nav_bar'] = $this->title_nav_bar;

        $this->data['title'] = $this->title;

        $this->_Datatable_config();

        $this->data['legancy']=$this->Legancy->design(array('add','active','actions','block','pending','approved','notactive'),'Mahal');


        $this->template('user/mahal/mahal', $this->data);


        
    }




      /**
     *  datatable config
     *
     * @param: No param
     *
     *  */
    public function _Datatable_config()
    {

       
        $config=array(
            'datatable'=>array(
                'json_url'=>'backend/admin/user/mahal/mahal/datatable',
                'column_name'=>array('User Id','Mahal Number','Mahal Name','Status','OTP','Created','Actions')
            ),
            'toolbar'=>array(
                'privilege_array'=>array('MahalView'),
                'privilege_value'=>'MahalView',
                'link_value'=>'backend/admin/user/mahal/modal/insert'
 
            ),
            'title'=>$this->title
 
         );
         
         $this->data['datatable']=$this->Datatabledesign->design($config);
        
        
    }


    
   /**
     *  append datatable 
     *
     * @param: No param
     *
     *  */
    public function datatable()
    {
        $this->datatables
      
        ->select('tbl_user.UserId as Id,tbl_user.MobileNo,tbl_mahal.FirstName,tbl_status.StatusValue,tbl_otpStatus.StatusValue as Otpverification,tbl_user.InsertDate,0 as action,tbl_user.UserId')

        ->join('tbl_country', 'tbl_country.Id=tbl_user.CountryId')
        
        ->join('tbl_mahal', 'tbl_mahal.UserId=tbl_user.UserId')

        ->join('tbl_status', 'tbl_status.Id=tbl_user.StatusId')

        ->join('tbl_status as tbl_otpStatus', 'tbl_otpStatus.Id=tbl_user.is_OtpVerification')

        ->where(array('tbl_user.UserMasterId' => 2, 'tbl_user.StatusId !=' => 3,'CountryId' => $this->data['userinfo']['CountryId']))

        ->from('tbl_user');
        

             $config['action_config']=array(array(
                 'EveryPrivilege'=>$this->data['AdminPrivilege'],
                 'value'=>'MahalEdit',
                 'privilege'=> $this->data['MahalPrivilege'],
                 'link'=>'backend/admin/user/Mahal/modal/update/',
                 'icon'=>icon_edit,
                 'action_name'=>'Edit',
                 'id'=>'$1'
             ),
             array(
                 'EveryPrivilege'=>$this->data['AdminPrivilege'],
                 'value'=>'MahalDelete',
                 'privilege'=> $this->data['MahalPrivilege'],
                 'link'=>'backend/admin/user/Mahal/modal/delete/',
                 'icon'=>icon_delete,
                 'action_name'=>'Delete',
                 'id'=>'$1'
             )
         );
             
         
  


        
        $this->datatables->edit_action('action',  $config, 'Id,UserId');


        echo $this->datatables->generate();

    }

    

    
/**
 *@func insert Mahal 
 *@param no param
 *author mubashir
 */

    public function insert()
    {
        $this->_AdminPrivilegeChecking('MahalAdd');
       
        //checking for submit button

            $this->form_validation->set_rules('Mahal_number', 'number', "required|regex_match[/^[0-9]+$/]|callback_is_mobile_number_checking_no_status[".$this->data['userinfo']['CountryId']."]");


            //validate form is true or false

            if ($this->form_validation->run() == true) {

                $this->trans_begin();

                $this->Mahal_details = array('StatusId' => 2, 'is_OtpVerification' => 2, 'MobileNo' => $this->input->post('Mahal_number'), 'UsermasterId' => 2, 'InsertBy' => $this->data['userinfo']['UserId'], 'CountryId' => $this->data['userinfo']['CountryId'], 'InsertDate' =>  $this->data['dateAndtime']);

                //then calling insert function

                if ($UserId = $this->Base_Model->insert('tbl_user', $this->Mahal_details)) {

                    if($addressId=$this->Base_Model->insert('tbl_address', array('UserId' => $UserId)))
                    {

                    if($this->Base_Model->insert('tbl_mahal', array('UserId' => $UserId,'AddressId'=>$addressId)))
                    {
                        $this->transitionFlag=1;
                    }
                    else
                    {
                        $this->transitionFlag=0;
                    }
                }
                else
                {
                    $this->transitionFlag=0;
                }
                    
                 $this->notification($UserId, 'MahalAdd', $message = 'Added New Account ', $icon = '<i class="fa fa-plus"></i>');


                 $this->trans_complete();

                 json_output(200,'success');

                } else {
                
                    json_output(400,'fail');

                }

            } else {

                json_output(400,$this->form_validation->error_array());
            }


    }

    /**
 *@func details Mahal in particular data 
 *@param id its unique id 
 *author mubashir
 */

    public function details($id = null)
    {
        // if (!in_array('MahalView', $this->data['CountryPrivilege'])) {
        //     redirect('backend/admin/dashboard', 'refresh');
        // }
        $this->_AdminPrivilegeChecking('MahalView');

        if ($id) {
            //read Mahal details from database

            $this->Mahal_details = $this->Base_Model->select('tbl_user', '*', $where = array('UserId' => $id), $order_desc = null, $order_asc = null, $limit = null, $start = null, $return = 'result_array');

            // print_r($this->data['Mahal_details']);
        } else {

            //read Mahal details from database

            $this->Mahal_details = $this->Base_Model->select('tbl_user', '*', '', $order_desc = null, $order_asc = null, $limit = null, $start = null, $return = 'result_array');

            // print_r($this->data['Mahal_details']);

        }

        echo json_encode($this->Mahal_details, true);

    }


    /**
 *@func update Mahal 
 *@param no param
 *author mubashir
 */


    public function update()
    {
        // if (!in_array('MahalEdit', $this->data['CountryPrivilege'])) {
        //     redirect('backend/admin/dashboard', 'refresh');
        // }
        $this->_AdminPrivilegeChecking('MahalEdit');

//checking for update button

        if (isset($_POST['update'])) {

//validate form data

            // $this->form_validation->set_rules('Mahal_number', 'Number', "required|regex_match[/^[0-9]+$/]|callback_is_unique_multi_no_status[tbl_user.MobileNo.CountryId.".$this->data['userinfo']['CountryId']."]");

            $this->form_validation->set_rules('Mahal_status', 'Mahal Status', 'required|regex_match[/^[0-9]+$/]');

            $this->form_validation->set_rules('id', 'id', 'required');

//validate form is true or false

            if ($this->form_validation->run() == true) {

//store data in variable using $Mahal_details

$this->Mahal_details = array('StatusId' => $this->input->post('Mahal_status'), 'UpdatedBy' => $this->data['user_id'], 'UpdatedDate' =>  $this->data['dateAndtime']);

//then calling update function

                if ($this->Base_Model->update('tbl_user', array('UserId' => $this->input->post('id')), $this->Mahal_details)) {

                    //set flash message

                    $this->session->set_flashdata('success', 'Successfully Update Mahal Account');
                    $this->output->set_status_header('200');

                    echo json_encode('200');

                    //redirect to Mahal page

                    redirect('admin/user/Mahal', 'refresh');

                } else {
                    //its database prb show in here or query prb

                    echo 'Database Problem Occure';

                }

            } else {
                $this->output->set_status_header('400');
                echo json_encode($this->form_validation->error_array());

            }

        }

    }


    /**
 *@func delete Mahal in particular data 
 *@param no param
 *author mubashir
 */

//delete data from tbl_user

    public function delete()
    {
        // if (!in_array('MahalDelete', $this->data['CountryPrivilege'])) {
        //     redirect('backend/admin/dashboard', 'refresh');
        // }
        $this->_AdminPrivilegeChecking('MahalDelete');
//checking for update button

        if (isset($_POST['delete'])) {

            //validate form data

            $this->form_validation->set_rules('delete_Mahal_id', 'Delete Mahal', 'required');

            //SET Delete status mode
            $this->Mahal_details = array('StatusId' => 3);

            if ($this->Base_Model->update('tbl_user', array('UserId' => $this->input->post('delete_Mahal_id')), $this->Mahal_details)) {

                $this->notification($usertypeid = $this->input->post('delete_Mahal_id'), 'MahalDelete', $message = ' Account is Deleted ', $icon = '<i class="fa fa-trash"></i>');

                //set flash message

                $this->session->set_flashdata('success', 'Successfully Delete Mahal Account');

                //redirect to Mahal page

                redirect('backend/admin/user/Mahal/Mahal', 'refresh');

            } else {
                //its database prb show in here or query prb

                echo 'Database Problem Occure';

                die();

            }

        }

        //read Mahal details from tbl_user and check condition

        $this->Mahal_details = $this->Base_Model->select('tbl_user', '*', $where = array('UserTypeId' => 22, 'StatusId !=' => 3), $order_desc = null, $order_asc = null, $limit = null, $start = null, $return = 'result_array');

        //read status from tbl_status

        $this->data['status'] = $this->Base_Model->select('tbl_status', '*', '', $order_desc = null, $order_asc = null, $limit = null, $start = null, $return = 'result_array');

        $this->template('user/Mahal', $this->data);

    }

}
