<?php namespace Innesm4\LaravelSharpspring;

use Illuminate\Support\Collection;
use Carbon\Carbon;
use Cache;

class LaravelSharpspring {

    /**
     * @var string
     */
    protected $accountID;
    /**
     * @var string
     */
    protected $secretKey;


    public function __construct($accountID = '', $secretKey = '')
    {
        $this->accountID = $accountID;
        $this->secretKey = $secretKey;
    }


    public function testMethod()
    {
       $limit = 500;                                                                         
       $offset = 0;                                                                          
                                                                                              
       $method = 'getLeads';                                                                 
       $params = array('where' => array(), 'limit' => $limit, 'offset' => $offset);          
       $requestID = session_id();                                                       

       $data = array(                                                                               
           'method' => $method,                                                               
           'params' => $params,                                                                  
           'id' => $requestID                                                                     
       );                                                                                            
                                                                                                     
       $queryString = http_build_query(array('accountID' => $this->accountID, 'secretKey' => $this->secretKey)); 
       $url = "http://api.sharpspring.com/pubapi/v1/?$queryString";                             
                                                                                                     
       $data = json_encode($data);                                                                   
       $ch = curl_init($url);                                                                        
       curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                              
       curl_setopt($ch, CURLOPT_POSTFIELDS, $data);                                                  
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                               
       curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                   
           'Content-Type: application/json',                                                         
           'Content-Length: ' . strlen($data)                                                        
       ));                                                                                           
                                                                                                     
       $result = curl_exec($ch);                                                                     
       curl_close($ch);                                                                              
                                                                                                     
       return $result; 
    }


}
