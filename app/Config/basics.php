<?php


/**
 * core function for Helpers/controllers/Models and other files
 *
 * */
/*print array and string
 * */
function ec($str=null,$txt=null){
	if(!empty($str))
	{
		if(is_array($str) || is_object($str)){
			echo $txt." ";
			echo count($str);
			echo " ";
			echo "<pre>";
			print_r($str);
			echo "</pre>";
		}
		else {
			echo "<br>".$txt;
			echo $str;
			echo "<br>";
		}
	}else{ echo "$txt <br>0 or Null<br>"; }
}

function num_2($num,$limt=2)
{   if($num == 0){
	return 0;
}
if(!empty($num)){
	return number_format((float)$num, 2, '.', '')+ 0;
}
}

function currency($amt = 0 , $eur = 0 , $region = null ){
    $str = null;
    if ( $region == 2 ){ $str = "EUR €".num_2( $amt * $eur); }
    else{  $str = "USD $".num_2($amt); }
    return $str;
}

function new_currency($amt = 0, $new_amt = 0 , $eur = 0 , $region = null ){
    $str = null;
    if ( $amt == $new_amt ){
        if ( $region == 2 ){ $str = "EUR €".num_2( $amt * $eur); }
        else{  $str = "USD $".num_2($amt); }
    }else{
        if ( $region == 2 ){ $str = 'EUR <strike class="text-danger">€'.num_2( $amt * $eur).'</strike> €'.num_2( $new_amt * $eur); }
        else{ $str = 'USD <strike class="text-danger">$'.num_2( $amt).'</strike> $'.num_2( $new_amt); }
    }
    return $str;
}


/**
 * return current time for given timezone
 * @param  TimeZone
 * @return  date time
 * getDate()
 * */
function getNow($timeZoneId = 'US/Eastern'){
	$date = new DateTime("now", new DateTimeZone($timeZoneId));
	//$date = new DateTime(DATE, new DateTimeZone($timeZoneId));
	return $date->format('Y-m-d H:i:s');
}

/**
 * get_timezone_offset('America/Los_Angeles','America/New_York');
 * */
function get_timezone_offset($remote_tz, $origin_tz = null) {
	$offset = null;
	if($origin_tz === null) {
		if(!is_string($origin_tz = date_default_timezone_get())) {
			return false; // A UTC timestamp was returned -- bail out!
		}
	}
	try {
		$origin_dtz = new DateTimeZone($origin_tz);
		$remote_dtz = new DateTimeZone($remote_tz);
		$origin_dt = new DateTime("now", $origin_dtz);
		$remote_dt = new DateTime("now", $remote_dtz);
		$offset = $origin_dtz->getOffset($origin_dt) - $remote_dtz->getOffset($remote_dt);
	}catch (Exception $e) { }
	return $offset;
}

/**get date time for given timezone*/
function getUserTime( $timeZone='US/Eastern',$dateTime=DATE){
	$min = get_timezone_offset(date_default_timezone_get(),$timeZone);
	return date('Y-m-d H:i:s',strtotime("$min seconds",strtotime($dateTime)));
}

/** get resized image*/

function show_image($f=null,$img=null,$w=100,$h=100,$q=70,$dimensions='ff',$type=null,$img_tag =null){
	$img_url = null;
	if(!empty($f) && !empty($img))
	{
		$arr = explode('.',$img);
		$new_ext = end($arr);
		$new_file = str_replace(".$new_ext",'',$img);
		$filename = $f."/".$img;
		if (file_exists($filename)) {
			$path = CDN."cdn/".$w."_".$h."_".$q."_".$dimensions."_".$f."/".$new_file.".".$new_ext;
			if($img_tag == null){ $img_url = $path;  }
			else{ $img_url = '<img src="'.$path.'" alt="" />'; }
		}
		else {
			$path = CDN."cdn/".$w."_".$h."_".$q."_".$dimensions."_cdn/no_image_available.jpg";
			if($img_tag == null){ $img_url = $path;  }
			else{ $img_url = '<img src="'.$path.'" alt="" />'; }
		}
	}else{
		$path = CDN."cdn/".$w."_".$h."_".$q."_".$dimensions."_cdn/no_image_available.jpg";
		if($img_tag == null){ $img_url = $path;  }
		else{ $img_url = '<img src="'.$path.'" alt="" />'; }
	}
	
	return $img_url;
}


function new_show_image($full_path=null,$w=100,$h=100,$q=70,$dimensions='ff',$img_tag =null){
	
	if(!empty($full_path)){
		if (file_exists($full_path)) {
			$path = CDN."cdn/".$w."_".$h."_".$q."_".$dimensions."_".$full_path;
			if($img_tag == null){ $img_url = $path;  }
			else{ $img_url = '<img src="'.$path.'" alt="" />'; }
		} }
	if(!isset($img_url)){ 
		$path = CDN."cdn/".$w."_".$h."_".$q."_".$dimensions."_cdn/no_image_available.jpg";
		if($img_tag == null){ $img_url = $path;  }
		else{ $img_url = '<img src="'.$path.'" alt="" />'; }
	}
	return $img_url;
}
/**
 * check give string is date or not
 *
 * @call $this->validateDate($str,$format = 'Y-m-d H:i:s');
 *
 * */
function validateDate($date, $format = 'Y-m-d H:i:s')
{
	$d = DateTime::createFromFormat($format, $date);
	return $d && $d->format($format) == $date;
}

/*
 * get age
 * */
function getAge($dob = null) {
	$age = null;
	if (!empty($dob) && validateDate($dob,'Y-m-d') ) { $age = floor((time() - strtotime($dob)) / 31556926); }
	return $age;
}

function uc($str = null){
	return ucwords(strtolower($str));
}