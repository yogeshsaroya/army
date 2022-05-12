<?php
App::uses('AppController', 'Controller');
class PagesController extends AppController
{
	public $uses = array('User', 'Brand', 'Model', 'Motor', 'Product', 'Library', 'ItemDetail','Cart', 'PromoCode', 'WebSetting','Address', 'Order', 
	'OrderItem', 'OrderHistory', 'Language', 'String','Translation', 'CountryList','Motorcycle','MotorcycleModel','MotorcycleYear');
	public $components = array('Auth', 'Cookie', 'Session', 'RequestHandler', 'DATA', 'Paypal');
	public $meta = array(
		'des' => 'Following the creed of providing the most sound, more power and true versatility, ARMYTRIX offer high-end performance valvetronic exhaust systems, ecu tuning and power box that are second to none. We foster a culture of innovation. ARMYTRIX not only creates products, ARMYTRIX creates experiences.',
		'keys' => 'cat-back, sports exhaust, muffler, silencer, armytrix systems manifold, us, ferrari, lamborghini, maserati, porsche, benz, bmw, volkswagen, mclaren, mini cooper, audi, nissan gt-r r35, sport cat, cat, manifold, sports manifold, test pipes'
	);

	function beforeFilter()
	{
		AppController::beforeFilter();
		$this->Auth->allow();
		$this->guest_id = $this->Cookie->read('guest_id');
		$this->is_price =  $this->Session->read('arm_co');
	}

	/* new pages */
	public function home()
	{
		$this->set('title_for_layout', 'ARMYTRIX - Automotive Weaponized');
		$page_meta = array('des' => @$this->meta['des'], 'key' => $this->meta['keys']);
		$this->loadModel('VideoSlider');
		$data = $this->VideoSlider->find('all', ['order' => ['VideoSlider.position' => 'ASC']]);
		$this->set(compact('page_meta', 'data'));
	}

	public function product_exhaust()
	{
		$this->set('title_for_layout', 'Valvetronic Exhaust System Weaponzied by ARMYTRIX');
		$page_meta = [
			'des' => 'Best Sounding Aftermarket Exhaust Upgrades. Titanium & Stainless Steel Turbo-back Cat-Back Valvetronic Exhaust Downpipes Tips Headers Decat Test Straight Exhaust Sound',
			'key' => 'armytrix, exhaust, akrapovic, magnaflow, borla, supersprint,  remus, fiexhaust, ipe, milltek, цена, السعر, precio, preis, prix, обзор, مراجعة, Überprüfung, revisión, глушитель'
		];
		$this->set(compact('page_meta'));
	}



	public function product($id = null, $type = null)
	{
		$slider = $sliderSS = $slidersTT = [];
		$page_meta = $data = $gallery = $cat_back = $catalytic = null;

		$this->ItemDetail->bindModel(['belongsTo' => ['Brand', 'Model', 'Motor'], 'hasMany' => ['Video' => ['limit' => 15, 'order' => ['Video.pos' => 'ASC']]]], false);
		$data = $this->ItemDetail->find('first', array('recursive' => 2, 'conditions' => array('ItemDetail.url' => $id, 'ItemDetail.status' => 1)));
		$pid = null;
		$langArr = [];
		if ($data['ItemDetail']['language'] == 'eng') {
			$pid = $data['ItemDetail']['id'];
		} else {
			$pid = $data['ItemDetail']['item_detail_id'];
		}
		if (!empty($data)) {
			if ($data['ItemDetail']['language'] == 'eng') {
				$Adata = $data;
				$item_detail_id = $data['ItemDetail']['id'];
			} else {
				$Adata = $this->ItemDetail->find('first', array('recursive' => 2, 'conditions' => array('ItemDetail.id' => $data['ItemDetail']['item_detail_id'], 'ItemDetail.status' => 1)));
				$item_detail_id = $data['ItemDetail']['item_detail_id'];
			}

			if (!empty($pid)) {
				$allLang = $this->Language->find('list', ['fields' => ['code', 'language']]);
				if (!empty($allLang)) {
					$this->ItemDetail->bindModel(['hasMany' => ['ProLang' => [
						'className' => 'ItemDetail', 'foreignKey' => 'item_detail_id',
						'conditions' => ['ProLang.status' => 1, 'ProLang.url !=' => ''],
						'fields' => ['ProLang.id', 'ProLang.language', 'ProLang.status', 'ProLang.url']
					]]], false);

					$this->ItemDetail->unbindModel(['hasMany' => ['Video']]);
					$l_data = $this->ItemDetail->find('first', [
						'recursive' => 1,
						'conditions' => ['ItemDetail.id' => $pid, 'ItemDetail.status' => 1],
						'fields' => ['ItemDetail.id', 'ItemDetail.language', 'ItemDetail.status', 'ItemDetail.url']
					]);
					if (!empty($l_data['ProLang'])) {
						$langArr[($l_data['ItemDetail']['language'] == 'eng' ? "English" : $l_data['ItemDetail']['language'])] = $l_data['ItemDetail']['url'];
						foreach ($l_data['ProLang'] as $l) {
							$langArr[$allLang[$l['language']]] = $l['url'];
						}
					}
				}
			}

			$cat_back_ids = explode(',', $Adata['ItemDetail']['cat_back_ids']);
			$catalytic_ids = explode(',', $Adata['ItemDetail']['catalytic_ids']);
			$accessory_ids = explode(',', $Adata['ItemDetail']['accessory_ids']);
			$cat_back = $this->Product->find('all', array('conditions' => array('Product.id' => $cat_back_ids, 'Product.status' => 1)));
			$catalytic = $this->Product->find('all', array('conditions' => array('Product.id' => $catalytic_ids, 'Product.status' => 1)));
			$accessory = $this->Product->find('all', array('conditions' => array('Product.id' => $accessory_ids, 'Product.status' => 1)));

			$this->set('title_for_layout', $data['ItemDetail']['meta_title']);
			$page_meta = array('des' => $data['ItemDetail']['meta_description'], 'key' => $data['ItemDetail']['meta_keywords']);

			$sArr = explode(',', trim($Adata['ItemDetail']['slider']));
			if (isset($sArr[0]) && !empty($sArr[0])) {
				$slider = $this->Library->find('all', array('conditions' => array('Library.id' => $sArr), 'order' => ['Library.pos' => 'ASC']/* 'order'=>array('FIELD(Library.id,' . $data['ItemDetail']['slider'] . ')') */));
			}
			$gArr = explode(',', $Adata['ItemDetail']['gallery']);
			if (isset($gArr[0]) && !empty($gArr[0])) {
				$gallery = $this->Library->find('all', array('conditions' => array('Library.id' => $gArr), 'limit' => 15, 'order' => ['Library.pos' => 'ASC']));
			}
			$string = $this->String->find('list', array('order' => array('String.id' => 'ASC'), 'fields' => array('String.id', 'String.text')));
			$tran = $this->Translation->find('list', array('conditions' => array('Translation.code' => $data['ItemDetail']['language']), 'fields' => array('Translation.string_id', 'Translation.name')));
			$txt = array('String' => $string, 'Translation' => $tran);

			$this->set(compact('page_meta', 'data', 'Adata', 'txt', 'slider', 'gallery', 'cat_back', 'catalytic', 'accessory', 'langArr'));
		} else {
			$this->layout = '404';
		}
	}

	public function send_em()
	{
		$this->autoRender = false;
		if ($this->RequestHandler->isAjax() && !empty($this->data)) {
			$parameters = array('NAME' => $this->data['name'], 'EMAIL' => $this->data['email'], 'MESSAGE' => $this->data['msg']);
			$this->DATA->AppMail('inquiry@armytrix.com', 'FlashSale', $parameters, $dateTime = DATE);
			//$this->DATA->AppMail('inquiry@armytrix.com', 'FlashSale', $parameters,$dateTime = DATE);
			echo '<div class="alert alert-success" role="alert">send.</div>';
			echo "<script>$('#form-pop').remove(); $('.modal-backdrop').remove(); $('#frm_succ').show(); setTimeout(function(){ $('#frm_succ').fadeOut(); location.reload();}, 5000);</script>";
		}
	}

	public function view_dealer($id = null)
	{
		$this->loadModel('OurDealer');
		$this->OurDealer->bindModel(array('belongsTo' => array('Library')));
		$data = $this->OurDealer->find('first', array('conditions' => array('OurDealer.id' => $id, 'OurDealer.status' => 1)));
		$this->set(compact('data'));
	}
	public function our_dealers()
	{
		$this->set('title_for_layout', 'ARMYTRIX EXCLUSIVE DEALERS');
		$page_meta = [
			'des' => 'Where to Buy the ARMYTRIX Best Aftermarket Upgrades Titanium & Stainless Steel Turbo-back Cat-Back Valvetronic Exhaust System',
			'key' => 'armytrix, exhaust, akrapovic, magnaflow, borla, supersprint,  remus, fiexhaust, ipe, milltek, цена, السعر, precio, preis, prix, обзор, مراجعة, Überprüfung, revisión, глушитель'
		];
		$this->loadModel('OurDealer');
		$data = $this->OurDealer->find('all', array('limit' => 100, 'conditions' => array('OurDealer.status' => 1), 'order' => array('OurDealer.title' => 'ASC')));
		$co = $this->OurDealer->find('list', array('group' => array('OurDealer.country'), 'order' => array('OurDealer.country' => 'ASC'), 'fields' => array('id', 'country')));
		$this->set(compact('page_meta', 'data', 'co'));
	}

	public function dealer_membership()
	{
		$this->redirect('/');
		$this->set('title_for_layout', 'ARMYTRIX - Automotive Weaponized');
		$page_meta = array('des' => @$this->meta['des'], 'key' => $this->meta['keys']);
		$this->set(compact('page_meta'));
	}

	public function remove_pics()
	{
		$this->autoRender = false;
		if ($this->RequestHandler->isAjax() && !empty($this->data)) {
			if (isset($this->data['type']) && $this->data['type'] == 'youtube') {
				if (isset($this->data['url']) && !empty($this->data['url'])) {
					$parameters = array('URL' => $this->data['url'], 'DATE_TIME' => DATE);
					$this->DATA->AppMail('inquiry@armytrix.com', 'VideoUpload', $parameters, $dateTime = DATE);
					echo "<script>$('#video_file').val('');
					$('#v_err').html('<div class=\"alert alert-success\">Message send.</div>');</script>";
				}
			}
			if (isset($this->data['type']) && $this->data['type'] == 'remove') {
				$path = 'cdn/pics/' . $this->data['fl'] . '/' . $this->data['file'];
				try {
					unlink($path);
					echo "<script>$('#div_" . $this->data['id'] . "').remove();</script>";
				} catch (Exception $e) {
				}
			}
			if (isset($this->data['type']) && $this->data['type'] == 'em') {
				$directory = "cdn/pics/" . $this->data['fl'] . "/";
				$images = glob($directory . '*.*');
				if (!empty($images)) {
					$msg = null;
					foreach ($images as $image) {
						$p = SITEURL . $image;
						$msg .= "<b>File path :: </b> <a href='$p'>$p</a> <br>";
					}
					if (!empty($msg)) {
						$parameters = array('URL' => $msg, 'DATE_TIME' => DATE);
						$this->DATA->AppMail('inquiry@armytrix.com', 'PhotoUpload', $parameters, $dateTime = DATE);
						$v = rand(755589, 5478999);
						echo "<script>$('#img_name').html('');
							$('#pics_err').html('<div class=\"alert alert-success\">Photos has been send.</div>');
							$('#type').val($v);
							</script>";
					} else {
						echo '<div class="notification_error">Sorry, this is not working at the moment. Please try again later. </div>';
					}
				}
			}
		}
	}

	public function free()
	{
		$this->layout = '404';
		$this->set('title_for_layout', 'Gifts - Armytrix Performance Upgrades');
		$page_meta = array('des' => @$this->meta['des'], 'key' => $this->meta['keys']);
		$this->set(compact('page_meta'));
		if ($this->RequestHandler->isAjax() && !empty($this->data)) {
			$ab = null;
			$ex = array("jpg", "jpeg", "png");
			$is_not_img = $is_img = 0;
			if (!file_exists('cdn/pics/' . $this->data['Photo']['type'])) {
				mkdir('cdn/pics/' . $this->data['Photo']['type'], 0777, true);
			}
			foreach ($this->data['Photo']['files'] as $fl) {
				$ext = strtolower(pathinfo($fl['name'], PATHINFO_EXTENSION));
				if (in_array($ext, $ex)) {
					$is_img++;
				} else {
					$is_not_img++;
				}
			}
			if ($is_not_img > 0) {
				echo '<div class="alert alert-danger">Please upload only JPG/JPEG/PNG files.</div>';
			} else {
				foreach ($this->data['Photo']['files'] as $pics) {
					$id = rand(123, 987);
					$info = pathinfo($pics['name']);
					$ext = $info['extension']; // get the extension of the file
					$newname = $pics['name']; //"newname.".$ext;

					$target = 'cdn/pics/' . $this->data['Photo']['type'] . '/' . $newname;
					if (move_uploaded_file($pics['tmp_name'], $target)) {
						$ab .= '<span class="img-nm" id="div_' . $id . '">' . $newname . '<i data_path="' . $this->data['Photo']['type'] . '@' . $newname . '" class="rm" id="' . $id . '" onclick="rm(this.id)">X</i></span>';
					}
				}
				echo "<script>$('#img_name').append('$ab');</script>";
			}
			exit;
		}
	}


