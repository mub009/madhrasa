<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|    example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|    https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|    $route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|    $route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|    $route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:    my-controller/index    -> my_controller/index
|        my-controller/my-method    -> my_controller/my_method
 */



$route['default_controller'] = 'common/login/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = false;

//admin panel



//$route['API'] = 'Rest_server';

/** common Api */

//API service


//COUNT API 134 ON 22/APR/19

$route["api/customer_logout"] = "api/frontend/customer/customer/logout";

$route["api/vendor_logout"] = "api/backend/vendor/vendor/logout";

$route["api/supervisor_logout"] = "api/backend/supervisor/supervisor/logout";

$route["api/deliveryboy_logout"] = "api/backend/deliveryboy/deliveryboy/logout";

$route["api/dealer_logout"] = "api/backend/dealer/dealer/logout";


//customer



//logout



$route["api/r_country_list"] = "api/common/country/index";

$route["api/mobile_verification"] = "api/common/mobileverification/index";

 $route["api/login_checking"]="api/common/mobileverification/login_checking";

 $route["api/sms"]="api/common/mobileverification/sms";

$route["api/r_language_list"] = "api/common/language/index";

$route["api/u_Customer_Language_change"] = "api/frontend/customer/customer/language_change";

$route["api/r_country_checking"] = "api/frontend/customer/customer/country_checking";


$route["api/u_Vendor_Language_change"] = "api/backend/vendor/vendor/language_change";

$route["api/u_Dealer_Language_change"] = "api/backend/dealer/dealer/language_change";


$route["api/u_DeliveryBoy_Language_change"] = "api/backend/deliveryboy/deliveryboy/language_change";


$route["api/u_user_fcm_token"] = "api/common/mobileverification/update_user_fcm_token";



//APP Updation


$route["api/r_app_version_in_ios"] = "api/common/appconfig/IOS";

$route["api/r_app_version_in_apk"] = "api/common/appconfig/APK";


//delivery_charge

// edit



$route["api/r_delivery_charge"] = "api/frontend/customer/Delivery/delivery_charge";


$route["api/r_cart_products"] = "api/frontend/customer/cart/index";

$route["api/r_skipcart_products"] = "api/frontend/customer/Skipcart/index";

$route["api/r_customer_ShopList"] = "api/frontend/customer/shoplist/index";



//$route["api/r_user_ordercancel"] = "api/frontend/customer/Order/ordercancelled";

$route["api/d_user_ordercancelled"] = "api/frontend/customer/order/ordercancelled";

$route["api/customer_order_tracking"]="api/frontend/customer/order/customer_order_tracking";

$route["api/customer_point_calculation"]="api/frontend/customer/order/customer_point_calculation";

$route["api/Get_point"]="api/frontend/customer/order/Get_point";


$route["api/c_customer_registration"] = "api/frontend/customer/register/index";

$route["api/c_shop_favourite"] = "api/frontend/customer/shopfavourite/create";

$route["api/r_favourite_stores"] = "api/frontend/customer/shopfavourite/index";

$route["api/d_shop_favourite"] = "api/frontend/customer/shopfavourite/delete";

$route["api/r_user_profile"] = "api/frontend/customer/customer/index";


$route["api/r_user_wallet_amount"] = "api/frontend/customer/customer/wallet";

$route["api/u_user_profile"] = "api/frontend/customer/customer/updation";

$route["api/r_user_address"] = "api/frontend/customer/address/index";

$route["api/r_user_lasttwodeliveryaddress"] = "api/frontend/customer/address/LastTwoDeliveryAddress";


$route["api/u_user_address"] = "api/frontend/customer/address/update";

$route["api/i_user_address"] = "api/frontend/customer/address/insert";

$route["api/d_user_default_address"] = "api/frontend/customer/address/default_address_change";


$route["api/r_customer_complaints_list"] = "api/frontend/customer/complaints/index";

$route["api/c_customer_complaint"] = "api/frontend/customer/complaints/insert";

$route["api/d_user_address"] = "api/frontend/customer/address/delete";

//$route["api/r_ShopList"] = "api/frontend/customer/vendors/index";


$route["api/r_customer_orders_list"] = "api/frontend/customer/order/index";
//returnpolicy
$route["api/r_returnpolicy"] = "api/frontend/customer/order/returnpolicy";

