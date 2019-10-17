<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Legancy
{

    /**
     * assign value
     */
    protected $assign_value=array();

    /**
     * @var array
     * assign particular value from controllers
     */


    /**
     * collecting data
     */
     protected $data=array();

     /**
      * @var array
      * collecting data     
      */

      protected $item_name;



      public function __construct()
      {
  
          // Get the CodeIgniter reference
  
          $this->_CI = &get_instance();
  
      }

    public function design($assign_value=null,$item_name)
    {

      

        if(!empty($assign_value))
        {
           
         
        $this->item_name=$item_name;

        $this->data['legancy']['add']=$this->add();

        $this->data['legancy']['active']=$this-> active();

        $this->data['legancy']['actions']=$this->Actions();

        $this->data['legancy']['block']=$this->Block();

        $this->data['legancy']['pending']=$this->pending();

        $this->data['legancy']['notactive']=$this->notactive();

        $this->data['legancy']['approved']=$this->Approved();

        $this->data['legancy']['view']=$this->view();


        $this->data['legancy']['accountrule']=$this->accountrule();



        


        $this->data['assign_value']=$assign_value;

    

        return $this->_CI->load->view('template/library',$this->data,true);

        }
        else
        {
           return false;
        }
       
    


    }
  

    public function add()
    {
    return "<li> <span class='label label-sm btn blue-hoki'>Add + </span>&nbsp&nbsp Indicate Add new $this->item_name </li><br>";
    }

    public function active ()
    {
      return "<li> <span class='label label-sm btn green-jungle'> Active </span>&nbsp&nbsp Indicate $this->item_name Item is Active </li><br>";
    }

    public function  Actions ()
    {
   return "<li> <span class='label label-sm label-danger'> Actions </span>&nbsp&nbsp Indicate Edit and Delete $this->item_name </li><br>";
    }

    public function  Block ()
    {
   return "<li><span class='label label-sm btn purple-soft'>Block </span>&nbsp&nbsp Indicate $this->item_name Item is Block </li><br>";
    }

    public function pending()
    {
    return "<li> <span class='label label-sm label-info'> Pending </span>&nbsp;&nbsp; Indicate for account is pending </li><br>";
    }

    public function notactive()
    {
    return " <li> <span class='label label-sm label-warning'> Not Active </span>&nbsp;&nbsp; Indicate for account is Not Active </li><br>";
    }

    public function Approved()
    {
    return " <li> <span class='label label-sm label-success'> Approved </span>&nbsp;&nbsp; Indicate for account is approved </li> <br>";
    }
    
   public function view()
   {
       return"<li> <i class='icon-eye'></i>&nbsp&nbsp Indicates to View $this->item_name</li> <br>";
   }
  
   public function accountrule()
   {
       return"<li><b> Personal Account Rule :-</b> &nbsp&nbsp Debit the Receiver, Credit the Giver </li><br> ";
   }

}
