<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *  Admin
 *
 * @author: mubashir
 *
 * @version: 1.0.0
 *
 **@extends:Madhrasa_Controller
 *
 */

class House extends Madhrasa_Controller
{

    /**
     *  Dashboard Title name
     */

    protected $title_name;

    /**
     * Dashboard Nav Bar Link
     */

    protected $title_nav_bar;


    /**
     * Mahal UserMasterId
     */

    protected $Mahal_UserMasterId;

    /**
     * Active Status Id
     */

    protected $Active_Status_Id;

    /**
     * Table Name
     */
    protected $Table_Name;



    protected $user_details=array();

    /**
     * privilege
     */

     protected $privilege;

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

        /**
         * assign Country Admin UserMasterId value
         */
        $this->Mahal_UserMasterId = 11;

        /**
         * assign Active StatusId value
         */
        $this->Active_Status_Id = 1;

        /**
         * assign Table name
         */
        $this->Table_Name = 'tbl_house_details';


    }

    /**
     *  View Country Admin List
     *
     * @param: No param
     *
     *  */

    public function index()
    {

        /**
         *  Check Country Admin privilege in Admin Country View Part
         *
         * */

        $this->_AdminPrivilegeChecking('AdminView');

        $this->data['title_nav_bar'] = $this->title_nav_bar;

        $this->data['title'] = $this->title_name;

        $this->data['legancy']=$this->Legancy->design(array('add','actions','view'),'House');


        $this->_Datatable_config();

        /**
         * Load template 
         */

        $this->template('house/house', $this->data);

    }

    /**
     *  datatable config
     *
     * @param: No param
     *
     *  */
    public function _Datatable_config()
    {

        if ($this->data['AdminPrivilege']) {
           
            $this->privilege=array('admin');
        }
        else
        {
            
            $this->privilege=$this->data['MahalPrivilege'];
        }

       
        $config=array(
            'datatable'=>array(
                'json_url'=>'backend/madhrasa/house/house/datatable',
                'column_name'=>array('Id','Reg No','Member Name','Mobile Number','Whatsapp No','Actions','view')
            ),
            'toolbar'=>array(
                'privilege_array'=>$this->privilege,
                'privilege_value'=>'AdminView',
                'link_value'=>'backend/madhrasa/house/link/insert',
                'link'=>true
 
            ),
            'title'=>'House'
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
      
        ->select('tbl_house_details.Id,tbl_house_details.RegNo,tbl_house_details.Name,tbl_house_details.MobNo,tbl_house_details.WhatsappNo,0 as action,0 as view')
        
        ->from('tbl_house_details');
        
  
            $config['action_config']=array(array(
                'EveryPrivilege'=>$this->data['AdminPrivilege'],
                'value'=>'DealerEdit',
                'privilege'=> $this->data['MahalPrivilege'],
                'link'=>'backend/madhrasa/house/link/update/',
                'icon'=>icon_edit,
                'action_name'=>'Edit',
                'link_mode'=>true,
                'id'=>'$1'
             ),
            // array(
            //     'EveryPrivilege'=>$this->data['AdminPrivilege'],
            //     'value'=>'DealerDelete',
            //     'privilege'=> $this->data['MahalPrivilege'],
            //     'link'=>'backend/madhrasa/house/link/insert/$1',
            //     'icon'=>icon_delete,
            //     'action_name'=>'Delete',
            //     'id'=>'$1'
            // )
        );
       
        
        $this->datatables->edit_action('action',  $config, 'Id');


        $this->datatables->edit_view_link('view', "backend/madhrasa/house/link/view/$1", 'Id');

        echo $this->datatables->generate();

    }


   /**
     *  Read Country Limit
     *
     * @param: No param
     *
     *  */

    public function CountryDetails()
    {

        
    }


     /**
     *  Insert Country Admin User
     *
     * @param: No param
     *
     *  */

    public function insert()
    {
        /**
         *  Check Country Admin privilege in Admin Add Part
         *
         * */
     
            /**
             *  validate Post data
             *
             */

            $this->form_validation->set_rules('RegNo', 'Reg No ', 'required');

            $this->form_validation->set_rules('Name', 'Name', 'required');
    
            $this->form_validation->set_rules('Address', 'Address', 'required');
    
            $this->form_validation->set_rules('WardNo', 'Ward No', 'required');
    
            $this->form_validation->set_rules('HouseNo', 'House No', 'required');
    
            $this->form_validation->set_rules('MobNo', 'Mob No', 'required');
    
            $this->form_validation->set_rules('WhatsappNo', 'Whatsapp No', 'required');
    
            $this->form_validation->set_rules('Occupation', 'Occupation ', 'required');
    
            $this->form_validation->set_rules('NoOfmembers', 'No Of members ', 'required');

            $this->form_validation->set_rules('IsStudy', 'Study', 'required');

            $this->form_validation->set_rules('IsAdmision', 'Admision', 'required');
            
            $this->form_validation->set_rules('IsOldstundents', 'Oldstundents', 'required');

            $this->form_validation->set_rules('Feedback', 'Feedback', 'required');

            
            /**
             * validate form is true or false
             */

            if ($this->form_validation->run() == true) {

				$HouseDetails=array('StatusId' => 1,'RegNo'=>$this->input->post('RegNo'),'Name'=>$this->input->post('Name'),'Address'=>$this->input->post('Address'),'WardNo'=>$this->input->post('WardNo'),'HouseNo'=>$this->input->post('HouseNo'),'MobNo'=>$this->input->post('MobNo'),'Feedback'=>$this->input->post('Feedback'),'WhatsappNo'=>$this->input->post('WhatsappNo'),'Occupation'=>$this->input->post('Occupation'),'NoOfMembers'=>$this->input->post('NoOfmembers'));
               
                if ($HouseNumberId=$this->Base_Model->insert($this->Table_Name, $HouseDetails)) {

                    $MaleAdmision=$this->input->post('MaleAdmision');
                    
                    $FemaleAdmision=$this->input->post('FemaleAdmision');
                    
                    $MaleStudent=$this->input->post('MaleStudent');

                    $FemaleStudent=$this->input->post('FemaleStudent');

 
                    $PriviousFemaleAdmision=$this->input->post('FemaleOldStudent');

                    $PriviousMaleAdmision=$this->input->post('MaleOldStudent');

                    $IsStudy=$this->input->post('IsStudy');

                    $IsAdmision=$this->input->post('IsAdmision');
                    
                    $IsOldstundents=$this->input->post('IsOldstundents');

                    $NoTotalPriviousStudent=0;
                    
                    $NoTotalAdmisionNextYearStudents=0;

                    $NoTotalStudyStudents=0;

                    if($IsStudy==1)
                    {
                        $NoTotalStudyStudents=($MaleStudent)?$MaleStudent:0+($FemaleStudent)?$FemaleStudent:0;

                    }

                    if($IsAdmision==1)
                    {
                        $NoTotalAdmisionNextYearStudents=($MaleAdmision)?$MaleAdmision:0+($FemaleAdmision)?$FemaleAdmision:0;
 
                    }

                  
                    if($IsOldstundents==1)
                    {
                        $NoTotalPriviousStudent=($PriviousFemaleAdmision)?$PriviousFemaleAdmision:0+($PriviousMaleAdmision)?$PriviousMaleAdmision:0;

                    }
                    

                    

                  
                    $StudyDetails=array(
                                     'HouseDetailsId'=>$HouseNumberId,
                                     'is_Study'=>$IsStudy,
                                     'NoStudyBoys'=>$MaleStudent,
                                     'NoStudyGirls'=>$FemaleStudent,
                                     'NoTotalStudyStudents'=>$NoTotalStudyStudents,
                                     'is_AdmisionNextYear'=>$IsAdmision,
                                     'NoTotalAdmisionNextYearStudents'=>$NoTotalAdmisionNextYearStudents,
                                     'NoAdmisionNextYearBoys'=>$MaleAdmision,
                                     'NoAdmisionNextYearGirls'=>$FemaleAdmision,
                                     'is_PriviousStudent'=>$IsOldstundents,
                                     'NoTotalPriviousGirlStudent'=>$PriviousFemaleAdmision,
                                     'NoTotalPriviousBoyStudent'=>$PriviousMaleAdmision,
                                     'NoTotalPriviousStudent'=>$NoTotalPriviousStudent,
                    );

                    $this->Base_Model->insert('tbl_study', $StudyDetails);

                    $this->output->set_status_header('200');

                    echo json_encode('success');

                } else {

                    /**
                     *  database prb show in here or query prb
                     */
                    echo 'Database Problem Occur';

                }

            } else {
               
                $this->output->set_status_header('400');
               
                echo json_encode($this->form_validation->error_array());

            }


    }




    public function update()
    {
        /**
         *  Check Country Admin privilege in Admin Add Part
         *
         * */
     
            /**
             *  validate Post data
             *
             */

            $this->form_validation->set_rules('RegNo', 'Reg No ', 'required');

            $this->form_validation->set_rules('Name', 'Name', 'required');
    
            $this->form_validation->set_rules('Address', 'Address', 'required');
    
            $this->form_validation->set_rules('WardNo', 'Ward No', 'required');
    
            $this->form_validation->set_rules('HouseNo', 'House No', 'required');
    
            $this->form_validation->set_rules('MobNo', 'Mob No', 'required');
    
            $this->form_validation->set_rules('WhatsappNo', 'Whatsapp No', 'required');
    
            $this->form_validation->set_rules('Occupation', 'Occupation ', 'required');
    
            $this->form_validation->set_rules('NoOfmembers', 'No Of members ', 'required');

            $this->form_validation->set_rules('IsStudy', 'Study', 'required');

            $this->form_validation->set_rules('IsAdmision', 'Admision', 'required');
            
            $this->form_validation->set_rules('IsOldstundents', 'Oldstundents', 'required');

            $this->form_validation->set_rules('Feedback', 'Feedback', 'required');

            $this->form_validation->set_rules('Id', 'Id', 'required');

            
            /**
             * validate form is true or false
             */

            if ($this->form_validation->run() == true) {

				$HouseDetails=array('StatusId' => 1,'RegNo'=>$this->input->post('RegNo'),'Name'=>$this->input->post('Name'),'Address'=>$this->input->post('Address'),'WardNo'=>$this->input->post('WardNo'),'HouseNo'=>$this->input->post('HouseNo'),'MobNo'=>$this->input->post('MobNo'),'Feedback'=>$this->input->post('Feedback'),'WhatsappNo'=>$this->input->post('WhatsappNo'),'Occupation'=>$this->input->post('Occupation'),'NoOfMembers'=>$this->input->post('NoOfmembers'));
               
                $HouseId=$this->input->post('Id');
               

                if ($this->Base_Model->update($this->Table_Name,array('Id'=>$HouseId), $HouseDetails)) {

                    $MaleAdmision=$this->input->post('MaleAdmision');
                    
                    $FemaleAdmision=$this->input->post('FemaleAdmision');
                    
                    $MaleStudent=$this->input->post('MaleStudent');

                    $FemaleStudent=$this->input->post('FemaleStudent');

 
                    $PriviousFemaleAdmision=$this->input->post('FemaleOldStudent');

                    $PriviousMaleAdmision=$this->input->post('MaleOldStudent');

                    $IsStudy=$this->input->post('IsStudy');

                    $IsAdmision=$this->input->post('IsAdmision');
                    
                    $IsOldstundents=$this->input->post('IsOldstundents');

                    $NoTotalPriviousStudent=0;
                    
                    $NoTotalAdmisionNextYearStudents=0;

                    $NoTotalStudyStudents=0;

                    if($IsStudy==1)
                    {
                        $NoTotalStudyStudents=($MaleStudent)?$MaleStudent:0+($FemaleStudent)?$FemaleStudent:0;

                    }

                    if($IsAdmision==1)
                    {
                        $NoTotalAdmisionNextYearStudents=($MaleAdmision)?$MaleAdmision:0+($FemaleAdmision)?$FemaleAdmision:0;
 
                    }

                  
                    if($IsOldstundents==1)
                    {
                        $NoTotalPriviousStudent=($PriviousFemaleAdmision)?$PriviousFemaleAdmision:0+($PriviousMaleAdmision)?$PriviousMaleAdmision:0;

                    }
                    

                    

                  
                    $StudyDetails=array(
                                     'is_Study'=>$IsStudy,
                                     'NoStudyBoys'=>$MaleStudent,
                                     'NoStudyGirls'=>$FemaleStudent,
                                     'NoTotalStudyStudents'=>$NoTotalStudyStudents,
                                     'is_AdmisionNextYear'=>$IsAdmision,
                                     'NoTotalAdmisionNextYearStudents'=>$NoTotalAdmisionNextYearStudents,
                                     'NoAdmisionNextYearBoys'=>$MaleAdmision,
                                     'NoAdmisionNextYearGirls'=>$FemaleAdmision,
                                     'is_PriviousStudent'=>$IsOldstundents,
                                     'NoTotalPriviousGirlStudent'=>$PriviousFemaleAdmision,
                                     'NoTotalPriviousBoyStudent'=>$PriviousMaleAdmision,
                                     'NoTotalPriviousStudent'=>$NoTotalPriviousStudent,
                    );

                    $this->Base_Model->update('tbl_study',array('HouseDetailsId'=>$HouseId), $StudyDetails);

                    $this->output->set_status_header('200');

                    echo json_encode('success');

                } else {

                    /**
                     *  database prb show in here or query prb
                     */
                    echo 'Database Problem Occur';

                }

            } else {
               
                $this->output->set_status_header('400');
               
                echo json_encode($this->form_validation->error_array());

            }


    }






    public function details($id)
    {
        $this->_AdminPrivilegeChecking('AdminView');

        //read vendor details from database


        $this->data['user_details']=$this->Base_Model->select('tbl_member','*',$where=array('Id'=>$id),$order_desc=null,$order_asc=null,$limit=null,$start=null,$return='row_array');
	
        //	print_r($this->data['area_details']);
      
          echo json_encode($this->data['user_details'],true);

    }

   





//delete data from tbl_user

    public function delete()
    {

        $this->_AdminPrivilegeChecking('AdminDelete');

//checking for update button

        if (isset($_POST['delete'])) {

            //validate form data

            $this->form_validation->set_rules('delete_Admin_id', 'Delete Admin', 'required');

            //SET Delete status mode
            $Admin_details = array('StatusId' => 3);

            if ($this->Base_Model->update('tbl_user', array('UserId' => $this->input->post('delete_Admin_id')), $Admin_details)) {

                //$this->notification($usertypeid = $this->input->post('delete_Admin_id'), 'AdminDelete', $message = ' Account is Deleted ', $icon = '<i class="fa fa-plus"></i>');

                //set flash message

                $this->session->set_flashdata('success', 'Successfully Delete Admin Account');

                //redirect to Admin page

                redirect('backend/admin/user/admin/admin', 'refresh');

            } else {
                //its database prb show in here or query prb

                echo 'Database Problem Occure';


            }

        }

    }

}