$route["api/c_order"] = "api/frontend/customer/Order/OrderCreation";

$route["api/r_orders"] = "api/frontend/customer/Order/orders";

$route["api/update_get_point"] = "api/frontend/customer/Order/update_get_point";

$route["api/r_customer_order_profile"] = "api/frontend/customer/order/order_product_list";

$route["api/c_default_store"] = "api/frontend/customer/vendors/set_default_store";

$route["api/r_favourite_stores"] = "api/frontend/customer/shopfavourite/index";

$route["api/r_loyalty_point"] = "api/frontend/customer/loyalty/index";

$route["api/r_loyalty_getpointinpuchasetime"] = "api/frontend/customer/loyalty/GetPointInPuchaseTime";

$route["api/r_validatephonenumber"] = "api/frontend/customer/loyalty/validatePhoneNumber";

$route["api/r_coin_transfer"] = "api/frontend/customer/loyalty/coin_transfer";

$route["api/r_coin_report"] = "api/frontend/customer/loyalty/report";
// report_pending
$route["api/r_report_pending"]= "api/frontend/customer/loyalty/report_pending";

$route["api/r_share_content_list"] = "api/frontend/customer/loyalty/share_content_list";

$route["api/u_share_point"] = "api/frontend/customer/loyalty/share_point";

$route["api/r_dealandoffer"] = "api/frontend/customer/loyalty/View_dealandoffer";
//share_content_creation

//Loyalty

//shop
$route["api/metro_r_categories_shop"] = "api/frontend/shop/categories/MetroShopBasedCategory";

$route["api/r_ShopList"] = "api/frontend/shop/shoplist/index";

$route["api/s_ShopList"] = "api/frontend/shop/shoplist/SearchShopList";

//

$route["api/r_ShopDetails"] = "api/frontend/shop/shoplist/shop_details"; //check this router


$route["api/r_searchbyshop"] = "api/frontend/shop/shoplist/SearchByShop"; //check this router


//directLoadShop

$route["api/r_shop_categories"] = "api/frontend/shop/categories/index";

$route["api/r_categories_shop"] = "api/frontend/shop/categories/shopbasedcategory";

$route["api/r_categories_l"] = "api/frontend/shop/categories/basedcategory";

$route["api/r_shop_products"] = "api/frontend/shop/product/index";

$route["api/r_getProductwitoutPagination"] = "api/frontend/shop/product/getProductwitoutPagination";


//$route["api/r_cart_products"] = "api/frontend/shop/cart/index";

$route["api/r_ShopList_loyality_and_ecommerce"] = "api/frontend/customer/shoplist/loyality_and_ecommerce";

$route["api/r_ShopList_ecommerce_and_loyality"] = "api/frontend/customer/shoplist/ecommerce_and_loyality";


$route["api/r_gift_categories"] = "api/frontend/shop/categories/shopbasedcategory";


//ecomerce


//dealer-side

$route["api/r_vendor_business"] = "api/backend/dealer/vendor/business_type";

$route["api/c_dealer_registration"] = "api/backend/dealer/dealer/updation";

$route["api/u_dealer_profile"] = "api/backend/dealer/dealer/updation";

$route["api/r_vendor_list"] = "api/backend/dealer/vendor/vendor_list";

$route["api/u_block_vendor"] = "api/backend/dealer/vendor/block_vendor";

$route["api/u_unblock_vendor"] = "api/backend/dealer/vendor/unblock_vendor";

$route["api/u_unblock_vendor"] = "api/backend/dealer/vendor/unblock_vendor";

$route["api/c_vendor_by_dealer"] = "api/backend/dealer/vendor/index";

$route["api/r_deliveryboy_profile"] = "api/backend/dealer/deliveryboy/index";

$route["api/c_deliveryboy_by_dealer"] = "api/backend/dealer/deliveryboy/add";

$route["api/r_deliveryboy_list"] = "api/backend/dealer/deliveryboy/deliveryboy_list";

$route["api/c_supervisor_by_dealer"] = "api/backend/dealer/supervisor/index";

$route["api/r_supervisor_list"] = "api/backend/dealer/supervisor/supervisor_list";

$route["api/r_dealer_complaint_list"] = "api/backend/dealer/complaint/index";

$route["api/r_dealer_complaint_chat"] = "api/backend/dealer/complaint/message_list";

