<?php
App::uses('Sanitize', 'Utility', 'AppController', 'Controller');
class LabsController extends AppController
{

	var $uses = array(
		'VideoSlider',
		'User', 'Model', 'Brand', 'Motor', 'Product', 'EmailTemplate', 'World', 'Library', 'ExhaustBrand', 'ExhaustModel', 'ExhaustProduct', 'PromoCode',
		'ItemDetail', 'QualityDetail', 'Shipping', 'DealerLevel', 'Order', 'OrderItem', 'OrderHistory', 'OrderMessage', 'Address', 'Vote', 'VoteOption', 'Language', 'String', 'Translation', 'CountryList',
		'Motorcycle', 'MotorcycleMake', 'MotorcycleModel', 'MotorcycleYear'
	);
	var $components = array('Auth', 'Session', 'Email', 'RequestHandler', 'Paginator', 'DATA', 'PhpExcel.PhpExcel');
	var $helpers = array('Html', 'Form', 'Session', 'Paginator');

	function beforeFilter()
	{
		$this->set('getMenuNumber', $this->DATA->getMenuNumber());
		AppController::beforeFilter();
	}


	public function lab_vote()
	{

		$this->set('title_for_layout', 'Vote : ' . WEBTITLE);

		if (isset($this->request->query['st']) && !empty($this->request->query['st'])) {
			$d = $this->Vote->find('first', array('conditions' => array('Vote.id' => $this->request->query['st'])));
			if (!empty($d)) {
				$st = 1;
				if ($d['Vote']['status'] == 1) {
					$st = 0;
				} elseif ($d['Vote']['status'] == 0) {
					$st = 1;
				}
				$arr = array('id' => $d['Vote']['id'], 'status' => $st);
				$this->Vote->save($arr);
			}
			$this->redirect(SITEURL . "lab/labs/vote");
		}
		$this->paginate = array('maxLimit' => 50, 'limit' => 50, 'order' => array('Vote.id' => 'DESC'));
		$data = $this->paginate('Vote');
		$this->set('data', $data);
	}

	public function lab_quick_vote($id = null)
	{

		$this->set('title_for_layout', 'Create quick vote : ' . WEBTITLE);
		$this->Vote->bindModel(array('hasMany' => array('VoteOption')));
		$e = $this->Vote->find('first', array('conditions' => array('Vote.id' => $id)));
		$this->set('e', $e);

		if (!empty($this->data)) {
			$s = '<script>$("#svt").prop("disabled",false); $("#svt").val("Submit");</script>';
			$o = $f = 0;
			$opt = array();


			$t = trim($this->data['Vote']['title']);
			$d = trim($this->data['Vote']['description']);


			if (empty($t)) {
				echo $s;
				echo "<div class='alert alert-danger'>Please enter Title</div>";
				exit;
			} elseif (empty($d)) {
				echo $s;
				echo "<div class='alert alert-danger'>Please enter description</div>";
				exit;
			} else {
				foreach ($this->data['VoteOption'] as $list) {
					$a = trim($list['title']);
					if (!empty($a)) {
						$o++;
					}
				}

				foreach ($this->data['VoteOption'] as $list) {
					$a = trim($list['title']);
					if (isset($list['id']) && !empty($list['id'])) {
					} else {
						if (!empty($a) && !isset($list['img']['name'])) {
							$f++;
						}
					}
				}

				if ($o < 2) {
					echo $s;
					echo "<div class='alert alert-danger'>Please add at least 2 options</div>";
					exit;
				}

				/* if( $f != 0 ){ echo $s; echo "<div class='alert alert-danger'>Please add image for option</div>"; exit;} */

				$this->Vote->save($this->data);
				if (isset($this->data['Vote']['id']) && !empty($this->data['Vote']['id'])) {
					$lid = $this->data['Vote']['id'];
				} else {
					$lid = $this->Vote->getLastInsertId();
				}
				$abc = array();
				foreach ($this->data['VoteOption'] as $list) {

					$abc['id'] = $list['id'];
					$abc['vote_id'] = $lid;
					$abc['title'] = $list['title'];
					if (isset($list['img']['name']) && !empty($list['img']['name'])) {
						$img = $list['img']['name'];
						$imgExt = strtolower(pathinfo($list['img']['name'], PATHINFO_EXTENSION));
						$fName = "vote_" . rand(1234, 98765) . "_" . strtolower(pathinfo($list['img']['name'], PATHINFO_FILENAME));
						$filename = strtolower(Inflector::slug($fName, '-')) . "." . $imgExt;
						if (in_array($imgExt, array('jpg', 'png', 'jpeg'))) {

							if (!file_exists('cdn/vote')) {
								mkdir('cdn/vote', 0777, true);
							}
							if (move_uploaded_file($list['img']['tmp_name'], WWW_ROOT . 'cdn/vote/' . $filename)) {
								$Test_filename = WWW_ROOT . "cdn/vote/" . $filename;
								$abc['image'] = $filename;
							}
						}
					}
					$opt[] = $abc;
				}

				if (!empty($opt)) {
					$this->VoteOption->saveMany($opt);
				}
				$u = SITEURL . "lab/labs/vote";
				echo '<div class="alert alert-success" role="alert"> Added</div>';
				echo "<script>setTimeout(function(){ window.location.href ='" . $u . "'; }, 500);</script>";
			}
			exit;
		}
	}



	public function lab_primary_img()
	{
		$this->autoRender = false;
		if ($this->RequestHandler->isAjax() && !empty($this->data)) {

			$d = $this->ItemDetail->find('first', array('recursive' => -1, 'conditions' => array('ItemDetail.id' => $this->data['id'])));
			if (!empty($d)) {
				if ($this->data['dtype'] == 'slider_tt') {
					$ids = explode(',', $d['ItemDetail']['tt_slider']);
					$key = array_search($this->data['lid'], $ids);
					$f = $ids[0];
					$ids[0] = $this->data['lid'];
					$ids[$key] = $f;
					$s = implode(',', $ids);
					$arr = array('id' => $d['ItemDetail']['id'], 'tt_slider' => $s);
					$this->ItemDetail->save($arr);
				} elseif ($this->data['dtype'] == 'slider') {
					$ids = explode(',', $d['ItemDetail']['slider']);
					$key = array_search($this->data['lid'], $ids);
					$f = $ids[0];
					$ids[0] = $this->data['lid'];
					$ids[$key] = $f;
					$s = implode(',', $ids);
					$arr = array('id' => $d['ItemDetail']['id'], 'slider' => $s);
					$this->ItemDetail->save($arr);
				}
			}
		}
	}

	public function lab_new_faq($id = null)
	{
		$this->loadModel('Faq');
		$this->loadModel('Category');
		$cat = $this->Category->find('list', array('order' => array('Category.name' => 'ASC')));
		$this->set('cat', $cat);

		if (!empty($id)) {
			$this->set('title_for_layout', 'Edit FAQ : ' . WEBTITLE);
			$this->Faq->id = $id;
			if ($this->request->is('get')) {
				$e = $this->Faq->read();
				if (!empty($e)) {
					$this->request->data = $e;
				} else {
					$this->redirect(array('controller' => 'labs', 'action' => 'new_faq'));
				}
			} else {

				if ($this->Faq->save($this->request->data)) {
					$this->Session->setFlash(__('Faq has been updated.'), 'default', array('class' => 'alert alert-success'), 'msg');
				} else {
					$this->Session->setFlash(__('Faq has been not updated.'), 'default', array('class' => 'alert alert-danger'), 'msg');
				}
			}
		} else {
			$this->set('title_for_layout', 'Create new Faq : ' . WEBTITLE);
			if (!empty($this->request->data)) {
				if ($this->Faq->save($this->request->data)) {
					$lid = $this->EmailTemplate->getLastInsertId();
					$this->Session->setFlash('Faq info has been save successfully', 'default', array('class' => 'alert alert-success'), 'msg');
					$this->redirect(SITEURL . "lab/labs/new_faq/" . $lid);
				} else {
					$this->Session->setFlash('Not able to save', 'default', array('class' => 'alert alert-danger'), 'msg');
				}
			}
		}
	}

	public function lab_faq()
	{
		$this->loadModel('Faq');
		$this->Faq->bindModel(array('belongsTo' => array('Category')));
		if (isset($this->request->query['del']) && !empty($this->request->query['del'])) {
			$this->Faq->id = $this->request->query['del'];
			$this->Faq->delete();
			$this->redirect('/lab/labs/faq');
		}
		$this->set('title_for_layout', 'Faqs : ' . WEBTITLE);
		$this->paginate = array('maxLimit' => 50, 'limit' => 50, 'order' => array('Faq.id' => 'DESC'));
		$data = $this->paginate('Faq');
		$this->set('data', $data);
	}
	public function lab_faq_advance()
	{
		$this->loadModel('Faq');
		$this->Faq->bindModel(array('belongsTo' => array('Category')));

		if ($this->request->is('ajax')) {
			$searchData = $this->request->data['name_value'];
			$this->paginate = array(
				'limit' => 100,
				'conditions' => array(
					'or' => array(
						"Faq.title" => $searchData,
						"Category.name" => $searchData,
						"Faq.description LIKE" => "%" . $searchData . "%",

					)
				), 'order' => array('Faq.created' => 'DESC')
			);
			$data = $this->paginate('Faq');
			$this->set('data', $data);
		} else {
			exit;
		}
	}


	public function lab_create_our_dealer($id = null)
	{

		$this->loadModel('OurDealer');
		$this->OurDealer->bindModel(array('belongsTo' => array('Library')));
		if (!empty($id)) {
			$this->set('title_for_layout', 'Edit dealer: ' . WEBTITLE);
			$this->OurDealer->id = $id;
			if ($this->request->is('get')) {
				$e = $this->OurDealer->read();
				if (!empty($e)) {
					$this->request->data = $e;
				} else {
					$this->redirect(array('controller' => 'labs', 'action' => 'our_dealer'));
				}
			} else {

				$addresss = $this->request->data['OurDealer']['address'] . " " . $this->data['OurDealer']['country'];
				$latLang = $this->DATA->Get_Lat_lng($addresss);

				if (isset($latLang['lat']) && isset($latLang['lng'])) {
					$this->request->data['OurDealer']['lat'] = $latLang['lat'];
					$this->request->data['OurDealer']['lang'] = $latLang['lng'];
					if ($this->OurDealer->save($this->request->data)) {
						$this->Session->setFlash(__('Dealer info has been updated.'), 'default', array('class' => 'alert alert-success'), 'msg');
					} else {
						$this->Session->setFlash(__('Dealer info has been not updated.'), 'default', array('class' => 'alert alert-danger'), 'msg');
					}
				} else {
					$this->Session->setFlash(__('Cant find address on maps.'), 'default', array('class' => 'alert alert-danger'), 'msg');
				}
			}
		} else {
			$this->set('title_for_layout', 'Create new dealer : ' . WEBTITLE);

			if (!empty($this->data)) {

				$addresss = $this->request->data['OurDealer']['address'] . " " . $this->data['OurDealer']['country'];
				$latLang = $this->DATA->Get_Lat_lng($addresss);

				if (isset($latLang['lat']) && isset($latLang['lng'])) {
					$this->request->data['OurDealer']['lat'] = $latLang['lat'];
					$this->request->data['OurDealer']['lang'] = $latLang['lng'];

					if ($this->OurDealer->save($this->request->data)) {
						$this->Session->setFlash(__('Dealer info has been added.'), 'default', array('class' => 'alert alert-success'), 'msg');
						$this->redirect(SITEURL . "lab/labs/create_our_dealer");
					} else {
						$this->Session->setFlash(__('Dealer info has been not added.'), 'default', array('class' => 'alert alert-danger'), 'msg');
					}
				} else {
					$this->Session->setFlash(__('Cant find address on maps.'), 'default', array('class' => 'alert alert-danger'), 'msg');
				}
			}
		}
	}


	public  function lab_our_dealer()
	{
		$this->set('title_for_layout', 'Our Dealer : ' . WEBTITLE);
		$this->loadModel('OurDealer');

		if (isset($this->request->query['st']) && !empty($this->request->query['st'])) {
			$d = $this->OurDealer->find('first', array('conditions' => array('OurDealer.id' => $this->request->query['st'])));

			if (!empty($d)) {
				$st = 1;
				if ($d['OurDealer']['status'] == 1) {
					$st = 0;
				} elseif ($d['OurDealer']['status'] == 0) {
					$st = 1;
				}
				$arr = array('id' => $d['OurDealer']['id'], 'status' => $st);
				$this->OurDealer->save($arr);
			}
			$this->redirect(SITEURL . "lab/labs/our_dealer");
		}

		$this->paginate = array('recursive' => 1, 'limit' => 30, 'order' => array('OurDealer.title' => 'ASC'));
		$data = $this->paginate('OurDealer');
		$this->set('data', $data);
	}

	public function _xls_to_shipping($file = null)
	{
		$tab_arr = $new = array();
		if (!empty($file)) {
			App::import('Vendor', 'php_excel/excel_reader2');
			$data = new Spreadsheet_Excel_Reader('doc/' . $file, true);

			if (isset($data->sheets[0]['cells'][2]) && !empty($data->sheets[0]['cells'][2])) {
				$f = $data->sheets[0]['cells'][1];
				$c = $data->sheets[0]['cells'][2];

				$sAll = $data->sheets[0]['cells'];

				foreach ($sAll as $k => $list) {
					if ($k > 1) {
						$sList[$f[1]] = $list[1];
						$sList[$f[2]] = $list[2];
						$sList[$f[3]] = $list[3];
						$sList[$f[4]] = $list[4];
						$sList[$f[5]] = $list[5];
						$sList[$f[6]] = $list[6];
						$sList[$f[7]] = $list[7];
						$sList[$f[8]] = $list[8];
						$sList[$f[9]] = $list[9];
						$sList[$f[10]] = $list[10];
						$sList[$f[11]] = $list[11];
						$sList[$f[12]] = $list[12];
						$sList[$f[13]] = $list[13];
						$new[] = $sList;
					}
				}

				if (!empty($new)) {
					$this->Shipping->saveMany($new);

					$f = 'doc/' . $file;
					if (file_exists($f)) {
						unlink($f);
					}
					echo "<script>$('#ShippingUpXlsForm')[0].reset()</script>";
					echo "<div class='alert alert-success'>State shipping cost has been save</div>";
				} else {
					echo "<div class='alert alert-danger'>State record not found</div>";
				}
			} else {
				echo "<div class='alert alert-danger'>Record not found</div>";
			}
		}
	}
	public function lab_up_xls()
	{
		$this->autoRender = FALSE;
		if ($this->request->is('ajax') && !empty($this->data)) {
			if (isset($this->data['Shipping']['file']['name']) && !empty($this->data['Shipping']['file']['name'])) {
				$img = $this->data['Shipping']['file'];

				$imgExt = strtolower(pathinfo($img['name'], PATHINFO_EXTENSION));
				$fName = "car_" . rand(1234, 98765) . "_" . strtolower(pathinfo($img['name'], PATHINFO_FILENAME));
				$filename = strtolower(Inflector::slug($fName, '-')) . "." . $imgExt;
				if (in_array($imgExt, array('xls'))) {
					if (move_uploaded_file($img['tmp_name'], WWW_ROOT . 'doc/' . $filename)) {
						$Test_filename = WWW_ROOT . "doc/" . $filename;
						if (file_exists($Test_filename)) {
							$this->_xls_to_shipping($filename);
						}
					}
				} else {
					echo "<div class='alert alert-danger'>Please selecte only XLS file</div>";
				}
			} else {
				echo "<div class='alert alert-danger'>Please select file.</div>";
			}
		}
	}

	public function _xls_to_arr($file = null)
	{
		$tab_arr = $new = array();
		if (!empty($file)) {
			App::import('Vendor', 'php_excel/excel_reader2');
			$data = new Spreadsheet_Excel_Reader('doc/' . $file, true);

			if (isset($data->sheets[0]['cells'][2]) && !empty($data->sheets[0]['cells'][2])) {
				$f = $data->sheets[0]['cells'][1];
				$c = $data->sheets[0]['cells'][2];

				if (!empty($c)) {

					$tab_arr[$f[2]] = $c[2];
					$tab_arr[$f[3]] = $c[3];
					$tab_arr[$f[4]] = $c[4];
					$tab_arr[$f[5]] = $c[5];
					$tab_arr[$f[6]] = $c[6];
					$tab_arr[$f[7]] = $c[7];
					$tab_arr[$f[8]] = $c[8];
					$tab_arr[$f[9]] = $c[9];
					$tab_arr[$f[10]] = $c[10];
					$tab_arr[$f[11]] = $c[11];
				}
				$w = $this->World->find('first', array('conditions' => array('World.name' => $c[2], 'World.type' => 'co')));
				if (empty($w)) {
					$this->request->data['World'] = $tab_arr;
					$this->World->save($this->request->data);
					$lid = $this->World->getLastInsertId();
				} else {
					$lid = $w['World']['id'];
				}

				$sAll = $data->sheets[0]['cells'];
				foreach ($sAll as $k => $list) {
					if ($k > 2) {

						$s = $this->World->find('first', array('conditions' => array('World.in_location' => $lid, 'World.name' => $list[2], 'World.type' => 'st')));

						if (!empty($s)) {
							$sList[$f[1]] = $s['World']['id'];
						} else {
							$sList[$f[1]] = $list[1];
						}
						$sList['in_location'] = $lid;
						$sList[$f[2]] = $list[2];
						$sList[$f[3]] = $list[3];
						$sList[$f[4]] = $list[4];
						$sList[$f[5]] = $list[5];
						$sList[$f[6]] = $list[6];
						$sList[$f[7]] = $list[7];
						$sList[$f[8]] = $list[8];
						$sList[$f[9]] = $list[9];
						$sList[$f[10]] = $list[10];
						$sList[$f[11]] = $list[11];
						$new[] = $sList;
					}
				}

				if (!empty($new)) {
					$this->World->saveMany($new);

					$f = 'doc/' . $file;
					if (file_exists($f)) {
						unlink($f);
					}
					echo "<script>$('#WorldLabImportCountryForm')[0].reset()</script>";
					echo "<div class='alert alert-success'>State shipping cost has been save</div>";
				} else {
					echo "<div class='alert alert-danger'>State record not found</div>";
				}
			} else {
				echo "<div class='alert alert-danger'>Record not found</div>";
			}
		}
	}


	public function lab_import_country()
	{
		$this->set('title_for_layout', 'Import shipping costs : ' . WEBTITLE);
		if (!empty($this->data)) {

			if (isset($this->data['World']['file']['name']) && !empty($this->data['World']['file']['name'])) {
				$img = $this->data['World']['file'];

				$imgExt = strtolower(pathinfo($img['name'], PATHINFO_EXTENSION));
				$fName = rand(1234, 98765) . "_" . strtolower(pathinfo($img['name'], PATHINFO_FILENAME));
				$filename = strtolower(Inflector::slug($fName, '-')) . "." . $imgExt;
				if (in_array($imgExt, array('xls'))) {
					if (move_uploaded_file($img['tmp_name'], WWW_ROOT . 'doc/' . $filename)) {
						$Test_filename = WWW_ROOT . "doc/" . $filename;
						if (file_exists($Test_filename)) {
							$this->_xls_to_arr($filename);
						}
					}
				} else {
					echo "<div class='alert alert-danger'>Please selecte only XLS file</div>";
				}
			} else {
				echo "<div class='alert alert-danger'>Please select file.</div>";
			}



			die;
		}
	}

	public function lab_index()
	{
		$this->set('title_for_layout', 'Dashboard : ' . WEBTITLE);
		$this->set('pro', $this->Product->find('count', array('conditions' => array('Product.status' => 1))));
		$this->set('ord', $this->Order->find('count', array('conditions' => array('Order.order_status_id' => array(2, 3, 5, 13)))));
		$this->set('tot_ord', $this->Order->find('count'));
		$this->set('cat_pro', $this->Product->find('count', array('conditions' => array('Product.status' => 1, 'Product.type' => 2))));
		$this->set('cata_pro', $this->Product->find('count', array('conditions' => array('Product.status' => 1, 'Product.type' => 3))));
		$this->set('ext_pro', $this->Product->find('count', array('conditions' => array('Product.status' => 1, 'Product.type' => 4))));
		$this->set('grand_total', $this->Order->find('all', array('fields' => array('sum(Order.grand_total) AS total'), 'conditions' => array('Order.order_status_id' => array(2, 3, 5, 13)))));
		$this->set('paypal_total', $this->Order->find('all', array('fields' => array('sum(Order.grand_total) AS total'), 'conditions' => array('Order.order_status_id' => array(2, 3, 5, 13), 'Order.payment_by' => 'paypal'))));
		$this->set('cc_total', $this->Order->find('all', array('fields' => array('sum(Order.grand_total) AS total'), 'conditions' => array('Order.order_status_id' => array(2, 3, 5, 13), 'Order.payment_by' => 'cc'))));
	}

	public function lab_cl_lib()
	{
		$this->autoRender = false;
		if ($this->RequestHandler->isAjax() && !empty($this->data)) {
			$s = '<script>$("#preloader").hide();</script>';
			$id = explode(',', $this->data['id']);
			if (!empty($id)) {
				$lib = $this->Library->find('all', array('conditions' => array('Library.id' => $id)));
				if (!empty($lib)) {
					foreach ($lib as $list) {
						$f = 'cdn/' . $list['Library']['folder'] . "/" . $list['Library']['file_name'];
						if (file_exists($f)) {
							unlink($f);
						}
						$this->Library->id = $list['Library']['id'];
						$this->Library->delete();
					}
				}
				echo "<script> location.reload();</script>";
			} else {
				echo $s;
				echo '<div class="alert alert-danger ">Sorry, this is not working at the moment. Please try again later.</div>';
			}
		}
	}

	public function lab_view_message($id = null)
	{
		$this->set('title_for_layout', 'Customer\'s message : ' . WEBTITLE);


		if ($this->RequestHandler->isAjax() && !empty($this->data)) {
			$s = '<script>$("#preloader").hide();</script>';
			$this->Order->bindModel(array('belongsTo' => array('User' => array('fields' => array('id', 'first_name', 'email')))));
			$o = $this->Order->find('first', array('conditions' => array('Order.id' => $this->data['OrderMessage']['order_id'])));

			if (!empty($o)) {
				if (empty($this->data['OrderMessage']['message'])) {
					echo $s;
					echo '<div class="alert alert-danger ">Please enter message</div>';
				} else {



					if (isset($this->data['OrderMessage']['file']['name']) && !empty($this->data['OrderMessage']['file']['name'])) {
						if (!file_exists('cdn/order_doc')) {
							mkdir('cdn/order_doc', 0777, true);
						}
						$img = $this->data['OrderMessage']['file'];
						$imgExt = strtolower(pathinfo($img['name'], PATHINFO_EXTENSION));
						$fName = rand(1234, 98765) . "_" . strtolower(pathinfo($img['name'], PATHINFO_FILENAME));
						$filename = strtolower(Inflector::slug($fName, '-')) . "." . $imgExt;
						if (in_array($imgExt, array('jpg', 'png', 'jpeg', 'pdf'))) {
							if (move_uploaded_file($img['tmp_name'], WWW_ROOT . 'cdn/order_doc/' . $filename)) {
								$Test_filename = WWW_ROOT . "cdn/order_doc/" . $filename;
								if (file_exists($Test_filename)) {
									$this->request->data['OrderMessage']['file_name'] = $filename;
								}
							}
						}
					}
					$this->request->data['OrderMessage']['sender_id'] = ME;
					$this->request->data['OrderMessage']['receiver_id'] = $o['Order']['user_id'];
					$this->request->data['OrderMessage']['is_new'] = 1;
					$this->OrderMessage->save($this->request->data);

					$parameters = array('NAME' => $o['User']['first_name'], 'ORDER_NUMBER' => $o['Order']['order_number'], 'MESSAGE' => $this->data['OrderMessage']['message']);
					$this->DATA->AppMail($o['User']['email'], 'MessageForOrder', $parameters, $dateTime = DATE);
					echo $s;
					echo '<div class="alert alert-success">Message sent.</div>';
					echo "<script> $('#s_msg').hide(); setTimeout(function(){ location.reload(); }, 1000);</script>";
				}
			} else {
				echo $s;
				echo '<div class="alert alert-danger ">Sorry, this is not working at the moment. Please try again later.</div>';
			}

			exit;
		}


		if (!empty($id)) {
			$this->Order->bindModel(array('belongsTo' => array('User' => array('fields' => array('id', 'first_name'))), 'hasMany' => array('OrderMessage')));

			$this->OrderMessage->bindModel(array('belongsTo' => array(
				'Receiver' => array('className' => 'User', 'foreignKey' => 'receiver_id', 'fields' => array('id', 'first_name', 'role')),
				'Sender' => array('className' => 'User', 'foreignKey' => 'sender_id', 'fields' => array('id', 'first_name', 'role'))

			)));

			$this->OrderMessage->updateAll(array('OrderMessage.is_new_admin' => 1), array('OrderMessage.order_id' => $id));
			$d = $this->Order->find('first', array('recursive' => 2, 'conditions' => array('Order.id' => $id)));


			if (!empty($d)) {
				$this->set('d', $d);
			} else {
				$this->layout = 'lab_404';
			}
		} else {
			$this->layout = 'lab_404';
		}
	}

	public function lab_all_message()
	{
		$this->set('title_for_layout', 'Customer\'s message : ' . WEBTITLE);

		$this->OrderMessage->bindModel(array('belongsTo' => array('Order')));
		$this->paginate = array('recursive' => 1, 'limit' => 30, 'group' => array('OrderMessage.order_id'), 'order' => array('Order.created' => 'DESC'));
		$data = $this->paginate('OrderMessage');
		$this->set('data', $data);
	}


	public function lab_update_insta($id = null)
	{
		$this->set('title_for_layout', 'Update instagram images : ' . WEBTITLE);
		$this->set('MenuHead', 'menu_insta');
		$this->loadModel('Instagram');

		if (!empty($id)) {
			$data = $this->Instagram->find('first', array('conditions' => array('Instagram.id' => $id)));
			if (empty($data)) {
				$this->layout = '404';
			}
			$this->set('e', $data);
		}

		if ($this->RequestHandler->isAjax() && !empty($this->data)) {

			if (!file_exists('cdn/instagram')) {
				mkdir('cdn/instagram', 0777, true);
			}

			if (filter_var($this->data['Instagram']['url'], FILTER_VALIDATE_URL) === false) {
				echo '<div class="alert alert-danger" role="alert">Please enter correct url.</div>';
			} elseif (empty($this->data['Instagram']['user_name'])) {
				echo '<div class="alert alert-danger" role="alert">Please enter USER NAME.</div>';
			} elseif (empty($this->data['Instagram']['img']['name'])) {
				echo '<div class="alert alert-danger" role="alert">Please select an image.</div>';
			} else {

				$imgExt = strtolower(pathinfo($this->data['Instagram']['img']['name'], PATHINFO_EXTENSION));
				$fName = strtolower(pathinfo($this->data['Instagram']['img']['name'], PATHINFO_FILENAME));
				$filename = strtolower(Inflector::slug($fName, '-')) . "." . $imgExt;
				if (in_array($imgExt, array('jpg', 'png', 'jpeg', 'gif'))) {
					if (move_uploaded_file($this->data['Instagram']['img']['tmp_name'], WWW_ROOT . 'cdn/instagram/' . $filename)) {
						$Test_filename = WWW_ROOT . "cdn/instagram/" . $filename;
						if (file_exists($Test_filename)) {

							$this->request->data['Instagram']['image'] = $filename;
							$this->Instagram->save($this->request->data);
							echo '<div class="alert alert-success" role="alert"> Updated</div>';
							echo "<script>location.reload();</script>";
						}
					}
				}
			}




			exit;
		}
	}