	public function api()
	{
		$this->autoRender = false;
		if (isset($this->request->query['url']) && !empty($this->request->query['url'])) {
			$u = urldecode($this->request->query('url'));
			$this->redirect($u);
		}
	}

	// Set the values and begin paypal process
	public function express_checkout($amt = null, $oid = null)
	{
		try {
			$this->Paypal->amount = $amt;
			$this->Paypal->currencyCode = 'USD';
			$this->Paypal->returnUrl = Router::url(array('controller' => 'payments', 'action' => 'payment_successful'), true);
			$this->Paypal->cancelUrl = Router::url(array('controller' => 'payments', 'action' => 'payment_cancelled'), true);
			$this->Paypal->orderDesc = 'ARMYTRIX - Automotive Weaponized';
			$this->Paypal->itemName = $oid;
			$this->Paypal->quantity = 1;
			return $this->Paypal->expressCheckout();
		} catch (Exception $e) {
			echo '<script>$("#_do_chk").prop("disabled",false); setTimeout(function(){ $("#preloader").hide(); }, 1000);</script>';
			echo '<div class="alert alert-danger">' . $e->getMessage() . '</div>';
			die;
		}
	}

	public function pro_checkout()
	{
		$this->autoRender = FALSE;
		if ($this->RequestHandler->isAjax()) {
			if (!empty($this->data)) {
				$s = '<script>$("#_do_chk").prop("disabled",false); setTimeout(function(){ $("#preloader").hide(); }, 1000);</script>';
				$ord = array();

				if (!in_array($this->data['payment_by'], array('paypal'))) {
					echo $s;
					echo '<div class="alert alert-danger">Please select Payment method.</div>';
					exit;
				}
				$token =  $this->DATA->getToken(16);
				$pro_total = 0;
				$pro_total = $this->data['total_amount'] + $this->data['warranty_extension'] + ($this->data['shipping_cost'] -  $this->data['discount']) + $this->data['import_duty'] + $this->data['vat'];
				if (num_2($this->data['grand_total']) !=  num_2($pro_total)) {
					echo $s;
					echo '<div class="alert alert-danger">Error. Please check out again.</div>';
					exit;
				}

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
				$c_data = $this->Cart->find('all', array('conditions' => array('Cart.guest_id' => $this->guest_id, 'Cart.id' => $cart_dis)));

				if (empty($c_data)) {
					echo $s;
					echo "<script>location.reload();</script>";
					echo '<div class="alert alert-danger">Please try again</div>';
					exit;
				}
				$ord_list = array();
				$ord['od_info'] = json_encode($this->data);

				if ($this->Order->save($ord)) {
					$oid = $this->Order->getLastInsertId();
					$o_id = $this->data['iso'] . "-" . date('mH', strtotime(DATE)) . $oid;
					$oarr = array('id' => $oid, 'order_number' => $o_id);
					$this->Order->save($oarr);
					$OrderHistoryArr = array('id' => null, 'order_id' => $oid, 'order_status_id' => 1, 'comment' => 'Order # ' . $o_id . ' has been successfully placed');
					$this->OrderHistory->save($OrderHistoryArr);
					if (!empty($c_data)) {
						foreach ($c_data as $cList) {
							$amt = $cList['Product']['price'];
							if ($cList['Product']['discount'] > 0) {
								$amt = $cList['Product']['price'] - ($cList['Product']['price'] * $cList['Product']['discount'] / 100);
							}
							$ord_list[] = array(
								'id' => null, 'order_id' => $oid, 'product_id' => $cList['Product']['id'], 'quantity' => $cList['Cart']['quantity'], 'amount' => $amt,
								'is_gift' => 0, 'size' => $cList['Cart']['size']
							);
						}
					}
					if (!empty($ord_list)) {
						$this->OrderItem->saveMany($ord_list);
					}
					if ($this->data['payment_by'] == 'paypal') {
						$url  = $this->express_checkout($ord['grand_total'], $o_id);
						echo '<div class="alert alert-success">Please wait while redirecting to paypal...</div>';
						echo "<script>$('#_do_chk').remove(); setTimeout(function(){ window.location.href ='" . $url . "'; }, 500);</script>";
						exit;
					} else {
						echo $s;
						echo '<div class="alert alert-danger">Error. please try again</div>';
						exit;
					}
				}
			}
			exit;
		}
	}

	public function inq()
	{
	}
	public function cart()
	{
		$this->set('title_for_layout', 'Shopping Cart');
		if (isset($this->is_price['RstrictedCountry']) && $this->is_price['RstrictedCountry'] == 1) {
			$c_data = $this->Cart->find('all', ['conditions' => ['Cart.guest_id' => $this->guest_id]]);
			$cart_id = [];
			if (!empty($c_data)) {
				foreach ($c_data as $al) {
					if (in_array($al['Product']['type'], [1, 2, 3, 5])) {
						$cart_id[] = $al['Cart']['id'];
					}
				}
				if (!empty($cart_id)) {
					$this->Cart->deleteAll(['Cart.id' => $cart_id], false);
				}
			}
		}
		$all_pro = $this->Cart->find('all', array('recursive' => 2, 'conditions' => array('Cart.guest_id' => $this->guest_id)));
		$this->set(compact('all_pro'));
	}

	public function do_checkout()
	{
		$this->autoRender = false;
		if ($this->RequestHandler->isAjax()) {
			if (!empty($this->data)) {
				$checkOutArr = $this->data;
				$this->Session->write('checkOutArr', $checkOutArr);
				$u = SITEURL . "check_out";
				echo "<script>$('#preloader').show(); setTimeout(function(){ window.location.href ='" . $u . "'; }, 500);</script>";
			}
		}
	}

	public function check_out()
	{
		if ($this->RequestHandler->isAjax() && !empty($this->data)) {
			$s = '<script>$("#_do_chk").prop("disabled",false); setTimeout(function(){ $("#preloader").hide(); }, 1000);</script>';
			$cname = $this->DATA->GetWorldNameNew($this->request->data['Order']['country_list_id']);
			if (isset($cname['CountryList']['short_name']) && !empty($cname['CountryList']['short_name'])) {
				$this->request->data['Order']['shipping_country'] = $cname['CountryList']['short_name'];
			}

			$country_list = $this->CountryList->find('first', ['conditions' => ['CountryList.id' => $this->request->data['Order']['country_list_id']]]);
			$new_pid = $new_cart_dis = null;
			if (isset($country_list['CountryList']['region']) && in_array($country_list['CountryList']['region'], [2])) {
				$c_data = $this->Cart->find('all', array('conditions' => array('Cart.guest_id' => $this->guest_id)));
				if (!empty($c_data)) {
					foreach ($c_data as $al) {
						if (in_array($al['Product']['type'], [1, 2, 3, 5])) {
							$this->Cart->id = $al['Cart']['id'];
							$this->Cart->delete();
						} else {
							$new_cart_dis[] = $al['Cart']['id'];
							$new_pid[] = $al['Cart']['product_id'];
						}
					}
				}
			}
			if (!empty($new_cart_dis)) {
				$this->request->data['cid'] = implode(',', $new_cart_dis);
			}
			if (!empty($new_pid)) {
				$this->request->data['pid'] = implode(',', $new_pid);
			}

			$shipping = $this->data;
			$this->Session->write('shipping', $shipping);
			$u = SITEURL . "pages/review/";
			echo "<script> window.location.href ='" . $u . "'; </script>";
			exit;
		}
		$this->set('title_for_layout', 'Check Out : Armytrix');
		$shipping = $this->Session->read('shipping');
		$checkOutArr = $this->Session->read('checkOutArr');
		$WebSetting = $this->WebSetting->find('first', array('WebSetting.id' => 1));
		$this->set(compact('WebSetting', 'checkOutArr', 'shipping'));
	}

	public function review()
	{
		$this->set('title_for_layout', 'Review : Armytrix');
		$all_pro = null;
		$checkOutArr = $this->Session->read('checkOutArr');
		$shipping = $this->Session->read('shipping');
		$WebSetting = $this->WebSetting->find('first', array('WebSetting.id' => 1));
		//ec($checkOutArr); ec($shipping);

		if (empty($checkOutArr) && empty($shipping)) {
			$this->render('no_country');
		} else {
			$country_list = $this->CountryList->find('first', ['conditions' => ['CountryList.id' => $shipping['Order']['country_list_id']]]);
			if (empty($country_list)) {
				$this->render('no_country');
			}

			if (isset($country_list['CountryList']['region']) &&  isset($shipping['Order']['country_list_id']) && !empty($shipping['Order']['country_list_id'])) {

				if (in_array($country_list['CountryList']['region'], [1])) {
					$all_pro = $this->Cart->find('all', array('recursive' => 2, 'conditions' => array('Cart.guest_id' => $this->guest_id)));
					$this->set(compact('WebSetting', 'checkOutArr', 'shipping', 'country_list', 'all_pro'));
				} elseif ($country_list['CountryList']['region'] == 2) {
					/* Remove other product if no-price */
					$c_data = $this->Cart->find('all', array('conditions' => array('Cart.guest_id' => $this->guest_id)));
					if (!empty($c_data)) {
						foreach ($c_data as $al) {
							if (in_array($al['Product']['type'], [1, 2, 3, 5])) {
								$this->Cart->id = $al['Cart']['id'];
								$this->Cart->delete();
							} else {
								$new_cart_dis[] = $al['Cart']['id'];
								$new_pid[] = $al['Cart']['product_id'];
							}
						}
					}
					$shipping['cid'] = $shipping['pid'] = null;
					if (!empty($new_cart_dis)) {
						$shipping['cid'] = implode(',', $new_cart_dis);
						$all_pro = $this->Cart->find('all', array('recursive' => 2, 'conditions' => array('Cart.guest_id' => $this->guest_id)));
					} else {
						$this->render('no_country');
					}
					if (!empty($new_pid)) {
						$shipping['pid'] = implode(',', $new_pid);
					}
					$this->Session->write('shipping', $shipping);
					$this->set(compact('WebSetting', 'checkOutArr', 'shipping', 'country_list', 'all_pro'));
				} else {
					$this->render('no_country');
				}
			} else {
				$this->render('no_country');
			}
		}
	}

	public function order($id = null, $t = null)
	{
		$this->set('title_for_layout', 'Order status : ARMYTRIX - Automotive Weaponized');
		$this->Order->bindModel(array('hasMany' => array('OrderItem')), false);
		$this->OrderItem->bindModel(array('belongsTo' => array('Product')), false);
		$data = $this->Order->find('first', ['recursive' => 3, 'conditions' => ['Order.order_number' => $t]]);
		if (!empty($data)) {
			$this->set(compact('id', 't', 'data'));
		} else {
			$this->layout = '404';
		}
	}

	public function check_promo()
	{
		$this->autoRender = false;
		if ($this->RequestHandler->isAjax()) {
			if (!empty($this->data)) {
				$sb = "<script> $('#promo_code').val(''); $('#dis_promo').val('0'); $('#_discount').html('$0'); $('#gt_total').val('" . $this->data['amt'] . "');
								$('#_gt').html('$" . $this->data['amt'] . "'); $('#ap_promo').val('Apply'); </script>";
				$chk_promo = $this->PromoCode->find('first', array('conditions' => array('PromoCode.code' => trim($this->data['promo']), 'PromoCode.status' => 1)));
				if (!empty($chk_promo)) {
					$exp_date = date("Y-m-d H:i:s", strtotime("+" . $chk_promo['PromoCode']['days'] . " day", strtotime($chk_promo['PromoCode']['created'])));
					if (strtotime(DATE) > strtotime($exp_date)) {
						echo $sb;
						echo "<div class='alert alert-danger'>Coupon is either invalid, expired or reached its usage limit!</div>";
						exit;
					} else {
						if ($this->data['amt'] < $chk_promo['PromoCode']['min_amount']) {
							echo $sb;
							echo "<div class='alert alert-danger'>Coupon code applicable only for minimum purchase amount $" . $chk_promo['PromoCode']['min_amount'] . "</div>";
						} else {
							$gt_total = $this->data['amt'] - $chk_promo['PromoCode']['discount'];
							if ($gt_total < 0) {
								$gt_total = 0;
							}
							echo "<script>
								$('#promo_code').val('" . trim($this->data['promo']) . "');
								$('#dis_promo').val('" . $chk_promo['PromoCode']['discount'] . "');
								$('#_discount').html('$" . $chk_promo['PromoCode']['discount'] . "');
								$('#gt_total').val('" . $gt_total . "');
								$('#_gt').html('$" . $gt_total . "');
								$('#ap_promo').val('Applied');
								</script>";
						}
					}
				} else {
					echo $sb;
					echo "<div class='alert alert-danger'>Coupon is either invalid, expired or reached its usage limit!</div>";
				}
			}
		}
	}