$route["api/r_servicelist"] = "api/backend/dealer/service/index";

$route["api/c_Servicecreate"] = "api/backend/dealer/service/createService";

$route["api/r_packages"] = "api/backend/dealer/package/index";



//vendor-side


$route["api/r_vendor_shipping_distance"] = "api/backend/vendor/shippingcharge/index";

$route["api/u_vendor_shipping_distance"] = "api/backend/vendor/shippingcharge/maximumDistance";

$route["api/c_vendor_shipping_distance"] = "api/backend/vendor/shippingcharge/add";

// add

$route["api/r_vendor_individual_dealsandoffer"] = "api/backend/vendor/dealsandoffer/read";

$route["api/r_vendor_dealandoffer"] =    "api/backend/vendor/dealsandoffer/index";

$route["api/c_vendor_Redeempoint"] = "api/backend/vendor/loyalty/RedeemPoint";

$route["api/r_vendor_customer_point"] = "api/backend/vendor/loyalty/customer_point";

$route["api/r_vendor_change_point_value"] = "api/backend/vendor/loyalty/change_point_value";




$route["api/r_vendor_salespoint"] = "api/backend/vendor/loyalty/salespoint";

$route["api/c_vendor_point_sale"] = "api/backend/vendor/loyalty/PointSale";

$route["api/r_vendor_cutomer_details"] = "api/backend/vendor/loyalty/customer_details";


$route["api/r_vendor_loyalty_privilege"] = "api/backend/vendor/vendor/loyalty_privilege";

$route["api/r_vendor_password_change"] = "api/backend/vendor/vendor/change_password";

$route["api/r_vendor_forgotpassword"] = "api/backend/vendor/vendor/ForgotPassword";


$route["api/r_vendor_onlinestatus"] = "api/backend/vendor/vendor/is_online";

$route["api/u_vendor_onlinestatus"] = "api/backend/vendor/vendor/update_is_online";



$route["api/r_vendor_orders_return_confirm_list"] = "api/backend/vendor/order/index";


$route["api/c_vendor_registration"] = "api/backend/vendor/vendor/updation";

$route["api/r_vendor_profile"] = "api/backend/vendor/vendor/index";

$route["api/r_vendor_orders_return_confirm_list"] = "api/backend/vendor/order/index";


$route["api/r_vendor_orders_list"] = "api/backend/vendor/order/index";

$route["api/r_vendor_confirm_list"] = "api/backend/vendor/order/confirm_list";

$route["api/r_vendor_assigned_list"] = "api/backend/vendor/order/assigned_list";

$route["api/u_vendor_packed"] = "api/backend/vendor/order/vendor_packed";

$route["api/r_vendor_ready_pickup"] = "api/backend/vendor/order/ready_pickup_list";

$route["api/r_vendor_dispatch_list"] = "api/backend/vendor/order/dispatched_list";

$route["api/vendor_order_tracking"]="api/backend/vendor/order/vendor_order_tracking";

$route["api/r_vendor_deliverboy_list_status"] = "api/backend/vendor/order/vendor_deliverboy_list_status";

$route["api/r_vendor_deliverboy_list_details"] = "api/backend/vendor/order/deliverboy_list_details";

$route["api/r_vendor_product_deliverboy"] = "api/backend/vendor/order/vendor_product_deliverboy";

$route["api/r_vendor_delivery_boy_orderlist"] = "api/backend/vendor/order/delivery_boy_order_list";

$route["api/r_vendor_dispatch_profile"] = "api/backend/vendor/order/dispatched_profile";

$route["api/r_vendor_delivered_list"] = "api/backend/vendor/order/delivered_list";

$route["api/r_vendor_returned_list"] = "api/backend/vendor/order/returned_list";

$route["api/u_vendor_active_print"] = "api/backend/vendor/order/active_print";

$route["api/r_vendor_cancelled_list"] = "api/backend/vendor/order/cancelled_list";

$route["api/r_vendor_order_profile"] = "api/backend/vendor/order/order_detail";

$route["api/r_ondeliveryboys_list"] = "api/backend/vendor/deliveryboy/index";

$route["api/r_vendor_summary_list"] = "api/backend/vendor/order/summary_list";

$route["api/r_vendor_product_list"] = "api/backend/vendor/Product/index";

$route["api/r_vendor_product_price_list"] = "api/backend/vendor/Product/price_list";

