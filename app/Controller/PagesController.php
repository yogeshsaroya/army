<?php
App::uses('AppController', 'Controller');
class PagesController extends AppController {
    public $uses = array('User','Brand','Model','Motor','Product','ExhaustBrand','ExhaustModel','ExhaustProduct','Library','ItemDetail','QualityDetail','Cart','PromoCode','WebSetting','World','Shipping','Address','Order','OrderItem','OrderHistory','Language','String','Translation','CountryList');
	public $components = array('Auth','Cookie', 'Session', 'RequestHandler','DATA','Paypal','AmericaPaypal','EuropePaypal');
	public $meta = array('des'=>'Following the creed of providing the most sound, more power and true versatility, ARMYTRIX offer high-end performance valvetronic exhaust systems, ecu tuning and power box that are second to none. We foster a culture of innovation. ARMYTRIX not only creates products, ARMYTRIX creates experiences.',
			'keys'=>'cat-back, sports exhaust, muffler, silencer, armytrix systems manifold, us, ferrari, lamborghini, maserati, porsche, benz, bmw, volkswagen, mclaren, mini cooper, audi, nissan gt-r r35, sport cat, cat, manifold, sports manifold, test pipes');

	function beforeFilter() {
		AppController::beforeFilter();
		$this->Auth->allow();

	}

	public function send_em(){
	    $this->autoRender = false;
	    if ($this->RequestHandler->isAjax() && !empty($this->data)) {
	        $parameters = array('NAME'=>$this->data['name'],'EMAIL'=>$this->data['email'],'MESSAGE'=>$this->data['msg']);
	        $this->DATA->AppMail('inquiry@armytrix.com', 'FlashSale', $parameters,$dateTime = DATE);
	        //$this->DATA->AppMail('inquiry@armytrix.com', 'FlashSale', $parameters,$dateTime = DATE);
	        echo '<div class="alert alert-success" role="alert">send.</div>';
	        echo "<script>$('#form-pop').remove(); $('.modal-backdrop').remove(); $('#frm_succ').show(); setTimeout(function(){ $('#frm_succ').fadeOut(); location.reload();}, 5000);</script>";

	    }
	}

	public function contact_pop(){
	    $this->autoRender = false;
	    if ($this->RequestHandler->isAjax() && !empty($this->data)) {
	        if(isset($this->data['g-recaptcha-response']) && !empty($this->data['g-recaptcha-response'])){
	            $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".DataSecret."&response=".$this->data['g-recaptcha-response']."&remoteip=".$_SERVER['REMOTE_ADDR']);
	            $arr = json_decode($response,true);
	            if(isset($arr['success'])){
                $str = null;
	              if( !in_array("", $this->data['Request']) ){
	                  $for = $this->DATA->getEngine($this->data['Request']['engine']);
	                  $str.= "Client Type : ".$this->data['Request']['client_type']." <br><br>";
	                  $str.= "First Name : ".$this->data['Request']['f_name']." <br><br>";
	                  $str.= "Last Name : ".$this->data['Request']['l_name']." <br><br>";
	                  $str.= "Country : ".$this->data['Request']['country']." <br><br>";
	                  $str.= "City : ".$this->data['Request']['city']." <br><br>";
	                  $str.= "Zip Code : ".$this->data['Request']['zip_code']." <br><br>";
	                  $str.= "Phone : ".$this->data['Request']['phone']." <br><br>";
	                  $str.= "Email : ".$this->data['Request']['email']." <br><br>";
	                  $str.= "Brand : ".@$for['Brand']['name']." <br><br>";
	                  $str.= "Model : ".@$for['Model']['name']." <br><br>";
	                  $str.= "Engine : ".@$for['Motor']['name']." <br><br>";
	                  $str.= "Message : ".$this->data['Request']['message']." <br><br>";
                    if(!empty($str)){
                        $req = $this->data['Request']['client_type']." - ".@$for['Brand']['name']." / ".@$for['Model']['name']."/".@$for['Motor']['name'].", ".$this->data['Request']['country']." / ".$this->data['Request']['city'];
                        $abc = $this->data['Request']['client_type']." - ".@$for['Brand']['name']." / ".@$for['Model']['name']."/".@$for['Motor']['name'];
                        $forms =['id' =>null, 'type' => 1,'user_type'=>$this->data['Request']['client_type'],
                            'first_name' => $this->data['Request']['f_name'], 'last_name' => $this->data['Request']['l_name'],
                            'country' => $this->data['Request']['country'], 'state' => null, 'city' => $this->data['Request']['city'],
                            'zip' => $this->data['Request']['zip_code'], 'email' => $this->data['Request']['email'],
                            'mobile' => $this->data['Request']['phone'], 'contact_for' => $abc,
                            'message' => $this->data['Request']['message'], 'subject' =>null, 'source' => null, 'year' => null,
                            'make' => @$for['Brand']['name'],'model' => @$for['Model']['name'],'engine' => @$for['Motor']['name'] ];
                        $this->DATA->form_data($forms);
                        $parameters = array('DETAILS'=>$str,'REQUEST'=>$req);
                        $this->DATA->AppMail('inquiry@armytrix.com', 'RequestForQuote', $parameters, DATE);
                        echo '<div class="alert alert-success" role="alert">Your request for quote/locate dealer has been send.</div>';
                        echo "<script>$('#kit_req')[0].reset(); $('#sub_btn').prop('disabled',false); $('#sub_btn').val('Submit'); $('#sh_btn').fadeIn();$('#custom-content').fadeOut();$('#msg_info').modal('show'); </script>";
                    }else{ echo "<div class='alert alert-danger'>please fill required fields</div>"; }
	              }else{ echo "<div class='alert alert-danger'>please fill required fields</div>"; }
	            }else{ echo "<div class='alert alert-danger'>Please verify that you are not a robot.</div>"; }
	        }else{ echo "<div class='alert alert-danger'>Please verify that you are not a robot.</div>"; }
	        echo '<script>grecaptcha.reset();</script>';
	        exit;
	    }
	}

	public function search() {
		$this->set('title_for_layout', 'Search : ARMYTRIX - Automotive Weaponized');
		$page_meta = array('des'=>@$this->meta['des'], 'key'=>$this->meta['keys']);
		echo $q = $this->request->query['s'];
		if(!empty($q)){
			$c = array('ItemDetail.status'=>1,'ItemDetail.url IS NOT NULL');
			$c[] = array('OR'=>array( "ItemDetail.name LIKE" =>"%".$q."%","ItemDetail.description LIKE" => "%".$q."%",) );
			$this->paginate = array('recursive'=>1, 'limit' => 30,'conditions'=>$c);
			$data = $this->paginate('ItemDetail');
		}
		$this->set(compact('page_meta','data'));
	}