	public function extra_product($id = null)
	{
		$this->set('title_for_layout', 'ARMYTRIX MERCHANDISE');
		$page_meta = $data = $pics = null;
		$page_meta = [
			'des' => 'We ExciteYourLife. Shop for Your Merchandise to join TEAM ARMYTRIX. Be Weaponized, LiveLifeLoud.',
			'key' => 'armytrix, exhaust, akrapovic, magnaflow, borla, supersprint,  remus, fiexhaust, ipe, milltek, цена, السعر, precio, preis, prix, обзор, مراجعة, Überprüfung, revisión, глушитель'
		];
		if (!empty($id)) {
			$data = $this->Product->find('first', array('recursive' => -1, 'conditions' => array('Product.slug' => $id, 'Product.status' => 1)));
			if (!empty($data)) {
				if (!empty($data['Product']['extra_photos'])) {
					$mid = explode(',', $data['Product']['extra_photos']);
					$pics = $this->Library->find('all', array('conditions' => array('Library.id' => $mid)));
				}
			} else {
				$this->layout = '404';
			}
			$this->set(compact('page_meta', 'data', 'pics'));
			$this->render('extra_product_details');
		} else {
			$data = $this->Product->find('all', array('recursive' => -1, 'conditions' => array('Product.type' => 4, 'Product.status' => 1), 'order' => ['Product.price' => 'DESC', 'Product.quantity' => 'DESC'], 'limit' => 50));
			$this->set(compact('page_meta', 'data', 'pics'));
		}
	}

	public function update_cart()
	{
		$this->autoRender = false;
		if ($this->RequestHandler->isAjax()) {
			if (!empty($this->data)) {
				if ($this->data['type'] == 'rm') {
					if ($this->data['ty'] == 1) {
						$this->Cart->id = $this->data['cid'];
						$this->Cart->delete();
					} elseif ($this->data['ty'] == 2) {
						$arr = array('id' => $this->data['cid'], 'type' => 2);
						$this->Cart->save($arr);
					}
				} elseif ($this->data['type'] == 'update') {
					$getCart = $cnd = array();
					/* if user is not log in */
					$cnd = array('Cart.guest_id' => $this->guest_id, 'Cart.id' => $this->data['cid']);

					if (!empty($cnd)) {
						$getCart = $this->Cart->find('first', array('recursive' => -1, 'conditions' => $cnd));
					}
					if (!empty($getCart)) {
						$cQ = $this->Product->find('first', array('recursive' => -1, 'conditions' => array('Product.id' => $getCart['Cart']['product_id'])));
						if (!empty($cQ)) {
							if ($cQ['Product']['quantity'] >= $this->data['qt']) {
								$arr = array('id' => $getCart['Cart']['id'], 'quantity' => $this->data['qt']);
								$this->Cart->save($arr);
							}
						}
					}
				}
			}
		}
	}

	public function add_to_cart()
	{
		$this->layout = false;
		$this->autoRender = false;
		if ($this->RequestHandler->isAjax()) {
			$str = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-cart-check-fill" viewBox="0 0 16 16"><path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm-1.646-7.646-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L8 8.293l2.646-2.647a.5.5 0 0 1 .708.708z"/></svg>';
			if (!empty($this->data)) {
				if ($this->data['get'] == 'product') {
					$get_pro = $this->Product->find('first', array('conditions' => array('Product.id' => $this->data['pid'], 'Product.status' => 1)));
					if (!empty($get_pro)) {
						$c = $getCartData = [];
						$c = array('Cart.guest_id' => $this->guest_id, 'Cart.product_id' => $this->data['pid'], 'Cart.type' => 1);
						if (!empty($c)) {
							$getCartData = $this->Cart->find('first', array('conditions' => array($c)));
						}
						if (empty($getCartData)) {
							$arr = array('product_id' => $this->data['pid'], 'guest_id' => $this->guest_id, 'quantity' => $this->data['q']);
							if (isset($this->data['size'])) {
								$arr['size'] = $this->data['size'];
							}
							$this->request->data['Cart'] = $arr;
							$this->Cart->save($this->request->data);
						}
					}
					$cnd = array('Cart.guest_id' => $this->guest_id);
					if (!empty($cnd)) {
						$getAll = $this->Cart->find('all', array('recursive' => 2, 'conditions' => $cnd));
					}
					$this->set('getAll', $getAll);

					echo "<script>$('#_cart_icon').html('$str');</script>";
					$this->render('cart_list');
				} elseif ($this->data['get'] == 'exhaust') {
					/* save cat-back product */
					if (!empty($this->data['cat_id'])) {
						$cat_pro = $this->Product->find('first', array('conditions' => array('Product.id' => $this->data['cat_id'], 'Product.status' => 1)));
						if (!empty($cat_pro)) {
							$c1 = $getCartData1 = array();
							$c1 = array('Cart.guest_id' => $this->guest_id, 'Cart.product_id' => $this->data['cat_id'], 'Cart.type' => 1);
							if (!empty($c1)) {
								$getCartData1 = $this->Cart->find('first', array('conditions' => array($c1)));
							}
							if (empty($getCartData1)) {
								$arr = array('id' => null, 'product_id' => $this->data['cat_id'], 'guest_id' => $this->guest_id, 'quantity' => $this->data['cat_id_q']);
								$this->request->data['Cart'] = $arr;
								$this->Cart->save($this->request->data);
							}
						}
					}
					/* save cata product */
					if (!empty($this->data['ecu_id'])) {
						$cata_pro = $this->Product->find('first', array('conditions' => array('Product.id' => $this->data['ecu_id'], 'Product.status' => 1)));
						if (!empty($cata_pro)) {
							$c2 = $getCartData2 = array();
							$c2 = array('Cart.guest_id' => $this->guest_id, 'Cart.product_id' => $this->data['ecu_id'], 'Cart.type' => 1);

							if (!empty($c2)) {
								$getCartData2 = $this->Cart->find('first', array('conditions' => array($c2)));
							}
							if (empty($getCartData2)) {
								$arr = array('id' => null, 'product_id' => $this->data['ecu_id'], 'guest_id' => $this->guest_id, 'quantity' => $this->data['ecu_id_q']);
								$this->request->data['Cart'] = $arr;
								$this->Cart->save($this->request->data);
							}
						}
					}

					/* save tuning product */
					if (!empty($this->data['accessory_id'])) {
						$t_pro = $this->Product->find('first', array('conditions' => array('Product.id' => $this->data['accessory_id'], 'Product.status' => 1)));
						if (!empty($t_pro)) {
							$c3 = array();
							$getCartData3 = 0;
							$c3 = array('Cart.guest_id' => $this->guest_id, 'Cart.product_id' => $this->data['accessory_id'], 'Cart.type' => 1);

							if (!empty($c3)) {
								$getCartData3 = $this->Cart->find('count', array('conditions' => array($c3)));
							}
							if ($getCartData3 == 0) {
								$arr = array('id' => null, 'product_id' => $this->data['accessory_id'], 'guest_id' => $this->guest_id, 'quantity' => $this->data['accessory_b_q']);
								$arrdata['Cart'] = $arr;
								$this->Cart->save($arrdata);
							}
						}
					}
					$cnd = [];
					$cnd = array('Cart.guest_id' => $this->guest_id, 'Cart.type' => 1);

					if (!empty($cnd)) {
						$getAll = $this->Cart->find('all', array('recursive' => 2, 'conditions' => $cnd));
					}
					echo "<script>$('#_cart_icon').html('$str');</script>";
					$this->set('getAll', $getAll);
					$this->render('cart_list');
				}
			}
		}
	}

	public function t_and_c()
	{
		$this->set('title_for_layout', 'Terms and Conditions');
		$page_meta = array('des' => @$this->meta['des'], 'key' => $this->meta['keys']);
		$this->set(compact('page_meta'));
	}

	public function terms_and_conditions()
	{
		$this->set('title_for_layout', 'Terms and Conditions of Use');
		$page_meta = array('des' => @$this->meta['des'], 'key' => $this->meta['keys']);
		$this->set(compact('page_meta'));
	}
	public function exhaust()
	{
		$this->set('title_for_layout', 'ARMYTRIX EXHAUST SYSTEM');
		$page_meta = [
			'des' => 'Following the Creed of Providing the Best Joy of Driving, Power and Versatility, ARMYTRIX offers the Best Performance Parts for Automotive. We ExciteYourLife',
			'key' => 'armytrix, exhaust, akrapovic, magnaflow, borla, supersprint,  remus, fiexhaust, ipe, milltek, цена, السعر, precio, preis, prix, обзор, مراجعة, Überprüfung, revisión, глушитель'
		];
		$this->set(compact('page_meta'));
	}


	public function message($id = null)
	{
		$t = null;
		if ($id == 'register') {
			$t = 'Your Account Has Been Created!';
		}
		$this->set('title_for_layout', $t);
		$page_meta = array('des' => @$this->meta['des'], 'key' => $this->meta['keys']);
		$this->set(compact('page_meta', 'id'));
	}

	public function warranty()
	{
		$this->set('title_for_layout', 'ARMYTRIX WARRANTY & RETURN POLICY');
		$page_meta = [
			'des' => 'ARMYTRIX CORP. Warrants its Products to be Free of all Defects in Material and Workmanship. Warranty Extends only to the Original Buyer and is Not Transferable',
			'key' => 'armytrix, exhaust, akrapovic, magnaflow, borla, supersprint,  remus, fiexhaust, ipe, milltek, цена, السعر, precio, preis, prix, обзор, مراجعة, Überprüfung, revisión, глушитель'
		];
		$this->set(compact('page_meta'));
	}

	public function questions()
	{
		$this->set('title_for_layout', 'Questions - Armytrix Performance Upgrades');
		$page_meta = array('des' => @$this->meta['des'], 'key' => $this->meta['keys']);
		$this->set(compact('page_meta'));
	}


	public function technology()
	{
		$this->set('title_for_layout', 'ARMYTRIX VALVETRONIC TECHNOLOGY');
		$page_meta = [
			'des' => 'Valvetronic is built to offer tremendous functionality to daily drive. No longer to pick between explosive exhaust audio or playing-it-safe stock settings.',
			'key' => 'armytrix, exhaust, akrapovic, magnaflow, borla, supersprint,  remus, fiexhaust, ipe, milltek, цена, السعر, precio, preis, prix, обзор, مراجعة, Überprüfung, revisión, глушитель'
		];
		$this->set(compact('page_meta'));
	}

	public function testimonial()
	{
		$this->set('title_for_layout', 'Testimonial - Armytrix Performance Upgrades');
		$page_meta = array('des' => @$this->meta['des'], 'key' => $this->meta['keys']);
		$this->set(compact('page_meta'));
	}

	public function featured_video()
	{
		$this->set('title_for_layout', 'ARMYTRIX MOVIE');
		$page_meta = [
			'des' => 'Following the Creed of Providing the Best Joy of Driving, Power and Versatility, ARMYTRIX offers the Best Performance Parts for Automotive. We ExciteYourLife',
			'key' => 'armytrix, exhaust, akrapovic, magnaflow, borla, supersprint,  remus, fiexhaust, ipe, milltek, цена, السعر, precio, preis, prix, обзор, مراجعة, Überprüfung, revisión, глушитель'
		];
		$this->set(compact('page_meta'));
	}

	public function dealer()
	{
		$this->set('title_for_layout', 'Authorized Dealers - Armytrix Performance Upgrades');
		$page_meta = array('des' => @$this->meta['des'], 'key' => $this->meta['keys']);
		$this->set(compact('page_meta'));
	}

	public function tuning_search()
	{

		$this->set('title_for_layout', 'ECU Tuning - Armytrix Exhaust | ECU Tuning | Power Box | OBD-II Scanner');
		$page_meta = array('des' => @$this->meta['des'], 'key' => $this->meta['keys']);
		$b = $this->Brand->find('list', array('order' => array('Brand.name' => 'ASC')));
		$this->set(compact('page_meta', 'b'));
	}