$route["api/r_vendor_product_tick"] = "api/backend/vendor/Product/product_updation";

$route["api/r_vendor_tax_list"] = "api/backend/vendor/Tax/index";

$route["api/r_vendor_product_tax_list"] = "api/backend/vendor/Tax/product_based_tax_list";

$route["api/u_vendor_product_commission"] = "api/backend/vendor/Commission/product_based_update";

$route["api/u_vendor_product_tax"] = "api/backend/vendor/Tax/product_based_update";

$route["api/d_vendor_product_price_delete"] = "api/backend/vendor/Product/price_delete";

$route["api/u_vendor_product_price_update"] = "api/backend/vendor/Product/price_updation";

$route["api/c_vendor_product_price_add"] = "api/backend/vendor/Product/price_add";

$route["api/r_vendor_product_category"] = "api/backend/vendor/Product/Category";

$route["api/r_vendor_deliveryboy_list"] = "api/backend/vendor/Deliveryboy/index";

$route["api/c_vendor_deliveryboy"] = "api/backend/vendor/Deliveryboy/c_vendor_deliveryboy";

$route["api/d_vendor_cancel_order"] = "api/backend/vendor/Order/cancel_order";

$route["api/u_vendor_order_confirmation"] = "api/backend/vendor/Order/assign_order";

$route["api/u_vendor_selfiepoint"] = "api/backend/vendor/selfiepoint/update";

$route["api/u_selfie_on_and_off"] = "api/backend/vendor/selfiepoint/Selfie_On_and_Off";

$route["api/r_selfie_on_and_off"] = "api/backend/vendor/selfiepoint/read_Selfie_On_and_Off";

$route["api/c_dealandoffer"] =    "api/backend/vendor/dealsandoffer/dealandoffercreation";

$route["api/r_vendor_deal_category"] = "api/backend/vendor/dealsandoffer/category";

$route["api/r_vendor_deals_productlist"] = "api/backend/vendor/Product/subcategory_based_productlist";

$route["api/u_vendor_bagstatus_completed"] = "api/backend/vendor/Order/vendor_bagstatus_completed";

//GIFT


$route["api/r_gift_category"] = "api/frontend/customer/Shoplist/get_gift_category";

$route["api/r_gift_category_items"] = "api/frontend/customer/Shoplist/get_gift_category_items";

$route["api/r_businesstype"] = "api/frontend/shop/Shoplist/businesstype";

//subcategory_based_productlist



//vendor_tax

$route["api/c_vendor_tax"] = "api/backend/vendor/Tax/insert";

$route["api/u_vendor_tax"] = "api/backend/vendor/Tax/update";

$route["api/d_vendor_tax"] = "api/backend/vendor/Tax/delete";

//vendor_deals

$route["api/r_vendor_category"] = "api/backend/vendor/Deal/index";

$route["api/r_vendor_subcategory"] = "api/backend/vendor/Deal/get_sub_category";

$route["api/r_vendor_products"] = "api/backend/vendor/Deal/get_products";

$route["api/r_vendor_product_packages"] = "api/backend/vendor/Deal/get_packages";

$route["api/c_vendor_normal_deal"] = "api/backend/vendor/Deal/create_normal_deal";

$route["api/c_vendor_product_deal"] = "api/backend/vendor/Deal/create_product_deal";


$route["api/c_vendor_OrderReturnInDeliveryTime"] = "api/backend/vendor/order/OrderReturnInDeliveryTime";


$route["api/u_vendor_change_bag_status"] = "api/backend/vendor/order/change_bag_status";

$route["api/r_vendor_bill_list"] = "api/backend/vendor/order/deliveryboy_bill_list";

$route["api/u_vendor_delivered"] = "api/backend/vendor/order/order_delivered";
//supervisor-side

$route["api/c_supervisor_registration"] = "api/backend/supervisor/supervisor/updation";

$route["api/r_supervisor_profile"] = "api/backend/supervisor/supervisor/index";

$route["api/r_supervisor_vendors_list"] = "api/backend/supervisor/vendors/index";

$route["api/r_supervisor_orders_list"] = "api/backend/supervisor/orders/index";

$route["api/r_supervisor_recentorders_list"] = "api/backend/supervisor/orders/recent_orders";

//deliveryboy-side


