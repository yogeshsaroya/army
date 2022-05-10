<?php

App::uses('AppController', 'Controller');
App::uses('Xml', 'Utility');


class CronsController extends AppController
{

    var $uses = array('EmailServer', 'ItemDetail', 'Library', 'Motorcycle', 'Product');
    public $components = array('Cookie', 'Session', 'RequestHandler', 'Email', 'DATA');
    public $helpers = array('Html', 'Form', 'JqueryEngine', 'Session', 'Text', 'Time');

    function beforeFilter()
    {
        AppController::beforeFilter();
        $this->Auth->allow();
        $this->autoRender = false;
    }

    public function index()
    {
    }

    /**
     * run per min
     * send email notification 
     * */
    public function set_email($id = null)
    {
        $this->autoRender = false;
        $this->loadModel('EmailServer');
        $data = $this->EmailServer->find('all', array('recursive' => -1, 'conditions' => array('EmailServer.status' => [0, 2]), 'limit' => 10));
        $num = 1;
        if (!empty($data)) {
            foreach ($data as $d) {
                if (filter_var($d['EmailServer']['email_to'], FILTER_VALIDATE_EMAIL)) {
                    if (!empty($d['EmailServer']['email_to']) && !empty($d['EmailServer']['email_from']) && !empty($d['EmailServer']['subject'])) {
                        $this->Email->sendAs = 'both';
                        $this->Email->from = $d['EmailServer']['email_from'];
                        $this->Email->to = $d['EmailServer']['email_to'];
                        $this->Email->subject = $d['EmailServer']['subject'];

                        $this->Email->delivery = 'smtp';
                        $this->Email->smtpOptions = ['host' => 'ssl://smtp.gmail.com', 'port' => 465, 'username' => 'web@armytrix.com', 'password' => 'JR=n4%5E1', 'auth' => true];

                        try {
                            $this->Email->send($d['EmailServer']['message']);
                            if ($d['EmailServer']['status'] == 0) {
                                $this->EmailServer->updateAll(array('EmailServer.status' => 1), array('EmailServer.id' => $d['EmailServer']['id']));
                            } elseif ($d['EmailServer']['status'] == 2) {
                                $this->EmailServer->updateAll(array('EmailServer.status' => 3), array('EmailServer.id' => $d['EmailServer']['id']));
                            }
                            $num++;
                        } catch (Exception $e) {
                            ec($e->getMessage());
                            $this->EmailServer->updateAll(array('EmailServer.status' => 5), array('EmailServer.id' => $d['EmailServer']['id']));
                        }
                    } else {
                        $this->EmailServer->updateAll(array('EmailServer.status' => 5), array('EmailServer.id' => $d['EmailServer']['id']));
                    }
                }
            }
            echo "total " . $num . " has been send  <hr> thank you  <br>";
        } else {
            echo "No email <hr> thank you  <br>";
        }
    }

