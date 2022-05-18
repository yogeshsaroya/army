<?php

App::uses('AppController', 'Controller');

class HomesController extends AppController
{

    public $uses = array('User', 'Brand', 'Model', 'Motor', 'Product', 'Library', 'ItemDetail', 'Cart', 'WebSetting', 'String', 'Motorcycle', 'MotorcycleModel', 'MotorcycleYear');
    var $components = array('Auth', 'Session', 'Email', 'RequestHandler', 'Paginator', 'DATA');
    var $helpers = array('Html', 'Form', 'Session', 'Paginator', 'Lab');
    function beforeFilter()
    {
        AppController::beforeFilter();
        $this->Auth->allow();
    }

    public function index()
    {
        $this->set('title_for_layout', 'ARMYTRIX OBDII VALVETRONIC REMOTE CONTROL MODULE');
        $page_meta = [
            'des' => 'ARMYTRIX OBDII Sound kits, the Innovative Valvetronic Technology Brings about Unprecedented Versatility to Car Owners.',
            'key' => 'armytrix, exhaust, akrapovic, magnaflow, borla, supersprint,  remus, fiexhaust, ipe, milltek, цена, السعر, precio, preis, prix, обзор, مراجعة, Überprüfung, revisión, глушитель'
        ];
        $string = $this->String->find('list', array('order' => array('String.id' => 'ASC'), 'fields' => array('String.id', 'String.text')));
        $txt = array('String' => $string, 'Translation' => []);
        $this->set(compact('page_meta', 'txt'));
    }

    public function motorcycle_exhaust()
    {
        $this->set('title_for_layout', 'WEAPONIZED YOUR MOTORCYLE BY THE ARMYTRIX EXHAUST SYSTEMS');
        $page_meta = ['des' => 'Best Sounding Aftermarket Exhaust Upgrades. Titanium & Stainless Steel Turbo-back Cat-Back Valvetronic Exhaust Downpipes Tips Headers Decat Test Straight Exhaust Sound',];
        //$this->render('motorcycle_exhaust_v2');
        
    }

    public function motorcycle($id = null)
    {
        $this->set('title_for_layout', 'Valvetronic Exhaust System Weaponzied by ARMYTRIX');
        $page_meta = [
            'des' => 'Best Sounding Aftermarket Exhaust Upgrades. Titanium & Stainless Steel Turbo-back Cat-Back Valvetronic Exhaust Downpipes Tips Headers Decat Test Straight Exhaust Sound',
            'key' => 'armytrix, exhaust, akrapovic, magnaflow, borla, supersprint,  remus, fiexhaust, ipe, milltek, цена, السعر, precio, preis, prix, обзор, مراجعة, Überprüfung, revisión, глушитель'
        ];
    }

    public function performance()
    {
        $this->set('title_for_layout', 'ARMYTRIX PERFORMANCE ENGINEERING');
        $page_meta = [
            'des' => 'High-Performance Vehicles are Sophisticated Machines Built to Satisfy our Desire to Test the Boundaries. ARMYTRIX Push Performance Parts Beyond the Imaginable.',
            'key' => 'armytrix, exhaust, akrapovic, magnaflow, borla, supersprint,  remus, fiexhaust, ipe, milltek, цена, السعر, precio, preis, prix, обзор, مراجعة, Überprüfung, revisión, глушитель'
        ];
        $this->set('page_meta', $page_meta);
    }
    public function testimonial()
    {
        $this->set('title_for_layout', 'WHAT DO THEY SAY ABOUT ARMYTRIX');
        $page_meta = [
            'des' => 'Full Throttle Engaged, F1 Style Audio Pitch Invades Your Auditory System. ARMYTRIX Arsenal Continues to Evolve, Call upon our Perpetually Stocked Armory.',
            'key' => 'armytrix, exhaust, akrapovic, magnaflow, borla, supersprint,  remus, fiexhaust, ipe, milltek, цена, السعر, precio, preis, prix, обзор, مراجعة, Überprüfung, revisión, глушитель'
        ];
        $this->set('page_meta', $page_meta);
    }

