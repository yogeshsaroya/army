<?php
App::uses('AppController', 'Controller');
class PaymentsController extends AppController {
    public $uses = array('Brand','Model','Motor','Product','ExhaustBrand','ExhaustModel','ExhaustProduct','Library','ItemDetail','QualityDetail','Cart','WebSetting','Order','OrderItem','OrderHistory','CountryList');
	public $components = array('Auth','Cookie', 'Session', 'RequestHandler','DATA','Paypal','AmericaPaypal','EuropePaypal');
	
	function beforeFilter() {
		AppController::beforeFilter();
		$this->Auth->allow();
		$this->autoRender = false;
	}
	
	public function index() {
	}
	
	public function payment_successful() {
	    $this->autoRender = false;
	    if( isset($this->request->query['token']) && !empty($this->request->query['token'])){
	        try {
	            $this->Paypal->token = $this->request->query['token'];
	            $this->Paypal->payerId = $this->request->query['PayerID'];
	            $p_detail = $this->Paypal->getExpressCheckoutDetails();
	            
	            if($p_detail['ACK']=="Success" && !empty($p_detail) && $p_detail['ACK']){
	                if(isset($p_detail['L_NAME0']) && !empty($p_detail['L_NAME0'])){
	                    try {
	                        $this->Paypal->amount = $p_detail['AMT'];
	                        $this->Paypal->currencyCode = 'USD';
	                        $this->Paypal->token = $this->request->query['token'];
	                        $this->Paypal->payerId = $this->request->query['PayerID'];
	                        $saleTran = $this->Paypal->doExpressCheckoutPayment();
	                        
	                        if( isset($saleTran) && !empty($saleTran) && $saleTran['ACK']=="Success" ){
	                            $data = $this->Order->find('first',array('recursive'=>1,'conditions'=>array('Order.order_number'=>$p_detail['L_NAME0'])));
	                            if(!empty($data)){
	                                $payPal = array('order'=>$p_detail,'sale'=>$saleTran);
	                                $tInfo = json_encode($payPal);
	                                $arr = array('id'=>$data['Order']['id'],'transaction_id'=>$saleTran['TRANSACTIONID'],'transaction_info'=>$tInfo,'payment_status'=>1,'order_status_id'=>1,'card_ids'=>null);
	                                
	                                if(isset($p_detail['SHIPTONAME'])){ $arr['shipping_company'] = $p_detail['SHIPTONAME']; }
	                                if(isset($p_detail['SHIPTOSTREET'])){ $arr['shipping_address'] = $p_detail['SHIPTOSTREET']; }
	                                if(isset($p_detail['SHIPTOSTREET2'])){ $arr['shipping_address_2'] = $p_detail['SHIPTOSTREET2']; }
	                                if(isset($p_detail['SHIPTOCITY'])){ $arr['shipping_city'] = $p_detail['SHIPTOCITY']; }
	                                if(isset($p_detail['SHIPTOZIP'])){ $arr['shipping_zip'] = $p_detail['SHIPTOZIP'];}
	                                if(isset($p_detail['SHIPTOSTATE'])){ $arr['shipping_state'] = $p_detail['SHIPTOSTATE']; }
	                                if(isset($p_detail['SHIPTOCOUNTRYNAME'])){  $arr['shipping_country'] = $p_detail['SHIPTOCOUNTRYNAME'];}
	                                
	                                $this->Order->save($arr);
	                                $cart_dis = explode(',', $data['Order']['card_ids']);
	                                if ( !empty($cart_dis) ){ $this->Cart->deleteAll ( array ('Cart.id' => $cart_dis),false ); }
	                                
	                                $body = $this->DATA->em($data['Order']['id']);
	                                $pa = array( 'ORDER_NUMBER'=>$data['Order']['order_number'],'NAME'=>$data['Order']['first_name'],'BODY'=>$body);
	                                $this->DATA->AppMail($data['Order']['email'],'OrderPlaced', $pa, DATE,2);
	                                
	                                $body1 = $this->DATA->emOrderInquiry($data['Order']['id'],2);
	                                $pa1 = array( 'ORDER_NUMBER'=>$data['Order']['order_number'],'NAME'=>$data['Order']['first_name'],'BODY'=>$body1);
	                                $this->DATA->AppMail('inquiry@armytrix.com','NewOrderInquiry', $pa1, DATE,2);
	                                
	                                
	                                $u = SITEURL."pages/order/success/".$p_detail['L_NAME0'];
	                                $this->redirect($u);
	                            }else{ die('error, please contact to support'); } 
	                        }
                            else{
                                $arr = array('id'=>$data['Order']['id'],'transaction_id'=>$saleTran['TRANSACTIONID'],'transaction_info'=>json_encode($p_detail),'payment_status'=>2,'order_status_id'=>8);
                                
                                if(isset($p_detail['SHIPTONAME'])){ $arr['shipping_company'] = $p_detail['SHIPTONAME']; }
                                if(isset($p_detail['SHIPTOSTREET'])){ $arr['shipping_address'] = $p_detail['SHIPTOSTREET']; }
                                if(isset($p_detail['SHIPTOSTREET2'])){ $arr['shipping_address_2'] = $p_detail['SHIPTOSTREET2']; }
                                if(isset($p_detail['SHIPTOCITY'])){ $arr['shipping_city'] = $p_detail['SHIPTOCITY']; }
                                if(isset($p_detail['SHIPTOZIP'])){ $arr['shipping_zip'] = $p_detail['SHIPTOZIP'];}
                                if(isset($p_detail['SHIPTOSTATE'])){ $arr['shipping_state'] = $p_detail['SHIPTOSTATE']; }
                                if(isset($p_detail['SHIPTOCOUNTRYNAME'])){  $arr['shipping_country'] = $p_detail['SHIPTOCOUNTRYNAME'];}
                                
                                $this->Order->save($arr);
                                $u = SITEURL."pages/order/fail/".$p_detail['L_NAME0'];
                                $this->redirect($u);
                            } 
	                    } catch (Exception $e) { echo $e->getMessage(); }
	                }else{ die('error, please contact to support'); }
	            }else{ die('error, please contact to support'); }
	        } catch(Exception $e) { echo $e->getMessage(); }
	    }
	    
	}
	
