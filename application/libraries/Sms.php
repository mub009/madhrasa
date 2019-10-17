<?php

/**
* @author Mubashir
*/

class Sms
{

 /**
   * message
   */

  protected $message;
  /**
   * @var Strings
   * store message contents like as otp
   */

  /**
   * Otp
   */

  protected $otp;
  /**
   * @var int
   * Store rand number
   */


  /**
   * Sender Name
   */

  protected $senderName='DMLIFE';
   /**
   * @var Strings
   * Store sender Name
   */


  public function __construct()
  {
      $this->CI = &get_instance();

  }

  public function thirdpartysmslink($message,$mobile_number,$senderName)
  {

      return "http://103.16.101.52:8080/sendsms/bulksms?username=fazi-metro&password=metro123&type=0&dlr=1&destination=".urlencode($mobile_number)."&source=".urlencode($senderName)."&message=".urlencode($message);
  }


  public function OTP_service($MobileNumber)
  {


      $url=$this->thirdpartysmslink($this->OTP_message(), $MobileNumber,$this->senderName);

      $this->CI->Base_Model->CURL($url);

      return $this->otp;

  }

  public function OTP_message()
  {
      $this->otp=rand(1000, 9999);

      return $message="Your one time password is ".$this->otp." Please use this One Time Password(OTP) within the next one minutes to proceed.";
  }

  public function ReadUserType($Mobilenumber,$Country)
  {

   return $this->CI->Base_Model->select('tbl_user', $data = '*', array('CountryId'=>$Country,'MobileNo'=>$Mobilenumber));

  }





  

  
 





}