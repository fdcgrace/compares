<?php
class CommonTable{
  
  public function __construct($data){
    foreach($data as $var => $val){
      $this->$var = $val;
    }
  }
  
  public function __call($methodName, $params = null){
    $methodPrefix = substr($methodName, 0, 3);
    $key = strtolower(preg_replace('/([a-z])([A-Z])/', '$1_$2',substr($methodName, 3)));
    if($methodPrefix == 'set' && count($params) == 1){
      $value = $params[0];
      $this->$key = $value;
    }
    elseif($methodPrefix == 'get'){      
      if(isset($this->$key)) return $this->$key;
    }
  }
  
}