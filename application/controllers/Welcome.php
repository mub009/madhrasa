<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends MY_Controller
{

    /**
     * Index Page for this controller.
     * mubashir 123qwerty
     *
     * Maps to the following URL
     *         http://example.com/index.php/welcome
     *    - or -
     *         http://example.com/index.php/welcome/index
     *    - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     * 
     */


    public function __construct()
    {

        parent::__construct();

        $this->load->library('image_lib');


    }



    public function index()
	{

    
	}
	

 public function do_upload() {
    

    $imagename=$this->image->DashboardImage();

    $this->load->library('upload', $imagename);

    if ($this->upload->do_upload('userfile')) {

 
        // $image_config=array('width'=>100,'height'=>50,'image'=>'100x50');

        $this->image->image_resize(array('width'=>100,'height'=>50,'image'=>'100x50'),$this->upload->data());

        $this->image->image_resize(array('width'=>200,'height'=>200,'image'=>'400x200'),$this->upload->data());
 
        $this->image->image_resize(array('width'=>300,'height'=>300,'image'=>'800x600'),$this->upload->data());
            
                
}
else
{
    print_r( $this->upload->display_errors());
}

	}
    
    public function curl()
    {
     
         $data = $this->curl->simple_get('http://www.api.google.com/');

    }
    
  public function check_distance_price($json_decode=null)
    {
    
    $flag=0;

    $delivery='free';
   
    $query =$this->Base_Model->query("SELECT * FROM tbl_shippingDistance join tbl_shipping_charge on tbl_shippingDistance.shippingDistanceId=tbl_shipping_charge.shippingDistanceId where tbl_shipping_charge.Vendor_UserType_Id='FLUserType10' and tbl_shippingDistance.StatusId!=3 order by tbl_shippingDistance.`kilometer` asc");

     $km = explode(' ',$json_decode->rows[0]->elements[0]->distance->text);

        foreach ($query as $row)
          {

            if($row['kilometer']>=$km[0] )
            {
              
               $delivery=$row['charge'];
               
               $flag=1;
               
               break;
            }
        
          }


          if($flag==1)
          {
             return $delivery;
          }
          else
          {
              return false;
          }
    }

    
    public function onlineredeem()
    {

      $value = array('dateandtime'=>$this->data['dateAndtime'],'CustomerMobile' =>9072821920, 'InvoiceNo' =>122,
      'PurchaseAmount' =>300, 'VendorUserTypeId' =>12, 'CountryId' =>1, 
      'CustomerPoint' =>300, 'BalanceAmount' =>0);
      if(  $this->LoyalityCoinsModel->onlineredeemcoins($value))
      {
        echo "success";
      }
    else
    {
      echo "fail";
    }

    }
    public function crone_complete()
    {
       // select datas that already updated
        
//select dtas that completed return period
       $delivered=$this->Base_Model->query("select tbl_order.OrderId,tbl_order.getpoint,tbl_order.getpoint_worth,tbl_order.redeem_points,tbl_order.redeem_worthpoints,
       tbl_order.CustomerId,tbl_order.crone_status,tbl_order.getpoint,tbl_order.redeem_points,tbl_order.VendorId,tbl_order.TotalAmount,tbl_order.CustomerMob,tbl_order.total_purchase_amount,tbl_order.TotalAmount ,tbl_user.CountryId 
       
       from tbl_order join tbl_user on tbl_user.UserId=tbl_order.VendorId  where TIMESTAMPDIFF(DAY,`tbl_order`.`DeliveredDate`,'".$this->data['dateAndtime']."')=return_days and crone_status is null" );
       print_r($delivered);
          foreach ($delivered as $row)
          {
            $number = round($row['TotalAmount'] / 10) * 10;
            $value = array(
                'dateandtime'=>$this->data['dateAndtime'],
                'CustomerMobile' => $row['CustomerMob'], 
                'InvoiceNo' => $row['OrderId'],
                'PurchaseAmount' =>$number, 
                'VendorUserTypeId' => $row['VendorId'],
                'CountryId' => $row['CountryId']
                );

                $this->LoyalityCoinsModel->getcoins($value);
                
                $this->Base_Model->update('tbl_order', array('OrderId'=>$row['OrderId']), array('crone_status'=>1));
               }

          }

}    

    

