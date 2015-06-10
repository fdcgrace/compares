<?php
class myTools{

  public static function setTime($set,$time=''){
    if(!$time){
      $time = time();
    }
    if(is_numeric($time)){
      return strtotime($set,$time);
    }else{
      return strtotime($set,strtotime($time));
    }	
  }
  
  public static function myDate($date=''){
    if($date){
      if(is_numeric($date)){
        $timestamp = $date;
      }else{
        $timestamp = strtotime($date);
      }
    }else{
      $timestamp = time();
    }
    return date('Y-m-d H:i:s',$timestamp);
  }
  
  public static function display($var){
    echo '<pre>';
    print_r($var);
    echo '</pre>';
  }
  
  public static function encode($string, $key=''){
    if(!$key){
      $key = Configure::read('Security.salt');
    }else{
      $key = $key.Configure::read('Security.salt');
    }
    $result = '';
    for($i=0; $i<strlen($string); $i++){
      $char = substr($string, $i, 1);
      $keychar = substr($key, ($i % strlen($key))-1, 1);
      $char = chr(ord($char)+ord($keychar));
      $result.=$char;
    }
    return rtrim(strtr(base64_encode($result),'+/', '-_'), '=');
  }

  public static function decode($string, $key='') {
    if(!$key){
      $key = Configure::read('Security.salt');
    }else{
      $key = $key.Configure::read('Security.salt');
    }
    $result = '';
    $string = base64_decode(str_pad(strtr($string, '-_', '+/'), strlen($string) % 4, '=', STR_PAD_RIGHT));
    for($i=0; $i<strlen($string); $i++) {
      $char = substr($string, $i, 1);
      $keychar = substr($key, ($i % strlen($key))-1, 1);
      $char = chr(ord($char)-ord($keychar));
      $result.=$char;
    }
    return $result;
  }
 
  public static function encrypt($password){
    $key = Configure::read('Security.salt');
    return hash('sha512', $key.$password.$key);
  }

  /**
   * Generate random digit/alphabet string
   */
  public static function generateRandomStr($len = 8) {
    $sCharList = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    mt_srand();
    $sRes = "";
    for ($i = 0; $i < $len; $i++) {
      $sRes .= $sCharList{mt_rand(0, strlen($sCharList) - 1)};
    }
    return $sRes;
  }

  public static function disableHTMLTags($value = NULL){
    if(!empty($value)){
      $value = htmlentities($value, ENT_QUOTES | ENT_IGNORE, "UTF-8");
      //$value = strip_tags($value);
    }
    return $value;
  }

  public static function lessonTimeFormatted($lessonTime) {
    $monthDay = date('m/d', strtotime($lessonTime));
    $dy  = date("w", strtotime($lessonTime));
    $timeStart  = date("H:i", strtotime($lessonTime));
    $endTime = date("H:i", strtotime($timeStart)+(25*60));
   
    $dys = array("日","月","火","水","木","金","土");
    $dyj = $dys[$dy];
    $new_date = $monthDay . '(' . $dyj . ') ' .$timeStart .'~' .$endTime;
    
    return $new_date;
  }

	// return true if has special characters or non-English alphabets characters
	public static function hasSpecialChars($string = null) {
		if (!ctype_alnum(trim(str_replace(' ', '', $string))) || (strlen($string) !=  mb_strlen($string, 'utf-8'))) {
			return true; 
		} else {
			return false;
		}
	}
	
	

}