    public function material()
    {
        $this->set('title_for_layout', 'ARMYTRIX MARKETING MATERIALS');
        $page_meta = [
            'des' => 'Feel Free to Send us Your Company email in Below form, we will Share all our Marketing Materials with You, Thanks!',
            'key' => 'armytrix, exhaust, akrapovic, magnaflow, borla, supersprint,  remus, fiexhaust, ipe, milltek, цена, السعر, precio, preis, prix, обзор, مراجعة, Überprüfung, revisión, глушитель'
        ];
        $this->set('page_meta', $page_meta);

        if ($this->RequestHandler->isAjax()) {
            if (!empty($this->data)) {

                if (isset($this->data['g-recaptcha-response']) && !empty($this->data['g-recaptcha-response'])) {
                    $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=" . DataSecret . "&response=" . $this->data['g-recaptcha-response'] . "&remoteip=" . $_SERVER['REMOTE_ADDR']);
                    $arr = json_decode($response, true);
                    if (isset($arr['success']) && $arr['success'] == 1) {

                        $parameters = array('WEB' => $this->data['User']['url'], 'EMAIL' => $this->data['User']['email']);

                        $this->DATA->AppMail('marketing@armytrix.com', 'Dropbox', $parameters, $dateTime = DATE);
                        echo "<div class='alert alert-success'>Message sent.</div>";
                        echo "<script>$('#drop_frm')[0].reset();</script>";
                    } else {
                        echo "<div class='alert alert-danger'>Please verify that you are not a robot.</div>";
                    }
                } else {
                    echo "<div class='alert alert-danger'>Please verify that you are not a robot.</div>";
                }
                echo '<script>grecaptcha.reset();</script>';
                exit;
            }
        }
    }
    public function program()
    {
        $this->set('title_for_layout', 'SPONSORSHIP');
        $page_meta = [
            'des' => 'If You are SEMA Confirmed Attendee that Needs ARMYTRIX.  If You\'re a Youtuber Working on an Incredible Project Car You Believe Needs ARMYTRIX.',
            'key' => 'armytrix, exhaust, akrapovic, magnaflow, borla, supersprint,  remus, fiexhaust, ipe, milltek, цена, السعر, precio, preis, prix, обзор, مراجعة, Überprüfung, revisión, глушитель'
        ];
        $this->set('page_meta', $page_meta);
    }