    public function map()
    {
        $this->autoRender = false;
        $writer = new XMLWriter();
        $writer->openURI(WWW_ROOT . '/sitemap.xml');
        $writer->startDocument('1.0', 'UTF-8');
        $writer->setIndent(4);
        $writer->startElement('urlset');
        $writer->writeAttribute('xmlns:xsi', 'http://www.w3.org/2001/XMLSchema-instance');
        $writer->writeAttribute('xmlns', 'http://www.sitemaps.org/schemas/sitemap/0.9');
        $writer->writeAttribute('xsi:schemaLocation', 'http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd');

        $data = $this->ItemDetail->find('all', [
            'conditions' => ['ItemDetail.status' => 1, 'ItemDetail.url !='=>''],
            'fields' => ['ItemDetail.id', 'ItemDetail.status', 'ItemDetail.url', 'ItemDetail.language','ItemDetail.updated']
        ]);
        
        $motorData = $this->Motorcycle->find('all', [
            'conditions' => ['Motorcycle.status' => 1, 'Motorcycle.url !='=>''],
            'fields' => ['Motorcycle.id', 'Motorcycle.status', 'Motorcycle.url','Motorcycle.updated']
        ]);
        $shopData = $this->Product->find('all', [
            'conditions' => ['Product.type' => 4, 'Product.status' => 1,'Product.slug !='=>''],
            'fields' => ['Product.id', 'Product.type', 'Product.status', 'Product.slug','Product.updated']
        ]);
        if (!empty($data)) {
            foreach ($data as $list) {
                $lin = utf8_encode(SITEURL . "product/" . $list['ItemDetail']['url']);
                $url_date = date(DATE_W3C, strtotime($list['ItemDetail']['updated']));
                $writer->startElement('url');
                $writer->writeElement('loc', $lin);
                $writer->writeElement('lastmod', trim($url_date));
                $writer->writeElement('changefreq', 'always');
                $writer->writeElement('priority', '0.8');
                $writer->endElement();
            }
        }
        if (!empty($motorData)) {
            foreach ($motorData as $mList) {
                $link = utf8_encode(SITEURL . "motorcycle/" . $mList['Motorcycle']['url']);
                $url_date = date(DATE_W3C, strtotime($mList['Motorcycle']['updated']));
                $writer->startElement('url');
                $writer->writeElement('loc', $link);
                $writer->writeElement('lastmod', trim($url_date));
                $writer->writeElement('changefreq', 'always');
                $writer->writeElement('priority', '0.8');
                $writer->endElement();
            }
        }
        if (!empty($shopData)) {
            foreach ($shopData as $sList) {
                $link = utf8_encode(SITEURL . "shop/" . $sList['Product']['slug']);
                $url_date = date(DATE_W3C, strtotime($sList['Product']['updated']));
                $writer->startElement('url');
                $writer->writeElement('loc', $link);
                $writer->writeElement('lastmod', trim($url_date));
                $writer->writeElement('changefreq', 'always');
                $writer->writeElement('priority', '0.8');
                $writer->endElement();
            }
        }

        $writer->endElement();
        $writer->endDocument();

        
        if($_SERVER['SERVER_NAME'] == 'armytrix.com'){
            $this->pmt_curl('https://www.google.com/ping?sitemap='.SITEURL.'sitemap.xml');
        }
        echo "SITEMAP added : " . SITEURL . 'sitemap.xml';
    }


    public function image_map()
    {
        $this->autoRender = false;
        $writer = new XMLWriter();
        $writer->openURI(WWW_ROOT . '/sitemap_image.xml');
        $writer->startDocument('1.0', 'UTF-8');
        $writer->setIndent(4);
        $writer->startElement('urlset');
        $writer->writeAttribute('xmlns:xsi', 'http://www.w3.org/2001/XMLSchema-instance');
        $writer->writeAttribute('xmlns', 'http://www.sitemaps.org/schemas/sitemap/0.9');
        $writer->writeAttribute('xmlns:image', 'http://www.google.com/schemas/sitemap-image/1.1');
        $writer->writeAttribute('xsi:schemaLocation', 'http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd');

        $data = $this->ItemDetail->find('all', ['conditions' => ['ItemDetail.status' => 1, 'ItemDetail.url !='=>'', 'ItemDetail.language' => 'eng']]);
        $motorData = $this->Motorcycle->find('all', [
            'conditions' => ['Motorcycle.status' => 1, 'Motorcycle.url !='=>''],
            'fields' => ['Motorcycle.id', 'Motorcycle.status', 'Motorcycle.url', 'Motorcycle.slider']
        ]);

        if (!empty($motorData)) {
            foreach ($motorData as $mList) {
                $sArr = explode(',', trim($mList['Motorcycle']['slider']));
                if (!empty($sArr) && isset($sArr[0]) && !empty($sArr[0])) {
                    $slider = $this->Library->find('all', array('conditions' => array('Library.id' => $sArr), 'order' => ['Library.pos' => 'ASC']));
                }
                $lin = utf8_encode(SITEURL . "motorcycle/" . $mList['Motorcycle']['url']);
                $writer->startElement('url');
                $writer->writeElement('loc', $lin);
                if (!empty($slider)) {
                    foreach ($slider as $sList) {
                        $sImg = utf8_encode(SITEURL . 'cdn/' . $sList['Library']['folder'] . "/" . $sList['Library']['file_name']);
                        $writer->startElement('image:image');
                        $writer->writeElement('image:loc', $sImg);
                        if (!empty($sList['Library']['title'])) {
                            $writer->writeElement('image:title', $sList['Library']['title']);
                        }
                        $writer->endElement();
                    }
                }
                $writer->endElement();
            }
        }

        if (!empty($data)) {
            foreach ($data as $list) {
                $sArr = explode(',', trim($list['ItemDetail']['slider']));
                if (!empty($sArr) && isset($sArr[0]) && !empty($sArr[0])) {
                    $slider = $this->Library->find('all', array('conditions' => array('Library.id' => $sArr), 'order' => ['Library.pos' => 'ASC']));
                }
                $lin = utf8_encode(SITEURL . "product/" . $list['ItemDetail']['url']);
                $writer->startElement('url');
                $writer->writeElement('loc', $lin);
                if (!empty($slider)) {
                    foreach ($slider as $sList) {
                        $sImg = utf8_encode(SITEURL . 'cdn/' . $sList['Library']['folder'] . "/" . $sList['Library']['file_name']);
                        $writer->startElement('image:image');
                        $writer->writeElement('image:loc', $sImg);
                        if (!empty($sList['Library']['title'])) {
                            $writer->writeElement('image:title', $sList['Library']['title']);
                        }
                        $writer->endElement();
                    }
                }
                $writer->endElement();
            }
        }

        $writer->endElement();
        $writer->endDocument();

        if($_SERVER['SERVER_NAME'] == 'armytrix.com'){
            $this->pmt_curl('https://www.google.com/ping?sitemap='.SITEURL.'sitemap_image.xml');
        }
        echo "SITEMAP added : " . SITEURL . 'sitemap_image.xml';
    }