	public function pmt_curl($output_transaction= null) {
	    die;
		$process_result = null;
		if(!empty($output_transaction)){
			ob_start();
			$ch = curl_init ('https://gomypay.asia/Shopping/creditpay.asp');
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

	public function cc(){
		$this->autoRender = false;
		$output_transaction = 'e_orderno=1478064324&e_url=your response URL&e_no=TEST_AD2&e_storename=Wecan&e_mode=12&E_Lang=UTF-8&e_Cur=NT&e_money=35&e_cardno=MTIzMDkxODQwMjQwMDcxNDQ3MjcwMzg=&str_check=e25f9396da9aa08c33c39d0aca5b39cd&e_name=wecan&e_telm=0989009457&e_info=service';
		ec($output_transaction);
		$process_result = $this->pmt_curl($output_transaction);
		$process_result = json_decode($process_result,true);
		ec($process_result);die;
	}

	public function paypal_cc(){
	    $this->autoRender = false;
	    $this->AmericaPaypal->amount = "01.00";
	    $this->AmericaPaypal->currencyCode = 'USD';
	    $this->AmericaPaypal->creditCardType = 'Visa';
	    $this->AmericaPaypal->creditCardNumber = '5496733576507707';
	    $this->AmericaPaypal->creditCardExpires = '012020';
	    $this->AmericaPaypal->creditCardCvv = '655';
	    $a = $this->AmericaPaypal->doDirectPayment();
	    ec($a);
	}

	public function index() {
		if( isset($this->request->query['c'] ) && !empty($this->request->query['c'])){
			$this->Cookie->delete('votes');
			$this->redirect('/');
		}
		$this->set('title_for_layout', 'ARMYTRIX - Automotive Weaponized');
		$page_meta = array('des'=>@$this->meta['des'], 'key'=>$this->meta['keys']);
		$is_home = 'yes';
		$this->set(compact('page_meta','is_home'));
	}
	public function index_1() {
		$this->set('title_for_layout', 'ARMYTRIX - Automotive Weaponized');
		$v_data = $v = $page_meta = $is_home = null;
		$page_meta = [
		    'des'=>'Following the Creed of Providing the Best Joy of Driving, Power and Versatility, ARMYTRIX offers the Best Performance Parts for Automotive. We ExciteYourLife',
		    'key'=>'armytrix, exhaust, akrapovic, magnaflow, borla, supersprint,  remus, fiexhaust, ipe, milltek, цена, السعر, precio, preis, prix, обзор, مراجعة, Überprüfung, revisión, глушитель'
		];

		$this->loadModel('Vote');
		$this->loadModel('VoteOption');
		$this->Vote->bindModel(array('hasMany'=>array('VoteOption'=>array('conditions'=>array('VoteOption.title IS NOT NULL','VoteOption.title <>'=>'')))));

		$is_home = 'yes';
		/*
		$v = $this->Vote->find('first',array('conditions'=>array('Vote.status'=>1),'order'=>array('Vote.id'=>'DESC')));
		$vArr = $this->Cookie->read('votes');
		if(isset($vArr) && isset($v['Vote']['id']) ){
			if( $vArr ==  $v['Vote']['id'] ){ $v_data = 'yes'; }
		}
		*/
		
		$this->set(compact('page_meta','is_home','v','v_data'));
	}

	public function update_vote(){
		///$this->autoRender = false;
		$this->loadModel('Vote');
		$this->loadModel('VoteOption');
		$this->Vote->bindModel(array('hasMany'=>array('VoteOption'=>array('conditions'=>array('VoteOption.title IS NOT NULL','VoteOption.title <>'=>'')))));
		if(!empty($this->data)){
			$this->VoteOption->updateAll(array('VoteOption.vote_count' => 'VoteOption.vote_count + 1'), array('VoteOption.id' => $this->data['id']));
			$v = $this->Vote->find('first',array('conditions'=>array('Vote.status'=>1),'order'=>array('Vote.id'=>'DESC')));
			$li = null;
			$op = $pList = array();
			if(!empty($v['VoteOption'])){
				foreach ($v['VoteOption'] as $list1){ $op[$list1['id']] = $list1['vote_count']; }
				$t = array_sum ($op);
				foreach ($op as $k=>$v1){ if($t > 0) { $pList[$k] = num_2( ($v1 * 100.0 / ($t)) );} else{$pList[$k] = 0;} }
				$m =  max($pList);
				foreach ($v['VoteOption'] as $list){
					$c = null;
					$p = $pList[$list['id']];
					if($m == $p) { $c = 'green-btn';}
					if( !empty($list['image']) ){  $im = '<img src="'.SITEURL."cdn/vote/".$list['image'].'"/>'; }
					$title = str_replace("'","\'",$list['title']);
					$li.='<li> <div class="percnt-box '.$c.'"> <div class="inpt-box"><span>'.$p.'%</span></div><div class="level-bx"><label for="">'.$title.'</label> <div class="img-hvr"> '.$im.' </div></div> </div> </li>';
				}
				$this->Cookie->write('votes', $v['Vote']['id']);
				$t = '<ul class="vote-bx">'.$li.'</ul>';
				echo "<script> $('#v_1').html(''); $('#v_2').html('".$t."');</script>";
			}
		}
	}


	public function view_dealer($id = null) {
		$this->loadModel('OurDealer');
		$this->OurDealer->bindModel(array('belongsTo'=>array('Library')));
		$data = $this->OurDealer->find('first',array('conditions'=>array('OurDealer.id'=>$id,'OurDealer.status'=>1)));
		$this->set(compact('data'));

	}
	public function our_dealers() {
	    $this->set('title_for_layout', 'ARMYTRIX EXCLUSIVE DEALERS');
	    $page_meta = [
	        'des'=>'Where to Buy the ARMYTRIX Best Aftermarket Upgrades Titanium & Stainless Steel Turbo-back Cat-Back Valvetronic Exhaust System',
	        'key'=>'armytrix, exhaust, akrapovic, magnaflow, borla, supersprint,  remus, fiexhaust, ipe, milltek, цена, السعر, precio, preis, prix, обзор, مراجعة, Überprüfung, revisión, глушитель'
	    ];
		$this->loadModel('OurDealer');
		$data = $this->OurDealer->find('all',array('limit'=>100,'conditions'=>array('OurDealer.status'=>1), 'order'=>array('OurDealer.title'=>'ASC')));
		$co = $this->OurDealer->find('list',array('group'=>array('OurDealer.country'),'order'=>array('OurDealer.country'=>'ASC'),'fields'=>array('id','country')));
		$this->set(compact('page_meta','data','co'));
	}

	public function dealer_membership() {
		$this->redirect('/');
		$this->set('title_for_layout', 'ARMYTRIX - Automotive Weaponized');
		$page_meta = array('des'=>@$this->meta['des'], 'key'=>$this->meta['keys']);
		$this->set(compact('page_meta'));
	}

	public function remove_pics(){
		$this->autoRender = false;
		if ($this->RequestHandler->isAjax() && !empty($this->data)) {
			if(isset($this->data['type']) && $this->data['type'] == 'youtube'){
				if(isset($this->data['url']) && !empty($this->data['url'])){
					$parameters = array('URL' => $this->data['url'],'DATE_TIME'=>DATE);
					$this->DATA->AppMail('inquiry@armytrix.com', 'VideoUpload', $parameters,$dateTime = DATE);
					echo "<script>$('#video_file').val('');
					$('#v_err').html('<div class=\"alert alert-success\">Message send.</div>');</script>";
				}}
			if(isset($this->data['type']) && $this->data['type'] == 'remove'){
					$path = 'cdn/pics/'.$this->data['fl'].'/'.$this->data['file'];
					try {
						unlink($path);
						echo "<script>$('#div_".$this->data['id']."').remove();</script>";
					} catch (Exception $e) { }
				}
		if(isset($this->data['type']) && $this->data['type'] == 'em'){
				$directory = "cdn/pics/".$this->data['fl']."/";
				$images = glob($directory.'*.*');
				if(!empty($images)){
					$msg = null;
					foreach($images as $image) {
						$p = SITEURL.$image;
						$msg.= "<b>File path :: </b> <a href='$p'>$p</a> <br>"; }
						if(!empty($msg)){
							$parameters = array('URL' => $msg,'DATE_TIME'=>DATE);
							$this->DATA->AppMail('inquiry@armytrix.com', 'PhotoUpload', $parameters,$dateTime = DATE);
							$v = rand(755589,5478999);
							echo "<script>$('#img_name').html('');
							$('#pics_err').html('<div class=\"alert alert-success\">Photos has been send.</div>');
							$('#type').val($v);
							</script>";
						}else{ echo '<div class="notification_error">Sorry, this is not working at the moment. Please try again later. </div>'; }
				}
			}
		}
	}

	public function free() {
		$this->set('title_for_layout', 'Gifts - Armytrix Performance Upgrades');
		$page_meta = array('des'=>@$this->meta['des'], 'key'=>$this->meta['keys']);
		$this->set(compact('page_meta'));
		if ($this->RequestHandler->isAjax() && !empty($this->data)) {
			$ab = null;
			$ex = array("jpg","jpeg","png");
			$is_not_img = $is_img = 0;
			if (!file_exists('cdn/pics/'.$this->data['Photo']['type'])) { mkdir('cdn/pics/'.$this->data['Photo']['type'], 0777, true); }
			foreach ($this->data['Photo']['files'] as $fl){
				$ext = strtolower (pathinfo($fl['name'], PATHINFO_EXTENSION));
				if (in_array($ext, $ex)) { $is_img ++; }
				else{ $is_not_img ++;}
			}
			if($is_not_img > 0){ echo '<div class="alert alert-danger">Please upload only JPG/JPEG/PNG files.</div>'; }
			else{
				foreach ($this->data['Photo']['files'] as $pics){
					$id = rand(123,987);
					$info = pathinfo($pics['name']);
					$ext = $info['extension']; // get the extension of the file
					$newname = $pics['name']; //"newname.".$ext;

					$target = 'cdn/pics/'.$this->data['Photo']['type'].'/'.$newname;
					if(move_uploaded_file( $pics['tmp_name'], $target)){
						$ab.= '<span class="img-nm" id="div_'.$id.'">'.$newname.'<i data_path="'.$this->data['Photo']['type'].'@'.$newname.'" class="rm" id="'.$id.'" onclick="rm(this.id)">X</i></span>';
					}
				}
		echo "<script>$('#img_name').append('$ab');</script>";
		}
	exit;
	}

	}


	public function api(){
		$this->autoRender = false;
		if(isset($this->request->query['url']) && !empty($this->request->query['url'])){
			$u = urldecode($this->request->query('url'));
			$this->redirect($u);
		}
	}

	// Set the values and begin paypal process
	public function express_checkout($amt=null,$oid = null) {
	    try{
	        $this->Paypal->amount = $amt;
	        $this->Paypal->currencyCode = 'USD';
	        $this->Paypal->returnUrl = Router::url(array('controller'=>'payments','action' => 'payment_successful'), true);
	        $this->Paypal->cancelUrl = Router::url(array('controller'=>'payments','action' => 'payment_cancelled'), true);
	        $this->Paypal->orderDesc = 'ARMYTRIX - Automotive Weaponized';
	        $this->Paypal->itemName = $oid;
	        $this->Paypal->quantity = 1;
	        return $this->Paypal->expressCheckout();
	    } catch(Exception $e) {
	        echo '<script>$("#_do_chk").prop("disabled",false); setTimeout(function(){ $("#preloader").hide(); }, 1000);</script>';
	        echo '<div class="alert alert-danger">'.$e->getMessage().'</div>'; die; }
	}

	public function express_checkout_america($amt=null,$oid = null) {
	    try{
	        $this->AmericaPaypal->amount = $amt;
	        $this->AmericaPaypal->currencyCode = 'USD';
	        $this->AmericaPaypal->returnUrl = Router::url(array('controller'=>'payments','action' => 'payment_successful_america'), true);
	        $this->AmericaPaypal->cancelUrl = Router::url(array('controller'=>'payments','action' => 'payment_cancelled_america'), true);
	        $this->AmericaPaypal->orderDesc = 'ARMYTRIX - Automotive Weaponized';
	        $this->AmericaPaypal->itemName = $oid;
	        $this->AmericaPaypal->quantity = 1;
	        return $this->AmericaPaypal->expressCheckout();
	    } catch(Exception $e) {
	        echo '<script>$("#_do_chk").prop("disabled",false); setTimeout(function(){ $("#preloader").hide(); }, 1000);</script>';
	        echo '<div class="alert alert-danger">'.$e->getMessage().'</div>'; die; }
	}

	public function express_checkout_europe ($amt=null,$oid = null) {
	    try{
	        $this->EuropePaypal->amount = $amt;
	        $this->EuropePaypal->currencyCode = 'EUR';
	        $this->EuropePaypal->returnUrl = Router::url(array('controller'=>'payments','action' => 'payment_successful_europe'), true);
	        $this->EuropePaypal->cancelUrl = Router::url(array('controller'=>'payments','action' => 'payment_cancelled_europe'), true);
	        $this->EuropePaypal->orderDesc = 'ARMYTRIX - Automotive Weaponized';
	        $this->EuropePaypal->itemName = $oid;
	        $this->EuropePaypal->quantity = 1;
	        return $this->EuropePaypal->expressCheckout();
	    } catch(Exception $e) {
	        echo '<script>$("#_do_chk").prop("disabled",false); setTimeout(function(){ $("#preloader").hide(); }, 1000);</script>';
	        echo '<div class="alert alert-danger">'.$e->getMessage().'</div>'; die;  }
	}

	public function pro_checkout(){
	    $this->autoRender = FALSE;
	    if ($this->RequestHandler->isAjax()) {
	        if( !empty($this->data)){
	            $s = '<script>$("#_do_chk").prop("disabled",false); setTimeout(function(){ $("#preloader").hide(); }, 1000);</script>';
	            $ord = array();

	            if( !in_array($this->data['payment_by'], array('paypal','cc'))){ echo $s;  echo '<div class="alert alert-danger">Please select Payment method.</div>'; exit; }
	            $token =  $this->DATA->getToken(16);
	            $pro_total = 0;
	            $pro_total = $this->data['total_amount'] + $this->data['warranty_extension'] + ( $this->data['shipping_cost'] -  $this->data['discount'] ) + $this->data['import_duty'] + $this->data['vat'];
	            if ( num_2($this->data['grand_total']) !=  num_2($pro_total) ){ echo $s;  echo '<div class="alert alert-danger">Error. Please check out again.</div>'; exit; }

	            $ord['id'] = null;
	            $ord['card_ids'] = $this->data['cid'];
	            $ord['payment_by'] = $this->data['payment_by'];
	            $ord['region'] = $this->data['region'];
	            $ord['eur'] = $this->data['eur'];
	            $ord['note'] = trim($this->data['note']);
	            $ord['token'] = $token;
	            $ord['total_amount'] = $this->data['total_amount'];
	            $ord['shipping_cost'] = $this->data['shipping_cost'];
	            $ord['discount'] = $this->data['discount'];
	            $ord['import_duty'] = $this->data['import_duty'];
	            $ord['vat'] = $this->data['vat'];
	            $ord['warranty_extension'] = $this->data['warranty_extension'];
	            $ord['grand_total'] = $this->data['grand_total'];
	            $ord['gt_eur'] = num_2($this->data['eur'] * $this->data['grand_total']);
	            $ord['shipping_discount'] = $this->data['shipping_discount']; /* % of discount */
	            $ord['first_name'] = $this->data['first_name'];
	            $ord['last_name'] = $this->data['last_name'];
	            $ord['email'] = $this->data['email'];
	            $ord['phone'] = $this->data['phone'];
	            $ord['shipping_company'] = $this->data['shipping_company'];
	            $ord['shipping_address'] = $this->data['shipping_address'];
	            $ord['shipping_address_2'] = $this->data['shipping_address_2'];
	            $ord['shipping_city'] = $this->data['shipping_city'];
	            $ord['shipping_zip'] = $this->data['shipping_zip'];
	            $ord['shipping_country'] = $this->data['shipping_country'];
	            $ord['shipping_state'] = $this->data['shipping_state'];
	            $ord['country_list_id'] = $this->data['country_list_id'];
	            $ord['billing_company'] = $this->data['billing_company'];
                $ord['billing_address'] = $this->data['billing_address'];
                $ord['billing_address_2'] = $this->data['billing_address_2'];
                $ord['billing_city'] = $this->data['billing_city'];
                $ord['billing_zip'] = $this->data['billing_zip'];
                $ord['billing_country'] = $this->data['billing_country'];
                $ord['billing_state'] = $this->data['billing_state'];
                $ord['vin_number'] = trim($this->data['vin_number']);

	            $cart_dis = explode(',', $this->data['cid']);
	            $c_data = $this->Cart->find('all',array('conditions'=>array('Cart.id'=>$cart_dis)));

	            if(empty($c_data)){ echo $s; echo "<script>location.reload();</script>"; echo '<div class="alert alert-danger">Please try again</div>'; exit; }
	            $ord_list = array();
	            $ord['od_info'] = json_encode($this->data);

	            if ($this->Order->save($ord)) {
	                $oid = $this->Order->getLastInsertId();
	                $o_id = $this->data['iso']."-".date('mH',strtotime(DATE)).$oid;
	                $oarr = array('id'=>$oid,'order_number'=>$o_id);
	                $this->Order->save($oarr);
	                $OrderHistoryArr = array('id'=>null,'order_id'=>$oid,'order_status_id'=>1,'comment'=>'Order # '.$o_id.' has been successfully placed');
	                $this->OrderHistory->save($OrderHistoryArr);
	                if(!empty($c_data)){
	                    foreach ($c_data as $cList){
	                        $amt = $cList['Product']['price'];
	                        if ( $cList['Product']['discount'] > 0 ){
	                            $amt = $cList['Product']['price'] - ( $cList['Product']['price'] * $cList['Product']['discount'] / 100 );
	                        }
	                        $ord_list[] = array('id'=>null,'order_id'=>$oid,'product_id'=>$cList['Product']['id'],'quantity'=>$cList['Cart']['quantity'],'amount'=>$amt,
	                            'is_gift'=>0,'size'=>$cList['Cart']['size']);

	                    }
	                }
                if ( !empty($ord_list) ){ $this->OrderItem->saveMany($ord_list); }
                if($this->data['payment_by'] == 'paypal'){
                    /*
                    if ( $ord['region'] == 1 ){ $url  = $this->express_checkout_america( $ord['grand_total'],$o_id); }
                    elseif ( $ord['region'] == 2 ){ $url  = $this->express_checkout_europe( $ord['gt_eur'],$o_id); }
                    elseif ( $ord['region'] == 3 ){ $url  = $this->express_checkout( $ord['grand_total'],$o_id); }
                    */
                    $url  = $this->express_checkout( $ord['grand_total'],$o_id);
                    echo '<div class="alert alert-success">Please wait while redirecting to paypal...</div>';
                    echo "<script>$('#_do_chk').remove(); setTimeout(function(){ window.location.href ='".$url."'; }, 500);</script>";
                    exit;
                }
                elseif($this->data['payment_by'] == 'cc'){
                    echo $s;
                    echo '<div class="alert alert-danger">Error. please try again</div>'; exit;
                    /*
                    $e_money = 0;
                    $twd = $this->DATA->currencyConverter('USD','TWD',1);
                    if($twd > 0){ $e_money = round($this->data['grand_total'] * $twd); }
                    else{ echo $s;  echo '<div class="alert alert-danger">Currency converter error. Please try again later</div>'; exit; }
                    $e_no = '24707505';
                    $e_pwd = 'q0cu72eu2laqery08qnl6vhppahczsqy';
                    $e_cardno = base64_encode($this->data['cc']['ccv'].$this->data['cc']['month']['month'].$this->data['cc']['year']['year'].$this->data['cc']['number']);
                    $str_check = md5($o_id.$e_no.$e_money.$e_pwd);
                    $output_transaction = "e_orderno=$o_id&e_url=your response URL&e_no=$e_no&e_pwd=$e_pwd&e_storename=Armytrix&e_mode=12&E_Lang=UTF-8&e_Cur=NT&e_money=$e_money&e_cardno=$e_cardno&str_check=$str_check&e_name=".urlencode($this->data['cc']['name'])."&e_telm=".$this->data['cc']['phone']."&e_email=".$this->data['cc']['email']."&e_info=service";
                    $process_result = $this->pmt_curl($output_transaction);
                    $process_result = json_decode($process_result,true);
                    $arr_next =array('tran'=>$output_transaction,'response'=>$process_result);
                    $this->log($arr_next, 'log_pmt');
                    if( isset($process_result['str_ok']) && $process_result['str_ok'] == 1 ){
                        $this->Cart->deleteAll ( array ('Cart.id' => $cart_dis),false );
                        $c_info = json_encode($process_result);
                        $this->_cc_payment_successful($o_id,$c_info);
                        $u = SITEURL."pages/order/success/".$o_id;
                        echo "<script>setTimeout(function(){ window.location.href ='".$u."'; }, 500);</script>";
                    }
                    else{
                        $u = SITEURL."pages/order/fail/".$o_id;
                        echo "<script>setTimeout(function(){ window.location.href ='".$u."'; }, 500);</script>"; exit;
                    } */
                }
            }
        }
        exit;
	    }
	}

	public function do_checkout(){
	    $this->autoRender = false;
	    if ($this->RequestHandler->isAjax()) {
	        if( !empty($this->data)){
	            $checkOutArr = $this->data;
	            $this->Session->write('checkOutArr',$checkOutArr);
	            $u = SITEURL."check_out";
	            echo "<script>$('#preloader').show(); setTimeout(function(){ window.location.href ='".$u."'; }, 500);</script>";
	        }
	    }
	}

	public function inq() {

	}
	public function cart() {
	    $this->set('title_for_layout', 'Shopping Cart');
	}

	public function check_out() {
	    if ($this->RequestHandler->isAjax() && !empty($this->data) ) {
	        $s = '<script>$("#_do_chk").prop("disabled",false); setTimeout(function(){ $("#preloader").hide(); }, 1000);</script>';
	        $cname = $this->DATA->GetWorldNameNew($this->request->data['Order']['country_list_id']);
	        if(isset($cname['CountryList']['short_name']) && !empty($cname['CountryList']['short_name'])){ $this->request->data['Order']['shipping_country'] = $cname['CountryList']['short_name']; }
	        
	        $country_list = $this->CountryList->find('first',['conditions'=>['CountryList.id'=>$this->request->data['Order']['country_list_id']]]);
	        $new_pid = $new_cart_dis = null;
	        if ( isset($country_list['CountryList']['region']) && in_array($country_list['CountryList']['region'], [5]) ){
	            $cart_dis = explode(',', $this->data['cid']);
	            $c_data = $this->Cart->find('all',array('conditions'=>array('Cart.id'=>$cart_dis)));
	             if(!empty($c_data)){
    	             foreach ($c_data as $al){
        	             if( in_array($al['Product']['type'], [1,2,3,5]) ){ 
        	                 $this->Cart->id = $al['Cart']['id'];
        	                 $this->Cart->delete();
        	             }
        	             else{ 
        	                 $new_cart_dis[] = $al['Cart']['id'];
        	                 $new_pid[] = $al['Cart']['product_id'];
        	             }
    	             }
	             }
	        }
	        if(!empty($new_cart_dis)){ $this->request->data['cid'] = implode(',', $new_cart_dis); }
	        if(!empty($new_pid)){ $this->request->data['pid'] = implode(',', $new_pid); }
	        
	        $shipping = $this->data;
	        $this->Session->write('shipping',$shipping);
	        $u = SITEURL."pages/review/";
	        echo "<script> window.location.href ='".$u."'; </script>";
	        exit;
	    }
	    $this->set('title_for_layout', 'Check Out : Armytrix');
	    $shipping = $this->Session->read('shipping');
	    $checkOutArr = $this->Session->read('checkOutArr');
	    $WebSetting = $this->WebSetting->find('first',array('WebSetting.id'=>1));
	    $this->set(compact('WebSetting','checkOutArr','shipping'));
	}
	
	public function review() {
	    $this->set('title_for_layout', 'Review : Armytrix');
	    $checkOutArr = $this->Session->read('checkOutArr');
	    $shipping = $this->Session->read('shipping');
	    $WebSetting = $this->WebSetting->find('first',array('WebSetting.id'=>1));
	    
	    if ( empty($checkOutArr) && empty($shipping) ){ $this->render('no_country'); }
	    $country_list = $this->CountryList->find('first',['conditions'=>['CountryList.id'=>$shipping['Order']['country_list_id']] ]);
	    
	    if ( empty($country_list) ){  $this->render('no_country'); }
	    if ( isset($country_list['CountryList']['region']) &&  isset($shipping['Order']['country_list_id']) && !empty($shipping['Order']['country_list_id']) ){
	        /*1. America region. CC + Paypal*/
	        //if ( $country_list['CountryList']['region'] == 1 ){ }
	        /*2. Europe region. Paypal */
	        //elseif ( $country_list['CountryList']['region'] == 2 ){  }
	        //elseif ( $country_list['CountryList']['region'] == 5 ){ $this->render('no_country'); }
	        /*3. Other region. Paypal */
	        //elseif ( isset($country_list['CountryList']['region']) && $country_list['CountryList']['region'] == 3 ){ }
	        if ( in_array($country_list['CountryList']['region'], [3,5]) ){}
	        elseif ( $country_list['CountryList']['region'] == 4 ){
	            /*4. only send inquires */
	            $cart_dis = explode(',', $shipping['cid']);
	            $c_data = $this->Cart->find('all',array('conditions'=>array('Cart.id'=>$cart_dis)));
	            if (empty($c_data)){ $this->layout = '404'; }
	            
	            $ord = [];
	            $token =  $this->DATA->getToken(16);
	            $ord['type'] = 2;
	            $ord['region'] = 4;
	            $ord['payment_by'] = 'inquiry';
	            $ord['note'] = @$checkOutArr['note'];
	            $ord['token'] = $token;
	            $ord['first_name'] = $shipping['Order']['first_name'];
	            $ord['last_name'] = $shipping['Order']['last_name'];
	            $ord['email'] = $shipping['Order']['email'];
	            $ord['phone'] = $shipping['Order']['phone'];
	            $ord['shipping_country'] = $shipping['Order']['shipping_country'];
	            $ord['shipping_state'] = $shipping['Order']['shipping_state'];
	            $ord['country_list_id'] = $shipping['Order']['country_list_id'];
	            
	            $ord['card_ids'] = $shipping['cid'];
	            
	            $ord_list = $order_item = [];
	            $amount = 0;
	            if(!empty($c_data)){
	                foreach ($c_data as $cList){
	                    $cart_dis[] = $cList['Cart']['id'];
	                    $pro_amt = $cList['Product']['price'] -  ( $cList['Product']['price'] * $cList['Product']['discount'] / 100) ;
	                    $ord_list[] = array('id'=>null,'order_id'=>null,'product_id'=>$cList['Product']['id'],'quantity'=>$cList['Cart']['quantity'],'amount'=>$pro_amt,'is_gift'=>0);
	                    $amount = $amount + $pro_amt;
	                }
	            }
	            $ord['total_amount'] = $amount;
	            $ord['grand_total'] = $amount;
	            $ord['od_info'] = null;
	            $ord['order_status_id'] = 1;
	            
	            if ($this->Order->save($ord)) {
	                $oid = $this->Order->getLastInsertId();
	                $o_id = $country_list['CountryList']['iso2']."-".date('mH',strtotime(DATE)).$oid;
	                $oarr = array('id'=>$oid,'order_number'=>$o_id);
	                $this->Order->save($oarr);
	                foreach ($ord_list as $l){ $l['order_id'] = $oid; $order_item[] = $l; }
	                $OrderHistoryArr = array('id'=>null,'order_id'=>$oid,'order_status_id'=>1,'comment'=>'Order # '.$o_id.' has been successfully placed');
	                $this->OrderHistory->save($OrderHistoryArr);
	                $this->OrderItem->saveMany($order_item);
                    $this->Cart->deleteAll ( array ('Cart.id' => $cart_dis),false );
                    $this->Session->delete('checkOutArr');
                    $this->Session->delete('shipping');

                    $body = $this->DATA->emOrderInquiry($oid,1);
                    $pa = array( 'ORDER_NUMBER'=>$o_id,'NAME'=>$ord['first_name'],'BODY'=>$body);
                    $this->DATA->AppMail('inquiry@armytrix.com','NewOrderInquiry', $pa, DATE,2);

                    $u = SITEURL."pages/order/success/".$o_id;
                    $this->redirect($u);
                }
                $this->render('inq');

	        }
	        else{ $this->render('no_country'); }
	    }else{ $this->render('no_country'); }

	    $this->set(compact('WebSetting','checkOutArr','shipping','country_list'));
	}



	public function _cc_payment_successful($id = null,$t_info = null) {
		$this->autoRender = false;
		if( !empty($id)){
			$getToken = $this->DATA->getToken(16);
			$this->Order->bindModel(array('belongsTo'=>array('User','World'=>array('foreignKey'=>'shipping_country','fields'=>array('id','name'))),'hasMany'=>array('OrderItem')));
			$this->OrderItem->bindModel(array('belongsTo'=>array('Product')));
			$data = $this->Order->find('first',array('recursive'=>2,'conditions'=>array('Order.order_number'=>$id,'Order.transaction_id IS NULL')));
			$list = null;
			if(!empty($data['OrderItem'])){
				$n=1;
				foreach ($data['OrderItem'] as $o){
					$list.= $n.": ".$o['Product']['title'];
					if(!empty($o['Product']['part'])){ $list.=" - ".$o['Product']['part']; }
					if(!empty($o['Product']['material'])){ $list.=" (".uc($o['Product']['material']).") "; }
					$list.= "<br>";
					$n++;
				}
			}
			if(!empty($data)){
				$pa = array( 'ORDER_NUMBER'=>$data['Order']['order_number'], 'NAME'=>$data['User']['first_name'],
						'TOTAL_PRODUCT'=> count($data['OrderItem']), 'SUB_TOTAL'=> "$".$data['Order']['total_amount'],
						'SHIPPING_FEE'=> "$".$data['Order']['shipping_cost'], 'SERVICE_FEE'=> "$".$data['Order']['total_service_fee'],
						'DISCOUNT'=> "$".$data['Order']['discount'], 'PAYMENT_BY'=> 'cc', 'GT'=> "$".$data['Order']['grand_total']);
				if(!empty($data['Order']['note'])) { $pa['MESSAGE'] =  "Message : ".$data['Order']['note']; }
				else{ $pa['MESSAGE'] =  null; }
				if($data['User']['role'] == 3){ $pa['DEALER_DISCOUNT'] = "Dealer Discount : &".$data['Order']['dealer_discount']; }
				else{ $pa['DEALER_DISCOUNT']  = null;}
				$pa['PRODUCT'] = $list;
				$pa['COUNTRY'] = @$data['World']['name'];
				$arr = array('id'=>$data['Order']['id'],'transaction_id'=>$getToken,'transaction_info'=>$t_info,'payment_status'=>1,'order_status_id'=>1);
				$this->Order->save($arr);
				$this->DATA->AppMail($data['User']['email'],'OrderPlaced', $pa,$dateTime = DATE);
				$this->DATA->AppMail(WEBMAIL,'NewOrderPlaced', $pa,$dateTime = DATE);

			}
		}
	}

	public function order($id=null,$t=null) {
		$this->set('title_for_layout', 'Order status : ARMYTRIX - Automotive Weaponized');
		$this->Order->bindModel(array('hasMany'=>array('OrderItem')),false);
		$this->OrderItem->bindModel(array('belongsTo'=>array('Product')),false);
		$data = $this->Order->find('first',['recursive'=>3,'conditions'=>[ 'Order.order_number'=>$t ]]);
		if ( !empty($data) ){
		$this->set(compact('id','t','data'));
		}else{ $this->layout = '404'; }
	}

	public function check_promo(){
		$this->autoRender = false;
		if ($this->RequestHandler->isAjax()) {
			if( !empty($this->data)){
				$sb= "<script> $('#promo_code').val(''); $('#dis_promo').val('0'); $('#_discount').html('$0'); $('#gt_total').val('".$this->data['amt']."');
								$('#_gt').html('$".$this->data['amt']."'); $('#ap_promo').val('Apply'); </script>";
				$chk_promo = $this->PromoCode->find('first',array('conditions'=>array('PromoCode.code'=>trim($this->data['promo']),'PromoCode.status'=>1)));
				if(!empty($chk_promo)){
					$exp_date = date("Y-m-d H:i:s", strtotime("+".$chk_promo['PromoCode']['days']." day", strtotime( $chk_promo['PromoCode']['created'] )));
					if( strtotime(DATE) > strtotime($exp_date)){  echo $sb; echo "<div class='alert alert-danger'>Coupon is either invalid, expired or reached its usage limit!</div>"; exit; }
					else{
						if( $this->data['amt'] < $chk_promo['PromoCode']['min_amount']){
							echo $sb; echo "<div class='alert alert-danger'>Coupon code applicable only for minimum purchase amount $".$chk_promo['PromoCode']['min_amount']."</div>";
						}else{
						$gt_total = $this->data['amt'] - $chk_promo['PromoCode']['discount'];
						if($gt_total < 0){ $gt_total = 0;}
						echo "<script>
								$('#promo_code').val('".trim($this->data['promo'])."');
								$('#dis_promo').val('".$chk_promo['PromoCode']['discount']."');
								$('#_discount').html('$".$chk_promo['PromoCode']['discount']."');
								$('#gt_total').val('".$gt_total."');
								$('#_gt').html('$".$gt_total."');
								$('#ap_promo').val('Applied');
								</script>";
						}
					}
				}else{ echo $sb; echo "<div class='alert alert-danger'>Coupon is either invalid, expired or reached its usage limit!</div>"; }
			}
		}
	}

	public function extra_product($id = null){
	    $this->set('title_for_layout', 'ARMYTRIX MERCHANDISE');
	    $page_meta = $data = $pics = null;
	    $page_meta = [
	        'des'=>'We ExciteYourLife. Shop for Your Merchandise to join TEAM ARMYTRIX. Be Weaponized, LiveLifeLoud.',
	        'key'=>'armytrix, exhaust, akrapovic, magnaflow, borla, supersprint,  remus, fiexhaust, ipe, milltek, цена, السعر, precio, preis, prix, обзор, مراجعة, Überprüfung, revisión, глушитель'
	    ];
		if(!empty($id)){
			$data = $this->Product->find('first',array('recursive'=>-1,'conditions'=>array('Product.slug'=>$id,'Product.status'=>1)));
			if(!empty($data)){
					if(!empty($data['Product']['extra_photos'])){
						$mid = explode(',', $data['Product']['extra_photos']);
						$pics = $this->Library->find('all',array('conditions'=>array('Library.id'=>$mid)));
					}
			}else{ $this->layout = '404';}
			$this->set(compact('page_meta','data','pics'));
			$this->render('extra_product_details');
		}else{ $data = $this->Product->find('all',array('recursive'=>-1,'conditions'=>array('Product.type'=>4,'Product.status'=>1),'order'=>['Product.price'=>'DESC','Product.quantity'=>'DESC'],'limit'=>50));
		$this->set(compact('page_meta','data','pics'));
		}
	}

	public function update_cart() {
		$this->autoRender = false;
		 if ($this->RequestHandler->isAjax()) {
			if( !empty($this->data)){
				if($this->data['type'] == 'rm'){
					if($this->data['ty'] == 1){
						$this->Cart->id = $this->data['cid'];
						$this->Cart->delete();
					}
					elseif($this->data['ty'] == 2){
						$arr = array('id'=>$this->data['cid'],'type'=>2);
						$this->Cart->save($arr);
					}
				}
				elseif($this->data['type'] == 'update'){
					$tid = null;
					$getCart = $cnd = array();
					/* if user is not log in */
					$tid = $this->Cookie->read('guest_id');
					if($this->Auth->user('id') != "") { $cnd = array('Cart.user_id'=>ME,'Cart.id'=>$this->data['cid']); }
					elseif( !empty($tid)){ $cnd = array('Cart.guest_id'=>$tid,'Cart.id'=>$this->data['cid']); }
					if(!empty($cnd)){ $getCart = $this->Cart->find('first',array('recursive'=>-1, 'conditions'=>$cnd)); }
					if(!empty($getCart)){
						$cQ = $this->Product->find('first',array('recursive'=>-1,'conditions'=>array('Product.id'=>$getCart['Cart']['product_id'])));
						if(!empty($cQ)){
							if($cQ['Product']['quantity'] >= $this->data['qt']){
								$arr = array('id'=>$getCart['Cart']['id'],'quantity'=>$this->data['qt']);
								$this->Cart->save($arr);
							}
						}
					}}
			}
		 }
	}

	public function add_to_cart() {
		$this->layout = false;
		$this->autoRender = false;
		 if ($this->RequestHandler->isAjax()) {
			if( !empty($this->data)){
				$tid = null;
				$tid = $this->Cookie->read('guest_id');
				if($this->data['get'] == 'product'){
					$get_pro = $this->Product->find('first',array('conditions'=>array('Product.id'=>$this->data['pid'],'Product.status'=>1)));
					if(!empty($get_pro)){
						$c = $getCartData = array();
						if( !empty($tid)){ $c = array('Cart.guest_id'=>$tid,'Cart.product_id'=>$this->data['pid'],'Cart.type'=>1); }
						if(!empty($c)){ $getCartData = $this->Cart->find('first',array('conditions'=>array($c))); }
						if(empty($getCartData)){
							$arr = array('product_id'=>$this->data['pid'],'guest_id'=>$tid,'quantity'=>$this->data['q']);
							if(isset($this->data['size'])){ $arr['size'] = $this->data['size']; }
							$this->request->data['Cart'] = $arr;
							$this->Cart->save($this->request->data);
						}
					}
					$cnd = array();

					if( !empty($tid)){ $cnd = array('Cart.guest_id'=>$tid,'Cart.type'=>1); }
					if(!empty($cnd)){ $getAll = $this->Cart->find('all',array('recursive'=>2, 'conditions'=>$cnd)); }
					$this->set('getAll',$getAll);
					$this->render('cart_list');
					$ct = count($getAll);
					echo "<script>$('#cart-total').html('".$ct." item(s)');</script>";
					$title = str_replace("'",'',$get_pro['Product']['title']);
					echo "<script>$.notify({ title: 'Success',
                	message: 'You have added ".$title." to your shopping cart!'},{placement: {from: \"bottom\",align: \"right\"},
                	type: 'alert-pastel-info',allow_dismiss: true,delay:5000,animate: {enter: 'animated fadeInDown',exit: 'animated fadeOutUp'},
                	template: '<div data-notify=\"container\" class=\"col-xs-11 col-sm-3 alert alert-{0}\" role=\"alert\">' +
            		'<span data-notify=\"title\">{1}</span>' +
            		'<span data-notify=\"message\">{2}</span>' +
            	'</div>'});</script>";
					if ( $this->RequestHandler->isMobile() ) { echo "<script> $('#mob_cart_img').html('<img alt=\"\" src=\"".SITEURL."ui/cart_1.png\">'); </script>"; }
				}
				elseif($this->data['get'] == 'exhaust'){
					$ti = null;
					/* save cat-back product */
					if(!empty($this->data['cat_id'])){
						$cat_pro = $this->Product->find('first',array('conditions'=>array('Product.id'=>$this->data['cat_id'],'Product.status'=>1)));
						if(!empty($cat_pro)){
							$c1 = $getCartData1 = array();
							if (!empty($tid)) { $c1 = array('Cart.guest_id'=>$tid,'Cart.product_id'=>$this->data['cat_id'],'Cart.type'=>1); }
							if(!empty($c1)){
								$getCartData1 = $this->Cart->find('first',array('conditions'=>array($c1)));
							}
							if(empty($getCartData1)){
								$arr = array('id'=>null,'product_id'=>$this->data['cat_id'],'guest_id'=>$tid,'quantity'=>$this->data['cat_id_q']);
								$this->request->data['Cart'] = $arr;
								$this->Cart->save($this->request->data);
								$ti.= '"'.$cat_pro['Product']['title'].'"<br>';
							}
						}

					}
					/* save cata product */
					if(!empty($this->data['ecu_id'])){
						$cata_pro = $this->Product->find('first',array('conditions'=>array('Product.id'=>$this->data['ecu_id'],'Product.status'=>1)));
						if(!empty($cata_pro)){
							$c2 = $getCartData2 = array();
							if (!empty($tid)) { $c2 = array('Cart.guest_id'=>$tid,'Cart.product_id'=>$this->data['ecu_id'],'Cart.type'=>1);}
							if(!empty($c2)){ $getCartData2 = $this->Cart->find('first',array('conditions'=>array($c2))); }
							if(empty($getCartData2)){
								$arr = array('id'=>null,'product_id'=>$this->data['ecu_id'],'guest_id'=>$tid,'quantity'=>$this->data['ecu_id_q']);
								$this->request->data['Cart'] = $arr;
								$this->Cart->save($this->request->data);
								$ti.= '"'.$cata_pro['Product']['title'].'"<br>';
							}
						}

					}
					
					/* save tuning product */
					if(!empty($this->data['accessory_id'])){
						$t_pro = $this->Product->find('first',array('conditions'=>array('Product.id'=>$this->data['accessory_id'],'Product.status'=>1)));
						if(!empty($t_pro)){
							$c3 = array();
							$getCartData3 = 0;
							if( !empty($tid)){   $c3 = array('Cart.guest_id'=>$tid,'Cart.product_id'=>$this->data['accessory_id'],'Cart.type'=>1);  }
							if(!empty($c3)){ $getCartData3 = $this->Cart->find('count',array('conditions'=>array($c3))); }
							if($getCartData3 == 0){
								$arr = array('id'=>null,'product_id'=>$this->data['accessory_id'],'guest_id'=>$tid,'quantity'=>$this->data['accessory_b_q']);
								$arrdata['Cart'] = $arr;
								$this->Cart->save($arrdata);
								$ti.= '"'.$t_pro['Product']['title'].'"<br>';
							}
						}
					}
					$ti = str_replace("'",'',$ti);
					if(!empty($ti)){
						echo "<script>$.notify({ title: 'Success',
                	message: 'You have added ".$ti." to your shopping cart!'},{placement: {from: \"bottom\",align: \"right\"},
                	type: 'alert-pastel-info',allow_dismiss: true,delay:5000,animate: {enter: 'animated fadeInDown',exit: 'animated fadeOutUp'},
                	template: '<div data-notify=\"container\" class=\"col-xs-11 col-sm-3 alert alert-{0}\" role=\"alert\">' +
            		'<span data-notify=\"title\">{1}</span> <span data-notify=\"message\">{2}</span> </div>'});</script>";
					}

					$cnd = [];
					if( !empty($tid)){ $cnd = array('Cart.guest_id'=>$tid,'Cart.type'=>1); }
					if(!empty($cnd)){ $getAll = $this->Cart->find('all',array('recursive'=>2, 'conditions'=>$cnd)); }
					
					$this->set('getAll',$getAll);
					$this->render('cart_list');
					$ct = count($getAll);
					echo "<script>$('#cart-total').html('".$ct." item(s)');</script>";
					if ( $this->RequestHandler->isMobile() ) { echo "<script> $('#mob_cart_img').html('<img alt=\"\" src=\"".SITEURL."ui/cart_1.png\">'); </script>"; }
				}
			}
		 }
	}