    public function youtube()
    {
        $this->set('title_for_layout', 'Youtube - Armytrix Performance Upgrades');

        if ($this->RequestHandler->isAjax()) {
            $li = null;
            if (!empty($this->data)) {

                if (isset($this->data['Youtube'])) {
                    if (empty($this->data['Youtube']['images'])) {
                        echo '<div class="alert alert-danger">Please upload images.</div>';
                        die;
                    } else {
                        $s = $imgLink = null;
                        foreach ($this->data['Youtube'] as $k => $v) {
                            if (!in_array($k, ['images', 'token'])) {
                                $st = uc(str_replace("_", " ", $k));
                                $s .= '<p>' . $st . ': ' . $v . '</p>';
                            }
                        }
                        $imgs = trim($this->data['Youtube']['images'], ',');
                        $arr_img = explode(',', $imgs);
                        if (!empty($arr_img)) {
                            foreach ($arr_img as $k => $v) {
                                $ml = SITEURL . "cdn/youtube/" . $v;
                                $imgLink .= '<a href="' . $ml . '">' . $v . '</a><br> ';
                            }
                        }
                        $s .= '<p>Images: ' . $imgLink . '</p>';
                    }
                    $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".V3DataSecret."8&response=" . $this->data['Youtube']['token'] . "&remoteip=" . $_SERVER['REMOTE_ADDR']);
                    $arrResponse = json_decode($response, true);
                    if ($arrResponse["success"] == '1' && $arrResponse["score"] >= 0.5) {
                        $parameters = array('TEXT' => $s);
                        $this->DATA->AppMail('marketing@armytrix.com', 'Youtube', $parameters, DATE);
                        echo "<script>$('#y_sfrm').html('<div class=\"alert alert-success\">Your form has been successfully submitted</div>');</script>";
                    } else {
                        echo '<div class="alert alert-danger">Please try again</div>';
                        die;
                    }
                }

                if (isset($this->data['Image']) && !empty($this->data['Image'])) {
                    foreach ($this->data['Image']['pic'] as $list) {

                        if (isset($list['name']) && !empty($list['name'])) {

                            $file = $list['name'];
                            $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                            $arr_ext = array('jpg', 'jpeg', 'gif', 'png');
                            if (in_array($ext, $arr_ext)) {
                                $imagePath = 'cdn/youtube/';
                                if (!file_exists($imagePath)) {
                                    mkdir($imagePath, 0777, true);
                                }

                                $new_img = "youtube_" . strtolower(rand(12345, 98765) . "." . $ext);
                                try {
                                    if (move_uploaded_file($list['tmp_name'], WWW_ROOT . $imagePath . $new_img)) {

                                        $img  = show_image($imagePath, $new_img, 100, 100, 100, 'ff', $type = null, $img_tag = null);
                                        $li = "<li img_name='$new_img'><img src='$img' alt=''></li>";
                                        echo "<script>$('#id_utube').prepend(\"$li\");</script>";
                                    }
                                } catch (Exception $e) {
                                }
                            }
                        }
                    }
                }
            }
            exit;
        }
    }
    public function sema()
    {
        $this->set('title_for_layout', 'SEMA - Armytrix Performance Upgrades');
        if ($this->RequestHandler->isAjax() && !empty($this->request->data)) {
            $li = null;
            if (!empty($this->data)) {
                if (isset($this->data['Sema'])) {
                    if (empty($this->data['Sema']['images'])) {
                        echo '<div class="alert alert-danger">Please upload images.</div>';
                        die;
                    } else {
                        $s = $imgLink = null;
                        foreach ($this->data['Sema'] as $k => $v) {
                            if (!in_array($k, ['images', 'token'])) {
                                $st = uc(str_replace("_", " ", $k));
                                $s .= '<p>' . $st . ': ' . $v . '</p>';
                            }
                        }
                        $imgs = trim($this->data['Sema']['images'], ',');
                        $arr_img = explode(',', $imgs);
                        if (!empty($arr_img)) {
                            foreach ($arr_img as $k => $v) {
                                $ml = SITEURL . "cdn/sema/" . $v;
                                $imgLink .= '<a href="' . $ml . '">' . $v . '</a><br> ';
                            }
                        }
                        $s .= '<p>Images: ' . $imgLink . '</p>';
                    }
                    $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".V3DataSecret."8&response=" . $this->data['Sema']['token'] . "&remoteip=" . $_SERVER['REMOTE_ADDR']);
                    $arrResponse = json_decode($response, true);
                    if ($arrResponse["success"] == '1' && $arrResponse["score"] >= 0.5) {
                        $parameters = array('TEXT' => $s);
                        $this->DATA->AppMail('marketing@armytrix.com', 'Sema', $parameters, DATE);
                        echo "<script>$('#y_sfrm').html('<div class=\"alert alert-success\">Your form has been successfully submitted</div>');</script>";
                    } else {
                        echo '<div class="alert alert-danger">Please try again</div>';
                        die;
                    }
                }
                if (isset($this->data['Image']) && !empty($this->data['Image'])) {
                    foreach ($this->data['Image']['pic'] as $list) {
                        if (isset($list['name']) && !empty($list['name'])) {
                            $file = $list['name'];
                            $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                            $arr_ext = array('jpg', 'jpeg', 'gif', 'png');
                            if (in_array($ext, $arr_ext)) {
                                $imagePath = 'cdn/sema/';
                                if (!file_exists($imagePath)) {
                                    mkdir($imagePath, 0777, true);
                                }
                                $new_img = "sema_" . strtolower(rand(12345, 98765) . "." . $ext);
                                try {
                                    if (move_uploaded_file($list['tmp_name'], WWW_ROOT . $imagePath . $new_img)) {
                                        $img  = show_image($imagePath, $new_img, 100, 100, 100, 'ff', $type = null, $img_tag = null);
                                        $li = "<li img_name='$new_img'><img src='$img' alt=''></li>";
                                        echo "<script>$('#id_utube').prepend(\"$li\");</script>";
                                    }
                                } catch (Exception $e) {
                                }
                            }
                        }
                    }
                }
            }

            exit;
        }
    }