	public function lab_insta()
	{
		$this->set('title_for_layout', 'Instagram images : ' . WEBTITLE);
		$this->set('MenuHead', 'menu_insta');
		$this->loadModel('Instagram');

		if (isset($this->request->query['del']) && !empty($this->request->query['del'])) {
			$e = $this->Instagram->find('first', array('recursive' => -1, 'conditions' => array('Instagram.id' => $this->request->query['del'])));
			if (!empty($e)) {
				$this->Instagram->id = $e['Instagram']['id'];
				$this->Instagram->delete();
			}
			$this->redirect(SITEURL . "lab/labs/insta");
		}

		$this->paginate = array('recursive' => 1, 'limit' => 100, 'order' => array('Instagram.created' => 'DESC'));
		$data = $this->paginate('Instagram');
		$this->set('data', $data);
	}


	public function lab_shipping_label($id = null)
	{
		$this->layout = false;
		$this->OrderItem->bindModel(array('belongsTo' => array('Product' => array())));
		$this->Order->bindModel(array('hasMany' => array('OrderItem', 'OrderHistory' => array('order' => array('id' => 'DESC')))));
		$data = $this->Order->find('first', array('recursive' => 3, 'conditions' => array('Order.id' => $id)));
		if (!empty($data)) {
			$this->set('d', $data);
		} else {
			$this->layout = 'lab_404';
		}
	}
	public function lab_archive()
	{
		$this->set('title_for_layout', 'Archive Order : ' . WEBTITLE);
		$c = array('Order.hide' => 1);
		$q = $this->request->query;
		if (isset($q['s']) && !empty($q['s'])) {
			$c[] = array('Order.order_status_id' => $q['s']);
		}
		if (isset($q['p']) && !empty($q['p'])) {
			$c[] = array('Order.payment_by' => $q['p']);
		}
		if (isset($q['t']) && !empty($q['t'])) {
			$c[] = array('Order.grand_total' => $q['t']);
		}


		$this->Order->bindModel(array(
			'belongsTo' => array('User', 'World' => array('foreignKey' => 'shipping_country', 'fields' => array('id', 'name'))),
			'hasMany' => array('OrderMessages' => array('conditions' => array('OrderMessages.is_new_admin' => 0), 'limit' => 1))
		));
		$this->paginate = array(
			'recursive' => 1, 'conditions' => $c,
			'maxLimit' => 30, 'limit' => 30, 'order' => array('Order.id' => 'DESC')
		);
		$data = $this->paginate('Order');

		$paging = $this->params['paging'];
		$this->set(compact('data', 'paging', 'q'));
	}
	public function lab_order_users()
	{
		$this->set('title_for_layout', 'Customer\'s Order : ' . WEBTITLE);
		$c = array('Order.order_status_id NOT' => 0);
		$q = $this->request->query;
		if (isset($q['s']) && !empty($q['s'])) {
			$c[] = array('Order.order_status_id' => $q['s']);
		}
		if (isset($q['p']) && !empty($q['p'])) {
			$c[] = array('Order.payment_by' => $q['p']);
		}
		if (isset($q['t']) && !empty($q['t'])) {
			$c[] = array('Order.grand_total' => $q['t']);
		}

		$this->paginate = array(
			'recursive' => 1, 'conditions' => $c,
			'maxLimit' => 30, 'limit' => 30, 'order' => array('Order.id' => 'DESC')
		);
		$data = $this->paginate('Order');

		$paging = $this->params['paging'];
		$this->set(compact('data', 'paging', 'q'));
	}

	public function lab_order_users_advance()
	{


		$this->Order->bindModel(array(
			'belongsTo' => array('User', 'World' => array('foreignKey' => 'shipping_country', 'fields' => array('id', 'name'))),
			'hasMany' => array('OrderMessages' => array('conditions' => array('OrderMessages.is_new_admin' => 0), 'limit' => 1))
		));
		if ($this->request->is('ajax')) {
			$searchData = $this->request->data['name_value'];
			$this->paginate = array(
				'limit' => 100,
				'conditions' => array(
					'User.role' => array(1, 2), 'Order.hide' => 0, 'Order.order_status_id NOT' => 0,
					'or' => array(
						"Order.order_number" => $searchData,
						"User.first_name" => $searchData,
						"User.last_name" => $searchData,
						"User.email" => $searchData,
						"User.email LIKE" => "%" . $searchData . "%",
					)
				), 'order' => array('Order.created' => 'DESC')
			);
			$data = $this->paginate('Order');
			$this->set('data', $data);
		} else {
			exit;
		}
	}

	public function lab_order_dealers_advance()
	{
		$this->Order->bindModel(array('belongsTo' => array('User')));
		if ($this->request->is('ajax')) {
			$searchData = $this->request->data['name_value'];
			$this->paginate = array(
				'limit' => 100,
				'conditions' => array(
					'User.role' => array(3), 'Order.hide' => 0, 'Order.order_status_id NOT' => 0,
					'or' => array(
						"Order.order_number" => $searchData,
						"User.first_name" => $searchData,
						"User.last_name" => $searchData,
						"User.email" => $searchData,
						"User.email LIKE" => "%" . $searchData . "%",
					)
				), 'order' => array('Order.created' => 'DESC')
			);
			$data = $this->paginate('Order');
			$this->set('data', $data);
		} else {
			exit;
		}
	}

	public function lab_hide_order($id = null)
	{
		$this->autoRender = false;
		if (!empty($id)) {
			$d = $this->Order->find('first', array('conditions' => array('Order.id' => $id, 'Order.order_status_id NOT' => array(1, 2, 13))));
			if (!empty($d)) {
				$oArr = array('id' => $id, 'hide' => 1);
				$this->Order->save($oArr);
			}
			$this->redirect($this->referer());
		}
	}

	public function lab_order_dealers()
	{
		$this->set('title_for_layout', 'Dealer Order : ' . WEBTITLE);
		$c = array('User.role' => array(3), 'Order.hide' => 0, 'Order.order_status_id NOT' => 0);
		$q = $this->request->query;
		if (isset($q['s']) && !empty($q['s'])) {
			$c[] = array('Order.order_status_id' => $q['s']);
		}
		if (isset($q['p']) && !empty($q['p'])) {
			$c[] = array('Order.payment_by' => $q['p']);
		}
		if (isset($q['t']) && !empty($q['t'])) {
			$c[] = array('Order.grand_total' => $q['t']);
		}


		$this->Order->bindModel(array('belongsTo' => array('User')));
		$this->paginate = array(
			'recursive' => 1, 'conditions' => $c,
			'maxLimit' => 30, 'limit' => 30, 'order' => array('Order.id' => 'DESC')
		);
		$data = $this->paginate('Order');

		$paging = $this->params['paging'];
		$this->set(compact('data', 'paging', 'q'));
	}


	public function lab_view_order($id = null)
	{
		$this->set('title_for_layout', 'Order details : ' . WEBTITLE);
		$this->OrderItem->bindModel(array('belongsTo' => array('Product' => array())));
		$this->Order->bindModel(array('hasMany' => array('OrderItem', 'OrderHistory' => array('order' => array('id' => 'DESC')))));
		$data = $this->Order->find('first', array('recursive' => 3, 'conditions' => array('Order.id' => $id)));
		if (!empty($data)) {
			$this->set('d', $data);
		} else {
			$this->layout = 'lab_404';
		}
	}

	public function lab_update_order($id = null)
	{
		$this->autoRender = false;
		if ($this->request->is('ajax') && !empty($this->data)) {
			$s = "<script>$('#preloader').hide();</script>";
			if ($this->data['type'] == 'update' && !empty($this->data['id']) && !empty($this->data['st'])) {
				if (in_array($this->data['st'], array(3)) && empty($this->data['tu']) && empty($this->data['tn'])) {
					echo $s;
					echo '<div class="alert alert-danger fadeIn animated">Pelease enter Tracking Number and URL.</div>';
					exit;
				}
				$this->Order->bindModel(array('hasMany' => array('OrderItem', 'OrderHistory')));
				$data = $this->Order->find('first', array('recursive' => 2, 'conditions' => array('Order.id' => $this->data['id'])));
				if (!empty($data)) {
					$order_status = $this->DATA->order_status();
					if (!empty($data['OrderHistory'])) {
						foreach ($data['OrderHistory'] as $h_list) {
							if ($this->data['st'] == $h_list['order_status_id']) {
								echo $s;
								echo '<div class="alert alert-danger fadeIn animated">This Status already updated. Please select different status.</div>';
								exit;
							}
						}
					}
					$o_item = [];
					if (!empty($data['OrderItem'])) {
						foreach ($data['OrderItem'] as $list) {
							if (in_array($this->data['st'], array(3))) {
								$chk_pro = $this->Product->find('first', ['recursive' => -1, 'conditions' => ['Product.id' => $list['product_id']]]);
								if (!empty($chk_pro)) {
									if ($chk_pro['Product']['quantity'] >= $list['quantity']) {
										$o_item[] = ['id' => $chk_pro['Product']['id'], 'quantity' => $chk_pro['Product']['quantity'] - $list['quantity'], 'total_order' => $chk_pro['Product']['total_order'] + $list['quantity']];
									} else {
										echo $s;
										echo '<div class="alert alert-danger fadeIn animated">You don not have enough product quantity ( Product ID #' . $list['product_id'] . ' )</div>';
										exit;
									}
								} else {
									echo $s;
									echo '<div class="alert alert-danger fadeIn animated">Product ID #' . $list['product_id'] . ' not found.</div>';
									exit;
								}
								//$this->Product->updateAll(array('Product.quantity' => 'Product.quantity - '.$list['quantity'].'','Product.total_order' => 'Product.total_order + '.$list['quantity'].''), array('Product.id' =>$list['product_id']));
								if (!empty($o_item)) {
									$this->Product->saveAll($o_item);
								}
							}
						}
					}

					$OrderHistoryArr = array('id' => null, 'order_id' => $data['Order']['id'], 'order_status_id' => $this->data['st'], 'comment' => $this->data['msg']);
					$this->OrderHistory->save($OrderHistoryArr);
					$OrderArr = array('id' => $data['Order']['id'], 'order_status_id' => $this->data['st']);
					if ($this->data['st'] == 3) {
						$OrderArr['tracking'] = $this->data['tu'];
						$OrderArr['tracking_number'] = $this->data['tn'];
					}

					$this->Order->save($OrderArr);

					$body = $this->DATA->em_status();
					$pa = array('ORDER_NUMBER' => $data['Order']['order_number'], 'STATUS' => @$order_status[$this->data['st']], 'NAME' => $data['Order']['first_name'], 'MESSAGE' => $this->data['msg'], 'BODY' => $body);
					$this->DATA->AppMail($data['Order']['email'], 'OrderUpdated', $pa, DATE, 2);
					if ($this->data['st'] == 3 && $data['Order']['region'] == 1) {
						//$this->DATA->AppMail('tracking@vividracing.com', 'OrderUpdated', $pa, DATE, 2);
					}

					echo $s;
					echo '<div class="alert alert-success fadeIn animated">Order status has been updated. An email will be sent to client.</div>';
					echo "<script> $('#up_o').remove(); setTimeout(function(){ location.reload(); }, 100);</script>";
				} else {
					echo $s;
				}
			}
		}
		if (!empty($data)) {
			$this->set('d', $data);
		} else {
			$this->layout = 'lab_404';
		}
	}


	public function lab_membership()
	{
		$this->set('title_for_layout', 'Dealer Membership : ' . WEBTITLE);
		$data = $this->DealerLevel->find('all', array('order' => array('DealerLevel.id' => 'ASC')));
		$this->set('data', $data);
	}
	public function lab_edit_level($id = null)
	{
		$this->set('title_for_layout', 'Dealer Membership : ' . WEBTITLE);
		$data = $this->DealerLevel->find('first', array('conditions' => array('DealerLevel.id' => $id)));
		if (!empty($data)) {
			$this->set('data', $data);
		} else {
			$this->layout = 'lab_404';
		}

		if (!empty($this->data)) {

			if ($this->DealerLevel->save($this->data)) {
				$this->Session->setFlash(__('Saved.'), 'default', array('class' => 'alert alert-success'), 'msg');
				$this->redirect($this->referer());
			} else {
				$this->Session->setFlash(__('Not saved'), 'default', array('class' => 'alert alert-danger'), 'msg');
			}
		}
	}



	public function lab_add_extra_product()
	{
		$this->set('title_for_layout', 'Extra Product');

		$data = null;
		if (isset($this->request->query['edit'])) {
			$e = $this->Product->find('first', array('recursive' => -1, 'conditions' => array('Product.type' => 4, 'Product.id' => $this->request->query['edit'])));
			if (!empty($e)) {
				if (!empty($e['Product']['extra_photos'])) {
					$mid = explode(',', $e['Product']['extra_photos']);
					$pics = $this->Library->find('all', array('conditions' => array('Library.id' => $mid)));
					$newIDS = array();
					if (!empty($pics)) {
						foreach ($pics as $plist) {
							$newIDS[] = $plist['Library']['id'];
						}
					}
					if (!empty($newIDS)) {
						$id_str = implode(',', $newIDS);
						$abc_arr = array('id' => $e['Product']['id'], 'extra_photos' => $id_str);
						$this->Product->save($abc_arr);
					}
				}
				$this->set(compact('e', 'pics'));
			} else {
				$this->layout = 'lab_404';
			}
		}

		$this->set(compact('data'));


		if ($this->RequestHandler->isAjax()) {
			$s = "<script>btnState();</script>";

			if (empty($this->data['Product']['description'])) {
				echo $s;
				echo '<div class="alert alert-danger" role="alert"> Please enter product description.</div>';
				exit;
			} else {
				$this->request->data['Product']['slug'] = strtolower(Inflector::slug($this->data['Product']['slug'], '-'));
				$this->request->data['Product']['status'] = 1;
				$this->request->data['Product']['type'] = 4;

				if (!empty($this->request->data['Product']['size_list'])) {
					$this->request->data['Product']['sizes'] = json_encode($this->request->data['Product']['size_list']);
				}

				$this->Product->set($this->request->data);
				if ($this->Product->validates()) {
					$this->Product->save($this->request->data);

					$u =  $this->referer();
					echo '<div class="alert alert-success" role="alert"> Added</div>';
					echo "<script>setTimeout(function(){ window.location.href ='" . $u . "'; }, 500);</script>";
				} else {
					$str = null;
					$errors = $this->Product->validationErrors;
					if (!empty($errors)) {
						foreach ($errors as $err) {
							$str .= $err[0] . "<br>";
						}
						echo '<script>btnState();</script><div class="alert alert-danger fadeIn animated">' . $str . '</div>';
					}
				}
			}
			exit;
		}
	}
	public function lab_extra_product()
	{
		$this->set('title_for_layout', 'All Extra product : ' . WEBTITLE);

		if (isset($this->request->query['del']) && !empty($this->request->query['del'])) {
			$e = $this->Product->find('first', array('recursive' => -1, 'conditions' => array('Product.type' => 4, 'Product.id' => $this->request->query['del'])));
			if (!empty($e)) {
				$this->Product->id = $e['Product']['id'];
				$this->Product->delete();
			}
			$this->redirect(SITEURL . "lab/labs/extra_product");
		}

		if (isset($this->request->query['status']) && !empty($this->request->query['status'])) {
			$d = $this->Product->find('first', array('conditions' => array('Product.id' => $this->request->query['status'])));

			if (!empty($d)) {
				$st = 1;
				if ($d['Product']['status'] == 1) {
					$st = 0;
				} elseif ($d['Product']['status'] == 0) {
					$st = 1;
				}
				$arr = array('id' => $d['Product']['id'], 'status' => $st);
				$this->Product->save($arr);
			}
			$this->redirect($this->referer());
		}

		$this->paginate = array(
			'recursive' => -1, 'conditions' => array('Product.type' => 4),
			'maxLimit' => 30, 'limit' => 30, 'order' => array('Product.id' => 'DESC')
		);
		$data = $this->paginate('Product');
		$paging = $this->params['paging'];
		$this->set(compact('data', 'paging'));
	}



	public function lab_up_pro()
	{
		$this->autoRender = false;
		if ($this->request->is('ajax')) {
			$s = "<script>$('#preloader').hide();</script>";
			if (!empty($this->data)) {
				if (isset($this->data['tbl']) && $this->data['tbl'] == 'motorcycle') {
					$arr = array('id' => $this->data['pid'], 'product_ids' => trim($this->data['ids']));
					$this->Motorcycle->save($arr);
					echo "<script>$.magnificPopup.close(); location.reload();</script>";
				} else {
					if ($this->data['type'] == 'cat-back') {
						$type = 2;
						$f = 'cat_back_ids';
					} elseif ($this->data['type'] == 'catalytic') {
						$type = 3;
						$f = 'catalytic_ids';
					} elseif ($this->data['type'] == 'accessory') {
						$type = 5;
						$f = 'accessory_ids';
					}
					if (isset($type) && $f) {
						$arr = array('id' => $this->data['pid'], $f => trim($this->data['ids']));

						$this->ItemDetail->save($arr);
						echo "<script>$.magnificPopup.close(); location.reload();</script>";
					} else {
						echo $s;
						echo "<script>$.magnificPopup.close(); location.reload();</script>";
					}
				}
			}
		}
	}

	public function lab_add_product($id = null, $type = null)
	{
		if ($this->request->is('ajax')) {
			$aj = 'yes';
			$q = $this->request->query;
			$i = $this->ItemDetail->find('first', array('conditions' => array('ItemDetail.id' => $id)));
			if (!empty($i)) {
				if ($type == 'cat-back') {
					$t = 2;
				} elseif ($type == 'catalytic') {
					$t = 3;
				} elseif ($type == 'accessory') {
					$t = 5;
				}
				if (isset($t)) {
					$list = $this->Product->find('all', array('conditions' => array('Product.type' => $t, 'Product.brand_id' => $i['ItemDetail']['brand_id'], 'Product.model_id' => $i['ItemDetail']['model_id'], 'Product.motor_id' => $i['ItemDetail']['motor_id'])));
				}
			}
			$this->set(compact('aj', 'id', 'type', 'q', 'list', 'i'));
		} else {
			$this->layout = false;
		}
	}


	public function lab_all_make($id = null)
	{
		$this->set('title_for_layout', 'Make : ' . WEBTITLE);

		if (isset($this->request->query['status']) && !empty($this->request->query['status'])) {
			$list = $this->Brand->find('first', array('conditions' => array('Brand.id' => $this->request->query['status'])));
			if (!empty($list)) {
				if ($list['Brand']['status'] == 1) {
					$st = 0;
				} else {
					$st = 1;
				}
				$arr = array('id' => $list['Brand']['id'], 'status' => $st);
				$this->Brand->save($arr);
				$this->redirect(SITEURL . "lab/labs/all_make");
			}
		}

		if (!empty($id)) {
			$e = $this->Brand->find('first', array('conditions' => array('Brand.id' => $id)));
			$this->set('e', $e);
		}
		$data = $this->Brand->find('all', array('order' => array('Brand.name' => 'ASC')));
		$this->set('data', $data);
		if ($this->RequestHandler->isAjax()) {
			$d = null;
			if (empty($this->data['id'])) {
				$d = $this->Brand->find('count', array('conditions' => array('Brand.name' => $this->data['name'])));
			}
			if ($d > 0) {
				echo '<div class="alert alert-info" role="alert"> This Brand name already exist.</div>';
			} else {
				$array = array('id' => $this->data['id'], 'name' => $this->data['name']);
				$this->Brand->save($array);
				echo '<div class="alert alert-success" role="alert"> Added</div>';
				echo "<script>setTimeout(function(){ window.location.href ='" . SITEURL . "lab/labs/all_make'; }, 1000);</script>";
			}
			exit;
		}
	}

	public function lab_all_model($id = null)
	{
		$this->set('title_for_layout', 'Manage All Models');

		if (isset($this->request->query['status']) && !empty($this->request->query['status'])) {
			$list = $this->Model->find('first', array('conditions' => array('Model.id' => $this->request->query['status'])));
			if (!empty($list)) {
				if ($list['Model']['status'] == 1) {
					$st = 0;
				} else {
					$st = 1;
				}
				$arr = array('id' => $list['Model']['id'], 'status' => $st);
				$this->Model->save($arr);
				//$this->redirect(SITEURL . "lab/labs/all_model");
				$this->redirect($this->referer());
			}
		}

		$this->Model->bindModel(array('belongsTo' => array('Brand')));
		$brand = $this->Brand->find('list', array('order' => array('Brand.name' => 'ASC'), 'fields' => array('id', 'name')));
		$c = [];
		if (!empty($id)) { $c = array('Model.brand_id' => $id); }
		$this->paginate = array('limit' => 200, 'conditions' => $c, 'order' => array('Model.pos' => 'ASC'));
		$model = $this->paginate('Model');
		

		if (isset($_GET['edit']) && !empty($_GET['edit'])) {
			$e = $this->Model->find('first', array('conditions' => array('Model.id' => $_GET['edit'])));
			$this->set('e', $e);
		}

		$this->set(compact('brand', 'model', 'id'));

		if ($this->RequestHandler->isAjax()) {

			if (empty($this->data['brand_id'])) {
				echo '<div class="alert alert-info" role="alert"> Please select brand name.</div>';
			} elseif (empty($this->data['name'])) {
				echo '<div class="alert alert-info" role="alert"> Please enter model name</div>';
			} else {
				$a = array('id' => $this->data['id'], 'brand_id' => $this->data['brand_id'], 'name' => $this->data['name']);
				$this->Model->save($a);
				echo '<div class="alert alert-success" role="alert"> Added</div>';
				echo "<script>setTimeout(function(){ window.location.href ='" . SITEURL . "lab/labs/all_model/" . $this->data['brand_id'] . "'; }, 1000);</script>";
			}
			exit;
		}
	}


	public function lab_all_motor($id = null, $mid = null)
	{
		$this->set('title_for_layout', 'Manage All Motors');

		if (isset($this->request->query['status']) && !empty($this->request->query['status'])) {
			$list = $this->Motor->find('first', array('conditions' => array('Motor.id' => $this->request->query['status'])));
			if (!empty($list)) {
				if ($list['Motor']['status'] == 1) {
					$st = 0;
				} else {
					$st = 1;
				}
				$arr = array('id' => $list['Motor']['id'], 'status' => $st);
				$this->Motor->save($arr);
				$this->redirect($this->referer());
			}
		}

		$this->Model->bindModel(array('belongsTo' => array('Brand')));
		$this->Motor->bindModel(array('belongsTo' => array('Model', 'Brand', 'Library')));

		$brand = $this->Brand->find('list', array('order' => array('Brand.name' => 'ASC'), 'fields' => array('id', 'name')));
		$c = [];
		if (!empty($id)) {
			$c[] = array('Model.brand_id' => $id);
		}
		$model_list = $this->Model->find('list', array('conditions' => $c, 'order' => array('Model.name' => 'ASC'), 'fields' => array('id', 'name')));

		$c = array();
		if (!empty($id)) {
			$c[] = array('Motor.brand_id' => $id);
		}
		if (!empty($mid)) {
			$c[] = array('Motor.model_id' => $mid);
		}
		$this->paginate = array('maxLimit' => 500, 'limit' => 500, 'conditions' => $c, 'order' => array('Motor.id' => 'DESC'));
		$data = $this->paginate('Motor');


		if (isset($_GET['edit']) && !empty($_GET['edit'])) {
			$e = $this->Motor->find('first', array('conditions' => array('Motor.id' => $_GET['edit'])));
			$this->set('e', $e);
		}

		$this->set(compact('brand', 'id', 'model_list', 'mid', 'data'));

		if ($this->RequestHandler->isAjax()) {
			$item_arr = [];
			$this->Motor->bindModel(['hasOne' => ['ItemDetail' => ['conditions' => ['ItemDetail.language' => 'eng']]]]);
			$chk = $this->Motor->find('first', ['conditions' => ['Motor.id' => $this->data['id']]]);
			if (isset($chk['ItemDetail']['id']) && !empty($chk['ItemDetail']['id'])) {
				$item_arr = ['id' => $chk['ItemDetail']['id'], 'model_id' => $this->data['model_id']];
			} else {
				$item_data = $this->ItemDetail->find('first', ['conditions' => ['ItemDetail.brand_id' => $this->data['brand_id'], 'ItemDetail.model_id' => $this->data['model_id'], 'ItemDetail.motor_id' => $this->data['id'], 'ItemDetail.language' => 'eng']]);
				if (isset($item_data['ItemDetail']['id']) && !empty($item_data['ItemDetail']['id'])) {
					$item_arr = ['id' => $item_data['ItemDetail']['id'], 'model_id' => $this->data['model_id']];
				}
			}

			$d = 0;
			if (empty($this->data['brand_id'])) {
				echo '<div class="alert alert-info" role="alert"> Please select brand name.</div>';
			} elseif (empty($this->data['model_id'])) {
				echo '<div class="alert alert-info" role="alert"> Please select model name.</div>';
			} elseif (empty($this->data['name'])) {
				echo '<div class="alert alert-info" role="alert"> Please enter motor name</div>';
			} else {

				if (empty($this->data['id'])) {
					$d = $this->Motor->find('count', array('conditions' => array('Motor.name' => $this->data['name'], 'Motor.model_id' => $this->data['model_id'])));
				}
				if ($d > 0) {
					echo '<div class="alert alert-danger" role="alert"> This Motor name already exist.</div>';
				} else {
					$a = array('id' => $this->data['id'], 'brand_id' => $this->data['brand_id'], 'model_id' => $this->data['model_id'], 'name' => $this->data['name']);
					$this->Motor->save($a);
					if (!empty($item_arr)) {
						$this->ItemDetail->save($item_arr);
					}
					echo '<div class="alert alert-success" role="alert"> Added</div>';
					echo "<script>setTimeout(function(){ window.location.href ='" . SITEURL . "lab/labs/all_motor/" . $this->data['brand_id'] . "/" . $this->data['model_id'] . "'; }, 1000);</script>";
					//echo "<script>setTimeout(function(){ location.reload(); }, 1000);</script>";

				}
			}
			exit;
		}
	}

	

	public function lab_delete_photo($id)
	{
		$this->autoRender = false;
		if (!empty($id) && $this->request->query['url']) {

			$arr = array('id' => $id, 'more_photo' => null);
			$this->Product->save($arr);
			$this->redirect($this->request->query['url']);
		}
	}