$route["api/c_deliveryboy_thirdpatydeliveryboy_group"] = "api/backend/vendor/deliveryboy/c_thirdpatydeliveryboy";

$route["api/c_deliveryboy_OrderReturnInDeliveryTime"] = "api/backend/deliveryboy/orders/OrderReturnInDeliveryTime";




$route["api/u_deliveryboy_nextToDeliver"] = "api/backend/deliveryboy/orders/next_to_deliver";

$route["api/r_register_deliveryboy"] = "api/backend/deliveryboy/deliveryboy/updation";

$route["api/r_deliveryboy_assigned_list"] = "api/backend/deliveryboy/orders/index";

$route["api/r_deliveryboy_readypickup_list"] = "api/backend/deliveryboy/orders/ready_pickup_orders";

$route["api/r_deliveryboy_dispatch_list"] = "api/backend/deliveryboy/orders/dispatched_orders";

$route["api/u_deliveryboy_pickup"] = "api/backend/deliveryboy/orders/order_pick_up";

$route["api/u_deliveryboy_delivered"] = "api/backend/deliveryboy/orders/order_delivered";

$route["api/u_deliveryboy_delivery_completed"] = "api/backend/deliveryboy/orders/order_delivery_completed";

$route["api/r_deliveryboy_returns_list"] = "api/backend/deliveryboy/orders/cancel_return_orders";

$route["api/r_deliveryboy_bill_list"] = "api/backend/deliveryboy/orders/deliveryboy_bill_list";

$route["api/change_status"] = "api/backend/deliveryboy/orders/change_status";


$route["api/change_bag_status"]= "api/backend/deliveryboy/orders/change_bag_status";

$route["api/r_deliveryboy_based_on_last_trip_cancel_list"] = "api/backend/deliveryboy/orders/based_on_last_cancel_list";

$route["api/c_end_of_delivery"] = "api/backend/deliveryboy/orders/end_of_delivery";

$route["api/r_cancelled_order_list"] = "api/backend/deliveryboy/orders/cancelled_order_list";

$route["api/r_delivery_items_base_of_status"] = "api/backend/deliveryboy/orders/delivery_items_base_of_status";


//thirdparty deliveryboy



$route["api/r_thirdpartydeliveryboy_vendorlistbasedonassignlist"] = "api/backend/deliveryboy/thirdpartydeliveryboyorder/VendorListBasedOnAssignList";

$route["api/r_thirdpartydeliveryboy_assignlist"] = "api/backend/deliveryboy/thirdpartydeliveryboyorder/assignList";

$route["api/r_thirdpartydeliveryboy_vendorlistbasedonpickuplist"] = "api/backend/deliveryboy/thirdpartydeliveryboyorder/VendorListBasedOnPickupList";

$route["api/r_thirdpartydeliveryboy_pickuplist"] = "api/backend/deliveryboy/thirdpartydeliveryboyorder/PickupList";

$route["api/r_thirdpartydeliveryboy_vendorlistbasedondispatchedlist"] = "api/backend/deliveryboy/thirdpartydeliveryboyorder/VendorListBasedOnDispatchedList";

$route["api/r_thirdpartydeliveryboy_dispatchedlist"] = "api/backend/deliveryboy/thirdpartydeliveryboyorder/DispatchedList";

$route["api/r_thirdpartydeliveryboy_vendorlistbasedonreturnproduct"] = "api/backend/deliveryboy/thirdpartydeliveryboyorder/VendorListBasedOnReturnProductList";

$route["api/r_thirdpartydeliveryboy_returnproducts"] = "api/backend/deliveryboy/thirdpartydeliveryboyorder/ReturnProducts";

$route["api/r_thirdpartydeliveryboy_returnorderlist"] = "api/backend/deliveryboy/thirdpartydeliveryboyorder/ReturnOrderList";

$route["api/r_thirdpartydeliveryboy_orderrequestlist"] = "api/backend/deliveryboy/thirdpartydeliveryboyorder/OrderRequestList";

$route["api/r_thirdpartydeliveryboy_orderacceptrequest"] = "api/backend/deliveryboy/thirdpartydeliveryboyorder/OrderAcceptOrDeclineRequest";



//GIFT


$route["api/r_gift_category"] = "api/frontend/customer/Shoplist/get_gift_category";



//cancelled_order

//end_of_delivery

//close common api

/** Freshlemon */

//close freshlemon api