    public function new_kit_request()
    {
        $this->set('title_for_layout', 'NEW KIT REQUEST for ARMYTRIX');
        $page_meta = [
            'des' => 'Can\'t Find a Kit? Let us Know What You Drive and we May Build it Next.',
            'key' => 'armytrix, exhaust, akrapovic, magnaflow, borla, supersprint,  remus, fiexhaust, ipe, milltek, цена, السعر, precio, preis, prix, обзор, مراجعة, Überprüfung, revisión, глушитель'
        ];
        $this->set('page_meta', $page_meta);

        if ($this->RequestHandler->isAjax() && !empty($this->data)) {
            if (isset($this->data['g-recaptcha-response']) && !empty($this->data['g-recaptcha-response'])) {
                $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=" . DataSecret . "&response=" . $this->data['g-recaptcha-response'] . "&remoteip=" . $_SERVER['REMOTE_ADDR']);
                $arr = json_decode($response, true);
                if (isset($arr['success']) && $arr['success'] == 1) {

                    $forms = [
                        'id' => null, 'type' => 2, 'first_name' => $this->data['Request']['first_name'], 'last_name' => $this->data['Request']['last_name'],
                        'country' => $this->data['Request']['country'], 'state' => NULL, 'city' => NULL, 'zip' => NULL, 'email' => $this->data['Request']['email'],
                        'mobile' => NULL, 'contact_for' => NULL, 'message' => $this->data['Request']['note'], 'subject' => NULL, 'source' => NULL, 'vehicle_type' => $this->data['Request']['vehicle_type'],
                        'contact_for' => $this->data['Request']['vehicle_type'] . " - " . $this->data['Request']['make'] . " / " . $this->data['Request']['model'] . "/ " . $this->data['Request']['year'],
                        'year' => $this->data['Request']['year'], 'make' => $this->data['Request']['make'], 'model' => $this->data['Request']['model']
                    ];
                    $this->DATA->form_data($forms);
                    $parameters = array(
                        'FIRST_NAME' => $this->data['Request']['first_name'], 'LAST_NAME' => $this->data['Request']['last_name'],
                        'COUNTRY' => $this->data['Request']['country'], 'EMAIL' => $this->data['Request']['email'], 'YEAR' => $this->data['Request']['year'],
                        'MAKE' => $this->data['Request']['make'], 'MODEL' => $this->data['Request']['model'], 'MSG' => $this->data['Request']['note']
                    );
                    $this->DATA->AppMail('inquiry@armytrix.com', 'NewKitRequest', $parameters, $dateTime = DATE);
                    echo "<div class='alert alert-success'>Message sent.</div>";
                    echo "<script>$('#kit_req')[0].reset();</script>";
                } else {
                    echo "<div class='alert alert-danger'>Please verify that you are not a robot.</div>";
                }
            } else {
                echo "<div class='alert alert-danger'>Please verify that you are not a robot.</div>";
            }
            echo '<script>grecaptcha.reset();</script>';
            exit;
        }
    }