    public function report($type = 1)
    {

        $path = 'report';
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        $this->loadModel('Form');
        $d1 = date('Y-m-d', strtotime("previous monday", strtotime(DATE)));
        $d2 = date('Y-m-d', strtotime("sunday", strtotime(DATE)));
        $f = date('m_d_Y', strtotime("previous monday", strtotime(DATE)));
        $t = date('m_d_Y', strtotime("sunday", strtotime(DATE)));
        $data = $this->Form->find('all', ['order' => ['Form.id' => 'DESC'], 'conditions' => ['Form.type' => $type, 'DATE(Form.created) BETWEEN ? AND ?' => [$d1, $d2]]]);
        if (!empty($data)) {
            if ($type == 1) {
                $header_row = ['Date', 'User Type', 'First Name', 'Last Name', 'Country', 'City', 'Zip Code', 'Email', 'Phone', 'Brand', 'Model', 'Engine', 'Message'];
                $fname = 'product_' . $f . '_to_' . $t . '.csv';
                $csv_file = fopen("report/" . $fname, 'w');
                fprintf($csv_file, chr(0xEF) . chr(0xBB) . chr(0xBF));
                fputcsv($csv_file, $header_row, ',', '"');
                foreach ($data as $record) {
                    $row = [];
                    $row = [
                        date('Y-m-d', strtotime($record['Form']['created'])), $record['Form']['user_type'], $record['Form']['first_name'], $record['Form']['last_name'],
                        $record['Form']['country'], $record['Form']['city'], $record['Form']['zip'], $record['Form']['email'], $record['Form']['mobile'],
                        $record['Form']['make'], $record['Form']['model'], $record['Form']['engine'],
                        trim(preg_replace("/\r|\n/", "! ", $record['Form']['message']))
                    ];
                    fputcsv($csv_file, $row, ',', '"');
                }
                fclose($csv_file);
                return $fname;
            } elseif ($type == 2) {
                $header_row = ['Date', 'User Type', 'First Name', 'Last Name', 'Email', 'Country', 'Year', 'Make', 'Model', 'Other notes , Comments or Information'];
                $fname = 'new_kit_request_' . $f . '_to_' . $t . '.csv';
                $csv_file = fopen("report/" . $fname, 'w');
                fprintf($csv_file, chr(0xEF) . chr(0xBB) . chr(0xBF));
                fputcsv($csv_file, $header_row, ',', '"');
                foreach ($data as $record) {
                    $row = [];
                    $row = [
                        date('Y-m-d', strtotime($record['Form']['created'])), $record['Form']['user_type'], $record['Form']['first_name'], $record['Form']['last_name'], $record['Form']['country'], $record['Form']['email'],
                        $record['Form']['year'], $record['Form']['make'], $record['Form']['model'], trim(preg_replace("/\r|\n/", "! ", $record['Form']['message']))
                    ];
                    fputcsv($csv_file, $row, ',', '"');
                }
                fclose($csv_file);
                return $fname;
            } elseif ($type == 3) {
                $header_row = ['Date', 'User Type', 'First Name', 'Last Name', 'Phone', 'Email', 'Subject', 'How did you hear about us', 'City', 'State', 'Country', 'Zip Code', 'Brand', 'Model', 'Engine', 'Message'];
                $fname = 'contact_' . $f . '_to_' . $t . '.csv';
                $csv_file = fopen("report/" . $fname, 'w');
                fprintf($csv_file, chr(0xEF) . chr(0xBB) . chr(0xBF));
                fputcsv($csv_file, $header_row, ',', '"');
                foreach ($data as $record) {
                    $row = [];
                    $row = [
                        date('Y-m-d', strtotime($record['Form']['created'])), $record['Form']['user_type'], $record['Form']['first_name'], $record['Form']['last_name'], $record['Form']['email'], $record['Form']['mobile'],
                        $record['Form']['subject'], $record['Form']['source'], $record['Form']['city'], $record['Form']['state'], $record['Form']['country'], $record['Form']['zip'],
                        $record['Form']['make'], $record['Form']['model'], $record['Form']['engine'],
                        trim(preg_replace("/\r|\n/", "! ", $record['Form']['message']))
                    ];
                    fputcsv($csv_file, $row, ',', '"');
                }
                fclose($csv_file);
                return $fname;
            }
        }
    }