	public function get_for()
	{
		$this->autoRender = false;
		if ($this->RequestHandler->isAjax() && !empty($this->data)) {
			if ($this->data['type'] == 'car') {
				$str1 = '<option value="">Select Model</option>';
				$str2 = '<option value="">Select Engine</option>';
				if (isset($this->data['make_id']) && !empty($this->data['make_id'])) {
					$mList = $this->ItemDetail->find('list', ['conditions' => ['ItemDetail.status' => 1, 'ItemDetail.brand_id' => $this->data['make_id']], 'fields' => ['ItemDetail.id', 'ItemDetail.model_id']]);
					if (!empty($mList)) {
						$mList = array_unique($mList);
						$getModel = $this->Model->find('list', ['conditions' => ['Model.id' => $mList, 'Model.brand_id' => $this->data['make_id'], 'Model.status' => 1], 'fields' => ['Model.id', 'Model.name']]);
						if (!empty($getModel)) {
							foreach ($getModel as $k => $v) {
								$ttt = str_replace("'", "\'", $v);
								$str1 .= '<option value="' . $k . '">' . htmlspecialchars($ttt) . '</option>';
							}
						}
						echo "<script>$('#".$this->data['target_id']."').html('$str1');</script>";
					}
				} elseif (isset($this->data['model_id']) && !empty($this->data['model_id'])) {
					$pList = $this->ItemDetail->find('list', ['conditions' => ['ItemDetail.status' => 1, 'ItemDetail.model_id' => $this->data['model_id']], 'fields' => ['ItemDetail.id', 'ItemDetail.motor_id']]);
					if (!empty($pList)) {
						$pList = array_unique($pList);
						$getMotor = $this->Motor->find('list', ['conditions' => ['Motor.id' => $pList, 'Motor.model_id' => $this->data['model_id'], 'Motor.status' => 1]]);
						if (!empty($getMotor)) {
							foreach ($getMotor as $k => $v) {
								$ttt = str_replace("'", "\'", $v);
								$str2 .= '<option value="' . $k . '">' . htmlspecialchars($ttt) . '</option>';
							}
						}
						echo "<script>$('#".$this->data['target_id']."').html('$str2');</script>";
					}
				}
			} elseif ($this->data['type'] == 'motorcycle') {
				$str1 = '<option value="">Select Model</option>';
				$str2 = '<option value="">Select Year</option>';
				if (isset($this->data['make_id']) && !empty($this->data['make_id'])) {
					$mList = $this->Motorcycle->find('list', ['conditions' => ['Motorcycle.status' => 1, 'Motorcycle.motorcycle_make_id' => $this->data['make_id']], 'fields' => ['Motorcycle.id', 'Motorcycle.motorcycle_model_id']]);
					if (!empty($mList)) {
						$mList = array_unique($mList);
						$getModel = $this->MotorcycleModel->find('list', ['conditions' => ['MotorcycleModel.id' => $mList, 'MotorcycleModel.motorcycle_make_id' => $this->data['make_id'], 'MotorcycleModel.status' => 1], 'fields' => ['MotorcycleModel.id', 'MotorcycleModel.name']]);
						if (!empty($getModel)) {
							foreach ($getModel as $k => $v) {
								$ttt = str_replace("'", "\'", $v);
								$str1 .= '<option value="' . $k . '">' . htmlspecialchars($ttt) . '</option>';
							}
						}
						echo "<script>$('#".$this->data['target_id']."').html('$str1');</script>";
					}
				}elseif (isset($this->data['model_id']) && !empty($this->data['model_id'])) {
					$pList = $this->Motorcycle->find('list', ['conditions' => ['Motorcycle.status' => 1, 'Motorcycle.motorcycle_model_id' => $this->data['model_id']], 'fields' => ['Motorcycle.id', 'Motorcycle.motorcycle_year_id']]);
					if (!empty($pList)) {
						$pList = array_unique($pList);
						$getYear = $this->MotorcycleYear->find('all', ['conditions' => ['MotorcycleYear.id' => $pList, 'MotorcycleYear.motorcycle_model_id' => $this->data['model_id'], 'MotorcycleYear.status' => 1]]);
						if (!empty($getYear)) {
							foreach ($getYear as $year) {
								$ttt = $year['MotorcycleYear']['year_from']." - ".(!empty($year['MotorcycleYear']['year_to']) ? $year['MotorcycleYear']['year_to'] : 'persent');
								$str2 .= '<option value="' .$year['MotorcycleYear']['id']. '">' . htmlspecialchars($ttt) . '</option>';
							}
						}
						echo "<script>$('#".$this->data['target_id']."').html('$str2');</script>";
					}
				}
			}
		}
	}


	public function get_exhaust()
	{
		$this->autoRender = false;
		if ($this->RequestHandler->isAjax()) {
			if (!empty($this->data)) {
				/* get product based on brand and model*/
				if (isset($this->data['get']) && $this->data['get'] == 'product' && $this->data['type'] == 'brand' && isset($this->data['id'])) {
					$a = null;
					$str1 = '<option value="">Select Model</option>';
					$str2 = '<option value="">Select Engine</option>';
					if (!empty($this->data['id'])) {
						$mID = array();
						$mList = $this->ItemDetail->find('list', array('conditions' => array('ItemDetail.status' => 1, 'OR' => array('ItemDetail.cat_back_ids IS NOT NULL', 'ItemDetail.catalytic_ids IS NOT NULL')), 'group' => array('ItemDetail.model_id'), 'fields' => array('ItemDetail.id', 'ItemDetail.model_id')));
						if (!empty($mList)) {
							foreach ($mList as $k => $l) {
								$mID[] = $l;
							}
						}
						$bid = array();
						$result1 = $this->Model->find('all', array(
							'conditions' => array('Model.id' => $mID, 'Model.brand_id' => $this->data['id'], 'Model.status' => 1),
							'order' => array('Model.pos' => 'ASC', 'Model.name' => 'ASC')
						));
						if (!empty($result1)) {
							foreach ($result1 as $list) {
								$str1 .= '<option value="' . $list['Model']['id'] . '">' . htmlspecialchars($list['Model']['name']) . '</option>';
							}
						}
					}
					echo "<script>$('#model').html('$str1');</script>";
					echo "<script>$('#motor').html('$str2');</script>";
				}
				if (isset($this->data['get']) && $this->data['get'] == 'product' && $this->data['type'] == 'model' && isset($this->data['id'])) {
					$a = null;
					$str1 = '<option value="">Select Engine</option>';
					if (!empty($this->data['id'])) {
						$q1 = array();
						$mList = $this->ItemDetail->find('list', array('conditions' => array('ItemDetail.status' => 1, 'ItemDetail.model_id' => $this->data['id'], 'OR' => array('ItemDetail.cat_back_ids IS NOT NULL', 'ItemDetail.catalytic_ids IS NOT NULL')), 'group' => array('ItemDetail.motor_id'), 'fields' => array('ItemDetail.id', 'ItemDetail.motor_id')));
						if (!empty($mList)) {
							foreach ($mList as $k => $l) {
								$q1[] = $l;
							}
						}
						$result1 = $this->Motor->find('all', array('conditions' => array('Motor.id' => $q1, 'Motor.model_id' => $this->data['id'], 'Motor.status' => 1)));
						if (!empty($result1)) {
							foreach ($result1 as $list) {
								$ttt = str_replace("'", "\'", $list['Motor']['name']);
								$str1 .= '<option value="' . $list['Motor']['id'] . '">' . htmlspecialchars($ttt) . '</option>';
							}
						}
					}
					echo "<script>$('#motor').html('$str1');</script>";
				}
				if (isset($this->data['get']) && $this->data['get'] == 'product' && $this->data['type'] == 'motor' && isset($this->data['id'])) {
					$r_co = $this->Session->read('arm_co');
					$all = array();
					$this->ItemDetail->bindModel(array('belongsTo' => array('Motor')));
					$this->Product->bindModel(array('belongsTo' => array('Brand', 'Model', 'Motor')));
					$getPro = $this->ItemDetail->find('first', array('recursive' => 2, 'conditions' => array(
						'ItemDetail.motor_id' => $this->data['id'],
						'ItemDetail.brand_id' => $this->data['brand'], 'ItemDetail.model_id' => $this->data['model']
					)));
					if (!empty($getPro)) {
						$cat_id = explode(',', $getPro['ItemDetail']['cat_back_ids']);
						$cata_id = explode(',', $getPro['ItemDetail']['catalytic_ids']);
						$all_cat = $this->Product->find('all', array('conditions' => array('Product.id' => $cat_id, 'Product.status' => 1)));
						$all_pro = $this->Product->find('all', array('conditions' => array('Product.id' => $cata_id, 'Product.status' => 1)));
						$tag = null;
						if (isset($getPro['Motor']['Library']['full_path']) && !empty($getPro['Motor']['Library']['full_path'])) {
							$img = new_show_image('cdn/' . @$getPro['Motor']['Library']['full_path'], 360, 240, 100, 'ff', null);
							$tag = '<img src="' . $img . '" alt="' . @$getPro['Motor']['Library']['alt'] . '" title="' . @$getPro['Motor']['Library']['title'] . '" >';
						}
						echo "<script> $('#car_pic').html('" . $tag . "'); $('#title_d').html('" . addslashes($getPro['ItemDetail']['name']) . "'); </script>";
						$t = $s = 0;
						if (!empty($all_cat)) {
							foreach ($all_cat as $cList) {
								if ($cList['Product']['material'] == 'titanium') {
									$t++;
								} elseif ($cList['Product']['material'] == 'stainless steel') {
									$s++;
								}
							}
						}
						if (!empty($all_pro)) {
							foreach ($all_pro as $c1List) {
								if ($c1List['Product']['material'] == 'titanium') {
									$t++;
								} elseif ($c1List['Product']['material'] == 'stainless steel') {
									$s++;
								}
							}
						}
						$list1 = null;
						if (!empty($all_cat)) {
							$d_n = 1;
							foreach ($all_cat as $aList) {
								$mat_type =  $p_price = $type = null;
								$href = 'javascript:void(0);';
								$pImg = new_show_image('cdn/no_image_available.jpg', 270, 180, 100, 'ff', null);
								$realImg = SITEURL . 'cdn/no_image_available.jpg';
								if (in_array($aList['Product']['type'], array(2, 3, 5)) && isset($getPro['ItemDetail']['url']) && !empty($getPro['ItemDetail']['url'])) {
									$href = SITEURL . "product/" . $getPro['ItemDetail']['url'];
								} else {
									$href = 'javascript:void(0);';
								}

								if (isset($aList['Product']['material'])) {
									if ($aList['Product']['material'] == 'stainless steel') {
										$mat_type = '<li class="stainless_steel"><a>Stainless steel</a></li>';
									} elseif ($aList['Product']['material'] == 'titanium') {
										$mat_type = '<li class="titanium"><a>Titanium</a></li>';
										if ($t > 0 && $s > 0) {
											$type = '/ti';
										}
									}
								}

								if ($aList['Product']['type'] == 1) {
									$href = SITEURL . "collections/products/" . $aList['Product']['slug'];
									$ima = json_decode($aList['Product']['images'], true);
									$pImg = new_show_image('cdn/cdnimg/' . $ima[0], 270, 180, 100, 'ff', null);
									$realImg = SITEURL . 'cdn/cdnimg/' . $ima[0];
								} else {
									if (isset($aList['Library']['full_path']) && !empty($aList['Library']['full_path'])) {
										$pImg = new_show_image('cdn/' . $aList['Library']['full_path'], 270, 180, 100, 'ff', null);
										$realImg = SITEURL . 'cdn/' . $aList['Library']['full_path'];
									}
								}

								$href = $href . $type;
								if ($aList['Product']['quantity'] > 0) {
									if (isset($r_co['RstrictedCountry']) && $r_co['RstrictedCountry'] == 1) {
										$btn = '<a href="' . $href . '" target="_blank" title="inquiry" class="btn btn-success ful-wd-btn">Inquiry</a>';
										$p_price = null;
									} else {
										$btn = '<input value="add to cart" class="btn btn-success ful-wd-btn" onclick="add_pro(' . $aList['Product']['id'] . ')" type="button">';
										if ($aList['Product']['discount'] > 0) {
											$p1 = $aList['Product']['price'] -  ($aList['Product']['price'] * $aList['Product']['discount'] / 100);
											$p_price = "Price: USD <strike>$" . num_2($aList['Product']['price']) . "</strike> <spam class=\'text-danger\'>$" . num_2($p1) . "</spam>";
										} else {
											$p_price = "Price: USD $" . num_2($aList['Product']['price']);
										}
										if ($aList['Product']['preorder'] > 0) {
											$p_price .= " <span class=\'text-danger\'> Pre-order available </span>";
										}
									}
								} else {
									if (isset($r_co['RstrictedCountry']) && $r_co['RstrictedCountry'] == 1) {
										$p_price = null;
									} else {
										if ($aList['Product']['discount'] > 0) {
											$p1 = $aList['Product']['price'] -  ($aList['Product']['price'] * $aList['Product']['discount'] / 100);
											$p_price = "Price: USD <strike>$" . num_2($aList['Product']['price']) . "</strike> <spam class=\'text-danger\'>$" . num_2($p1) . "</spam>";
										} else {
											$p_price = "Price: USD $" . num_2($aList['Product']['price']);
										}
										if ($aList['Product']['preorder'] > 0) {
											$p_price .= " <span class=\'text-danger\'> Pre-order available </span>";
										}
									}
									$btn = '<input value="Out of Stock" class="hasIcon shortcode_button btn btn_type4 w100" type="button">';
									//$p_price = null;
								}
								$abc_name = $aList['Model']['name'] . "/" . $aList['Motor']['name'];
								$ttt1 = str_replace("'", "\'", $abc_name);
								$list1 .= '<div class=" item-bx-arm"><div class="mx-wd"><div class="col-sm-4"><div class="img-pro"> <a href="' . $href . '" target="_blank" class="thumbnail"><img src="' . $pImg . '" title="' . $aList['Library']['title'] . '" alt="' . $aList['Library']['alt'] . '"/><span><img src="' . $realImg . '" ></span></a> </div></div><div class="col-sm-8"><div class="exaust-cntnt"><div class="featrs-txt"> <a href="' . $href . '" target="_blank"><h3>' . $ttt1 . '</h3><p>' . substr($aList['Product']['title'], 0, 145) . '</p></a> </div><div class="ptxt">' . $p_price . '</div><div class="buton-bottm"><ul class="metal-type"><li><a>' . substr($aList['Product']['part'], 0, 15) . '</a></li>' . $mat_type . '</ul><div class="add-cart-btn">' . $btn . '</div></div></div><div class="clearfix"></div></div></div></div>';
								$d_n++;
							}
						}
						$list = null;
						if (!empty($all_pro)) {
							$d_n = 1;
							foreach ($all_pro as $aList) {
								$mat_type = null;
								$p_price = null;
								$href = 'javascript:void(0);';
								$pImg = new_show_image('cdn/no_image_available.jpg', 270, 180, 100, 'ff', null);
								$realImg = SITEURL . 'cdn/no_image_available.jpg';
								if (in_array($aList['Product']['type'], array(2, 3, 5)) && isset($getPro['ItemDetail']['url']) && !empty($getPro['ItemDetail']['url'])) {
									$href = SITEURL . "product/" . $getPro['ItemDetail']['url'];
								} else {
									$href = 'javascript:void(0);';
								}
								if (isset($aList['Product']['material'])) {
									if ($aList['Product']['material'] == 'stainless steel') {
										$mat_type = '<li class="stainless_steel"><a>Stainless steel</a></li>';
									} elseif ($aList['Product']['material'] == 'titanium') {
										$mat_type = '<li class="titanium"><a>Titanium</a></li>';
										if ($t > 0 && $s > 0) {
											$type = '/ti';
										}
									}
								}
								if ($aList['Product']['type'] == 1) {
									$href = SITEURL . "collections/products/" . $aList['Product']['slug'];
									$ima = json_decode($aList['Product']['images'], true);
									$pImg = new_show_image('cdn/cdnimg/' . $ima[0], 270, 180, 100, 'ff', null);
									$realImg = SITEURL . 'cdn/cdnimg/' . $ima[0];
								} else {
									if (isset($aList['Library']['full_path']) && !empty($aList['Library']['full_path'])) {
										$pImg = new_show_image('cdn/' . $aList['Library']['full_path'], 270, 180, 100, 'ff', null);
										$realImg = SITEURL . 'cdn/' . $aList['Library']['full_path'];
									}
								}
								$href = $href . $type;
								if ($aList['Product']['quantity'] > 0) {
									if (isset($r_co['RstrictedCountry']) && $r_co['RstrictedCountry'] == 1) {
										$btn = '<a href="' . $href . '" target="_blank" title="inquiry" class="btn btn-success ful-wd-btn">Inquiry</a>';
										$p_price = null;
									} else {
										$btn = '<input value="add to cart" class="btn btn-success ful-wd-btn" onclick="add_pro(' . $aList['Product']['id'] . ')" type="button">';
										if ($aList['Product']['discount'] > 0) {
											$p1 = $aList['Product']['price'] -  ($aList['Product']['price'] * $aList['Product']['discount'] / 100);
											$p_price = "Price: USD <strike>$" . num_2($aList['Product']['price']) . "</strike> <spam class=\'text-danger\'>$" . num_2($p1) . "</spam>";
										} else {
											$p_price = "Price: USD $" . num_2($aList['Product']['price']);
										}
										if ($aList['Product']['preorder'] > 0) {
											$p_price .= " <span class=\'text-danger\'> Pre-order available </span>";
										}
									}
								} else {
									if (isset($r_co['RstrictedCountry']) && $r_co['RstrictedCountry'] == 1) {
										$p_price = null;
									} else {

										if ($aList['Product']['discount'] > 0) {
											$p1 = $aList['Product']['price'] -  ($aList['Product']['price'] * $aList['Product']['discount'] / 100);
											$p_price = "Price: USD <strike>$" . num_2($aList['Product']['price']) . "</strike> <spam class=\'text-danger\'>$" . num_2($p1) . "</spam>";
										} else {
											$p_price = "Price: USD $" . num_2($aList['Product']['price']);
										}
										if ($aList['Product']['preorder'] > 0) {
											$p_price .= " <span class=\'text-danger\'> Pre-order available </span>";
										}
									}
									$btn = '<input value="Out of Stock" class="hasIcon shortcode_button btn btn_type4 w100" type="button">';
									//$p_price = null;
								}
								$abc_name = $aList['Model']['name'] . "/" . $aList['Motor']['name'];
								$ttt1 = str_replace("'", "\'", $abc_name);
								$list .= '<div class=" item-bx-arm"><div class="mx-wd"><div class="col-sm-4"><div class="img-pro"> <a href="' . $href . '" target="_blank" class="thumbnail"><img src="' . $pImg . '" title="' . $aList['Library']['title'] . '" alt="' . $aList['Library']['alt'] . '"/><span><img src="' . $realImg . '" ></span></a> </div></div><div class="col-sm-8"><div class="exaust-cntnt"><div class="featrs-txt"> <a href="' . $href . '" target="_blank"><h3>' . $ttt1 . '</h3><p>' . substr($aList['Product']['title'], 0, 145) . '</p></a> </div><div class="ptxt">' . $p_price . '</div><div class="buton-bottm"><ul class="metal-type"><li><a>' . substr($aList['Product']['part'], 0, 15) . '</a></li>' . $mat_type . '</ul><div class="add-cart-btn">' . $btn . '</div></div></div><div class="clearfix"></div></div></div></div>';
								$d_n++;
							}
						}
						echo "<script>$('#demo').html('" . $list . "'); $('#demo').show();</script>";
						echo "<script>$('#demo_2').html('" . $list1 . "'); $('#demo_2').show();</script>";
					}
					exit;
				}
			}
		}
	}


