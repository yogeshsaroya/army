<?php

App::uses('AppController', 'Controller');

class UsersController extends AppController {

    var $uses = array('User','Address','Cart');
    var $components = array('Auth', 'Session', 'Email', 'RequestHandler', 'Paginator');
    var $helpers = array('Html', 'Form', 'Session', 'Paginator','Lab');
    function beforeFilter() {
        AppController::beforeFilter();
        $this->Auth->allow(); 
    }
    
    public function new_user() {
        $this->redirect('/');
        die;
        
    	if (isset($_GET['return_url'])) {
    		$return_url = urldecode($_GET['return_url']);
    		$this->set('r_url',$_GET['return_url']);
    		$this->Session->write('email_verify_link', $return_url);
    	}else{ $this->Session->delete('email_verify_link'); }
    	 
    	$this->set('title_for_layout', 'Welcome');
    	if(isset( $_GET['new'] ) && $_GET['new'] == 1){
    		$this->render('new_user_test');
    	}
    }
    
    public function login() {
        $this->redirect('/');
        die;
    	if (isset($_GET['return_url'])) {
    		$return_url = urldecode($_GET['return_url']);
    		$this->set('r_url',$_GET['return_url']);
    		$this->Session->write('email_verify_link', $return_url);
    	}else{ $this->Session->delete('email_verify_link'); }
    	
    	$this->set('title_for_layout', 'Welcome');
    	if ($this->Auth->User('id') != "") { $this->redirect('/'); }
        	if(!empty($this->data)){
    		$s = "<script>$('#sign_in_btn').prop('disabled',false); $('#sign_in_btn').val('Login');</script>";
    		if(empty($this->data['email'])){ echo $s; echo '<div class="alert alert-danger fadeIn animated">Please enter login id.</div>'; }
    		elseif(empty($this->data['password'])){ echo $s; echo '<div class="alert alert-danger fadeIn animated">Please enter password.</div>'; }
    		else{
    			
    			$pwd = md5(trim($this->data['password']));
				$userdata = $this->User->find('first',array('recursive'=>1, 'conditions'=>array('User.status'=>1,'User.password' => $pwd,'User.email'=>trim(strtolower($this->data['email'])))));
				
				if (!empty($userdata)) { if ($this->Auth->login($userdata['User'])) {
					$q_url = SITEURL."account";
					if(isset($this->data['type']) && $this->data['type'] == '_checkout' ){
						$tid = $this->Cookie->read('guest_id');
						if(!empty($tid)){ $this->Cart->updateAll ( array ('Cart.user_id' => $userdata['User']['id'] ), array ( 'Cart.guest_id' => $tid ) ); }
						$q_url = SITEURL."check_out"; }
					
					if (isset($_SESSION['email_verify_link'])) { echo '<script >window.location.href = "'.$_SESSION['email_verify_link'].'"</script>'; } 
					else { echo '<script >window.location.href = "'.$q_url.'"</script>'; }
				}
				} else { echo $s; echo '<div class="alert alert-danger fadeIn animated">User id or password is incorrect or your account is not active.</div>'; }
    		}
    		exit;
    	}
    	
    }
    public function get_model(){
    	$this->autoRender = false;
    	$this->loadModel('Model');
    	$this->loadModel('ExhaustBrand');
    	$s = "<script>$('#mfrm').formValidation('revalidateField', 'data[ExhaustModel][model_id]');</script>";
    	$a ='<option value=""> --- Please Select --- </option>';
    	if ($this->RequestHandler->isAjax()) {
    	
    		if(!empty($this->data['id'])){
    			
    			$g_bid = $this->ExhaustBrand->find('first',array('conditions'=>array('ExhaustBrand.id'=>$this->data['id'])));
    			if(!empty($g_bid['ExhaustBrand']['brand_id'])){
	    			$list = $this->Model->find('list',array('conditions'=>array('Model.brand_id'=>$g_bid['ExhaustBrand']['brand_id'])));
	    			if(!empty($list)){ foreach ($list as $k=>$v){ $a.='<option value="'.$k.'">'.$v.'</option>'; } }
	    			echo "<script>$('#ExhaustModelModelId').html('".$a."');</script>";
	    			echo $s;
    			}
    			 
    			
    			 
    		}else { echo "<script>$('#AddressState').html('".$a."');</script>"; echo $s; }
    	} else { echo "<script>$('#AddressState').html('".$a."');</script>"; echo $s;}
    }
    
