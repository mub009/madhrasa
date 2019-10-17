<?php

class Truncate_Model extends CI_Model {
	
   protected $tablename=array();

	function __construct()
	{
		parent::__construct();

		$this->tablename();
	}


	public function tablename()
	{
		$this->tablename=array(
			'api_keys',
			'tbl_loyaltyStatus',
			'tbl_orderstatus',
			'tbl_payment_method',
			'tbl_status',
			'tbl_usertypemaster',
			'tbl_settings'
		);
	}

	public function truncateTable($value)
	{
	
		if(!in_array($value,$this->tablename))
		{
		   return true;
		}
		else
		{
			return false;
		}
	}

	public function truncateAll(){


		$table_list=$this->db->list_tables();


		foreach($table_list as $row)
		{

			if($this->truncateTable($row))
			{
				
				$this->db->truncate($row);

			}
		}


        $adminUsertype=array('UserTypeId'=>11,'MobileNo'=>123,'Password'=>'$2y$10$6DZHrxIUdApTdndk.oo69u9EwryBh5MPJkVRNa9cg3wGR/fAs87ZO','OtpVerification'=>1,'CountryId'=>0,'StatusId'=>1);

		$this->Base_Model->insert('tbl_user',$adminUsertype);

        $adminDetails=array('FirstName'=>'Demo','UserId'=>1,'LastName'=>'Demo','MobileNumber'=>1,'Interests'=>'Demo','Occupation'=>'Demo','About'=>'Demo','WebsiteUrl'=>'Demo','ProfilePic'=>'');

		$this->Base_Model->insert('tbl_admin',$adminDetails);

		$language=array('LanguageId'=>'ENG1','Languages'=>'English','StatusId'=>1,'DefaultSettings'=>'default');

		$this->Base_Model->insert('tbl_languagemaster',$language);
		

	}
	

}