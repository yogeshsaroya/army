<?php

App::uses('AppController', 'Controller');
App::uses('Xml', 'Utility');


class CronsController extends AppController
{

    var $uses = array('EmailServer', 'ItemDetail', 'Library', 'Motorcycle','Product');
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
            'conditions' => ['ItemDetail.status' => 1, 'ItemDetail.url IS NOT NULL', 'ItemDetail.language' => 'eng'],
            'fields' => ['ItemDetail.id', 'ItemDetail.status', 'ItemDetail.url', 'ItemDetail.language']
        ]);

        $motorData = $this->Motorcycle->find('all', [
            'conditions' => ['Motorcycle.status' => 1, 'Motorcycle.url IS NOT NULL'],
            'fields' => ['Motorcycle.id', 'Motorcycle.status', 'Motorcycle.url']
        ]);
        $shopData = $this->Product->find('all', ['conditions' => ['Product.type' => 4, 'Product.status' => 1], 
        'fields' => ['Product.id', 'Product.type','Product.status','Product.slug']]);
        if (!empty($data)) {
            foreach ($data as $list) {
                $lin = utf8_encode(SITEURL . "product/" . $list['ItemDetail']['url']);
                $url_date = date(DATE_W3C, strtotime(DATE));
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
                $url_date = date(DATE_W3C, strtotime(DATE));
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
                $url_date = date(DATE_W3C, strtotime(DATE));
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
        
        echo "SITEMAP added : ".SITEURL.'sitemap.xml';
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
        
        $data = $this->ItemDetail->find('all', ['conditions' => ['ItemDetail.status' => 1, 'ItemDetail.url IS NOT NULL', 'ItemDetail.language' => 'eng']]);
        $motorData = $this->Motorcycle->find('all', ['conditions' => ['Motorcycle.status' => 1, 'Motorcycle.url IS NOT NULL'],
            'fields' => ['Motorcycle.id', 'Motorcycle.status', 'Motorcycle.url','Motorcycle.slider']
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
        echo "SITEMAP added : ".SITEURL.'sitemap_image.xml';
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
}