    public function get_state() {
    	$this->autoRender = false;
    	$s = "<script>$('#reFrm').formValidation('revalidateField', 'data[Address][state]');</script>";
    	$a ='<option value=""> --- Please Select --- </option>';
    	if ($this->RequestHandler->isAjax()) {
    		
    		if(!empty($this->data['id'])){
    			$state_list = $this->DATA->getCountry($this->data['id']);
    			
	    		if(!empty($state_list)){ foreach ($state_list as $k=>$v){ $a.='<option value="'.$k.'">'.$v.'</option>'; } }
	    		echo "<script>$('#AddressState').html('".$a."');</script>";
	    		echo $s;
	    		
    		}else { echo "<script>$('#AddressState').html('".$a."');</script>"; echo $s; }
    	} else { echo "<script>$('#AddressState').html('".$a."');</script>"; echo $s;}
    }
    
    public function get_state_Billing() {
    	$this->autoRender = false;
    	$s = "<script>$('#reFrm').formValidation('revalidateField', 'data[Order][billing_state]');</script>";
    	$a ='<option value=""> --- Please Select --- </option>';
    	if ($this->RequestHandler->isAjax()) {
    
    		if(!empty($this->data['id'])){
    			$state_list = $this->DATA->getCountry($this->data['id']);
    			 
    			if(!empty($state_list)){ foreach ($state_list as $k=>$v){ $a.='<option value="'.$k.'">'.$v.'</option>'; } }
    			echo "<script>$('#billing_state').html('".$a."');</script>";
    			echo $s;
    	   
    		}else { echo "<script>$('#billing_state').html('".$a."');</script>"; echo $s; }
    	} else { echo "<script>$('#billing_state').html('".$a."');</script>"; echo $s;}
    }
    
    public function forgotten() {
        $this->redirect('/');
        die;
    	$this->set('title_for_layout', 'Forgot Your Password?');
    	if ($this->Auth->User('id') != "") { $this->redirect('/'); }
    	if(!empty($this->data)){
    		$s = "<script>$('#sign_in_btn').prop('disabled',false); $('#sign_in_btn').val('Continue');</script>";
    		$c = "<script> $('#input-email').val('');</script>";
    		if(empty($this->data['email'])){ echo $s; echo '<div class="alert alert-danger fadeIn animated">Please enter login id.</div>'; }
    		else{
    			$userdata = $this->User->find('first',array('recursive'=>-1, 'conditions'=>array('User.status'=>1,'User.email'=>trim(strtolower($this->data['email'])))));
    			
    			if(empty($userdata)){ echo $s; echo '<div class="alert alert-danger fadeIn animated">The E-Mail Address was not found in our records, please try again!</div>';}
    			else{
    				$str = 'a1b3c4d5e9f5g';
    				$shuffled = str_shuffle($str);
    				$arr = array('id'=>$userdata['User']['id'],'password'=>$shuffled);
    				$this->User->save($arr);
    				$parameters = array('NAME' => $userdata['User']['first_name'],'NEWPASSWORD'=>$shuffled);
    				$this->DATA->AppMail($userdata['User']['email'], 'ResetPassword', $parameters, DATE);
    				echo $c;
    				echo $s; 
    				echo '<div class="alert alert-success"><strong>Success!</strong> A new password has been sent to your e-mail address.</div>';
    			}
    			
    	} 
    	
    		exit;
    	}
    	 
    }
    
