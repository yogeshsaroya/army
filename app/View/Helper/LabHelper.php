<?php

class LabHelper extends AppHelper {

	public $helpers = array('Crypter');
	
	
	public function getTeetLang( $id = null, $arr=array()){
	    $str = null;
	    if(!empty($id) && !empty($arr)){
	        if( isset($arr['Translation'][$id]) && !empty($arr['Translation'][$id]) ){ $str = $arr['Translation'][$id]; }
	        elseif( isset($arr['String'][$id]) && !empty($arr['String'][$id]) ){ $str = $arr['String'][$id]; }
	    }
	    return $str;
	}
	
	public function order_status(){
		return array( '1'=> 'Pending', '2'=> 'Processing', '3'=> 'Shipped', '4'=> 'Canceled', '5'=> 'Completed', '6'=> 'Denied', '7'=> 'Canceled Reversal', 
		    '8'=> 'Failed', '9'=> 'Refunded', '10'=> 'Reversed', '11'=> 'Chargeback', '12'=> 'Expired', '13'=> 'Processed', '14'=> 'Voided');
	}
	
	public function getSubject(){
	    return array('Request a quote'=>'Request a quote','Collaboration'=>'Collaboration','Sponsorship'=>'Sponsorship','Complaints'=>'Complaints');
	}
	
	public function getHear(){
	    return array('Automotive Forums'=>'Automotive Forums','YouTube'=>'YouTube','Instagram'=>'Instagram','Facebook'=>'Facebook','Dupont Registry Magazine'=>'Dupont Registry Magazine',
	        'DUB Magazine'=>'DUB Magazine','European Car Magazine'=>'European Car Magazine','Rides Magazine'=>'Rides Magazine','Heavy Hitters Magazine'=>'Heavy Hitters Magazine',
	        'Corvette Magazine'=>'Corvette Magazine','Performance Auto & Sound Magazine'=>'Performance Auto & Sound Magazine','Wheel and Tire Guide'=>'Wheel and Tire Guide',
	        'Friend'=>'Friend','Search Engine'=>'Search Engine', 'Other'=>'Other');
	}
	
	
	public function getYears(){
	    $arr = array();
	    for ($i=2000;$i<=2018;$i++){
	        $arr[$i] = $i;
	    }
	    return $arr;
	}
	
	public function getTotalOrder($id = null){
		$tot = null;
		if(!empty($id)){
			$t = ClassRegistry::init('Order');
			$d = $t->find('all',array(
					'fields' => array('sum(Order.grand_total) AS total'),
					'conditions'=>array('Order.user_id'=>$id,'Order.order_status_id'=>array(2,3,5,13))) );
			if(isset($d[0][0]['total']) && !empty($d[0][0]['total'])){ $tot = $d[0][0]['total']; }
		}
		return $tot;
	}
	
	public function getInstallationManual($id){
		$d = null;
		if(!empty($id)){
			$t = ClassRegistry::init('ItemDetail');
			$d = $t->find('first',array('conditions'=>array('FIND_IN_SET(\''. $id .'\',ItemDetail.cat_back_ids)')));
			//if(isset( $d['ItemDetail']['installation_manual'] ) && !empty($d['ItemDetail']['installation_manual'])){ $f = $d['ItemDetail']['installation_manual']; }
		}
		return $d;
	}
	
	public function totalMsg($id){
		$d = 0;
		if(!empty($id)){
			$t = ClassRegistry::init('OrderMessage');
			$t->bindModel(array('belongsTo'=>array('Order')));
			$d = $t->find('count',array('conditions'=>array('OrderMessage.is_new'=>1,'Order.user_id'=>$id)));
		}
		return $d;
	}
	
	public function getProd($r){
		if(!empty($r)){
			$p = ClassRegistry::init('Product');
			$d = $p->find('all',array('conditions'=>array('Product.id'=>$r,'Product.status'=>1)));
			return $d;
		}
		
	}
	
	public function getQuarter(){
		$current_quarter = ceil(date('n') / 3);
		$first_date = date('Y-m-d H:i:s', strtotime(date('Y') . '-' . (($current_quarter * 3) - 2) . '-1'));
		$last_date = date('Y-m-t H:i:s', strtotime(date('Y') . '-' . (($current_quarter * 3)) . '-1'));
		return array('start'=>$first_date,'end'=>$last_date);
	}
	
