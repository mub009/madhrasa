<?php

/**
 * @author Ravi Tamada
 * @link URL Tutorial link
 */
class Push
{

    // push message title
    private $title;
    private $message;
    private $image;
    private $body;
    // push message payload
    private $payload;
    // flag indicating whether to show the push
    // notification or not
    // this flag will be useful when perform some opertation
    // in background when push is recevied
    private $is_background;

    public function __construct()
    {
        $this->CI = &get_instance();
        

    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function setBody($body)
    {
        $this->body=$body;
    }

    public function setMessage($message)
    {
        $this->message = $message;
    }

    public function setImage($imageUrl)
    {
        $this->image = $imageUrl;
    }

    public function setPayload($payload)
    {
        $this->payload = $payload;
    }

    public function setIsBackground($is_background)
    {
        $this->is_background = $is_background;
    }

    public function getPush()
    {
        $res = array();

        if(!empty($this->title))
        {
            $res['notification']['title'] = $this->title;    
        }
        
        $res['notification']['is_background'] = true;
        
        if(!empty($this->message))
        {
            $res['notification']['message'] = $this->message;  
        }

        if(!empty($this->body))
        {
            $res['notification']['text']=$this->body;
        }

        
        if(!empty($this->image))
        {
            $res['notification']['image']=$this->image;
        }

        if(!empty($this->payload))
        {
            $res['notification']['payload']=$this->payload;
        }
        
        $res['notification']['badge'] = '1';

        $res['notification']['sound'] = 'default';
        
        $res['notification']['timestamp'] = date('Y-m-d G:i:s');    


        return $res;
    }

}