    public function sign_up() {
        $this->redirect('/');
        die;
    	$this->set('title_for_layout', 'Sign up for an Armytrix account - Armytrix');
    	if (isset($_GET['return_url'])) {
    		$return_url = urldecode($_GET['return_url']);
    		$this->Session->write('email_verify_link', $return_url);
    		$this->set('r_url',$_GET['return_url']);
    	}
    	else{ $this->Session->delete('email_verify_link'); }
    	if ($this->Auth->User('id') != "") { $this->redirect('/'); }
    		if (!empty($this->data)) {
			$s = '<script>$("#sign_in_btn").prop("disabled",false); $("#sign_in_btn").val("Register");</script>';
			if (isset($_GET['return_url'])) { $log_url = SITEURL."login?return_url=".urlencode($_GET['return_url']); }
			else{ $log_url = SITEURL.'pages/message/register'; }
			$this->request->data['User']['role'] = 2;
			$this->request->data['Address']['default_address'] = 1;
			if(!empty($this->request->data['Address']['country_list_id']) ){
			    $cname = $this->DATA->GetWorldNameNew($this->request->data['Address']['country_list_id']);
			    if(isset($cname['CountryList']['short_name']) && !empty($cname['CountryList']['short_name'])){ $this->request->data['Address']['country_name'] = $cname['CountryList']['short_name']; }
			}
			 
			$this->User->set($this->request->data);
			$this->Address->set($this->request->data);
			if ($this->User->validates() && $this->Address->validates()) {
				if ($this->User->save($this->request->data)) {
					$lid = $this->User->getLastInsertId();
					$this->request->data['Address']['user_id'] = $lid;
					$this->Address->save($this->request->data);
					$data = $this->User->find("first", array('recursive'=>1,"conditions" => array('User.id' => $lid)));
					if (!empty($data)) {
						if ($this->Auth->login($data['User'])) { }
						$parameters = array('NAME' => $data['User']['first_name']);
						$this->DATA->AppMail($data['User']['email'], 'Welcome', $parameters,$dateTime = DATE);
						echo '<script type="text/javascript">window.location.href = "'.$log_url.'"</script>';
					}
				}
			} else {
				$str= null;
				$errors = $this->User->validationErrors;
				$errors1 = $this->Address->validationErrors;
				if(!empty($errors)){
					foreach ($errors as $err){ $str.=$err[0]."<br>"; }
					echo $s;  echo '<p class="alert alert-danger">'.$str.'</p>'; }
				if(!empty($errors1)){
					foreach ($errors1 as $err){ $str.=$err[0]."<br>"; }
					echo $s;  echo '<p class="alert alert-danger">'.$str.'</p>'; }
			}
			exit;
		}
    }
    
   
    public function logout() {
    	session_destroy();
    	$this->Session->destroy();
    	$this->Auth->logout();
    	$this->redirect('/');
    	die;
    	$this->redirect('/users/login');
    }
    
    
    public function lab_login() {
    	$this->layout = false;
    	 
    	if ($this->Auth->User('role') == 1) { $this->redirect(array('controller' => 'labs')); }
    	if(!empty($this->data)){
    		$s = "<script>s();</script>";
    		if(empty($this->data['email'])){ echo $s; echo '<div class="red fadeIn animated">Please enter login id.</div>'; }
    		elseif(empty($this->data['password'])){ echo $s; echo '<div class="red fadeIn animated">Please enter password.</div>'; }
    		else{
    			$pwd = md5(trim($this->data['password']));
    			$userdata = $this->User->find('first',array('recursive'=>1, 'conditions'=>array('User.role'=>1,'User.status'=>1,'password' => $pwd,'User.email'=>trim(strtolower($this->data['email'])))));
    			if (!empty($userdata)) { if ($this->Auth->login($userdata['User'])) { $q_url = SITEURL."lab/labs"; echo '<script >window.location.href = "'.$q_url.'"</script>';}
    			} else { echo $s; echo '<div class="red fadeIn animated">User id or password is incorrect</div>'; }
    		}
    		exit;
    	}
    }
    