	public function lab_new_tuning_box($brand_id = null, $model_id = null, $engine_id = null)
	{
		$this->set('title_for_layout', 'All New Tuning box');
		$engList = null;
		$c = array();

		$brand = $this->Brand->find('list', array('order' => array('Brand.name' => 'ASC'), 'fields' => array('id', 'name')));

		if (!empty($brand_id)) {
			$c = array('Model.brand_id' => $brand_id);
		}
		$model_list = $this->Model->find('list', array('conditions' => $c, 'order' => array('Model.name' => 'ASC'), 'fields' => array('id', 'name')));
		//ec($model_list); die;

		if (!empty($model_id)) {
			$engList = $this->Motor->find('list', array('conditions' => array('Motor.model_id' => $model_id), 'order' => array('Motor.name' => 'ASC'), 'fields' => array('id', 'name')));
		}

		if (isset($this->request->query['edit'])) {
			$e = $this->Product->find('first', array('conditions' => array('Product.type' => 1, 'Product.id' => $this->request->query['edit'])));

			if (empty($e)) {
				$this->layout = 'lab_404';
			}
			$this->set('e', $e);
		}

		$this->set(compact('brand', 'model_list', 'engList', 'brand_id', 'model_id', 'engine_id'));

		if ($this->RequestHandler->isAjax()) {
			$s = "<script>btnState();</script>";

			if (empty($this->data['Product']['description'])) {
				echo $s;
				echo '<div class="alert alert-danger" role="alert"> Please enter product description.</div>';
				exit;
			} elseif (empty($this->data['Product']['img'][0]) && empty($this->data['Product']['id'])) {
				echo $s;
				echo '<div class="alert alert-danger" role="alert"> Please select at least one photo for product.</div>';
				exit;
			} else {
				$extImg = array('jpg', 'jpeg', 'png');
				$isExt = $noExt = $err = $Moreerr = $MoreisExt = $MorenoExt = 0;
				$imgArr = $MoreimgArr = array();


				if (empty($this->data['Product']['id']) ||  !empty($this->data['Product']['img'][0])) {
					foreach ($this->data['Product']['img'] as $imgList) {
						$imgFilename = $imgList['name'];
						$imgExt = strtolower(pathinfo($imgFilename, PATHINFO_EXTENSION));
						if (in_array($imgExt, $extImg)) {
							$isExt++;
						} else {
							$MorenoExt++;
						}
					}
				}

				if (empty($this->data['Product']['id']) ||  !empty($this->data['Product']['more_photos'][0])) {
					foreach ($this->data['Product']['more_photos'] as $imgList) {
						if (isset($imgList['name']) && !empty($imgList['name'])) {
							$imgFilename = $imgList['name'];
							$imgExt = strtolower(pathinfo($imgFilename, PATHINFO_EXTENSION));
							if (in_array($imgExt, $extImg)) {
								$MoreisExt++;
							} else {
								$noExt++;
							}
						}
					}
				}

				if ($noExt > 0) {
					echo $s;
					echo '<div class="alert alert-danger" role="alert"> Please upload png and jpg files only.</div>';
					exit;
				}
				if ($MorenoExt > 0) {
					echo $s;
					echo '<div class="alert alert-danger" role="alert"> Please upload png and jpg files only.</div>';
					exit;
				}

				$name = $this->data['Product']['title'] . "-" . rand(1, 999);
				$slug = strtolower(Inflector::slug($name, '-'));
				if (empty($this->data['Product']['id'])) {
					$this->request->data['Product']['slug'] = $slug;
				}
				$this->request->data['Product']['status'] = 1;


				if (empty($this->data['Product']['id']) || !empty($this->data['Product']['img'][0])) {
					foreach ($this->data['Product']['img'] as $imgList) {
						$file_name = uniqid('armytrix_');
						$file_slug = strtolower(Inflector::slug($file_name, '_'));
						$imgFilename = $imgList['name'];
						$imgExt = strtolower(pathinfo($imgFilename, PATHINFO_EXTENSION));
						$iName = $file_slug . "." . $imgExt;
						$Image_path = 'cdn/cdnimg/' . $iName;
						try {
							if (move_uploaded_file($imgList['tmp_name'], $Image_path)) {
								if (file_exists($Image_path)) {
									$r = $this->DATA->compress_image($Image_path, $Image_path, 65);
									$imgArr[] = $iName;
								}
							}
						} catch (Exception $e) {
							$err++;
						}
					}
				}


				if (empty($this->data['Product']['id']) || !empty($this->data['Product']['more_photos'][0])) {
					foreach ($this->data['Product']['more_photos'] as $imgList) {
						if (isset($imgList['name']) && !empty($imgList['name'])) {
							$file_name = uniqid('armytrix_photo_');
							$file_slug = strtolower(Inflector::slug($file_name, '_'));
							$imgFilename = $imgList['name'];
							$imgExt = strtolower(pathinfo($imgFilename, PATHINFO_EXTENSION));
							$iName = $file_slug . "." . $imgExt;
							$Image_path = 'cdn/cdnimg/' . $iName;
							try {
								if (move_uploaded_file($imgList['tmp_name'], $Image_path)) {
									if (file_exists($Image_path)) {
										$r = $this->DATA->compress_image($Image_path, $Image_path, 65);
										$MoreimgArr[] = $iName;
									}
								}
							} catch (Exception $e) {
								$Moreerr++;
							}
						}
					}
				}

				if ($err > 0) {
					echo $s;
					echo '<div class="alert alert-danger" role="alert">Error during image uploading. please try again later.</div>';
					exit;
				} else {
					if (!empty($imgArr)) {
						$this->request->data['Product']['images'] = json_encode($imgArr);
					}
				}

				if ($Moreerr > 0) {
					echo $s;
					echo '<div class="alert alert-danger" role="alert">Error during image uploading. please try again later.</div>';
					exit;
				} else {
					if (!empty($MoreimgArr)) {
						$this->request->data['Product']['more_photo'] = json_encode($MoreimgArr);
					}
				}

				$this->Product->set($this->request->data);
				if ($this->Product->validates()) {
					$this->Product->save($this->request->data);
					$u = SITEURL . "lab/labs/tuning_box";
					$u =  $this->referer();
					echo '<div class="alert alert-success" role="alert"> Added</div>';
					echo "<script>setTimeout(function(){ window.location.href ='" . $u . "'; }, 500);</script>";
				} else {
					$str = null;
					$errors = $this->Product->validationErrors;
					if (!empty($errors)) {
						foreach ($errors as $err) {
							$str .= $err[0] . "<br>";
						}
						echo '<script>btnState();</script><div class="alert alert-danger fadeIn animated">' . $str . '</div>';
					}
				}
			}
			exit;
		}
	}


	public function lab_tuning_box()
	{
		$this->set('title_for_layout', 'All Tuning box');

		if (isset($this->request->query['status']) && !empty($this->request->query['status'])) {
			$list = $this->Product->find('first', array('conditions' => array('Product.id' => $this->request->query['status'])));
			if (!empty($list)) {
				if ($list['Product']['status'] == 1) {
					$st = 0;
				} else {
					$st = 1;
				}
				$arr = array('id' => $list['Product']['id'], 'status' => $st);
				$this->Product->save($arr);
				$this->redirect($this->referer());
			}
		}

		$this->Product->bindModel(array('belongsTo' => array('Model', 'Brand', 'Motor')));

		$this->paginate = array(
			'limit' => 50,
			'conditions' => array('Product.type' => 1), 'order' => array('Product.id' => 'DESC')
		);
		$data = $this->paginate('Product');
		$this->set('data', $data);
	}



	public function lab_up_details()
	{
		$this->autoRender = false;
		if ($this->request->is('ajax')) {

			if ($this->data['type'] == 'del' && !empty($this->data['id']) && !empty($this->data['lid'])) {

				$d = $this->ItemDetail->find('first', array('conditions' => array('ItemDetail.id' => $this->data['id'])));
				if (!empty($d)) {

					if ($this->data['dtype'] == 'gallery') {
						$f = explode(',', $d['ItemDetail']['gallery']);
						$array_to_remove = array($this->data['lid']);
						$final_array = array_diff($f, $array_to_remove);
						$final_array = implode(',', $final_array);
						$final_array = trim($final_array, ',');
						$arr = array('id' => $d['ItemDetail']['id'], 'gallery' => $final_array);
					} elseif ($this->data['dtype'] == 'slider') {
						$f = explode(',', $d['ItemDetail']['slider']);
						$array_to_remove = array($this->data['lid']);
						$final_array = array_diff($f, $array_to_remove);
						$final_array = implode(',', $final_array);
						$final_array = trim($final_array, ',');
						$arr = array('id' => $d['ItemDetail']['id'], 'slider' => $final_array);
					} elseif ($this->data['dtype'] == 'slider_tt') {
						$f = explode(',', $d['ItemDetail']['tt_slider']);
						$array_to_remove = array($this->data['lid']);
						$final_array = array_diff($f, $array_to_remove);
						$final_array = implode(',', $final_array);
						$final_array = trim($final_array, ',');
						$arr = array('id' => $d['ItemDetail']['id'], 'tt_slider' => $final_array);
					}
					if (!empty($arr)) {
						$this->ItemDetail->save($arr);
					}
				}
			} elseif ($this->data['type'] == 'slider' && !empty($this->data['id'])) {

				$d = $this->ItemDetail->find('first', array('conditions' => array('ItemDetail.id' => $this->data['id'])));
				if (!empty($d)) {
					if ($this->data['slider_for'] == 1) {
						$f = explode(',', $d['ItemDetail']['slider']);
						$n = explode(',', $this->data['slider']);
						$r = array_merge($f, $n);
						$r = array_unique($r);
						$str = implode(',', $r);
						$str = trim($str, ',');
						$arr = array('id' => $d['ItemDetail']['id'], 'slider' => $str);
						$this->ItemDetail->save($arr);
					} elseif ($this->data['slider_for'] == 2) {
						$f = explode(',', $d['ItemDetail']['tt_slider']);
						$n = explode(',', $this->data['slider']);
						$r = array_merge($f, $n);
						$r = array_unique($r);
						$str = implode(',', $r);
						$str = trim($str, ',');
						$arr = array('id' => $d['ItemDetail']['id'], 'tt_slider' => $str);
						$this->ItemDetail->save($arr);
					}
				}
			} elseif ($this->data['type'] == 'galery' && !empty($this->data['id'])) {
				$d = $this->ItemDetail->find('first', array('conditions' => array('ItemDetail.id' => $this->data['id'])));
				if (!empty($d)) {
					$f = explode(',', $d['ItemDetail']['gallery']);
					$n = explode(',', $this->data['slider']);
					$r = array_merge($f, $n);
					$r = array_unique($r);
					$str = implode(',', $r);
					$str = trim($str, ',');
					$arr = array('id' => $d['ItemDetail']['id'], 'gallery' => $str);
					$this->ItemDetail->save($arr);
				}
			} elseif ($this->data['type'] == 'q_images' && !empty($this->data['id'])) {
				$arr = explode(',', $this->data['slider']);
				if (!empty($arr)) {
					foreach ($arr as $k => $v) {
						if (!empty($v)) {

							$iq = $this->QualityDetail->find('count', array('conditions' => array('QualityDetail.item_detail_id' => $this->data['id'], 'QualityDetail.library_id' => $v)));
							if ($iq == 0) {
								$sArr = array('id' => null, 'item_detail_id' => $this->data['id'], 'library_id' => $v);

								$this->request->data['QualityDetail']['item_detail_id'] = $this->data['id'];
								$this->request->data['QualityDetail']['library_id'] = $v;
								$this->QualityDetail->save($this->request->data);
							}
						}
					}
				}
			}
		}
	}

	public function lab_add_utube()
	{
		$this->autoRender = false;
		if (!empty($this->data)) {
			$vi = trim($this->data['ItemDetail']['vid']);
			if (empty($vi)) {
				$this->Session->setFlash(__('Please enter valid Youtube ID/URL'), 'default', array('class' => 'alert alert-danger'), 'msg');
			} else {
				$d = $this->ItemDetail->find('first', array('conditions' => array('ItemDetail.id' => $this->data['ItemDetail']['id'])));
				if (!empty($d)) {
					$vid = null;
					if (filter_var($this->data['ItemDetail']['vid'], FILTER_VALIDATE_URL)) {
						$t = $this->DATA->parse_yturl($this->data['ItemDetail']['vid']);
						if (empty($t)) {
							$this->Session->setFlash(__('Invalide Youtube video URL.'), 'default', array('class' => 'alert alert-danger'), 'msg');
							$this->redirect($this->referer());
						} else {
							$vid = $t;
						}
					} else {
						$vid = $this->data['ItemDetail']['vid'];
					}

					if (!empty($vid)) {
						$arr = array('item_detail_id' => $d['ItemDetail']['id'], 'video' => $vid);
						$this->Video->save($arr);
						$this->Session->setFlash(__('Youtube video saved.'), 'default', array('class' => 'alert alert-success'), 'msg');
					} else {
						$this->Session->setFlash(__('Not saved'), 'default', array('class' => 'alert alert-danger'), 'msg');
					}
				}
			}
			$this->redirect($this->referer());
		}
	}



	public function lab_all_car_details()
	{
		$this->set('title_for_layout', 'All Cars : ' . WEBTITLE);

		if (isset($this->request->query['id']) && !empty($this->request->query['id'])) {
			$d = $this->ItemDetail->find('first', array('conditions' => array('ItemDetail.id' => $this->request->query['id'])));
			if (!empty($d)) {
				$status = 1;
				if ($d['ItemDetail']['status'] == 1) {
					$status = 0;
				}
				$arr = array('id' => $d['ItemDetail']['id'], 'status' => $status);
				$this->ItemDetail->save($arr);
			}
			$this->redirect($this->referer());
		}
		$engList = null;
		$c = array();
		$ec = array('ItemDetail.language' => 'eng');
		$q = $this->request->query;
		$brand = $this->Brand->find('list', array('order' => array('Brand.name' => 'ASC'), 'fields' => array('id', 'name')));
		if (isset($q['brand']) && !empty($q['brand'])) {
			$c = array('Model.brand_id' => $q['brand']);
			$ec[] = array('ItemDetail.brand_id' => $q['brand']);
		}
		$model_list = $this->Model->find('list', array('conditions' => $c, 'order' => array('Model.name' => 'ASC'), 'fields' => array('id', 'name')));
		if (isset($q['model']) && !empty($q['model'])) {
			$engList = $this->Motor->find('list', array('conditions' => array('Motor.model_id' => $q['model']), 'order' => array('Motor.name' => 'ASC'), 'fields' => array('id', 'name')));
			$ec[] = array('ItemDetail.model_id' => $q['model']);
		}

		if (isset($q['motor']) && !empty($q['motor'])) {
			$ec[] = array('ItemDetail.motor_id' => $q['motor']);
		}



		$this->ItemDetail->bindModel(array('belongsTo' => array('Brand', 'Model', 'Motor')));
		$this->paginate = array(
			'recursive' => 2, 'conditions' => $ec,
			'limit' => 100,
			'order' => array('ItemDetail.created' => 'DESC')
		);
		$data = $this->paginate('ItemDetail');
		$paging = $this->params['paging'];
		$this->set(compact('data', 'q', 'ec', 'brand', 'model_list', 'engList', 'paging'));
	}



	public function lab_change_positions_model()
	{
		$this->autoRender = false;
		if ($this->RequestHandler->isAjax()) {
			if (isset($this->data['model']) && !empty($this->data['model'])) {
				$arr = [];
				foreach ($this->data['model'] as $key => $val) {
					$arr[] = ['id' => $val, 'pos' => $key];
				}
				if (!empty($arr)) {
					$this->Model->saveAll($arr);
				}
			}
		}
	}

	public function lab_change_positions_pic($id = null, $tbl_id = null)
	{
		$this->autoRender = false;
		if ($this->RequestHandler->isAjax()) {
			if ($id == 'motorcycle' && !empty($tbl_id)) {
				$d = $this->Motorcycle->find('first', array('conditions' => array('Motorcycle.id' => $tbl_id)));
				if (!empty($d)) {
					$arr = [];
					foreach ($this->data['ss'] as $key => $val) {
						$arr[] = $val;
					}
					if (!empty($arr)) {
						$tArr = ['id' => $d['Motorcycle']['id'], 'slider' => implode(',', $arr)];
						$this->Motorcycle->save($tArr);
					}
				}
			}
			if ($id == 'ss') {
				if (isset($this->data['ss']) && !empty($this->data['ss'])) {
					$d = $this->ItemDetail->find('first', array('conditions' => array('ItemDetail.id' => $this->data['id'])));	
					if (!empty($d)) {
						$arr = [];
						foreach ($this->data['ss'] as $key => $val) {
							$arr[] = $val;
						}
						if (!empty($arr)) {
							$tArr = ['id' => $d['ItemDetail']['id'], 'slider' => implode(',', $arr)];
							$this->ItemDetail->save($tArr);
						}
					}
				}
			} elseif ($id == 'tt') {
				if (isset($this->data['tt']) && !empty($this->data['tt'])) {
					$arr = [];
					foreach ($this->data['tt'] as $key => $val) {
						$arr[] = ['id' => $val, 'pos' => $key];
					}
					if (!empty($arr)) {
						$this->Library->saveAll($arr);
					}
				}
			} elseif ($id == 'gal') {
				if (isset($this->data['gal']) && !empty($this->data['gal'])) {
					$d = $this->ItemDetail->find('first', array('conditions' => array('ItemDetail.id' => $this->data['id'])));	
					if (!empty($d)) {
						$arr = [];
						foreach ($this->data['gal'] as $key => $val) { $arr[] = $val; }
						if (!empty($arr)) {
							$tArr = ['id' => $d['ItemDetail']['id'], 'gallery' => implode(',', $arr)];
							$this->ItemDetail->save($tArr);
						}
					}
				}
			}
		}
	}

	public function lab_change_positions()
	{
		$this->autoRender = false;
		$this->loadModel('PlaceType');
		if ($this->RequestHandler->isAjax()) {
			if (isset($this->data['recordsArray']) && !empty($this->data['recordsArray'])) {
				$arr = [];
				foreach ($this->data['recordsArray'] as $key => $val) {
					$arr[] = ['id' => $val, 'pos' => $key];
				}
				if (!empty($arr)) {
					$this->Video->saveAll($arr);
				}
			}
		}
	}

	public function lab_gen_page()
	{
		$this->autoRender = false;
		if ($this->request->is('ajax') && !empty($this->data)) {
			if (isset($this->data['type']) && $this->data['type'] == 'motorcycle') {
				$page = $this->Motorcycle->find('first', array('conditions' => array('Motorcycle.id' => $this->data['cid'])));
				if (!empty($page)) {
					$chk = $this->Motorcycle->find('first', array('conditions' => array('Motorcycle.motorcycle_id' => $this->data['cid'], 'Motorcycle.language' => $this->data['lang'])));
					if (!empty($chk)) {
						echo "<div class='alert alert-danger fadeIn animated'>Select language page already exists.</div>";
					} else {
						$pArr['id'] = null;
						$pArr['status'] = 0;
						$pArr['language'] = $this->data['lang'];
						$pArr['motorcycle_id'] = $this->data['cid'];
						$pArr['motorcycle_make_id'] = $page['Motorcycle']['motorcycle_make_id'];
						$pArr['motorcycle_model_id'] = $page['Motorcycle']['motorcycle_model_id'];
						$pArr['motorcycle_year_id'] = $page['Motorcycle']['motorcycle_year_id'];
						$this->Motorcycle->save($pArr);
						echo "<div class='alert alert-success fadeIn animated'>Created</div>";
						echo '<script>location.reload();;</script>';
					}
				} else {
					echo "<div class='alert alert-danger fadeIn animated'>Please try again later</div>";
				}
				exit;
			} else {
				$page = $this->ItemDetail->find('first', array('conditions' => array('ItemDetail.id' => $this->data['cid'])));
				if (!empty($page)) {
					$chk = $this->ItemDetail->find('first', array('conditions' => array('ItemDetail.item_detail_id' => $this->data['cid'], 'ItemDetail.language' => $this->data['lang'])));
					if (!empty($chk)) {
						echo "<div class='alert alert-danger fadeIn animated'>Select language page already exists.</div>";
					} else {
						$pArr['id'] = null;
						$pArr['status'] = 0;
						$pArr['language'] = $this->data['lang'];
						$pArr['item_detail_id'] = $this->data['cid'];
						$pArr['brand_id'] = $page['ItemDetail']['brand_id'];
						$pArr['model_id'] = $page['ItemDetail']['model_id'];
						$pArr['motor_id'] = $page['ItemDetail']['motor_id'];
						$this->ItemDetail->save($pArr);
						echo "<div class='alert alert-success fadeIn animated'>Created</div>";
						echo '<script>location.reload();;</script>';
					}
				} else {
					echo "<div class='alert alert-danger fadeIn animated'>Please try again later</div>";
				}
			}
		}
		exit;
	}

	private function _translateFitment($url = null, $str = null)
	{
		$txt = null;
		if (!empty($str)) {
			$Arr = explode("\n", trim($str));
			$query = null;
			if (!empty($Arr)) {
				foreach ($Arr as $a => $b) {
					$query .= '&q=' . urlencode($b);
				}
			}
			$f_res = $this->DATA->fetch($url . $query);
			if (!empty($f_res)) {
				$f_res_arr = json_decode($f_res, true);
				if (isset($f_res_arr['data']['translations']) && !empty($f_res_arr['data']['translations'])) {
					foreach ($f_res_arr['data']['translations'] as $list) {
						$txt .= $list['translatedText'] . "\n";
					}
				}
			}
		}
		return $txt;
	}


	/* create/update  */
	private function _updateMultilingual($id = null)
	{
		if (!empty($id)) {
			$this->ItemDetail->bindModel(['hasMany' => ['CarPages' => ['className' => 'ItemDetail', 'foreignKey' => 'item_detail_id']]], false);
			$data = $this->ItemDetail->find('first', ['conditions' => ['ItemDetail.id' => $id]]);

			$this->ItemDetail->validator()->remove('title');
			$this->ItemDetail->validator()->remove('description');
			$this->ItemDetail->validator()->remove('url');

			if (!empty($data)) {
				if (empty($data['CarPages'])) {
					$getLanguage = $this->Language->find('all');
					if (!empty($getLanguage)) {
						foreach ($getLanguage as $lang) {
							$u = 'https://www.googleapis.com/language/translate/v2?key=' . G_KEY . '&source=en&target=' . $lang['Language']['code'];
							$url = strtolower(Inflector::slug($data['ItemDetail']['url'] . "-" . $lang['Language']['language'], '-'));
							$isPage = $this->ItemDetail->find('count', ['conditions' => ['ItemDetail.url' => $url]]);
							if ($isPage == 0) {
								$pArr = null;
								$pArr['id'] = null;
								$pArr['url'] = $url;
								$pArr['status'] = 1;
								$pArr['language'] = $lang['Language']['code'];
								$pArr['item_detail_id'] = $data['ItemDetail']['id'];
								$pArr['brand_id'] = $data['ItemDetail']['brand_id'];
								$pArr['model_id'] = $data['ItemDetail']['model_id'];
								$pArr['motor_id'] = $data['ItemDetail']['motor_id'];

								/* Start */
								$pArr['fitment'] = $this->_translateFitment($u, $data['ItemDetail']['fitment']);
								$pArr['feature'] = $this->_translateFitment($u, $data['ItemDetail']['feature']);
								$pArr['note'] = $this->_translateFitment($u, $data['ItemDetail']['note']);
								/* note End */
								$name = $this->DATA->fetch($u . '&q=' . urlencode($data['ItemDetail']['name']) . '&q=' . urlencode($data['ItemDetail']['meta_title']) . '&q=' . urlencode($data['ItemDetail']['meta_description']));
								if (!empty($name)) {
									$arrName = json_decode($name, true);
								}

								$pArr['name'] = (isset($arrName['data']['translations'][0]['translatedText']) ? $arrName['data']['translations'][0]['translatedText'] : null);
								$pArr['meta_title'] = (isset($arrName['data']['translations'][1]['translatedText']) ? $arrName['data']['translations'][1]['translatedText'] : null);
								$pArr['meta_description'] = (isset($arrName['data']['translations'][2]['translatedText']) ? $arrName['data']['translations'][2]['translatedText'] : null);
								$this->ItemDetail->save($pArr);
								$pArr = null;
							}
						}
					}
				} else {
					foreach ($data['CarPages'] as $page) {
						$u = 'https://www.googleapis.com/language/translate/v2?key=' . G_KEY . '&source=en&target=' . $page['language'];
						$pArr = null;
						$pArr['id'] = $page['id'];

						/* Start */
						$pArr['fitment'] = $this->_translateFitment($u, $data['ItemDetail']['fitment']);
						$pArr['feature'] = $this->_translateFitment($u, $data['ItemDetail']['feature']);
						$pArr['note'] = $this->_translateFitment($u, $data['ItemDetail']['note']);
						/* note End */

						$name = $this->DATA->fetch($u . '&q=' . urlencode($data['ItemDetail']['name']) . '&q=' . urlencode($data['ItemDetail']['meta_title']) . '&q=' . urlencode($data['ItemDetail']['meta_description']));
						if (!empty($name)) {
							$arrName = json_decode($name, true);
						}

						$pArr['name'] = (isset($arrName['data']['translations'][0]['translatedText']) ? $arrName['data']['translations'][0]['translatedText'] : null);
						$pArr['meta_title'] = (isset($arrName['data']['translations'][1]['translatedText']) ? $arrName['data']['translations'][1]['translatedText'] : null);
						$pArr['meta_description'] = (isset($arrName['data']['translations'][2]['translatedText']) ? $arrName['data']['translations'][2]['translatedText'] : null);
						$this->ItemDetail->save($pArr);
						$pArr = null;
					}
				}
			}
		}
	}