    public function weekly_report_email()
    {
        $w = date('w', strtotime(DATE));
        $h = date('H', strtotime(DATE));
        echo "Current Time is " . date('h:i A m/d/Y', strtotime(DATE)) . " Asia/Hong_Kong <hr>";
        if ($w == 0) {
            $this->Email->sendAs = 'html';
            $this->Email->from = 'Armytrix <web@armytrix.com>';
            $this->Email->to = 'marketing@armytrix.com';
            $this->Email->subject = 'Weekly Report ' . DATE;
            $this->Email->delivery = 'smtp';
            $this->Email->smtpOptions = ['host' => 'ssl://smtp.gmail.com', 'port' => 465, 'username' => 'web@armytrix.com', 'password' => 'JR=n4%5E1', 'auth' => true];
            $attachments = $file = [];
            $file[] = $this->report(1);
            $file[] = $this->report(2);
            $file[] = $this->report(3);
            if (!empty($file)) {
                foreach ($file as $k => $v) {
                    if (!empty($v)) {
                        $f = "report/" . $v;
                        if (file_exists($f)) {
                            $attachments[] = '/home/admin/public_html/app/webroot/report/' . $v;
                        }
                    }
                }
            }
            if (!empty($attachments)) {
                $this->Email->attachments = $attachments;
            }
            try {
                if ($this->Email->send('Weekly Report ' . DATE)) {
                    ec("Email sent");
                }
            } catch (Exception $e) {
            }
        }
    }


