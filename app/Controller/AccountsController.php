<?php

App::uses('AppController', 'Controller');

class AccountsController extends AppController {

    var $uses = array('User','Address','Order','OrderItem','OrderMessage');
    var $components = array('Auth', 'Session', 'Email', 'RequestHandler', 'Paginator');
    var $helpers = array('Html', 'Form', 'Session', 'Paginator');
    function beforeFilter() {
        AppController::beforeFilter();
        $this->redirect('/');
        
    }
    
    public function index() {
    	$this->set('title_for_layout', 'Welcome : Armytrix');
    }
    
    public function download_manual() {
    	$this->set('title_for_layout', 'Download Manual : Armytrix');
    	$this->Order->bindModel(array('hasOne'=>array('OrderHistory'=>array('conditions'=>array('OrderHistory.order_status_id'=>3)))));
    	$this->OrderItem->bindModel(array('belongsTo'=>array('Product','Order')));
    	$data = $this->OrderItem->find('all',array('recursive'=>2, 'conditions'=>array('Order.user_id'=>ME,'Product.type'=>2)));
    	
    	$this->set('data', $data);
    }
    
    
    public function order() {
    	$this->set('title_for_layout', 'My order : Armytrix');
    	$this->OrderItem->bindModel(array('belongsTo'=>array('Product')));
    	$this->Order->bindModel(array('hasMany'=>array('OrderItem','OrderMessage'=>array('conditions'=>array('OrderMessage.is_new'=>1)))));
    	$this->paginate = array('recursive'=>2,'conditions'=>array('Order.user_id'=>ME,'Order.order_status_id NOT'=>0),
    			'limit' => 50,
    			'order' => array('Order.id' => 'DESC'));
    	$data = $this->paginate('Order');
    	
    	$this->set('data', $data);
    	
    }
    public function order_message($id = null) {
    	$this->set('title_for_layout', 'My Message : Armytrix');
    	if(!empty($id)){
    		//OrderMessage
    		$this->OrderMessage->updateAll(array('OrderMessage.is_new'=>0),array('OrderMessage.order_id'=>$id));
    		
    		$this->Order->bindModel(array('hasMany'=>array('OrderMessage')));
    		$d = $this->Order->find('first',array('recursive'=>2,'conditions'=>array('Order.user_id'=>ME,'Order.id'=>$id)));
    		
    		if(!empty($d)){ $this->set('d',$d); }
    		else{ $this->layout = '404';}
    	}else{ $this->layout = '404';}
    	
    	if ($this->RequestHandler->isAjax() && !empty($this->data)) {
    		$s = '<script>$("#preloader").hide();</script>';
    		$o = $this->Order->find('first',array('conditions'=>array('Order.id'=>$this->data['OrderMessage']['order_id'],'Order.user_id'=>ME)));
    		if(!empty($o)){
    			if(empty($this->data['OrderMessage']['message'])){ echo $s; echo '<div class="alert alert-danger ">Please enter message</div>'; }
    			else{
    				
    			if( isset($this->data['OrderMessage']['file']['name']) && !empty($this->data['OrderMessage']['file']['name'])){
    				if (!file_exists('cdn/order_doc')) { mkdir('cdn/order_doc', 0777, true); }
    				$img = $this->data['OrderMessage']['file'];
    				$imgExt = strtolower( pathinfo($img['name'], PATHINFO_EXTENSION));
    				$fName = rand(1234,98765)."_".strtolower( pathinfo($img['name'], PATHINFO_FILENAME));
    				$filename = strtolower(Inflector::slug($fName, '-')).".".$imgExt;
    				if (in_array($imgExt, array('jpg','png','jpeg','pdf'))) {
    						if (move_uploaded_file($img['tmp_name'], WWW_ROOT.'cdn/order_doc/'.$filename)) {
    							$Test_filename = WWW_ROOT."cdn/order_doc/".$filename;
    							if (file_exists($Test_filename)){ 
    								$this->request->data['OrderMessage']['file_name'] = $filename; } } } 
    			}
    			$this->request->data['OrderMessage']['sender_id'] = ME;
    			$this->request->data['OrderMessage']['receiver_id'] = 1;
    			$this->OrderMessage->save($this->request->data);
    			
    			$parameters = array('NAME' => 'Admin','ORDER_NUMBER'=>$o['Order']['order_number'],'MESSAGE'=>$this->data['OrderMessage']['message']);
    			$this->DATA->AppMail('marketing@armytrix.com', 'MessageForOrder', $parameters,$dateTime = DATE);
    			
    			echo $s; echo '<div class="alert alert-success">Message sent.</div>';
    			echo "<script> $('#s_msg').hide(); setTimeout(function(){ location.reload(); }, 1000);</script>";
    			}
    		}else{ echo $s; echo '<div class="alert alert-danger ">Sorry, this is not working at the moment. Please try again later.</div>'; }
    		
    		exit;
    	}
    	
    }
    public function order_status($id = null) {
    	$this->set('title_for_layout', 'My order : Armytrix');
    	$this->loadModel('WebSetting');
    	if(!empty($id)){
    		
    		$this->OrderItem->bindModel(array('belongsTo'=>array('Product'=>array('fields'=>array()))));
	    	$this->Order->bindModel(array('hasMany'=>array('OrderItem','OrderHistory'=>array('order'=>array('id'=>'DESC'))),
	    			'belongsTo'=>array('BillingCountry'=>array('className'=>'World', 'foreignKey'=>'billing_country','fields'=>array('id','name')),
	    					'BillingState'=>array('className'=>'World', 'foreignKey'=>'billing_state','fields'=>array('id','name')),
	    					'ShippingCountry'=>array('className'=>'World', 'foreignKey'=>'shipping_country','fields'=>array('id','name')),
	    					'ShippingState'=>array('className'=>'World', 'foreignKey'=>'shipping_state','fields'=>array('id','name')))));
	    	
	    	$d = $this->Order->find('first',array('recursive'=>2,'conditions'=>array('Order.user_id'=>ME,'Order.order_number'=>$id)));
	    	if(!empty($d)){
	    		$WebSetting = $this->WebSetting->find('first',array('WebSetting.id'=>1));
	    		
	    		$this->set('d',$d);
	    		$this->set('WebSetting',$WebSetting);
	    		//ec($d); die;
	    	}else{ $this->layout = '404';}
    	}else{ $this->layout = '404';}
    
    }

