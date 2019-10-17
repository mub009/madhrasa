<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Madhrasa
 * @author: mubashir  * @phn:+91-9633871889
 * @author:(sub) raseel
 * @version: 1.0.0
 *
 *@extends:Mahal_Controller
 *
 */

class Madhrasa extends Mahal_Controller
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

      /** Madhrasa details */
     protected $Madhrasa_details = array();

     /**
      * @var array
      *store Madhrasa details
      */


    
    public function __construct()
    {
        parent::__construct();
        //Load Dependencies

        $this->title_nav_bar = array('Home' => 'backend/admin/dashboard', 'User' => 'backend/admin/user/Madhrasa/Madhrasa', 'Madhrasa' => 'backend/admin/user/Madhrasa/Madhrasa');

        $this->title = 'Madhrasa List';

    }

    
/**
 *@func showing Madhrasa list
 *@param no param
 *author mubashir
 */

//its default function and using for Madhrasa list

    public function index()
    {
 

   
        $this->data['title_nav_bar'] = $this->title_nav_bar;

        $this->data['title'] = $this->title;

        $this->_Datatable_config();

        $this->data['legancy']=$this->Legancy->design(array('add','active','actions','block','pending','approved','notactive'),'Madhrasa');


        $this->template('user/madhrasa/madhrasa', $this->data);


        
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
                'json_url'=>'backend/mahal/user/madhrasa/madhrasa/datatable',
                'column_name'=>array('User Id','Madhrasa Number','Madhrasa Name','Status','OTP','Created','Actions')
            ),
            'toolbar'=>array(
                'privilege_array'=>array('MadhrasaView'),
                'privilege_value'=>'MadhrasaView',
                'link_value'=>'backend/mahal/user/madhrasa/modal/insert'
 
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
      
        ->select('tbl_user.UserId as Id,tbl_user.MobileNo,tbl_madhrasa.FirstName,tbl_status.StatusValue,tbl_otpStatus.StatusValue as Otpverification,tbl_user.InsertDate,0 as action,tbl_user.UserId')

        ->join('tbl_country', 'tbl_country.Id=tbl_user.CountryId')
        
        ->join('tbl_madhrasa', 'tbl_madhrasa.UserId=tbl_user.UserId')

        ->join('tbl_status', 'tbl_status.Id=tbl_user.StatusId')

        ->join('tbl_status as tbl_otpStatus', 'tbl_otpStatus.Id=tbl_user.is_OtpVerification')

        ->where(array('tbl_user.UsermasterId' => 3, 'tbl_user.StatusId !=' => 3,'CountryId' => $this->data['userinfo']['CountryId']))

        ->from('tbl_user');
        

             $config['action_config']=array(array(
                 'value'=>'MadhrasaEdit',
                 'privilege'=> array('MadhrasaEdit'),
                 'link'=>'backend/mahal/user/Madhrasa/modal/update/',
                 'icon'=>icon_edit,
                 'action_name'=>'Edit',
                 'id'=>'$1'
             ),
             array(
                 'value'=>'MadhrasaDelete',
                 'privilege'=>array('MadhrasaEdit'),
                 'link'=>'backend/mahal/user/Madhrasa/modal/delete/',
                 'icon'=>icon_delete,
                 'action_name'=>'Delete',
                 'id'=>'$1'
             )
         );
             
         
  


        
        $this->datatables->edit_action('action',  $config, 'Id,UserId');


        echo $this->datatables->generate();

    }

    

    
