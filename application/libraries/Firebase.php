<?php

/**
 * @author Mubashir
 */
class Firebase
{
    /**
     * resource:- here store all data
    */

    protected $resource = array();


    /**
     * Authentication
    */

    protected $Authentication;

   /**
   * Sending Url
   */
    protected $url="https://fcm.googleapis.com/fcm/send";

   /**
    * CURLOPT MAXREDIRS
    */

    protected $CURLOPT_MAXREDIRS=10;


   /**
    * CURLOPT TIMEOUT
    */

    protected $CURLOPT_TIMEOUT=30;

       // push message title
    protected $title;
    
    private $data;
    
    private $image;
    
    private $body;

    protected $click_action;

    protected $subtitle;

    protected $to;

    protected $tablename='tbl_user';

   


    // push message payload
    private $payload;
    
      // flag indicating whether to show the push
       // notification or not
       // this flag will be useful when perform some operation
       // in background when push is received
    private $is_background;




   
    public function __construct()
    {
        $this->CI = &get_instance();

        $this->Authentication=$this->CI->config->item('FIREBASE_API_KEY');

    }

  public function setTo($to)
    {
        $this->resource['to'] = $to;
    }

  public function setUserTypeId($UserId)
    {
        $UserInformation=$this->CI->Base_Model->select($this->tablename,'*',array('UserId'=>$UserId));
        $this->resource['to'] = $UserInformation['FCM_Token'];
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function setBody($body)
    {
        $this->body=$body;
    }

    public function setData($data)
    {
        $this->data = $data;
    }

    public function setImage($imageUrl)
    {
        $this->image = $imageUrl;
    }

    public function setPayload($payload)
    {
        $this->payload = $payload;
    }

    public function setSubTitle($subtitle)
    {
        $this->subtitle = $subtitle;
    }

    public function setIsBackground($is_background)
    {
        $this->is_background = $is_background;
    }

    public function setClick_action($click_action)
    {
        $this->click_action = $click_action;
    }


    public function getPush()
    {
   

        if($this->payload)
        {

            
            $this->resource['data']['payload']=$this->payload;
       
        }
     else
        {
        if(!empty($this->title))
        {
            $this->resource['notification']['title'] = $this->title;    
        }
        
        if(!empty($this->data))
        {
            $this->resource['data'] = $this->data;  
        }

        if(!empty($this->body))
        {
            $this->resource['notification']['text']=$this->body;
        }

        if(!empty($this->image))
        {
            $this->resource['notification']['image']=$this->image;
        }

        
        if(!empty($this->click_action))
        {
            $this->resource['notification']['click_action']=$this->click_action;
        }

        
        if(!empty($this->subtitle))
        {
            $this->resource['notification']['subtitle']=$this->subtitle;
        }

       
        $this->resource['notification']['is_background'] = true;
        

        $this->resource['notification']['badge'] = '1';

        $this->resource['notification']['sound'] = 'default';
        
        $this->resource['notification']['timestamp'] = date('Y-m-d G:i:s');    
       }
    }



    public function SendNotification()
    {

       
        $this->getPush();

        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => $this->url,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => $this->CURLOPT_MAXREDIRS,
          CURLOPT_TIMEOUT => $this->CURLOPT_TIMEOUT,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => json_encode($this->resource),
          CURLOPT_HTTPHEADER => array(
            "Authorization: key=".$this->Authentication,
            "Content-Type: application/json",
            "Postman-Token: 798c1ff4-ea71-4eab-9dc0-c187008ae466",
            "cache-control: no-cache"
          ),
        ));
        
        
        $response = curl_exec($curl);
        
        $err = curl_error($curl);
        // if ($err) {
        //     echo "cURL Error #:" . $err;
        //   } else {
        //     echo $response;
        //   }

        curl_close($curl);
        


    }
}