    public function wishlist() {
    	$this->set('title_for_layout', 'My Wish List : Armytrix');
    	
    	if ($this->RequestHandler->isAjax()) {
    		if(!empty($this->data)){
    			$tid = null;
    			$tid = $this->Cookie->read('guest_id');
    			$cnd = array('Cart.type'=>2);
    			$cnd['OR'] = array('Cart.user_id'=>ME,'Cart.guest_id'=>$tid,'Cart.id'=>$this->data['id']);
    			$data = $this->Cart->find('count',array('recursive'=>-1, 'conditions'=>$cnd));
    			if($this->data['type'] == 1){
    				if($data > 0){
    					$arr = array('id'=>$this->data['id'],'type'=>1);
    					$this->Cart->save($arr);
    				}
    			}
    			elseif($this->data['type'] == 2){
    				if($data > 0){
    					$this->Cart->id = $this->data['id'];
    					$this->Cart->delete();
    				}
    			}
    			echo "<script>$.magnificPopup.close(); location.reload();</script>";
    		}
    		exit;
    	}
    	
    	$tid = null;
    	$tid = $this->Cookie->read('guest_id');
    	$cnd = array('Cart.type'=>2);
    	$cnd['OR'] = array('Cart.user_id'=>ME,'Cart.guest_id'=>$tid);
    	$data = $this->Cart->find('all',array('recursive'=>2, 'conditions'=>$cnd));
    	$this->set('data',$data);
    	
    }
    public function newsletter() {
    	$this->set('title_for_layout', 'Newsletter Subscription : Armytrix');
    	$data = $this->User->find('first',array('conditions'=>array('User.id'=>ME),'recursive'=>-1));
    	if(!empty($data)){
    		$this->set('data',$data);
    	}else{ $this->layout = '404'; }
    	 
    	/*update user info */
    	if ($this->RequestHandler->isAjax()) {
    		$s = '<script>$("#sign_in_btn").prop("disabled",false); $("#sign_in_btn").val("Continue");</script>';
    		if(!empty($this->data)){
    			$arr = array('id'=>ME,'subscription'=>$this->data['subscription']);
    			$this->User->save($arr);
    			echo '<div class="alert alert-success"><strong>Success:</strong> Your newsletter subscription has been successfully updated!</div>';
    			
    		}
    		exit;
    		}
    	
    }
    