	public function getDealerStatus($id = null){
		$arr = array();
		if(!empty($id)){
			$f_slider = 5000;
			$f_gold = 15000;
			$txt = null;
			$getQuarter = $this->getQuarter();
			$start_date = $getQuarter['start']; 
			$end_date = $getQuarter['end'];
			$u = ClassRegistry::init('User');
			$u->bindModel(array('belongsTo'=>array('DealerLevel'),
					'hasMany'=>array('Order'=>array('fields' => array('sum(Order.grand_total) AS total'),
							'conditions'=>array(
									'Order.order_status_id'=>array(2,3,5,13),
									'Order.created BETWEEN ? and ?'=>array($start_date, $end_date)))) ));
			
			$data = $u->find('first',array('conditions'=>array('User.id'=>$id,'User.role'=>3)));
			
			if(!empty($data) && isset($data['DealerLevel']['id'])){
				$t = 0;
				if(isset($data['Order'][0]['Order'][0]['total'])){ $t = $data['Order'][0]['Order'][0]['total'];}
				
				if($data['User']['dealer_level_id'] == 1){
					if( $t < $f_slider){
						$r = num_2($f_slider - $t);
						$txt = "You are USD <span>$$r</span> away to the next level.";
					}else{ $txt = "Your Next level will be updated soon"; }}
				if($data['User']['dealer_level_id'] == 2){
						if( $t < $f_gold){
							$r = num_2($f_gold - $t);
							$txt = "You are USD <span>$$r</span> away to the next level.";
					}else{ $txt = "Your Next level will be updated soon"; }}					
				
				$arr = array(
						'level'=>$data['User']['dealer_level_id'],
						'ss_off'=>$data['DealerLevel']['offer_1'],
						'titanium_off'=>$data['DealerLevel']['offer_2'],
						'qut_buy'=>$t,
						'text'=>$txt
				);
			}
		}
		return $arr;
	}
	
	public function payment_by(){
		return  array('paypal'=>'PayPal','wire'=>'Bank Transfer','cc'=>'Credit Card');
				}
	
	public function getCarURL($make = null, $model=null, $year = null){
		$d = ClassRegistry::init('ItemDetail');
		$url = null;
		if(!empty($make) && !empty($model) && !empty($year)){
			$data = $d->find('first',array('recursive'=>-1,'conditions'=>array('ItemDetail.brand_id'=>$make,'ItemDetail.model_id'=>$model,'ItemDetail.motor_id'=>$year,'ItemDetail.status'=>1)));
			
			if(!empty($data)){
				$url = $data['ItemDetail']['url'];
			}
		}
		return $url;
	}
	public function dealerType(){
		$d = ClassRegistry::init('DealerLevel');
		$data = $d->find('list');
		
		return $data;
	}
	public function producType(){
		return array('2'=>'Cat-Back','3'=>'Catalytic','5'=>'Accessory');
	}
	
	public function menuType(){ return array(1=>'Tuning Box',2=>'Cat Back Exhaust ', 3=>'Catalytic Converter'); }
	
	
	
	public function getImage($id = null){
		$p = ClassRegistry::init('Library');
		$d = $p->find('first',array('recursive'=>-1,'conditions'=>array('Library.id'=>$id)));
		if(isset($d['Library']['full_path'])){ return $d['Library']['full_path']; }
	}
	
	public function getProduct($arr = null, $tbl = null){
		$p = ClassRegistry::init('Product');
		if($tbl == 'motorcycle'){
			$p->bindModel(array('belongsTo'=>array('Library','MotorcycleMake','MotorcycleModel','MotorcycleYear')));
		}else{
			$p->bindModel(array('belongsTo'=>array('Library','Brand','Model','Motor')));
		}
		
		$d = $p->find('all',array('recursive'=>1,'conditions'=>array('Product.id'=>$arr)));
		return $d;
	}
	
	public function material(){
		return array('stainless steel'=>'Stainless Steel','titanium'=>'Titanium');
	}
	
