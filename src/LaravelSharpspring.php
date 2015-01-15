<?php namespace Innesm4\LaravelSharpspring;

use Illuminate\Support\Collection;
use Response;
use DateTime;

class LaravelSharpspring {

    /**
     * @var string
     */
    protected $accountID;
    /**
     * @var string
     */
    protected $secretKey;

    /**
     * @param string $accountID 
     * @param string $secretKey
     */
    public function __construct($accountID = '', $secretKey = '')
    {
        $this->accountID = $accountID;
        $this->secretKey = $secretKey;
    }

    /**
     * @param array $data
     */
    private function runQuery($data)
    {
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
      $query = json_decode(curl_exec($ch));
      curl_close($ch); 

      return $query;

    }

    /**
     * @param \DateTime $date
     */
    private function newDate($date)
    {
        return new DateTime($date);
    }

    /**
     * @param int $limit 
     * @param int $offset
     * @return Collection
     */
    public function getLeads($limit = 20, $offset = 0)
    {
       $method = 'getLeads';                                                                 
       $params = array('where' => array(), 'limit' => $limit, 'offset' => $offset);          
       $requestID = session_id();                                                       

       $data = array(                                                                              
           'method' => $method,                                                               
           'params' => $params,                                                                  
           'id' => $requestID                                                                     
       );                                                                                          

       $getLeads = $this->runQuery($data);    

       if ($getLeads->error){
          return Response::json($getLeads->error);
       }

       return Response::json($getLeads->result);      
        
    }

    /**
     * @param timestamp $startDate 
     * @param timestamp $endDate
     * @return Collection
     */
    public function getLeadsDateRange($startDate, $endDate)
    {
      $method = 'getLeadsDateRange';
      $startDate = $this->newDate($startDate);     
      $endDate = $this->newDate($endDate);
                                                                
      $params = array('startDate' => $startDate->format("Y-m-d H:i:s"), 'endDate' => $endDate->format("Y-m-d H:i:s"), 'timestamp' => 'create');          
      $requestID = session_id();                                                       

      $data = array(                                                                               
         'method' => $method,                                                               
         'params' => $params,                                                                  
         'id' => $requestID                                                                     
      );                                                                                          

      $getLeadsDateRange = $this->runQuery($data);

      if ($getLeadsDateRange->error){
          return Response::json($getLeadsDateRange->error);
      }  

      return Response::json($getLeadsDateRange->result);   

    }

    /**
     * @param int $limit 
     * @param int $offset
     * @return Collection
     */
    public function getOpportunities($limit = 20, $offset = 0)
    {
       $method = 'getOpportunities';                                                              
       $params = array('where' => array(), 'limit' => $limit, 'offset' => $offset);          
       $requestID = session_id();                                                       

       $data = array(                                                                              
           'method' => $method,                                                               
           'params' => $params,                                                                  
           'id' => $requestID                                                                     
       );                                                                                          

       $getOpportunities = $this->runQuery($data);  

       if ($getOpportunities->error){
          return Response::json($getOpportunities->error);
       }    

       return Response::json($getOpportunities->result);      
        
    }

    /**
     * @param timestamp $startDate 
     * @param timestamp $endDate
     * @return Collection
     */
    public function getOpportunitiesDateRange($startDate, $endDate)
    {
      $method = 'getOpportunitiesDateRange';
      $startDate = $this->newDate($startDate);     
      $endDate = $this->newDate($endDate);
                                                                
      $params = array('startDate' => $startDate->format("Y-m-d H:i:s"), 'endDate' => $endDate->format("Y-m-d H:i:s"), 'timestamp' => 'create');          
      $requestID = session_id();                                                       

      $data = array(                                                                               
         'method' => $method,                                                               
         'params' => $params,                                                                  
         'id' => $requestID                                                                     
      );                                                                                          

      $getOpportunitiesDateRange = $this->runQuery($data); 
      
      if ($getOpportunitiesDateRange->error){
          return Response::json($getOpportunitiesDateRange->error);
      }  

      return Response::json($getOpportunitiesDateRange->result);  
    }

    /**
     * @param int $limit 
     * @param int $offset
     * @return Collection
     */
    public function getOpportunityLeads($limit = 20, $offset = 0)
    {
       $method = 'getOpportunityLeads';                                                              
       $params = array('where' => array(), 'limit' => $limit, 'offset' => $offset);          
       $requestID = session_id();                                                       

       $data = array(                                                                              
           'method' => $method,                                                               
           'params' => $params,                                                                  
           'id' => $requestID                                                                     
       );                                                                                          

       $getOpportunityLeads = $this->runQuery($data);  

       if ($getOpportunityLeads->error){
          return Response::json($getOpportunityLeads->error);
       }   

       return Response::json($getOpportunityLeads->result);      
        
    }