    public function pmt_curl($output_transaction = null)
    {
        $process_result = null;
        if (!empty($output_transaction)) {
            ob_start();
            $ch = curl_init($output_transaction);
            curl_setopt($ch, CURLOPT_VERBOSE, 1);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, null);
            curl_exec($ch);
            curl_close($ch);
            $process_result = ob_get_contents();
            ob_end_clean();
        }
        return $process_result;
    }

    public function send_cn_email($id = null)
    {
        $this->autoRender = false;
        $process_result = $this->pmt_curl("http://armytrix.com.cn/crons/get_emails");
        $data = json_decode($process_result, true);
        if (!empty($data)) {
            foreach ($data as $d) {
                if (filter_var($d['EmailServer']['email_to'], FILTER_VALIDATE_EMAIL)) {
                    if (!empty($d['EmailServer']['email_to'])  && !empty($d['EmailServer']['subject'])) {
                        $this->Email->sendAs = 'both';
                        $this->Email->from = 'Armytrix <web@armytrix.com>';
                        $this->Email->to = $d['EmailServer']['email_to'];
                        $this->Email->subject = $d['EmailServer']['subject'];
                        $this->Email->delivery = 'smtp';
                        $this->Email->smtpOptions = ['host' => 'ssl://smtp.gmail.com', 'port' => 465, 'username' => 'web@armytrix.com', 'password' => 'JR=n4%5E1', 'auth' => true];
                        try {
                            $this->Email->send($d['EmailServer']['message']);
                            if ($d['EmailServer']['status'] == 0) {
                                $u = 'http://armytrix.com.cn/crons/set_emails/' . $d['EmailServer']['id'] . '/1';
                                $r = $this->pmt_curl($u);
                                ec('Email sent to ' . $d['EmailServer']['email_to']);
                            } elseif ($d['EmailServer']['status'] == 2) {
                                $u = 'http://armytrix.com.cn/crons/set_emails/' . $d['EmailServer']['id'] . '/3';
                                $r = $this->pmt_curl($u);
                                ec('Email sent to ' . $d['EmailServer']['email_to']);
                            }
                        } catch (Exception $e) {

                            $u = 'http://armytrix.com.cn/crons/set_emails/' . $d['EmailServer']['id'] . '/5';
                            $r = $this->pmt_curl($u);
                            ec('Email NOT sent to ' . $d['EmailServer']['email_to']);
                        }
                    } else {
                        $u = 'http://armytrix.com.cn/crons/set_emails/' . $d['EmailServer']['id'] . '/6';
                        $r = $this->pmt_curl($u);
                        ec('Email NOT sent to ' . $d['EmailServer']['email_to']);
                    }
                }
            }
        } else {
            echo "No email <hr> thank you  <br>";
        }
    }

    public function rm_tt()
    {
        $data = $this->ItemDetail->find('all', ['conditions' => ['ItemDetail.tt_slider !=' => '']]);
        if (!empty($data)) {
            $tab_arr = [];
            foreach ($data as $list) {
                $tt_slider = explode(',', $list['ItemDetail']['tt_slider']);
                $slider = explode(',', $list['ItemDetail']['slider']);
                $arr = array_unique(array_merge($slider, $tt_slider));
                $tab_arr[] = ['id' => $list['ItemDetail']['id'], 'slider' => implode(',', $arr)];
            }
            if (!empty($tab_arr)) {
                //ec($tab_arr);
                $this->ItemDetail->saveAll($tab_arr);
                ec("Slider updated");
            }
        }
    }

    public function update_string()
    {
        $str = [
            'FITMENT',
            'FEATURE',
            'NOTE',
            'CAT-BACK VALVETRONIC EXHAUST',
            'HEADER / DOWNPIPES',
            'ARMYTRON ACCESSORY',
            'Cat-Back Valvetronic Mufflers Selection',
            'Catalytic Converter Replacement Selections',
            'Armytron Accessory Selctions',
            'QUOTE & PRICING INQUIRY',
            'Select',
            'DONE, CHECKOUT',
            'SELECTED',
            'Shipping',
            'Please Select A Product',
            '3-5 days deliver to US and Europe. Other countries will take 5-7 days.',
            'Shipment',
            'Delivery',
            'Varies',
            'Payments',
            'ARMYTRIX VALVE CONTROL TECHNOLOGY',
            '3 MODES SWITCH',
            'Smart Mode',
            'Neighbor Mode',
            'Beast Mode',
            'FREEDOM TO SWITCH BETWEEN LOUD AND QUIET WITH THE PUSH OF A BUTTON',
            'With the push of a button on your ARMYRIX remotes or smartphone application, you get to switch between modes upon your wish.',
            'CUSTOMIZEABLE AUTOMATIC MODE GIVES YOU A WORRY-FREE DRIVE',
            'The automatic mode will open/close the exhaust valves based on predetermined RPM range or turbo bar, so you don’t have to manually switch all the time – you can also customize your own automatic mode upon your preference!',
            'GAIN MORE POWER, LOSE NO TORQUE',
            'Depending on the cars, modifications, and tunes you have, opening valves allow the exhaust gas to flow more freely, as it does not have to pass through any muffler. And with the valves being closed, it can retain the back pressure at low rpm, and maintain the torque that is usually lost with straight piped exhaust systems.',
            'ARMYTRIX VALVE CONTROL REMOTE',
            'ARMYTRIX APP SMART ASSISTANT',
            'The mobile APP of ARMYTRIX can connect to the OBDII device via Bluetooth, and be used to as a remote controller to easily control valve switch and provide you with real-time monitoring of variuos values of your car, such as rotate speed, speed, fuel, etc. The rpm value in Auto mode can be set to open valves.',
            'COMBINATION OF INTELLIGENCE',
            'Cutting-Edge Interactive Valve Control Technology',
            'Simply Control Valves With OEM Driving Mode Select',
            'All For Driving Pleasure',
            '* Compatible with Mercedes (2018+ W / LED Dashboard) models ONLY',
            'PLUG AND PLAY',
            'Exclusive OBDII Dongle Module',
            'Reduce 30% Of Installation Time',
            'No More Complex Wiring Work',
            'UNLEASH THE ULTRA-HIGH DECIBEL OUTPUT',
            'FOR ADRENALINE-FUELLED ENJOYMENT',
            'DESIGNED TO PERFORM, DESTINED TO AMAZE',
            'Highest standard multiple tests and verification evoke beast performance limit.',
            'DOWNPIPE WITH CUTTING-EDGE FLEXIBLE PIPE TECHNOLOGY',
            'Protect exhaust pipes from breakage and facilitate cooling to maximize engine',
            'SPECIAL RAPID-COOLING CERAMIC COATING',
            'Reduce under-hood temperature and resistant and corrosion',
            'ERAMIC COATED DOWNPIPE',
            'PREVENTS METAL FATIGUE FROM HIGH TEMPERATURE.',
            'STANDARD DOWNPIPE',
            'DETERIORATE UNDER HIGH TEMPERATURE WHICH LEADS TO PIPE BREAKAGE.',

            'SIMULATION SOFTWARE FOR GAS FLOW',
            'THERMAL ENERGY LEAKAGE OF A VARIETY OF DATA ANALYSIS',
            '3D SCANS CAR UNDERBODY FOR REVERSE ENGINEERING TO COLLECT ALL HARDWARE DATA, RESULT IN RAPID PROTOTYPING WITH HIGH PRECISION',
            'METICULOUSLY CRAFTED FOR PRECISE FITMENT QUALITY IS OUR PRIDE IN WORKMANSHIP',
            'UTILIZING A RARE HIGH GRADE TITANIUM ENSURES THIS ACTION IS BUILT TO LAST',
            'HIGH QUALITY TITANIUM ALLOY, LIGHTER WEIGHT',
            'More than 60% lighter than the exhaust device of original factory, car body weight reduced significantly',

            'CRYSTALLIZATION OF TECHNOLOGY AND ART',
            'Multiple refined mechanical polishing contributes to craftsmanship level surface brightness.',
            'TITANIUM SERIES',
            'STAINLESS STEEL SERIES',
            'SHRED LABELS SET NEW STANDARD',
            'High standard T.I.G. hand welding provides the strongest and smoothest welds without welding slag',
            'Very fine',
            'Fine',
            'Flawless',
            'Qualified',
            'Failed',
            'Defective',
            'Micro-Rough',
            'Rough',
            'Very Rough',
        ];
        $arr = [];
        foreach ($str as $k => $v) {
            $arr[] = ['id' => null, 'text' => trim($v)];
        }
        $this->loadModel('String');
        if (!empty($arr)) {
            ec($arr);
            //$this->String->saveAll($arr);
            ec("Strings updated");
        }
    }
}