    public function warranty_registration()
    {
        $this->set('title_for_layout', 'Warranty Registration');
        $this->loadModel('Warranty');

        if ($this->RequestHandler->isAjax()) {
            if (!empty($this->data)) {
                if (isset($this->request->data['Warranty']['installation_date']) && !empty($this->request->data['Warranty']['installation_date'])) {
                    $this->request->data['Warranty']['installation_date'] = date('Y-m-d', strtotime($this->request->data['Warranty']['installation_date']));
                }
                if (isset($this->data['g-recaptcha-response']) && !empty($this->data['g-recaptcha-response'])) {
                    $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=" . DataSecret . "&response=" . $this->data['g-recaptcha-response'] . "&remoteip=" . $_SERVER['REMOTE_ADDR']);
                    $arr = json_decode($response, true);
                    echo "<script>grecaptcha.reset();</script>";
                    if (isset($arr['success']) && $arr['success'] == 1) {
                        if (filter_var($this->data['Warranty']['email'], FILTER_VALIDATE_EMAIL)) {
                            $body = $this->DATA->email_structure();
                            $pa = array('DATE' => TODAYDATE, 'NAME' => $this->data['Warranty']['first_name'], 'COUNTRY' => $this->data['Warranty']['country'], 'EmailTemplateSkeleton' => $body);
                            if ($this->Warranty->validates()) {
                                $this->Warranty->save($this->request->data);
                                $this->DATA->AppMail($this->data['Warranty']['email'], 'WarrantyUser', $pa, DATE, 2);
                                $this->DATA->AppMail('inquiry@armytrix.com', 'WarrantyAdmin', $pa, DATE, 2);

                                echo "<script> $('#wfrm_div').html('<div class=\'alert alert-success\'>Warranty registration form has been submitted..</div>'); $('#preloader').hide();$('html, body').animate({ scrollTop: $('#warranty_registration').offset().top - 200 }, 200);</script>";
                            } else {
                                $str = null;
                                $errors = $this->Warranty->validationErrors;
                                if (!empty($errors)) {
                                    foreach ($errors as $err) {
                                        $str .= $err[0] . "<br>";
                                    }
                                    echo '<div class="alert alert-danger fadeIn animated">' . $str . '</div>';
                                    echo "<script>grecaptcha.reset();</script>";
                                }
                            }
                        }
                    } else {
                        echo "<div class='alert alert-danger'>Please verify that you are not a robot.</div>";
                        echo "<script>grecaptcha.reset();</script>";
                    }
                } else {
                    echo "<div class='alert alert-danger'>Please verify that you are not a robot.</div>";
                    echo "<script>grecaptcha.reset();</script>";
                }
            }
            exit;
        }
    }