	public function map() {
	    $this->autoRender = false;
	    $writer = new XMLWriter();
	    $writer->openURI(WWW_ROOT.'/sitemap.xml');
	    // document head
	    $writer->startDocument('1.0', 'UTF-8');
	    $writer->setIndent(4);
	    $writer->startElement('urlset');
	    $writer->writeAttribute('xmlns:xsi', 'http://www.w3.org/2001/XMLSchema-instance');
	    $writer->writeAttribute('xmlns', 'http://www.sitemaps.org/schemas/sitemap/0.9');
	    $writer->writeAttribute('xsi:schemaLocation', 'http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd');

	    $data = $this->ItemDetail->find('all',array('recursive'=>-1, 'conditions'=>array('ItemDetail.language'=>'eng','ItemDetail.status'=>1,'ItemDetail.url IS NOT NULL')));
	    if(!empty($data)){
	        foreach ($data as $list){
	            $t = $s = 0;
	            $cat_back_ids = explode(',', $list['ItemDetail']['cat_back_ids']);
	            $catalytic_ids = explode(',', $list['ItemDetail']['catalytic_ids']);
	            $cat_back = $this->Product->find('all',array('recursive'=>-1,'conditions'=>array('Product.id'=>$cat_back_ids,'Product.status'=>1)));
	            $catalytic = $this->Product->find('all',array('recursive'=>-1,'conditions'=>array('Product.id'=>$catalytic_ids,'Product.status'=>1)));
	            if(!empty($cat_back)){ foreach ($cat_back as $cList){ if($cList['Product']['material'] == 'titanium'){ $t++; } elseif($cList['Product']['material'] == 'stainless steel'){ $s++; } } }
	            if(!empty($catalytic)){ foreach ($catalytic as $c1List){ if($c1List['Product']['material'] == 'titanium'){ $t++; } elseif($c1List['Product']['material'] == 'stainless steel'){ $s++; } } }

	            $lin=utf8_encode(SITEURL."product/".$list['ItemDetail']['url']);
	            $url_date = date(DATE_W3C, strtotime($list['ItemDetail']['created']));
	            $writer->startElement('url');
	            $writer->writeElement('loc', $lin);
	            $writer->writeElement('lastmod',trim($url_date));
	            $writer->writeElement('changefreq', 'always');
	            $writer->writeElement('priority', '0.8');
	            $writer->endElement();
	            if($t > 0 ){
	                $lin=utf8_encode(SITEURL."product/".$list['ItemDetail']['url']."/ti");
	                $url_date = date(DATE_W3C, strtotime($list['ItemDetail']['created']));
	                $writer->startElement('url');
	                $writer->writeElement('loc', $lin);
	                $writer->writeElement('lastmod',trim($url_date));
	                $writer->writeElement('changefreq', 'always');
	                $writer->writeElement('priority', '0.8');
	                $writer->endElement();
	            }
	        }
	    }
	    $writer->endElement();
	    $writer->endDocument();
	    echo SITEURL.'sitemap.xml created';
	}

	public function product($id=null,$type = null) {
	    $page_meta = $data = $slider = $slidersTT = $gallery = $room_primary_image = $no_price = $feature = $lngtext = $langurl = $cat_back = $catalytic = $tuning_box = null;
	    if( isset($this->request->query['test']) && $this->request->query['test'] == 'abcd' ){
	        $this->set('abcd','Yes');
	    }
		$this->ItemDetail->bindModel(array('belongsTo'=>array('Brand','Model','Motor'),'hasMany'=>array('QualityDetail','Video'=>['order'=>['Video.pos'=>'ASC']])));
		$data = $this->ItemDetail->find('first',array('recursive'=>2, 'conditions'=>array('ItemDetail.url'=>$id,'ItemDetail.status'=>1)));
		if(!empty($data)){
		    if($data['ItemDetail']['language'] == 'eng'){ $Adata = $data; $item_detail_id = $data['ItemDetail']['id'];}
			else{ $Adata = $this->ItemDetail->find('first',array('recursive'=>-1, 'conditions'=>array('ItemDetail.id'=>$data['ItemDetail']['item_detail_id'],'ItemDetail.status'=>1)));
			         $item_detail_id = $data['ItemDetail']['item_detail_id'];
			}
			$cat_back_ids = explode(',', $Adata['ItemDetail']['cat_back_ids']);
			$catalytic_ids = explode(',', $Adata['ItemDetail']['catalytic_ids']);
			$accessory_ids = explode(',', $Adata['ItemDetail']['accessory_ids']);
			$cat_back = $this->Product->find('all',array(/* 'recursive'=>-1, */'conditions'=>array('Product.id'=>$cat_back_ids,'Product.status'=>1)));
			$catalytic = $this->Product->find('all',array(/* 'recursive'=>-1, */'conditions'=>array('Product.id'=>$catalytic_ids,'Product.status'=>1)));
			$accessory = $this->Product->find('all',array(/* 'recursive'=>-1, */'conditions'=>array('Product.id'=>$accessory_ids,'Product.status'=>1)));
			$t = $s = 0;
			if(!empty($cat_back)){ foreach ($cat_back as $cList){ if($cList['Product']['material'] == 'titanium'){ $t++; } elseif($cList['Product']['material'] == 'stainless steel'){ $s++; } } }
			if(!empty($catalytic)){ foreach ($catalytic as $c1List){ if($c1List['Product']['material'] == 'titanium'){ $t++; } elseif($c1List['Product']['material'] == 'stainless steel'){ $s++; } } }
			$feature = null;
			if($s > 0 && $t == 0){ $feature = 'ss'; $meta_title = $data['ItemDetail']['meta_title']; }
			elseif($t > 0 && $s == 0){ $feature = 'titanium';
			 $meta_title = $data['ItemDetail']['meta_title_tt']; if(empty($data['ItemDetail']['meta_title_tt'])){ $meta_title = $data['ItemDetail']['meta_title']; }
			}
			elseif($t > 0 && $s > 0){
			    if($type == 'ti'){ $feature = 'titanium';
			    $meta_title = $data['ItemDetail']['meta_title_tt']; if(empty($data['ItemDetail']['meta_title_tt'])){ $meta_title = $data['ItemDetail']['meta_title']; }
			    }
			    else{ $feature = 'ss';  $meta_title = $data['ItemDetail']['meta_title']; }
			}
			$this->set('title_for_layout', $meta_title );
			$page_meta = array('des'=>$data['ItemDetail']['meta_description'],'key'=>$data['ItemDetail']['meta_keywords']);
			$sArr = explode(',', trim($data['ItemDetail']['slider']));
			$sArr1 = explode(',', trim($data['ItemDetail']['tt_slider']));
			if(!empty($sArr) && isset($sArr[0]) && !empty($sArr[0])){ $slider = $this->Library->find('all',array('conditions'=>array('Library.id'=>$sArr),'order'=>['Library.pos'=>'ASC']/* 'order'=>array('FIELD(Library.id,' . $data['ItemDetail']['slider'] . ')') */ )); }
			if(!empty($sArr1) && isset($sArr1[0]) && !empty($sArr1[0])){ $slidersTT = $this->Library->find('all',array('conditions'=>array('Library.id'=>$sArr1),'order'=>['Library.pos'=>'ASC']/* 'order'=>array('FIELD(Library.id,' . $data['ItemDetail']['tt_slider'] . ')') */ )); }
			$gArr = explode(',', $data['ItemDetail']['gallery']);
			$gallery = $this->Library->find('all',array('conditions'=>array('Library.id'=>$gArr),'order'=>['Library.pos'=>'ASC']));
			if(isset($slider[0]['Library']['file_name'])){ $room_primary_image = SITEURL."cdn/".$slider[0]['Library']['folder']."/".$slider[0]['Library']['file_name']; }
			$string = $this->String->find('list',array('order'=>array('String.id'=>'ASC'),'fields'=>array('String.id','String.text')));
			$tran = $this->Translation->find('list',array('conditions'=>array('Translation.code'=>$data['ItemDetail']['language']),'fields'=>array('Translation.string_id','Translation.name')));
			$lngtext = array('String'=>$string,'Translation'=>$tran);
			$this->set(compact('page_meta','data','slider','slidersTT','gallery','room_primary_image','no_price','feature','lngtext','langurl','cat_back','catalytic','accessory'));
		}else{ $this->layout ='404'; }
		$this->render('n_product');
	}

	public function ui_product($id=null) {
	    if( isset($this->request->query['inquiry']) && !empty($this->request->query['inquiry'])){
	        $this->set('doInquiry','Yes');
	    }
	    $r_co = $this->Session->read('arm_co');
	    if( isset($r_co['RstrictedCountry']) && $r_co['RstrictedCountry'] == 1 ){ $this->set('no_price','yes'); }
	    if ($this->RequestHandler->isAjax() && !empty($this->data)) {
	        $str = null;
	        foreach ($this->data as $k=>$v){
	            $str.= ucwords(strtolower($k)).": ".ucwords(strtolower($v))." <br><br>"; }
	            $req = $this->data['Brand_Car_Model_Year'].", ".$this->data['country'];
	            $parameters = array('DETAILS'=>$str,'REQUEST'=>$req);
	            $this->DATA->AppMail('inquiry@armytrix.com', 'RequestForQuote', $parameters,$dateTime = DATE);
	            echo '<div class="alert alert-success" role="alert">Your request for quote/locate dealer has been send.</div>';
	            echo "<script>$('#price_inq')[0].reset(); $('#sub_btn').prop('disabled',false); $('#sub_btn').val('Submit'); setTimeout(function() { $('.mfp-close').trigger( 'click' ); }, 3000);</script>";
	            exit;
	    }

	    $this->ItemDetail->bindModel(array('belongsTo'=>array('Brand','Model','Motor'),'hasMany'=>array('QualityDetail')));
	    $data = $this->ItemDetail->find('first',array('recursive'=>2, 'conditions'=>array('ItemDetail.url'=>$id,'ItemDetail.status'=>1)));
	    if(!empty($data)){
	        $this->set('title_for_layout', $data['ItemDetail']['meta_title']);
	        $page_meta = array('des'=>$data['ItemDetail']['meta_description'],'key'=>$data['ItemDetail']['meta_keywords']);
	        $sArr = explode(',', trim($data['ItemDetail']['slider']));
	        if(!empty($sArr) && isset($sArr[0]) && !empty($sArr[0])){
	            $slider = $this->Library->find('all',array('conditions'=>array('Library.id'=>$sArr),'order'=>array('FIELD(Library.id,' . $data['ItemDetail']['slider'] . ')')));
	        }
	        $gArr = explode(',', $data['ItemDetail']['gallery']);
	        $gallery = $this->Library->find('all',array('conditions'=>array('Library.id'=>$gArr)));
	        if(isset($slider[0]['Library']['file_name'])){ $room_primary_image = SITEURL."cdn/".$slider[0]['Library']['folder']."/".$slider[0]['Library']['file_name']; }
	        if($data['ItemDetail']['language'] == 'eng'){ $Adata = $data; $item_detail_id = $data['ItemDetail']['id'];}
	        else{ $Adata = $this->ItemDetail->find('first',array('recursive'=>-1, 'conditions'=>array('ItemDetail.id'=>$data['ItemDetail']['item_detail_id'],'ItemDetail.status'=>1)));
	        $item_detail_id = $data['ItemDetail']['item_detail_id'];
	        }
	        $allLang = $this->Language->find('list',array('fields'=>array('Language.code','Language.language'),'conditions'=>array('Language.status'=>1)));
	        $lgcode = array();
	        if(!empty($allLang)){ foreach ($allLang as $lk=>$lv){ $lgcode[] = $lk; } }
	        $langurlList = $this->ItemDetail->find('list',array('recursive'=>-1,'fields'=>array('ItemDetail.url','ItemDetail.language'),
	            'conditions'=>array('ItemDetail.language'=>$lgcode,'ItemDetail.item_detail_id'=>$item_detail_id,'ItemDetail.url IS NOT NULL','ItemDetail.status'=>1)));
	        if(!empty($langurlList)){
	            foreach ($langurlList as $k=>$v){ $langurl[SITEURL."product/".$k] = uc($allLang[$v]); }
	            $langurl[SITEURL."product/".$Adata['ItemDetail']['url']] = 'English';
	        }
	        $cat_back_ids = explode(',', $Adata['ItemDetail']['cat_back_ids']);
	        $catalytic_ids = explode(',', $Adata['ItemDetail']['catalytic_ids']);
	        $tuning_box_ids = explode(',', $Adata['ItemDetail']['tuning_box_ids']);
	        $cat_back = $this->Product->find('all',array('conditions'=>array('Product.id'=>$cat_back_ids,'Product.status'=>1)));
	        $catalytic = $this->Product->find('all',array('conditions'=>array('Product.id'=>$catalytic_ids,'Product.status'=>1)));
	        $tuning_box = $this->Product->find('all',array('conditions'=>array('Product.id'=>$tuning_box_ids,'Product.status'=>1)));
	        $t = $s = 0;
	        if(!empty($cat_back)){
	            foreach ($cat_back as $cList){
	                if($cList['Product']['material'] == 'titanium'){ $t++; }
	                elseif($cList['Product']['material'] == 'stainless steel'){ $s++; }
	            }
	        }
	        if(!empty($catalytic)){
	            foreach ($catalytic as $c1List){
	                if($c1List['Product']['material'] == 'titanium'){ $t++; }
	                elseif($c1List['Product']['material'] == 'stainless steel'){ $s++; }
	            }
	        }
	        $feature = null;
	        if( $t > 0){ $feature = 'titanium';}
	        elseif($s > 0){$feature = 'ss';}
	        $string = $this->String->find('list',array('order'=>array('String.id'=>'ASC'),'fields'=>array('String.id','String.text')));
	        $tran = $this->Translation->find('list',array('conditions'=>array('Translation.code'=>$data['ItemDetail']['language']),'fields'=>array('Translation.string_id','Translation.name')));
	        $lngtext = array('String'=>$string,'Translation'=>$tran);
	        $this->set(compact('page_meta','data','slider','gallery','room_primary_image','cat_back','catalytic','tuning_box','feature','lngtext','langurl'));
	    }else{ $this->layout ='404'; }
	}

