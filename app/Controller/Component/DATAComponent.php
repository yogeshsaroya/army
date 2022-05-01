<?php
class DATAComponent extends Component {
    public $components = array('Session');
    
    public function getrRstrictedCountry(){
        $tbl = ClassRegistry::init('CountryList');
        $data = $tbl->find('list',[ 'conditions'=>[ 'CountryList.region'=>2,'CountryList.status'=>1 ],'fields'=>['CountryList.iso2','CountryList.short_name'] ] );
        return $data;
    }
    
    
    public function getImage($id = null){
        $p = ClassRegistry::init('Library');
        $d = $p->find('first',array('recursive'=>-1,'conditions'=>array('Library.id'=>$id)));
        if(isset($d['Library']['full_path'])){ return $d['Library']['full_path']; }
    }
    
	public function fetch($url)
    {
        if (function_exists('curl_exec')) {
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
            curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36');
            $response = curl_exec($ch);
        }
        if (empty($response)) {
            $response = file_get_contents($url);
        }
        return $response;
    }
	
    public function _curl( $url = null, $output_transaction= null) {
        $process_result = null;
        if(!empty($url) ){
            ob_start();
            $ch = curl_init ($url);
            curl_setopt ($ch, CURLOPT_VERBOSE, 1);
            curl_setopt ($ch, CURLOPT_POST, 1);
            curl_setopt ($ch, CURLOPT_POSTFIELDS, $output_transaction);
            curl_exec ($ch);
            curl_close ($ch);
            $process_result = ob_get_contents();
            ob_end_clean();
        }
        return $process_result;
    }
    
    /*
     * Ref : https://www.exchangerate-api.com/docs/php-currency-api
     * 
     * */
    public function getCurrency() {
        $EUR_price = 0;
        $req_url = 'https://api.exchangerate-api.com/v4/latest/USD';
        $response_json = @file_get_contents($req_url);
        if(false !== $response_json) {
            try {
                $response_object = json_decode($response_json);
                $base_price = 1; // Your price in USD
                $EUR_price = round(($base_price * $response_object->rates->EUR), 2);
            } catch(Exception $e) { }
        }else{
            $httpSocket = new HttpSocket();
            $response = $httpSocket->get($req_url);
            
            if(false !== $response->body) {
                try {
                    $response_object = json_decode($response->body);
                    $base_price = 1; // Your price in USD
                    $EUR_price = round(($base_price * $response_object->rates->EUR), 2);
                } catch(Exception $e) { }
            }
        }
        return $EUR_price;
    }
    
    public function currencyConverter($from_Currency = null,$to_Currency = null,$encode_amount = null) {
    	$converted_currency = 0;
    	if(!empty($from_Currency) && !empty($to_Currency) && !empty($encode_amount)){
    		$from_Currency = urlencode($from_Currency);
    		$to_Currency = urlencode($to_Currency);
    		$url = "https://www.google.com/finance/converter?a=$encode_amount&from=$from_Currency&to=$to_Currency";
    		ec($url);
    		$get = @file_get_contents( $url );
    		if($get === false ){ }
    		else{
    		$get = explode("<span class=bld>",$get);
    		if(isset($get[1])){
	    		$get = explode("</span>",$get[1]);
	    		$converted_currency = preg_replace("/[^0-9\.]/", null, $get[0]);
    		}}
    	}
    	return $converted_currency;
    }
    
    public function order_status(){
        return array( '1'=> 'Pending', '2'=> 'Processing', '3'=> 'Shipped', '4'=> 'Canceled', '5'=> 'Completed', '6'=> 'Denied', '7'=> 'Canceled Reversal',
            '8'=> 'Failed', '9'=> 'Refunded', '10'=> 'Reversed', '11'=> 'Chargeback', '12'=> 'Expired', '13'=> 'Processed', '14'=> 'Voided');
    }
    
    /* those pages have transparent header */
    public function Header_V_2()
    {
    	return array(  'flows'=>array() );
    }
    
    public function getUserData($id = null){
    	$gnArr = array();
    	if(!empty($id)){
    		$u = ClassRegistry::init('User');
    		$gnArr = $u->find('first',array('recursive'=>1,'conditions'=>array('User.id'=>$id)));
    	}
    	return $gnArr;
    }
    
    public function GetWorldName($id = null){
    	$arr = null;
    	if(!empty($id)){
    		$world = ClassRegistry::init('World');
    		$arr = $world->find('first', array('conditions' => array('World.id' => $id)));
    	}
    	return $arr;
    }
    
    
    public function GetWorldNameNew($id = null){
        $arr = null;
        if(!empty($id)){
            $world = ClassRegistry::init('CountryList');
            $arr = $world->find('first', array('conditions' => array('CountryList.id' => $id)));
        }
        return $arr;
    }
    
    
    public function getMenuNumber(){
    	$Arr = array();
    	
    	return $Arr;
    }
    
    
	public function getCountry($id = null) {
			$list = null;
			$world = ClassRegistry::init('World');
			if (!empty($id) && is_numeric($id)) {
				$list = $world->find('list', array('conditions' => array('World.in_location' => $id,'World.status'=>1), 'fields' => array('id','name'),'order'=>array('World.name'=>'ASC')));
			} else {
				$list = $world->find('list', array('conditions' => array('World.type' => 'co', 'World.name IS NOT NULL','World.status'=>1), 'fields' => array('id', 'name'),'order'=>array('World.name'=>'ASC')));
			}
			return $list;
		}


   
    function youtubeID($url) {
        $res = explode("v=", $url);
        if (isset($res[1])) {
            $res1 = explode('&', $res[1]);
            if (isset($res1[1])) {
                $res[1] = $res1[0];
            }
            $res1 = explode('#', $res[1]);
            if (isset($res1[1])) {
                $res[1] = $res1[0];
            }
        }
        return substr($res[1], 0, 12);
        return false;
    }
   