	public function lab_update_car_detail($id = null)
	{
		$this->set('title_for_layout', 'Update Car Details : ' . WEBTITLE);
		if (!empty($id) && isset($this->request->query['lng_del']) && !empty($this->request->query['lng_del'])) {
			$f = $this->ItemDetail->find('first', array('conditions' => array('ItemDetail.id' => $this->request->query['lng_del'])));
			if (!empty($f)) {
				$this->ItemDetail->id = $f['ItemDetail']['id'];
				$this->ItemDetail->delete();
			}
			$this->redirect('/lab/labs/update_car_detail/' . $id . '?tab=multilingual');
		}
		if (!empty($id) && isset($this->request->query['lng_act']) && !empty($this->request->query['lng_act'])) {
			$d = $this->ItemDetail->find('first', array('conditions' => array('ItemDetail.id' => $this->request->query['lng_act'])));
			if (!empty($d)) {
				$st = 1;
				if ($d['ItemDetail']['status'] == 1) {
					$st = 0;
				} elseif ($d['ItemDetail']['status'] == 0) {
					$st = 1;
				}
				$arr = array('id' => $d['ItemDetail']['id'], 'status' => $st);
				$this->ItemDetail->save($arr);
			}
			$this->redirect('/lab/labs/update_car_detail/' . $id . '?tab=multilingual');
		}
		if (isset($this->data['Shipping']) && !empty($this->data['Shipping'])) {
			$arr = array();
			$c = $this->Shipping->find('count', array('conditions' => array('Shipping.item_detail_id' => $this->data['Shipping']['item_detail_id'], 'Shipping.state_id' => $this->data['Shipping']['state'])));
			if ($c == 0) {
				if (!empty($this->data['Shipping']['type1'])) {
					$arr[] = array(
						'type' => 2, 'item_detail_id' => $this->data['Shipping']['item_detail_id'], 'brand_id' => $this->data['Shipping']['brand_id'], 'model_id' => $this->data['Shipping']['model_id'],
						'motor_id' => $this->data['Shipping']['motor_id'], 'country_id' => $this->data['Shipping']['country'], 'state_id' => $this->data['Shipping']['state'],
						'for_customer' => $this->data['Shipping']['type1']['for_customer'], 'for_dealer' => $this->data['Shipping']['type1']['for_dealer']
					);
				}
				if (!empty($this->data['Shipping']['type2'])) {
					$arr[] = array(
						'type' => 3, 'item_detail_id' => $this->data['Shipping']['item_detail_id'], 'brand_id' => $this->data['Shipping']['brand_id'], 'model_id' => $this->data['Shipping']['model_id'],
						'motor_id' => $this->data['Shipping']['motor_id'], 'country_id' => $this->data['Shipping']['country'], 'state_id' => $this->data['Shipping']['state'],
						'for_customer' => $this->data['Shipping']['type2']['for_customer'], 'for_dealer' => $this->data['Shipping']['type2']['for_dealer']
					);
				}
				if (!empty($this->data['Shipping']['type3'])) {
					$arr[] = array(
						'type' => 1, 'item_detail_id' => $this->data['Shipping']['item_detail_id'], 'brand_id' => $this->data['Shipping']['brand_id'], 'model_id' => $this->data['Shipping']['model_id'],
						'motor_id' => $this->data['Shipping']['motor_id'], 'country_id' => $this->data['Shipping']['country'], 'state_id' => $this->data['Shipping']['state'],
						'for_customer' => $this->data['Shipping']['type2']['for_customer'], 'for_dealer' => $this->data['Shipping']['type2']['for_dealer']
					);
				}
				$this->Session->setFlash('Shipping cost has been saved.', 'default', array('class' => 'alert alert-success'), 'msg');
				$this->Shipping->saveMany($arr);
			} else {
				$this->Session->setFlash('Shipping cost for this state is arelady exist.', 'default', array('class' => 'alert alert-danger'), 'msg');
			}
		}
		if ($this->RequestHandler->isAjax() && !empty($this->data)) {
			$st = SITEURL . $this->request->url . "?" . http_build_query($this->request->query);
			if (isset($this->data['ItemDetail']['url'])) {
				$this->request->data['ItemDetail']['url'] = strtolower(Inflector::slug($this->data['ItemDetail']['url'], '-'));
			}
			$this->ItemDetail->set($this->request->data);
			if ($this->ItemDetail->validates()) {
				$this->ItemDetail->save($this->request->data);
				$this->_updateMultilingual($this->data['ItemDetail']['id']);
				echo '<div class="alert alert-success" role="alert"> Added</div>';
				echo "<script>setTimeout(function(){ window.location.href ='" . $st . "'; }, 500);</script>";
			} else {
				$str = null;
				$errors = $this->ItemDetail->validationErrors;
				if (!empty($errors)) {
					foreach ($errors as $err) {
						$str .= $err[0] . "<br>";
					}
					echo '<script>btnState();</script><div class="alert alert-danger fadeIn animated">' . $str . '</div>';
				}
			}
			exit;
		}
		$q = $this->request->query;
		if (!empty($id)) {
			$allLangPage = $langArr = $sData = $slidersTT = $sliders = $gallery = $cList = $sList = array();
			$this->ItemDetail->bindModel(array('hasMany' => array('QualityDetail', 'Video' => ['order' => ['Video.pos' => 'ASC']]), 'belongsTo' => array('Brand', 'Model', 'Motor')));
			$data = $this->ItemDetail->find('first', array('recursive' => 2, 'conditions' => array('ItemDetail.id' => $id)));
			if (isset($q['tab']) && $q['tab'] == 'gallery') {
				$gids = explode(',', $data['ItemDetail']['gallery']);
				$or1 = [];
				if (!empty($data['ItemDetail']['gallery'])) { $or1 = array('FIELD(Library.id,' . $data['ItemDetail']['gallery'] . ')'); }
				$gallery = $this->Library->find('all', array('conditions' => array('Library.id' => $gids), 'order' =>$or1));
			}
			if (isset($q['tab']) && $q['tab'] == 'slider') {
				$ids = explode(',', $data['ItemDetail']['slider']);
				$or = [];
				if (!empty($data['ItemDetail']['slider'])) { $or = array('FIELD(Library.id,' . $data['ItemDetail']['slider'] . ')'); }
				$sliders = $this->Library->find('all', array('conditions' => array('Library.id' => $ids), 'order'=>$or ));
			}
			if (isset($q['tab']) && in_array($q['tab'], array('shipping', 'manage_shipping'))) {
				$cList = $this->World->find('list', array('conditions' => array('World.type' => 'co', 'World.status' => 1), 'order' => array('World.name' => 'ASC'), 'field' => array('id', 'name')));
				if (!empty($q['cid'])) {
					$sList = $this->World->find('list', array('conditions' => array('World.type' => 'st', 'World.in_location' => $q['cid'], 'World.status' => 1), 'order' => array('World.name' => 'ASC'), 'field' => array('id', 'name')));
				}
				if ($q['tab'] == 'manage_shipping') {
					$sC = array();
					$this->Shipping->bindModel(array('belongsTo' => array('Brand', 'Country' => array('className' => 'World', 'foreignKey' => 'country_id'), 'State' => array('className' => 'World', 'foreignKey' => 'state_id'))));
					if (isset($q['cid']) && isset($q['sid'])) {
						$sC = array('Shipping.item_detail_id' => $id, 'Shipping.country_id' => $q['cid'], 'Shipping.state_id' => $q['sid']);
					} else {
						$sC = array('Shipping.item_detail_id' => $id);
					}
					$this->paginate = array('conditions' => $sC, 'limit' => 50, 'order' => array('Shipping.created' => 'DESC'));
					$sData = $this->paginate('Shipping');
				}
			}
			if (isset($q['tab']) &&  $q['tab'] == 'multilingual') {
				$lgcode = array();
				$langArr = $this->Language->find('list', array('fields' => array('Language.code', 'Language.language'), 'conditions' => array('Language.status' => 1)));
				if (!empty($langArr)) {
					foreach ($langArr as $lk => $lv) {
						$lgcode[] = $lk;
					}
				}
				$allLangPage = $this->ItemDetail->find('all', array('conditions' => array('ItemDetail.language' => $lgcode, 'ItemDetail.item_detail_id' => $id)));
			}
			if (empty($data)) {
				$this->layout = 'lab_404';
			}
		}

		$this->set(compact('data', 'q', 'gallery', 'sliders', 'slidersTT', 'cList', 'sList', 'sData', 'langArr', 'allLangPage'));
	}

	public function lab_update_video()
	{
		die;
		$this->autoRender = false;
		$data = $this->ItemDetail->find('all', array('recursive' => 1, 'conditions' => array('ItemDetail.videos IS NOT NULL')));
		if (!empty($data)) {
			foreach ($data as $list) {
				$v_list = [];
				$vArr = explode(',', $list['ItemDetail']['videos']);
				foreach ($vArr as $k => $v) {
					$v_list[] = ['id' => null, 'item_detail_id' => $list['ItemDetail']['id'], 'video' => $v];
				}

				if (!empty($v_list)) {
					$this->Video->saveAll($v_list);
					ec('Video saved for ' . $list['ItemDetail']['name']);
				}
			}
		}
		exit;
	}

	public function lab_inventory()
	{
		$this->set('title_for_layout', 'Manage Inventory');

		if ($this->request->is('ajax') && !empty($this->data)) {

			if (isset($this->data['Product']['file']['name']) && !empty($this->data['Product']['file']['name'])) {
				$img = $this->data['Product']['file'];

				$imgExt = strtolower(pathinfo($img['name'], PATHINFO_EXTENSION));
				$fName = "Product_" . rand(1234, 98765) . "_" . strtolower(pathinfo($img['name'], PATHINFO_FILENAME));
				$filename = strtolower(Inflector::slug($fName, '-')) . "." . $imgExt;
				if (in_array($imgExt, array('xls'))) {
					if (move_uploaded_file($img['tmp_name'], WWW_ROOT . 'doc/' . $filename)) {
						$Test_filename = WWW_ROOT . "doc/" . $filename;
						if (file_exists($Test_filename)) {
							$this->_xls_to_pro($filename);
						} else {
							echo "<div class='alert alert-danger'>please try again later</div>";
						}
					}
				} else {
					echo "<div class='alert alert-danger'>Please selecte only XLS file</div>";
				}
			} else {
				echo "<div class='alert alert-danger'>Please select file.</div>";
			}
			exit;
		}
	}

	public function _xls_to_pro($file = null)
	{
		$tab_arr = $new = array();
		if (!empty($file)) {
			App::import('Vendor', 'php_excel/excel_reader2');
			$data = new Spreadsheet_Excel_Reader('doc/' . $file, true);

			if (isset($data->sheets[0]['cells'][2]) && !empty($data->sheets[0]['cells'][2])) {
				$f = $data->sheets[0]['cells'][1];
				$c = $data->sheets[0]['cells'][2];

				$sAll = $data->sheets[0]['cells'];


				foreach ($sAll as $k => $list) {
					if ($k > 1) {
						$sList[$f[1]] = $list[1];
						$sList[$f[2]] = $list[2];
						$new[] = $sList;
					}
				}

				if (!empty($new)) {
					$this->Product->saveMany($new);

					$f = 'doc/' . $file;
					if (file_exists($f)) {
						unlink($f);
					}
					echo "<script>$('#ProductLabInventoryForm')[0].reset()</script>";
					echo "<div class='alert alert-success'>inventory has been save</div>";
				} else {
					echo "<div class='alert alert-danger'>inventory record not found</div>";
				}
			} else {
				echo "<div class='alert alert-danger'>Record not found</div>";
			}
		}
	}

	public function lab_get_report()
	{
		$this->autoRender = false;
		$this->ItemDetail->bindModel(array('belongsTo' => array('Brand', 'Model', 'Motor')));
		$data = $this->ItemDetail->find('all', array('recursive' => 1, 'conditions' => array('ItemDetail.status' => 1)));

		$Arr = array();
		if (!empty($data)) {
			foreach ($data as $list) {

				$cat_back_ids = explode(',', $list['ItemDetail']['cat_back_ids']);
				$catalytic_ids = explode(',', $list['ItemDetail']['catalytic_ids']);
				$cat_back = $this->Product->find('all', array('recursive' => -1, 'conditions' => array('Product.id' => $cat_back_ids, 'Product.status' => 1)));
				$catalytic = $this->Product->find('all', array('recursive' => -1, 'conditions' => array('Product.id' => $catalytic_ids, 'Product.status' => 1)));
				if (!empty($cat_back)) {
					foreach ($cat_back as $caList) {
						$Arr[] = array(
							'id' => $caList['Product']['id'],
							'name' => $list['ItemDetail']['name'], 'brand' => $list['Brand']['name'], 'model' => $list['Model']['name'], 'motor' => $list['Motor']['name'],
							'type' => 'Catback', 'title' => $caList['Product']['title'], 'price' => $caList['Product']['price'], 'material' => $caList['Product']['material'], 'part' => $caList['Product']['part'], 'quantity' => $caList['Product']['quantity'], 'total_order' => $caList['Product']['total_order']
						);
					}
				}
				if (!empty($catalytic)) {
					foreach ($catalytic as $ecu) {
						$Arr[] = array(
							'id' => $ecu['Product']['id'],
							'name' => $list['ItemDetail']['name'], 'brand' => $list['Brand']['name'], 'model' => $list['Model']['name'], 'motor' => $list['Motor']['name'],
							'type' => 'Cat', 'title' => $ecu['Product']['title'], 'price' => $ecu['Product']['price'], 'material' => $ecu['Product']['material'], 'part' => $ecu['Product']['part'], 'quantity' => $ecu['Product']['quantity'], 'total_order' => $ecu['Product']['total_order']
						);
					}
				}
			}
		}


		if (!empty($Arr)) {
			$filename = "report" . rand(123, 987) . ".xlsx";
			$this->PhpExcel->createWorksheet();
			$table = array(
				array('label' => __('id')),
				array('label' => __('quantity')),
				array('label' => __('brand')),
				array('label' => __('model')),
				array('label' => __('motor')),
				array('label' => __('name')),
				array('label' => __('material')),
				array('label' => __('part')),
				array('label' => __('type')),
				array('label' => __('title')),
				array('label' => __('price')),


				array('label' => __('total_order'))
			);
			$this->PhpExcel->addTableHeader($table, array());
			$n = 1;
			foreach ($Arr as $l) {
				$this->PhpExcel->addTableRow(array(
					$l['id'],
					$l['quantity'],
					$l['brand'],
					$l['model'],
					$l['motor'],
					$l['name'],
					$l['material'],
					$l['part'],
					$l['type'],
					$l['title'],
					$l['price'],
					$l['total_order']
				));
				$n++;
			}
			$this->PhpExcel->addTableFooter()->output($filename);
		}
	}


	public function lab_new_xls($id = null)
	{
		$this->autoRender = false;
		if (!empty($id)) {
			$this->ItemDetail->bindModel(array('hasMany' => array('Shipping')));
			$this->World->bindModel(array('belongsTo' => array('Country' => array('className' => 'World', 'foreignKey' => 'in_location'))));
			$data = $this->ItemDetail->find('first', array('recursive' => 2, 'conditions' => array('ItemDetail.id' => $id)));
			$w = $this->World->find('all', array('conditions' => array('World.status' => 1, 'World.type' => 'st'), 'order' => array('World.in_location' => 'ASC')));

			if (!empty($data) && !empty($w)) {

				$filename = strtolower(Inflector::slug($data['ItemDetail']['name'], '-')) . ".xlsx";
				$row = $wList = array();
				foreach ($w as $list) {

					$wList[] = array(
						'id' => 'NULL', 'type' => 1, 'Product_type' => 'Catback', 'item_detail_id' => $data['ItemDetail']['id'], 'brand_id' => $data['ItemDetail']['brand_id'], 'model_id' => $data['ItemDetail']['model_id'], 'motor_id' => $data['ItemDetail']['motor_id'],
						'for_dealer' => 0, 'for_customer' => 0, 'country_id' => $list['Country']['id'], 'country_name' => $list['Country']['name'], 'state_id' => $list['World']['id'], 'state_name' => $list['World']['name']
					);
					$wList[] = array(
						'id' => 'NULL', 'type' => 2, 'Product_type' => 'DP', 'item_detail_id' => $data['ItemDetail']['id'], 'brand_id' => $data['ItemDetail']['brand_id'], 'model_id' => $data['ItemDetail']['model_id'], 'motor_id' => $data['ItemDetail']['motor_id'],
						'for_dealer' => 0, 'for_customer' => 0, 'country_id' => $list['Country']['id'], 'country_name' => $list['Country']['name'], 'state_id' => $list['World']['id'], 'state_name' => $list['World']['name']
					);
					$wList[] = array(
						'id' => 'NULL', 'type' => 3, 'Product_type' => 'Box', 'item_detail_id' => $data['ItemDetail']['id'], 'brand_id' => $data['ItemDetail']['brand_id'], 'model_id' => $data['ItemDetail']['model_id'], 'motor_id' => $data['ItemDetail']['motor_id'],
						'for_dealer' => 0, 'for_customer' => 0, 'country_id' => $list['Country']['id'], 'country_name' => $list['Country']['name'], 'state_id' => $list['World']['id'], 'state_name' => $list['World']['name']
					);
				}

				if (!empty($wList) && !empty($data['Shipping'])) {
					foreach ($wList as $k => $b) {

						foreach ($data['Shipping'] as $sList) {
							if (
								$b['type'] == $sList['type'] &&
								$b['item_detail_id'] == $sList['item_detail_id'] && $b['brand_id'] == $sList['brand_id'] &&
								$b['model_id'] == $sList['model_id'] && $b['motor_id'] == $sList['motor_id'] &&
								$b['country_id'] == $sList['country_id'] && $b['state_id'] == $sList['state_id']
							) {

								$wList[$k]['id'] =  $sList['id'];
								$wList[$k]['for_dealer'] =  $sList['for_dealer'];
								$wList[$k]['for_customer'] =  $sList['for_customer'];
							}
						}
					}
				}

				if (!empty($wList)) {
					$this->PhpExcel->createWorksheet();
					$table = array(
						array('label' => __('id')), array('label' => __('type')), array('label' => __('item_detail_id')), array('label' => __('brand_id')), array('label' => __('model_id')), array('label' => __('motor_id')),
						array('label' => __('country_id')), array('label' => __('state_id')), array('label' => __('country_name')), array('label' => __('state_name')),
						array('label' => __('Product_type')), array('label' => __('for_dealer')), array('label' => __('for_customer'))
					);
					$this->PhpExcel->addTableHeader($table, array());

					foreach ($wList as $l) {
						$this->PhpExcel->addTableRow(array(
							$l['id'], $l['type'], $l['item_detail_id'], $l['brand_id'], $l['model_id'], $l['motor_id'],
							$l['country_id'], $l['state_id'], $l['country_name'], $l['state_name'],
							$l['Product_type'], $l['for_dealer'], $l['for_customer']
						));
					}
				}
				$this->PhpExcel->addTableFooter()->output($filename);
			}
		}
	}
	public function lab_updated_shipping($id = null)
	{
		if ($this->request->is('ajax')) {

			$this->Shipping->bindModel(array('belongsTo' => array('Country' => array('className' => 'World', 'foreignKey' => 'country_id'), 'State' => array('className' => 'World', 'foreignKey' => 'state_id'))));
			$data = $this->Shipping->find('first', array('conditions' => array('Shipping.id' => $id)));
			$this->set('data', $data);

			if (!empty($this->data)) {
				echo $s = "<script>$('#pro_btn').prop('disabled',false); $('#pro_btn').val('Save changes');</script>";
				$this->Shipping->save($this->data);
				echo '<script>location.reload();;</script>';
				exit;
			}
		}
	}

	public function lab_up_quality_detail()
	{
		$this->autoRender = false;
		if ($this->request->is('ajax')) {
			if (!empty($this->data)) {

				if (isset($this->data['type']) && $this->data['type'] == 'del' && !empty($this->data['id'])) {
					$this->QualityDetail->id = $this->data['id'];
					$this->QualityDetail->delete();
				}
				if (isset($this->data['type']) && $this->data['type'] == 'edit' && !empty($this->data['id'])) {
					$arr = array('id' => $this->data['id'], 'title' => $this->data['title']);
					$this->QualityDetail->save($arr);
				}
			}
		}
	}

	public function lab_api_car()
	{
		$this->autoRender = false;
		if ($this->request->is('ajax')) {
			if (!empty($this->data)) {
				if (isset($this->data['type']) && $this->data['type'] == 'del') {
					$d = $this->Video->find('first', array('conditions' => array('Video.id' => $this->data['i'])));
					if (!empty($d)) {
						$this->Video->id = $d['Video']['id'];
						$this->Video->delete();
						$this->Session->setFlash(__('Youtube video have been removed.'), 'default', array('class' => 'alert alert-success'), 'msg');
						echo '<script>location.reload();;</script>';
						exit;
					}
				}
			}
		}
	}

	public function lab_create_car_page($eid = null, $mid = null, $bid = null)
	{
		$this->autoRender = false;
		if (!empty($eid) && !empty($mid) && !empty($bid)) {
			$i = $this->ItemDetail->find('first', array('conditions' => array('ItemDetail.brand_id' => $bid, 'ItemDetail.model_id' => $mid, 'ItemDetail.motor_id' => $eid)));

			if (!empty($i)) {
				$this->redirect(SITEURL . 'lab/labs/update_car_detail/' . $i['ItemDetail']['id']);
			} else {
				$this->request->data['ItemDetail']['brand_id'] = $bid;
				$this->request->data['ItemDetail']['model_id'] = $mid;
				$this->request->data['ItemDetail']['motor_id'] = $eid;
				$this->request->data['ItemDetail']['status'] = 0;
				$this->ItemDetail->save($this->request->data);
				$lid = $this->ItemDetail->getLastInsertId();
				$this->redirect(SITEURL . 'lab/labs/update_car_detail/' . $lid);
			}
		}
	}

	public function lab_add_car_detail($mid = null)
	{
		$this->set('title_for_layout', 'Add Car Details : ' . WEBTITLE);

		if (!empty($mid) && !empty($mid)) {
			$d = $this->ItemDetail->find('first', array('conditions' => array('ItemDetail.exhaust_model_id' => $mid)));
			if (!empty($d)) {
				$this->redirect(SITEURL . "lab/labs/update_car_detail/" . $d['ItemDetail']['id']);
			}

			$this->set(compact('mid'));
		} else {
			$this->layout = 'lab_404';
		}

		if (!empty($this->data)) {
			$this->request->data['ItemDetail']['url'] = strtolower(Inflector::slug($this->data['ItemDetail']['url'], '-'));

			$exhaust_models = $this->ExhaustModel->find('first', array('conditions' => array('ExhaustModel.id' => $this->data['ItemDetail']['exhaust_model_id'])));

			if (!empty($exhaust_models)) {
				$this->request->data['ItemDetail']['brand_id'] = $exhaust_models['ExhaustModel']['brand_id'];
				$this->request->data['ItemDetail']['model_id'] = $exhaust_models['ExhaustModel']['model_id'];
				$this->request->data['ItemDetail']['exhaust_brand_id'] = $exhaust_models['ExhaustModel']['exhaust_brand_id'];

				if ($this->ItemDetail->save($this->data)) {
					$lid = $this->ItemDetail->getLastInsertId();
					$this->Session->setFlash(__('Saved'), 'default', array('class' => 'alert alert-success'), 'msg');
					$this->redirect(array('controller' => 'labs', 'action' => 'update_car_detail/' . $lid));
				} else {
					$this->Session->setFlash(__('Not Saved'), 'default', array('class' => 'alert alert-danger'), 'msg');
				}
			} else {
				$this->Session->setFlash(__('Error: Please try again'), 'default', array('class' => 'alert alert-danger'), 'msg');
			}
		}
	}

	public function lab_new_promo_code()
	{
		$this->set('title_for_layout', 'Promo Code : ' . WEBTITLE);

		if (!empty($this->data)) {
			if ($this->PromoCode->save($this->data)) {
				$this->Session->setFlash(__('Promo Code has been saved'), 'default', array('class' => 'alert alert-success'), 'msg');
				$this->redirect(array('controller' => 'labs', 'action' => 'new_promo_code'));
			} else {
				$this->Session->setFlash(__('Not Saved'), 'default', array('class' => 'alert alert-danger'), 'msg');
			}
		}
	}

	public function lab_all_promo($id = null, $st = null)
	{
		$this->set('title_for_layout', 'All Promo Code : ' . WEBTITLE);
		if (!empty($id) && !empty($st)) {
			$d = $this->PromoCode->find('first', array('conditions' => array('PromoCode.id' => $id)));
			if (!empty($d)) {
				$status = 1;
				if ($d['PromoCode']['status'] == 1) {
					$status = 0;
				}
				$arr = array('id' => $id, 'status' => $status);
				$this->PromoCode->save($arr);
			}
			$this->redirect(array('controller' => 'labs', 'action' => 'all_promo'));
		}

		$this->paginate = array(
			'recursive' => -1,
			'limit' => 50,
			'order' => array('PromoCode.created' => 'DESC')
		);
		$data = $this->paginate('PromoCode');
		$this->set('data', $data);
	}



	public function lab_add_exhaust_product($brand_id = null, $model_id = null, $engine_id = null)
	{
		$this->set('title_for_layout', 'Add Exhause Product : ' . WEBTITLE);
		$engList = null;
		$c = array();

		$brand = $this->Brand->find('list', array('order' => array('Brand.name' => 'ASC'), 'fields' => array('id', 'name')));
		if (!empty($brand_id)) {
			$c = array('Model.brand_id' => $brand_id);
		}
		$model_list = $this->Model->find('list', array('conditions' => $c, 'order' => array('Model.name' => 'ASC'), 'fields' => array('id', 'name')));
		if (!empty($model_id)) {
			$engList = $this->Motor->find('list', array('conditions' => array('Motor.model_id' => $model_id), 'order' => array('Motor.name' => 'ASC'), 'fields' => array('id', 'name')));
		}

		if (isset($this->request->query['edit'])) {
			$this->Product->bindModel(array('belongsTo' => array('Library')));
			$e = $this->Product->find('first', array('conditions' => array('Product.type' => array(2, 3, 5), 'Product.id' => $this->request->query['edit'])));
			if (empty($e)) {
				$this->layout = 'lab_404';
			}
			$this->set('e', $e);
		}

		$this->set(compact('brand', 'model_list', 'engList', 'brand_id', 'model_id', 'engine_id'));

		if ($this->RequestHandler->isAjax()) {
			if (!empty($this->data)) {

				if (empty($this->data['Product']['library_id'])) {
					echo '<div class="alert alert-danger fadeIn animated">Please select image.</div>';
				} else {
					$this->request->data['Product']['status'] = 1;
					$this->Product->set($this->request->data);
					if ($this->Product->validates()) {
						$this->Product->save($this->data);
						$this->Session->setFlash(__('Product has been successfully saved'), 'default', array('class' => 'alert alert-success'), 'msg');
						echo '<script>location.reload();;</script>';
					} else {
						$str = null;
						$errors = $this->Product->validationErrors;
						if (!empty($errors)) {
							foreach ($errors as $err) {
								$str .= $err[0] . "<br>";
							}
							echo '<div class="alert alert-danger fadeIn animated">' . $str . '</div>';
						}
					}
				}
			}
			exit;
		}
	}

	public function lab_add_exhaust_product123($id = null)
	{
		$this->set('title_for_layout', 'Exhause product : ' . WEBTITLE);
		$make_list = array();
		$this->ExhaustModel->bindModel(array('belongsTo' => array('ExhaustBrand')));
		$make = $this->ExhaustModel->find('all', array('conditions' => array('ExhaustModel.status' => 1), 'fields' => array('id', 'model_name', 'title', 'ExhaustBrand.brand_name')));
		if (!empty($make)) {
			foreach ($make as $list) {
				$make_list[$list['ExhaustModel']['id']] = $list['ExhaustBrand']['brand_name'] . " > " . $list['ExhaustModel']['model_name'] . " (" . ucwords(strtolower($list['ExhaustModel']['title'])) . ")";
			}
		}

		$this->set('make', $make_list);

		if (!empty($id)) {
			$data = $this->ExhaustProduct->find('first', array('conditions' => array('ExhaustProduct.id' => $id)));

			$this->set('data', $data);
		}

		if ($this->RequestHandler->isAjax()) {
			$s = "<script>$('#save_b').prop('disabled',false); $('#save_b').val('Save');</script>";
			if (!empty($this->data)) {

				if (isset($this->data['ExhaustProduct']['id'])) {

					if (isset($this->data['ExhaustProduct']['new_image']) && !empty($this->data['ExhaustProduct']['new_image'])) {
						$img = explode('/', $this->data['ExhaustProduct']['new_image']);
						if (!empty($img)) {
							$p = array_slice($img, -2);
							$c = $this->Library->find('first', array('conditions' => array('Library.file_name' => $p[1], 'Library.folder' => $p[0])));
							if (empty($c)) {
								echo $s;
								echo "<div class='alert alert-danger fadeIn animated'><strong>Error</strong> Image not found. please try to use another image</div>";
								exit;
							} else {
								$this->request->data['ExhaustProduct']['library_id'] =  $c['Library']['id'];
								$this->request->data['ExhaustProduct']['image'] =  $c['Library']['folder'] . "/" . $c['Library']['file_name'];
							}
						}
					}

					$get_b_id = $this->ExhaustModel->find('first', array('conditions' => array('ExhaustModel.id' => $this->data['ExhaustProduct']['exhaust_model_id'])));
					if (isset($get_b_id['ExhaustModel']['exhaust_brand_id']) && !empty($get_b_id['ExhaustModel']['exhaust_brand_id'])) {
						$this->request->data['ExhaustProduct']['exhaust_brand_id'] =  $get_b_id['ExhaustModel']['exhaust_brand_id'];
					} else {
						echo $s;
						echo '<div class="alert alert-danger fadeIn animated">Sorry, this is not working at the moment. Please try again later.</div>';
						exit;
					}



					$this->ExhaustProduct->set($this->request->data);
					if ($this->ExhaustProduct->validates()) {

						$this->ExhaustProduct->save($this->data);
						$this->Session->setFlash(__('Brand has been successfully saved'), 'default', array('class' => 'alert alert-success'), 'msg');
						echo $s;
						echo '<script>window.location = "' . SITEURL . 'lab/labs/exhaust_product";</script>';
					} else {
						$str = null;
						$errors = $this->ExhaustProduct->validationErrors;
						if (!empty($errors)) {
							foreach ($errors as $err) {
								$str .= $err[0] . "<br>";
							}
							echo $s;
							echo '<div class="alert alert-danger fadeIn animated">' . $str . '</div>';
						}
					}
				} else {
					$p = null;
					if (isset($this->data['ExhaustProduct']['image']) && !empty($this->data['ExhaustProduct']['image'])) {
						$img = explode('/', $this->data['ExhaustProduct']['image']);
						if (!empty($img)) {
							$p = array_slice($img, -2);
							$c = $this->Library->find('first', array('conditions' => array('Library.file_name' => $p[1], 'Library.folder' => $p[0])));
						}
					}

					if (!empty($c)) {
						$this->request->data['ExhaustProduct']['library_id'] =  $c['Library']['id'];
						$this->request->data['ExhaustProduct']['image'] =  $c['Library']['folder'] . "/" . $c['Library']['file_name'];

						$get_b_id = $this->ExhaustModel->find('first', array('conditions' => array('ExhaustModel.id' => $this->data['ExhaustProduct']['exhaust_model_id'])));
						if (isset($get_b_id['ExhaustModel']['exhaust_brand_id']) && !empty($get_b_id['ExhaustModel']['exhaust_brand_id'])) {
							$this->request->data['ExhaustProduct']['exhaust_brand_id'] =  $get_b_id['ExhaustModel']['exhaust_brand_id'];
						} else {
							echo $s;
							echo '<div class="alert alert-danger fadeIn animated">Sorry, this is not working at the moment. Please try again later.</div>';
							exit;
						}


						$this->ExhaustProduct->set($this->request->data);
						if ($this->ExhaustProduct->validates()) {
							$this->ExhaustProduct->save($this->data);
							echo $s;
							echo '<script>window.location = "' . SITEURL . 'lab/labs/exhaust_product";</script>';
						} else {
							$str = null;
							$errors = $this->ExhaustProduct->validationErrors;
							if (!empty($errors)) {
								foreach ($errors as $err) {
									$str .= $err[0] . "<br>";
								}
								echo $s;
								echo '<div class="alert alert-danger fadeIn animated">' . $str . '</div>';
							}
						}
					} else {
						echo $s;
						echo "<div class='alert alert-danger fadeIn animated'><strong>Error</strong> Image not found. please try to use another image</div>";
						exit;
					}
				}
			}
			exit;
		}
	}