	public function test() { }

	public function t_and_c() {
		$this->set('title_for_layout', 'Terms and Conditions');
		$page_meta = array('des'=>@$this->meta['des'],'key'=>$this->meta['keys']);
		$this->set(compact('page_meta'));
	}

    public function terms_and_conditions() {
		$this->set('title_for_layout', 'Terms and Conditions of Use');
		$page_meta = array('des'=>@$this->meta['des'],'key'=>$this->meta['keys']);
		$this->set(compact('page_meta'));
	}
	public function exhaust() {
	    $this->set('title_for_layout', 'ARMYTRIX EXHAUST SYSTEM');
	    $page_meta = [
	        'des'=>'Following the Creed of Providing the Best Joy of Driving, Power and Versatility, ARMYTRIX offers the Best Performance Parts for Automotive. We ExciteYourLife',
	        'key'=>'armytrix, exhaust, akrapovic, magnaflow, borla, supersprint,  remus, fiexhaust, ipe, milltek, цена, السعر, precio, preis, prix, обзор, مراجعة, Überprüfung, revisión, глушитель'
	    ];
		$this->set(compact('page_meta'));
	}

	public function product_exhaust_brands($id=null,$model=null) {
		$arrList = array();
		$bList = $this->ExhaustBrand->find('all',array('conditions'=>array('ExhaustBrand.status'=>1),'order'=>array('ExhaustBrand.brand_name')));
		if(!empty($bList)){ foreach ($bList as $aList){ $arrList['Brand'][SITEURL.'product-exhaust-brands/'.$aList['ExhaustBrand']['url']] = uc($aList['ExhaustBrand']['brand_name']); } }
		if(!empty($id) && empty($model)){
			$this->ExhaustBrand->bindModel(array('belongsTo'=>array('Library'),'hasMany'=>array('ExhaustModel'=>array('conditions'=>array('ExhaustModel.status'=>1)))));
			$data = $this->ExhaustBrand->find('first',array( 'conditions'=>array('ExhaustBrand.url'=>$id,'ExhaustBrand.status'=>1), 'order'=>array('ExhaustBrand.id'=>'ASC'),'limit'=>50));
			if(!empty($data)){
				if( !empty($data['ExhaustBrand']['meta_title'])){ $this->set('title_for_layout',$data['ExhaustBrand']['meta_title']); }
				else{ $this->set('title_for_layout', 'Product Catalog - Armytrix Automotive Weaponized'); }
				if( !empty($data['ExhaustBrand']['meta_description'])){ $LabArr['des'] = $data['ExhaustBrand']['meta_description'];}
				if( !empty($data['ExhaustBrand']['meta_keywords'])){ $LabArr['keys'] = $data['ExhaustBrand']['meta_keywords'];}
				$page_meta = array('des'=>@$this->meta['des'],'key'=>$this->meta['keys']);
				if(!empty($data['ExhaustModel'])){ foreach ($data['ExhaustModel'] as $mList){ $arrList['Model'][SITEURL.'product-exhaust-brands/'.$data['ExhaustBrand']['url']."/".$mList['url']] = uc($mList['model_name']); } }
				$this->set(compact('page_meta','data','arrList'));
			}else{ $this->layout = '404';}
		}
		elseif (!empty($id) && !empty($model)){
			$this->ExhaustModel->bindModel(array('hasOne'=>array('ItemDetail')));
			$data = $this->ExhaustModel->find('first',array('conditions'=>array('ExhaustModel.url'=>$model,'ExhaustModel.status'=>1)));
			if( isset($data['ItemDetail']) && !empty($data['ItemDetail'])){
				$cat_back_ids = explode(',',$data['ItemDetail']['cat_back_ids']);
				$catalytic_ids = explode(',',$data['ItemDetail']['catalytic_ids']);
				$tuning_box_ids = explode(',',$data['ItemDetail']['tuning_box_ids']);
				$all =  array_merge($cat_back_ids,$catalytic_ids,$tuning_box_ids);
				$this->Product->bindModel(array('belongsTo'=>array('Library')));
				$pro = $this->Product->find('all',array('conditions'=>array('Product.id'=>$all)));
				if( !empty($data['ExhaustModel']['meta_title'])){ $this->set('title_for_layout',$data['ExhaustModel']['meta_title']); }
				else{ $this->set('title_for_layout', 'Product Catalog - Armytrix Automotive Weaponized'); }
				if( !empty($data['ExhaustModel']['meta_description'])){ $LabArr['des'] = $data['ExhaustModel']['meta_description'];}
				if( !empty($data['ExhaustModel']['meta_keywords'])){ $LabArr['keys'] = $data['ExhaustModel']['meta_keywords'];}
				$page_meta = array('des'=>@$this->meta['des'],'key'=>$this->meta['keys']);
				$this->set(compact('page_meta','data','arrList','pro'));
			}else{ $this->layout = '404';}
			$this->render('exhaust_product');
		}else{ $this->layout = '404';}
	}

	public function message($id= null) {
		$t =null;
		if($id == 'register'){ $t = 'Your Account Has Been Created!';}
		$this->set('title_for_layout', $t);
		$page_meta = array('des'=>@$this->meta['des'],'key'=>$this->meta['keys']);
		$this->set(compact('page_meta','id'));
	}

	public function warranty() {
	    $this->set('title_for_layout', 'ARMYTRIX WARRANTY & RETURN POLICY');
	    $page_meta = [
	        'des'=>'ARMYTRIX CORP. Warrants its Products to be Free of all Defects in Material and Workmanship. Warranty Extends only to the Original Buyer and is Not Transferable',
	        'key'=>'armytrix, exhaust, akrapovic, magnaflow, borla, supersprint,  remus, fiexhaust, ipe, milltek, цена, السعر, precio, preis, prix, обзор, مراجعة, Überprüfung, revisión, глушитель'
	    ];
		$this->set(compact('page_meta'));
	}

	public function questions() {
		$this->set('title_for_layout', 'Questions - Armytrix Performance Upgrades');
		$page_meta = array('des'=>@$this->meta['des'],'key'=>$this->meta['keys']);
		$this->set(compact('page_meta'));
	}

	public function tuning_box() {
		$this->set('title_for_layout', 'Tuning Box - Armytrix Performance Upgrades');
		$page_meta = array('des'=>@$this->meta['des'],'key'=>$this->meta['keys']);
		$this->set(compact('page_meta'));
	}

	public function tuning_box_warranty() {
		$this->set('title_for_layout', 'Tuning Box Questions - Armytrix Performance Upgrades');
		$page_meta = array('des'=>@$this->meta['des'],'key'=>$this->meta['keys']);
		$this->set(compact('page_meta'));
	}

public function tuning_box_qa() {
		$this->set('title_for_layout', 'Tuning Box Questions - Armytrix Performance Upgrades');
		$page_meta = array('des'=>@$this->meta['des'],'key'=>$this->meta['keys']);
		$this->set(compact('page_meta'));
	}

	public function ecu_qa() {
		$this->set('title_for_layout', 'ECU Tuning Questions - Armytrix Performance Upgrades');
		$page_meta = array('des'=>@$this->meta['des'],'key'=>$this->meta['keys']);
		$this->set(compact('page_meta'));
	}

	public function ecu_warranty() {
		$this->set('title_for_layout', 'ECU Tuning Warranty - Armytrix Performance Upgrades');
		$page_meta = array('des'=>@$this->meta['des'],'key'=>$this->meta['keys']);
		$this->set(compact('page_meta'));
	}

	public function ecu() {
		$this->set('title_for_layout', 'ECU Tuning - Armytrix Performance Upgrades');
		$page_meta = array('des'=>@$this->meta['des'],'key'=>$this->meta['keys']);
		$this->set(compact('page_meta'));
	}

	public function technology() {
	    $this->set('title_for_layout', 'ARMYTRIX VALVETRONIC TECHNOLOGY');
	    $page_meta = [
	        'des'=>'Valvetronic is built to offer tremendous functionality to daily drive. No longer to pick between explosive exhaust audio or playing-it-safe stock settings.',
	        'key'=>'armytrix, exhaust, akrapovic, magnaflow, borla, supersprint,  remus, fiexhaust, ipe, milltek, цена, السعر, precio, preis, prix, обзор, مراجعة, Überprüfung, revisión, глушитель'
	    ];
		$this->set(compact('page_meta'));
	}

	public function testimonial() {
		$this->set('title_for_layout', 'Testimonial - Armytrix Performance Upgrades');
		$page_meta = array('des'=>@$this->meta['des'],'key'=>$this->meta['keys']);
		$this->set(compact('page_meta'));
	}

	public function featured_video() {
	    $this->set('title_for_layout', 'ARMYTRIX MOVIE');
	    $page_meta = [
	        'des'=>'Following the Creed of Providing the Best Joy of Driving, Power and Versatility, ARMYTRIX offers the Best Performance Parts for Automotive. We ExciteYourLife',
	        'key'=>'armytrix, exhaust, akrapovic, magnaflow, borla, supersprint,  remus, fiexhaust, ipe, milltek, цена, السعر, precio, preis, prix, обзор, مراجعة, Überprüfung, revisión, глушитель'
	    ];
		$this->set(compact('page_meta'));
	}

	public function dealer() {
		$this->set('title_for_layout', 'Authorized Dealers - Armytrix Performance Upgrades');
		$page_meta = array('des'=>@$this->meta['des'],'key'=>$this->meta['keys']);
		$this->set(compact('page_meta'));
	}

	public function tuning_search() {

		$this->set('title_for_layout', 'ECU Tuning - Armytrix Exhaust | ECU Tuning | Power Box | OBD-II Scanner');
		$page_meta = array('des'=>@$this->meta['des'],'key'=>$this->meta['keys']);
		$b = $this->Brand->find('list',array('order'=>array('Brand.name'=>'ASC')));
		$this->set(compact('page_meta','b'));
	}

	public function get_for() {
	    $this->autoRender = false;
	    if ($this->RequestHandler->isAjax()) {
	        if(!empty($this->data)){
	            $a = null;
	            $str1 = '<option value="">Select Model</option>';
	            $str2 = '<option value="">Select Engine</option>';
	            if( isset($this->data['get']) && $this->data['get'] == 'motor' && $this->data['type'] == 'brand' && isset($this->data['id'])){
                $mID = array();
                $mList = $this->ItemDetail->find('list',array('conditions'=>array('ItemDetail.status'=>1,'OR'=>array('ItemDetail.cat_back_ids IS NOT NULL','ItemDetail.catalytic_ids IS NOT NULL')),'group'=>array('ItemDetail.model_id'), 'fields'=>array('ItemDetail.id','ItemDetail.model_id') ));
                if(!empty($mList)){ foreach ($mList as $k=>$l){ $mID[]=$l; } }
                $result1 = $this->Model->find('all',array('conditions'=>array('Model.id'=>$mID,'Model.brand_id'=>$this->data['id'],'Model.status'=>1)));
                if(!empty($result1)){ foreach ($result1 as $list){
                    $ttt = str_replace("'","\'",$list['Model']['name']);
                    $str1.='<option value="'.$list['Model']['id'].'">'.htmlspecialchars($ttt).'</option>';
                }}
	            echo "<script>$('#RequestModel').html('$str1');</script>";
            }
            elseif( isset($this->data['get']) && $this->data['get'] == 'engine' && $this->data['type'] == 'motor' && isset($this->data['id'])){
            $q1 = array();
            $mList = $this->ItemDetail->find('list',array('conditions'=>array('ItemDetail.status'=>1,'ItemDetail.model_id'=>$this->data['id'],'OR'=>array('ItemDetail.cat_back_ids IS NOT NULL','ItemDetail.catalytic_ids IS NOT NULL')),'group'=>array('ItemDetail.motor_id'),'fields'=>array('ItemDetail.id','ItemDetail.motor_id')));
            if(!empty($mList)){ foreach ($mList as $k=>$l){ $q1[]=$l; } }

            $result1 = $this->Motor->find('all',array('conditions'=>array('Motor.id'=>$q1,'Motor.model_id'=>$this->data['id'],'Motor.status'=>1)));
            if(!empty($result1)){ foreach ($result1 as $list){
                $ttt = str_replace("'","\'",$list['Motor']['name']);
                $str2.='<option value="'.$list['Motor']['id'].'">'.htmlspecialchars($ttt).'</option>';
            }}
            echo "<script>$('#RequestEngine').html('$str2');</script>";
            }
        }
    }
 }


	public function get_exhaust() {
		$this->autoRender = false;
		if ($this->RequestHandler->isAjax()) {
			if(!empty($this->data)){
				/* get product based on brand and model*/
				if( isset($this->data['get']) && $this->data['get'] == 'product' && $this->data['type'] == 'brand' && isset($this->data['id'])){
					$a = null;
					$str1 = '<option value="">Select Model</option>';
					$str2 = '<option value="">Select Engine</option>';
					if(!empty($this->data['id'])){
						$mID = array();
						$mList = $this->ItemDetail->find('list',array('conditions'=>array('ItemDetail.status'=>1,'OR'=>array('ItemDetail.cat_back_ids IS NOT NULL','ItemDetail.catalytic_ids IS NOT NULL')),'group'=>array('ItemDetail.model_id'), 'fields'=>array('ItemDetail.id','ItemDetail.model_id') ));
						if(!empty($mList)){ foreach ($mList as $k=>$l){ $mID[]=$l; } }
						$bid = array();
						$result1 = $this->Model->find('all',array(
						    'conditions'=>array('Model.id'=>$mID,'Model.brand_id'=>$this->data['id'],'Model.status'=>1),
						    'order'=>array('Model.pos'=>'ASC','Model.name'=>'ASC')
						));
						if(!empty($result1)){ foreach ($result1 as $list){ $str1.='<option value="'.$list['Model']['id'].'">'.htmlspecialchars($list['Model']['name']).'</option>'; } }
					}
					echo "<script>$('#model').html('$str1');</script>";
					echo "<script>$('#motor').html('$str2');</script>";
				}
				if( isset($this->data['get']) && $this->data['get'] == 'product' && $this->data['type'] == 'model' && isset($this->data['id'])){
					$a = null;
					$str1 = '<option value="">Select Engine</option>';
					if(!empty($this->data['id'])){
						$q1 = array();
						$mList = $this->ItemDetail->find('list',array('conditions'=>array('ItemDetail.status'=>1,'ItemDetail.model_id'=>$this->data['id'],'OR'=>array('ItemDetail.cat_back_ids IS NOT NULL','ItemDetail.catalytic_ids IS NOT NULL')),'group'=>array('ItemDetail.motor_id'),'fields'=>array('ItemDetail.id','ItemDetail.motor_id')));
						if(!empty($mList)){ foreach ($mList as $k=>$l){ $q1[]=$l; } }
						$result1 = $this->Motor->find('all',array('conditions'=>array('Motor.id'=>$q1,'Motor.model_id'=>$this->data['id'],'Motor.status'=>1)));
						if(!empty($result1)){ foreach ($result1 as $list){
							$ttt = str_replace("'","\'",$list['Motor']['name']);
							$str1.='<option value="'.$list['Motor']['id'].'">'.htmlspecialchars($ttt).'</option>';
						} }
					}
					echo "<script>$('#motor').html('$str1');</script>";
				}
				if( isset($this->data['get']) && $this->data['get'] == 'product' && $this->data['type'] == 'motor' && isset($this->data['id'])){
					$r_co = $this->Session->read('arm_co');
					$all = array();
					$this->ItemDetail->bindModel(array('belongsTo'=>array('Motor')));
					$this->Product->bindModel(array('belongsTo'=>array('Brand','Model','Motor')));
					$getPro = $this->ItemDetail->find('first',array('recursive'=>2, 'conditions'=>array('ItemDetail.motor_id'=>$this->data['id'],
							'ItemDetail.brand_id'=>$this->data['brand'],'ItemDetail.model_id'=>$this->data['model'])));
					if(!empty($getPro)){
						$cat_id = explode(',', $getPro['ItemDetail']['cat_back_ids']);
						$cata_id = explode(',', $getPro['ItemDetail']['catalytic_ids']);
						$all_cat = $this->Product->find('all',array('conditions'=>array('Product.id'=>$cat_id,'Product.status'=>1)));
						$all_pro = $this->Product->find('all',array('conditions'=>array('Product.id'=>$cata_id,'Product.status'=>1)));
						$tag = null;
						if(isset($getPro['Motor']['Library']['full_path']) && !empty($getPro['Motor']['Library']['full_path'])){
						$img = new_show_image('cdn/'.@$getPro['Motor']['Library']['full_path'],360,240,100,'ff',null);
						$tag = '<img src="'.$img.'" alt="'.@$getPro['Motor']['Library']['alt'].'" title="'.@$getPro['Motor']['Library']['title'].'" >';
						}
						echo "<script> $('#car_pic').html('".$tag."'); $('#title_d').html('". addslashes($getPro['ItemDetail']['name'])."'); </script>";
						$t = $s = 0;
						if(!empty($all_cat)){ foreach ($all_cat as $cList){ if($cList['Product']['material'] == 'titanium'){ $t++; } elseif($cList['Product']['material'] == 'stainless steel'){ $s++; } } }
						if(!empty($all_pro)){ foreach ($all_pro as $c1List){ if($c1List['Product']['material'] == 'titanium'){ $t++; } elseif($c1List['Product']['material'] == 'stainless steel'){ $s++; } } }
						$list1 = null;
						if(!empty($all_cat)){
						    $d_n = 1;
						    foreach ($all_cat as $aList){
						        $mat_type =  $p_price = $type = null;
						        $href = 'javascript:void(0);';
						        $pImg = new_show_image('cdn/no_image_available.jpg',270,180,100,'ff',null);
						        $realImg = SITEURL.'cdn/no_image_available.jpg';
						        if(in_array($aList['Product']['type'],array(2,3,5)) && isset($getPro['ItemDetail']['url']) && !empty($getPro['ItemDetail']['url'])){
						            $href = SITEURL."product/".$getPro['ItemDetail']['url'];
						        }else{ $href = 'javascript:void(0);'; }

						        if(isset($aList['Product']['material'])){
						            if( $aList['Product']['material'] == 'stainless steel'){ $mat_type = '<li class="stainless_steel"><a>Stainless steel</a></li>'; }
						            elseif( $aList['Product']['material'] == 'titanium'){ $mat_type = '<li class="titanium"><a>Titanium</a></li>'; if($t > 0 && $s > 0){ $type = '/ti'; } }
						        }

						        if($aList['Product']['type'] == 1){
						            $href = SITEURL."collections/products/".$aList['Product']['slug'];
						            $ima = json_decode($aList['Product']['images'],true);
						            $pImg = new_show_image('cdn/cdnimg/'.$ima[0],270,180,100,'ff',null);
						            $realImg = SITEURL.'cdn/cdnimg/'.$ima[0];
						        }
						        else{
						            if(isset($aList['Library']['full_path']) && !empty($aList['Library']['full_path'])){
						                $pImg = new_show_image('cdn/'.$aList['Library']['full_path'],270,180,100,'ff',null);
						                $realImg = SITEURL.'cdn/'.$aList['Library']['full_path'];
						            } }

						            $href = $href.$type;
						                if($aList['Product']['quantity'] > 0){
						                    if( isset($r_co['RstrictedCountry']) && $r_co['RstrictedCountry'] == 1 ){
						                        $btn = '<a href="'.$href.'" target="_blank" title="inquiry" class="btn btn-success ful-wd-btn">Inquiry</a>';
						                        $p_price = null;
						                    }
						                    else{ $btn = '<input value="add to cart" class="btn btn-success ful-wd-btn" onclick="add_pro('.$aList['Product']['id'].')" type="button">';
						                    if ( $aList['Product']['discount'] > 0 ){
						                        $p1 = $aList['Product']['price'] -  ( $aList['Product']['price'] * $aList['Product']['discount'] / 100) ;
						                        $p_price = "Price: USD <strike>$".num_2($aList['Product']['price'])."</strike> <spam class=\'text-danger\'>$".num_2($p1)."</spam>";
						                    }else{ $p_price = "Price: USD $".num_2($aList['Product']['price']); }
						                    if ( $aList['Product']['preorder'] > 0 ){ $p_price.=" <span class=\'text-danger\'> Pre-order available </span>"; }
						                    }
						                }
						                else{
						                    if( isset($r_co['RstrictedCountry']) && $r_co['RstrictedCountry'] == 1 ){ $p_price = null; }
						                    else{
						                        if ( $aList['Product']['discount'] > 0 ){
						                            $p1 = $aList['Product']['price'] -  ( $aList['Product']['price'] * $aList['Product']['discount'] / 100) ;
						                            $p_price = "Price: USD <strike>$".num_2($aList['Product']['price'])."</strike> <spam class=\'text-danger\'>$".num_2($p1)."</spam>";
						                        }else{ $p_price = "Price: USD $".num_2($aList['Product']['price']); }
						                        if ( $aList['Product']['preorder'] > 0 ){ $p_price.=" <span class=\'text-danger\'> Pre-order available </span>"; }

						                    }
						                    $btn = '<input value="Out of Stock" class="hasIcon shortcode_button btn btn_type4 w100" type="button">';
						                    //$p_price = null;
						                }
						                $abc_name = $aList['Model']['name']."/".$aList['Motor']['name'];
						                $ttt1 = str_replace("'","\'",$abc_name);
						                $list1.= '<div class=" item-bx-arm"><div class="mx-wd"><div class="col-sm-4"><div class="img-pro"> <a href="'.$href.'" target="_blank" class="thumbnail"><img src="'.$pImg.'" title="'.$aList['Library']['title'].'" alt="'.$aList['Library']['alt'].'"/><span><img src="'.$realImg.'" ></span></a> </div></div><div class="col-sm-8"><div class="exaust-cntnt"><div class="featrs-txt"> <a href="'.$href.'" target="_blank"><h3>'.$ttt1.'</h3><p>'.substr($aList['Product']['title'],0,145).'</p></a> </div><div class="ptxt">'.$p_price.'</div><div class="buton-bottm"><ul class="metal-type"><li><a>'.substr($aList['Product']['part'],0,15).'</a></li>'.$mat_type.'</ul><div class="add-cart-btn">'.$btn.'</div></div></div><div class="clearfix"></div></div></div></div>';
						                $d_n++; }
						}
						$list = null;
						if(!empty($all_pro)){
							$d_n = 1;
							foreach ($all_pro as $aList){
								$mat_type = null;
								$p_price = null;
								$href = 'javascript:void(0);';
								$pImg = new_show_image('cdn/no_image_available.jpg',270,180,100,'ff',null);
								$realImg = SITEURL.'cdn/no_image_available.jpg';
								if(in_array($aList['Product']['type'],array(2,3,5)) && isset($getPro['ItemDetail']['url']) && !empty($getPro['ItemDetail']['url'])){
									$href = SITEURL."product/".$getPro['ItemDetail']['url'];
								}else{ $href = 'javascript:void(0);'; }
								if(isset($aList['Product']['material'])){
									if( $aList['Product']['material'] == 'stainless steel'){ $mat_type = '<li class="stainless_steel"><a>Stainless steel</a></li>'; }
									elseif( $aList['Product']['material'] == 'titanium'){ $mat_type = '<li class="titanium"><a>Titanium</a></li>'; if($t > 0 && $s > 0){ $type = '/ti'; }}
								}
								if($aList['Product']['type'] == 1){
									$href = SITEURL."collections/products/".$aList['Product']['slug'];
									$ima = json_decode($aList['Product']['images'],true);
									$pImg = new_show_image('cdn/cdnimg/'.$ima[0],270,180,100,'ff',null);
									$realImg = SITEURL.'cdn/cdnimg/'.$ima[0];
								}
								else{
									if(isset($aList['Library']['full_path']) && !empty($aList['Library']['full_path'])){
									$pImg = new_show_image('cdn/'.$aList['Library']['full_path'],270,180,100,'ff',null);
									$realImg = SITEURL.'cdn/'.$aList['Library']['full_path'];
									} }
    							$href = $href.$type;
								if($aList['Product']['quantity'] > 0){
									if( isset($r_co['RstrictedCountry']) && $r_co['RstrictedCountry'] == 1 ){
										$btn = '<a href="'.$href.'" target="_blank" title="inquiry" class="btn btn-success ful-wd-btn">Inquiry</a>';
										$p_price = null;
									}
									else{ $btn = '<input value="add to cart" class="btn btn-success ful-wd-btn" onclick="add_pro('.$aList['Product']['id'].')" type="button">';
									if ( $aList['Product']['discount'] > 0 ){
									    $p1 = $aList['Product']['price'] -  ( $aList['Product']['price'] * $aList['Product']['discount'] / 100) ;
									    $p_price = "Price: USD <strike>$".num_2($aList['Product']['price'])."</strike> <spam class=\'text-danger\'>$".num_2($p1)."</spam>";
									}else{ $p_price = "Price: USD $".num_2($aList['Product']['price']); }
									   if ( $aList['Product']['preorder'] > 0 ){ $p_price.=" <span class=\'text-danger\'> Pre-order available </span>"; }
									}
								}
								else{
									if( isset($r_co['RstrictedCountry']) && $r_co['RstrictedCountry'] == 1 ){ $p_price = null; }
									else{

									    if ( $aList['Product']['discount'] > 0 ){
									        $p1 = $aList['Product']['price'] -  ( $aList['Product']['price'] * $aList['Product']['discount'] / 100) ;
									        $p_price = "Price: USD <strike>$".num_2($aList['Product']['price'])."</strike> <spam class=\'text-danger\'>$".num_2($p1)."</spam>";
									    }else{ $p_price = "Price: USD $".num_2($aList['Product']['price']); }
									    if ( $aList['Product']['preorder'] > 0 ){ $p_price.=" <span class=\'text-danger\'> Pre-order available </span>"; }
									}
									$btn = '<input value="Out of Stock" class="hasIcon shortcode_button btn btn_type4 w100" type="button">';
									//$p_price = null;
								}
								$abc_name = $aList['Model']['name']."/".$aList['Motor']['name'];
								$ttt1 = str_replace("'","\'",$abc_name);
							$list.= '<div class=" item-bx-arm"><div class="mx-wd"><div class="col-sm-4"><div class="img-pro"> <a href="'.$href.'" target="_blank" class="thumbnail"><img src="'.$pImg.'" title="'.$aList['Library']['title'].'" alt="'.$aList['Library']['alt'].'"/><span><img src="'.$realImg.'" ></span></a> </div></div><div class="col-sm-8"><div class="exaust-cntnt"><div class="featrs-txt"> <a href="'.$href.'" target="_blank"><h3>'.$ttt1.'</h3><p>'.substr($aList['Product']['title'],0,145).'</p></a> </div><div class="ptxt">'.$p_price.'</div><div class="buton-bottm"><ul class="metal-type"><li><a>'.substr($aList['Product']['part'],0,15).'</a></li>'.$mat_type.'</ul><div class="add-cart-btn">'.$btn.'</div></div></div><div class="clearfix"></div></div></div></div>';
							$d_n++; }
						}
						echo "<script>$('#demo').html('".$list."'); $('#demo').show();</script>";
						echo "<script>$('#demo_2').html('".$list1."'); $('#demo_2').show();</script>";
					}
					exit;
				}
			}
		}
	}