	public function getCountryNew($id = null) {
	    $list = null;
	    $world = ClassRegistry::init('CountryList');
	    if (!empty($id) && is_numeric($id)) {
	        $list = $world->find('list', array('conditions' => array('CountryList.id' => $id,'CountryList.status'=>1), 'fields' => array('id','short_name'),'order'=>array('CountryList.short_name'=>'ASC')));
	    } else {
	        $list = $world->find('list', array('conditions' => array('CountryList.status'=>1), 'fields' => array('id', 'short_name'),'order'=>array('CountryList.short_name'=>'ASC')));
	    }
	    return $list;
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
		
		public function getCountryDealer() {
			$list = null;
			$world = ClassRegistry::init('World');
			$list = $world->find('list', array('conditions' => array('World.type' => 'co', 'World.name IS NOT NULL','World.status'=>1,'World.for_dealer'=>1), 'fields' => array('id', 'name'),'order'=>array('World.name'=>'ASC')));
			return $list;
		}
	
	/**
	 * Get international dialing code list
	 * @Call > $DialingCode = $this->Lab->getcountryDialingCode();
	 * */
	public function getcountryDialingCode(){
		$t = ClassRegistry::init('CountryList');
		$t->virtualFields = array('name' => "CONCAT(CountryList.short_name,' (+',CountryList.calling_code,')')");
		$d = $t->find('list',array('recursive'=>-1,'conditions'=>array('CountryList.calling_code <>'=>null,'CountryList.calling_code <>'=>'NONE'), 'fields'=>array('CountryList.calling_code','CountryList.name'),'order'=>array('CountryList.short_name ASC')));
		return $d;
	}
	
	public function getMobileNum($mob=null,$country_cod=null){
		/**
		 * remove country dailing code from mobile number
		 * @param mobile number, dailing code
		 * @return 10 digit mobile number
		 * */
		$ph = null;
		if(!empty($mob) && !empty($country_cod)){
			$len = strlen(trim($country_cod));
			$ph = substr($mob,$len);
		}
		return $ph;
	}

	public function getUserPrimeryImage($arr = null){
		$name = null;
		if(!empty($arr)){
			foreach ($arr as $list){
				if(file_exists('cdn/profile/'.$list['image'])){
					if($list['is_primary'] == 1){ $name = $list['image'];}
					else{ $name = $list['image']; break; }
				}
			}
		}
		return $name;
	}
	
	
	/**
	 * Converts bytes into human readable file size.
	 *
	 * @param string $bytes
	 * @return string human readable file size
	 * @author Mogilev Arseny
	 */
	function FileSizeConvert($bytes)
	{
		$bytes = floatval($bytes);
		$arBytes = array(
				0 => array("UNIT" => "TB","VALUE" => pow(1024, 4)),
				1 => array("UNIT" => "GB","VALUE" => pow(1024, 3)),
				2 => array("UNIT" => "MB","VALUE" => pow(1024, 2)),
				3 => array("UNIT" => "KB","VALUE" => 1024),
				4 => array("UNIT" => "B","VALUE" => 1),);
	
		foreach($arBytes as $arItem)
		{
			if($bytes >= $arItem["VALUE"]){
				$result = $bytes / $arItem["VALUE"];
				$result = str_replace(".", "." , strval(round($result, 2)))." ".$arItem["UNIT"];
				break;}
		}
		return $result;
	}
	
	
	public function SysEmail()
	{
		return array();
	}
	
	public function getSlider(){
		$t = ClassRegistry::init('HomeSlider');
		$t->bindModel(array('belongsTo'=>array('Library')));
		$d = $t->find('all',array('recursive'=>1,'conditions'=>array('HomeSlider.title <>'=>null),'order'=>array('HomeSlider.pos ASC')));
		return $d;
	}
	public function getNewRelease(){
		$t = ClassRegistry::init('NewRelease');
		$t->bindModel(array('belongsTo'=>array('Library')));
		$d = $t->find('all',array('recursive'=>1,'conditions'=>array('NewRelease.title <>'=>null),'order'=>array('NewRelease.pos ASC')));
		return $d;
	}
	
	public function getBgImgName($page = null){
	    $t = ClassRegistry::init('BgImage');
	    $d = $t->find('first',array('recursive'=>-1,'conditions'=>array('BgImage.page'=>$page)));
	    if( isset( $d['BgImage']['image'] )){ return $d['BgImage']['image'];}
	    
	}
	
	public function country() {
	    $t = ClassRegistry::init('CountryList');
	    return $t->find('list',[ 'fields'=>['CountryList.short_name','CountryList.short_name'],'order'=>['CountryList.short_name'=>'ASC'] ]);
	}
   
	
	public function getbrand(){
	    $brand = ClassRegistry::init('Brand');
	    $itemDetail = ClassRegistry::init('ItemDetail');
	    $b_list = $itemDetail->find('list',array('conditions'=>array('ItemDetail.status'=>1),'fields'=>array('ItemDetail.id','ItemDetail.brand_id')));
		if(!empty($b_list)){ 
			$b_list = array_unique($b_list);
			$data = $brand->find('list',['order'=>['Brand.name'=>'ASC'],'conditions'=>['Brand.id'=>$b_list,'Brand.status'=>1]]);	
			return $data;
		}
	}

	public function getMotorcycleMake(){
	    $make = ClassRegistry::init('MotorcycleMake');
	    $bike = ClassRegistry::init('Motorcycle');
	    $b_list = $bike->find('list',array('conditions'=>array('Motorcycle.status'=>1),'fields'=>array('Motorcycle.id','Motorcycle.motorcycle_make_id')));
		if(!empty($b_list)){ 
			$b_list = array_unique($b_list);
			$data = $make->find('list',['order'=>['MotorcycleMake.name'=>'ASC'],'conditions'=>['MotorcycleMake.id'=>$b_list,'MotorcycleMake.status'=>1]]);	
			return $data;
		}
	}
}?>