    function CleanHtml($str = null) {
        $str = htmlspecialchars_decode(html_entity_decode($str));
        return $str;
    }

    function ClearStr($str = null) {
        $str = str_replace('\n', '', $str);
        $str = str_replace('\r', '', $str);
        $str = str_replace('\r\n', '', $str);
        $str = stripslashes_deep(trim($str));

        return $str;
    }

    function getBrowser() {
        $u_agent = $_SERVER['HTTP_USER_AGENT'];
        $bname = 'Unknown';
        $platform = 'Unknown';
        $ub = $version = "";

        //First get the platform?
        if (preg_match('/linux/i', $u_agent)) {
            $platform = 'linux';
        } elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
            $platform = 'mac';
        } elseif (preg_match('/windows|win32/i', $u_agent)) {
            $platform = 'windows';
        }
        // Next get the name of the useragent yes seperately and for good reason
        if (preg_match('/MSIE/i', $u_agent) && !preg_match('/Opera/i', $u_agent)) {
            $bname = 'Internet Explorer';
            $ub = "MSIE";
        } elseif (preg_match('/Firefox/i', $u_agent)) {
            $bname = 'Mozilla Firefox';
            $ub = "Firefox";
        } elseif (preg_match('/Chrome/i', $u_agent)) {
            $bname = 'Google Chrome';
            $ub = "Chrome";
        } elseif (preg_match('/Safari/i', $u_agent)) {
            $bname = 'Apple Safari';
            $ub = "Safari";
        } elseif (preg_match('/Opera/i', $u_agent)) {
            $bname = 'Opera';
            $ub = "Opera";
        } elseif (preg_match('/Netscape/i', $u_agent)) {
            $bname = 'Netscape';
            $ub = "Netscape";
        }

        // finally get the correct version number
        $known = array('Version', $ub, 'other');
        $pattern = '#(?<browser>' . join('|', $known) .
                ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
        if (!preg_match_all($pattern, $u_agent, $matches)) {
            // we have no matching number just continue
        }

        // see how many we have
        $i = count($matches['browser']);
        if ($i != 1) {
            //we will have two since we are not using 'other' argument yet
            //see if version is before or after the name
            if (strripos($u_agent, "Version") < strripos($u_agent, $ub)) {
                $version = $matches['version'][0];
            } else {
                $version = $matches['version'][1];
            }
        } else {
            $version = $matches['version'][0];
        }

        // check if we have a number
        if ($version == null || $version == "") {
            $version = "?";
        }