	public function product_tuning_box() {
		$this->autoRender = false;
		$this->redirect('/');
		$this->set('title_for_layout', 'ARMYTRON Plug N Play Tuning Box by ARMYTRIX');
		$page_meta = array('des'=>@$this->meta['des'],'key'=>$this->meta['keys']);
		$p = $this->Product->find('list',array('conditions'=>array('Product.type'=>1),'group'=>array('Product.brand_id'),'fields'=>array('Product.id','Product.brand_id')));
		$b = $this->Brand->find('list',array('order'=>array('Brand.name'=>'ASC'),'conditions'=>array('Brand.id'=>$p)));
		$this->paginate = array('recursive'=>1,'limit' => 15,'conditions'=>array('Product.type'=>1),'order' => array('Product.id' => 'DESC'));
		$product = $this->paginate('Product');
		$paging = $this->params['paging'];
		$this->set(compact('page_meta','b','product','paging'));
	}

	public function get_product() {
		$this->autoRender = false;
		if ($this->RequestHandler->isAjax()) {
			if(!empty($this->data)){
				/* get product based on brand and model*/
				if( isset($this->data['get']) && $this->data['get'] == 'product' && $this->data['type'] == 'brand' && isset($this->data['id'])){
					$a = null;
					$str1 = '<option value="">Select Model</option>';
					$str2 = '<option value="">Select Engine</option>';
					if(!empty($this->data['id'])){
						$q = $this->Product->find('list',array('conditions'=>array('Product.type'=>1), 'group'=>array('Product.model_id'),'fields'=>array('Product.id','Product.model_id')));
						$bid = array();
						$result1 = $this->Model->find('all',array('conditions'=>array('Model.id'=>$q,'Model.brand_id'=>$this->data['id'])));
						if(!empty($result1)){ foreach ($result1 as $list){ $str1.='<option value="'.$list['Model']['id'].'">'.$list['Model']['name'].'</option>'; } }
					}
					echo "<script>$('#model').html('$str1');</script>";
					echo "<script>$('#motor').html('$str2');</script>";
					$c = array('Product.type'=>1);
					if(!empty($this->data['id'])) { $c[]= array('Product.brand_id'=>$this->data['id']); }
					$this->paginate = array('recursive'=>1,'limit' => 15,'conditions'=>$c,'order' => array('Product.id' => 'DESC'));
					$product = $this->paginate('Product');
					$paging = $this->params['paging'];
					$info = null;
					if(!empty($product)){
					foreach ($product as $pList){
						$title  = str_replace("'","\'",substr($pList['Product']['title'],0,100));
						$url  = SITEURL."collections/products/".$pList['Product']['slug'].".html";
						$img = json_decode($pList['Product']['images'],true);
						$pic = 'no_image.png';
						if(isset($img[0])){ $pic = $img[0]; }
						$main = show_image('cdn/cdnimg',$pic,400,300,80,'ff',null);
						$info.= '<div class="blogpost_preview_fw element stuff"><div class="fw_preview_wrapper"><div class="gallery_item_wrapper"><a href="'.$url.'" ><img src="'.$main.'" alt="" class="fw_featured_image" width="540"><div class="gallery_fadder"></div><span class="gallery_ico"><i class="hasIcon shortcode_button btn_small btn_type1">View</i></span></a></div><div class="grid-port-cont"><h6><a href="'.$url.'">'.$title.'</a></h6></div></div></div>';
						$main = null;
					}}
					if(!empty($info)){ $str = '<div class="fullscreen_block"><div class="fs_blog_module image-grid" id="list">'.$info.'</div></div>'; }
					else{ $str = '<div class="fullscreen_block"><div class="fs_blog_module image-grid" id="list"><a href="javascript:void(0)" class="load_more_works"><i class="icon-arrow-down1"></i>Product not found.</a></div></div>'; }
					$l = $c = null;
					$t = 0;
					if(!empty($this->data['id'])) { $t = '1'; }
					if(isset($paging['Product']['pageCount']) && !empty($paging['Product']['pageCount'])){
						$p = $paging['Product']['count'] / 15;
						$p = ceil($p);
					for($i=1;$i<=$p;$i++){
						$c = null;
						$l.= '<li><a href="javascript:void(0)" onclick="next('.$i.','.$t.','.(int)$this->data['id'].');" id="'.$i.'" class="'.$c.'">'.$i.'</a></li>'; }
					}
					$pag = '<div class="clearfix pd_10"></div><ul class="pagerblock">'.$l.'</ul>';
					$str.= $pag;
					echo "<script>$('#show_info').html('".$str."');</script>";
				}
				if( isset($this->data['get']) && $this->data['get'] == 'product' && $this->data['type'] == 'model' && isset($this->data['id'])){
					$a = null;
					$str1 = '<option value="">Select Engine</option>';
					if(!empty($this->data['id'])){
						$q = $this->Product->find('list',array('conditions'=>array('Product.type'=>1), 'group'=>array('Product.motor_id'),'fields'=>array('Product.id','Product.motor_id')));
						$result1 = $this->Motor->find('all',array('conditions'=>array('Motor.id'=>$q,'Motor.model_id'=>$this->data['id'])));
						if(!empty($result1)){ foreach ($result1 as $list){ $str1.='<option value="'.$list['Motor']['id'].'">'.$list['Motor']['name'].'</option>'; } }
					}
					echo "<script>$('#motor').html('$str1');</script>";
					$c = array('Product.type'=>1);
					if(!empty($this->data['id'])) { $c[]= array('Product.model_id'=>$this->data['id']); }
					elseif(empty($this->data['id']) && !empty($this->data['brand'])){ $c = array('Product.brand_id'=>$this->data['brand']); }
					$this->paginate = array('recursive'=>1,'limit' => 15,'conditions'=>$c,'order' => array('Product.id' => 'DESC'));
					$product = $this->paginate('Product');
					$info = null;
					if(!empty($product)){
						foreach ($product as $pList){
							$title  = str_replace("'","\'",substr($pList['Product']['title'],0,100));
							$url  = SITEURL."collections/products/".$pList['Product']['slug'].".html";
							$img = json_decode($pList['Product']['images'],true);
							$pic = 'no_image.png';
							if(isset($img[0])){ $pic = $img[0]; }
							$main = show_image('cdn/cdnimg',$pic,400,300,80,'ff',null);
							$info.= '<div class="blogpost_preview_fw element stuff"><div class="fw_preview_wrapper"><div class="gallery_item_wrapper"><a href="'.$url.'" ><img src="'.$main.'" alt="" class="fw_featured_image" width="540"><div class="gallery_fadder"></div><span class="gallery_ico"><i class="hasIcon shortcode_button btn_small btn_type1">View</i></span></a></div><div class="grid-port-cont"><h6><a href="'.$url.'">'.$title.'</a></h6></div></div></div>';
							$main = null;
					}}
					if(!empty($info)){ $str = '<div class="fullscreen_block"><div class="fs_blog_module image-grid" id="list">'.$info.'</div></div>'; }
					else{ $str = '<div class="fullscreen_block"><div class="fs_blog_module image-grid" id="list"><a href="javascript:void(0)" class="load_more_works"><i class="icon-arrow-down1"></i>Product not found.</a></div></div>'; }
					echo "<script>$('#show_info').html('".$str."');</script>";
				}
				if( isset($this->data['get']) && $this->data['get'] == 'product' && $this->data['type'] == 'motor' && isset($this->data['id'])){
					$this->paginate = array('recursive'=>1,'limit' => 15,'conditions'=>array('Product.type'=>1,'Product.motor_id'=>$this->data['id']),'order' => array('Product.id' => 'DESC'));
					$product = $this->paginate('Product');
					$info = null;
					if(!empty($product)){
						foreach ($product as $pList){
							$title  = str_replace("'","\'",substr($pList['Product']['title'],0,100));
							$url  = SITEURL."collections/products/".$pList['Product']['slug'].".html";
							$img = json_decode($pList['Product']['images'],true);
							$pic = 'no_image.png';
							if(isset($img[0])){ $pic = $img[0]; }
							$main = show_image('cdn/cdnimg',$pic,400,300,80,'ff',null);
							$info.= '<div class="blogpost_preview_fw element stuff"><div class="fw_preview_wrapper"><div class="gallery_item_wrapper"><a href="'.$url.'" ><img src="'.$main.'" alt="" class="fw_featured_image" width="540"><div class="gallery_fadder"></div><span class="gallery_ico"><i class="hasIcon shortcode_button btn_small btn_type1">View</i></span></a></div><div class="grid-port-cont"><h6><a href="'.$url.'">'.$title.'</a></h6></div></div></div>';
							$main = null;
					}}
					if(!empty($info)){ $str = '<div class="fullscreen_block"><div class="fs_blog_module image-grid" id="list">'.$info.'</div></div>'; }
					else{ $str = '<div class="fullscreen_block"><div class="fs_blog_module image-grid" id="list"><a href="javascript:void(0)" class="load_more_works"><i class="icon-arrow-down1"></i>Product not found.</a></div></div>'; }
					echo "<script>$('#show_info').html('".$str."');</script>";
				}
				if(isset($this->data['pagination'])){
					$lmt = 15;
					if($this->data['type'] == 0){
						$c = array();
						$this->request->params['named']['page'] = $this->data['page'];
						$this->paginate = array(/* 'offset' => $pag, */ 'conditions'=>array('Product.type'=>1), 'limit' => $lmt, 'order' => array('Product.id' => 'DESC'));
						$product = $this->paginate('Product');
						$paging = $this->params['paging'];
						$info = null;
						if(!empty($product)){
							foreach ($product as $pList){
								$title  = str_replace("'","\'",substr($pList['Product']['title'],0,100));
								$url  = SITEURL."collections/products/".$pList['Product']['slug'].".html";
								$img = json_decode($pList['Product']['images'],true);
								$pic = 'no_image.png';
								if(isset($img[0])){ $pic = $img[0]; }
								$main = show_image('cdn/cdnimg',$pic,400,300,80,'ff',null);
								$info.= '<div class="blogpost_preview_fw element stuff"><div class="fw_preview_wrapper"><div class="gallery_item_wrapper"><a href="'.$url.'" ><img src="'.$main.'" alt="" class="fw_featured_image" width="540"><div class="gallery_fadder"></div><span class="gallery_ico"><i class="hasIcon shortcode_button btn_small btn_type1">View</i></span></a></div><div class="grid-port-cont"><h6><a href="'.$url.'">'.$title.'</a></h6></div></div></div>';
								$main = null;
							}}
							if(!empty($info)){ $str = '<div class="fullscreen_block"><div class="fs_blog_module image-grid" id="list">'.$info.'</div></div>'; }
							else{ $str = '<div class="fullscreen_block"><div class="fs_blog_module image-grid" id="list"><a href="javascript:void(0)" class="load_more_works"><i class="icon-arrow-down1"></i>Product not found.</a></div></div>'; }
							$l = $c = null;
							$t = 0;
							if(!empty($this->data['id'])) { $t = '1'; }
							if(isset($paging['Product']['pageCount']) && !empty($paging['Product']['pageCount'])){
								$p = $paging['Product']['count'] / 15;
								$p = ceil($p);
								for($i=1;$i<=$p;$i++){
									$c = null;
									if($paging['Product']['page'] == $i){ $c = 'current'; }
									$l.= '<li><a href="javascript:void(0)" onclick="next('.$i.','.$t.',0);" id="'.$i.'" class="'.$c.'">'.$i.'</a></li>'; }
							}
							$pag = '<div class="clearfix pd_10"></div><ul class="pagerblock">'.$l.'</ul>';
							$str.= $pag;
							echo "<script>$('#show_info').html('".$str."');</script>";
					}
					else if($this->data['type'] == 1){
						$c = array('Product.type'=>1);
						$this->request->params['named']['page'] = $this->data['page'];
						if(isset($this->data['brand_id']) && !empty($this->data['brand_id'])){ $c = array('Product.brand_id'=>$this->data['brand_id']); }
						$this->paginate = array('conditions'=>$c,'limit' => $lmt, 'order' => array('Product.id' => 'DESC'));
						$product = $this->paginate('Product');
						$paging = $this->params['paging'];
						$info = null;
						if(!empty($product)){
							foreach ($product as $pList){
								$title  = str_replace("'","\'",substr($pList['Product']['title'],0,100));
								$url  = SITEURL."collections/products/".$pList['Product']['slug'].".html";
								$img = json_decode($pList['Product']['images'],true);
								$pic = 'no_image.png';
								if(isset($img[0])){ $pic = $img[0]; }
								$main = show_image('cdn/cdnimg',$pic,400,300,80,'ff',null);
								$info.= '<div class="blogpost_preview_fw element stuff"><div class="fw_preview_wrapper"><div class="gallery_item_wrapper"><a href="'.$url.'" ><img src="'.$main.'" alt="" class="fw_featured_image" width="540"><div class="gallery_fadder"></div><span class="gallery_ico"><i class="hasIcon shortcode_button btn_small btn_type1">View</i></span></a></div><div class="grid-port-cont"><h6><a href="'.$url.'">'.$title.'</a></h6></div></div></div>';
								$main = null;
							}}
							if(!empty($info)){ $str = '<div class="fullscreen_block"><div class="fs_blog_module image-grid" id="list">'.$info.'</div></div>'; }
							else{ $str = '<div class="fullscreen_block"><div class="fs_blog_module image-grid" id="list"><a href="javascript:void(0)" class="load_more_works"><i class="icon-arrow-down1"></i>Product not found.</a></div></div>'; }
							$l = $c = null;
							$t = 0;
							if(!empty($this->data['id'])) { $t = '1'; }
							if(isset($paging['Product']['pageCount']) && !empty($paging['Product']['pageCount'])){
								$p = $paging['Product']['count'] / 15;
								$p = ceil($p);
								for($i=1;$i<=$p;$i++){
									$c = null;
									if($paging['Product']['page'] == $i){ $c = 'current'; }
									$l.= '<li><a href="javascript:void(0)" onclick="next('.$i.','.$this->data['type'].','.$this->data['brand_id'].');" id="'.$i.'" class="'.$c.'">'.$i.'</a></li>'; }
							}
							$pag = '<div class="clearfix pd_10"></div><ul class="pagerblock">'.$l.'</ul>';
							$str.= $pag;
							echo "<script>$('#show_info').html('".$str."');</script>";
					}

				}

			}
		}
	}