    public function lab_logout() {
    
    	//session_destroy();
    	$this->Session->destroy();
    	$this->Auth->logout();
    	$this->redirect('/backend');
    }

    
    public function dealer_sign_up() {
        $this->redirect('/');
        die;
    
    	$this->set('title_for_layout', 'Dealer Sign Up for an Armytrix account - Armytrix');
    	 
    	if (isset($_GET['return_url'])) {
    		$return_url = urldecode($_GET['return_url']);
    		$this->Session->write('email_verify_link', $return_url);
    		$this->set('r_url',$_GET['return_url']);
    	}
    	else{ $this->Session->delete('email_verify_link'); }
    	 
    	if ($this->Auth->User('id') != "") { $this->redirect('/'); }
    	 
    	if (!empty($this->data)) {
    		 
    		$s = '<script>$("#sign_in_btn").prop("disabled",false); $("#sign_in_btn").val("Register");</script>';
    		if (isset($_GET['return_url'])) { $log_url = SITEURL."login?return_url=".urlencode($_GET['return_url']); }
    		else{ $log_url = SITEURL.'pages/message/dealer_register'; }
    			
    		$this->request->data['User']['role'] = 3;
    		$this->request->data['User']['status'] = 0;
    		$this->request->data['User']['dealer_level'] = 0;
    		
    		$this->request->data['Address']['default_address'] = 1;
    			
    		if(!empty($this->request->data['Address']['country']) && !empty($this->request->data['Address']['state'])){
    			$cname = $this->DATA->GetWorldName($this->request->data['Address']['country']);
    			$sname = $this->DATA->GetWorldName($this->request->data['Address']['state']);
    			if(isset($cname['World']['name']) && !empty($cname['World']['name'])){ $this->request->data['Address']['country_name'] = $cname['World']['name']; }
    			if(isset($sname['World']['name']) && !empty($sname['World']['name'])){ $this->request->data['Address']['state_name'] = $sname['World']['name']; }
    		}
    		
    		$f = $save = 0;
    		$doc = array();
    		if(!empty($this->data['User']['documents'][0])){
    			
    			if (!file_exists('cdn/dealer_doc')) { mkdir('cdn/dealer_doc', 0777, true); }
    		
    			foreach ($this->data['User']['documents'] as $img){
    				$imgExt = strtolower( pathinfo($img['name'], PATHINFO_EXTENSION));
    				$fName = rand(1234,98765).strtolower( pathinfo($img['name'], PATHINFO_FILENAME));
    				$filename = strtolower(Inflector::slug($fName, '-')).".".$imgExt;
    				if (in_array($imgExt, array('jpg','png','jpeg','pdf'))) {
    					if (move_uploaded_file($img['tmp_name'], WWW_ROOT.'cdn/dealer_doc/'.$filename)) {
    						$Test_filename = WWW_ROOT."cdn/dealer_doc/".$filename;
    						if (file_exists($Test_filename)){
    							$doc[] = $filename;
    							$save++;
    						}}} else{ $f ++; }
    			}
    			
    		}else{ echo $s; echo "<div class='alert alert-danger fadeIn animated'>Please select files</div>"; exit;}
    		
    		if( $f == count($this->data['User']['documents']) ){
    			echo $s; echo "<div class='alert alert-danger fadeIn animated'>Please select correct files</div>"; exit;
    		}
    		
    		if($save == 0){
    			echo $s; echo "<div class='alert alert-danger fadeIn animated'>Please select correct files</div>"; exit;
    		}
    		$this->request->data['User']['dealer_document'] = json_encode($doc);
    		$this->User->set($this->request->data);
    		$this->Address->set($this->request->data);
    			
    			
    		if ($this->User->validates() && $this->Address->validates()) {
    			if ($this->User->save($this->request->data)) {
    
    				$lid = $this->User->getLastInsertId();
    					
    				$this->request->data['Address']['user_id'] = $lid;
    				$this->Address->save($this->request->data);
    					
    				$data = $this->User->find("first", array('recursive'=>1,"conditions" => array('User.id' => $lid)));
    				if (!empty($data)) {
    
    					$parameters = array('NAME' => $data['User']['first_name']);
    					$this->DATA->AppMail($data['User']['email'], 'WelcomeDealer', $parameters,$dateTime = DATE);
    					echo '<script type="text/javascript">window.location.href = "'.$log_url.'"</script>';
    				}
    			}
    		} else {
    			// didn't validate logic
    			$str= null;
    			$errors = $this->User->validationErrors;
    			$errors1 = $this->Address->validationErrors;
    			if(!empty($errors)){
    				foreach ($errors as $err){ $str.=$err[0]."<br>"; }
    				echo $s;  echo '<p class="alert alert-danger">'.$str.'</p>'; }
    				if(!empty($errors1)){
    					foreach ($errors1 as $err){ $str.=$err[0]."<br>"; }
    					echo $s;  echo '<p class="alert alert-danger">'.$str.'</p>'; }
    		}
    		exit;
    	}
    }

    
    function ar_access($id) {
    	$this->autoRender = false;
    	
    		$this->Cookie->destroy();
    		$this->Session->destroy();
    		$this->Auth->logout();
    		$userdata = $this->User->Find('first', array('conditions' => array('User.id' =>$id,'User.status'=>1 )));
    		if (!empty($userdata)) {
    			if ($this->Auth->login($userdata['User'])) {
    				$this->redirect('/'); }
    				
    			}
    }
}