	public function lab_exhaust_product_advance()
	{
		if ($this->request->is('ajax')) {
			$this->Product->bindModel(array('belongsTo' => array('Library', 'Brand', 'Model', 'Motor')));
			$searchData = $this->request->data['name_value'];
			$this->paginate = array(
				'recursive' => 1,
				'conditions' => array(
					'Product.type' => array(2, 3, 5),
					'or' => array(
						"Product.title LIKE" => "%" . $searchData . "%",
						"Product.price" => $searchData,
						"Product.id" => $searchData,
						"Product.quantity" => $searchData,
						"Product.part" => $searchData,
					)
				),
				'order' => array('Product.id' => 'DESC'),
				'limit' => 50
			);
			$data = $this->paginate('Product');
			$this->set('data', $data);
		}
	}

	public function lab_exhaust_product()
	{
		$this->set('title_for_layout', 'All Exhause product : ' . WEBTITLE);

		if (isset($this->request->query['del']) && !empty($this->request->query['del'])) {
			$d = $this->Product->find('first', array('conditions' => array('Product.id' => $this->request->query['del'])));
			if (!empty($d)) {

				$this->Product->id = $d['Product']['id'];
				$this->Product->delete();
			}
			$this->redirect(array('controller' => 'labs', 'action' => 'exhaust_product'));
		}


		if (isset($this->request->query['status']) && !empty($this->request->query['status'])) {
			$d = $this->Product->find('first', array('conditions' => array('Product.id' => $this->request->query['status'])));
			if (!empty($d)) {
				$st = 1;
				if ($d['Product']['status'] == 1) {
					$st = 0;
				} elseif ($d['Product']['status'] == 0) {
					$st = 1;
				}
				$arr = array('id' => $d['Product']['id'], 'status' => $st);
				$this->Product->save($arr);
			}
			$this->redirect(array('controller' => 'labs', 'action' => 'exhaust_product'));
		}

		$engList = $c = array();
		$ec[] = array('Product.type' => array(2, 3, 5));
		$q = $this->request->query;
		$brand = $this->Brand->find('list', array('order' => array('Brand.name' => 'ASC'), 'fields' => array('id', 'name')));
		if (isset($q['brand']) && !empty($q['brand'])) {
			$c = array('Model.brand_id' => $q['brand']);
			$ec[] = array('Product.brand_id' => $q['brand']);
		}
		$model_list = $this->Model->find('list', array('conditions' => $c, 'order' => array('Model.name' => 'ASC'), 'fields' => array('id', 'name')));
		if (isset($q['model']) && !empty($q['model'])) {
			$engList = $this->Motor->find('list', array('conditions' => array('Motor.model_id' => $q['model']), 'order' => array('Motor.name' => 'ASC'), 'fields' => array('id', 'name')));
			$ec[] = array('Product.model_id' => $q['model']);
		}

		if (isset($q['motor']) && !empty($q['motor'])) {
			$ec[] = array('Product.motor_id' => $q['motor']);
		}


		$this->Product->bindModel(array('belongsTo' => array('Library', 'Brand', 'Model', 'Motor')));
		$this->paginate = array(
			'conditions' => $ec,
			'maxLimit' => 30, 'limit' => 30, 'order' => array('Product.id' => 'DESC')
		);
		$data = $this->paginate('Product');


		$paging = $this->params['paging'];
		$this->set(compact('data', 'paging', 'brand', 'model_list', 'q', 'engList'));
	}



	public function lab_edit_library($id = null)
	{
		$this->set('title_for_layout', 'Edit Library : ' . WEBTITLE);
		$data = $this->Library->find('first', array('conditions' => array('Library.id' => $id)));
		$this->set('data', $data);
		if ($this->RequestHandler->isAjax()) {
			$this->set('aj', 'yes');
		}
	}

	public function lab_exhaust_model()
	{
		$this->set('title_for_layout', 'Manage Car : ' . WEBTITLE);

		if (isset($this->request->query['id']) && !empty($this->request->query['id'])) {
			$d = $this->ExhaustModel->find('first', array('conditions' => array('ExhaustModel.id' => $this->request->query['id'])));
			if (!empty($d)) {
				$st = 1;
				if ($d['ExhaustModel']['status'] == 1) {
					$st = 0;
				} elseif ($d['ExhaustModel']['status'] == 0) {
					$st = 1;
				}
				$arr = array('id' => $d['ExhaustModel']['id'], 'status' => $st);
				$this->ExhaustModel->save($arr);
			}
			$this->redirect(array('controller' => 'labs', 'action' => 'exhaust_model'));
		}

		$this->ExhaustModel->bindModel(array('belongsTo' => array('Library', 'ExhaustBrand')));
		$this->paginate = array(
			'maxLimit' => 30, 'limit' => 30, 'order' => array('ExhaustModel.id' => 'DESC')
		);
		$data = $this->paginate('ExhaustModel');

		$paging = $this->params['paging'];
		$this->set(compact('data', 'paging'));
	}

	public function lab_add_exhaust_model($id = null)
	{
		$this->set('title_for_layout', 'Manage Brand : ' . WEBTITLE);
		$list_model = array();

		$car = $this->ExhaustBrand->find('list', array('conditions' => array('ExhaustBrand.status' => 1), 'fields' => array('id', 'brand_name')));
		$this->set('car', $car);
		if (!empty($id)) {
			$data = $this->ExhaustModel->find('first', array('conditions' => array('ExhaustModel.id' => $id)));
			if (!empty($data)) {
				$list_model = $this->Model->find('list', array('conditions' => array('Model.brand_id' => $data['ExhaustModel']['brand_id'])));
			}
			$this->set(compact('data', 'list_model'));
		}

		if ($this->RequestHandler->isAjax()) {
			$s = "<script>$('#save_b').prop('disabled',false); $('#save_b').val('Save');</script>";
			if (!empty($this->data)) {

				$get_bid = $this->Model->find('first', array('conditions' => array('Model.id' => $this->data['ExhaustModel']['model_id'])));

				if (isset($get_bid['Model']['id']) && !empty($get_bid['Model']['id'])) {
					$this->request->data['ExhaustModel']['brand_id'] =  $get_bid['Model']['brand_id'];
					$this->request->data['ExhaustModel']['model_id'] =  $get_bid['Model']['id'];
				} else {
					echo $s;
					echo '<div class="alert alert-danger fadeIn animated">Please try again later</div>';
				}


				if (isset($this->data['ExhaustModel']['id'])) {

					if (isset($this->data['ExhaustModel']['new_image']) && !empty($this->data['ExhaustModel']['new_image'])) {
						$img = explode('/', $this->data['ExhaustModel']['new_image']);
						if (!empty($img)) {
							$p = array_slice($img, -2);
							$c = $this->Library->find('first', array('conditions' => array('Library.file_name' => $p[1], 'Library.folder' => $p[0])));
							if (empty($c)) {
								echo $s;
								echo "<div class='alert alert-danger fadeIn animated'><strong>Error</strong> Image not found. please try to use another image</div>";
								exit;
							} else {
								$this->request->data['ExhaustModel']['library_id'] =  $c['Library']['id'];
								$this->request->data['ExhaustModel']['image'] =  $c['Library']['folder'] . "/" . $c['Library']['file_name'];
							}
						}
					}

					if (isset($this->data['ExhaustModel']['new_url']) && !empty($this->data['ExhaustModel']['new_url'])) {
						$this->request->data['ExhaustModel']['url'] = strtolower(Inflector::slug($this->data['ExhaustModel']['new_url'], '-'));
					}

					$this->ExhaustModel->set($this->request->data);
					if ($this->ExhaustModel->validates()) {

						$this->ExhaustModel->save($this->data);
						$this->Session->setFlash(__('Brand has been successfully saved'), 'default', array('class' => 'alert alert-success'), 'msg');
						echo $s;
						echo '<script>window.location = "' . SITEURL . 'lab/labs/exhaust_model";</script>';
					} else {
						$str = null;
						$errors = $this->ExhaustModel->validationErrors;
						if (!empty($errors)) {
							foreach ($errors as $err) {
								$str .= $err[0] . "<br>";
							}
							echo $s;
							echo '<div class="alert alert-danger fadeIn animated">' . $str . '</div>';
						}
					}
				} else {
					$p = null;
					if (isset($this->data['ExhaustModel']['image']) && !empty($this->data['ExhaustModel']['image'])) {
						$img = explode('/', $this->data['ExhaustModel']['image']);
						if (!empty($img)) {
							$p = array_slice($img, -2);
							$c = $this->Library->find('first', array('conditions' => array('Library.file_name' => $p[1], 'Library.folder' => $p[0])));
						}
					}

					if (!empty($c)) {
						$this->request->data['ExhaustModel']['library_id'] =  $c['Library']['id'];
						$this->request->data['ExhaustModel']['image'] =  $c['Library']['folder'] . "/" . $c['Library']['file_name'];
						$this->request->data['ExhaustModel']['url'] = strtolower(Inflector::slug($this->data['ExhaustModel']['url'], '-'));

						$this->ExhaustModel->set($this->request->data);
						if ($this->ExhaustModel->validates()) {
							$this->ExhaustModel->save($this->data);
							echo $s;
							echo '<script>window.location = "' . SITEURL . 'lab/labs/exhaust_model";</script>';
						} else {
							$str = null;
							$errors = $this->ExhaustModel->validationErrors;
							if (!empty($errors)) {
								foreach ($errors as $err) {
									$str .= $err[0] . "<br>";
								}
								echo $s;
								echo '<div class="alert alert-danger fadeIn animated">' . $str . '</div>';
							}
						}
					} else {
						echo $s;
						echo "<div class='alert alert-danger fadeIn animated'><strong>Error</strong> Image not found. please try to use another image</div>";
						exit;
					}
				}
			}
			exit;
		}
	}

	public function lab_add_cars($id = null)
	{
		$this->set('title_for_layout', 'Exhaust System > Manage Make : ' . WEBTITLE);
		$bid = $this->Brand->find('list', array('order' => array('Brand.name' => 'ASC'), 'fields' => array('id', 'name')));
		if (!empty($id)) {
			$data = $this->ExhaustBrand->find('first', array('conditions' => array('ExhaustBrand.id' => $id)));
		}
		$this->set(compact('data', 'bid'));

		if ($this->RequestHandler->isAjax()) {
			$s = "<script>$('#save_b').prop('disabled',false); $('#save_b').val('Save');</script>";
			if (!empty($this->data)) {

				if (isset($this->data['ExhaustBrand']['id'])) {

					if (isset($this->data['ExhaustBrand']['new_image']) && !empty($this->data['ExhaustBrand']['new_image'])) {
						$img = explode('/', $this->data['ExhaustBrand']['new_image']);
						if (!empty($img)) {
							$p = array_slice($img, -2);
							$c = $this->Library->find('first', array('conditions' => array('Library.file_name' => $p[1], 'Library.folder' => $p[0])));
							if (empty($c)) {
								echo $s;
								echo "<div class='alert alert-danger fadeIn animated'><strong>Error</strong> Image not found. please try to use another image</div>";
								exit;
							} else {
								$this->request->data['ExhaustBrand']['library_id'] =  $c['Library']['id'];
								$this->request->data['ExhaustBrand']['image'] =  $c['Library']['folder'] . "/" . $c['Library']['file_name'];
							}
						}
					}

					if (isset($this->data['ExhaustBrand']['new_url']) && !empty($this->data['ExhaustBrand']['new_url'])) {
						$this->request->data['ExhaustBrand']['url'] = strtolower(Inflector::slug($this->data['ExhaustBrand']['new_url'], '-'));
					}

					$this->ExhaustBrand->set($this->request->data);
					if ($this->ExhaustBrand->validates()) {

						$this->ExhaustBrand->save($this->data);
						$this->Session->setFlash(__('Brand has been successfully saved'), 'default', array('class' => 'alert alert-success'), 'msg');
						echo $s;
						echo '<script>window.location = "' . SITEURL . 'lab/labs/cars";</script>';
					} else {
						$str = null;
						$errors = $this->ExhaustBrand->validationErrors;
						if (!empty($errors)) {
							foreach ($errors as $err) {
								$str .= $err[0] . "<br>";
							}
							echo $s;
							echo '<div class="alert alert-danger fadeIn animated">' . $str . '</div>';
						}
					}
				} else {
					$p = null;
					if (isset($this->data['ExhaustBrand']['image']) && !empty($this->data['ExhaustBrand']['image'])) {
						$img = explode('/', $this->data['ExhaustBrand']['image']);
						if (!empty($img)) {
							$p = array_slice($img, -2);
							$c = $this->Library->find('first', array('conditions' => array('Library.file_name' => $p[1], 'Library.folder' => $p[0])));
						}
					}

					if (!empty($c)) {
						$this->request->data['ExhaustBrand']['library_id'] =  $c['Library']['id'];
						$this->request->data['ExhaustBrand']['image'] =  $c['Library']['folder'] . "/" . $c['Library']['file_name'];
						$this->request->data['ExhaustBrand']['url'] = strtolower(Inflector::slug($this->data['ExhaustBrand']['url'], '-'));

						$this->ExhaustBrand->set($this->request->data);
						if ($this->ExhaustBrand->validates()) {
							$this->ExhaustBrand->save($this->data);
							echo $s;
							echo '<script>window.location = "' . SITEURL . 'lab/labs/cars";</script>';
						} else {
							$str = null;
							$errors = $this->ExhaustBrand->validationErrors;
							if (!empty($errors)) {
								foreach ($errors as $err) {
									$str .= $err[0] . "<br>";
								}
								echo $s;
								echo '<div class="alert alert-danger fadeIn animated">' . $str . '</div>';
							}
						}
					} else {
						echo $s;
						echo "<div class='alert alert-danger fadeIn animated'><strong>Error</strong> Image not found. please try to use another image</div>";
						exit;
					}
				}
			}
			exit;
		}
	}


	public function lab_cars()
	{
		$this->set('title_for_layout', 'Exhaust System > All Make : ' . WEBTITLE);

		if (isset($this->request->query['id']) && !empty($this->request->query['id'])) {
			$d = $this->ExhaustBrand->find('first', array('conditions' => array('ExhaustBrand.id' => $this->request->query['id'])));
			if (!empty($d)) {
				$st = 1;
				if ($d['ExhaustBrand']['status'] == 1) {
					$st = 0;
				} elseif ($d['ExhaustBrand']['status'] == 0) {
					$st = 1;
				}
				$arr = array('id' => $d['ExhaustBrand']['id'], 'status' => $st);
				$this->ExhaustBrand->save($arr);
			}
			$this->redirect(array('controller' => 'labs', 'action' => 'cars'));
		}

		$this->ExhaustBrand->bindModel(array('belongsTo' => array('Library')));
		$this->paginate = array(
			'maxLimit' => 30, 'limit' => 30, 'order' => array('ExhaustBrand.id' => 'DESC')
		);
		$data = $this->paginate('ExhaustBrand');
		$paging = $this->params['paging'];
		$this->set(compact('data', 'paging'));
	}

	public function lab_save_library()
	{
		$this->autoRender = false;
		$s = "<script>$('#lib_save').prop('disabled',false); $('#lib_save').val('Save');</script>";
		if ($this->RequestHandler->isAjax()) {
			if (!empty($this->data)) {
				$data = $this->Library->find('first', array('conditions' => array('Library.id' => $this->data['Library']['id'])));
				if (!empty($data)) {

					$title = trim($this->data['Library']['new_image']);
					if (!empty($title)) {
						$u = strtolower(Inflector::slug($title, '-'));
						$imgExt = strtolower(pathinfo($data['Library']['file_name'], PATHINFO_EXTENSION));
						$nfile = $u . "." . $imgExt;

						$is_r = $this->Library->find('count', array('conditions' => array('Library.file_name' => $nfile, 'Library.id NOT' => $data['Library']['id'])));
						if ($is_r > 0) {
							echo $s;
							echo "<div class='alert alert-danger fadeIn animated'><strong>Error</strong> Image name already exists. please try to use another name</div>";
							exit;
						} else {

							$old_name = $data['Library']['file_name'];
							if (rename("cdn/" . $data['Library']['folder'] . "/" . $data['Library']['file_name'], "cdn/" . $data['Library']['folder'] . "/" . $nfile)) {
								$this->request->data['Library']['file_name'] = $nfile;
							}
						}
					}
					$this->Library->save($this->data);
					echo $s;
					echo "<div class='alert alert-success fadeIn animated'>Saved</div>";
				} else {
					echo $s;
					echo "<div class='alert alert-danger fadeIn animated'><strong>Error</strong> Please try again later.</div>";
				}
			}
		}
	}
	public function lab_del_lib($id)
	{
		$this->autoRender = false;
		$data = $this->Library->find('first', array('conditions' => array('Library.id' => $id)));
		if (!empty($data)) {
			$f = 'cdn/' . $data['Library']['folder'] . "/" . $data['Library']['file_name'];
			if (file_exists($f)) {
				unlink($f);
			}
			$this->Library->id = $data['Library']['id'];
			$this->Library->delete();
			$this->Session->setFlash(__('File has been deleted.'), 'default', array('class' => 'alert alert-success'), 'msg');
			$this->redirect(array('controller' => 'labs', 'action' => 'media'));
		}
	}

	public function lab_new_up()
	{
		$this->autoRender = false;

		if (isset($_FILES) && !empty($_FILES)) {
			$folder = 'all';
			if (!empty($_POST['action'])) {
				$folder = $_POST['action'];
			}
			if (!file_exists('cdn/' . $folder)) {
				mkdir('cdn/' . $folder, 0777, true);
			}

			$images = array();
			foreach ($_FILES['files']['tmp_name'] as $key => $tmp_name) {
				$ab = array();
				$ab['name'] = $_FILES['files']['name'][$key];
				$ab['size'] = $_FILES['files']['size'][$key];
				$ab['tmp_name'] = $_FILES['files']['tmp_name'][$key];
				$ab['type'] = $_FILES['files']['type'][$key];
				$images[] = $ab;
			}

			if (isset($images)  && !empty($images)) {
				foreach ($images as $img) {
					$imgExt = strtolower(pathinfo($img['name'], PATHINFO_EXTENSION));
					$fName = strtolower(pathinfo($img['name'], PATHINFO_FILENAME));
					$filename = strtolower(Inflector::slug($fName, '-')) . "." . $imgExt;

					if (in_array($imgExt, array('jpg', 'png', 'jpeg', 'gif'))) {
						if (move_uploaded_file($img['tmp_name'], WWW_ROOT . 'cdn/temp_img/' . $filename)) {
							$r = $this->DATA->compress_image('cdn/temp_img/' . $filename, 'cdn/' . $folder . '/' . $filename, 65);
							$Test_filename = WWW_ROOT . "cdn/$folder/" . $filename;
							if (file_exists($Test_filename)) {

								$ua = $this->DATA->getBrowser();
								$yourbrowser = "browser: " . $ua['name'] . " " . $ua['version'] . " on " . $ua['platform'] . " reports: <br >" . $ua['userAgent'];

								$ImgAtt = getimagesize($Test_filename);
								$temp_filename = WWW_ROOT . 'cdn/temp_img/' . $filename;
								unlink($temp_filename);
								$this->Library->create();
								$this->Library->set('folder', $folder);
								$this->Library->set('file_name', $filename);
								$this->Library->set('info', $yourbrowser);
								$this->Library->save(null, false);
								$img_id = $this->Library->getLastInsertId();
							}
						}
					}
				}
				echo "<script>location.reload();</script>";
			}
		}
	}

	public function lab_media()
	{
		$this->set('title_for_layout', 'Media : ' . WEBTITLE);
		$c = array();

		$f_list = $this->Library->find('list', array('group' => array('Library.folder'), 'order' => array('Library.folder' => 'ASC'), 'fields' => array('folder', 'folder')));

		$f_list = array_map('ucwords', $f_list);

		if (isset($this->request->query['s']) && !empty($this->request->query['s'])) {
			$c = array('or' => array(
				"Library.title LIKE" => "%" . $this->request->query['s'] . "%",
				"Library.file_name LIKE" => "%" . $this->request->query['s'] . "%",
				"Library.folder" => $this->request->query['s'],
				"Library.id" => $this->request->query['s'],
				"Library.alt LIKE" => "%" . $this->request->query['s'] . "%"
			));
			$this->set('q_data', $this->request->query['s']);
		}

		$this->paginate = array(
			'conditions' => $c,
			'maxLimit' => 30, 'limit' => 30, 'order' => array('Library.id' => 'DESC')
		);
		$data = $this->paginate('Library');
		$paging = $this->params['paging'];

		$this->set(compact('data', 'paging', 'f_list'));



		if ($this->RequestHandler->isAjax()) {

			if (!empty($this->data)) {
				$folder = trim($this->data['Library']['folder']);
				if (empty($folder)) {
					$folder = 'all';
				} else {
					$folder = strtolower(Inflector::slug($this->data['Library']['folder'], '-'));
				}
				if (!empty($this->data['Library']['img'])) {

					if (!file_exists('cdn/' . $folder)) {
						mkdir('cdn/' . $folder, 0777, true);
					}

					foreach ($this->data['Library']['img'] as $img) {

						$imgExt = strtolower(pathinfo($img['name'], PATHINFO_EXTENSION));
						$fName = strtolower(pathinfo($img['name'], PATHINFO_FILENAME));
						$filename = strtolower(Inflector::slug($fName, '-')) . "." . $imgExt;
						if (in_array($imgExt, array('jpg', 'png', 'jpeg', 'gif'))) {
							if (move_uploaded_file($img['tmp_name'], WWW_ROOT . 'cdn/temp_img/' . $filename)) {
								$r = $this->DATA->compress_image('cdn/temp_img/' . $filename, 'cdn/' . $folder . '/' . $filename, 65);
								$Test_filename = WWW_ROOT . "cdn/$folder/" . $filename;
								if (file_exists($Test_filename)) {

									$ua = $this->DATA->getBrowser();
									$yourbrowser = "browser: " . $ua['name'] . " " . $ua['version'] . " on " . $ua['platform'] . " reports: <br >" . $ua['userAgent'];

									$ImgAtt = getimagesize($Test_filename);
									$temp_filename = WWW_ROOT . 'cdn/temp_img/' . $filename;
									unlink($temp_filename);
									$this->Library->create();
									$this->Library->set('folder', $folder);
									$this->Library->set('file_name', $filename);
									$this->Library->set('info', $yourbrowser);
									$this->Library->save(null, false);
									$img_id = $this->Library->getLastInsertId();
								}
							}
						}
					}
					echo '<script>window.location = "' . SITEURL . 'lab/labs/media";</script>';
				} else {
					echo "<div class='alert alert-danger fadeIn animated'>Please select files</div>";
				}
			}
			exit;
		}
	}
	public function lab_api_country()
	{
		$this->autoRender = false;

		if ($this->RequestHandler->isAjax()) {
			//$this->data['c_name']
			if (isset($this->data['type']) && $this->data['type'] == 'country') {
				$c = $this->World->find('count', array('conditions' => array('World.name' => $this->data['c_name'], 'World.type' => 'co', 'World.status' => 1)));
				if ($c == 0) {
					$arr = array('id' => null, 'name' => $this->data['c_name'], 'type' => 'co');
					$this->World->save($arr);
					$this->Session->setFlash(__('Country name has been added.'), 'default', array('class' => 'alert alert-success'), 'msg');
					echo '<script>window.location = "' . SITEURL . 'lab/labs/country/";</script>';
				} else {
					echo "<div class='alert alert-danger fadeIn animated'>This Country name is already exist.</div>";
				}
			} elseif (isset($this->data['type']) && $this->data['type'] == 'state' && !empty($this->data['cid'])) {
				$c = $this->World->find('count', array('conditions' => array('World.name' => $this->data['c_name'], 'World.type' => 'st', 'World.in_location' => $this->data['cid'])));
				if ($c == 0) {
					$arr = array('id' => null, 'name' => $this->data['c_name'], 'type' => 'st', 'in_location' => $this->data['cid']);
					$this->World->save($arr);
					echo "<div class='alert alert-success fadeIn animated'>State name has been added.</div>";
					echo "<script>parent.location.reload();</script>";
				} else {
					echo "<div class='alert alert-danger fadeIn animated'>This Country name is already exist.</div>";
				}
			}
		}
	}
	public function lab_state($id = null)
	{
		$this->set('title_for_layout', 'Manage State : ' . WEBTITLE);


		if (isset($this->request->query['del']) && !empty($this->request->query['del'])) {
			$d = $this->World->find('first', array('conditions' => array('World.id' => $this->request->query['del'])));

			if (!empty($d)) {
				$st = 3;
				$arr = array('id' => $d['World']['id'], 'status' => $st);
				$this->World->save($arr);
			}
			$this->redirect($this->referer());
		}

		if (isset($this->request->query['status']) && !empty($this->request->query['status'])) {
			$d = $this->World->find('first', array('conditions' => array('World.id' => $this->request->query['status'])));
			if (!empty($d)) {
				$st = 1;
				if ($d['World']['status'] == 1) {
					$st = 0;
				} elseif ($d['World']['status'] == 0) {
					$st = 1;
				}
				$arr = array('id' => $d['World']['id'], 'status' => $st);
				$this->World->save($arr);
			}
			$this->Session->setFlash(__('Updated.'), 'default', array('class' => 'alert alert-success'), 'msg');
			$this->redirect($this->referer());
		}

		if (!empty($this->data)) {
			if ($this->World->save($this->data)) {
				$this->Session->setFlash(__('State has been added.'), 'default', array('class' => 'alert alert-success'), 'msg');
				$this->redirect($this->referer());
			} else {
				$this->Session->setFlash(__('State has no tbeen added'), 'default', array('class' => 'alert alert-danger'), 'msg');
			}
		}

		if (isset($this->request->query['edit']) && !empty($this->request->query['edit'])) {
			$all = $this->World->find('first', array('conditions' => array('World.id' => $this->request->query['edit'], 'World.type' => 'st')));
			if (empty($all)) {
				$this->layout = 'lab_404';
			}
		}

		$c = $this->World->find('first', array('conditions' => array('World.id' => $id, 'World.status' => 1)));
		if (!empty($c)) {
			$this->paginate = array('conditions' => array('World.in_location' => $id, 'World.type' => 'st', 'World.status' => array(0, 1)), 'maxLimit' => 100, 'limit' => 100, 'order' => array('World.name' => 'ASC'));
			$data = $this->paginate('World');
		} else {
			$this->layout = 'lab_404';
		}
		$this->set(compact('data', 'id', 'c', 'all'));
	}