	public function get_tuning_search() {

		$this->autoRender = false;
		if ($this->RequestHandler->isAjax()) {
			if(!empty($this->data)){
				$str = null;
				if($this->data['get'] == 'model' && isset($this->data['id'])){
					$a = null;
					$str = '<option value="">Select Model</option>';
					$r = $this->Model->find('list',array('order'=>array('Model.name'=>'ASC'),'conditions'=>array('Model.brand_id'=>$this->data['id'])));
					if(!empty($r)){ foreach ($r as $k=>$v){ $str.='<option value="'.$k.'">'.$v.'</option>'; } }
					echo "<script>$('#model').html('$str');</script>";
				}
				if($this->data['get'] == 'motor' && isset($this->data['id'])){
					$a = null;
					$m = $this->Motor->find('list',array('order'=>array('Motor.name'=>'ASC'),'conditions'=>array('Motor.model_id'=>$this->data['id'])));
					$str = '<option value="">Select Engine</option>';
					if(!empty($m)){ foreach ($m as $k=>$v){ $str.='<option value="'.$k.'">'.$v.'</option>'; }
						echo "<script>$('#motor').html('$str');</script>"; }
					else{ echo '<div class="alert alert-danger">Engine details not available for this time.</div>';}
				}
				if($this->data['get'] == 'info'){
					if( isset($this->data['motor']) && !empty($this->data['motor']) ){
						if(isset($this->data['chiptuning']) || isset($this->data['catlesskit'])){
							$this->Motor->bindModel(array('belongsTo'=>array('Model','Brand')));
							$motor = $this->Motor->find('first',array('order'=>array('Motor.name'=>'ASC'),'conditions'=>array('Motor.id'=>$this->data['motor'])));
							$info = null;
							if(!empty($motor)){
								$t = null;
								if( isset($this->data['chiptuning']) && !empty($this->data['chiptuning'])){ $t.=$this->data['chiptuning']; }
								if( (isset($this->data['chiptuning']) && !empty($this->data['chiptuning'])) && (isset($this->data['catlesskit']) && !empty($this->data['catlesskit']))){ $t.=" | "; }
								if( isset($this->data['catlesskit']) && !empty($this->data['catlesskit'])){ $t.=$this->data['catlesskit']; }
								$p_power =  $motor['Motor']['power'];
								$p_torque = $motor['Motor']['torque'];
								$p_v_max = $motor['Motor']['v_max'];
								$p_kmph = $motor['Motor']['kmph'];
								if(isset($this->data['chiptuning'])){
									$p_power =  $p_power + 40;
									$p_torque = $p_torque + 70;
									$p_v_max = $p_v_max + 35;
									$p_kmph = $p_kmph - 0.40;
								}
								if(isset($this->data['catlesskit'])){
									$p_power =  $p_power + 20;
									$p_torque = $p_torque + 20;
									$p_v_max = $p_v_max + 3;
									$p_kmph = $p_kmph - 0.10;
								}
								$p = $motor['Motor']['power']/1000*100;
								$pp = $p_power/1000*100;
								if($p_kmph <0){ $p_kmph = 0; }
								$info = '<div class="info_box"><h1 class="center heading_main">'.$motor['Brand']['name'].' '.$motor['Model']['name'].' '.$motor['Motor']['name'].'</h1><table id="details_tab" class="center"><tbody><tr><th class="">Characteristics</th><th class="center">Factory output </th><th class="center">ARMYTRIX Tuned</th></tr><tr><th>Parts</th><th></th><th class="center">'.$t.'</th></tr><tr><th>Capacity <small>(cc)</small> </th><td>'.$motor['Motor']['capacity'].' cc</td><td class="">'.$motor['Motor']['capacity'].' cc</td></tr><tr><th>Power <small>(hp)</small> </th><td><div class="progress"><div id="pro_fac" class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="'.$p.'" aria-valuemin="0" aria-valuemax="100" style="width:'.$p.'%">'.$motor['Motor']['power'].' hp </div></div></td><td class=""><div class="progress"><div id="pro_pp" class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="'.$pp.'" aria-valuemin="0" aria-valuemax="100" style="width:'.$pp.'%">'.$p_power.' hp </div></div></td></tr><tr><th>Torque <small>(Nm)</small></th><td>'.$motor['Motor']['torque'].' Nm</td><td class="">'.$p_torque.' Nm</td></tr><tr><th>V Max <small>(Km/h)</small></th><td>'.$motor['Motor']['v_max'].' km/h</td><td class="">'.$p_v_max.' km/h</td></tr><tr><th>0-100km/h <small>(s)</small></th><td>'.$motor['Motor']['kmph'].' s</td><td class="">'.$p_kmph.' s</td></tr></tbody></table></div>';
							}
							echo "<script>$('#show_info').html('".$info."'); $('#pro_fac').animate({ width: '$p%' }, 2000); $('#pro_pp').animate({ width: '$pp%' }, 3000); </script>";
						}else{ echo '<div class="alert alert-danger">It must be selected at least one tuning option!</div>';}
					}else{ echo '<div class="alert alert-danger">Please select Engine.</div>';}
				}
			}
		}
	}

	public function become_dealer() {
		$this->set('title_for_layout', 'Become Dealer Of Armytrix ECU - Armytrix Automotive Weaponized');
		$page_meta = array('des'=>@$this->meta['des'],'key'=>$this->meta['keys']);
		$this->set(compact('page_meta'));
		if ($this->RequestHandler->isAjax()) {
			if( !empty($this->data)){
				$error = '';
				$list =array_map('trim',$this->data);
				if(empty($list['company_name'])){  $error .= 'Please enter company name.<br />'; }
				if(empty($list['full_name'])){  $error .= 'Please enter your name.<br />'; }
				if(empty($list['address'])){  $error .= 'Please enter your address.<br />'; }
				if(empty($list['city'])){  $error .= 'Please enter city.<br />'; }
				if(empty($list['state'])){  $error .= 'Please enter state.<br />'; }
				if(empty($list['zip'])){  $error .= 'Please enter zip code.<br />'; }
				if(empty($list['phone'])){  $error .= 'Please enter phone number.<br />'; }
				if(empty($list['email'])){  $error .= 'Please enter email.<br />'; }
				elseif(!filter_var($list['email'], FILTER_VALIDATE_EMAIL)) { $error .= 'Please enter valid email.<br />'; }
				if(!$error) {
					$msg = null;
					foreach ($list as $k=>$v){
						$key = ucwords(strtolower(str_replace('_',' ',$k)));
						$msg.= "<p><b>$key :: </b> $v </p>";
					}
					$parameters = array('MSG'=>$msg);
					$this->DATA->AppMail('inquiry@armytrix.com', 'BecomeDealer', $parameters,$dateTime = DATE);
					echo "<div class='alert alert-success'>Message sent.</div>";
					echo "<script>$('#ajax-contact-form_1')[0].reset();</script>";
				}
				else { echo '<div class="notification_error">'.$error.'</div>'; }
			}
			exit;
		}
	}

	public function contact() {
		$this->set('title_for_layout', 'Contact - Armytrix Performance Upgrades');
		$page_meta = array('des'=>@$this->meta['des'],'key'=>$this->meta['keys']);
		$this->set(compact('page_meta'));
		if ($this->RequestHandler->isAjax()) {
			if( !empty($this->data)){
				if(isset($this->data['g-recaptcha-response']) && !empty($this->data['g-recaptcha-response'])){
					$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".DataSecret."&response=".$this->data['g-recaptcha-response']."&remoteip=".$_SERVER['REMOTE_ADDR']);
					$arr = json_decode($response,true);
					if(isset($arr['success'])){
						$parameters = array( 'FNAME'=>$this->data['fname'],'LNAME'=>$this->data['lname'],
								'EMAIL'=>$this->data['email'], 'PHONE'=>$this->data['phone'], 'CITY'=>$this->data['city'],
								'STATE'=>$this->data['state'], 'COUNTRY'=>$this->data['country'], 'ZIP'=>$this->data['zip'],
								'SUBJECT'=>$this->data['subject'], 'ABOUT'=>$this->data['hear'], 'FOR'=>$this->data['for'],'MSG'=>$this->data['message'] );
						$this->DATA->AppMail('inquiry@armytrix.com', 'Contact', $parameters,$dateTime = DATE);
						echo "<div class='alert alert-success'>Message sent.</div>";
						echo "<script>$('#fformID')[0].reset();</script>";
					}else{ echo "<div class='alert alert-danger'>Please verify that you are not a robot.</div>"; }
				}else{ echo "<div class='alert alert-danger'>Please verify that you are not a robot.</div>"; }
			}
			echo '<script>grecaptcha.reset();</script>';
			exit;
		}
	}

	public function tuning_box_product($id=null){
		$this->autoRender = false;
		$this->redirect('/');
		if(!empty($id)){
			$data = $this->Product->find('first',array('conditions'=>array('Product.slug'=>$id,'Product.type'=>1,'Product.status'=>1)));
			if(!empty($data)){
				$this->set('title_for_layout', $data['Product']['title']);
				$page_meta = array('des'=>@$this->meta['des'],'key'=>$this->meta['keys']);
				$this->set(compact('page_meta','data'));
			}else{ $this->layout = '404';}
		}else{ $this->layout = '404';}
	}

	public function faqs() {
	    $this->set('title_for_layout', 'TUNING WIKIPEDIA');
	    $page_meta = [
	        'des'=>'Tuning a Car Usually Means to Increase Power Output, Handling and Speed. Tuning is Calibrating and Adjusting the Car for the Desired Purpose.',
	        'key'=>'armytrix, exhaust, akrapovic, magnaflow, borla, supersprint,  remus, fiexhaust, ipe, milltek, цена, السعر, precio, preis, prix, обзор, مراجعة, Überprüfung, revisión, глушитель'
	    ];

		$this->loadModel('Category');
		$this->Category->bindModel(array('hasMany'=>array('Faq'=>array('order'=>array('Faq.id'=>'DESC')))));
		$data = $this->Category->find('all',array('order'=>array('Category.name'=>'ASC')));
		$this->set(compact('page_meta','data'));
	}

	public function my_mail($id=null) {
		$this->autoRender = false;
		$this->loadModel('EmailServer');
		$this->paginate = array('limit' => 500, 'order' => array('EmailServer.id' => 'desc'));
		$data = $this->paginate("EmailServer");
		if (!empty($data)) {
				foreach ($data as $m) {
					ec($m['EmailServer']['email_to']." : ".$m['EmailServer']['subject']);
					ec($m['EmailServer']['message']);
				}
			}
	}

	public function product_exhaust_1() {
		$this->set('title_for_layout', 'Product Catalog - Armytrix Automotive Weaponized');
		$page_meta = array('des'=>@$this->meta['des'],'key'=>$this->meta['keys']);
		$p = $this->Product->find('list',array('conditions'=>array('Product.type'=>array(2,3,5)),'group'=>array('Product.brand_id'),'fields'=>array('Product.id','Product.brand_id')));
		$b = $this->Brand->find('list',array('order'=>array('Brand.name'=>'ASC'),'conditions'=>array('Brand.id'=>$p)));
		$this->set(compact('page_meta','b','product','paging'));
	}

	public function product_exhaust() {
	    $this->set('title_for_layout', 'ARMYTRIX VALVETRONIC EXHAUST SYSTEM');
	    $page_meta = [
	        'des'=>'ARMYTRIX Best Aftermarket Upgrades Titanium & Stainless Steel Turbo-back Cat-Back Valvetronic Exhaust Downpipes Tips Headers Decat Test Straight Exhaust Sound',
	        'key'=>'armytrix, exhaust, akrapovic, magnaflow, borla, supersprint,  remus, fiexhaust, ipe, milltek, цена, السعر, precio, preis, prix, обзор, مراجعة, Überprüfung, revisión, глушитель'
	    ];
		$bid = array();
		$b_list = $this->ItemDetail->find('list',array('conditions'=>array('ItemDetail.status'=>1),'group'=>array('ItemDetail.brand_id'),'fields'=>array('ItemDetail.id','ItemDetail.brand_id')));
		if(!empty($b_list)){ foreach ($b_list as $k=>$l){ $bid[]=$l; } }
		$b = $this->Brand->find('list',array('order'=>array('Brand.name'=>'ASC'),'conditions'=>array('Brand.id'=>$bid)));
		$this->set(compact('page_meta','b'));
	}


	public function product_exhaust_result() {
		$this->set('title_for_layout', 'Armytrix Exhaust Best Performance And Sound');
		$page_meta = array('des'=>@$this->meta['des'],'key'=>$this->meta['keys']);
		$p = $this->Product->find('list',array('conditions'=>array('Product.type'=>array(2,3,5)),'group'=>array('Product.brand_id'),'fields'=>array('Product.id','Product.brand_id')));
		$b = $this->Brand->find('list',array('order'=>array('Brand.name'=>'ASC'),'conditions'=>array('Brand.id'=>$p)));
		$this->set(compact('page_meta','b'));
		$aList = [];
		if( isset($this->request->query['brand']) && !empty($this->request->query['brand']) && isset($this->request->query['model']) && !empty($this->request->query['model'])
				&& isset($this->request->query['motor']) && !empty($this->request->query['motor'])){
				    $mID = array();
				    $mList = $this->ItemDetail->find('list',array('conditions'=>array('ItemDetail.status'=>1,'OR'=>array('ItemDetail.cat_back_ids IS NOT NULL','ItemDetail.catalytic_ids IS NOT NULL')),'group'=>array('ItemDetail.model_id'), 'fields'=>array('ItemDetail.id','ItemDetail.model_id') ));
				    if(!empty($mList)){ foreach ($mList as $k=>$l){ $mID[]=$l; } }
				    $q1 = array();
				    $mList = $this->ItemDetail->find('list',array('conditions'=>array('ItemDetail.status'=>1,'ItemDetail.model_id'=>$this->request->query['model'],'OR'=>array('ItemDetail.cat_back_ids IS NOT NULL','ItemDetail.catalytic_ids IS NOT NULL')),'group'=>array('ItemDetail.motor_id'),'fields'=>array('ItemDetail.id','ItemDetail.motor_id')));
				    if(!empty($mList)){ foreach ($mList as $k=>$l){ $q1[]=$l; } }
				    $model_list = $this->Model->find('list',array('order'=>array('Model.name'=>'ASC'),'conditions'=>array('Model.id'=>$mID,'Model.brand_id'=>$this->request->query['brand'],'Model.status'=>1)));
				    $motor_list = $this->Motor->find('list',array('order'=>array('Motor.name'=>'ASC'),'conditions'=>array('Motor.id'=>$q1,'Motor.model_id'=>$this->request->query['model'],'Motor.status'=>1)));
				    $query = $this->request->query;
				    $this->set(compact('query','b','motor_list','model_list'));
			$r_co = $this->Session->read('arm_co');
			
			$this->ItemDetail->bindModel(array('belongsTo'=>array('Motor')));
			$this->Product->bindModel(array('belongsTo'=>array('Brand','Model','Motor')));
			$getPro = $this->ItemDetail->find('first',array('recursive'=>2, 'conditions'=>array('ItemDetail.language'=>'eng', 'ItemDetail.motor_id'=>$this->request->query['motor'],
					'ItemDetail.brand_id'=>$this->request->query['brand'],'ItemDetail.model_id'=>$this->request->query['model'])));
			if(!empty($getPro)){
				$cat_id = explode(',', $getPro['ItemDetail']['cat_back_ids']);
				$cata_id = explode(',', $getPro['ItemDetail']['catalytic_ids']);
				$accessories = explode(',', $getPro['ItemDetail']['accessory_ids']);
				
				$all_cat = $this->Product->find('all',array('conditions'=>array('Product.id'=>$cat_id,'Product.status'=>1)));
				$all_pro = $this->Product->find('all',array('conditions'=>array('Product.id'=>$cata_id,'Product.status'=>1)));
				$acc_data = $this->Product->find('all',array('conditions'=>array('Product.id'=>$accessories,'Product.status'=>1)));
				
				$tag = null;
				if(isset($getPro['Motor']['Library']['full_path']) && !empty($getPro['Motor']['Library']['full_path'])){
					$img = new_show_image('cdn/'.@$getPro['Motor']['Library']['full_path'],360,240,100,'ff',null);
					$tag = '<img src="'.$img.'" alt="'.@$getPro['Motor']['Library']['alt'].'" title="'.@$getPro['Motor']['Library']['title'].'" >';
				}
				//echo "<script> $('#car_pic').html('".$tag."');$('#title_d').html('".$getPro['ItemDetail']['name']."');</script>";
				$aList['title']= $getPro['ItemDetail']['name'];
				$aList['image']= $tag;
				$this->set(compact('aList'));

				$t = $s = 0;
				if(!empty($all_cat)){ foreach ($all_cat as $cList){ if($cList['Product']['material'] == 'titanium'){ $t++; } elseif($cList['Product']['material'] == 'stainless steel'){ $s++; } } }
				if(!empty($all_pro)){ foreach ($all_pro as $c1List){ if($c1List['Product']['material'] == 'titanium'){ $t++; } elseif($c1List['Product']['material'] == 'stainless steel'){ $s++; } } }
				$list = null;
				if(!empty($all_cat)){
				    $d_n = 1;
				    foreach ($all_cat as $aList){
				        $type = $mat_type = null;
				        $p_price = null;
				        $href = 'javascript:void(0);';
				        $pImg = new_show_image('cdn/no_image_available.jpg',270,180,100,'ff',null);
				        $realImg = SITEURL.'cdn/no_image_available.jpg';
				        if(in_array($aList['Product']['type'],array(2,3,5)) && isset($getPro['ItemDetail']['url']) && !empty($getPro['ItemDetail']['url'])){
				            $href = SITEURL."product/".$getPro['ItemDetail']['url'];
				        }else{ $href = 'javascript:void(0);'; }

				        if(isset($aList['Product']['material'])){
				            if( $aList['Product']['material'] == 'stainless steel'){ $mat_type = '<li class="stainless_steel"><a>Stainless steel</a></li>'; }
				            elseif( $aList['Product']['material'] == 'titanium'){ $mat_type = '<li class="titanium"><a>Titanium</a></li>'; if($t > 0 && $s > 0){ $type = '/ti'; } }
				        }

				        if($aList['Product']['type'] == 1){
				            $href = SITEURL."collections/products/".$aList['Product']['slug'];
				            $ima = json_decode($aList['Product']['images'],true);
				            $pImg = new_show_image('cdn/cdnimg/'.$ima[0],270,180,100,'ff',null);
				            $realImg = SITEURL.'cdn/cdnimg/'.$ima[0];
				        }
				        else{
				            if(isset($aList['Library']['full_path']) && !empty($aList['Library']['full_path'])){
				                $pImg = new_show_image('cdn/'.$aList['Library']['full_path'],270,180,100,'ff',null);
				                $realImg = SITEURL.'cdn/'.$aList['Library']['full_path'];
				        } }
		            $href = $href.$type;
		                if($aList['Product']['quantity'] > 0){
		                    if( isset($r_co['RstrictedCountry']) && $r_co['RstrictedCountry'] == 1 ){
		                        $btn = '<a href="'.$href.'" target="_blank" title="inquiry" class="btn btn-success ful-wd-btn">Inquiry</a>';
		                        $p_price = null;
		                    }
		                    else{ $btn = '<input value="add to cart" class="btn btn-success ful-wd-btn" onclick="add_pro('.$aList['Product']['id'].')" type="button">';
    		                    if ( $aList['Product']['discount'] > 0 ){
    		                        $p1 = $aList['Product']['price'] -  ( $aList['Product']['price'] * $aList['Product']['discount'] / 100) ;
    		                        $p_price = "Price: USD <strike>$".num_2($aList['Product']['price'])."</strike> <spam class=\"text-danger\">$".num_2($p1)."</spam>";
    		                    }else{ $p_price = "Price: USD $".num_2($aList['Product']['price']); }
    		                    if ( $aList['Product']['preorder'] > 0 ){ $p_price.=" <span class=\"text-danger\"> Pre-order available </span>"; }
		                    }
		                }
		                else{
		                    if( isset($r_co['RstrictedCountry']) && $r_co['RstrictedCountry'] == 1 ){ $p_price = null; }
		                    else{
		                        if ( $aList['Product']['discount'] > 0 ){
		                            $p1 = $aList['Product']['price'] -  ( $aList['Product']['price'] * $aList['Product']['discount'] / 100) ;
		                            $p_price = "Price: USD <strike>$".num_2($aList['Product']['price'])."</strike> <spam class=\"text-danger\">$".num_2($p1)."</spam>";
		                        }else{ $p_price = "Price: USD $".num_2($aList['Product']['price']); }
		                        if ( $aList['Product']['preorder'] > 0 ){ $p_price.=" <span class=\"text-danger\"> Pre-order available </span>"; }

		                    }
		                    $btn = '<input value="Out of Stock" class="hasIcon shortcode_button btn btn_type4 w100" type="button">';
		                    //$p_price = null;
		                }
		                $abc_name = $aList['Model']['name']."/".$aList['Motor']['name'];
		                $ttt1 = str_replace("'","\'",$abc_name);
		                $list.= '<div class=" item-bx-arm"><div class="mx-wd"><div class="col-sm-4"><div class="img-pro"> <a href="'.$href.'" target="_blank" class="thumbnail"><img src="'.$pImg.'" title="'.$aList['Library']['title'].'" alt="'.$aList['Library']['alt'].'"/><span><img src="'.$realImg.'" ></span></a> </div></div><div class="col-sm-8"><div class="exaust-cntnt"><div class="featrs-txt"> <a href="'.$href.'" target="_blank"><h3>'.$ttt1.'</h3><p>'.substr($aList['Product']['title'],0,145).'</p></a> </div><div class="ptxt">'.$p_price.'</div><div class="buton-bottm"><ul class="metal-type"><li><a>'.substr($aList['Product']['part'],0,15).'</a></li>'.$mat_type.'</ul><div class="add-cart-btn">'.$btn.'</div></div></div><div class="clearfix"></div></div></div></div>';
		                $d_n++; }
		                $cList['data1']=$list;
				}

				$list = null;
				if(!empty($all_pro)){
					$d_n = 1;
					foreach ($all_pro as $aList){
					    $mat_type = $type = null;
						$p_price = null;
						$href = 'javascript:void(0);';
						$pImg = new_show_image('cdn/no_image_available.jpg',270,180,100,'ff',null);
						$realImg = SITEURL.'cdn/no_image_available.jpg';
						if(in_array($aList['Product']['type'],array(2,3,5)) && isset($getPro['ItemDetail']['url']) && !empty($getPro['ItemDetail']['url'])){
							$href = SITEURL."product/".$getPro['ItemDetail']['url'];
						}else{ $href = 'javascript:void(0);'; }

						if(isset($aList['Product']['material'])){
							if( $aList['Product']['material'] == 'stainless steel'){ $mat_type = '<li class="stainless_steel"><a>Stainless steel</a></li>'; }
							elseif( $aList['Product']['material'] == 'titanium'){ $mat_type = '<li class="titanium"><a>Titanium</a></li>'; if($t > 0 && $s > 0){ $type = '/ti'; } }
						}

						if($aList['Product']['type'] == 1){
							$href = SITEURL."collections/products/".$aList['Product']['slug'];
							$ima = json_decode($aList['Product']['images'],true);
							$pImg = new_show_image('cdn/cdnimg/'.$ima[0],270,180,100,'ff',null);
							$realImg = SITEURL.'cdn/cdnimg/'.$ima[0];
						}
						else{
							if(isset($aList['Library']['full_path']) && !empty($aList['Library']['full_path'])){
								$pImg = new_show_image('cdn/'.$aList['Library']['full_path'],270,180,100,'ff',null);
								$realImg = SITEURL.'cdn/'.$aList['Library']['full_path'];
							} }
					$href = $href.$type;
						if($aList['Product']['quantity'] > 0){

							if( isset($r_co['RstrictedCountry']) && $r_co['RstrictedCountry'] == 1 ){
								$btn = '<a href="'.$href.'" target="_blank" title="inquiry" class="btn btn-success ful-wd-btn">Inquiry</a>';
								$p_price = null;

							}
							else{ $btn = '<input value="add to cart" class="btn btn-success ful-wd-btn" onclick="add_pro('.$aList['Product']['id'].')" type="button">';

    							if ( $aList['Product']['discount'] > 0 ){
    							    $p1 = $aList['Product']['price'] -  ( $aList['Product']['price'] * $aList['Product']['discount'] / 100) ;
    							    $p_price = "Price: USD <strike>$".num_2($aList['Product']['price'])."</strike> <spam class=\"text-danger\">$".num_2($p1)."</spam>";
    							}else{ $p_price = "Price: USD $".num_2($aList['Product']['price']); }
    							if ( $aList['Product']['preorder'] > 0 ){ $p_price.=" <span class=\"text-danger\"> Pre-order available </span>"; }

							}
						}
						else{

							if( isset($r_co['RstrictedCountry']) && $r_co['RstrictedCountry'] == 1 ){ $p_price = null; }
							else{

							    if ( $aList['Product']['discount'] > 0 ){
							        $p1 = $aList['Product']['price'] -  ( $aList['Product']['price'] * $aList['Product']['discount'] / 100) ;
							        $p_price = "Price: USD <strike>$".num_2($aList['Product']['price'])."</strike> <spam class=\"text-danger\">$".num_2($p1)."</spam>";
							    }else{ $p_price = "Price: USD $".num_2($aList['Product']['price']); }
							    if ( $aList['Product']['preorder'] > 0 ){ $p_price.=" <span class=\"text-danger\"> Pre-order available </span>"; }

							}
							$btn = '<input value="Out of Stock" class="hasIcon shortcode_button btn btn_type4 w100" type="button">';
							//$p_price = null;
						}
						$abc_name = $aList['Model']['name']."/".$aList['Motor']['name'];
						$ttt1 = str_replace("'","\'",$abc_name);
						$list.= '<div class=" item-bx-arm"><div class="mx-wd"><div class="col-sm-4"><div class="img-pro"> <a href="'.$href.'" target="_blank" class="thumbnail"><img src="'.$pImg.'" title="'.$aList['Library']['title'].'" alt="'.$aList['Library']['alt'].'"/><span><img src="'.$realImg.'" ></span></a> </div></div><div class="col-sm-8"><div class="exaust-cntnt"><div class="featrs-txt"> <a href="'.$href.'" target="_blank" ><h3>'.$ttt1.'</h3><p>'.substr($aList['Product']['title'],0,145).'</p></a> </div> <div class="ptxt">'.$p_price.'</div> <div class="buton-bottm"><ul class="metal-type"><li><a>'.substr($aList['Product']['part'],0,15).'</a></li>'.$mat_type.'</ul><div class="add-cart-btn">'.$btn.'</div></div></div><div class="clearfix"></div></div></div></div>';
						$d_n++; }
						$cList['data']=$list;
				}
				$list = null;
				/* for accessory */
				if(!empty($acc_data)){
				    $d_n = 1;
				    $href = SITEURL."product/".$getPro['ItemDetail']['url'];
				    foreach ($acc_data as $aList){
				        $mat_type = $type = null;
				        $p_price = null;
				        $pImg = new_show_image('cdn/no_image_available.jpg',270,180,100,'ff',null);
				        $realImg = SITEURL.'cdn/no_image_available.jpg';
				        if(isset($aList['Library']['full_path']) && !empty($aList['Library']['full_path'])){
				            $pImg = new_show_image('cdn/'.$aList['Library']['full_path'],270,180,100,'ff',null);
				            $realImg = SITEURL.'cdn/'.$aList['Library']['full_path'];
				        } 
			            if($aList['Product']['quantity'] > 0){
			                if( isset($r_co['RstrictedCountry']) && $r_co['RstrictedCountry'] == 1 ){
			                    $btn = '<a href="'.$href.'" target="_blank" title="inquiry" class="btn btn-success ful-wd-btn">Inquiry</a>';
			                    $p_price = null;
			                }
			                else{ $btn = '<input value="add to cart" class="btn btn-success ful-wd-btn" onclick="add_pro('.$aList['Product']['id'].')" type="button">';
			                if ( $aList['Product']['discount'] > 0 ){
			                    $p1 = $aList['Product']['price'] -  ( $aList['Product']['price'] * $aList['Product']['discount'] / 100) ;
			                    $p_price = "Price: USD <strike>$".num_2($aList['Product']['price'])."</strike> <spam class=\"text-danger\">$".num_2($p1)."</spam>";
			                }else{ $p_price = "Price: USD $".num_2($aList['Product']['price']); }
			                if ( $aList['Product']['preorder'] > 0 ){ $p_price.=" <span class=\"text-danger\"> Pre-order available </span>"; }
			                }
			            }
			            else{
			                if( isset($r_co['RstrictedCountry']) && $r_co['RstrictedCountry'] == 1 ){ $p_price = null; }
			                else{
			                    if ( $aList['Product']['discount'] > 0 ){
			                        $p1 = $aList['Product']['price'] -  ( $aList['Product']['price'] * $aList['Product']['discount'] / 100) ;
			                        $p_price = "Price: USD <strike>$".num_2($aList['Product']['price'])."</strike> <spam class=\"text-danger\">$".num_2($p1)."</spam>";
			                    }else{ $p_price = "Price: USD $".num_2($aList['Product']['price']); }
			                    if ( $aList['Product']['preorder'] > 0 ){ $p_price.=" <span class=\"text-danger\"> Pre-order available </span>"; }
			                }
			                $btn = '<input value="Out of Stock" class="hasIcon shortcode_button btn btn_type4 w100" type="button">';
			            }
			            $abc_name = $aList['Model']['name']."/".$aList['Motor']['name'];
			            $ttt1 = str_replace("'","\'",$abc_name);
			            $list.= '<div class=" item-bx-arm"><div class="mx-wd"><div class="col-sm-4"><div class="img-pro"> <a href="'.$href.'" target="_blank" class="thumbnail"><img src="'.$pImg.'" title="'.$aList['Library']['title'].'" alt="'.$aList['Library']['alt'].'"/><span><img src="'.$realImg.'" ></span></a> </div></div><div class="col-sm-8"><div class="exaust-cntnt"><div class="featrs-txt"> <a href="'.$href.'" target="_blank" ><h3>'.$ttt1.'</h3><p>'.substr($aList['Product']['title'],0,145).'</p></a> </div> <div class="ptxt">'.$p_price.'</div> <div class="buton-bottm"><ul class="metal-type"><li><a>'.substr($aList['Product']['part'],0,15).'</a></li>'.$mat_type.'</ul><div class="add-cart-btn">'.$btn.'</div></div></div><div class="clearfix"></div></div></div></div>';
			            $d_n++; }
			            $cList['accessory']=$list;
				}
				$this->set('cList',$cList);
			}
		}
	}