	public function product_tuning_box()
	{
		$this->autoRender = false;
		$this->redirect('/');
		$this->set('title_for_layout', 'ARMYTRON Plug N Play Tuning Box by ARMYTRIX');
		$page_meta = array('des' => @$this->meta['des'], 'key' => $this->meta['keys']);
		$p = $this->Product->find('list', array('conditions' => array('Product.type' => 1), 'group' => array('Product.brand_id'), 'fields' => array('Product.id', 'Product.brand_id')));
		$b = $this->Brand->find('list', array('order' => array('Brand.name' => 'ASC'), 'conditions' => array('Brand.id' => $p)));
		$this->paginate = array('recursive' => 1, 'limit' => 15, 'conditions' => array('Product.type' => 1), 'order' => array('Product.id' => 'DESC'));
		$product = $this->paginate('Product');
		$paging = $this->params['paging'];
		$this->set(compact('page_meta', 'b', 'product', 'paging'));
	}


	public function get_product()
	{
		$this->autoRender = false;
		if ($this->RequestHandler->isAjax()) {
			if (!empty($this->data)) {
				/* get product based on brand and model*/
				if (isset($this->data['get']) && $this->data['get'] == 'product' && $this->data['type'] == 'brand' && isset($this->data['id'])) {
					$a = null;
					$str1 = '<option value="">Select Model</option>';
					$str2 = '<option value="">Select Engine</option>';
					if (!empty($this->data['id'])) {
						$q = $this->Product->find('list', array('conditions' => array('Product.type' => 1), 'group' => array('Product.model_id'), 'fields' => array('Product.id', 'Product.model_id')));
						$bid = array();
						$result1 = $this->Model->find('all', array('conditions' => array('Model.id' => $q, 'Model.brand_id' => $this->data['id'])));
						if (!empty($result1)) {
							foreach ($result1 as $list) {
								$str1 .= '<option value="' . $list['Model']['id'] . '">' . $list['Model']['name'] . '</option>';
							}
						}
					}
					echo "<script>$('#model').html('$str1');</script>";
					echo "<script>$('#motor').html('$str2');</script>";
					$c = array('Product.type' => 1);
					if (!empty($this->data['id'])) {
						$c[] = array('Product.brand_id' => $this->data['id']);
					}
					$this->paginate = array('recursive' => 1, 'limit' => 15, 'conditions' => $c, 'order' => array('Product.id' => 'DESC'));
					$product = $this->paginate('Product');
					$paging = $this->params['paging'];
					$info = null;
					if (!empty($product)) {
						foreach ($product as $pList) {
							$title  = str_replace("'", "\'", substr($pList['Product']['title'], 0, 100));
							$url  = SITEURL . "collections/products/" . $pList['Product']['slug'] . ".html";
							$img = json_decode($pList['Product']['images'], true);
							$pic = 'no_image.png';
							if (isset($img[0])) {
								$pic = $img[0];
							}
							$main = show_image('cdn/cdnimg', $pic, 400, 300, 80, 'ff', null);
							$info .= '<div class="blogpost_preview_fw element stuff"><div class="fw_preview_wrapper"><div class="gallery_item_wrapper"><a href="' . $url . '" ><img src="' . $main . '" alt="" class="fw_featured_image" width="540"><div class="gallery_fadder"></div><span class="gallery_ico"><i class="hasIcon shortcode_button btn_small btn_type1">View</i></span></a></div><div class="grid-port-cont"><h6><a href="' . $url . '">' . $title . '</a></h6></div></div></div>';
							$main = null;
						}
					}
					if (!empty($info)) {
						$str = '<div class="fullscreen_block"><div class="fs_blog_module image-grid" id="list">' . $info . '</div></div>';
					} else {
						$str = '<div class="fullscreen_block"><div class="fs_blog_module image-grid" id="list"><a href="javascript:void(0)" class="load_more_works"><i class="icon-arrow-down1"></i>Product not found.</a></div></div>';
					}
					$l = $c = null;
					$t = 0;
					if (!empty($this->data['id'])) {
						$t = '1';
					}
					if (isset($paging['Product']['pageCount']) && !empty($paging['Product']['pageCount'])) {
						$p = $paging['Product']['count'] / 15;
						$p = ceil($p);
						for ($i = 1; $i <= $p; $i++) {
							$c = null;
							$l .= '<li><a href="javascript:void(0)" onclick="next(' . $i . ',' . $t . ',' . (int)$this->data['id'] . ');" id="' . $i . '" class="' . $c . '">' . $i . '</a></li>';
						}
					}
					$pag = '<div class="clearfix pd_10"></div><ul class="pagerblock">' . $l . '</ul>';
					$str .= $pag;
					echo "<script>$('#show_info').html('" . $str . "');</script>";
				}
				if (isset($this->data['get']) && $this->data['get'] == 'product' && $this->data['type'] == 'model' && isset($this->data['id'])) {
					$a = null;
					$str1 = '<option value="">Select Engine</option>';
					if (!empty($this->data['id'])) {
						$q = $this->Product->find('list', array('conditions' => array('Product.type' => 1), 'group' => array('Product.motor_id'), 'fields' => array('Product.id', 'Product.motor_id')));
						$result1 = $this->Motor->find('all', array('conditions' => array('Motor.id' => $q, 'Motor.model_id' => $this->data['id'])));
						if (!empty($result1)) {
							foreach ($result1 as $list) {
								$str1 .= '<option value="' . $list['Motor']['id'] . '">' . $list['Motor']['name'] . '</option>';
							}
						}
					}
					echo "<script>$('#motor').html('$str1');</script>";
					$c = array('Product.type' => 1);
					if (!empty($this->data['id'])) {
						$c[] = array('Product.model_id' => $this->data['id']);
					} elseif (empty($this->data['id']) && !empty($this->data['brand'])) {
						$c = array('Product.brand_id' => $this->data['brand']);
					}
					$this->paginate = array('recursive' => 1, 'limit' => 15, 'conditions' => $c, 'order' => array('Product.id' => 'DESC'));
					$product = $this->paginate('Product');
					$info = null;
					if (!empty($product)) {
						foreach ($product as $pList) {
							$title  = str_replace("'", "\'", substr($pList['Product']['title'], 0, 100));
							$url  = SITEURL . "collections/products/" . $pList['Product']['slug'] . ".html";
							$img = json_decode($pList['Product']['images'], true);
							$pic = 'no_image.png';
							if (isset($img[0])) {
								$pic = $img[0];
							}
							$main = show_image('cdn/cdnimg', $pic, 400, 300, 80, 'ff', null);
							$info .= '<div class="blogpost_preview_fw element stuff"><div class="fw_preview_wrapper"><div class="gallery_item_wrapper"><a href="' . $url . '" ><img src="' . $main . '" alt="" class="fw_featured_image" width="540"><div class="gallery_fadder"></div><span class="gallery_ico"><i class="hasIcon shortcode_button btn_small btn_type1">View</i></span></a></div><div class="grid-port-cont"><h6><a href="' . $url . '">' . $title . '</a></h6></div></div></div>';
							$main = null;
						}
					}
					if (!empty($info)) {
						$str = '<div class="fullscreen_block"><div class="fs_blog_module image-grid" id="list">' . $info . '</div></div>';
					} else {
						$str = '<div class="fullscreen_block"><div class="fs_blog_module image-grid" id="list"><a href="javascript:void(0)" class="load_more_works"><i class="icon-arrow-down1"></i>Product not found.</a></div></div>';
					}
					echo "<script>$('#show_info').html('" . $str . "');</script>";
				}
				if (isset($this->data['get']) && $this->data['get'] == 'product' && $this->data['type'] == 'motor' && isset($this->data['id'])) {
					$this->paginate = array('recursive' => 1, 'limit' => 15, 'conditions' => array('Product.type' => 1, 'Product.motor_id' => $this->data['id']), 'order' => array('Product.id' => 'DESC'));
					$product = $this->paginate('Product');
					$info = null;
					if (!empty($product)) {
						foreach ($product as $pList) {
							$title  = str_replace("'", "\'", substr($pList['Product']['title'], 0, 100));
							$url  = SITEURL . "collections/products/" . $pList['Product']['slug'] . ".html";
							$img = json_decode($pList['Product']['images'], true);
							$pic = 'no_image.png';
							if (isset($img[0])) {
								$pic = $img[0];
							}
							$main = show_image('cdn/cdnimg', $pic, 400, 300, 80, 'ff', null);
							$info .= '<div class="blogpost_preview_fw element stuff"><div class="fw_preview_wrapper"><div class="gallery_item_wrapper"><a href="' . $url . '" ><img src="' . $main . '" alt="" class="fw_featured_image" width="540"><div class="gallery_fadder"></div><span class="gallery_ico"><i class="hasIcon shortcode_button btn_small btn_type1">View</i></span></a></div><div class="grid-port-cont"><h6><a href="' . $url . '">' . $title . '</a></h6></div></div></div>';
							$main = null;
						}
					}
					if (!empty($info)) {
						$str = '<div class="fullscreen_block"><div class="fs_blog_module image-grid" id="list">' . $info . '</div></div>';
					} else {
						$str = '<div class="fullscreen_block"><div class="fs_blog_module image-grid" id="list"><a href="javascript:void(0)" class="load_more_works"><i class="icon-arrow-down1"></i>Product not found.</a></div></div>';
					}
					echo "<script>$('#show_info').html('" . $str . "');</script>";
				}
				if (isset($this->data['pagination'])) {
					$lmt = 15;
					if ($this->data['type'] == 0) {
						$c = array();
						$this->request->params['named']['page'] = $this->data['page'];
						$this->paginate = array(/* 'offset' => $pag, */'conditions' => array('Product.type' => 1), 'limit' => $lmt, 'order' => array('Product.id' => 'DESC'));
						$product = $this->paginate('Product');
						$paging = $this->params['paging'];
						$info = null;
						if (!empty($product)) {
							foreach ($product as $pList) {
								$title  = str_replace("'", "\'", substr($pList['Product']['title'], 0, 100));
								$url  = SITEURL . "collections/products/" . $pList['Product']['slug'] . ".html";
								$img = json_decode($pList['Product']['images'], true);
								$pic = 'no_image.png';
								if (isset($img[0])) {
									$pic = $img[0];
								}
								$main = show_image('cdn/cdnimg', $pic, 400, 300, 80, 'ff', null);
								$info .= '<div class="blogpost_preview_fw element stuff"><div class="fw_preview_wrapper"><div class="gallery_item_wrapper"><a href="' . $url . '" ><img src="' . $main . '" alt="" class="fw_featured_image" width="540"><div class="gallery_fadder"></div><span class="gallery_ico"><i class="hasIcon shortcode_button btn_small btn_type1">View</i></span></a></div><div class="grid-port-cont"><h6><a href="' . $url . '">' . $title . '</a></h6></div></div></div>';
								$main = null;
							}
						}
						if (!empty($info)) {
							$str = '<div class="fullscreen_block"><div class="fs_blog_module image-grid" id="list">' . $info . '</div></div>';
						} else {
							$str = '<div class="fullscreen_block"><div class="fs_blog_module image-grid" id="list"><a href="javascript:void(0)" class="load_more_works"><i class="icon-arrow-down1"></i>Product not found.</a></div></div>';
						}
						$l = $c = null;
						$t = 0;
						if (!empty($this->data['id'])) {
							$t = '1';
						}
						if (isset($paging['Product']['pageCount']) && !empty($paging['Product']['pageCount'])) {
							$p = $paging['Product']['count'] / 15;
							$p = ceil($p);
							for ($i = 1; $i <= $p; $i++) {
								$c = null;
								if ($paging['Product']['page'] == $i) {
									$c = 'current';
								}
								$l .= '<li><a href="javascript:void(0)" onclick="next(' . $i . ',' . $t . ',0);" id="' . $i . '" class="' . $c . '">' . $i . '</a></li>';
							}
						}
						$pag = '<div class="clearfix pd_10"></div><ul class="pagerblock">' . $l . '</ul>';
						$str .= $pag;
						echo "<script>$('#show_info').html('" . $str . "');</script>";
					} else if ($this->data['type'] == 1) {
						$c = array('Product.type' => 1);
						$this->request->params['named']['page'] = $this->data['page'];
						if (isset($this->data['brand_id']) && !empty($this->data['brand_id'])) {
							$c = array('Product.brand_id' => $this->data['brand_id']);
						}
						$this->paginate = array('conditions' => $c, 'limit' => $lmt, 'order' => array('Product.id' => 'DESC'));
						$product = $this->paginate('Product');
						$paging = $this->params['paging'];
						$info = null;
						if (!empty($product)) {
							foreach ($product as $pList) {
								$title  = str_replace("'", "\'", substr($pList['Product']['title'], 0, 100));
								$url  = SITEURL . "collections/products/" . $pList['Product']['slug'] . ".html";
								$img = json_decode($pList['Product']['images'], true);
								$pic = 'no_image.png';
								if (isset($img[0])) {
									$pic = $img[0];
								}
								$main = show_image('cdn/cdnimg', $pic, 400, 300, 80, 'ff', null);
								$info .= '<div class="blogpost_preview_fw element stuff"><div class="fw_preview_wrapper"><div class="gallery_item_wrapper"><a href="' . $url . '" ><img src="' . $main . '" alt="" class="fw_featured_image" width="540"><div class="gallery_fadder"></div><span class="gallery_ico"><i class="hasIcon shortcode_button btn_small btn_type1">View</i></span></a></div><div class="grid-port-cont"><h6><a href="' . $url . '">' . $title . '</a></h6></div></div></div>';
								$main = null;
							}
						}
						if (!empty($info)) {
							$str = '<div class="fullscreen_block"><div class="fs_blog_module image-grid" id="list">' . $info . '</div></div>';
						} else {
							$str = '<div class="fullscreen_block"><div class="fs_blog_module image-grid" id="list"><a href="javascript:void(0)" class="load_more_works"><i class="icon-arrow-down1"></i>Product not found.</a></div></div>';
						}
						$l = $c = null;
						$t = 0;
						if (!empty($this->data['id'])) {
							$t = '1';
						}
						if (isset($paging['Product']['pageCount']) && !empty($paging['Product']['pageCount'])) {
							$p = $paging['Product']['count'] / 15;
							$p = ceil($p);
							for ($i = 1; $i <= $p; $i++) {
								$c = null;
								if ($paging['Product']['page'] == $i) {
									$c = 'current';
								}
								$l .= '<li><a href="javascript:void(0)" onclick="next(' . $i . ',' . $this->data['type'] . ',' . $this->data['brand_id'] . ');" id="' . $i . '" class="' . $c . '">' . $i . '</a></li>';
							}
						}
						$pag = '<div class="clearfix pd_10"></div><ul class="pagerblock">' . $l . '</ul>';
						$str .= $pag;
						echo "<script>$('#show_info').html('" . $str . "');</script>";
					}
				}
			}
		}
	}