/**
 *@func insert Madhrasa 
 *@param no param
 *author mubashir
 */

    public function insert()
    {

       
        //checking for submit button

            $this->form_validation->set_rules('Madhrasa_number', 'number', "required|regex_match[/^[0-9]+$/]|callback_is_mobile_number_checking_no_status[".$this->data['userinfo']['CountryId']."]");


            //validate form is true or false

            if ($this->form_validation->run() == true) {

                $this->trans_begin();

                $this->Madhrasa_details = array('StatusId' => 2, 'is_OtpVerification' => 2, 'MobileNo' => $this->input->post('Madhrasa_number'), 'UsermasterId' => 3, 'InsertBy' => $this->data['userinfo']['UserId'], 'CountryId' => $this->data['userinfo']['CountryId'], 'InsertDate' =>  $this->data['dateAndtime']);

                //then calling insert function

                if ($UserId = $this->Base_Model->insert('tbl_user', $this->Madhrasa_details)) {

                    if($addressId=$this->Base_Model->insert('tbl_address', array('UserId' => $UserId)))
                    {

                    if($this->Base_Model->insert('tbl_Madhrasa', array('UserId' => $UserId,'AddressId'=>$addressId)))
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
                    
                 $this->notification($UserId, 'MadhrasaAdd', $message = 'Added New Account ', $icon = '<i class="fa fa-plus"></i>');


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
 *@func details Madhrasa in particular data 
 *@param id its unique id 
 *author mubashir
 */

    public function details($id = null)
    {
      

        if ($id) {
            //read Madhrasa details from database

            $this->Madhrasa_details = $this->Base_Model->select('tbl_user', '*', $where = array('UserId' => $id), $order_desc = null, $order_asc = null, $limit = null, $start = null, $return = 'result_array');

            // print_r($this->data['Madhrasa_details']);
        } else {

            //read Madhrasa details from database

            $this->Madhrasa_details = $this->Base_Model->select('tbl_user', '*', '', $order_desc = null, $order_asc = null, $limit = null, $start = null, $return = 'result_array');

            // print_r($this->data['Madhrasa_details']);

        }

        echo json_encode($this->Madhrasa_details, true);

    }


    /**
 *@func update Madhrasa 
 *@param no param
 *author mubashir
 */


    public function update()
    {
    

//checking for update button

        if (isset($_POST['update'])) {

//validate form data

            // $this->form_validation->set_rules('Madhrasa_number', 'Number', "required|regex_match[/^[0-9]+$/]|callback_is_unique_multi_no_status[tbl_user.MobileNo.CountryId.".$this->data['userinfo']['CountryId']."]");

            $this->form_validation->set_rules('Madhrasa_status', 'Madhrasa Status', 'required|regex_match[/^[0-9]+$/]');

            $this->form_validation->set_rules('id', 'id', 'required');

//validate form is true or false

            if ($this->form_validation->run() == true) {

//store data in variable using $Madhrasa_details

$this->Madhrasa_details = array('StatusId' => $this->input->post('Madhrasa_status'), 'UpdatedBy' => $this->data['user_id'], 'UpdatedDate' =>  $this->data['dateAndtime']);

//then calling update function

                if ($this->Base_Model->update('tbl_user', array('UserId' => $this->input->post('id')), $this->Madhrasa_details)) {

                    //set flash message

                    $this->session->set_flashdata('success', 'Successfully Update Madhrasa Account');
                    $this->output->set_status_header('200');

                    echo json_encode('200');

                    //redirect to Madhrasa page

                    redirect('admin/user/Madhrasa', 'refresh');

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
 *@func delete Madhrasa in particular data 
 *@param no param
 *author mubashir
 */

//delete data from tbl_user

    public function delete()
    {
       
//checking for update button

        if (isset($_POST['delete'])) {

            //validate form data

            $this->form_validation->set_rules('delete_Madhrasa_id', 'Delete Madhrasa', 'required');

            //SET Delete status mode
            $this->Madhrasa_details = array('StatusId' => 3);

            if ($this->Base_Model->update('tbl_user', array('UserId' => $this->input->post('delete_Madhrasa_id')), $this->Madhrasa_details)) {

                $this->notification($usertypeid = $this->input->post('delete_Madhrasa_id'), 'MadhrasaDelete', $message = ' Account is Deleted ', $icon = '<i class="fa fa-trash"></i>');

                //set flash message

                $this->session->set_flashdata('success', 'Successfully Delete Madhrasa Account');

                //redirect to Madhrasa page

                redirect('backend/admin/user/Madhrasa/Madhrasa', 'refresh');

            } else {
                //its database prb show in here or query prb

                echo 'Database Problem Occure';

                die();

            }

        }

        //read Madhrasa details from tbl_user and check condition

        $this->Madhrasa_details = $this->Base_Model->select('tbl_user', '*', $where = array('UserTypeId' => 22, 'StatusId !=' => 3), $order_desc = null, $order_asc = null, $limit = null, $start = null, $return = 'result_array');

        //read status from tbl_status

        $this->data['status'] = $this->Base_Model->select('tbl_status', '*', '', $order_desc = null, $order_asc = null, $limit = null, $start = null, $return = 'result_array');

        $this->template('user/Madhrasa', $this->data);

    }

}