	public function customer_support() {
		$this->set('title_for_layout', 'ARMYTRIX - Customer Support');
		$page_meta = array('des'=>@$this->meta['des'], 'key'=>$this->meta['keys']);
		$this->set('page_meta',$page_meta);
	}

	public function customer_support_thanks() {
		$this->set('title_for_layout', 'ARMYTRIX - Customer Support');
		$page_meta = array('des'=>@$this->meta['des'], 'key'=>$this->meta['keys']);
		$this->set('page_meta',$page_meta);
	}

	public function customer_support_damage_1() {
		$this->set('title_for_layout', 'ARMYTRIX - Customer Support Damage when received');
		$page_meta = array('des'=>@$this->meta['des'], 'key'=>$this->meta['keys']);
		$this->set('page_meta',$page_meta);
	}

	public function customer_support_damage_2() {
		$this->set('title_for_layout', 'ARMYTRIX - Customer Support Damage when received');
		$page_meta = array('des'=>@$this->meta['des'], 'key'=>$this->meta['keys']);
		$this->set('page_meta',$page_meta);
	}

	public function customer_support_damage_3() {
		$this->set('title_for_layout', 'ARMYTRIX - Customer Support Damage when received');
		$page_meta = array('des'=>@$this->meta['des'], 'key'=>$this->meta['keys']);
		$this->set('page_meta',$page_meta);
	}

	public function customer_support_damage_2_2() {
		$this->set('title_for_layout', 'ARMYTRIX - Customer Support Damage when received');
		$page_meta = array('des'=>@$this->meta['des'], 'key'=>$this->meta['keys']);
		$this->set('page_meta',$page_meta);
	}

	public function customer_support_damage_3_2() {
		$this->set('title_for_layout', 'ARMYTRIX - Customer Support Damage when received');
		$page_meta = array('des'=>@$this->meta['des'], 'key'=>$this->meta['keys']);
		$this->set('page_meta',$page_meta);
	}

	public function customer_support_lost_1() {
		$this->set('title_for_layout', 'ARMYTRIX - Customer Support Lost parts');
		$page_meta = array('des'=>@$this->meta['des'], 'key'=>$this->meta['keys']);
		$this->set('page_meta',$page_meta);
	}

	public function customer_support_lost_2() {
		$this->set('title_for_layout', 'ARMYTRIX - Customer Support Lost parts');
		$page_meta = array('des'=>@$this->meta['des'], 'key'=>$this->meta['keys']);
		$this->set('page_meta',$page_meta);
	}

	public function customer_support_lost_2_2() {
		$this->set('title_for_layout', 'ARMYTRIX - Customer Support Lost parts');
		$page_meta = array('des'=>@$this->meta['des'], 'key'=>$this->meta['keys']);
		$this->set('page_meta',$page_meta);
	}

	public function customer_support_fitment_1() {
		$this->set('title_for_layout', 'ARMYTRIX - Customer Support Fitment issue');
		$page_meta = array('des'=>@$this->meta['des'], 'key'=>$this->meta['keys']);
		$this->set('page_meta',$page_meta);
	}

	public function customer_support_fitment_2() {
		$this->set('title_for_layout', 'ARMYTRIX - Customer Support Fitment issue');
		$page_meta = array('des'=>@$this->meta['des'], 'key'=>$this->meta['keys']);
		$this->set('page_meta',$page_meta);
	}

	public function customer_support_fitment_2_2() {
		$this->set('title_for_layout', 'ARMYTRIX - Customer Support Fitment issue');
		$page_meta = array('des'=>@$this->meta['des'], 'key'=>$this->meta['keys']);
		$this->set('page_meta',$page_meta);
	}

	public function customer_support_fitment_3() {
		$this->set('title_for_layout', 'ARMYTRIX - Customer Support Fitment issue');
		$page_meta = array('des'=>@$this->meta['des'], 'key'=>$this->meta['keys']);
		$this->set('page_meta',$page_meta);
	}

	public function customer_support_fitment_3_2() {
		$this->set('title_for_layout', 'ARMYTRIX - Customer Support Fitment issue');
		$page_meta = array('des'=>@$this->meta['des'], 'key'=>$this->meta['keys']);
		$this->set('page_meta',$page_meta);
	}

	public function customer_support_fitment_3_3() {
		$this->set('title_for_layout', 'ARMYTRIX - Customer Support Fitment issue');
		$page_meta = array('des'=>@$this->meta['des'], 'key'=>$this->meta['keys']);
		$this->set('page_meta',$page_meta);
	}

	public function  customer_support_check_engine($step = null) {
		$this->set('title_for_layout', 'ARMYTRIX - Customer Support Check Engine Light');
		$page_meta = array('des'=>@$this->meta['des'], 'key'=>$this->meta['keys']);
		$this->set('page_meta',$page_meta);
		switch ($step) {
			case 0:
				$text = 'Utilize stock vehicle inspection tools to check for the Error code<br /> and the full description of it. Are they related to catalytic<br /> <span class="red">converters,O2 sensors</span>,and/or any part of the exhaust system?';
				$image = 'ce_main_img.png';
				$url = '/check-engine/2-2';
				$url2 = '/check-engine/2';
				$nextstepimage1 = 'ce_nextstepimage1.png';
				$nextstepimage2 = 'ce_nextstepimage2.png';
				$style = "<style>";
				$style .= ".cs-damage-step1 .customer-support-page {width:40%} .cs-damage-step1 .customer-support-pages{width:200px;} .cs-damage-step1 .customer-support-page:first-child{margin-right:10px;} span.red{color:red}";
				$style .= "</style>";

				$this->set('title', 'Check engine light');
				$this->set('image', $image);
				$this->set('text', $text);
				$this->set('url', $url);
				$this->set('url2', $url2);
				$this->set('style', $style);
				$this->set('nextstepimage1', $nextstepimage1);
				$this->set('nextstepimage2', $nextstepimage2);
				$this->render('/Pages/customer_support_check_engine');
			break;

			case "2":
				$text = 'Please fill out the form below. We will contact you<br /> as soon as your case is received and determined.';
				$image = 'ce_main_img.png';
				$url = '/check-engine/3-2';
				$url2 = '/check-engine/3-3';
				$nextstepimage1 = 'damage-step2-g5742.png';
				$nextstepimage2 = 'damage-step2-g5743.png';
				$topbg = "background-image: url(../image/customer-support/damage-top-step2.png);";

				$this->set('title', 'Check engine light');
				$this->set('image', $image);
				$this->set('text', $text);
				$this->set('url', $url);
				$this->set('url2', $url2);
				//$this->set('style', $style);
				$this->set('topbg', $topbg);
				$this->set('nextstepimage1', $nextstepimage1);
				$this->set('nextstepimage2', $nextstepimage2);
				$this->render('/Pages/customer_support_check_engine');
			break;

			case '2-2':
				$title2 = '<h2 style="font-size: 26px;font-weight: bold;text-transform: none;color: #4d4d4d;margin-top: 25px;">Self inspection</h2><span style="color:#4d4d4d;">Please follow steps needed from the description of the error code to resolve <br />the problem Verify whether you replugged stock EV motors and all parts back.</span>';
				$image = 'ce_main_img_2_2.png';
				$url = '#';
				$url2 = '#';
				$nextstepimage1 = '2-2left.png';
				$nextstepimage2 = '2-2right.png';
				$topbg = "background-image: url(../image/customer-support/damage-top-step2.png);";

				$style = "<style>";
				$style .= ".cs-damage-step1 .customer-support-pages{width:1180px;} .cs-damage-step1 .customer-support-page:first-child{margin-right:10px;} .cs-damage-step1 .customer-support-page{width:48%}.cs-damage-subimage {width:900px;} .customer-support-page a:hover{cursor:default;}";
				$style .= "</style>";

				$this->set('title', 'Check engine light');
				$this->set('image', $image);
				$this->set('title2', $title2);
				$this->set('url', $url);
				$this->set('url2', $url2);
				$this->set('style', $style);
				$this->set('topbg', $topbg);
				$this->set('nextstepimage1', $nextstepimage1);
				$this->set('nextstepimage2', $nextstepimage2);
				$this->render('/Pages/customer_support_check_engine');
			break;
			case '3-2':
				$this->render('/Pages/customer_support_check_engine_3_2');
			break;
			case '3-3':
				$this->render('/Pages/customer_support_check_engine_3_3');
			break;
		}

	}

