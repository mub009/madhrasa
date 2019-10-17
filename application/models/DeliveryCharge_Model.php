<?php

class DeliveryCharge_Model extends CI_Model
{

 public function __construct()
 {

  parent::__construct();

  $this->load->database();

 }

 public function charge($vendorUserTypeId, $AddressId)
 {

  try
  {

   if ($addressDetails = $this->Base_Model->select('tbl_address', 'Latitude,Longitude', $where = array('StatusId !=' => 3, 'tbl_address.AddressId' => $AddressId))) {

    if ($vendordetails = $this->Base_Model->select('tbl_vendor', 'latitude,longitude', $where = array('tbl_vendor.UserId' => $vendorUserTypeId))) {

     $url = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=" . $vendordetails['latitude'] . "," . $vendordetails['longitude'] . "&destinations=" . $addressDetails['Latitude'] . "," . $addressDetails['Longitude'] . "&key=" . $this->config->item('GoogleAPIKey');

     $json_decode = $this->Base_Model->CURL($url);

     $flag = 0;

     $delivery = 'free';

     //sss

     if ('NOT_FOUND' != $json_decode->rows[0]->elements[0]->status and 'ZERO_RESULTS' != $json_decode->rows[0]->elements[0]->status) {

      if (!empty($km = explode(' ', $json_decode->rows[0]->elements[0]->distance->text))) {

       if ($query = $this->Base_Model->query("SELECT * FROM tbl_shipping_settings where tbl_shipping_settings.VendorUserTypeId='" . $vendorUserTypeId . "'", 'row_array')) {

        if ($query['maximum_distance'] >= $km[0]) {

         if ($delivery_charge = $this->Base_Model->query("SELECT * FROM tbl_shipping_charge where VendorUserTypeId='" . $vendorUserTypeId . "' and KM >='" . $km[0] . "' ORDER BY `id` ASC", 'row_array')) {

          json_output(200, array('delivery' => $delivery_charge['charge'], 'minAmntForFreeDelivery' => $delivery_charge['PurchaseAmountAfterFreeDelivery'], 'km' => $km[0]));

         } else {
          json_output(200, array('delivery' => 'NO Delivery', 'minAmntForFreeDelivery' => 0, 'km' => $km[0]));

         }

        } else {

         json_output(200, array('delivery' => 'No Delivery', 'minAmntForFreeDelivery' => '', 'km' => $km[0]));

        }

       } else {
        json_output(200, array('delivery' => 'No Delivery', 'minAmntForFreeDelivery' => '', 'km' => $km[0]));

       }

      } else {
       json_output(400, array('google api prb'));
      }
     } else {

      json_output(200, array('delivery' => 'No Delivery', 'minAmntForFreeDelivery' => '', 'km' => 0));

      ///sss
      //json_output(400,'invalid Address');
     }
    } else {
     json_output(400, 'invalid Address');
    }
   } else {
    json_output(400, 'invalid Address');
   }
  } catch (exception $e) {

   print_r($e);
  }

 }


 public function ReturnCharge($vendorUserTypeId, $AddressId,$amount)
 {

  try
  {
 

   if ($addressDetails = $this->Base_Model->select('tbl_address', 'Latitude,Longitude', $where = array('StatusId !=' => 3, 'tbl_address.AddressId' => $AddressId))) {

    if ($vendordetails = $this->Base_Model->select('tbl_vendor', 'latitude,longitude', $where = array('tbl_vendor.UserId' => $vendorUserTypeId))) {

     $url = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=" . $vendordetails['latitude'] . "," . $vendordetails['longitude'] . "&destinations=" . $addressDetails['Latitude'] . "," . $addressDetails['Longitude'] . "&key=" . $this->config->item('GoogleAPIKey');

     $json_decode = $this->Base_Model->CURL($url);

     $flag = 0;

     $delivery = 'free';

     //sss



     if ('NOT_FOUND' != $json_decode->rows[0]->elements[0]->status and 'ZERO_RESULTS' != $json_decode->rows[0]->elements[0]->status) {

      if (!empty($km = explode(' ', $json_decode->rows[0]->elements[0]->distance->text))) {

       if ($query = $this->Base_Model->query("SELECT * FROM tbl_shipping_settings where tbl_shipping_settings.VendorUserTypeId='" . $vendorUserTypeId . "'", 'row_array')) {


        if ($query['maximum_distance'] >= $km[0]) {

         if ($delivery_charge = $this->Base_Model->query("SELECT * FROM tbl_shipping_charge where VendorUserTypeId='" . $vendorUserTypeId . "' and KM >='" . $km[0] . "' ORDER BY `id` ASC", 'row_array')) {

            if($delivery_charge['PurchaseAmountAfterFreeDelivery']>$amount)
            {
               
                return $delivery_charge['charge'];

            }
            else
            {
                return 0;
            }
         
         } else {
              
            return false;
         }

        } else {

         return false;

        }

       } else {

        return false;
       }

      } else {
        return false;
   
    }
     } else {

   
        return false;
   
     }
    } else {
        return false;
        }
   } else {
  
    return false;
    }
  } catch (exception $e) {

    return false;
  }

 }




}