	public function payment_cancelled() {
	    $this->autoRender = false;
	    if( isset($this->request->query['token']) && !empty($this->request->query['token'])){
	        try {
	            $this->Paypal->token = $this->request->query['token'];
	            $p_detail = $this->Paypal->getExpressCheckoutDetails();
	            if($p_detail['ACK']=="Success" && !empty($p_detail)) {
	                if(isset($p_detail['L_NAME0']) && !empty($p_detail['L_NAME0'])){
	                    $data = $this->Order->find('first',array('recursive'=>1,'conditions'=>array('Order.order_number'=>$p_detail['L_NAME0'])));
	                    if(!empty($data)){
	                        $arr = array('id'=>$data['Order']['id'],'transaction_id'=>$p_detail['L_NAME0'],'transaction_info'=>json_encode($p_detail),'payment_status'=>2,'order_status_id'=>8);
	                        
	                        if(isset($p_detail['SHIPTONAME'])){ $arr['shipping_company'] = $p_detail['SHIPTONAME']; }
	                        if(isset($p_detail['SHIPTOSTREET'])){ $arr['shipping_address'] = $p_detail['SHIPTOSTREET']; }
	                        if(isset($p_detail['SHIPTOSTREET2'])){ $arr['shipping_address_2'] = $p_detail['SHIPTOSTREET2']; }
	                        if(isset($p_detail['SHIPTOCITY'])){ $arr['shipping_city'] = $p_detail['SHIPTOCITY']; }
	                        if(isset($p_detail['SHIPTOZIP'])){ $arr['shipping_zip'] = $p_detail['SHIPTOZIP'];}
	                        if(isset($p_detail['SHIPTOSTATE'])){ $arr['shipping_state'] = $p_detail['SHIPTOSTATE']; }
	                        if(isset($p_detail['SHIPTOCOUNTRYNAME'])){  $arr['shipping_country'] = $p_detail['SHIPTOCOUNTRYNAME'];}
	                        
	                        $this->Order->save($arr);
	                        
	                        $u = SITEURL."pages/order/fail/".$p_detail['L_NAME0'];
	                        $this->redirect($u);
	                    }} }
	        }catch(Exception $e) { echo $e->getMessage(); }
	    }
	}
	
	
	public function payment_successful_america() {
	    $this->autoRender = false;
	    if( isset($this->request->query['token']) && !empty($this->request->query['token'])){
        try {
            $this->AmericaPaypal->token = $this->request->query['token'];
            $this->AmericaPaypal->payerId = $this->request->query['PayerID'];
            $p_detail = $this->AmericaPaypal->getExpressCheckoutDetails();
	        if($p_detail['ACK']=="Success" && !empty($p_detail) && $p_detail['ACK']){
            if(isset($p_detail['L_NAME0']) && !empty($p_detail['L_NAME0'])){
                try {
                    $this->AmericaPaypal->amount = $p_detail['AMT'];
                    $this->AmericaPaypal->currencyCode = 'USD';
                    $this->AmericaPaypal->token = $this->request->query['token'];
                    $this->AmericaPaypal->payerId = $this->request->query['PayerID'];
                    $saleTran = $this->AmericaPaypal->doExpressCheckoutPayment();
                    if( isset($saleTran) && !empty($saleTran) && $saleTran['ACK']=="Success" ){
                        $data = $this->Order->find('first',array('recursive'=>1,'conditions'=>array('Order.order_number'=>$p_detail['L_NAME0'])));
                        if(!empty($data)){

                      $payPal = array('order'=>$p_detail,'sale'=>$saleTran);
            	      $tInfo = json_encode($payPal);
            	      $arr = array('id'=>$data['Order']['id'],'transaction_id'=>$saleTran['TRANSACTIONID'],'transaction_info'=>$tInfo,'payment_status'=>1,'order_status_id'=>1,'card_ids'=>null);
            	      $this->Order->save($arr);
            	      
            	      $cart_dis = explode(',', $data['Order']['card_ids']);
            	      if ( !empty($cart_dis) ){ $this->Cart->deleteAll ( array ('Cart.id' => $cart_dis),false ); }
            	      
            	      $body = $this->DATA->em($data['Order']['id']);
            	      $pa = array( 'ORDER_NUMBER'=>$data['Order']['order_number'],'NAME'=>$data['Order']['first_name'],'BODY'=>$body);
            	      $this->DATA->AppMail($data['Order']['email'],'OrderPlaced', $pa, DATE,2);
            	      
            	      $body1 = $this->DATA->emOrderInquiry($data['Order']['id'],2);
            	      $pa1 = array( 'ORDER_NUMBER'=>$data['Order']['order_number'],'NAME'=>$data['Order']['first_name'],'BODY'=>$body1);
            	      $this->DATA->AppMail('inquiry@armytrix.com','NewOrderInquiry', $pa1, DATE,2);
            	      
            	      $u = SITEURL."pages/order/success/".$p_detail['L_NAME0'];
            	      $this->redirect($u);
	      }else{ die('error, please contact to us'); } 
         }
	      else{
	           $arr = array('id'=>$data['Order']['id'],'transaction_id'=>$saleTran['TRANSACTIONID'],'transaction_info'=>json_encode($p_detail),'payment_status'=>2,'order_status_id'=>8);
	           $this->Order->save($arr);
               $u = SITEURL."pages/order/fail/".$p_detail['L_NAME0']; 
               $this->redirect($u); 
	      } } catch (Exception $e) { echo $e->getMessage(); }
            }else{ die('error, please contact to support'); }
	        }else{ die('error, please contact to support'); }
	    } catch(Exception $e) { echo $e->getMessage(); }
	  }
	    
	}
	