	public function  customer_support_valve_control($step = null) {
		$this->set('title_for_layout', 'ARMYTRIX - Customer Support Valve Control Problem');
		$page_meta = array('des'=>@$this->meta['des'], 'key'=>$this->meta['keys']);
		$this->set('page_meta',$page_meta);
		if (!empty($_GET['step'])){ $current_step = $_GET['step']; }
		else { $current_step = 0; }
		switch ($step) {
			case "":
			case "check-the-function-of-your-obd":
				$text = '<span style="font-weight:bold;">OBD Check:</span><br />1. Check whether OBD dongle lights up. <br />2.Turn on car engine and wait for the lighting of the OBD dongle for 15 seconds. If light of the OBD dongle turns off after as seconds, it indicates that OBD dongle goes into sleep mode, and data of your car is not detecte. Please try plugging the OBD dongle directly to the OBD port without splitter cable, or try plugging OBD dongle on to other car to test its functionality.';
				$image = 'vc1.png';
				$url = '/valve-control/hose-and-solenoid-check?step=2';
				$url2 = '/valve-control/ecu-tuned-or-not-supported?step=2';
				$nextstepimage1 = 'vc1-1.png';
				$nextstepimage2 = 'vc1-2.png';
				$style = "<style>";
				$style .= "
					.cs-damage-step1 .customer-support-subtitle
					{text-align: left;width: 700px;margin: 0 auto;line-height: 25px;}
					.cs-damage-step1 .customer-support-page:first-child {    margin-right: 20px;	width:245px;}
					.cs-damage-step1 .customer-support-pages {width:550px;}
					.cs-damage-step1 .customer-support-title2 { color: #4d4d4d;font-size: 26px;font-weight: bold; margin-top: 20px;}
					";
				$style .= "</style>";

				$this->set('title', 'Valve control problem');
				$this->set('title2', 'Check the function of your OBD');
				$this->set('image', $image);
				$this->set('text', $text);
				$this->set('url', $url);
				$this->set('url2', $url2);
				$this->set('style', $style);
				$this->set('nextstepimage1', $nextstepimage1);
				$this->set('nextstepimage2', $nextstepimage2);
				$this->render('/Pages/customer_support_valve_control');
			break;
			case "function-and-version":

				$topbg = "background-image: url(../image/customer-support/damage-top-step".$current_step.".png);";

				$current_step++;
				$text = '1. Open the APP and select "settings" to check whether the software version of the OBD dongle is compatible with your car (Software number for BMW & Mercedes starts from 4, the others starts from 3)<br />2. Use APP and remote to switch on/off, and verify whether the OBD light and valves are working properly <br /> ';
				$image = 'vc3.png';
				$url = '/valve-control/hose-and-solenoid-check?step='.$current_step;
				$url2 = '/valve-control/fill-form?step='.$current_step;
				$nextstepimage1 = 'vc1-1.png';
				$nextstepimage2 = 'vc1-2.png';
				$style = "<style>";
				$style .= "
					.cs-damage-step1 .customer-support-subtitle
					{text-align: left;width: 700px;margin: 0 auto;line-height: 25px;}
					.cs-damage-step1 .customer-support-page:first-child {    margin-right: 20px;	width:245px;}
					.cs-damage-step1 .customer-support-pages {width:550px;}
					.cs-damage-step1 .customer-support-title2 { color: #4d4d4d;font-size: 26px;font-weight: bold; margin-top: 20px;}
					";
				$style .= "</style>";

				$this->set('title', 'Valve control problem');
				$this->set('title2', 'Check the function of your OBD');
				$this->set('image', $image);
				$this->set('text', $text);
				$this->set('url', $url);
				$this->set('url2', $url2);
				$this->set('style', $style);
				$this->set('topbg', $topbg);
				$this->set('nextstepimage1', $nextstepimage1);
				$this->set('nextstepimage2', $nextstepimage2);
				$this->render('/Pages/customer_support_valve_control');
			break;
			case "hose-and-solenoid-check":

				$topbg = "background-image: url(../image/customer-support/damage-top-step".$current_step.".png);";

				$current_step++;
				$text = '';//'<h2 style="font-size: 26px;font-weight: bold;text-transform: none;color: #4d4d4d;margin-top: 25px;">Vacuum Line Check</h2> Verify whether your vacuum line is connected correctly, shown in your installation manual';
				$image = 'vc5.png';
				$url = '/valve-control/valve-and-exhaust-check?step='.$current_step;
				$url2 = '/valve-control/hose-and-solenoid-check2?step='.$current_step;
				$nextstepimage1 = 'vc1-1.png';
				$nextstepimage2 = 'vc1-2.png';
				$style = "<style>";
				$style .= "
					.cs-damage-step1 .customer-support-subtitle
					{text-align: center;width: 700px;margin: 0 auto;line-height: 25px;}
					.cs-damage-step1 .customer-support-page:first-child {    margin-right: 20px;	width:245px;}
					.cs-damage-step1 .customer-support-pages {width:550px;}
					.cs-damage-step1 .customer-support-title2 { color: #4d4d4d;font-size: 26px;font-weight: bold; margin-top: 20px;}
					.cs-damage-subimage {margin-top:25px;width:950px;}
					";
				$style .= "</style>";

				$this->set('title', 'Valve control problem');
				$this->set('title2', 'Hose and solenoid check');
				$this->set('image', $image);
				$this->set('text', $text);
				$this->set('url', $url);
				$this->set('url2', $url2);
				$this->set('style', $style);
				$this->set('topbg', $topbg);
				$this->set('nextstepimage1', $nextstepimage1);
				$this->set('nextstepimage2', $nextstepimage2);
				$this->render('/Pages/customer_support_valve_control');
			break;

			case "valve-and-exhaust-check":

				$topbg = "background-image: url(../image/customer-support/damage-top-step".$current_step.".png);";

				$current_step++;
				$text = '<span style="font-weight:bold;">Are valves functioning properly?</span> <br />1. Utilize vacuum tool to test whether the valves (circled in red) can be sealed and maintained in sealed mode. <br />2. Verify all parts specified below are installed correctly and functioning properly: C-Clamp / Spring /Axle Bolt';
				$image = 'vc6.png';
				$url = '/valve-control/fill-form?step='.$current_step;
				$url2 = '/valve-control/valve-and-exhaust-check2?step='.$current_step;
				$nextstepimage1 = 'vc1-1.png';
				$nextstepimage2 = 'vc1-2.png';
				$style = "<style>";
				$style .= "
					.cs-damage-step1 .customer-support-subtitle
					{text-align: left;width: 900px;margin: 0 auto;line-height: 25px;}
					.cs-damage-step1 .customer-support-page:first-child {    margin-right: 20px;	width:245px;}
					.cs-damage-step1 .customer-support-pages {width:550px;}
					.cs-damage-step1 .customer-support-title2 { color: #4d4d4d;font-size: 26px;font-weight: bold; margin-top: 20px;margin-bottom:20px;}
					.cs-damage-subimage {margin-top:25px;width:950px;}
					";
				$style .= "</style>";

				$this->set('title', 'Valve control problem');
				$this->set('title2', 'Valve and exhaust check');
				$this->set('image', $image);
				$this->set('text', $text);
				$this->set('url', $url);
				$this->set('url2', $url2);
				$this->set('style', $style);
				$this->set('topbg', $topbg);
				$this->set('nextstepimage1', $nextstepimage1);
				$this->set('nextstepimage2', $nextstepimage2);
				$this->render('/Pages/customer_support_valve_control_2');
			break;
			case "ecu-tuned-or-not-supported":

				$topbg = "background-image: url(../image/customer-support/damage-top-step".$current_step.".png);";

				$current_step++;
				$text = 'Has the ECU of your car custom tuned before? Or, is the OBD of your car not supported? ';
				$image = 'vc2.png';
				$url = '/valve-control/fill-form?step='.$current_step;
				$url2 = '/valve-control/function-and-version?step='.$current_step;
				$nextstepimage1 = 'ce_nextstepimage1.png';
				$nextstepimage2 = 'ce_nextstepimage2.png';
				$style = "<style>";
				$style .= "
					.cs-damage-subimage {margin: 25px auto;width: 600px;}
					.cs-damage-step1 .customer-support-subtitle {text-align: left;width: 750px;margin: 0 auto;line-height: 25px;}
					.cs-damage-step1 .customer-support-page {width:40%;}
					.cs-damage-step1 .customer-support-page:first-child {margin-right: 10px;}
					.cs-damage-step1 .customer-support-pages {width:200px;}
					.cs-damage-step1 .customer-support-title2 { color: #4d4d4d;font-size: 26px;font-weight: bold; margin-top: 20px;
					";
				$style .= "</style>";

				$this->set('title', 'Valve control problem');
				$this->set('title2', 'ECU tuned or not supported');
				$this->set('image', $image);
				$this->set('text', $text);
				$this->set('url', $url);
				$this->set('url2', $url2);
				$this->set('style', $style);
				$this->set('topbg', $topbg);
				$this->set('nextstepimage1', $nextstepimage1);
				$this->set('nextstepimage2', $nextstepimage2);
				$this->render('/Pages/customer_support_valve_control');
			break;


			case "fill-form":

				$topbg = "background-image: url(../image/customer-support/damage-top-step".$current_step.".png);";

				$current_step++;
				$text = 'Please fill out the form below. We will contact you<br /> as soon as your case is received and determined.';
				$image = 'vc4.png';
				$url = '/valve-control/dealer?step='.$current_step;
				$url2 = '/valve-control/user?step='.$current_step;
				$nextstepimage1 = 'damage-step2-g5742.png';
				$nextstepimage2 = 'damage-step2-g5743.png';
				$style = "<style>";
				$style .= "
					.cs-damage-subimage {margin: 25px auto;width: 500px;}
					.cs-damage-step1 .customer-support-subtitle {text-align: left;width: 420px;margin: 0 auto;line-height: 25px;}
					.cs-damage-step1 .customer-support-page {width:40%;}
					.cs-damage-step1 .customer-support-title2 { color: #4d4d4d;font-size: 26px;font-weight: bold; margin-top: 20px;
					";
				$style .= "</style>";

				$this->set('title', 'Valve control problem');
				$this->set('image', $image);
				$this->set('text', $text);
				$this->set('url', $url);
				$this->set('url2', $url2);
				$this->set('style', $style);
				$this->set('topbg', $topbg);
				$this->set('nextstepimage1', $nextstepimage1);
				$this->set('nextstepimage2', $nextstepimage2);
				$this->render('/Pages/customer_support_valve_control');
			break;

			case "hose-and-solenoid-check2":

				$topbg = "background-image: url(../image/customer-support/damage-top-step".$current_step.".png);";

				$current_step++;
				$text = '<span style="font-weight:bold;">Vacuum source/ One way valve/ solenoid:</span><br /> 1. Verify whether the vacuum source used is located exactly where specified on our installation manual.<span class="numberCircle">8</span> <br />2. Verify the connection and functionality of the one way valve<span class="numberCircle">7</span> <br />3. Touch the solenoid valve and switch on/off to make sure it is functional/actuated.<span class="numberCircle">6</span> <br />4. Verify whether silicon tubes are in functional condition, and no cracks are found. ';

				$text = '<img src="/image/customer-support/vc8.png" />
				<div style="width:580px;margin:0 auto;font-family: corbel;font-weight: normal;font-size: 20px;margin-top:40px;">If the vacuum source is not placed properly, please adjust it. <br />Other than that, please fill out the form below. We will contact you as soon as your case is received and determined.
				</div>
				';

				$url = '/valve-control/dealer?step='.$current_step;
				$url2 = '/valve-control/user?step='.$current_step;
				$nextstepimage1 = 'damage-step2-g5742.png';
				$nextstepimage2 = 'damage-step2-g5743.png';
				$style = "<style>";
				$style .= "
					.cs-damage-subimage {margin: 25px auto;width: 500px;}
					.cs-damage-step1 .customer-support-subtitle {text-align: left;width: 750px;margin: 0 auto;line-height: 25px;}
					.cs-damage-step1 .customer-support-page {width:40%;}
					.cs-damage-step1 .customer-support-title2 { color: #4d4d4d;font-size: 26px;font-weight: bold; margin-top: 20px; margin-bottom:20px}
					.numberCircle {border-radius: 50%;background-color: #1495b8;text-align: center;padding: 0px 7px;color: #fff;font-family: sans;}
					";
				$style .= "</style>";

				$this->set('title', 'Valve control problem');
				$this->set('title2', 'Hose and solenoid check');
				$this->set('text', $text);
				$this->set('url', $url);
				$this->set('url2', $url2);
				$this->set('style', $style);
				$this->set('topbg', $topbg);
				$this->set('nextstepimage1', $nextstepimage1);
				$this->set('nextstepimage2', $nextstepimage2);
				$this->render('/Pages/customer_support_valve_control');
			break;

			case "valve-and-exhaust-check2":

				$topbg = "background-image: url(../image/customer-support/damage-top-step".$current_step.".png);";

				$current_step++;
				$text = '<h2 style="font-family: corbel;font-size: 26px;font-weight: bold;text-transform: none;color: #4d4d4d;margin-top: 25px;margin-bottom:25px;">Verify which part of the valve is defect</h2>Please fill out the form below. We will contact you<br /> as soon as your case is received and determined.';
				$image = 'vc7.png';
				$url = '/valve-control/dealer?step='.$current_step;
				$url2 = '/valve-control/user?step='.$current_step;
				$nextstepimage1 = 'damage-step2-g5742.png';
				$nextstepimage2 = 'damage-step2-g5743.png';
				$style = "<style>";
				$style .= "
					.cs-damage-subimage {margin: 25px auto;width: 500px;}
					.cs-damage-step1 .customer-support-subtitle {text-align: left;width: 435px;margin: 0 auto;line-height: 25px;}
					.cs-damage-step1 .customer-support-page {width:40%;}
					.cs-damage-step1 .customer-support-title2 { color: #4d4d4d;font-size: 26px;font-weight: bold; margin-top: 20px;}
					";
				$style .= "</style>";

				$this->set('title', 'Valve control problem');
				$this->set('title2', 'Valve and exhaust check');
				$this->set('image', $image);
				$this->set('text', $text);
				$this->set('url', $url);
				$this->set('url2', $url2);
				$this->set('style', $style);
				$this->set('topbg', $topbg);
				$this->set('nextstepimage1', $nextstepimage1);
				$this->set('nextstepimage2', $nextstepimage2);
				$this->render('/Pages/customer_support_valve_control');
			break;



			case "dealer":
				$style = "<style>";
				$style .= "";
				$style .= "</style>";
				$topbg = "background-image: url(../image/customer-support/damage-top-step".$current_step.".png);";

				$this->set('title', 'Valve control problem');

				$this->set('topbg', $topbg);
				$this->render('/Pages/customer_support_valve_control_5');
			break;
			case "user":
				$style = "<style>";
				$style .= "";
				$style .= "</style>";
				$topbg = "background-image: url(../image/customer-support/damage-top-step".$current_step.".png);";

				$this->set('title', 'Valve control problem');

				$this->set('topbg', $topbg);
				$this->render('/Pages/customer_support_valve_control_6');
			break;
		}

	}

	public function customer_support_submit($variant = 1) {
		$data['post'] = $_POST;
		$data['to'] = 'inquiry@armytrix.com';
		$data['subject'] = 'Message from armytrix.com';
		$data['fromName'] = 'armytrix.com';
		$message = 'test';
		$to = $data['to'];
		$subject = $data['subject'];
		$fromName = $data['fromName'];
		
		if( isset($_SERVER['HTTP_SEC_FETCH_SITE']) && $_SERVER['HTTP_SEC_FETCH_SITE'] == 'same-origin' ){

		if(isset($data['post']['field']) && !empty($data['post']['field'])){
		    switch ($variant) {
		        case 1:
		            
		            if (filter_var($data['post']['field'][5], FILTER_VALIDATE_EMAIL)) {
		                $message = '<b>Message from ' . $data['post']['field'][0] . '</b>' . '<br />';
		                //$message .= '<b>Form name: </b>'.$data['post']['field'][0] . '<br />';
		                $message .= '<b>Name: </b>'.$data['post']['field'][1] . '<br />';
		                $message .= '<b>Shop name: </b>'.$data['post']['field'][2] . '<br />';
		                $message .= '<b>Shop address: </b>'.$data['post']['field'][3] . '<br />';
		                $message .= '<b>Phone number: </b>'.$data['post']['field'][4] . '<br />';
		                $message .= '<b>Email: </b>'.$data['post']['field'][5] . '<br />';
		                $message .= '<b>Purchase order number: </b>'.$data['post']['field'][6] . '<br />';
		                $message .= '<b>Purchase date: </b>'.$data['post']['field'][7] . '<br />';
		                $message .= '<b>Installation date: </b>'.$data['post']['field'][8] . '<br />';
		                $message .= '<b>Problem description: </b>'.$data['post']['field'][9] . '<br />';
		                $subject = $data['post']['field'][0];
		                $this->send_email($message,$to,$subject,$fromName);
		            }else{
		                die('error');
		            }
		            
		            
		            break;
		        case 2:
		            $message = '<b>Message from ' . $data['post']['field'][0] . '</b>' . '<br />';
		            //$message .= '<b>Form name: </b>'.$data['post']['field'][0] . '<br />';
		            $message .= '<b>Name: </b>'.$data['post']['field'][1] . '<br />';
		            $message .= '<b>Phone number: </b>'.$data['post']['field'][2] . '<br />';
		            $message .= '<b>Country: </b>'.$data['post']['field'][3] . '<br />';
		            $message .= '<b>Email: </b>'.$data['post']['field'][4] . '<br />';
		            $message .= '<b>Purchase date: </b>'.$data['post']['field'][5] . '<br />';
		            $message .= '<b>Installation date: </b>'.$data['post']['field'][6] . '<br />';
		            $message .= '<b>Car model: </b>'.$data['post']['field'][7] . '<br />';
		            $message .= '<b>Vin number: </b>'.$data['post']['field'][8] . '<br />';
		            $message .= '<b>Who is your installer: </b>'.$data['post']['field'][9] . '<br />';
		            $message .= '<b>Who sold you the system: </b>'.$data['post']['field'][10] . '<br />';
		            $message .= '<b>Problem description: </b>'.$data['post']['field'][11] . '<br />';
		            
		            $subject = $data['post']['field'][0];
		            
		            $this->send_email($message,$to,$subject,$fromName);
		            
		            break;
		        case 3:
		            
		            $message = '<b>Message from ' . $data['post']['field'][0] . '</b>' . '<br />';
		            //$message .= '<b>Form name: </b>'.$data['post']['field'][0] . '<br />';
		            $message .= '<b>Name: </b>'.$data['post']['field'][1] . '<br />';
		            $message .= '<b>Shop name: </b>'.$data['post']['field'][2] . '<br />';
		            $message .= '<b>Shop address: </b>'.$data['post']['field'][3] . '<br />';
		            $message .= '<b>Phone number: </b>'.$data['post']['field'][4] . '<br />';
		            $message .= '<b>Email: </b>'.$data['post']['field'][5] . '<br />';
		            $message .= '<b>Purchase order number: </b>'.$data['post']['field'][6] . '<br />';
		            $message .= '<b>Purchase date: </b>'.$data['post']['field'][7] . '<br />';
		            $message .= '<b>Installation date: </b>'.$data['post']['field'][8] . '<br />';
		            $message .= '<b>Video link(URL): </b>'.$data['post']['field'][9] . '<br />';
		            $message .= '<b>Problem description: </b>'.$data['post']['field'][10] . '<br />';
		            
		            $subject = $data['post']['field'][0];
		            
		            $this->send_email($message,$to,$subject,$fromName);
		            
		            break;
		        case 4:
		            
		            $message = '<b>Message from ' . $data['post']['field'][0] . '</b>' . '<br />';
		            //$message .= '<b>Form name: </b>'.$data['post']['field'][0] . '<br />';
		            $message .= '<b>Name: </b>'.$data['post']['field'][1] . '<br />';
		            $message .= '<b>Phone number: </b>'.$data['post']['field'][2] . '<br />';
		            $message .= '<b>Country: </b>'.$data['post']['field'][3] . '<br />';
		            $message .= '<b>Email: </b>'.$data['post']['field'][4] . '<br />';
		            $message .= '<b>Purchase date: </b>'.$data['post']['field'][5] . '<br />';
		            $message .= '<b>Installation date: </b>'.$data['post']['field'][6] . '<br />';
		            $message .= '<b>Car model: </b>'.$data['post']['field'][7] . '<br />';
		            $message .= '<b>Vin number: </b>'.$data['post']['field'][8] . '<br />';
		            $message .= '<b>Who is your installer: </b>'.$data['post']['field'][9] . '<br />';
		            $message .= '<b>Who sold you the system: </b>'.$data['post']['field'][10] . '<br />';
		            $message .= '<b>Video link(URL): </b>'.$data['post']['field'][11] . '<br />';
		            $message .= '<b>Problem description: </b>'.$data['post']['field'][12] . '<br />';
		            
		            $subject = $data['post']['field'][0];
		            
		            $this->send_email($message,$to,$subject,$fromName);
		            
		            break;
		            //valve control
		            
		        case 5:
		            
		            $message = '<b>Message from ' . $data['post']['field'][0] . '</b>' . '<br />';
		            //$message .= '<b>Form name: </b>'.$data['post']['field'][0] . '<br />';
		            $message .= '<b>Name: </b>'.$data['post']['field'][1] . '<br />';
		            $message .= '<b>Phone number: </b>'.$data['post']['field'][2] . '<br />';
		            $message .= '<b>Address: </b>'.$data['post']['field'][3] . '<br />';
		            $message .= '<b>Email: </b>'.$data['post']['field'][4] . '<br />';
		            
		            $message .= '<b>Installer Name: </b>'.$data['post']['field'][5] . '<br />';
		            $message .= '<b>Installer Phone number: </b>'.$data['post']['field'][6] . '<br />';
		            $message .= '<b>Installer Address: </b>'.$data['post']['field'][7] . '<br />';
		            $message .= '<b>Installer Email: </b>'.$data['post']['field'][8] . '<br />';
		            
		            $message .= '<b>Installation date: </b>'.$data['post']['field'][9] . '<br />';
		            $message .= '<b>Vin number: </b>'.$data['post']['field'][10] . '<br />';
		            $message .= '<b>Problem description: </b>'.$data['post']['field'][11] . '<br />';
		            $message .= '<b>Video link(URL): </b>'.$data['post']['field'][12] . '<br />';
		            
		            $subject = $data['post']['field'][0];
		            $this->send_email($message,$to,$subject,$fromName);
		            
		            break;
		            //valve control
		        case 6:
		            
		            $message = '<b>Message from ' . $data['post']['field'][0] . '</b>' . '<br />';
		            //$message .= '<b>Form name: </b>'.$data['post']['field'][0] . '<br />';
		            $message .= '<b>PI number: </b>'.$data['post']['field'][1] . '<br />';
		            $message .= '<b>Vin number: </b>'.$data['post']['field'][2] . '<br />';
		            $message .= '<b>Problem description: </b>'.$data['post']['field'][3] . '<br />';
		            $message .= '<b>Video link(URL): </b>'.$data['post']['field'][4] . '<br />';
		            
		            $subject = $data['post']['field'][0];
		            $this->send_email($message,$to,$subject,$fromName);
		            
		            break;
		            
		    }
		}else{ die('error'); }
	}else{ die('error'); }
		
	}

	private function send_email($message,$to,$subject,$fromName) {
	    $f_path = 'cdn/support_files';
	    mkdir($f_path, 0777, true);
		foreach($_FILES['file'] as $key => $all) {
				foreach($all as $i => $val) {
					$new_array[$i][$key] = $val;
				}
		}
		$img_url = null;
		if( isset($new_array) && !empty($new_array) ){
		    foreach ($new_array as $pics){
		        $id = rand(123,987);
		        $info = pathinfo($pics['name']);
		        $ext = $info['extension']; // get the extension of the file
		        $newname = $pics['name']; //"newname.".$ext;
		        $target = $f_path."/".$newname;
		        if(move_uploaded_file( $pics['tmp_name'], $target)){
		            $img_url.= '<a href="'.SITEURL.$target.'">'.SITEURL.$target.'</a><br>';
		        }
		    }
		}
		$message .= '<b>Attachments: </b>'.$img_url . '<br />';
		$parameters = array('NAME'=>$fromName,'SUBJECT'=>$subject." - From ".$fromName,'BODY'=>$message);
		$this->DATA->AppMail('inquiry@armytrix.com', 'SupportRequest', $parameters,$dateTime = DATE);
		$this->redirect('/Pages/customer_support_thanks');
	}


	public function mustang_flash_sale() {
	    $this->layout = '404';
	    $this->set('title_for_layout', 'Mustang flash sale');
	    $page_meta = array('des'=>@$this->meta['des'], 'key'=>$this->meta['keys']);
	    $this->set('page_meta',$page_meta);
	}

	public function flash_sale_pop() {

	}


	public function done() {

	}

}