	public function get_tuning_search()
	{

		$this->autoRender = false;
		if ($this->RequestHandler->isAjax()) {
			if (!empty($this->data)) {
				$str = null;
				if ($this->data['get'] == 'model' && isset($this->data['id'])) {
					$a = null;
					$str = '<option value="">Select Model</option>';
					$r = $this->Model->find('list', array('order' => array('Model.name' => 'ASC'), 'conditions' => array('Model.brand_id' => $this->data['id'])));
					if (!empty($r)) {
						foreach ($r as $k => $v) {
							$str .= '<option value="' . $k . '">' . $v . '</option>';
						}
					}
					echo "<script>$('#model').html('$str');</script>";
				}
				if ($this->data['get'] == 'motor' && isset($this->data['id'])) {
					$a = null;
					$m = $this->Motor->find('list', array('order' => array('Motor.name' => 'ASC'), 'conditions' => array('Motor.model_id' => $this->data['id'])));
					$str = '<option value="">Select Engine</option>';
					if (!empty($m)) {
						foreach ($m as $k => $v) {
							$str .= '<option value="' . $k . '">' . $v . '</option>';
						}
						echo "<script>$('#motor').html('$str');</script>";
					} else {
						echo '<div class="alert alert-danger">Engine details not available for this time.</div>';
					}
				}
				if ($this->data['get'] == 'info') {
					if (isset($this->data['motor']) && !empty($this->data['motor'])) {
						if (isset($this->data['chiptuning']) || isset($this->data['catlesskit'])) {
							$this->Motor->bindModel(array('belongsTo' => array('Model', 'Brand')));
							$motor = $this->Motor->find('first', array('order' => array('Motor.name' => 'ASC'), 'conditions' => array('Motor.id' => $this->data['motor'])));
							$info = null;
							if (!empty($motor)) {
								$t = null;
								if (isset($this->data['chiptuning']) && !empty($this->data['chiptuning'])) {
									$t .= $this->data['chiptuning'];
								}
								if ((isset($this->data['chiptuning']) && !empty($this->data['chiptuning'])) && (isset($this->data['catlesskit']) && !empty($this->data['catlesskit']))) {
									$t .= " | ";
								}
								if (isset($this->data['catlesskit']) && !empty($this->data['catlesskit'])) {
									$t .= $this->data['catlesskit'];
								}
								$p_power =  $motor['Motor']['power'];
								$p_torque = $motor['Motor']['torque'];
								$p_v_max = $motor['Motor']['v_max'];
								$p_kmph = $motor['Motor']['kmph'];
								if (isset($this->data['chiptuning'])) {
									$p_power =  $p_power + 40;
									$p_torque = $p_torque + 70;
									$p_v_max = $p_v_max + 35;
									$p_kmph = $p_kmph - 0.40;
								}
								if (isset($this->data['catlesskit'])) {
									$p_power =  $p_power + 20;
									$p_torque = $p_torque + 20;
									$p_v_max = $p_v_max + 3;
									$p_kmph = $p_kmph - 0.10;
								}
								$p = $motor['Motor']['power'] / 1000 * 100;
								$pp = $p_power / 1000 * 100;
								if ($p_kmph < 0) {
									$p_kmph = 0;
								}
								$info = '<div class="info_box"><h1 class="center heading_main">' . $motor['Brand']['name'] . ' ' . $motor['Model']['name'] . ' ' . $motor['Motor']['name'] . '</h1><table id="details_tab" class="center"><tbody><tr><th class="">Characteristics</th><th class="center">Factory output </th><th class="center">ARMYTRIX Tuned</th></tr><tr><th>Parts</th><th></th><th class="center">' . $t . '</th></tr><tr><th>Capacity <small>(cc)</small> </th><td>' . $motor['Motor']['capacity'] . ' cc</td><td class="">' . $motor['Motor']['capacity'] . ' cc</td></tr><tr><th>Power <small>(hp)</small> </th><td><div class="progress"><div id="pro_fac" class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="' . $p . '" aria-valuemin="0" aria-valuemax="100" style="width:' . $p . '%">' . $motor['Motor']['power'] . ' hp </div></div></td><td class=""><div class="progress"><div id="pro_pp" class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="' . $pp . '" aria-valuemin="0" aria-valuemax="100" style="width:' . $pp . '%">' . $p_power . ' hp </div></div></td></tr><tr><th>Torque <small>(Nm)</small></th><td>' . $motor['Motor']['torque'] . ' Nm</td><td class="">' . $p_torque . ' Nm</td></tr><tr><th>V Max <small>(Km/h)</small></th><td>' . $motor['Motor']['v_max'] . ' km/h</td><td class="">' . $p_v_max . ' km/h</td></tr><tr><th>0-100km/h <small>(s)</small></th><td>' . $motor['Motor']['kmph'] . ' s</td><td class="">' . $p_kmph . ' s</td></tr></tbody></table></div>';
							}
							echo "<script>$('#show_info').html('" . $info . "'); $('#pro_fac').animate({ width: '$p%' }, 2000); $('#pro_pp').animate({ width: '$pp%' }, 3000); </script>";
						} else {
							echo '<div class="alert alert-danger">It must be selected at least one tuning option!</div>';
						}
					} else {
						echo '<div class="alert alert-danger">Please select Engine.</div>';
					}
				}
			}
		}
	}