    public function password() {
    	$this->set('title_for_layout', 'Change Password : Armytrix');
    	
    	/* update password */
    	if ($this->RequestHandler->isAjax()) {
    		$re = "<script>$('#reFrm').formValidation('revalidateField', 'data[User][password]','data[User][password1]');</script>";
    		$s = '<script>$("#sign_in_btn").prop("disabled",false); $("#sign_in_btn").val("Continue");</script>';
    		if(!empty($this->data)){
    			$this->User->set($this->request->data);
    			if ($this->User->validates() ) {
    			$this->request->data['User']['id'] = ME;
    			$this->User->save($this->data);
    			echo $s;
    			echo "<script>$('#UserPassword').val('');$('#UserPassword1').val('');</script>";
    			
    			echo '<div class="alert alert-success"><strong>Success:</strong> Your password has been successfully updated.</div>';
    			}
    			else{
    				$str= null;
    				$errors = $this->User->validationErrors;
    				$errors1 = $this->Address->validationErrors;
    				if(!empty($errors)){
    					foreach ($errors as $err){ $str.=$err[0]."<br>"; }
    					echo $s;  echo '<p class="alert alert-danger">'.$str.'</p>'; echo $re;}
    			}
    		}
    		exit;
    	}
    }
    
    public function info() {
    	$this->set('title_for_layout', 'My Account Information : Armytrix');
    	$data = $this->User->find('first',array('conditions'=>array('User.id'=>ME),'recursive'=>-1));
    	if(!empty($data)){
    		$this->set('data',$data);
    	}else{ $this->layout = '404'; }
    	
    	/*update user info */
    	if ($this->RequestHandler->isAjax()) {
    		$s = '<script>$("#sign_in_btn").prop("disabled",false); $("#sign_in_btn").val("Continue");</script>';
    		if(!empty($this->data)){
    			
    			$this->User->set($this->request->data);
    			if ($this->User->validates() ) {
    				$this->User->save($this->data);
    				echo $s;
    				echo '<div class="alert alert-success"><strong>Success:</strong> Your account has been successfully updated.</div>';
    			}else{
    				$str= null;
    				$errors = $this->User->validationErrors;
    				$errors1 = $this->Address->validationErrors;
    				if(!empty($errors)){
    					foreach ($errors as $err){ $str.=$err[0]."<br>"; }
    					echo $s;  echo '<p class="alert alert-danger">'.$str.'</p>'; }
    			}
    		}
    		exit;
    	}
    	
    }
    
    
    public function address($id = null,$num = null) {
    	$this->set('title_for_layout', 'Address Book : Armytrix');
    	
    	if ($this->RequestHandler->isAjax()) {
    	   $s = '<script>$("#sign_in_btn").prop("disabled",false); $("#sign_in_btn").val("Continue");</script>';
    		if(!empty($this->data)){
    			if(!empty($this->request->data['Address']['country_list_id']) ){
    			    $cname = $this->DATA->GetWorldNameNew($this->request->data['Address']['country_list_id']);
    				if(isset($cname['CountryList']['short_name']) && !empty($cname['CountryList']['short_name'])){ $this->request->data['Address']['country_name'] = $cname['CountryList']['short_name']; }
    			}
    			if( isset($this->data['Address']['default_address']) && $this->data['Address']['default_address'] == 1){ $this->Address->updateAll(array('Address.default_address'=>0),array('Address.user_id'=>ME)); }
    			if($this->Address->save($this->data)){
    				$this->Session->setFlash(__('Your address has been successfully inserted'), 'default', array('class' => 'alert alert-success'), 'msg');
    				echo '<script>window.location = "'.SITEURL.'address";</script>';
    			}else{
    				echo $s;
    				echo '<div class="alert alert-danger">Sorry, this is not working at the moment. Please try again later. </div>';
    			}
    			 
    		}
    		exit;
    	}
    	
    	
    	
    	if($id == 'add'){
    		$new = 'yes';
    		$this->set(compact('new'));
    		$this->render('address_change');
    	}
    	elseif($id == 'delete' && !empty($num)){
    		$this->autoRender = false;
    		$d = $this->Address->find('first',array('conditions'=>array('Address.user_id'=>ME,'Address.id'=>$num)));
    		if(!empty($d)){
    			if($d['Address']['default_address'] == 1){
    				$this->Session->setFlash(__('<strong>Warning:</strong> You can not delete your default address!'), 'default', array('class' => 'alert alert-danger'), 'msg');
    				$this->redirect(SITEURL."address");
    			}else{
    				$this->Address->id = $d['Address']['id'];
    				$this->Address->delete();
    			 	$this->Session->setFlash(__('Your address has been successfully deleted'), 'default', array('class' => 'alert alert-success'), 'msg');
    			 	$this->redirect(SITEURL."address");
    			}
    		}else{
    			$this->Session->setFlash(__('Please try again later.'), 'default', array('class' => 'alert alert-danger'), 'msg');
    			$this->redirect(SITEURL."address");
    		}
    		
    	}
    	elseif($id == 'default' && !empty($num)){
    		$d = $this->Address->find('first',array('conditions'=>array('Address.user_id'=>ME,'Address.id'=>$num)));
    		if(!empty($d)){
    			$this->Address->updateAll(array('Address.default_address'=>0),array('Address.user_id'=>ME));
    			$arr = array('id'=>$d['Address']['id'],'default_address'=>1);
    			$this->Address->save($arr);
    			$this->Session->setFlash(__('Your default address has been successfully updated'), 'default', array('class' => 'alert alert-success'), 'msg');
    			$this->redirect(SITEURL."address");
    		}else{
    			$this->Session->setFlash(__('Please try again later.'), 'default', array('class' => 'alert alert-danger'), 'msg');
    			$this->redirect(SITEURL."address");
    		}
    	}
    	elseif($id == 'edit' && !empty($num)){
    		$edit_add = $this->Address->find('first',array('conditions'=>array('Address.user_id'=>ME,'Address.id'=>$num)));
    		if(empty($edit_add)){
    			$this->Session->setFlash(__('Please try again later.'), 'default', array('class' => 'alert alert-danger'), 'msg');
    			$this->redirect(SITEURL."address");
    		}
    		$get_state = $this->DATA->getCountry($edit_add['Address']['country']);
    		$new = 'edit';
    		$this->set(compact('new','edit_add','get_state'));
    		$this->render('address_change');
    	}
    	
    	else{
    	$data = $this->Address->find('all',array('conditions'=>array('Address.user_id'=>ME), 'order'=>array('Address.default_address'=>'DESC')));
    	$this->set(compact('data'));
    	}
    	
    	
    	
    	
    }
    
    
    
    


}