    public function contact_us()
    {
        $this->set('title_for_layout', 'CONTACT ARMYTRIX');
        $page_meta = [
            'des' => 'Please Fill out the Form and we\'ll get Back in Touch with You',
            'key' => 'armytrix, exhaust, akrapovic, magnaflow, borla, supersprint,  remus, fiexhaust, ipe, milltek, цена, السعر, precio, preis, prix, обзор, مراجعة, Überprüfung, revisión, глушитель'
        ];
        $q = $this->request->query;
        $getModel = $getMotor = $getMotorcycleModel = $getMotorcycleYear = [];
        if (isset($q['vehicle_type'])) {
            if ($q['vehicle_type'] == 'motorcycle') {
                if (isset($q['make']) && !empty($q['make'])) {
                    $mList = $this->Motorcycle->find('list', ['conditions' => ['Motorcycle.status' => 1, 'Motorcycle.motorcycle_make_id' => $q['make']], 'fields' => ['Motorcycle.id', 'Motorcycle.motorcycle_model_id']]);
                    if (!empty($mList)) {
                        $mList = array_unique($mList);
                        $getMotorcycleModel = $this->MotorcycleModel->find('list', ['conditions' => ['MotorcycleModel.id' => $mList, 'MotorcycleModel.motorcycle_make_id' => $q['make'], 'MotorcycleModel.status' => 1], 'fields' => ['MotorcycleModel.id', 'MotorcycleModel.name']]);
                        if (!empty($getMotorcycleModel) && isset($q['model']) && !empty($q['model'])) {
                            $mids = [];
                            foreach ($getMotorcycleModel as $a => $b) {
                                $mids[] = $a;
                            }
                            $pList = $this->Motorcycle->find('list', ['conditions' => ['Motorcycle.status' => 1, 'Motorcycle.motorcycle_model_id' => $mids], 'fields' => ['Motorcycle.id', 'Motorcycle.motorcycle_year_id']]);
                            if (!empty($pList)) {
                                $pList = array_unique($pList);
                                $getYear = $this->MotorcycleYear->find('all', ['conditions' => ['MotorcycleYear.id' => $pList, 'MotorcycleYear.motorcycle_model_id' => $q['model'], 'MotorcycleYear.status' => 1]]);
                                if (!empty($getYear)) {
                                    foreach ($getYear as $y) {
                                        $getMotorcycleYear[$y['MotorcycleYear']['id']] = $y['MotorcycleYear']['year_from'] . " - " . (!empty($y['MotorcycleYear']['year_to']) ? $y['MotorcycleYear']['year_to'] : 'persent');
                                    }
                                }
                            }
                        }
                    }
                }
            } elseif ($q['vehicle_type'] == 'car') {
                if (isset($q['car_brand']) && !empty($q['car_brand'])) {
                    $mList = $this->ItemDetail->find('list', ['conditions' => ['ItemDetail.status' => 1, 'ItemDetail.brand_id' => $q['car_brand']], 'fields' => ['ItemDetail.id', 'ItemDetail.model_id']]);
                    if (!empty($mList)) {
                        $mList = array_unique($mList);
                        $getModel = $this->Model->find('list', ['conditions' => ['Model.id' => $mList, 'Model.brand_id' => $q['car_brand'], 'Model.status' => 1], 'fields' => ['Model.id', 'Model.name']]);
                        if (!empty($getModel) && isset($q['car_model']) && !empty($q['car_model'])) {
                            $mids = [];
                            foreach ($getModel as $a => $b) {
                                $mids[] = $a;
                            }
                            $pList = $this->ItemDetail->find('list', ['conditions' => ['ItemDetail.status' => 1, 'ItemDetail.model_id' => $mids], 'fields' => ['ItemDetail.id', 'ItemDetail.motor_id']]);
                            if (!empty($pList)) {
                                $pList = array_unique($pList);
                                $getMotor = $this->Motor->find('list', [
                                    'conditions' => ['Motor.id' => $pList, 'Motor.model_id' => $q['car_model'], 'Motor.status' => 1]
                                ]);
                            }
                        }
                    }
                }
            }
        }

        $this->set(compact('page_meta', 'q', 'getModel', 'getMotor', 'getMotorcycleModel', 'getMotorcycleYear'));
        if ($this->RequestHandler->isAjax()) {
            if (!empty($this->data)) {
                if (isset($this->data['g-recaptcha-response']) && !empty($this->data['g-recaptcha-response'])) {
                    $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=" . DataSecret . "&response=" . $this->data['g-recaptcha-response'] . "&remoteip=" . $_SERVER['REMOTE_ADDR']);
                    $arr = json_decode($response, true);
                    if (isset($arr['success']) && $arr['success'] == 1) {
                        $make = $model = $engine = null;
                        if ($this->data['Request']['vehicle_type'] == 'car') {
                            $make = $this->data['car_make'];
                            $model = $this->data['car_model'];
                            $engine = $this->data['car_motor'];
                        } elseif ($this->data['Request']['vehicle_type'] == 'motorcycle') {
                            $make = $this->data['make'];
                            $model = $this->data['model'];
                            $engine = $this->data['year'];
                        }

                        $forms = [
                            'id' => null, 'type' => 3, 'user_type' => $this->data['Request']['type'],
                            'first_name' => $this->data['Request']['f_name'], 'last_name' => $this->data['Request']['l_name'],
                            'country' => $this->data['Request']['country'], 'state' => $this->data['Request']['state'], 'city' => $this->data['Request']['city'],
                            'zip' => $this->data['Request']['zip_code'], 'email' => $this->data['Request']['email'],
                            'mobile' => $this->data['Request']['phone'], 'message' => $this->data['Request']['message'],
                            'subject' => $this->data['Request']['subject'], 'source' => $this->data['Request']['hear'],
                            'vehicle_type' => $this->data['Request']['vehicle_type'], 'make' => $make, 'model' => $model, 'engine' => $engine,
                            'contact_for' => $this->data['Request']['type'] . " / " . $make . " / " . $model . " " . $engine
                        ];
                        $this->DATA->form_data($forms);

                        $parameters = array(
                            'USER_TYPE' => $this->data['Request']['type'],
                            'FNAME' => $this->data['Request']['f_name'],
                            'LNAME' => $this->data['Request']['l_name'],
                            'PHONE' => $this->data['Request']['phone'],
                            'EMAIL' => $this->data['Request']['email'],
                            'CITY' => $this->data['Request']['city'],
                            'STATE' => $this->data['Request']['state'],
                            'COUNTRY' => $this->data['Request']['country'],
                            'ZIP' => $this->data['Request']['zip_code'],
                            'SUBJECT' => $this->data['Request']['subject'],
                            'ABOUT' => $this->data['Request']['hear'],
                            'FOR' => $this->data['Request']['vehicle_type'] . " - " . $make . " / " . $model . " / " . $engine,
                            'BRAND' => $make, 'MODEL' => $model, 'ENGINE' => $engine,
                            'MSG' => $this->data['Request']['message']
                        );
                        $this->DATA->AppMail('inquiry@armytrix.com', 'ContactNew', $parameters, DATE);

                        echo "<div class='alert alert-success'>Message sent.</div>";
                        echo "<script>$('#kit_req')[0].reset();</script>";
                    } else {
                        echo "<div class='alert alert-danger'>Please verify that you are not a robot.</div>";
                    }
                } else {
                    echo "<div class='alert alert-danger'>Please verify that you are not a robot.</div>";
                }
            }
            echo '<script>grecaptcha.reset();</script>';
            exit;
        }
    }

    function remove_last_number($file_string)
    {
        //remove extension from string
        $filename = substr($file_string, 0, (strrpos($file_string, ".")));

        //break the filename by the `-` character, creating an array of each section
        $filename_parts = explode('-', $filename);

        //remove the last part of the filename, add it back if it contains any digits that aren't numbers
        $last_elem = array_pop($filename_parts);
        if (!preg_match("/^\d+$/", $last_elem)) {
            $filename_parts[] = $last_elem;
        }

        //return correct filename by imploding all the parts back together and adding the extension.
        return implode(' ', $filename_parts);
    }

    public function privacy_policy()
    {
        $this->set('title_for_layout', 'Privacy Policy');
        $page_meta = [
            'des' => 'ARMYTRIX CORP. Warrants its Products to be Free of all Defects in Material and Workmanship. Warranty Extends only to the Original Buyer and is Not Transferable',
            'key' => 'armytrix, exhaust, akrapovic, magnaflow, borla, supersprint,  remus, fiexhaust, ipe, milltek, цена, السعر, precio, preis, prix, обзор, مراجعة, Überprüfung, revisión, глушитель'
        ];
        $this->set(compact('page_meta'));
    }
}