	public function become_dealer()
	{
		$this->set('title_for_layout', 'Become Dealer Of Armytrix ECU - Armytrix Automotive Weaponized');
		$page_meta = array('des' => @$this->meta['des'], 'key' => $this->meta['keys']);
		$this->set(compact('page_meta'));
		if ($this->RequestHandler->isAjax()) {
			if (!empty($this->data)) {
				$error = '';
				$list = array_map('trim', $this->data);
				if (empty($list['company_name'])) {
					$error .= 'Please enter company name.<br />';
				}
				if (empty($list['full_name'])) {
					$error .= 'Please enter your name.<br />';
				}
				if (empty($list['address'])) {
					$error .= 'Please enter your address.<br />';
				}
				if (empty($list['city'])) {
					$error .= 'Please enter city.<br />';
				}
				if (empty($list['state'])) {
					$error .= 'Please enter state.<br />';
				}
				if (empty($list['zip'])) {
					$error .= 'Please enter zip code.<br />';
				}
				if (empty($list['phone'])) {
					$error .= 'Please enter phone number.<br />';
				}
				if (empty($list['email'])) {
					$error .= 'Please enter email.<br />';
				} elseif (!filter_var($list['email'], FILTER_VALIDATE_EMAIL)) {
					$error .= 'Please enter valid email.<br />';
				}
				if (!$error) {
					$msg = null;
					foreach ($list as $k => $v) {
						$key = ucwords(strtolower(str_replace('_', ' ', $k)));
						$msg .= "<p><b>$key :: </b> $v </p>";
					}
					$parameters = array('MSG' => $msg);
					$this->DATA->AppMail('inquiry@armytrix.com', 'BecomeDealer', $parameters, $dateTime = DATE);
					echo "<div class='alert alert-success'>Message sent.</div>";
					echo "<script>$('#ajax-contact-form_1')[0].reset();</script>";
				} else {
					echo '<div class="notification_error">' . $error . '</div>';
				}
			}
			exit;
		}
	}

	public function faqs()
	{
		$this->set('title_for_layout', 'TUNING WIKIPEDIA');
		$page_meta = [
			'des' => 'Tuning a Car Usually Means to Increase Power Output, Handling and Speed. Tuning is Calibrating and Adjusting the Car for the Desired Purpose.',
			'key' => 'armytrix, exhaust, akrapovic, magnaflow, borla, supersprint,  remus, fiexhaust, ipe, milltek, цена, السعر, precio, preis, prix, обзор, مراجعة, Überprüfung, revisión, глушитель'
		];

		$this->loadModel('Category');
		$this->Category->bindModel(array('hasMany' => array('Faq' => array('order' => array('Faq.id' => 'DESC')))));
		$data = $this->Category->find('all', array('order' => array('Category.name' => 'ASC')));
		$this->set(compact('page_meta', 'data'));
	}



	public function customer_support()
	{
		$this->set('title_for_layout', 'ARMYTRIX - Customer Support');
		$page_meta = array('des' => @$this->meta['des'], 'key' => $this->meta['keys']);
		$this->set('page_meta', $page_meta);
	}

	public function customer_support_thanks()
	{
		$this->set('title_for_layout', 'ARMYTRIX - Customer Support');
		$page_meta = array('des' => @$this->meta['des'], 'key' => $this->meta['keys']);
		$this->set('page_meta', $page_meta);
	}

	public function customer_support_damage_1()
	{
		$this->set('title_for_layout', 'ARMYTRIX - Customer Support Damage when received');
		$page_meta = array('des' => @$this->meta['des'], 'key' => $this->meta['keys']);
		$this->set('page_meta', $page_meta);
	}

	public function customer_support_damage_2()
	{
		$this->set('title_for_layout', 'ARMYTRIX - Customer Support Damage when received');
		$page_meta = array('des' => @$this->meta['des'], 'key' => $this->meta['keys']);
		$this->set('page_meta', $page_meta);
	}

	public function customer_support_damage_3()
	{
		$this->set('title_for_layout', 'ARMYTRIX - Customer Support Damage when received');
		$page_meta = array('des' => @$this->meta['des'], 'key' => $this->meta['keys']);
		$this->set('page_meta', $page_meta);
	}

	public function customer_support_damage_2_2()
	{
		$this->set('title_for_layout', 'ARMYTRIX - Customer Support Damage when received');
		$page_meta = array('des' => @$this->meta['des'], 'key' => $this->meta['keys']);
		$this->set('page_meta', $page_meta);
	}

	public function customer_support_damage_3_2()
	{
		$this->set('title_for_layout', 'ARMYTRIX - Customer Support Damage when received');
		$page_meta = array('des' => @$this->meta['des'], 'key' => $this->meta['keys']);
		$this->set('page_meta', $page_meta);
	}

	public function customer_support_lost_1()
	{
		$this->set('title_for_layout', 'ARMYTRIX - Customer Support Lost parts');
		$page_meta = array('des' => @$this->meta['des'], 'key' => $this->meta['keys']);
		$this->set('page_meta', $page_meta);
	}

	public function customer_support_lost_2()
	{
		$this->set('title_for_layout', 'ARMYTRIX - Customer Support Lost parts');
		$page_meta = array('des' => @$this->meta['des'], 'key' => $this->meta['keys']);
		$this->set('page_meta', $page_meta);
	}

	public function customer_support_lost_2_2()
	{
		$this->set('title_for_layout', 'ARMYTRIX - Customer Support Lost parts');
		$page_meta = array('des' => @$this->meta['des'], 'key' => $this->meta['keys']);
		$this->set('page_meta', $page_meta);
	}

	public function customer_support_fitment_1()
	{
		$this->set('title_for_layout', 'ARMYTRIX - Customer Support Fitment issue');
		$page_meta = array('des' => @$this->meta['des'], 'key' => $this->meta['keys']);
		$this->set('page_meta', $page_meta);
	}

	public function customer_support_fitment_2()
	{
		$this->set('title_for_layout', 'ARMYTRIX - Customer Support Fitment issue');
		$page_meta = array('des' => @$this->meta['des'], 'key' => $this->meta['keys']);
		$this->set('page_meta', $page_meta);
	}

	public function customer_support_fitment_2_2()
	{
		$this->set('title_for_layout', 'ARMYTRIX - Customer Support Fitment issue');
		$page_meta = array('des' => @$this->meta['des'], 'key' => $this->meta['keys']);
		$this->set('page_meta', $page_meta);
	}

	public function customer_support_fitment_3()
	{
		$this->set('title_for_layout', 'ARMYTRIX - Customer Support Fitment issue');
		$page_meta = array('des' => @$this->meta['des'], 'key' => $this->meta['keys']);
		$this->set('page_meta', $page_meta);
	}

	public function customer_support_fitment_3_2()
	{
		$this->set('title_for_layout', 'ARMYTRIX - Customer Support Fitment issue');
		$page_meta = array('des' => @$this->meta['des'], 'key' => $this->meta['keys']);
		$this->set('page_meta', $page_meta);
	}

	public function customer_support_fitment_3_3()
	{
		$this->set('title_for_layout', 'ARMYTRIX - Customer Support Fitment issue');
		$page_meta = array('des' => @$this->meta['des'], 'key' => $this->meta['keys']);
		$this->set('page_meta', $page_meta);
	}

	public function  customer_support_check_engine($step = null)
	{
		$this->set('title_for_layout', 'ARMYTRIX - Customer Support Check Engine Light');
		$page_meta = array('des' => @$this->meta['des'], 'key' => $this->meta['keys']);
		$this->set('page_meta', $page_meta);
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

	public function  customer_support_valve_control($step = null)
	{
		$this->set('title_for_layout', 'ARMYTRIX - Customer Support Valve Control Problem');
		$page_meta = array('des' => @$this->meta['des'], 'key' => $this->meta['keys']);
		$this->set('page_meta', $page_meta);
		if (!empty($_GET['step'])) {
			$current_step = $_GET['step'];
		} else {
			$current_step = 0;
		}
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

				$topbg = "background-image: url(../image/customer-support/damage-top-step" . $current_step . ".png);";

				$current_step++;
				$text = '1. Open the APP and select "settings" to check whether the software version of the OBD dongle is compatible with your car (Software number for BMW & Mercedes starts from 4, the others starts from 3)<br />2. Use APP and remote to switch on/off, and verify whether the OBD light and valves are working properly <br /> ';
				$image = 'vc3.png';
				$url = '/valve-control/hose-and-solenoid-check?step=' . $current_step;
				$url2 = '/valve-control/fill-form?step=' . $current_step;
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

				$topbg = "background-image: url(../image/customer-support/damage-top-step" . $current_step . ".png);";

				$current_step++;
				$text = ''; //'<h2 style="font-size: 26px;font-weight: bold;text-transform: none;color: #4d4d4d;margin-top: 25px;">Vacuum Line Check</h2> Verify whether your vacuum line is connected correctly, shown in your installation manual';
				$image = 'vc5.png';
				$url = '/valve-control/valve-and-exhaust-check?step=' . $current_step;
				$url2 = '/valve-control/hose-and-solenoid-check2?step=' . $current_step;
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

				$topbg = "background-image: url(../image/customer-support/damage-top-step" . $current_step . ".png);";

				$current_step++;
				$text = '<span style="font-weight:bold;">Are valves functioning properly?</span> <br />1. Utilize vacuum tool to test whether the valves (circled in red) can be sealed and maintained in sealed mode. <br />2. Verify all parts specified below are installed correctly and functioning properly: C-Clamp / Spring /Axle Bolt';
				$image = 'vc6.png';
				$url = '/valve-control/fill-form?step=' . $current_step;
				$url2 = '/valve-control/valve-and-exhaust-check2?step=' . $current_step;
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

				$topbg = "background-image: url(../image/customer-support/damage-top-step" . $current_step . ".png);";

				$current_step++;
				$text = 'Has the ECU of your car custom tuned before? Or, is the OBD of your car not supported? ';
				$image = 'vc2.png';
				$url = '/valve-control/fill-form?step=' . $current_step;
				$url2 = '/valve-control/function-and-version?step=' . $current_step;
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

				$topbg = "background-image: url(../image/customer-support/damage-top-step" . $current_step . ".png);";

				$current_step++;
				$text = 'Please fill out the form below. We will contact you<br /> as soon as your case is received and determined.';
				$image = 'vc4.png';
				$url = '/valve-control/dealer?step=' . $current_step;
				$url2 = '/valve-control/user?step=' . $current_step;
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

				$topbg = "background-image: url(../image/customer-support/damage-top-step" . $current_step . ".png);";

				$current_step++;
				$text = '<span style="font-weight:bold;">Vacuum source/ One way valve/ solenoid:</span><br /> 1. Verify whether the vacuum source used is located exactly where specified on our installation manual.<span class="numberCircle">8</span> <br />2. Verify the connection and functionality of the one way valve<span class="numberCircle">7</span> <br />3. Touch the solenoid valve and switch on/off to make sure it is functional/actuated.<span class="numberCircle">6</span> <br />4. Verify whether silicon tubes are in functional condition, and no cracks are found. ';

				$text = '<img src="/image/customer-support/vc8.png" />
				<div style="width:580px;margin:0 auto;font-family: corbel;font-weight: normal;font-size: 20px;margin-top:40px;">If the vacuum source is not placed properly, please adjust it. <br />Other than that, please fill out the form below. We will contact you as soon as your case is received and determined.
				</div>
				';

				$url = '/valve-control/dealer?step=' . $current_step;
				$url2 = '/valve-control/user?step=' . $current_step;
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

				$topbg = "background-image: url(../image/customer-support/damage-top-step" . $current_step . ".png);";

				$current_step++;
				$text = '<h2 style="font-family: corbel;font-size: 26px;font-weight: bold;text-transform: none;color: #4d4d4d;margin-top: 25px;margin-bottom:25px;">Verify which part of the valve is defect</h2>Please fill out the form below. We will contact you<br /> as soon as your case is received and determined.';
				$image = 'vc7.png';
				$url = '/valve-control/dealer?step=' . $current_step;
				$url2 = '/valve-control/user?step=' . $current_step;
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
				$topbg = "background-image: url(../image/customer-support/damage-top-step" . $current_step . ".png);";

				$this->set('title', 'Valve control problem');

				$this->set('topbg', $topbg);
				$this->render('/Pages/customer_support_valve_control_5');
				break;
			case "user":
				$style = "<style>";
				$style .= "";
				$style .= "</style>";
				$topbg = "background-image: url(../image/customer-support/damage-top-step" . $current_step . ".png);";

				$this->set('title', 'Valve control problem');

				$this->set('topbg', $topbg);
				$this->render('/Pages/customer_support_valve_control_6');
				break;
		}
	}