        return array(
            'userAgent' => $u_agent,
            'name' => $bname,
            'version' => $version,
            'platform' => $platform,
            'pattern' => $pattern
        );
    }

    public function SaveGetBrowser($tbl = null, $id = null) {
        $rt = 0;
        if (!empty($tbl) && !empty($id)) {
            $model = ClassRegistry::init($tbl);
            $ua = $this->getBrowser();
            $yourbrowser = "browser: " . $ua['name'] . " " . $ua['version'] . " on " . $ua['platform'] . " reports: <br >" . $ua['userAgent'];
            if ($model->updateAll(array($tbl . '.user_browser' => "'$yourbrowser'"), array($tbl . '.id' => $id))) {
                $rt = 1;
            }
        }
        return $rt;
    }

   
	/**
	 * compress image
	 * @paran source file path, destination path and qulity
	 * @return destination path
	 * */
	function compress_image($source_url, $destination_url, $quality = 100) {
		$r = 1;
		if(file_exists($source_url)){
			$info = getimagesize($source_url);
			if ($info['mime'] == 'image/jpeg'){ 
				$image = imagecreatefromjpeg($source_url);
				imagejpeg($image, $destination_url, $quality);
			}
			elseif ($info['mime'] == 'image/gif'){ 
				$image = imagecreatefromgif($source_url);
				imagejpeg($image, $destination_url, $quality);
			}
			elseif ($info['mime'] == 'image/png'){
				copy($source_url, $destination_url);
				/*
				$image = imagecreatefrompng($source_url);
				imagepng($image, $destination_url, 9);
				imagejpeg($image, $destination_url, $quality);
				*/
			}
			else{ $r = 0;}
	
			if($r == 1){
				//imagejpeg($image, $destination_url, $quality);
			}
		}
		
		//return destination file url
		return $r;
	}
	public function EmailTemplateSkeleton($s = null){
	
		$t = '<html><head><title></title></head><body><div id="ssSub" class="notification" align="center"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="min-width: 320px;"><tr><td align="center" bgcolor="#eff3f8"><!--[if gte mso 10]><table width="680" border="0" cellspacing="0" cellpadding="0"><tr><td><![endif]--><table border="0" cellspacing="0" cellpadding="0" class="table_width_100" width="100%" style="max-width: 680px; min-width: 300px;"> <tr><td><!-- padding --><div style="height: 80px; line-height: 80px; font-size: 10px;"> </div></td></tr> <!--header --><tr><td align="center" bgcolor="#ffffff"><!-- padding --><div style="height: 30px; line-height: 30px; font-size: 10px;"> </div><table width="90%" border="0" cellspacing="0" cellpadding="0"><tr><td align="left"><!--Item --><div class="mob_center_bl" style=""><table class="mob_center" width="115" border="0" cellspacing="0" cellpadding="0" align="left" style="border-collapse: collapse;"><tr><td align="left" valign="middle"><!-- padding --><div style="height: 20px; line-height: 20px; font-size: 10px;"> </div><table width="115" border="0" cellspacing="0" cellpadding="0" ><tr><td align="left" valign="top" class="mob_center"><a href="#" target="_blank" style="color: #596167; font-family: Arial, Helvetica, sans-serif; font-size: 13px;"><font face="Arial, Helvetica, sans-seri; font-size: 13px;" size="3" color="#596167"><img src="http://www.armytrix.com/cdn/em_logo.png" alt="armytrix" border="0" style="display: block;" /></font></a></td></tr></table></td></tr></table></div><!-- Item END--><!--[if gte mso 10]></td><td align="right"><![endif]--><!--Item --><div class="mob_center_bl" style="float: right; display: inline-block; width: 88px;"><table width="88" border="0" cellspacing="0" cellpadding="0" align="right" style="border-collapse: collapse;"><tr><td align="right" valign="middle"><!-- padding --><div style="height: 20px; line-height: 20px; font-size: 10px;"> </div><table width="100%" border="0" cellspacing="0" cellpadding="0" ><tr><td align="right"></td></tr></table></td></tr></table></div><!-- Item END--></td></tr></table><!-- padding --><div style="height: 50px; line-height: 50px; font-size: 10px;"> </div></td></tr><!--header END--><!--content 1 --><tr><td bgcolor="#fbfcfd" style="padding: 20px;font-family: Arial, Helvetica, sans-serif; color: #57697e;">[TEMPLATE_TEXT]</td></tr><!--content 1 END--><!--footer --><tr><td class="iage_footer" align="center" bgcolor="#ffffff"><!-- padding --><div style="height: 80px; line-height: 80px; font-size: 10px;"> </div><table width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td align="center"><font face="Arial, Helvetica, sans-serif" size="3" color="#96a5b5" style="font-size: 13px;"><span style="font-family: Arial, Helvetica, sans-serif; font-size: 13px; color: #96a5b5;">[CYEAR] &copy; armytrix.com. ALL Rights Reserved.</span></font></td></tr></table><!-- padding --><div style="height: 30px; line-height: 30px; font-size: 10px;"> </div></td></tr><!--footer END--><tr><td><!-- padding --><div style="height: 80px; line-height: 80px; font-size: 10px;"> </div></td></tr></table><!--[if gte mso 10]></td></tr></table><![endif]--></td></tr></table></div><div style="display:none; white-space:nowrap; font:15px courier; color:#ffffff;">- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -</div></body></html>';
		$t = str_replace('[TEMPLATE_TEXT]', $s, $t);
		return $t;
	}
	
	/**send email */
	public function AppMail($to, $type, $parameters = array(),$dateTime = DATE, $is_email = 1) {
	    if(!empty($to) && !empty($type)){
	        $mdata = ClassRegistry::init('EmailTemplate');
	        $emailformat = $mdata->find('first', array('conditions' => array('EmailTemplate.type' => $type,'EmailTemplate.status'=>1)));
	        if (!empty($emailformat)) {
	            $sub = $emailformat['EmailTemplate']['subject'];
	            foreach ($parameters as $param_name => $param_value) { $sub = str_replace('[' . $param_name . ']', $param_value, $sub); }
	            $body = $emailformat['EmailTemplate']['message'];
	            foreach ($parameters as $param_name => $param_value) { $body = str_replace('[' . $param_name . ']', $param_value, $body); }
	            foreach ($parameters as $param_name => $param_value) { $body = str_replace('[' . $param_name . ']', $param_value, $body); }
	            if ( isset($parameters['EmailTemplateSkeleton']) ){ $body = str_replace('[EMAIL_BODY]', $body,$parameters['EmailTemplateSkeleton']); }
	            $from = $emailformat['EmailTemplate']['sender_name'] . "<" . $emailformat['EmailTemplate']['email'] . ">";
	            $this->EmailServers($to, $from, $sub, $body,$dateTime,$is_email);
	        }
	        return true;
	    }
	}
	
	public function EmailServers($to = null, $from = null, $sub = null, $body = null,$dateTime = DATE, $is_email = 1) {
		$msg = 0;
		$today_year = date("Y");
		$today_date = date("j F, Y", strtotime(TODAYDATE));
	
		if (!empty($to) && !empty($from) && !empty($body)) {
			$emails = ClassRegistry::init('EmailServer');
			if ( $is_email == 1 ){
    			$body = $this->EmailTemplateSkeleton($body);
    			$body = str_replace('[CYEAR]', $today_year, $body);
    			$body = str_replace('[DATE]', $today_date, $body);
    			$body = str_replace('[WEBNAME]', WEBTITLE, $body);
			}else{
			    $body = str_replace('[CYEAR]', $today_year, $body);
			    $body = str_replace('[DATE]', $today_date, $body);
			    $body = str_replace('[WEBNAME]', WEBTITLE, $body);
			}
			
			if (filter_var($to, FILTER_VALIDATE_EMAIL)) {
			    try{
			        $emails->create();
			        $emails->set('email_to', $to);
			        $emails->set('email_from', $from);
			        $emails->set('subject', $sub);
			        $emails->set('message', $body);
			        $emails->set('created', $dateTime);
			        $emails->save(null, false);
			        $msg = 1;
			        
			    } catch (Exception $e) {}
			}
		}
		return $msg;
	}
	
	public function form_data($arr = null){
	    if ( !empty($arr) ){
	        $form = ClassRegistry::init('Form');
	        try {
	            $form->save($arr);
	        } catch (Exception $e) { }
	    }
	}
	
	
	public function parse_yturl($url)
	{
		$pattern = '#^(?:https?://|//)?(?:www\.|m\.)?(?:youtu\.be/|youtube\.com/(?:embed/|v/|watch\?v=|watch\?.+&v=))([\w-]{11})(?![\w-])#';
		preg_match($pattern, $url, $matches);
		return (isset($matches[1])) ? $matches[1] : false;
	}
	
	public function crypto_rand_secure($min, $max)
	{
		$range = $max - $min;
		if ($range < 1) return $min; // not so random...
		$log = ceil(log($range, 2));
		$bytes = (int) ($log / 8) + 1; // length in bytes
		$bits = (int) $log + 1; // length in bits
		$filter = (int) (1 << $bits) - 1; // set all lower bits to 1
		do {
			$rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
			$rnd = $rnd & $filter; // discard irrelevant bits
		} while ($rnd > $range);
		return $min + $rnd;
	}
	public function getToken($length)
	{
		$token = "";
		$codeAlphabet = "0123456789";
		$codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
	
		$max = strlen($codeAlphabet); // edited
	
		for ($i=0; $i < $length; $i++) {
			$token .= $codeAlphabet[ $this->crypto_rand_secure(0, $max-1)];
		}
	
		return $token;
	}
	
	function Get_Lat_lng($address = null) {
		$map_code = array();
		if (!empty($address)) {
			$prepAddr = str_replace(' ', '+', $address);
			$u = 'https://maps.google.com/maps/api/geocode/json?address='.$prepAddr.'&key='.G_KEY;
			$geocode = file_get_contents($u);
			
			$output = json_decode($geocode, true);
			if ($output['status'] == 'OK') {
				$lat = $output['results'][0]['geometry']['location']['lat'];
				$lng = $output['results'][0]['geometry']['location']['lng'];
				$map_code = array('status' => 'ok', 'lat' => $lat, 'lng' => $lng);
				
			}
		} 
		return $map_code;
	}
	
	public function getEngine($id = null){
	    $motor = ClassRegistry::init('Motor');
	    $motor->bindModel(array('belongsTo'=>array('Model','Brand')),false);
	    $data = $motor->find('first',array('conditions'=>array('Motor.id'=>$id)));
	    return $data;
	}
	
	public function emOrderInquiry($id = null,$type = 1) {
	    $order_type = 'inquiry';
	    if ( $type == 1 ){ $order_type = 'inquiry'; }
	    elseif ( $type == 2 ){ $order_type = 'order'; }
	    
	    $tbl = ClassRegistry::init('Order');
	    $tbl1 = ClassRegistry::init('OrderItem');
	    $tbl->bindModel(array('hasMany'=>array('OrderItem')));
	    $tbl1->bindModel(array('belongsTo'=>array('Product')));
	    
	    $tr = $body = null;
	    $data = $tbl->find('first',array('recursive'=>3,'conditions'=>array('Order.id'=>$id)));
	    if ( !empty($data) ){
	        if ( isset($data['OrderItem']) && !empty($data['OrderItem']) ){
	            foreach ( $data['OrderItem'] as $list){
	                $pImg = new_show_image('cdn/no_image_available.jpg',300,150,100,'ff',null);
	                if( in_array($list['Product']['type'], [1,2,3,5]) && isset($list['Product']['Library']['full_path']) && !empty($list['Product']['Library']['full_path'])){
	                    $pImg = new_show_image('cdn/'.$list['Product']['Library']['full_path'],300,150,100,'ff',null); }
	                    elseif($list['Product']['type'] == 4){
	                        $abc = explode(',',$list['Product']['extra_photos']);
	                        $get_path = null;
	                        if(isset($abc[0]) && !empty($abc[0])){ $get_path = $this->getImage($abc[0]); }
	                        if(isset($get_path)){ $pImg = new_show_image('cdn/'.$get_path,300,150,100,'ff',null); }
	                        else{ $pImg = new_show_image('cdn/no_image_available.jpg',300,150,100,'ff',null); }
	                    }
	                    
	                    if ( in_array($list['Product']['type'], [1,2,3,5] ) ){ $tr.='<tr><td style="width: 40%"><img src="'.$pImg.'" alt="product image" style="max-width: 100%" /></td><td><div> <h2 style="line-height: 1.2; font-size: 20px; margin-bottom: 20px;">'.$list['Product']['Brand']['name'].' '.$list['Product']['Model']['name'].' '.$list['Product']['Motor']['name'].'</h2><p> '.$list['Product']['title'].' </p></div></td></tr>'; }
	                    elseif ( in_array($list['Product']['type'], [4] ) ){ $tr.='<tr><td style="width: 40%"><img src="'.$pImg.'" alt="product image" style="max-width: 100%" /></td><td><div> <h2 style="line-height: 1.2; font-size: 20px; margin-bottom: 20px;">'.$list['Product']['title'].' '.$list['size'].'</h2><p> </p></div></td></tr>'; }
	            }
	        }
	        
	        $body = '<!DOCTYPE html><html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"><meta name="viewport" content="width=display-width, initial-scale=1.0, maximum-scale=1.0,">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0,"><title>Armytrix Email</title><link href="https://fonts.googleapis.com/css?family=PT+Sans:400,700&display=swap" rel="stylesheet">
<style>*{margin:0;padding:0}a{text-decoration:none;color:#000}body{font-family:"PT Sans",sans-serif!important;color:#000;font-size:15px;line-height:1.6}table{width:100%;border-collapse:collapse}th,td{padding:10px} </style>
</head><body><table style="max-width: 820px; margin: auto"><thead><tr><td><table style="text-align: center;"><tr><td colspan="3" style="padding: 30px 15px;"><a href="https://www.armytrix.com/"><img src="https://www.armytrix.com/v/em/army-logo.png" alt="armytrix logo"></a></td></tr>
	            
<tr style="background: #333333">
<td style="padding: 0"><a href="https://www.armytrix.com/" style="color: #fff; text-transform: uppercase; text-decoration: none; font-size: 14px; font-weight: bold; padding: 2px 5px; display: block;"><img src="https://www.armytrix.com/v/em/home.jpg" alt="Home" style="max-width: 150px; vertical-align: bottom;"></a></td>
<td style="padding: 0"><a href="https://www.armytrix.com/product-exhaust" style="color: #fff; text-transform: uppercase; text-decoration: none; font-size: 14px; font-weight: bold; padding: 2px 5px; display: block;"><img src="https://www.armytrix.com/v/em/exhaust.jpg" alt="Home" style="max-width: 150px; vertical-align: bottom;"></a></td>
<td style="padding: 0"><a href="https://www.armytrix.com/contact" style="color: #fff; text-transform: uppercase; text-decoration: none; font-size: 14px; font-weight: bold; padding: 2px 5px; display: block;"><img src="https://www.armytrix.com/v/em/contact.jpg" alt="Home" style="max-width: 150px; vertical-align: bottom;"></a></td>
</tr>
	            
</table></td></tr></thead><tbody>
<tr><td><table><tr><td style="width: 60%; vertical-align: top;">
<p style="margin-bottom: 15px;">Hi Admin, </p><p style="margin-bottom: 15px;">You have received an '.$order_type.'.</p><p style="margin-bottom: 15px;">Details are below.<br></p>
<p style="margin-bottom: 15px;">ARMYTRIX  TEAM.</p></td>
<td  style="padding: 20px; background: #eeeeee; vertical-align: top;">
<table><tr><td style="padding: 0;"><h3 style="color: #000; font-size: 25px; margin-bottom: 15px;">SHIP TO</h3><div class="address-box">
<p class="add-name" style="font-weight: 300; margin-bottom: 35px"> '.$data['Order']['first_name'].' '.$data['Order']['last_name'].'<br/>
'.$data['Order']['shipping_company'].'<br/>'.$data['Order']['shipping_address'].' '.$data['Order']['shipping_address_2'].'<br/>
'.$data['Order']['shipping_city'].', '.$data['Order']['shipping_state'].' -  '.$data['Order']['shipping_zip'].'<br/>
'.$data['Order']['shipping_country'].'<br/>'.$data['Order']['phone'].'<br/>'.$data['Order']['email'].'</p> </div><div style="margin-bottom: 20px;"><h4 style="font-size: 18px; text-transform: uppercase; font-weight: 500;">Order Number:</h4>
<p style="color: #00aa00;"> <a href="https://www.armytrix.com/order/success/'.$data['Order']['order_number'].'"> '.$data['Order']['order_number'].' </a> </p></div>
<div style="margin-bottom: 0;"><h4 style="font-size: 18px; text-transform: uppercase; font-weight: 500;">Order Date:</h4>
<p style="color: #00aa00;">'.date('m/d/Y',strtotime($data['Order']['created'])).' </p></div></td></tr></table></td></tr></table></td></tr><tr> <td style="padding: 40px 0"> <img src="https://www.armytrix.com/v/em/order-tx.png" alt="order details" style="max-width: 100%;" /> </td> </tr>
<tr><td><table>'.$tr.'<tr><td></td><td style="border-top: 1px solid #000; padding: 10px 0 0;"><table>
<tr><td style="padding: 5px; width: 150px">Subtotal (+)</td><td style="text-align: right; color: #00aa00; padding: 5px">USD $'.num_2($data['Order']['total_amount']).'</td></tr>
<tr><td style="padding: 5px; width: 150px">Shipping Cost (+)</td><td style="text-align: right; color: #00aa00; padding: 5px">USD $'.num_2($data['Order']['shipping_cost']).'</td></tr>
<tr><td style="padding: 5px; width: 150px">Shipping Fee Discount (-)</td><td style="width: 100px; text-align: right; color: #00aa00; padding: 5px">USD $'.num_2($data['Order']['discount']).'</td></tr>
<tr><td style="padding: 5px; width: 150px">Import duty (+)</td><td style="text-align: right; color: #00aa00; padding: 5px">USD $'.num_2($data['Order']['import_duty']).'</td></tr>
<tr><td style="padding: 5px; width: 150px">VAT (+)</td><td style="width: 100px; text-align: right; color: #00aa00; padding: 5px">USD $'.num_2($data['Order']['vat']).'</td></tr>
<tr><td style="padding: 5px; width: 150px">Warranty Extension (+)</td><td style="width: 100px; text-align: right; color: #00aa00; padding: 5px">USD $'.num_2($data['Order']['warranty_extension']).'</td></tr>
<tr><td style="padding: 5px; width: 150px">Grand Total</td><td style="text-align: right; color: #00aa00; padding: 5px">USD $'.num_2($data['Order']['grand_total']).'</td></tr>
</table></td></tr></table></td></tr><tr><td><a href="https://www.armytrix.com/contact" style="color: inherit;"><div style="text-align: center; padding-left: 80px; background: url(https://www.armytrix.com/v/em/msg-icon.png) no-repeat left center; max-width: 250px; margin: 15px auto;">
<h2 style="font-size: 28px; line-height: 1.2;">CAN  WE  HELP  ?</h2><h6 style="font-size: 18px; text-transform: uppercase; vertical-align: middle; font-weight: 500; line-height: 1.2;">Contact us <img src="https://www.armytrix.com/v/em/right-arrow.png" alt="arrow-images"></h6>
</div></a></td></tr></tbody><tfoot><tr style="background: #333;"><td style="color: #fff; font-weight: 500; font-size: 20px; text-align: center; padding: 15px 10px;"> © 2019 ARMYTRIX All Rights Reserved.</td></tr><tr><td style="font-weight: 300; font-size: 13px; text-align: center; font-style: italic; padding: 15px 10px;">Please do not reply to this email. If you need to contact  ARMYTRIX<br> with questions or concerns, please <a href="https://www.armytrix.com/customer-support" style="color: inherit; text-decoration: underline;">click here.</a></td></tr></tfoot></table><div style="display:none; white-space:nowrap; font:15px courier; color:#ffffff;">- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -</div></body></html>';
	    }
	    return $body;
	}
	
	public function em($id = null) {
	    $tbl = ClassRegistry::init('Order');
	    $tbl1 = ClassRegistry::init('OrderItem');
	    $tbl->bindModel(array('hasMany'=>array('OrderItem')));
	    $tbl1->bindModel(array('belongsTo'=>array('Product')));
	    
	    $tr = $body = null;
	    $data = $tbl->find('first',array('recursive'=>3,'conditions'=>array('Order.id'=>$id)));
	    if ( !empty($data) ){
	        if ( isset($data['OrderItem']) && !empty($data['OrderItem']) ){
	            foreach ( $data['OrderItem'] as $list){
	                $pImg = new_show_image('cdn/no_image_available.jpg',300,150,100,'ff',null);
	                if( in_array($list['Product']['type'], [1,2,3,5]) && isset($list['Product']['Library']['full_path']) && !empty($list['Product']['Library']['full_path'])){
	                    $pImg = new_show_image('cdn/'.$list['Product']['Library']['full_path'],300,150,100,'ff',null); }
	                    elseif($list['Product']['type'] == 4){
	                        $abc = explode(',',$list['Product']['extra_photos']);
	                        $get_path = null;
	                        if(isset($abc[0]) && !empty($abc[0])){ $get_path = $this->getImage($abc[0]); }
	                        if(isset($get_path)){ $pImg = new_show_image('cdn/'.$get_path,300,150,100,'ff',null); }
	                        else{ $pImg = new_show_image('cdn/no_image_available.jpg',300,150,100,'ff',null); }
	                    }
	                    
	                    if ( in_array($list['Product']['type'], [1,2,3,5] ) ){ $tr.='<tr><td style="width: 40%"><img src="'.$pImg.'" alt="product image" style="max-width: 100%" /></td><td><div> <h2 style="line-height: 1.2; font-size: 20px; margin-bottom: 20px;">'.$list['Product']['Brand']['name'].' '.$list['Product']['Model']['name'].' '.$list['Product']['Motor']['name'].'</h2><p> '.$list['Product']['title'].' </p></div></td></tr>'; }
	                    elseif ( in_array($list['Product']['type'], [4] ) ){ $tr.='<tr><td style="width: 40%"><img src="'.$pImg.'" alt="product image" style="max-width: 100%" /></td><td><div> <h2 style="line-height: 1.2; font-size: 20px; margin-bottom: 20px;">'.$list['Product']['title'].' '.$list['size'].'</h2><p> </p></div></td></tr>'; }
	            }
	        }
	        
	        $body = '<!DOCTYPE html><html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"><meta name="viewport" content="width=display-width, initial-scale=1.0, maximum-scale=1.0,">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0,"><title>Armytrix Email</title><link href="https://fonts.googleapis.com/css?family=PT+Sans:400,700&display=swap" rel="stylesheet">
<style>*{margin:0;padding:0}a{text-decoration:none;color:#000}body{font-family:"PT Sans",sans-serif!important;color:#000;font-size:15px;line-height:1.6}table{width:100%;border-collapse:collapse}th,td{padding:10px} </style>
</head><body><table style="max-width: 820px; margin: auto"><thead><tr><td><table style="text-align: center;"><tr><td colspan="3" style="padding: 30px 15px;"><a href="https://www.armytrix.com/"><img src="https://www.armytrix.com/v/em/army-logo.png" alt="armytrix logo"></a></td></tr>

<tr style="background: #333333">
<td style="padding: 0"><a href="https://www.armytrix.com/" style="color: #fff; text-transform: uppercase; text-decoration: none; font-size: 14px; font-weight: bold; padding: 2px 5px; display: block;"><img src="https://www.armytrix.com/v/em/home.jpg" alt="Home" style="max-width: 150px; vertical-align: bottom;"></a></td>
<td style="padding: 0"><a href="https://www.armytrix.com/product-exhaust" style="color: #fff; text-transform: uppercase; text-decoration: none; font-size: 14px; font-weight: bold; padding: 2px 5px; display: block;"><img src="https://www.armytrix.com/v/em/exhaust.jpg" alt="Home" style="max-width: 150px; vertical-align: bottom;"></a></td>
<td style="padding: 0"><a href="https://www.armytrix.com/contact" style="color: #fff; text-transform: uppercase; text-decoration: none; font-size: 14px; font-weight: bold; padding: 2px 5px; display: block;"><img src="https://www.armytrix.com/v/em/contact.jpg" alt="Home" style="max-width: 150px; vertical-align: bottom;"></a></td>
</tr>

</table></td></tr></thead><tbody>
<tr><td><table><tr><td style="width: 60%; vertical-align: top;">
<p style="margin-bottom: 15px;">Hi, '.$data['Order']['first_name'].' '.$data['Order']['last_name'].'</p><p style="margin-bottom: 15px;">Thank you for your order.</p><p style="margin-bottom: 15px;">Details are below.<br> We\'ll email you when your order ships.</p>
<p style="margin-bottom: 15px;"> We ship items as soon as they\'re ready. We recommend hanging on to this email until  you\'ve received everything in your order. </p><p style="margin-bottom: 15px;">And feel free to contact us with any questions.</p>
<p style="margin-bottom: 15px;">Thanks again,<br>ARMYTRIX  CORP.</p></td>
<td  style="padding: 20px; background: #eeeeee; vertical-align: top;">
<table><tr><td style="padding: 0;"><h3 style="color: #000; font-size: 25px; margin-bottom: 15px;">SHIP TO</h3><div class="address-box">
<p class="add-name" style="font-weight: 300; margin-bottom: 35px"> '.$data['Order']['first_name'].' '.$data['Order']['last_name'].'<br/>
'.$data['Order']['shipping_company'].'<br/>'.$data['Order']['shipping_address'].' '.$data['Order']['shipping_address_2'].'<br/>
'.$data['Order']['shipping_city'].', '.$data['Order']['shipping_state'].' -  '.$data['Order']['shipping_zip'].'<br/>
'.$data['Order']['shipping_country'].'<br/>'.$data['Order']['phone'].'<br/>'.$data['Order']['email'].'</p> </div><div style="margin-bottom: 20px;"><h4 style="font-size: 18px; text-transform: uppercase; font-weight: 500;">Order Number:</h4>
<p style="color: #00aa00;"> <a href="https://www.armytrix.com/order/success/'.$data['Order']['order_number'].'"> '.$data['Order']['order_number'].' </a> </p></div>
<div style="margin-bottom: 0;"><h4 style="font-size: 18px; text-transform: uppercase; font-weight: 500;">Order Date:</h4>
<p style="color: #00aa00;">'.date('m/d/Y',strtotime($data['Order']['created'])).' </p></div></td></tr></table></td></tr></table></td></tr><tr> <td style="padding: 40px 0"> <img src="https://www.armytrix.com/v/em/order-tx.png" alt="order details" style="max-width: 100%;" /> </td> </tr>
<tr><td><table>'.$tr.'<tr><td></td><td style="border-top: 1px solid #000; padding: 10px 0 0;"><table>
<tr><td style="padding: 5px; width: 150px">Subtotal (+)</td><td style="text-align: right; color: #00aa00; padding: 5px">USD $'.num_2($data['Order']['total_amount']).'</td></tr>
<tr><td style="padding: 5px; width: 150px">Shipping Cost (+)</td><td style="text-align: right; color: #00aa00; padding: 5px">USD $'.num_2($data['Order']['shipping_cost']).'</td></tr>
<tr><td style="padding: 5px; width: 150px">Shipping Fee Discount (-)</td><td style="width: 100px; text-align: right; color: #00aa00; padding: 5px">USD $'.num_2($data['Order']['discount']).'</td></tr>
<tr><td style="padding: 5px; width: 150px">Import duty (+)</td><td style="text-align: right; color: #00aa00; padding: 5px">USD $'.num_2($data['Order']['import_duty']).'</td></tr>
<tr><td style="padding: 5px; width: 150px">VAT (+)</td><td style="width: 100px; text-align: right; color: #00aa00; padding: 5px">USD $'.num_2($data['Order']['vat']).'</td></tr>
<tr><td style="padding: 5px; width: 150px">Warranty Extension (+)</td><td style="width: 100px; text-align: right; color: #00aa00; padding: 5px">USD $'.num_2($data['Order']['warranty_extension']).'</td></tr>
<tr><td style="padding: 5px; width: 150px">Grand Total</td><td style="text-align: right; color: #00aa00; padding: 5px">USD $'.num_2($data['Order']['grand_total']).'</td></tr>
</table></td></tr></table></td></tr><tr><td><a href="https://www.armytrix.com/contact" style="color: inherit;"><div style="text-align: center; padding-left: 80px; background: url(https://www.armytrix.com/v/em/msg-icon.png) no-repeat left center; max-width: 250px; margin: 15px auto;">
<h2 style="font-size: 28px; line-height: 1.2;">CAN  WE  HELP  ?</h2><h6 style="font-size: 18px; text-transform: uppercase; vertical-align: middle; font-weight: 500; line-height: 1.2;">Contact us <img src="https://www.armytrix.com/v/em/right-arrow.png" alt="arrow-images"></h6>
</div></a></td></tr></tbody><tfoot><tr style="background: #333;"><td style="color: #fff; font-weight: 500; font-size: 20px; text-align: center; padding: 15px 10px;"> © 2019 ARMYTRIX All Rights Reserved.</td></tr><tr><td style="font-weight: 300; font-size: 13px; text-align: center; font-style: italic; padding: 15px 10px;">Please do not reply to this email. If you need to contact  ARMYTRIX<br> with questions or concerns, please <a href="https://www.armytrix.com/customer-support" style="color: inherit; text-decoration: underline;">click here.</a></td></tr></tfoot></table><div style="display:none; white-space:nowrap; font:15px courier; color:#ffffff;">- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -</div></body></html>';
	    }
	    return $body;
	}
	
	
	public function em_status() {
	        $body = '<!DOCTYPE html><html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"><meta name="viewport" content="width=display-width, initial-scale=1.0, maximum-scale=1.0,">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0,"><title>Armytrix Email</title><link href="https://fonts.googleapis.com/css?family=PT+Sans:400,700&display=swap" rel="stylesheet">
                        <style>*{margin:0;padding:0}a{text-decoration:none;color:#000}body{font-family:"PT Sans",sans-serif!important;color:#000;font-size:15px;line-height:1.6}table{width:100%;border-collapse:collapse}th,td{padding:10px} </style>
                        </head><body><table style="max-width: 820px; margin: auto"><thead><tr><td><table style="text-align: center;"><tr><td colspan="3" style="padding: 30px 15px;"><a href="https://www.armytrix.com/"><img src="https://www.armytrix.com/v/em/army-logo.png" alt="armytrix logo"></a></td></tr>
                        <tr style="background: #333333"><td style="padding: 0"><a href="https://www.armytrix.com/" style="color: #fff; text-transform: uppercase; text-decoration: none; font-size: 14px; font-weight: bold; padding: 2px 5px; display: block;"><img src="https://www.armytrix.com/v/em/home.jpg" alt="Home" style="max-width: 150px; vertical-align: bottom;"></a></td><td style="padding: 0"><a href="https://www.armytrix.com/product-exhaust" style="color: #fff; text-transform: uppercase; text-decoration: none; font-size: 14px; font-weight: bold; padding: 2px 5px; display: block;"><img src="https://www.armytrix.com/v/em/exhaust.jpg" alt="Home" style="max-width: 150px; vertical-align: bottom;"></a></td><td style="padding: 0"><a href="https://www.armytrix.com/contact" style="color: #fff; text-transform: uppercase; text-decoration: none; font-size: 14px; font-weight: bold; padding: 2px 5px; display: block;"><img src="https://www.armytrix.com/v/em/contact.jpg" alt="Home" style="max-width: 150px; vertical-align: bottom;"></a></td></tr></table></td></tr></thead><tbody>
                        <tr><td><table><tr><td style="width: 60%; vertical-align: top; background: #f2f2f2"> <p style="margin-bottom: 15px;">Hi, [NAME]</p>
                        <p style="margin-bottom: 15px;">Armytrix order # [ORDER_NUMBER] has been [STATUS]</p> <p style="margin-bottom: 15px;"> Message : [MESSAGE]</p>
                        <p style="margin-bottom: 15px;font-weight: bold; "> To check your order status, please click to access your <a href="'.SITEURL.'pages/order/success/[ORDER_NUMBER]" style="color: green; text-decoration: underline;">order page</a>.</p>
                        <p style="margin-bottom: 15px;"><br>Armytrix Team</p></td></tr></table></td></tr><tr><td><a href="https://www.armytrix.com/contact" style="color: inherit;"><div style="text-align: center; padding-left: 80px; background: url(https://www.armytrix.com/v/em/msg-icon.png) no-repeat left center; max-width: 250px; margin: 15px auto;">
                        <h2 style="font-size: 28px; line-height: 1.2;">CAN  WE  HELP  ?</h2><h6 style="font-size: 18px; text-transform: uppercase; vertical-align: middle; font-weight: 500; line-height: 1.2;">Contact us <img src="https://www.armytrix.com/v/em/right-arrow.png" alt="arrow-images"></h6>
                        </div></a></td></tr></tbody><tfoot><tr style="background: #333;"><td style="color: #fff; font-weight: 500; font-size: 20px; text-align: center; padding: 15px 10px;"> © 2019 ARMYTRIX All Rights Reserved.</td></tr><tr><td style="font-weight: 300; font-size: 13px; text-align: center; font-style: italic; padding: 15px 10px;">Please do not reply to this email. If you need to contact  ARMYTRIX<br> with questions or concerns, please <a href="https://www.armytrix.com/customer-support" style="color: inherit; text-decoration: underline;">click here.</a></td></tr></tfoot></table><div style="display:none; white-space:nowrap; font:15px courier; color:#ffffff;">- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -</div></body></html>';
	        return $body;
	}
	
	public function email_structure() {
	    $body = '<!DOCTYPE html><html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"><meta name="viewport" content="width=display-width, initial-scale=1.0, maximum-scale=1.0,">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0,"><title>Armytrix Email</title><link href="https://fonts.googleapis.com/css?family=PT+Sans:400,700&display=swap" rel="stylesheet">
                        <style>*{margin:0;padding:0}a{text-decoration:none;color:#000}body{font-family:"PT Sans",sans-serif!important;color:#000;font-size:15px;line-height:1.6}table{width:100%;border-collapse:collapse}th,td{padding:10px} </style>
                        </head><body><table style="max-width: 820px; margin: auto"><thead><tr><td><table style="text-align: center;"><tr><td colspan="3" style="padding: 30px 15px;"><a href="https://www.armytrix.com/"><img src="https://www.armytrix.com/v/em/army-logo.png" alt="armytrix logo"></a></td></tr>
                        <tr style="background: #333333"><td style="padding: 0"><a href="https://www.armytrix.com/" style="color: #fff; text-transform: uppercase; text-decoration: none; font-size: 14px; font-weight: bold; padding: 2px 5px; display: block;"><img src="https://www.armytrix.com/v/em/home.jpg" alt="Home" style="max-width: 150px; vertical-align: bottom;"></a></td><td style="padding: 0"><a href="https://www.armytrix.com/product-exhaust" style="color: #fff; text-transform: uppercase; text-decoration: none; font-size: 14px; font-weight: bold; padding: 2px 5px; display: block;"><img src="https://www.armytrix.com/v/em/exhaust.jpg" alt="Home" style="max-width: 150px; vertical-align: bottom;"></a></td><td style="padding: 0"><a href="https://www.armytrix.com/contact" style="color: #fff; text-transform: uppercase; text-decoration: none; font-size: 14px; font-weight: bold; padding: 2px 5px; display: block;"><img src="https://www.armytrix.com/v/em/contact.jpg" alt="Home" style="max-width: 150px; vertical-align: bottom;"></a></td></tr></table></td></tr></thead><tbody>
                        <tr><td><table><tr><td style="width: 60%; vertical-align: top; background: #f2f2f2">[EMAIL_BODY]</td></tr></table></td></tr><tr><td><a href="https://www.armytrix.com/contact" style="color: inherit;"><div style="text-align: center; padding-left: 80px; background: url(https://www.armytrix.com/v/em/msg-icon.png) no-repeat left center; max-width: 250px; margin: 15px auto;">
                        <h2 style="font-size: 28px; line-height: 1.2;">CAN  WE  HELP  ?</h2><h6 style="font-size: 18px; text-transform: uppercase; vertical-align: middle; font-weight: 500; line-height: 1.2;">Contact us <img src="https://www.armytrix.com/v/em/right-arrow.png" alt="arrow-images"></h6>
                        </div></a></td></tr></tbody><tfoot><tr style="background: #333;"><td style="color: #fff; font-weight: 500; font-size: 20px; text-align: center; padding: 15px 10px;"> © 2019 ARMYTRIX All Rights Reserved.</td></tr><tr><td style="font-weight: 300; font-size: 13px; text-align: center; font-style: italic; padding: 15px 10px;">Please do not reply to this email. If you need to contact  ARMYTRIX<br> with questions or concerns, please <a href="https://www.armytrix.com/customer-support" style="color: inherit; text-decoration: underline;">click here.</a></td></tr></tfoot></table><div style="display:none; white-space:nowrap; font:15px courier; color:#ffffff;">- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -</div></body></html>';
	    return $body;
	}
	
}
?>