	public function lab_shipping()
	{
		$this->set('title_for_layout', 'Regions and Shipping : ' . WEBTITLE);
		$this->paginate = array('conditions' => array('CountryList.status' => 1), 'maxLimit' => 300, 'limit' => 300, 'order' => array('CountryList.short_name' => 'ASC'));
		$data = $this->paginate('CountryList');
		$this->set(compact('data'));
	}

	public function lab_warranty()
	{
		$this->set('title_for_layout', 'Warranty Registration : ' . WEBTITLE);
		$this->loadModel('Warranty');
		$this->paginate = array('conditions' => array(), 'maxLimit' => 300, 'limit' => 300, 'order' => array('Warranty.id' => 'ASC'));
		$data = $this->paginate('Warranty');
		$this->set(compact('data'));
	}

	public function lab_export_warranty()
	{
		$this->loadModel('Warranty');
		$this->autoRender = false;
		$data_array = $this->Warranty->find('all', ['recursive' => 1, 'order' => ['Warranty.id' => 'DESC']]);
		if (!empty($data_array)) {
			$header_row = array('ID', 'First Name', 'Last Name', 'Email', 'Country', 'Seller Name', 'Exhaust Serial Number', 'Installer (Shop Name)', 'Installation Date', 'Created');
			$filename = "warranty_registration_" . rand() . ".csv";
			$csv_file = fopen('php://output', 'wr') or die("Can't open php://output");
			header('Content-type: application/csv');
			header('Content-Disposition: attachment; filename="' . $filename . '"');
			fputcsv($csv_file, $header_row, ',', '"');
			foreach ($data_array as $list) {
				$row = [];
				$row = [
					$list['Warranty']['id'], $list['Warranty']['first_name'],
					$list['Warranty']['last_name'], $list['Warranty']['email'],
					$list['Warranty']['country'], $list['Warranty']['seller'],
					"'" . $list['Warranty']['serial_number'] . "'", $list['Warranty']['shop'],
					$list['Warranty']['installation_date'], date('Y-m-d', strtotime($list['Warranty']['created']))
				];
				fputcsv($csv_file, $row, ',', '"');
			}
			fclose($csv_file);
		}
	}

	public function lab_edit_shipping($id = null)
	{
		if (!empty($id)) {
			$this->set('title_for_layout', 'Edit Shipping fee :' . WEBTITLE);
			$this->CountryList->id = $id;
			if ($this->request->is('get')) {
				$e = $this->CountryList->read();
				if (!empty($e)) {
					$this->request->data = $e;
				} else {
					$this->redirect(array('controller' => 'labs', 'action' => 'shipping'));
				}
			} else {

				if ($this->CountryList->save($this->request->data)) {
					$this->Session->setFlash(__('Record has been updated.'), 'default', array('class' => 'alert alert-success'), 'msg');
				} else {
					$this->Session->setFlash(__('Record has been not updated.'), 'default', array('class' => 'alert alert-danger'), 'msg');
				}
			}
		} else {
			if (!empty($this->request->data)) {
				if ($this->CountryList->save($this->request->data)) {
					$this->Session->setFlash('Record has been save successfully', 'default', array('class' => 'alert alert-success'), 'msg');
				} else {
					$this->Session->setFlash('Not able to save', 'default', array('class' => 'alert alert-danger'), 'msg');
				}
			}
		}
	}

	public function lab_country($id = null)
	{
		$this->set('title_for_layout', 'Manage Country : ' . WEBTITLE);
		$this->set('id', $id);

		if (isset($this->request->query['del']) && !empty($this->request->query['del'])) {
			$d = $this->World->find('first', array('conditions' => array('World.id' => $this->request->query['del'])));

			if (!empty($d)) {
				$st = 3;
				$arr = array('id' => $d['World']['id'], 'status' => $st);
				$this->World->save($arr);
				$this->World->updateAll(array('World.status' => 3), array('World.in_location' => $d['World']['id']));
			}
			$this->redirect($this->referer());
		}

		if (isset($this->request->query['status']) && !empty($this->request->query['status'])) {
			$d = $this->World->find('first', array('conditions' => array('World.id' => $this->request->query['status'])));
			if (!empty($d)) {
				$st = 1;
				if ($d['World']['status'] == 1) {
					$st = 0;
				} elseif ($d['World']['status'] == 0) {
					$st = 1;
				}
				$arr = array('id' => $d['World']['id'], 'status' => $st);
				$this->World->save($arr);
			}
			$this->redirect($this->referer());
		}

		if (isset($this->request->query['cc']) && !empty($this->request->query['cc'])) {
			$d = $this->World->find('first', array('conditions' => array('World.id' => $this->request->query['cc'], 'World.type' => 'co')));
			if (!empty($d)) {
				$st = 1;
				if ($d['World']['is_cc'] == 1) {
					$st = 0;
				} elseif ($d['World']['is_cc'] == 0) {
					$st = 1;
				}
				$arr = array('id' => $d['World']['id'], 'is_cc' => $st);
				$this->World->save($arr);
			}
			$this->redirect($this->referer());
		}

		if (isset($this->request->query['for_dealer']) && !empty($this->request->query['for_dealer'])) {
			$d = $this->World->find('first', array('conditions' => array('World.id' => $this->request->query['for_dealer'], 'World.type' => 'co')));
			if (!empty($d)) {
				$st = 1;
				if ($d['World']['for_dealer'] == 1) {
					$st = 0;
				} elseif ($d['World']['for_dealer'] == 0) {
					$st = 1;
				}
				$arr = array('id' => $d['World']['id'], 'for_dealer' => $st);
				$this->World->save($arr);
			}
			$this->redirect($this->referer());
		}

		if (!empty($this->data)) {
			$c = $this->World->find('count', array('conditions' => array('World.name' => $this->data['World']['name'], 'World.type' => 'co', 'World.status' => array(0, 1))));
			if (empty($this->data) && $c > 0) {
				$this->Session->setFlash(__('country name already exist'), 'default', array('class' => 'alert alert-danger'), 'msg');
			} else {

				if ($this->World->save($this->data)) {
					$this->Session->setFlash(__('Country has been added.'), 'default', array('class' => 'alert alert-success'), 'msg');
					$this->redirect($this->referer());
				} else {
					$this->Session->setFlash(__('Country has no tbeen added'), 'default', array('class' => 'alert alert-danger'), 'msg');
				}
			}
		}

		if (!empty($id)) {
			$all = $this->World->find('first', array('conditions' => array('World.id' => $id, 'World.type' => 'co')));
			if (empty($all)) {
				$this->layout = 'lab_404';
			}
		}
		$this->paginate = array('conditions' => array('World.type' => 'co', 'World.status' => array(0, 1)), 'maxLimit' => 200, 'limit' => 200, 'order' => array('World.name' => 'ASC'));
		$data = $this->paginate('World');
		$this->set(compact('data', 'all'));
	}




	/** Function for email templates */
	public function lab_email_templates()
	{
		$this->set('MenuHead', 'menu_templates');

		$this->set('title_for_layout', 'Email templates : ' . WEBTITLE);
		$this->paginate = array('maxLimit' => 50, 'limit' => 50, 'order' => array('EmailTemplate.id' => 'DESC'));
		$data = $this->paginate('EmailTemplate');
		$this->set('data', $data);
	}
	public function lab_email_templates_advance()
	{
		if ($this->request->is('ajax')) {
			$searchData = $this->request->data['name_value'];
			$this->paginate = array(
				'limit' => 100,
				'conditions' => array(
					'or' => array(
						"EmailTemplate.id" => $searchData,
						"EmailTemplate.type LIKE" => "%" . $searchData . "%",
						"EmailTemplate.sender_name LIKE" => "%" . $searchData . "%",
						"EmailTemplate.email LIKE" => "%" . $searchData . "%",
					)
				), 'order' => array('EmailTemplate.created' => 'DESC')
			);
			$data = $this->paginate('EmailTemplate');
			$this->set('data', $data);
		} else {
			exit;
		}
	}
	public function lab_my_email_template($id = null)
	{
		$this->set('MenuHead', 'menu_templates');
		if (!empty($id)) {
			$this->set('title_for_layout', 'Edit email templates : ' . WEBTITLE);
			$this->EmailTemplate->id = $id;
			if ($this->request->is('get')) {
				$e = $this->EmailTemplate->read();
				if (!empty($e)) {
					$this->request->data = $e;
				} else {
					$this->redirect(array('controller' => 'labs', 'action' => 'email_templates'));
				}
			} else {

				if ($this->EmailTemplate->save($this->request->data)) {
					$this->Session->setFlash(__('Template has been updated.'), 'default', array('class' => 'alert alert-success'), 'msg');
				} else {
					$this->Session->setFlash(__('Template has been not updated.'), 'default', array('class' => 'alert alert-danger'), 'msg');
				}
			}
		} else {
			$this->set('title_for_layout', 'Create new email template : ' . WEBTITLE);
			if (!empty($this->request->data)) {

				if ($this->EmailTemplate->save($this->request->data)) {
					//'SmsTemplate','MessageTemplate','NotificationTemplate'
					$lid = $this->EmailTemplate->getLastInsertId();

					if (!empty($this->request->data['sms'])) {
						$is_sms = $this->SmsTemplate->find('count', array('conditions' => array('SmsTemplate.type' => $this->request->data['EmailTemplate']['type'])));
						if ($is_sms == 0) {
							$smsArr = array('type' => $this->request->data['EmailTemplate']['type'], 'message' => $this->request->data['sms']);
							$this->SmsTemplate->save($smsArr);
						}
					}
					if (!empty($this->request->data['message'])) {
						$is_sms = $this->MessageTemplate->find('count', array('conditions' => array('MessageTemplate.type' => $this->request->data['EmailTemplate']['type'])));
						if ($is_sms == 0) {
							$smsArr = array('type' => $this->request->data['EmailTemplate']['type'], 'subject' => $this->request->data['EmailTemplate']['subject'], 'message' => $this->request->data['sms']);
							$this->MessageTemplate->save($smsArr);
						}
					}
					if (!empty($this->request->data['notification'])) {
						$is_sms = $this->NotificationTemplate->find('count', array('conditions' => array('NotificationTemplate.type' => $this->request->data['EmailTemplate']['type'])));
						if ($is_sms == 0) {
							$smsArr = array('type' => $this->request->data['EmailTemplate']['type'], 'message' => $this->request->data['sms']);
							$this->NotificationTemplate->save($smsArr);
						}
					}

					$this->Session->setFlash('Email Template info has been save successfully', 'default', array('class' => 'alert alert-success'), 'msg');
					$this->redirect(SITEURL . "lab/labs/my_email_template/" . $lid);
				} else {
					$this->Session->setFlash('Not able to save', 'default', array('class' => 'alert alert-danger'), 'msg');
				}
			}
		}
	}
	public function lab_status_email_templates($id = null, $t = null)
	{
		$this->autoRender = false;
		if (!empty($id)) {
			$d = $this->EmailTemplate->find('first', array('conditions' => array('EmailTemplate.id' => $id)));

			if (!empty($d)) {
				if ($d['EmailTemplate']['status'] == 1) {
					$s = 0;
				} else {
					$s = 1;
				}
				$save_arr = array('id' => $d['EmailTemplate']['id'], 'status' => $s);
				$this->EmailTemplate->save($save_arr);
			}
		}
		$this->redirect(array("controller" => "labs", "action" => "email_templates"));
	}

	/** << end of emaim templates >> */


	/** update website settings  */
	public function lab_settings()
	{

		$this->set('MenuHead', 'menu_settings');
		$this->set('title_for_layout', 'Web Settings : ' . WEBTITLE);
		$this->loadModel('WebSetting');
		if (empty($this->data)) {
			$this->WebSetting->id = '1';
			$this->request->data = $this->WebSetting->read();
		} else {

			if ($this->WebSetting->save($this->request->data)) {
				$this->Session->setFlash(__('Saved'), 'default', array('class' => 'alert alert-success'), 'msg');
			} else {
				$this->Session->setFlash(__('not savedd'), 'default', array('class' => 'alert alert-danger'), 'msg');
			}
		}
	}

	/** change admin user password*/
	public function lab_change_pwd()
	{
		$this->set('MenuHead', 'menu_settings');
		$this->set('title_for_layout', 'Change password : ' . WEBTITLE);

		if (!empty($this->data)) {
			$s = "<script>s();</script>";
			if (empty($this->data['p']) || empty($this->data['p1'])) {
				echo $s;
				echo "<div class='alert alert-danger fadeIn animated'>Please enter password</div>";
			} elseif (strlen($this->data['p']) < 6) {
				echo $s;
				echo "<div class='alert alert-danger fadeIn animated'>password must be at least 6 characters</div>";
			} elseif ($this->data['p'] !=  $this->data['p1']) {
				echo $s;
				echo "<div class='alert alert-danger fadeIn animated'>Passwords Do Not Match!</div>";
			} else {
				$arr = array('id' => ME, 'password' => $this->data['p']);
				$this->User->save($arr);
				echo $s;
				echo "<div class='alert alert-success fadeIn animated'>Password has been changed successfully</div>";
			}
			exit;
		}
	}
	public function lab_fee()
	{
		$this->set('MenuHead', 'menu_settings');
		$this->set('title_for_layout', 'Admin Fees : ' . WEBTITLE);
		$data = $this->Fee->find('first', array());
		$this->set('data', $data);

		if (!empty($this->data)) {
			if ($this->Fee->save($this->request->data)) {
				$this->Session->setFlash(__('Fees has been updated.'), 'default', array('class' => 'alert alert-success'), 'msg');
			} else {
				$this->Session->setFlash(__('Unable to update fess.'), 'default', array('class' => 'alert alert-danger '), 'msg');
			}
			$this->redirect(array("controller" => "labs", "action" => "fee"));
		}
	}

	public function lab_all_dealers()
	{
		$this->set('MenuHead', 'menu_user');
		$this->set('title_for_layout', 'All Dealer List : ' . WEBTITLE);

		$this->Address->bindModel(array('belongsTo' => array('World' => array('foreignKey' => 'country'))));
		$this->User->bindModel(array(
			'hasOne' => array('Address' => array('order' => array('Address.default_address' => 'DESC')))
		));
		$this->paginate = array(
			'recursive' => 2,
			'limit' => 50,
			'conditions' => array('User.role' => 3),
			'order' => array('User.created' => 'DESC')
		);
		$data = $this->paginate('User');

		$this->set('data', $data);
	}

	public function lab_all_dealers_advance()
	{

		if ($this->request->is('ajax')) {
			$this->Address->bindModel(array('belongsTo' => array('World' => array('foreignKey' => 'country'))));
			$this->User->bindModel(array(
				'hasOne' => array('Address' => array('order' => array('Address.default_address' => 'DESC')))
			));
			$searchData = $this->request->data['name_value'];
			$this->paginate = array(
				'recursive' => 1,
				'conditions' => array(
					'User.role' => 3,
					'or' => array(
						"User.first_name LIKE" => "%" . $searchData . "%",
						"User.last_name LIKE" => "%" . $searchData . "%",
						"User.id" => $searchData,
						"User.email LIKE" => "%" . $searchData . "%",
					)
				),
				'order' => array('User.id' => 'DESC'),
				'limit' => 100
			);
			$data = $this->paginate('User');
			$this->set('data', $data);
		}
	}


	public function lab_all_users()
	{
		$this->set('MenuHead', 'menu_user');
		$this->set('title_for_layout', 'All Users List : ' . WEBTITLE);
		$this->Address->bindModel(array('belongsTo' => array('World' => array('foreignKey' => 'country'))));
		$this->User->bindModel(array(
			'hasOne' => array('Address' => array('order' => array('Address.default_address' => 'DESC'))),
			//'hasMany'=>array('Order'=>array('fields' => array('sum(Order.grand_total) AS total'),'conditions'=>array('Order.order_status_id'=>array(2,3,5,13))))

		));
		$a = array(2);
		$this->paginate = array(
			'recursive' => 2,
			'limit' => 50,
			'conditions' => array('User.role' => $a),
			'order' => array('User.created' => 'DESC')
		);
		$data = $this->paginate('User');

		$this->set('data', $data);
	}
	public function lab_all_users_advance()
	{

		if ($this->request->is('ajax')) {
			$this->Address->bindModel(array('belongsTo' => array('World' => array('foreignKey' => 'country'))));
			$this->User->bindModel(array(
				'hasOne' => array('Address' => array('order' => array('Address.default_address' => 'DESC'))),
				//'hasMany'=>array('Order'=>array('fields' => array('sum(Order.grand_total) AS total'),'conditions'=>array('Order.order_status_id'=>array(2,3,5,13))))

			));
			$a = array(1, 2);
			$searchData = $this->request->data['name_value'];
			$this->paginate = array(
				'recursive' => 2,
				'conditions' => array(
					'User.role' => $a,
					'or' => array(
						"User.first_name LIKE" => "%" . $searchData . "%",
						"User.last_name LIKE" => "%" . $searchData . "%",
						"User.id" => $searchData,
						"User.email LIKE" => "%" . $searchData . "%",
					)
				),
				'order' => array('User.id' => 'DESC'),
				'limit' => 100
			);
			$data = $this->paginate('User');
			$this->set('data', $data);
		}
	}
	public function lab_all_admin()
	{
		$this->set('MenuHead', 'menu_user');
		$this->set('title_for_layout', 'All Users List : ' . WEBTITLE);
		$a = array(1);
		$this->paginate = array(
			'recursive' => 1,
			'limit' => 50,
			'conditions' => array('User.role' => $a),
			'order' => array('User.created' => 'DESC')
		);
		$data = $this->paginate('User');

		$this->set('data', $data);
	}



	public function lab_update_level()
	{
		$this->autoRender = false;
		if (!empty($this->data)) {
			$d = $this->User->find('first', array('recursive' => -1, 'conditions' => array('User.id' => $this->data['id'], 'User.role' => 3)));
			if (!empty($d)) {
				if (!in_array($this->data['level'], array(1, 2, 3))) {
					echo '<div class="alert alert-danger">Please try again later</div>';
				} elseif ($d['User']['status'] != 1) {
					echo '<div class="alert alert-danger">User is not active.</div>';
				} elseif ($d['User']['dealer_level_id'] == $this->data['level']) {
					echo '<div class="alert alert-danger">This Dealder already have this membership, Please select different membership level.</div>';
				} else {

					$arr = array('id' => $d['User']['id'], 'dealer_level_id' => $this->data['level']);
					$this->User->save($arr);

					$parameters = array('NAME' => $d['User']['first_name']);
					$tname = null;
					if ($this->data['level'] == 1) {
						$tname = 'GoldLevel';
					} elseif ($this->data['level'] == 2) {
						$tname = 'SilverLevel';
					} elseif ($this->data['level'] == 3) {
						$tname = 'MasterLevel';
					}
					$this->DATA->AppMail($d['User']['email'], $tname, $parameters, $dateTime = DATE);
					echo '<div class="alert alert-success">Dealership Level has been updated.</div>';
					echo "<script>parent.location.reload();</script>";
				}
			} else {
				echo '<div class="alert alert-danger">Please try again later</div>';
			}
			//$this->data['level']
		}
	}


	public function lab_up_user_st()
	{
		$this->autoRender = false;
		if (!empty($this->data)) {
			$d = $this->User->find('first', array('recursive' => -1, 'conditions' => array('User.id' => $this->data['id'])));
			if (!empty($d)) {
				$st = $t = null;
				if (in_array($d['User']['status'], array(0, 2, 3))) {
					$st = 1;
					$t = '<p class=\"text-green\">Active</p>';
				} elseif ($d['User']['status'] == 1) {
					$st = 3;
					$t = '<p class="text-red">Inactive</p>';
				}

				if (!empty($st)) {
					$Arr = array('id' => $this->data['id'], 'status' => $st);
					$this->User->save($Arr);

					if ($st == 1) {

						$parameters = array('NAME' => $d['User']['first_name']);
						$this->DATA->AppMail($d['User']['email'], 'AccountActive', $parameters, $dateTime = DATE);
					}

					echo "<script>$('#user_st_" . $this->data['id'] . "').html('" . $t . "'); </script>";
				}
			}
		}
	}
	public function lab_up_user_visibility()
	{
		$this->autoRender = false;
		if (!empty($this->data)) {
			$d = $this->User->find('first', array('recursive' => -1, 'conditions' => array('User.id' => $this->data['id'])));
			if (!empty($d)) {
				$st = $t = null;
				if (in_array($d['User']['is_hide'], array(0, 2, 3))) {
					$st = 1;
					$t = '<p class=\"text-green\">Visible</p>';
				} elseif ($d['User']['is_hide'] == 1) {
					$st = 2;
					$t = '<p class="text-red">Hidden</p>';
				}

				if (!empty($st)) {
					$Arr = array('id' => $this->data['id'], 'is_hide' => $st);
					$this->User->save($Arr);
					echo "<script>$('#user_visibility_" . $this->data['id'] . "').html('" . $t . "'); </script>";
				}
			}
		}
	}

	public function lab_user_profile($id = null)
	{
		$this->set('MenuHead', 'menu_user');
		$this->set('title_for_layout', 'User Profile : ' . WEBTITLE);
		$this->User->bindModel(array('hasMany' => array('Address')));
		if (!empty($id)) {
			$this->User->bindModel(array('hasMany' => array('Order' => array('fields' => array('sum(Order.grand_total) AS total'), 'conditions' => array('Order.order_status_id' => array(2, 3, 5, 13))))));
			$data = $this->User->find('first', array('conditions' => array('User.id' => $id)));


			if (!empty($data)) {
				$this->set('title_for_layout', $data['User']['first_name'] . '\'s Profile : ' . WEBTITLE);
			}
			$this->set('data', $data);
		}
	}