	public function customer_support_submit($variant = 1)
	{
		$data['post'] = $_POST;
		$data['to'] = 'inquiry@armytrix.com';
		$data['subject'] = 'Message from armytrix.com';
		$data['fromName'] = 'armytrix.com';
		$message = 'test';
		$to = $data['to'];
		$subject = $data['subject'];
		$fromName = $data['fromName'];

			if (isset($data['post']['field']) && !empty($data['post']['field'])) {
				switch ($variant) {
					case 1:

						if (filter_var($data['post']['field'][5], FILTER_VALIDATE_EMAIL)) {
							$message = '<b>Message from ' . $data['post']['field'][0] . '</b>' . '<br />';
							//$message .= '<b>Form name: </b>'.$data['post']['field'][0] . '<br />';
							$message .= '<b>Name: </b>' . $data['post']['field'][1] . '<br />';
							$message .= '<b>Shop name: </b>' . $data['post']['field'][2] . '<br />';
							$message .= '<b>Shop address: </b>' . $data['post']['field'][3] . '<br />';
							$message .= '<b>Phone number: </b>' . $data['post']['field'][4] . '<br />';
							$message .= '<b>Email: </b>' . $data['post']['field'][5] . '<br />';
							$message .= '<b>Purchase order number: </b>' . $data['post']['field'][6] . '<br />';
							$message .= '<b>Purchase date: </b>' . $data['post']['field'][7] . '<br />';
							$message .= '<b>Installation date: </b>' . $data['post']['field'][8] . '<br />';
							$message .= '<b>Problem description: </b>' . $data['post']['field'][9] . '<br />';
							$subject = $data['post']['field'][0];
							$this->send_email($message, $to, $subject, $fromName);
						} else {
							die('error');
						}


						break;
					case 2:
						$message = '<b>Message from ' . $data['post']['field'][0] . '</b>' . '<br />';
						//$message .= '<b>Form name: </b>'.$data['post']['field'][0] . '<br />';
						$message .= '<b>Name: </b>' . $data['post']['field'][1] . '<br />';
						$message .= '<b>Phone number: </b>' . $data['post']['field'][2] . '<br />';
						$message .= '<b>Country: </b>' . $data['post']['field'][3] . '<br />';
						$message .= '<b>Email: </b>' . $data['post']['field'][4] . '<br />';
						$message .= '<b>Purchase date: </b>' . $data['post']['field'][5] . '<br />';
						$message .= '<b>Installation date: </b>' . $data['post']['field'][6] . '<br />';
						$message .= '<b>Car model: </b>' . $data['post']['field'][7] . '<br />';
						$message .= '<b>Vin number: </b>' . $data['post']['field'][8] . '<br />';
						$message .= '<b>Who is your installer: </b>' . $data['post']['field'][9] . '<br />';
						$message .= '<b>Who sold you the system: </b>' . $data['post']['field'][10] . '<br />';
						$message .= '<b>Problem description: </b>' . $data['post']['field'][11] . '<br />';

						$subject = $data['post']['field'][0];

						$this->send_email($message, $to, $subject, $fromName);

						break;
					case 3:

						$message = '<b>Message from ' . $data['post']['field'][0] . '</b>' . '<br />';
						//$message .= '<b>Form name: </b>'.$data['post']['field'][0] . '<br />';
						$message .= '<b>Name: </b>' . $data['post']['field'][1] . '<br />';
						$message .= '<b>Shop name: </b>' . $data['post']['field'][2] . '<br />';
						$message .= '<b>Shop address: </b>' . $data['post']['field'][3] . '<br />';
						$message .= '<b>Phone number: </b>' . $data['post']['field'][4] . '<br />';
						$message .= '<b>Email: </b>' . $data['post']['field'][5] . '<br />';
						$message .= '<b>Purchase order number: </b>' . $data['post']['field'][6] . '<br />';
						$message .= '<b>Purchase date: </b>' . $data['post']['field'][7] . '<br />';
						$message .= '<b>Installation date: </b>' . $data['post']['field'][8] . '<br />';
						$message .= '<b>Video link(URL): </b>' . $data['post']['field'][9] . '<br />';
						$message .= '<b>Problem description: </b>' . $data['post']['field'][10] . '<br />';

						$subject = $data['post']['field'][0];

						$this->send_email($message, $to, $subject, $fromName);

						break;
					case 4:

						$message = '<b>Message from ' . $data['post']['field'][0] . '</b>' . '<br />';
						//$message .= '<b>Form name: </b>'.$data['post']['field'][0] . '<br />';
						$message .= '<b>Name: </b>' . $data['post']['field'][1] . '<br />';
						$message .= '<b>Phone number: </b>' . $data['post']['field'][2] . '<br />';
						$message .= '<b>Country: </b>' . $data['post']['field'][3] . '<br />';
						$message .= '<b>Email: </b>' . $data['post']['field'][4] . '<br />';
						$message .= '<b>Purchase date: </b>' . $data['post']['field'][5] . '<br />';
						$message .= '<b>Installation date: </b>' . $data['post']['field'][6] . '<br />';
						$message .= '<b>Car model: </b>' . $data['post']['field'][7] . '<br />';
						$message .= '<b>Vin number: </b>' . $data['post']['field'][8] . '<br />';
						$message .= '<b>Who is your installer: </b>' . $data['post']['field'][9] . '<br />';
						$message .= '<b>Who sold you the system: </b>' . $data['post']['field'][10] . '<br />';
						$message .= '<b>Video link(URL): </b>' . $data['post']['field'][11] . '<br />';
						$message .= '<b>Problem description: </b>' . $data['post']['field'][12] . '<br />';

						$subject = $data['post']['field'][0];

						$this->send_email($message, $to, $subject, $fromName);

						break;
						//valve control

					case 5:

						$message = '<b>Message from ' . $data['post']['field'][0] . '</b>' . '<br />';
						//$message .= '<b>Form name: </b>'.$data['post']['field'][0] . '<br />';
						$message .= '<b>Name: </b>' . $data['post']['field'][1] . '<br />';
						$message .= '<b>Phone number: </b>' . $data['post']['field'][2] . '<br />';
						$message .= '<b>Address: </b>' . $data['post']['field'][3] . '<br />';
						$message .= '<b>Email: </b>' . $data['post']['field'][4] . '<br />';

						$message .= '<b>Installer Name: </b>' . $data['post']['field'][5] . '<br />';
						$message .= '<b>Installer Phone number: </b>' . $data['post']['field'][6] . '<br />';
						$message .= '<b>Installer Address: </b>' . $data['post']['field'][7] . '<br />';
						$message .= '<b>Installer Email: </b>' . $data['post']['field'][8] . '<br />';

						$message .= '<b>Installation date: </b>' . $data['post']['field'][9] . '<br />';
						$message .= '<b>Vin number: </b>' . $data['post']['field'][10] . '<br />';
						$message .= '<b>Problem description: </b>' . $data['post']['field'][11] . '<br />';
						$message .= '<b>Video link(URL): </b>' . $data['post']['field'][12] . '<br />';

						$subject = $data['post']['field'][0];
						$this->send_email($message, $to, $subject, $fromName);

						break;
						//valve control
					case 6:

						$message = '<b>Message from ' . $data['post']['field'][0] . '</b>' . '<br />';
						//$message .= '<b>Form name: </b>'.$data['post']['field'][0] . '<br />';
						$message .= '<b>PI number: </b>' . $data['post']['field'][1] . '<br />';
						$message .= '<b>Vin number: </b>' . $data['post']['field'][2] . '<br />';
						$message .= '<b>Problem description: </b>' . $data['post']['field'][3] . '<br />';
						$message .= '<b>Video link(URL): </b>' . $data['post']['field'][4] . '<br />';

						$subject = $data['post']['field'][0];
						$this->send_email($message, $to, $subject, $fromName);

						break;
				}
			} else {
				die('error');
			}
	}

	private function send_email($message, $to, $subject, $fromName)
	{
		$f_path = 'cdn/support_files';
		mkdir($f_path, 0777, true);
		foreach ($_FILES['file'] as $key => $all) {
			foreach ($all as $i => $val) {
				$new_array[$i][$key] = $val;
			}
		}
		$img_url = null;
		if (isset($new_array) && !empty($new_array)) {
			foreach ($new_array as $pics) {
				$id = rand(123, 987);
				$info = pathinfo($pics['name']);
				$ext = $info['extension']; // get the extension of the file
				$newname = $pics['name']; //"newname.".$ext;
				$target = $f_path . "/" . $newname;
				if (move_uploaded_file($pics['tmp_name'], $target)) {
					$img_url .= '<a href="' . SITEURL . $target . '">' . SITEURL . $target . '</a><br>';
				}
			}
		}
		$message .= '<b>Attachments: </b>' . $img_url . '<br />';
		$parameters = array('NAME' => $fromName, 'SUBJECT' => $subject . " - From " . $fromName, 'BODY' => $message);
		$this->DATA->AppMail('inquiry@armytrix.com', 'SupportRequest', $parameters, $dateTime = DATE);
		$this->redirect('/Pages/customer_support_thanks');
	}


	public function mustang_flash_sale()
	{
		$this->layout = '404';
		$this->set('title_for_layout', 'Mustang flash sale');
		$page_meta = array('des' => @$this->meta['des'], 'key' => $this->meta['keys']);
		$this->set('page_meta', $page_meta);
	}

	public function flash_sale_pop()
	{
	}

	public function ecu_qa()
	{
		$this->set('title_for_layout', 'ECU Tuning Questions - Armytrix Performance Upgrades');
		$page_meta = array('des' => @$this->meta['des'], 'key' => $this->meta['keys']);
		$this->set(compact('page_meta'));
	}

	public function ecu_warranty()
	{
		$this->set('title_for_layout', 'ECU Tuning Warranty - Armytrix Performance Upgrades');
		$page_meta = array('des' => @$this->meta['des'], 'key' => $this->meta['keys']);
		$this->set(compact('page_meta'));
	}

	public function ecu()
	{
		$this->set('title_for_layout', 'ECU Tuning - Armytrix Performance Upgrades');
		$page_meta = array('des' => @$this->meta['des'], 'key' => $this->meta['keys']);
		$this->set(compact('page_meta'));
	}

	public function check_product()
	{
		$this->autoRender = false;
		if ($this->RequestHandler->isAjax() && !empty($this->data)) {
			$getPro = $this->ItemDetail->find('first', array('recursive' => -1, 'conditions' => [
				'ItemDetail.language' => 'eng', 'ItemDetail.status' => 1,
				'ItemDetail.brand_id' => $this->data['brand'], 'ItemDetail.model_id' => $this->data['model'], 'ItemDetail.motor_id' => $this->data['motor']
			]));
			if (isset($getPro['ItemDetail']['url']) && !empty($getPro['ItemDetail']['url'])) {
				echo "<script> window.location.href ='" . SITEURL . "product/" . $getPro['ItemDetail']['url'] . "';</script>";
			}

			die;
			die;
		}
		exit;
	}
}