	public function payment_cancelled_america() {
	    $this->autoRender = false;
	    if( isset($this->request->query['token']) && !empty($this->request->query['token'])){
	    try {
	        $this->AmericaPaypal->token = $this->request->query['token'];
	        $p_detail = $this->AmericaPaypal->getExpressCheckoutDetails();
        if($p_detail['ACK']=="Success" && !empty($p_detail)) {
            if(isset($p_detail['L_NAME0']) && !empty($p_detail['L_NAME0'])){
                $data = $this->Order->find('first',array('recursive'=>1,'conditions'=>array('Order.order_number'=>$p_detail['L_NAME0'])));
                if(!empty($data)){
                    $arr = array('id'=>$data['Order']['id'],'transaction_id'=>$saleTran['TRANSACTIONID'],'transaction_info'=>json_encode($p_detail),'payment_status'=>2,'order_status_id'=>8,'card_ids'=>null);
                    $this->Order->save($arr);
                    $u = SITEURL."pages/order/fail/".$p_detail['L_NAME0'];
                    $this->redirect($u);
                }}else{ die('error, please contact to support'); } }
	        }catch(Exception $e) { echo $e->getMessage(); }
	    }
	}
	
	
	public function payment_successful_europe() {
	    $this->autoRender = false;
	    if( isset($this->request->query['token']) && !empty($this->request->query['token'])){
	        try {
	            $this->EuropePaypal->token = $this->request->query['token'];
	            $this->EuropePaypal->payerId = $this->request->query['PayerID'];
	            $p_detail = $this->EuropePaypal->getExpressCheckoutDetails();
	            
	            if($p_detail['ACK']=="Success" && !empty($p_detail) && $p_detail['ACK']){
	                if(isset($p_detail['L_NAME0']) && !empty($p_detail['L_NAME0'])){
	                    try {
	                        $this->EuropePaypal->amount = $p_detail['AMT'];
	                        $this->EuropePaypal->currencyCode = 'EUR';
	                        $this->EuropePaypal->token = $this->request->query['token'];
	                        $this->EuropePaypal->payerId = $this->request->query['PayerID'];
	                        $saleTran = $this->EuropePaypal->doExpressCheckoutPayment();
	                        
	                        if( isset($saleTran) && !empty($saleTran) && $saleTran['ACK']=="Success" ){
	                            $data = $this->Order->find('first',array('recursive'=>1,'conditions'=>array('Order.order_number'=>$p_detail['L_NAME0'])));
	                            if(!empty($data)){
	                                $payPal = array('order'=>$p_detail,'sale'=>$saleTran);
	                                $tInfo = json_encode($payPal);
	                                $arr = array('id'=>$data['Order']['id'],'transaction_id'=>$saleTran['TRANSACTIONID'],'transaction_info'=>$tInfo,'payment_status'=>1,'order_status_id'=>1,'card_ids'=>null);
	                                $this->Order->save($arr);
	                                $cart_dis = explode(',', $data['Order']['card_ids']);
	                                if ( !empty($cart_dis) ){ $this->Cart->deleteAll ( array ('Cart.id' => $cart_dis),false ); }
	                                $body = $this->DATA->em($data['Order']['id']);
	                                $pa = array( 'ORDER_NUMBER'=>$data['Order']['order_number'],'NAME'=>$data['Order']['first_name'],'BODY'=>$body);
	                                $this->DATA->AppMail($data['Order']['email'],'OrderPlaced', $pa, DATE,2);
	                                
	                                $body1 = $this->DATA->emOrderInquiry($data['Order']['id'],2);
	                                $pa1 = array( 'ORDER_NUMBER'=>$data['Order']['order_number'],'NAME'=>$data['Order']['first_name'],'BODY'=>$body1);
	                                $this->DATA->AppMail('inquiry@armytrix.com','NewOrderInquiry', $pa1, DATE,2);
	                                
	                                $u = SITEURL."pages/order/success/".$p_detail['L_NAME0'];
	                                $this->redirect($u);
	                            }else{ die('error, please contact to us'); } 
	                        }
	                            else{
	                                $arr = array('id'=>$data['Order']['id'],'transaction_id'=>$saleTran['TRANSACTIONID'],'transaction_info'=>json_encode($p_detail),'payment_status'=>2,'order_status_id'=>8);
	                                $this->Order->save($arr);
	                                
	                                $u = SITEURL."pages/order/fail/".$p_detail['L_NAME0'];
	                                $this->redirect($u);
	                            } } catch (Exception $e) { echo $e->getMessage(); }
	                }else{ die('error, please contact to support'); }
	            }else{ die('error, please contact to support'); }
	        } catch(Exception $e) { echo $e->getMessage(); }
	    }
	    
	}
	
	public function payment_cancelled_europe() {
	    $this->autoRender = false;
	    if( isset($this->request->query['token']) && !empty($this->request->query['token'])){
	        try {
	            $this->EuropePaypal->token = $this->request->query['token'];
	            $p_detail = $this->EuropePaypal->getExpressCheckoutDetails();
	            if($p_detail['ACK']=="Success" && !empty($p_detail)) {
	                if(isset($p_detail['L_NAME0']) && !empty($p_detail['L_NAME0'])){
	                    $data = $this->Order->find('first',array('recursive'=>1,'conditions'=>array('Order.order_number'=>$p_detail['L_NAME0'])));
	                    if(!empty($data)){
	                        $arr = array('id'=>$data['Order']['id'],'transaction_id'=>$saleTran['TRANSACTIONID'],'transaction_info'=>json_encode($p_detail),'payment_status'=>2,'order_status_id'=>8);
	                        $this->Order->save($arr);
	                        $u = SITEURL."pages/order/fail/".$p_detail['L_NAME0'];
	                        $this->redirect($u);
	                    }}else{ die('error, please contact to support'); } }
	        }catch(Exception $e) { echo $e->getMessage(); }
	    }
	}
}