	public function lab_profile_pics()
	{
		$this->autoRender = false;
		$this->loadModel('UserImage');
		if (!empty($this->data)) {
			if ($this->data['type'] == "delete") {
				$d = $this->UserImage->find('first', array('UserImage.id' => $this->data['id']));
				if (!empty($d)) {
					if (file_exists('cdn/profile/' . $d['UserImage']['image'])) {
						unlink('cdn/profile/' . $d['UserImage']['image']);
					}
				}
				$this->UserImage->id = $d['UserImage']['id'];
				$this->UserImage->delete();
				echo "<script>parent.location.reload();</script>";
			} elseif ($this->data['type'] == "approve") {
				$arr = array('id' => $this->data['id'], 'status' => 1);
				$this->UserImage->save($arr);
				echo "<script>parent.location.reload();</script>";
			}
		}
	}
	public function lab_edit_user($id = null)
	{
		$this->set('MenuHead', 'menu_user');
		$this->set('title_for_layout', 'Edit user profile : ' . WEBTITLE);
		if (!empty($id)) {
			$data = $this->User->find('first', array('conditions' => array('User.id' => $id)));
			$this->set('data', $data);
		}

		if (!empty($this->request->data)) {

			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('User profile has been updated.'), 'default', array('class' => 'alert alert-success'), 'msg');
			} else {
				$this->Session->setFlash(__('Unable to update user profile.'), 'default', array('class' => 'alert alert-danger '), 'msg');
			}
		}
	}
	public function lab_update_user()
	{
		$this->autoRender = false;
		if (!empty($this->request->data)) {

			if ($this->data['type'] == 'password') {
				$s = "<script>s();</script>";
				if (isset($this->data['id']) && !empty($this->data['id'])) {
					if (!empty($this->data['new_pwd']) && strlen($this->data['new_pwd']) >= 6) {
						$arr = array('id' => $this->data['id'], 'password' => $this->data['new_pwd']);
						$this->User->save($arr);
						echo $s;
						echo "<div class='alert alert-success fadeIn animated'>Password has been changed successfully</div>";
					} else {
						echo $s;
						echo "<div class='alert alert-danger fadeIn animated'>Password must have minimum 6 characters</div>";
					}
				}
			} elseif ($this->data['type'] == 'about') {
				$s = "<script>as();</script>";
				if ($this->data['act'] == 1) {
					$arr = array('id' => $this->data['id'], 'about' => $this->data['real_about'], 'new_about' => null);
					$this->User->save($arr);
					echo $s;
					echo "<script>$('#real_about').val('');$('#about').val('" . $this->data['real_about'] . "');</script>";
					echo "<div class='alert alert-success fadeIn animated'>Description has been changed successfully</div>";
				} elseif ($this->data['act'] == 2) {
					$arr = array('id' => $this->data['id'], 'new_about' => null);
					$this->User->save($arr);
					echo $s;
					echo "<script>$('#real_about').val('');</script>";
					echo "<div class='alert alert-success fadeIn animated'>Description has been changed successfully</div>";
				}
			}
		}
	}

	public function lab_rotate_pic($id = null, $type = null)
	{
		$this->loadModel('UserImage');
		if (!empty($id) && !empty($type)) {
			if ($type == "profile") {
				$list = $this->UserImage->find('first', array('conditions' => array('UserImage.id' => $id)));
				if (!empty($list)) {
					$this->set('data', $list);
				}
			}
		}
		if (!empty($this->data)) {
			$path = $this->data['path'];
			$img = $this->data['img'];
			if (file_exists($this->data['path'])) {

				$ty = trim($this->data['type']);
				if ($ty == 'anti_clock') {
					$degrees = 90;
				} elseif ($ty == 'clock') {
					$degrees = -90;
				} else {
					$degrees = 90;
				}
				$rotateFilename = $path . '/' . $img;
				$this->DATA->rotateImage($rotateFilename, $img, $degrees);
				$url = show_image('cdn/profile', $img, 300, 300, 100, 'ff', 'user', null);
				$url = $url . "?v=" . uniqid();
				echo "<img alt=\"User Pic\" src=\"" . $url . "\" class=\"img-responsive\">";
			}
			exit;
		}
	}
	public function lab_add_media($id = null, $type = null, $for = null, $tbl = null)
	{
		if ($this->request->is('ajax')) {
			$aj = 'yes';
			$q = $this->request->query;
			$flist = $this->Library->find('all', array('fields' => array('DISTINCT folder')));
			$this->set(compact('flist', 'aj', 'id', 'type', 'q', 'for', 'tbl'));
		} else {
			$this->layout = false;
		}
	}
	public function lab_get_folder_img($f = null, $type = null, $tbl = null)
	{
		$this->layout = false;
		if (!empty($f)) {
			$this->paginate = array(
				'recursive' => -1, 'conditions' => array('Library.folder' => $f),
				'limit' => 500,
				'order' => array('Library.created' => 'DESC')
			);
			$data = $this->paginate('Library');
			$paging = $this->params['paging'];
			$this->set(compact('data', 'paging', 'f', 'type', 'tbl'));
		}
	}

	/*
     * $id : hidden filed id 
     * $type : one or more
     * $e : for diffrent conditons
     * */
	public function lab_new_add_media($id = null, $type = null, $e = null)
	{
		if ($this->request->is('ajax')) {
			$aj = 'yes';
			$q = $this->request->query;
			$flist = $this->Library->find('list', array('group' => array('Library.folder'), 'fields' => array('id', 'folder')));
			$this->set(compact('flist', 'aj', 'id', 'type', 'q', 'e'));
		} else {
			$this->layout = false;
		}
	}
	public function lab_new_get_folder_img($f = null, $type = null)
	{
		$this->layout = false;
		if (!empty($f)) {
			$this->paginate = array(
				'recursive' => -1, 'conditions' => array('Library.folder' => $f),
				'limit' => 100,
				'order' => array('Library.created' => 'DESC')
			);
			$data = $this->paginate('Library');
			$paging = $this->params['paging'];
			$this->set(compact('data', 'paging', 'f', 'type'));
		}
	}

	public function lab_msg_pop()
	{
		$msg = null;
		if (isset($_GET['m']) && !empty($_GET['m'])) {
			$msg = urldecode($_GET['m']);
		}
		if (isset($_GET['r']) && !empty($_GET['r'])) {
			$this->set('reload', 'here');
		}
		$this->set('msg', $msg);
	}

	public function lab_ftp()
	{
		$this->set('title_for_layout', 'FTP: ' . WEBTITLE);

		if ($this->RequestHandler->isAjax() && !empty($this->data)) {
			if (!empty($this->data['folder'])) {
				$fld = $this->data['folder'];
				$files = glob($fld . "/*.*");
				if (!empty($files)) {
					$tot = 0;
					foreach ($files as $num) {
						$arr = explode('/', $num);
						$f = $arr[1];
						$img = end($arr);
						$folder = strtolower(Inflector::slug($f, '-'));

						$imgExt = strtolower(pathinfo($img, PATHINFO_EXTENSION));
						$fName = strtolower(pathinfo($img, PATHINFO_FILENAME));
						$filename = strtolower(Inflector::slug($fName, '-')) . "." . $imgExt;
						if (in_array($imgExt, array('jpg', 'png', 'jpeg'))) {
							if (!file_exists('cdn/' . $folder)) {
								mkdir('cdn/' . $folder, 0777, true);
							}

							$r = $this->DATA->compress_image($fld . '/' . $img, 'cdn/' . $folder . '/' . $filename, 65);
							$Test_filename = WWW_ROOT . "cdn/$folder/" . $filename;
							if (file_exists($Test_filename)) {

								$ua = $this->DATA->getBrowser();
								$yourbrowser = "browser: " . $ua['name'] . " " . $ua['version'] . " on " . $ua['platform'] . " reports: <br >" . $ua['userAgent'];

								$ImgAtt = getimagesize($Test_filename);
								$temp_filename = WWW_ROOT . $fld . '/' . $img;
								unlink($temp_filename);
								$this->Library->create();
								$this->Library->set('folder', $folder);
								$this->Library->set('file_name', $filename);
								$this->Library->set('info', $yourbrowser);
								$this->Library->save(null, false);
								$img_id = $this->Library->getLastInsertId();
								$tot++;
							}
						}
					}
					if ($tot > 0) {
						echo "<div class='alert alert-success'>Total $tot files has been uploaded.</div>";
					} else {
						echo "<div class='alert alert-danger'>Images not uploaded.</div>";
					}
				} else {
					echo "<div class='alert alert-danger'>Selected Folder is empty.</div>";
				}
			} else {
				echo "<div class='alert alert-danger'>Please select folder.</div>";
			}
			exit;
		}

		$directories = array();
		$dir = glob('tmp_img/*', GLOB_ONLYDIR);
		if (!empty($dir)) {
			foreach ($dir as $k => $v) {
				$directories[$v] = $v;
			}
		}
		$this->set(compact('directories'));
	}


	public function lab_manage_slider($id = null)
	{
		$this->set('MenuHead', 'menu_setting');
		$this->set('title_for_layout', 'Manage slider : ' . WEBTITLE);

		if (!empty($id)) {
			$e = $this->VideoSlider->find('first', array('conditions' => array('VideoSlider.id' => $id)));
			$this->set('e', $e);
		}

		if ($this->RequestHandler->isAjax() && !empty($this->data)) {
			$this->VideoSlider->save($this->request->data);
			$u = SITEURL . "lab/labs/home_slider";
			echo "<script>setTimeout(function(){ window.location.href ='" . $u . "'; }, 500);</script>";
			exit;
		}
	}

	public function lab_home_slider()
	{

		$this->set('MenuHead', 'menu_setting');
		$this->set('title_for_layout', 'Slider : ' . WEBTITLE);

		if (isset($this->request->query['del']) && !empty($this->request->query['del'])) {
			$this->VideoSlider->id = $this->request->query['del'];
			$this->VideoSlider->delete();
			$this->redirect('/lab/labs/home_slider');
		}

		$this->paginate = array('maxLimit' => 50, 'limit' => 50, 'order' => array('VideoSlider.position' => 'ASC'));
		$data = $this->paginate('VideoSlider');
		$this->set('data', $data);
	}

	public function lab_home_slider_sort()
	{

		$this->autoRender = false;
		if (!empty($this->data)) {
			$arr = $d = array();
			if (isset($this->data['img']) && !empty($this->data['img'])) {
				foreach ($this->data['img'] as $key => $val) {
					$arr['id'] = $val;
					$arr['position'] = $key;
					$d[] = $arr;
				}
				if (!empty($d)) {
					if ($this->VideoSlider->saveMany($d, array('deep' => false))) {
						echo "<script>console.log('updated( " . count($d) . " )');</script>";
					}
				}
			}
		}
	}

	public function lab_manage_new($id = null)
	{
		$this->set('MenuHead', 'menu_setting');
		$this->loadModel('NewRelease');
		$this->set('title_for_layout', 'Manage New Release : ' . WEBTITLE);
		$this->NewRelease->bindModel(array('belongsTo' => array('Library')));

		if (!empty($id)) {
			$e = $this->NewRelease->find('first', array('conditions' => array('NewRelease.id' => $id)));
			$this->set('e', $e);
		}

		if ($this->RequestHandler->isAjax() && !empty($this->data)) {
			$this->NewRelease->save($this->request->data);
			$u = SITEURL . "lab/labs/new_releases";
			echo "<script>setTimeout(function(){ window.location.href ='" . $u . "'; }, 500);</script>";
			exit;
		}
	}

	public function lab_new_releases()
	{
		$this->loadModel('NewRelease');
		$this->set('MenuHead', 'menu_setting');
		$this->set('title_for_layout', 'New Releases : ' . WEBTITLE);

		if (isset($this->request->query['del']) && !empty($this->request->query['del'])) {
			$this->NewRelease->id = $this->request->query['del'];
			$this->NewRelease->delete();
			$this->redirect('/lab/labs/new_releases');
		}

		$this->paginate = array('maxLimit' => 50, 'limit' => 50, 'order' => array('NewRelease.pos' => 'ASC'));
		$data = $this->paginate('NewRelease');
		$this->set('data', $data);
	}

	public function lab_new_releases_sort()
	{
		$this->loadModel('NewRelease');
		$this->autoRender = false;
		if (!empty($this->data)) {
			$arr = $d = array();
			if (isset($this->data['img']) && !empty($this->data['img'])) {
				foreach ($this->data['img'] as $key => $val) {
					$arr['id'] = $val;
					$arr['pos'] = $key;
					$d[] = $arr;
				}
				if (!empty($d)) {
					if ($this->NewRelease->saveMany($d, array('deep' => false))) {
						echo "<script>console.log('updated( " . count($d) . " )');</script>";
					}
				}
			}
		}
	}


	public function lab_bg_img()
	{
		$this->set('title_for_layout', 'BG Image : ' . WEBTITLE);
		$this->set('MenuHead', 'menu_insta');
		$this->loadModel('BgImage');
		$this->paginate = array('recursive' => 1, 'limit' => 30, 'order' => array('BgImage.id' => 'DESC'));
		$data = $this->paginate('BgImage');
		$this->set('data', $data);
	}

	public function lab_update_bg($id = null)
	{

		$this->set('title_for_layout', 'Update BG images : ' . WEBTITLE);
		$this->set('MenuHead', 'menu_insta');
		$this->loadModel('BgImage');


		$data = $this->BgImage->find('first', array('conditions' => array('BgImage.id' => $id)));
		if (empty($data)) {
			$this->layout = '404';
		}
		$this->set('e', $data);

		if ($this->RequestHandler->isAjax() && !empty($this->data)) {

			if (!file_exists('cdn/bg_image')) {
				mkdir('cdn/bg_image', 0777, true);
			}

			if (empty($this->data['BgImage']['img']['name'])) {
				echo '<div class="alert alert-danger" role="alert">Please select an image.</div>';
			} else {

				$imgExt = strtolower(pathinfo($this->data['BgImage']['img']['name'], PATHINFO_EXTENSION));
				$fName = strtolower(pathinfo($this->data['BgImage']['img']['name'], PATHINFO_FILENAME));
				$filename = strtolower(Inflector::slug($fName, '-')) . "." . $imgExt;
				if (in_array($imgExt, array('jpg', 'png', 'jpeg', 'gif'))) {
					if (move_uploaded_file($this->data['BgImage']['img']['tmp_name'], WWW_ROOT . 'cdn/bg_image/' . $filename)) {
						$Test_filename = WWW_ROOT . "cdn/bg_image/" . $filename;
						if (file_exists($Test_filename)) {

							$this->request->data['BgImage']['image'] = $filename;
							$this->BgImage->save($this->request->data);
							echo '<div class="alert alert-success" role="alert"> Updated</div>';
							echo "<script>location.reload();</script>";
						}
					}
				}
			}
			exit;
		}
	}

	public function lab_languages()
	{
		$this->set('MenuHead', 'menu_setting');
		$this->set('title_for_layout', 'Languages : ' . WEBTITLE);

		if (isset($this->request->query['dis']) && !empty($this->request->query['dis'])) {
			$d = $this->Language->find('first', array('conditions' => array('Language.id' => $this->request->query['dis'])));
			if (!empty($d)) {
				$st = ($d['Language']['status'] == 1 ? 2 : 1);
				$arr = array('id' => $d['Language']['id'], 'status' => $st);
				$this->Language->save($arr);
			}
			$this->redirect(SITEURL . "lab/labs/languages");
		}
		if ($this->request->is('get') &&  isset($this->request->query['edit']) && !empty($this->request->query['edit'])) {
			$d = $this->Language->find('first', array('conditions' => array('Language.id' => $this->request->query['edit'])));
			if (!empty($d)) {
				$this->request->data = $d;
			}
		}

		if ($this->RequestHandler->isAjax() && !empty($this->data)) {
			$s = '<script>$("#s_ser").prop("disabled",false); $("#s_ser").val("Save");</script>';

			$this->Language->set($this->request->data['Language']);
			if ($this->Language->validates() === true) {

				if ($this->Language->save($this->request->data)) {
					echo "<div class='alert alert-success'>Saved</div>";
				} else {
					echo "<div class='alert alert-danger'>Not Saved</div>";
				}
				$u = SITEURL . 'lab/labs/languages';
				echo "<script>$('#s_ser').val('Saved'); setTimeout(function(){ window.location.href ='" . $u . "'; }, 1000);</script>";
			} else {
				$er = null;
				$failed_fields = $this->Language->invalidFields();
				if (!empty($failed_fields)) {
					foreach ($failed_fields as $k => $lf) {
						$er .= "<p><strong>" . ucwords(str_replace('_', ' ', $k)) . ": </strong> $lf[0]</p>";
					}
					$d = '<div class="alert alert-danger alert-dismissable fade in">' . $er . '<div>';
					echo $d;
				}
				echo $s;
			}
			exit;
		}
		$this->paginate = array('conditions' => array(), 'recursive' => 1, 'maxLimit' => 50, 'limit' => 50, 'order' => array('Language.name' => 'ASC'));
		$data = $this->paginate('Language');
		$paging = $this->params['paging'];
		$this->set(compact('data', 'paging'));
	}

	public function lab_string_translation($id = null)
	{
		$this->set('MenuHead', 'menu_setting');
		$this->set('title_for_layout', 'String Translation: ' . WEBTITLE);


		if (!empty($this->request->data) && $this->request->is('post')) {
			$this->Translation->saveMany($this->request->data['Translation']);
		}


		$string = $this->String->find('list', array('order' => array('String.id' => 'ASC'), 'fields' => array('String.id', 'String.text')));

		$language = $this->Language->find('first', array('conditions' => array('Language.id' => $id)));
		if (!empty($language) && !empty($string)) {
			$translation = $this->Translation->find('all', array('conditions' => array('Translation.language_id' => $id)));
			$tArr = $lngStr = array();

			foreach ($string as $k => $v) {
				$tmp = array();
				$tmp['id'] = null;
				$tmp['language_id'] = $language['Language']['id'];
				$tmp['string_id'] = $k;
				$tmp['code'] = $language['Language']['code'];
				$tmp['name'] = null;
				$tmp['text'] = $v;
				$lngStr[] = $tmp;
			}

			foreach ($lngStr as $k => $lngList) {

				if (!empty($translation)) {
					foreach ($translation as $tList) {
						if ($tList['Translation']['language_id'] == $lngList['language_id'] && $tList['Translation']['string_id'] == $lngList['string_id']) {
							$lngStr[$k]['id'] = $tList['Translation']['id'];
							$lngStr[$k]['name'] = $tList['Translation']['name'];
						}
					}
				}
			}
			$this->set(compact('language', 'lngStr'));
		} else {
			$this->layout = '404';
		}
	}

	public function lab_motorcycle_make($id = null)
	{
		$this->set('title_for_layout', 'Motorcycle Make : ' . WEBTITLE);

		if ($this->RequestHandler->isAjax() && !empty($this->data)) {
			$d = null;
			if (empty($this->data['id'])) {
				$d = $this->MotorcycleMake->find('count', array('conditions' => array('MotorcycleMake.name' => $this->data['name'])));
			}
			if ($d > 0) {
				echo '<div class="alert alert-danger" role="alert"> This Motorcycle Make name already exist.</div>';
			} else {
				$array = array('id' => $this->data['id'], 'name' => $this->data['name']);
				$this->MotorcycleMake->save($array);
				echo '<div class="alert alert-success" role="alert"> Added</div>';
				echo "<script>$('#add_br').remove(); setTimeout(function(){ window.location.href ='" . SITEURL . "lab/labs/motorcycle_make'; }, 1000);</script>";
			}
			exit;
		}

		if (isset($this->request->query['status']) && !empty($this->request->query['status'])) {
			$list = $this->MotorcycleMake->find('first', array('conditions' => array('MotorcycleMake.id' => $this->request->query['status'])));
			if (!empty($list)) {
				$st = ($list['MotorcycleMake']['status'] == 1 ? 2 : 1);
				$arr = array('id' => $list['MotorcycleMake']['id'], 'status' => $st);
				$this->MotorcycleMake->save($arr);
				$this->redirect(SITEURL . "lab/labs/motorcycle_make");
			}
		}

		if (!empty($id)) {
			$e = $this->MotorcycleMake->find('first', array('conditions' => array('MotorcycleMake.id' => $id)));
			$this->set('e', $e);
		}
		$data = $this->MotorcycleMake->find('all', array('order' => array('MotorcycleMake.name' => 'ASC')));
		$this->set('data', $data);
	}

	public function lab_motorcycle_model($id = null)
	{
		$this->set('title_for_layout', 'Manage Motorcycle Models');

		if (isset($this->request->query['status']) && !empty($this->request->query['status'])) {
			$list = $this->MotorcycleModel->find('first', array('conditions' => array('MotorcycleModel.id' => $this->request->query['status'])));
			if (!empty($list)) {
				$st = ($list['MotorcycleModel']['status'] == 1 ? 2 : 1);
				$arr = array('id' => $list['MotorcycleModel']['id'], 'status' => $st);
				$this->MotorcycleModel->save($arr);
				$this->redirect(SITEURL . "lab/labs/motorcycle_model");
			}
		}

		if ($this->RequestHandler->isAjax() && !empty($this->data)) {

			if (empty($this->data['brand_id'])) {
				echo '<div class="alert alert-info" role="alert"> Please select brand name.</div>';
			} elseif (empty($this->data['name'])) {
				echo '<div class="alert alert-info" role="alert"> Please enter model name</div>';
			} else {
				$a = array('id' => $this->data['id'], 'motorcycle_make_id' => $this->data['brand_id'], 'name' => $this->data['name']);
				$this->MotorcycleModel->save($a);
				echo '<div class="alert alert-success" role="alert"> Added</div>';
				echo "<script>setTimeout(function(){ window.location.href ='" . SITEURL . "lab/labs/motorcycle_model/" . $this->data['brand_id'] . "'; }, 1000);</script>";
			}
			exit;
		}


		$this->MotorcycleModel->bindModel(array('belongsTo' => array('MotorcycleMake')));
		$brand = $this->MotorcycleMake->find('list', array('order' => array('MotorcycleMake.name' => 'ASC'), 'fields' => array('id', 'name')));
		$c = [];
		if (!empty($id)) {
			$c = ['MotorcycleModel.motorcycle_make_id' => $id];
		}
		$this->paginate = array('limit' => 200, 'conditions' => $c, 'order' => array('MotorcycleModel.pos' => 'ASC'));
		$model = $this->paginate('MotorcycleModel');

		if (isset($_GET['edit']) && !empty($_GET['edit'])) {
			$e = $this->MotorcycleModel->find('first', array('conditions' => array('MotorcycleModel.id' => $_GET['edit'])));
			$this->set('e', $e);
		}
		$this->set(compact('brand', 'model', 'id'));
	}
	public function lab_mot_pos_mk()
	{
		$this->autoRender = false;
		if ($this->RequestHandler->isAjax()) {
			if (isset($this->data['model']) && !empty($this->data['model'])) {
				$arr = [];
				foreach ($this->data['model'] as $key => $val) {
					$arr[] = ['id' => $val, 'pos' => $key];
				}
				if (!empty($arr)) {
					$this->MotorcycleModel->saveAll($arr);
				}
			}
		}
	}

	public function lab_motorcycle_year($id = null, $mid = null)
	{
		$this->set('title_for_layout', 'Manage Motorcycle Years');
		if ($this->RequestHandler->isAjax() && !empty($this->data)) {
			$d = 0;
			if (empty($this->data['motorcycle_make_id'])) {
				echo '<div class="alert alert-info" role="alert"> Please select Make.</div>';
			} elseif (empty($this->data['motorcycle_model_id'])) {
				echo '<div class="alert alert-info" role="alert"> Please select Model.</div>';
			} elseif (empty($this->data['year_from'])) {
				echo '<div class="alert alert-info" role="alert"> Please enter Year From</div>';
			} else {
				if (empty($this->data['id'])) {
					$d = $this->MotorcycleYear->find('count', array('conditions' => array(
						'MotorcycleYear.year_from' => $this->data['year_from'],
						'MotorcycleYear.year_to' => $this->data['year_to'],
						'MotorcycleYear.motorcycle_model_id' => $this->data['motorcycle_model_id']
					)));
				}
				if ($d > 0) {
					echo '<div class="alert alert-danger" role="alert"> This Model year already exist.</div>';
				} else {
					$a = array('id' => $this->data['id'], 'motorcycle_make_id' => $this->data['motorcycle_make_id'], 'motorcycle_model_id' => $this->data['motorcycle_model_id'], 'year_from' => $this->data['year_from'], 'year_to' => $this->data['year_to']);
					$this->MotorcycleYear->save($a);
					echo '<div class="alert alert-success" role="alert"> Added</div>';
					echo "<script>$('#add_br').remove(); setTimeout(function(){ window.location.href ='" . SITEURL . "lab/labs/motorcycle_year/" . $this->data['motorcycle_make_id'] . "/" . $this->data['motorcycle_model_id'] . "'; }, 1000);</script>";
				}
			}
			exit;
		}

		if (isset($this->request->query['status']) && !empty($this->request->query['status'])) {
			$list = $this->MotorcycleYear->find('first', array('conditions' => array('MotorcycleYear.id' => $this->request->query['status'])));
			if (!empty($list)) {
				$st = ($list['MotorcycleYear']['status'] == 1 ? 2 : 1);
				$arr = array('id' => $list['MotorcycleYear']['id'], 'status' => $st);
				$this->MotorcycleYear->save($arr);
				$this->redirect($this->referer());
			}
		}
		if (isset($this->request->query['del']) && !empty($this->request->query['del'])) {
			$list = $this->MotorcycleYear->find('first', array('conditions' => array('MotorcycleYear.id' => $this->request->query['del'])));
			if (!empty($list)) {
				$this->MotorcycleYear->id = $list['MotorcycleYear']['id'];
				$this->MotorcycleYear->delete();
			}
			$this->redirect($this->referer());
		}

		$this->MotorcycleModel->bindModel(array('belongsTo' => array('MotorcycleMake')));
		$this->MotorcycleYear->bindModel(array('belongsTo' => array('MotorcycleModel', 'MotorcycleMake')));

		$brand = $this->MotorcycleMake->find('list', array('order' => array('MotorcycleMake.name' => 'ASC'), 'fields' => array('id', 'name')));
		$c1 = [];
		if (!empty($id)) {
			$c1[] = array('MotorcycleModel.motorcycle_make_id' => $id);
		}
		$model_list = $this->MotorcycleModel->find('list', array('conditions' => $c1, 'order' => array('MotorcycleModel.name' => 'ASC'), 'fields' => array('id', 'name')));

		$c = array();
		if (!empty($id)) {
			$c[] = array('MotorcycleYear.motorcycle_make_id' => $id);
		}
		if (!empty($mid)) {
			$c[] = array('MotorcycleYear.motorcycle_model_id' => $mid);
		}
		$this->paginate = array('maxLimit' => 500, 'limit' => 500, 'conditions' => $c, 'order' => array('MotorcycleYear.id' => 'DESC'));
		$data = $this->paginate('MotorcycleYear');


		if (isset($_GET['edit']) && !empty($_GET['edit'])) {
			$e = $this->MotorcycleYear->find('first', array('conditions' => array('MotorcycleYear.id' => $_GET['edit'])));
			$this->set('e', $e);
		}

		$this->set(compact('brand', 'id', 'model_list', 'mid', 'data'));
	}

	public function lab_mk_motorcycle_page($eid = null, $mid = null, $bid = null)
	{
		$this->autoRender = false;
		if (!empty($eid) && !empty($mid) && !empty($bid)) {
			$i = $this->Motorcycle->find('first', array('conditions' => array('Motorcycle.motorcycle_year_id' => $bid, 'Motorcycle.motorcycle_model_id' => $mid, 'Motorcycle.motorcycle_make_id' => $eid)));

			if (!empty($i)) {
				$this->redirect(SITEURL . 'lab/labs/update_motorcycle/' . $i['Motorcycle']['id']);
			} else {
				$this->request->data['Motorcycle']['motorcycle_make_id'] = $bid;
				$this->request->data['Motorcycle']['motorcycle_model_id'] = $mid;
				$this->request->data['Motorcycle']['motorcycle_year_id'] = $eid;
				$this->request->data['Motorcycle']['status'] = 0;
				$this->Motorcycle->save($this->request->data);
				$lid = $this->Motorcycle->getLastInsertId();
				$this->redirect(SITEURL . 'lab/labs/update_motorcycle/' . $lid);
			}
		}
	}

	public function lab_motorcycle_exhaust()
	{
		$this->set('title_for_layout', 'Motorcycle Exhause Products : ' . WEBTITLE);

		if (isset($this->request->query['del']) && !empty($this->request->query['del'])) {
			$d = $this->Product->find('first', array('conditions' => array('Product.id' => $this->request->query['del'])));
			if (!empty($d)) {
				$this->Product->id = $d['Product']['id'];
				$this->Product->delete();
			}
			$this->redirect(array('controller' => 'labs', 'action' => 'motorcycle_exhaust'));
		}

		if (isset($this->request->query['status']) && !empty($this->request->query['status'])) {
			$d = $this->Product->find('first', array('conditions' => array('Product.id' => $this->request->query['status'])));
			if (!empty($d)) {
				$st = ($d['Product']['status'] == 1 ? 0 : 1);
				$arr = ['id' => $d['Product']['id'], 'status' => $st];
				$this->Product->save($arr);
			}
			$this->redirect(array('controller' => 'labs', 'action' => 'motorcycle_exhaust'));
		}

		$years = $c = [];
		$ec[] = ['Product.type' => [6, 7]];
		$q = $this->request->query;
		$make = $this->MotorcycleMake->find('list', array('order' => array('MotorcycleMake.name' => 'ASC'), 'fields' => array('id', 'name')));
		if (isset($q['make']) && !empty($q['make'])) {
			$c = ['MotorcycleModel.motorcycle_make_id' => $q['make']];
			$ec[] = ['MotorcycleModel.motorcycle_make_id' => $q['make']];
		}
		$model_list = $this->MotorcycleModel->find('list', array('conditions' => $c, 'order' => array('MotorcycleModel.name' => 'ASC'), 'fields' => array('id', 'name')));

		if (isset($q['model']) && !empty($q['model'])) {
			$ec[] = array('Product.motorcycle_model_id' => $q['model']);
			$getYears = $this->MotorcycleYear->find('all', array('conditions' => array('MotorcycleYear.motorcycle_model_id' => $q['model']), 'order' => array('MotorcycleYear.year_from' => 'ASC')));
			if (!empty($getYears)) {
				foreach ($getYears as $y) {
					$years[$y['MotorcycleYear']['id']] = $y['MotorcycleYear']['year_from'] . " - " . (!empty($y['MotorcycleYear']['year_to']) ? $y['MotorcycleYear']['year_to'] : 'present');
				}
			}
		}
		if (isset($q['year']) && !empty($q['year'])) {
			$ec[] = array('Product.motorcycle_year_id' => $q['year']);
		}


		$this->Product->bindModel(array('belongsTo' => array('Library', 'MotorcycleMake', 'MotorcycleModel', 'MotorcycleYear')));
		$this->paginate = array(
			'conditions' => $ec,
			'maxLimit' => 30, 'limit' => 30, 'order' => array('Product.id' => 'DESC')
		);
		$data = $this->paginate('Product');
		$paging = $this->params['paging'];
		$this->set(compact('data', 'paging', 'make', 'model_list', 'q', 'years'));
	}

	public function lab_motorcycle_exhaust_product($make_id = null, $model_id = null, $year_id = null)
	{
		$this->set('title_for_layout', 'Motorcycle Exhause Product : ' . WEBTITLE);

		if ($this->RequestHandler->isAjax() && !empty($this->data)) {
			if (!empty($this->data)) {
				if (empty($this->data['Product']['library_id'])) {
					echo '<div class="alert alert-danger fadeIn animated">Please select image.</div>';
				} else {
					if (!empty($this->request->data['Product']['id'])) {
						$this->request->data['Product']['status'] = 1;
					}
					if ($this->request->data['Product']['type'] == 7) {
						$this->request->data['Product']['full_part'] = $this->request->data['Product']['full_material'] = $this->request->data['Product']['full_details'] = null;
					}

					$this->Product->set($this->request->data);
					if ($this->Product->validates()) {
						$this->Product->save($this->data);
						$this->Session->setFlash(__('Product has been successfully saved'), 'default', array('class' => 'alert alert-success'), 'msg');
						echo '<script>location.reload();;</script>';
					} else {
						$str = null;
						$errors = $this->Product->validationErrors;
						if (!empty($errors)) {
							foreach ($errors as $err) {
								$str .= $err[0] . "<br>";
							}
							echo '<div class="alert alert-danger fadeIn animated">' . $str . '</div>';
						}
					}
				}
			}
			exit;
		}

		$years = $c = [];
		$brand = $this->MotorcycleMake->find('list', array('order' => array('MotorcycleMake.name' => 'ASC'), 'fields' => array('id', 'name')));
		if (!empty($make_id)) {
			$c = array('MotorcycleModel.motorcycle_make_id' => $make_id);
		}
		$model_list = $this->MotorcycleModel->find('list', array('conditions' => $c, 'order' => array('MotorcycleModel.name' => 'ASC'), 'fields' => array('id', 'name')));
		if (!empty($model_id)) {
			$getYears = $this->MotorcycleYear->find('all', array('conditions' => array('MotorcycleYear.motorcycle_model_id' => $model_id), 'order' => array('MotorcycleYear.year_from' => 'ASC')));
			if (!empty($getYears)) {
				foreach ($getYears as $y) {
					$years[$y['MotorcycleYear']['id']] = $y['MotorcycleYear']['year_from'] . " - " . (!empty($y['MotorcycleYear']['year_to']) ? $y['MotorcycleYear']['year_to'] : 'present');
				}
			}
		}
		if (isset($this->request->query['edit'])) {
			$this->Product->bindModel(array('belongsTo' => array('Library')));
			$e = $this->Product->find('first', array('conditions' => array('Product.type' => [6, 7], 'Product.id' => $this->request->query['edit'])));
			if (empty($e)) {
				$this->layout = 'lab_404';
			}
			$this->set('e', $e);
		}
		$this->set(compact('brand', 'model_list', 'years', 'make_id', 'model_id', 'year_id'));
	}

	public function lab_motorcycles()
	{
		$this->set('title_for_layout', 'Motorcycles : ' . WEBTITLE);

		if (isset($this->request->query['id']) && !empty($this->request->query['id'])) {
			$d = $this->Motorcycle->find('first', array('conditions' => array('Motorcycle.id' => $this->request->query['id'])));
			if (!empty($d)) {
				$status = ($d['Motorcycle']['status'] == 1 ? 0 : 1);
				$arr = array('id' => $d['Motorcycle']['id'], 'status' => $status);
				$this->Motorcycle->save($arr);
			}
			$this->redirect($this->referer());
		}
		$years = $c = $ec = [];
		$q = $this->request->query;
		$make = $this->MotorcycleMake->find('list', array('order' => array('MotorcycleMake.name' => 'ASC'), 'fields' => array('id', 'name')));
		if (isset($q['make']) && !empty($q['make'])) {
			$c = array('MotorcycleModel.motorcycle_make_id' => $q['make']);
			$ec[] = array('Motorcycle.motorcycle_make_id' => $q['make']);
		}
		$model_list = $this->MotorcycleModel->find('list', array('conditions' => $c, 'order' => array('MotorcycleModel.name' => 'ASC'), 'fields' => array('id', 'name')));
		if (isset($q['model']) && !empty($q['model'])) {
			$getYears = $this->MotorcycleYear->find('all', array('conditions' => array('MotorcycleYear.motorcycle_model_id' => $q['model']), 'order' => array('MotorcycleYear.year_from' => 'ASC')));
			if (!empty($getYears)) {
				foreach ($getYears as $y) {
					$years[$y['MotorcycleYear']['id']] = $y['MotorcycleYear']['year_from'] . " - " . (!empty($y['MotorcycleYear']['year_to']) ? $y['MotorcycleYear']['year_to'] : 'present');
				}
			}
			$ec[] = array('Motorcycle.motorcycle_model_id' => $q['model']);
		}

		if (isset($q['year']) && !empty($q['year'])) {
			$ec[] = array('Motorcycle.motorcycle_year_id' => $q['year']);
		}
		$ec[] = ['Motorcycle.language' => 'eng'];
		$this->Motorcycle->bindModel(array('belongsTo' => array('MotorcycleMake', 'MotorcycleModel', 'MotorcycleYear')));
		$this->paginate = array(
			'recursive' => 2, 'conditions' => $ec,
			'limit' => 100,
			'order' => array('Motorcycle.created' => 'DESC')
		);
		$data = $this->paginate('Motorcycle');
		$paging = $this->params['paging'];
		$this->set(compact('data', 'q', 'ec', 'make', 'model_list', 'years', 'paging'));
	}

	/* create/update  */
	private function _updateMotorMultilingual($id = null)
	{
		if (!empty($id)) {
			$this->Motorcycle->bindModel(['hasMany' => ['MotorcyclePages' => ['className' => 'Motorcycle', 'foreignKey' => 'motorcycle_id']]], false);
			$data = $this->Motorcycle->find('first', ['conditions' => ['Motorcycle.id' => $id]]);

			$this->Motorcycle->validator()->remove('title');
			$this->Motorcycle->validator()->remove('url');

			if (!empty($data)) {
				if (empty($data['MotorcyclePages'])) {
					$getLanguage = $this->Language->find('all');
					if (!empty($getLanguage)) {
						foreach ($getLanguage as $lang) {
							$u = 'https://www.googleapis.com/language/translate/v2?key=' . G_KEY . '&source=en&target=' . $lang['Language']['code'];
							$url = strtolower(Inflector::slug($data['Motorcycle']['url'] . "-" . $lang['Language']['language'], '-'));
							$isPage = $this->Motorcycle->find('count', ['conditions' => ['Motorcycle.url' => $url]]);
							if ($isPage == 0) {
								$pArr = null;
								$pArr['id'] = null;
								$pArr['url'] = $url;
								$pArr['status'] = 1;
								$pArr['language'] = $lang['Language']['code'];
								$pArr['motorcycle_id'] = $data['Motorcycle']['id'];
								$pArr['motorcycle_make_id'] = $data['Motorcycle']['motorcycle_make_id'];
								$pArr['motorcycle_model_id'] = $data['Motorcycle']['motorcycle_model_id'];
								$pArr['motorcycle_year_id'] = $data['Motorcycle']['motorcycle_year_id'];

								$name = $this->DATA->fetch($u . '&q=' . urlencode($data['Motorcycle']['title']) . '&q=' . urlencode($data['Motorcycle']['meta_title']) . '&q=' . urlencode($data['Motorcycle']['meta_description']));
								if (!empty($name)) {
									$arrName = json_decode($name, true);
								}

								$pArr['title'] = (isset($arrName['data']['translations'][0]['translatedText']) ? $arrName['data']['translations'][0]['translatedText'] : null);
								$pArr['meta_title'] = (isset($arrName['data']['translations'][1]['translatedText']) ? $arrName['data']['translations'][1]['translatedText'] : null);
								$pArr['meta_description'] = (isset($arrName['data']['translations'][2]['translatedText']) ? $arrName['data']['translations'][2]['translatedText'] : null);
								$this->Motorcycle->save($pArr);
								$pArr = null;
							}
						}
					}
				} else {
					foreach ($data['MotorcyclePages'] as $page) {
						$u = 'https://www.googleapis.com/language/translate/v2?key=' . G_KEY . '&source=en&target=' . $page['language'];
						$pArr = null;
						$pArr['id'] = $page['id'];
					
						$name = $this->DATA->fetch($u . '&q=' . urlencode($data['Motorcycle']['title']) . '&q=' . urlencode($data['Motorcycle']['meta_title']) . '&q=' . urlencode($data['Motorcycle']['meta_description']));
						if (!empty($name)) {
							$arrName = json_decode($name, true);
						}

						$pArr['title'] = (isset($arrName['data']['translations'][0]['translatedText']) ? $arrName['data']['translations'][0]['translatedText'] : null);
						$pArr['meta_title'] = (isset($arrName['data']['translations'][1]['translatedText']) ? $arrName['data']['translations'][1]['translatedText'] : null);
						$pArr['meta_description'] = (isset($arrName['data']['translations'][2]['translatedText']) ? $arrName['data']['translations'][2]['translatedText'] : null);
						$this->Motorcycle->save($pArr);
						$pArr = null;
					}
				}
			}
		}
	}

	public function lab_update_motorcycle($id = null)
	{
		$this->set('title_for_layout', 'Update Motorcycle Page : ' . WEBTITLE);
		$q = $this->request->query;

		/* Sabve General data */
		if ($this->RequestHandler->isAjax() && isset($this->data['Motorcycle']['id']) && !empty($this->data['Motorcycle']['id'])) {
			$st = SITEURL . $this->request->url . "?" . http_build_query($this->request->query);
			if (isset($this->data['Motorcycle']['url'])) {
				$this->request->data['Motorcycle']['url'] = strtolower(Inflector::slug($this->data['Motorcycle']['url'], '-'));
			}
			$this->Motorcycle->set($this->request->data);
			if ($this->Motorcycle->validates()) {
				$this->Motorcycle->save($this->request->data);
				$this->_updateMotorMultilingual($this->data['Motorcycle']['id']);
				echo '<div class="alert alert-success" role="alert"> Saved</div>';
				echo "<script>setTimeout(function(){ window.location.href ='" . $st . "'; }, 500);</script>";
			} else {
				$str = null;
				$errors = $this->Motorcycle->validationErrors;
				if (!empty($errors)) {
					foreach ($errors as $err) {
						$str .= $err[0] . "<br>";
					}
					echo '<script>btnState();</script><div class="alert alert-danger fadeIn animated">' . $str . '</div>';
				}
			}
			exit;
		}
		/* End */

		if (!empty($id) && isset($this->request->query['lng_del']) && !empty($this->request->query['lng_del'])) {
			$f = $this->Motorcycle->find('first', array('conditions' => array('Motorcycle.id' => $this->request->query['lng_del'])));
			if (!empty($f)) {
				$this->Motorcycle->id = $f['Motorcycle']['id'];
				$this->Motorcycle->delete();
			}
			$this->redirect('/lab/labs/update_motorcycle/' . $id . '?tab=multilingual');
		}
		if (!empty($id) && isset($this->request->query['lng_act']) && !empty($this->request->query['lng_act'])) {
			$d = $this->Motorcycle->find('first', array('conditions' => array('Motorcycle.id' => $this->request->query['lng_act'])));
			if (!empty($d)) {
				$st =  ($d['Motorcycle']['status'] == 1 ? 0 : 1);
				$arr = array('id' => $d['Motorcycle']['id'], 'status' => $st);
				$this->Motorcycle->save($arr);
			}
			$this->redirect('/lab/labs/update_motorcycle/' . $id . '?tab=multilingual');
		}

		

		
		if (!empty($id)) {
			$data = $sliders = [];
			$this->Motorcycle->bindModel(array('hasMany' => array('Video' => ['order' => ['Video.pos' => 'ASC']]), 'belongsTo' => array('MotorcycleMake', 'MotorcycleModel', 'MotorcycleYear')));
			$data = $this->Motorcycle->find('first', array('recursive' => 2, 'conditions' => array('Motorcycle.id' => $id)));

			if (isset($q['tab']) && $q['tab'] == 'slider') {
				if (!empty($data['Motorcycle']['slider'])) {
					$ids = explode(',', $data['Motorcycle']['slider']);
					$or1 = array('FIELD(Library.id,' . $data['Motorcycle']['slider'] . ')');
					$sliders = $this->Library->find('all', array('order' => $or1, 'conditions' => array('Library.id' => $ids)));
				}
			}
			if (isset($q['tab']) && $q['tab'] == 'gallery') {
				if (!empty($data['Motorcycle']['gallery'])) {
					$ids = explode(',', $data['Motorcycle']['gallery']);
					$or1 = array('FIELD(Library.id,' . $data['Motorcycle']['gallery'] . ')');
					$sliders = $this->Library->find('all', array('order' => $or1, 'conditions' => array('Library.id' => $ids)));
				}
			}
			 elseif (isset($q['tab']) &&  $q['tab'] == 'multilingual') {
				$lgcode = [];
				$langArr = $this->Language->find('list', array('fields' => array('Language.code', 'Language.language'), 'conditions' => array('Language.status' => 1)));
				if (!empty($langArr)) {
					foreach ($langArr as $lk => $lv) {
						$lgcode[] = $lk;
					}
				}
				$allLangPage = $this->Motorcycle->find('all', array('conditions' => array('Motorcycle.language' => $lgcode, 'Motorcycle.motorcycle_id' => $id)));
				$this->set(compact('allLangPage', 'langArr'));
			}
			if (empty($data)) {
				$this->layout = 'lab_404';
			}
		}

		$this->set(compact('data', 'q', 'sliders'));
	}

	public function lab_update_motorcycle_lang($id = null, $lang = null)
	{
		$this->set('title_for_layout', 'Update Motorcycle Page : ' . WEBTITLE);
		if ($this->request->is('ajax') && isset($this->data['Motorcycle']) && !empty($this->data['Motorcycle'])) {
			$st = SITEURL . $this->request->url . "?" . http_build_query($this->request->query);
			if (isset($this->data['Motorcycle']['url'])) {
				$this->request->data['Motorcycle']['url'] = strtolower(Inflector::slug($this->data['Motorcycle']['url'], '-'));
			}
			$this->Motorcycle->set($this->request->data);
			if ($this->Motorcycle->validates()) {
				$this->Motorcycle->save($this->request->data);
				echo '<div class="alert alert-success" role="alert"> Added</div>';
				echo "<script>setTimeout(function(){ window.location.href ='" . $st . "'; }, 500);</script>";
			} else {
				$str = null;
				$errors = $this->Motorcycle->validationErrors;
				if (!empty($errors)) {
					foreach ($errors as $err) {
						$str .= $err[0] . "<br>";
					}
					echo '<script>btnState();</script><div class="alert alert-danger fadeIn animated">' . $str . '</div>';
				}
			}
			exit;
		}
		if (!empty($id) && !empty($lang)) {
			$q = $this->request->query;
			if (!empty($id)) {
				$cList = $sList = array();
				$this->Motorcycle->bindModel(['belongsTo' => ['MotorcycleMake', 'MotorcycleModel', 'MotorcycleYear']]);
				$data = $this->Motorcycle->find('first', array('recursive' => 2, 'conditions' => array('Motorcycle.id' => $id)));
				$langArr = $this->Language->find('list', array('fields' => array('Language.code', 'Language.language')));
				if (empty($data)) {
					$this->layout = 'lab_404';
				}
			}

			$this->set(compact('data', 'q', 'cList', 'sList', 'langArr', 'lang'));
		}
	}

	public function lab_up_motorcycle()
	{
		$this->autoRender = false;
		if ($this->request->is('ajax')) {
			
			$d = $this->Motorcycle->find('first', array('conditions' => array('Motorcycle.id' => $this->data['id'])));
			if ($this->data['type'] == 'del' && !empty($this->data['id']) && !empty($this->data['lid'])) {
				if (!empty($d)) {
					if ($this->data['dtype'] == 'slider') {
						$f = explode(',', $d['Motorcycle']['slider']);
						$array_to_remove = array($this->data['lid']);
						$final_array = array_diff($f, $array_to_remove);
						$final_array = implode(',', $final_array);
						$final_array = trim($final_array, ',');
						$arr = array('id' => $d['Motorcycle']['id'], 'slider' => $final_array);
					}
					if (!empty($arr)) {
						$this->Motorcycle->save($arr);
					}
				}
			} elseif ($this->data['type'] == 'slider' && !empty($this->data['id'])) {
				if (!empty($d)) {
					if ($this->data['slider_for'] == 1) {
						$f = explode(',', $d['Motorcycle']['slider']);
						$n = explode(',', $this->data['slider']);
						$r = array_merge($f, $n);
						$r = array_unique($r);
						$str = implode(',', $r);
						$str = trim($str, ',');
						$arr = array('id' => $d['Motorcycle']['id'], 'slider' => $str);
						$this->Motorcycle->save($arr);
					} 
				}
			}
			elseif ($this->data['type'] == 'gallery' && !empty($this->data['id'])) {
				if (!empty($d)) {
					if ($this->data['slider_for'] == 1) {
						$f = explode(',', $d['Motorcycle']['gallery']);
						$n = explode(',', $this->data['slider']);
						$r = array_merge($f, $n);
						$r = array_unique($r);
						$str = implode(',', $r);
						$str = trim($str, ',');
						$arr = array('id' => $d['Motorcycle']['id'], 'gallery' => $str);
						$this->Motorcycle->save($arr);
					} 
				}
			}
			 elseif ($this->data['type'] == 'primary' && !empty($this->data['id'])) {
				if (!empty($d)) {
					if ($this->data['dtype'] == 'slider') {
						$ids = explode(',', $d['Motorcycle']['slider']);
						$key = array_search($this->data['lid'], $ids);
						$f = $ids[0];
						$ids[0] = $this->data['lid'];
						$ids[$key] = $f;
						$s = implode(',', $ids);
						$arr = array('id' => $d['Motorcycle']['id'], 'slider' => $s);
						$this->Motorcycle->save($arr);
					}
				}
			}
		}
	}

	public function lab_motorcycle_videos()
	{
		$this->autoRender = false;
		if (!empty($this->data)) {
			$vi = trim($this->data['Motorcycle']['vid']);
			if (empty($vi)) {
				$this->Session->setFlash(__('Please enter valid Youtube ID/URL'), 'default', array('class' => 'alert alert-danger'), 'msg');
			} else {
				$d = $this->Motorcycle->find('first', array('conditions' => array('Motorcycle.id' => $this->data['Motorcycle']['id'])));
				if (!empty($d)) {
					$vid = null;
					if (filter_var($this->data['Motorcycle']['vid'], FILTER_VALIDATE_URL)) {
						$t = $this->DATA->parse_yturl($this->data['Motorcycle']['vid']);
						if (empty($t)) {
							$this->Session->setFlash(__('Invalide Youtube video URL.'), 'default', array('class' => 'alert alert-danger'), 'msg');
							$this->redirect($this->referer());
						} else {
							$vid = $t;
						}
					} else {
						$vid = $this->data['Motorcycle']['vid'];
					}

					if (!empty($vid)) {
						$arr = array('motorcycle_id' => $d['Motorcycle']['id'], 'video' => $vid);
						$this->Video->save($arr);
						$this->Session->setFlash(__('Youtube video saved.'), 'default', array('class' => 'alert alert-success'), 'msg');
					} else {
						$this->Session->setFlash(__('Not saved'), 'default', array('class' => 'alert alert-danger'), 'msg');
					}
				}
			}
			$this->redirect($this->referer());
		}
	}

	public function lab_add_motorcycle_product($id = null, $type = null)
	{
		if ($this->request->is('ajax')) {
			$aj = 'yes';
			$q = $this->request->query;
			$i = $this->Motorcycle->find('first', array('conditions' => array('Motorcycle.id' => $id)));
			if (!empty($i)) {
				$list = $this->Product->find('all', array('conditions' => array(
					'Product.type' => [6, 7],
					'Product.motorcycle_make_id' => $i['Motorcycle']['motorcycle_make_id'],
					'Product.motorcycle_model_id' => $i['Motorcycle']['motorcycle_model_id'],
					'Product.motorcycle_year_id' => $i['Motorcycle']['motorcycle_year_id']
				)));
			}
			$this->set(compact('aj', 'id', 'type', 'q', 'list', 'i'));
		} else {
			$this->layout = false;
		}
	}

	public function lab_lang_car_detail($id = null, $lang = null)
	{
		$this->set('title_for_layout', 'Update Car Details : ' . WEBTITLE);
		if ($this->RequestHandler->isAjax() && !empty($this->data)) {
			$st = SITEURL . $this->request->url . "?" . http_build_query($this->request->query);
			if (isset($this->data['ItemDetail']['url'])) {
				$this->request->data['ItemDetail']['url'] = strtolower(Inflector::slug($this->data['ItemDetail']['url'], '-'));
			}

			$this->ItemDetail->set($this->request->data);
			if ($this->ItemDetail->validates()) {
				$this->ItemDetail->save($this->request->data);
				echo '<div class="alert alert-success" role="alert"> Added</div>';
				echo "<script>setTimeout(function(){ window.location.href ='" . $st . "'; }, 500);</script>";
			} else {
				$str = null;
				$errors = $this->ItemDetail->validationErrors;
				if (!empty($errors)) {
					foreach ($errors as $err) {
						$str .= $err[0] . "<br>";
					}
					echo '<script>btnState();</script><div class="alert alert-danger fadeIn animated">' . $str . '</div>';
				}
			}
			exit;
		}

		if (!empty($id) && !empty($lang)) {
			$q = $this->request->query;

			if (!empty($id)) {
				$cList = $sList = array();
				$this->ItemDetail->bindModel(['belongsTo' => ['Brand', 'Model', 'Motor']]);
				$data = $this->ItemDetail->find('first', array('recursive' => 2, 'conditions' => array('ItemDetail.id' => $id)));
				$langArr = $this->Language->find('list', array('fields' => array('Language.code', 'Language.language')));
				if (empty($data)) {
					$this->layout = 'lab_404';
				}
			}

			$this->set(compact('data', 'q', 'cList', 'sList', 'langArr', 'lang'));
		}
	}


	public function lab_delete_motor()
	{
		$this->autoRender = false;
		if (!empty($this->data)) {
			$d = $this->ItemDetail->find('all', array('conditions' => array('ItemDetail.language'=>'eng','ItemDetail.motor_id' => $this->data['id'])));
			$ids = [];
			$st = 2;
			if( !empty($d) ){
				foreach($d  as $list ){
					$ids[] = $list['ItemDetail']['id'];
					if($list['ItemDetail']['status'] == 1 ){ $st = 1; }
				}
				if($st == 1 ){
				 echo "<script> alert('Car motor record NOT deleted. Please delete or inactive related Car to delete this motor record.');</script>";
				 exit;
				}else{
					$this->ItemDetail->deleteAll(array('ItemDetail.id' => $ids), false);
					$this->ItemDetail->deleteAll(array('ItemDetail.item_detail_id' => $ids), false);
					$this->Video->deleteAll(array('Video.item_detail_id' => $ids), false);
					$this->Motor->id = $this->data['id']; $this->Motor->delete();
					echo "<script> alert('Car motor record has been deleted'); location.reload();</script>";
					exit;
				}
			}else{
				$this->Motor->id = $this->data['id'];
				$this->Motor->delete();
				echo "<script> alert('Car Motor record has been deleted'); location.reload();</script>";
				exit;
			}
		}
		exit;
	}


	public function lab_del_car($id = null)
	{
		$this->autoRender = false;
		if (!empty($id)) {
			$this->ItemDetail->bindModel(array('hasMany' => array('Shipping', 'QualityDetail')));
			$d = $this->ItemDetail->find('first', array('conditions' => array('ItemDetail.id' => $id)));
			if (!empty($d)) {
				$this->ItemDetail->id = $d['ItemDetail']['id'];
				$this->ItemDetail->delete();
				$this->ItemDetail->deleteAll(array('ItemDetail.item_detail_id' => $d['ItemDetail']['id']), false);
				$this->Video->deleteAll(array('Video.item_detail_id' => $d['ItemDetail']['id']), false);
			}
			$this->redirect($this->referer());
		}
	}

	public function lab_del_model()
	{
		$this->autoRender = false;
		if (!empty($this->data)) {
			$carIDS = $motorIDS = [];
			$motorSt = $st = 2;
			$this->Motor->bindModel(['hasMany'=>['ItemDetail'=>['conditions'=>['ItemDetail.language'=>'eng']]]]);
			$this->Motor->unbindModel(['belongsTo'=>['Library','Model']]);
			$getMotor = $this->Motor->find('all',['recursive'=>2,'conditions'=>['Motor.model_id'=>$this->data['id']]]);
			if(!empty($getMotor)){
				foreach($getMotor as $mt){
					$motorIDS[] = $mt['Motor']['id'];
					if($mt['Motor']['status'] == 1 ){ $motorSt = 1; }
					if(!empty($mt['ItemDetail'])){
						foreach($mt['ItemDetail'] as $car){
							$carIDS[] = $car['id'];
							if($car['status'] == 1 ){ $st = 1; }
						}
					}
				}
				if($st == 2){
					if(!empty($carIDS)){
						$this->ItemDetail->deleteAll(array('ItemDetail.id' => $carIDS), false);
						$this->ItemDetail->deleteAll(array('ItemDetail.item_detail_id' => $carIDS), false);
						$this->Video->deleteAll(array('Video.item_detail_id' => $carIDS), false);
					}
					if(!empty($motorIDS)){
						$this->Motor->deleteAll(array('Motor.id' => $motorIDS), false);
					}
					$this->Model->id = $this->data['id'];
					$this->Model->delete();
					echo "<script> alert('Car Model and related motor/car records has been deleted'); location.reload();</script>";
					exit;
				}else{
					echo "<script> alert('Car Model record NOT deleted. Please delete or inactive related car motor and car record to delete this car model record.');</script>"; exit;
				}
			}
			else{
				$this->Model->id = $this->data['id'];
				$this->Model->delete();
				echo "<script> alert('Car Model record has been deleted'); location.reload();</script>";
				exit;
			}
		}
		exit;
	}


	public function lab_del_brand(){
		$this->autoRender = false;
		if (!empty($this->data)) {
			$carIDS = $motorIDS = $model_ids = [];
			$motorSt = $st = $model_st = 2;
			$this->Model->bindModel(['hasMany'=>['Motor']]);
			$this->Motor->bindModel(['hasMany'=>['ItemDetail'=>['conditions'=>['ItemDetail.language'=>'eng']]]]);
			$this->Motor->unbindModel(['belongsTo'=>['Library']]);
			$getModel = $this->Model->find('all',['recursive'=>2,'conditions'=>['Model.brand_id'=>$this->data['id']]]);
			
			if(!empty($getModel)){
				foreach($getModel as $list){
					if($list['Model']['status'] == 1){ $model_st = 1; }
					$model_ids[] = $list['Model']['id'];
					if(!empty($list['Motor'])){
						foreach($list['Motor'] as $mt){
							if($mt['status'] == 1 ){ $motorSt =1;}
							$motorIDS[] = $mt['id'];
							if(!empty($mt['ItemDetail'])){
								foreach($mt['ItemDetail'] as $car){
									$carIDS[] = $car['id'];
									if($car['status'] == 1 ){ $st = 1; }
								}
							}
						}
					}
				}
				
				if($st == 2){
					if(!empty($carIDS)){
						$this->ItemDetail->deleteAll(array('ItemDetail.id' => $carIDS), false);
						$this->ItemDetail->deleteAll(array('ItemDetail.item_detail_id' => $carIDS), false);
						$this->Video->deleteAll(array('Video.item_detail_id' => $carIDS), false);
					}
					if(!empty($motorIDS)){
						$this->Motor->deleteAll(array('Motor.id' => $motorIDS), false);
					}
					if(!empty($model_ids)){
						$this->Model->deleteAll(array('Model.id' => $model_ids), false);
					}
					$this->Brand->id = $this->data['id']; 
					$this->Brand->delete();
					echo "<script> alert('Car make and related model/motor/car records has been deleted'); location.reload();</script>";

				}else{
					echo "<script> alert('Car Make record NOT deleted. Please delete or inactive related car model/motor and car record to delete this car make record.');</script>"; exit;
				}

			}else{
				$this->Brand->id = $this->data['id'];
				$this->Brand->delete();
				echo "<script> alert('Car Brand record has been deleted'); location.reload();</script>";
				exit;
			}
			exit;
		}
		exit;
	}
}