    /**
     * @param timestamp $startDate 
     * @param timestamp $endDate
     * @return Collection
     */
    public function getOpportunityLeadsDateRange($startDate, $endDate)
    {
      $method = 'getOpportunityLeadsDateRange';
      $startDate = $this->newDate($startDate);     
      $endDate = $this->newDate($endDate);
                                                                
      $params = array('startDate' => $startDate->format("Y-m-d H:i:s"), 'endDate' => $endDate->format("Y-m-d H:i:s"), 'timestamp' => 'create');          
      $requestID = session_id();                                                       

      $data = array(                                                                               
         'method' => $method,                                                               
         'params' => $params,                                                                  
         'id' => $requestID                                                                     
      );                                                                                          

      $getOpportunityLeadsDateRange = $this->runQuery($data); 

      if ($getOpportunityLeadsDateRange->error){
          return Response::json($getOpportunityLeadsDateRange->error);
      } 

      return Response::json($getOpportunityLeadsDateRange->result);  
    }

    /**
     * @param int $limit 
     * @param int $offset
     * @return Collection
     */
    public function getAccounts($limit = 20, $offset = 0)
    {
       $method = 'getAccounts';                                                              
       $params = array('where' => array(), 'limit' => $limit, 'offset' => $offset);          
       $requestID = session_id();                                                       

       $data = array(                                                                              
           'method' => $method,                                                               
           'params' => $params,                                                                  
           'id' => $requestID                                                                     
       );                                                                                          

       $getAccounts = $this->runQuery($data);  

        if ($getAccounts->error){
          return Response::json($getAccounts->error);
        } 

       return Response::json($getAccounts->result);   
    }

    /**
     * @param timestamp $startDate 
     * @param timestamp $endDate
     * @return Collection
     */
    public function getAccountsDateRange($startDate, $endDate)
    {
      $method = 'getAccountsDateRange';
      $startDate = $this->newDate($startDate);     
      $endDate = $this->newDate($endDate);
                                                                
      $params = array('startDate' => $startDate->format("Y-m-d H:i:s"), 'endDate' => $endDate->format("Y-m-d H:i:s"), 'timestamp' => 'create');          
      $requestID = session_id();                                                       

      $data = array(                                                                               
         'method' => $method,                                                               
         'params' => $params,                                                                  
         'id' => $requestID                                                                     
      );                                                                                          

      $getAccountsDateRange = $this->runQuery($data); 

      if ($getAccountsDateRange->error){
          return Response::json($getAccountsDateRange->error);
      }  

      return Response::json($getAccountsDateRange->result);  
    }

    /**
     * @param int $limit 
     * @param int $offset
     * @return Collection
     */
    public function getCampaigns($limit = 20, $offset = 0)
    {
       $method = 'getCampaigns';                                                              
       $params = array('where' => array(), 'limit' => $limit, 'offset' => $offset);          
       $requestID = session_id();                                                       

       $data = array(                                                                              
           'method' => $method,                                                               
           'params' => $params,                                                                  
           'id' => $requestID                                                                     
       );                                                                                          

       $getCampaigns = $this->runQuery($data);

       if ($getCampaigns->error){
          return Response::json($getCampaigns->error);
       }     

       return Response::json($getCampaigns->result);   
    }

    /**
     * @param timestamp $startDate 
     * @param timestamp $endDate
     * @return Collection
     */
    public function getCampaignsDateRange($startDate, $endDate)
    {
      $method = 'getCampaignsDateRange';
      $startDate = $this->newDate($startDate);     
      $endDate = $this->newDate($endDate);
                                                                
      $params = array('startDate' => $startDate->format("Y-m-d H:i:s"), 'endDate' => $endDate->format("Y-m-d H:i:s"), 'timestamp' => 'create');          
      $requestID = session_id();                                                       

      $data = array(                                                                               
         'method' => $method,                                                               
         'params' => $params,                                                                  
         'id' => $requestID                                                                     
      );                                                                                          

      $getCampaignsDateRange = $this->runQuery($data);

      if ($getCampaignsDateRange->error){
          return Response::json($getCampaignsDateRange->error);
      }   

      return Response::json($getCampaignsDateRange->result);  
    }


}
