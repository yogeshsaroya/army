<?php

App::uses('AppController', 'Controller');
App::uses('Xml', 'Utility');


class CronsController extends AppController {

    var $uses = array('EmailServer','ItemDetail','Library');
    public $components = array('Cookie', 'Session', 'RequestHandler','Email', 'DATA');
    public $helpers = array('Html', 'Form', 'JqueryEngine', 'Session', 'Text', 'Time');

    function beforeFilter() {
    	AppController::beforeFilter();
       $this->Auth->allow();
       $this->autoRender = false;
    }
    
    public function index(){ }
    
    /**
     * run per min
     * send email notification 
     * */
    public function set_email($id = null) {
        $this->autoRender = false;
        $this->loadModel('EmailServer');
        $data = $this->EmailServer->find('all', array('recursive' => -1, 'conditions' => array('EmailServer.status'=>[0,2]), 'limit' => 10));
        $num=1;
        if (!empty($data)) {
            foreach ($data as $d) {
            if (filter_var($d['EmailServer']['email_to'], FILTER_VALIDATE_EMAIL)) {
                if (!empty($d['EmailServer']['email_to']) && !empty($d['EmailServer']['email_from']) && !empty($d['EmailServer']['subject'])) {
                    $this->Email->sendAs = 'both';
                    $this->Email->from = $d['EmailServer']['email_from'];
                    $this->Email->to = $d['EmailServer']['email_to'];
                    $this->Email->subject = $d['EmailServer']['subject'];
                    
                    $this->Email->delivery = 'smtp';
                    $this->Email->smtpOptions = ['host'=>'ssl://smtp.gmail.com','port'=>465,'username'=>'web@armytrix.com','password'=>'JR=n4%5E1','auth' => true ];
                    
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
                        $this->EmailServer->updateAll(array('EmailServer.status' => 5), array('EmailServer.id' => $d['EmailServer']['id'])); }
                }
                else{ $this->EmailServer->updateAll(array('EmailServer.status' => 5), array('EmailServer.id' => $d['EmailServer']['id'])); }
            }
            }
            echo "total ".$num." has been send  <hr> thank you  <br>";
        } else { echo "No email <hr> thank you  <br>"; }
    }

    public function map() {
    	$this->autoRender=false;
    	$writer = new XMLWriter();
    	$writer->openURI(WWW_ROOT.'/sitemap.xml');
    	// document head
    	$writer->startDocument('1.0', 'UTF-8');
    	$writer->setIndent(4);
    	$writer->startElement('urlset');
    	$writer->writeAttribute('xmlns:xsi', 'http://www.w3.org/2001/XMLSchema-instance');
    	$writer->writeAttribute('xmlns', 'http://www.sitemaps.org/schemas/sitemap/0.9');
    	$writer->writeAttribute('xsi:schemaLocation', 'http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd');
    
    	$c = array('ItemDetail.status'=>1,'ItemDetail.url IS NOT NULL','ItemDetail.language'=>'eng');
    	$data = $this->ItemDetail->find('all',array('conditions'=>$c));
    	if(!empty($data)){
   			foreach ($data as $list){
    			$lin=utf8_encode(SITEURL."product/".$list['ItemDetail']['url']);
    			$url_date = date(DATE_W3C, strtotime(DATE));
    			$writer->startElement('url');
    			$writer->writeElement('loc', $lin);
    			$writer->writeElement('lastmod',trim($url_date));
    			$writer->writeElement('changefreq', 'always');
    			$writer->writeElement('priority', '0.8');
    			$writer->endElement();
    		}
    	}
        $writer->endElement();
 	    $writer->endDocument();
  	    echo SITEURL.'sitemap.xml created';
   	}
   	
   	
   	public function image_map() {
   	    $this->autoRender=false;
   	    $writer = new XMLWriter();
   	    $writer->openURI(WWW_ROOT.'/sitemap_image.xml');
   	    $writer->startDocument('1.0', 'UTF-8');
   	    $writer->setIndent(4);
   	    $writer->startElement('urlset');
   	    $writer->writeAttribute('xmlns:xsi', 'http://www.w3.org/2001/XMLSchema-instance');
   	    $writer->writeAttribute('xmlns', 'http://www.sitemaps.org/schemas/sitemap/0.9');
   	    $writer->writeAttribute('xmlns:image', 'http://www.google.com/schemas/sitemap-image/1.1');
   	    $writer->writeAttribute('xsi:schemaLocation', 'http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd');
   	    $c = array('ItemDetail.status'=>1,'ItemDetail.url IS NOT NULL','ItemDetail.language'=>'eng');
   	    $data = $this->ItemDetail->find('all',array('conditions'=>$c));
   	    if(!empty($data)){
   	        foreach ($data as $list){
   	            $sArr = explode(',', trim($list['ItemDetail']['slider']));
   	            $sArr1 = explode(',', trim($list['ItemDetail']['tt_slider']));
   	            if(!empty($sArr) && isset($sArr[0]) && !empty($sArr[0])){ $slider = $this->Library->find('all',array('conditions'=>array('Library.id'=>$sArr),'order'=>['Library.pos'=>'ASC'] )); }
   	            if(!empty($sArr1) && isset($sArr1[0]) && !empty($sArr1[0])){ $slidersTT = $this->Library->find('all',array('conditions'=>array('Library.id'=>$sArr1),'order'=>['Library.pos'=>'ASC'])); }
   	            $lin=utf8_encode(SITEURL."product/".$list['ItemDetail']['url']);
   	            $url_date = date(DATE_W3C, strtotime(DATE));
   	            $writer->startElement('url');
   	            $writer->writeElement('loc', $lin);
   	            if ( !empty($slider) ){
   	                foreach ($slider as $sList){
   	                    $sImg = utf8_encode( SITEURL.'cdn/'.$sList['Library']['folder']."/".$sList['Library']['file_name'] );
   	                    $writer->startElement('image:image');
   	                    $writer->writeElement('image:loc',$sImg);
   	                    if ( !empty($sList['Library']['title']) ){ $writer->writeElement('image:title',$sList['Library']['title']); }
   	                    $writer->endElement();
   	            } }
   	            if ( !empty($slidersTT) ){
   	                foreach ($slidersTT as $sList){
   	                    $sImg = utf8_encode( SITEURL.'cdn/'.$sList['Library']['folder']."/".$sList['Library']['file_name'] );
   	                    $writer->startElement('image:image');
   	                    $writer->writeElement('image:loc',$sImg);
   	                    if ( !empty($sList['Library']['title']) ){ $writer->writeElement('image:title',$sList['Library']['title']); }
   	                    $writer->endElement();
   	            } }
  	            $writer->endElement();
   	        }
   	    }
   	    
   	    $writer->endElement();
   	    $writer->endDocument();
   	    echo SITEURL.'sitemap_image.xml created';
   	    
   	}
   
   	public function gallery_map() {
   	    $this->autoRender=false;
   	    $writer = new XMLWriter();
   	    $writer->openURI(WWW_ROOT.'/sitemap_gallery.xml');
   	    $writer->startDocument('1.0', 'UTF-8');
   	    $writer->setIndent(4);
   	    $writer->startElement('urlset');
   	    $writer->writeAttribute('xmlns:xsi', 'http://www.w3.org/2001/XMLSchema-instance');
   	    $writer->writeAttribute('xmlns', 'http://www.sitemaps.org/schemas/sitemap/0.9');
   	    $writer->writeAttribute('xmlns:image', 'http://www.google.com/schemas/sitemap-image/1.1');
   	    $writer->writeAttribute('xsi:schemaLocation', 'http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd');
   	    $c = array('ItemDetail.status'=>1,'ItemDetail.url IS NOT NULL','ItemDetail.language'=>'eng');
   	    $data = $this->ItemDetail->find('all',array('conditions'=>$c));
   	    if(!empty($data)){
   	        foreach ($data as $list){
   	            $gArr = explode(',', $list['ItemDetail']['gallery']);
   	            if(!empty($gArr) && isset($gArr[0]) && !empty($gArr[0])){ $gallery = $this->Library->find('all',array('conditions'=>array('Library.id'=>$gArr),'order'=>['Library.pos'=>'ASC'])); }
   	            $lin=utf8_encode(SITEURL."product/".$list['ItemDetail']['url']);
   	            $url_date = date(DATE_W3C, strtotime(DATE));
   	            $writer->startElement('url');
   	            $writer->writeElement('loc', $lin);
                if ( !empty($gallery) ){
                    foreach ($gallery as $sList){
                        $sImg = utf8_encode( SITEURL.'cdn/'.$sList['Library']['folder']."/".$sList['Library']['file_name'] );
                        $writer->startElement('image:image');
                        $writer->writeElement('image:loc',$sImg);
                        if ( !empty($sList['Library']['title']) ){ $writer->writeElement('image:title',$sList['Library']['title']); }
                        $writer->endElement();
                    } }
                    $writer->endElement();
   	        }
   	    }
   	    
   	    $writer->endElement();
   	    $writer->endDocument();
   	    echo SITEURL.'sitemap_gallery.xml created';
   	    
   	}
   	
   	public function report($type = 1){
   	    
   	    $path = 'report';
   	    if (!file_exists($path)) { mkdir($path, 0777, true); }
   	    $this->loadModel('Form');
   	    $d1 = date('Y-m-d',strtotime( "previous monday",strtotime(DATE)));
   	    $d2 = date('Y-m-d',strtotime( "sunday",strtotime(DATE)));
   	    $f = date('m_d_Y',strtotime( "previous monday",strtotime(DATE)));
   	    $t = date('m_d_Y',strtotime( "sunday",strtotime(DATE)));
   	    $data = $this->Form->find('all',['order' => ['Form.id' => 'DESC'],'conditions'=>['Form.type'=>$type,'DATE(Form.created) BETWEEN ? AND ?'=>[$d1,$d2]]]);
   	    if(!empty($data)){
   	        if ($type == 1){
   	            $header_row = ['Date','User Type','First Name','Last Name','Country','City','Zip Code','Email','Phone','Brand','Model','Engine','Message'];
       	        $fname = 'product_'.$f.'_to_'.$t.'.csv';
       	        $csv_file = fopen ("report/".$fname,'w');
       	        fprintf($csv_file, chr(0xEF).chr(0xBB).chr(0xBF));
       	        fputcsv($csv_file,$header_row,',','"');
       	        foreach ($data as $record){
       	            $row = [];
       	            $row = [ date('Y-m-d',strtotime($record['Form']['created'])),$record['Form']['user_type'],$record['Form']['first_name'],$record['Form']['last_name'],
       	                $record['Form']['country'],$record['Form']['city'],$record['Form']['zip'],$record['Form']['email'],$record['Form']['mobile'],
       	                $record['Form']['make'],$record['Form']['model'],$record['Form']['engine'],
       	                trim(preg_replace( "/\r|\n/", "! ", $record['Form']['message'])) ];
       	            fputcsv($csv_file,$row,',','"');
       	        }
       	        fclose($csv_file);
       	        return $fname;
   	        }
   	        elseif ($type == 2){
   	            $header_row = ['Date','User Type','First Name','Last Name','Email','Country','Year','Make','Model','Other notes , Comments or Information'];
   	            $fname = 'new_kit_request_'.$f.'_to_'.$t.'.csv';
   	            $csv_file = fopen ("report/".$fname,'w');
   	            fprintf($csv_file, chr(0xEF).chr(0xBB).chr(0xBF));
   	            fputcsv($csv_file,$header_row,',','"');
   	            foreach ($data as $record){
   	                $row = [];
   	                $row = [ date('Y-m-d',strtotime($record['Form']['created'])),$record['Form']['user_type'], $record['Form']['first_name'],$record['Form']['last_name'],$record['Form']['country'],$record['Form']['email'],
   	                    $record['Form']['year'],$record['Form']['make'],$record['Form']['model'],trim(preg_replace( "/\r|\n/", "! ", $record['Form']['message'])) ];
   	                fputcsv($csv_file,$row,',','"');
   	            }
   	            fclose($csv_file);
   	            return $fname;
   	        }
   	        elseif ($type == 3){
   	            $header_row = ['Date','User Type', 'First Name','Last Name','Phone','Email','Subject','How did you hear about us','City','State','Country','Zip Code','Brand','Model','Engine','Message'];
   	            $fname = 'contact_'.$f.'_to_'.$t.'.csv';
   	            $csv_file = fopen ("report/".$fname,'w');
   	            fprintf($csv_file, chr(0xEF).chr(0xBB).chr(0xBF));
   	            fputcsv($csv_file,$header_row,',','"');
   	            foreach ($data as $record){
   	                $row = [];
   	                $row = [ date('Y-m-d',strtotime($record['Form']['created'])),$record['Form']['user_type'],$record['Form']['first_name'],$record['Form']['last_name'],$record['Form']['email'],$record['Form']['mobile'],
   	                    $record['Form']['subject'],$record['Form']['source'],$record['Form']['city'],$record['Form']['state'],$record['Form']['country'], $record['Form']['zip'],
   	                    $record['Form']['make'],$record['Form']['model'],$record['Form']['engine'],
   	                    trim(preg_replace( "/\r|\n/", "! ", $record['Form']['message'])) ];
   	                fputcsv($csv_file,$row,',','"');
   	            }
   	            fclose($csv_file);
   	            return $fname;
   	        }
   	    }
   	}
   	
   	   	public function weekly_report_email() {
   	    $w = date('w',strtotime(DATE));
   	    $h = date('H',strtotime(DATE));
   	    echo "Current Time is ".date('h:i A m/d/Y',strtotime(DATE))." Asia/Hong_Kong <hr>";
   	    if( $w == 0 ){
            $this->Email->sendAs = 'html';
            $this->Email->from = 'Armytrix <web@armytrix.com>';
            $this->Email->to = 'marketing@armytrix.com';
            $this->Email->subject = 'Weekly Report '.DATE;
            $this->Email->delivery = 'smtp';
            $this->Email->smtpOptions = ['host'=>'ssl://smtp.gmail.com','port'=>465,'username'=>'web@armytrix.com','password'=>'JR=n4%5E1','auth' => true ];
            $attachments = $file = [];
            $file[] = $this->report(1);
            $file[] = $this->report(2);
            $file[] = $this->report(3);
            if (!empty($file)){  
                foreach ($file as $k=>$v){
                    if ( !empty($v)){
                        $f = "report/".$v; 
                        if(file_exists($f)){ $attachments[] = '/home/admin/public_html/app/webroot/report/'.$v; }
                    }
                } 
            }
            if (!empty($attachments)){ $this->Email->attachments = $attachments ; }
            try {
                if( $this->Email->send('Weekly Report '.DATE) ){ ec("Email sent"); }
            } catch (Exception $e) { }
        }
      }
        
        
        public function export_country(){
            $this->loadModel('CountryList');
            $data = $this->CountryList->find('all',['recursive'=>-1, 'orders'=>['CountryList.short_name'=>'ASC']]);
            if(!empty($data)){
                $header_row = array('ID','short_name' ,'iso','catback','down_pipe','owrc','fedex_pack','region');
                $filename = "CountryList_".rand().".csv";
                $csv_file = fopen('php://output', 'wr') or die("Can't open php://output") ;
                header('Content-type: application/csv');
                header('Content-Disposition: attachment; filename="'.$filename.'"');
                fprintf($csv_file, chr(0xEF).chr(0xBB).chr(0xBF));
                fputcsv($csv_file,$header_row,',','"');
                foreach ($data as $list){
                    $row = array();
                    $row = [ $list['CountryList']['id'], $list['CountryList']['short_name'],$list['CountryList']['iso2'],
                        $list['CountryList']['catback'], $list['CountryList']['down_pipe'],$list['CountryList']['owrc'],
                        $list['CountryList']['fedex_pack'],$list['CountryList']['region'] ];
                   fputcsv($csv_file,$row,',','"');
                }
               fclose($csv_file);
            }
        }
        
        
        public function update_country_list(){
            die;
            $this->loadModel('CountryList');
            $note_arr = $arr =[]; $row = 1;
            if (($handle = fopen("files/CountryList.csv", "r")) !== FALSE) {
                while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                    if( $row > 1){
                        $arr['id'] = utf8_encode( trim($data[0]) );
                        $arr['catback'] = utf8_encode( trim($data[3]) );
                        $arr['down_pipe'] = utf8_encode( trim($data[4]) );
                        $arr['owrc'] = utf8_encode( trim($data[5]) );
                        $arr['fedex_pack'] = utf8_encode( trim($data[6]) );
                        $arr['region'] = utf8_encode( trim($data[7]) );
                        $note_arr[] = $arr;
                    }
                    $row++;
                } fclose($handle);
            }
            if ( !empty($note_arr) ){
                ec($note_arr);
                //$this->CountryList->saveAll($note_arr);
                ec("Saved");
            }
        }
        
        
        public function export_product(){
            $this->autoRender = false;
            $this->loadModel('Product');
            $this->Product->bindModel(array('belongsTo'=>array('Model','Brand','Motor')));
            $data = $this->Product->find('all',['recursive'=>1,'conditions'=>['Product.status'=>1, 'Product.type'=>[2,3,4,5]], 'order'=>['Product.type'=>'DESC']]);
            
            if(!empty($data)){
                $header_row = array('ID','Type','part','Product Name','Brand','Model','Motor','price','quantity','discount','material');
                $filename = "Product_lists_".rand().".csv";
                $csv_file = fopen('php://output', 'wr') or die("Can't open php://output") ;
                header('Content-type: application/csv');
                header('Content-Disposition: attachment; filename="'.$filename.'"');
                fprintf($csv_file, chr(0xEF).chr(0xBB).chr(0xBF));
                fputcsv($csv_file,$header_row,',','"');
                
                foreach ($data as $list){
                    $row = array();
                    $type = null;
                    if ( $list['Product']['type'] == 2 ){ $type = 'Cata';}
                    elseif ( $list['Product']['type'] == 3 ){ $type = 'Down Pipe';}
                    elseif ( $list['Product']['type'] == 4 ){ $type = 'Extra Product';}
                    $row = [ $list['Product']['id'],$type,$list['Product']['part'], $list['Product']['title'], $list['Brand']['name'],$list['Model']['name'],
                        $list['Motor']['name'], $list['Product']['price'],$list['Product']['quantity'],$list['Product']['discount'],$list['Product']['material'] ];
                    fputcsv($csv_file,$row,',','"');
                }
                fclose($csv_file);
            }
            exit;
        }
        
        public function update_discount(){
            die;
            $this->loadModel('Product');
            $note_arr = $arr =[]; $row = 1;
            if (($handle = fopen("files/update_discount.csv", "r")) !== FALSE) {
                while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                    if( $row > 1){
                        $arr['id'] = utf8_encode( trim($data[0]) );
                        $arr['discount'] = utf8_encode( trim($data[9]) );
                        $note_arr[] = $arr;
                    }
                    $row++;
                } fclose($handle);
            }
            if ( !empty($note_arr) ){
                //ec($note_arr); die;
                $this->Product->saveAll($note_arr);
                echo "Discount added for all Products <hr>";
            }
            exit;
        }
        
        public function update_pri($id = null){
            if( $id == 'army' ){
                $this->loadModel('Product');
                $note_arr = $arr =[]; $row = 1;
                if (($handle = fopen("files/new_year_price_change.csv", "r")) !== FALSE) {
                    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                        if( $row > 1){
                            $arr['id'] = utf8_encode( trim($data[0]) );
                            $arr['price'] = utf8_encode( trim($data[7]) );
                            $note_arr[] = $arr;
                        }
                        $row++;
                    } fclose($handle);
                }
                if ( !empty($note_arr) ){
                    // ec($note_arr); die;
                    $this->Product->saveAll($note_arr);
                    echo "Price added for all Products <hr>";
                }
            }
            
            exit;
        }
        
        public function update_pri_old($id = null){
            if( $id == 'army' ){
                $this->loadModel('Product');
                $note_arr = $arr =[]; $row = 1;
                if (($handle = fopen("files/old_price.csv", "r")) !== FALSE) {
                    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                        if( $row > 1){
                            $arr['id'] = utf8_encode( trim($data[0]) );
                            $arr['price'] = utf8_encode( trim($data[7]) );
                            $note_arr[] = $arr;
                        }
                        $row++;
                    } fclose($handle);
                }
                if ( !empty($note_arr) ){
                    // ec($note_arr); die;
                    $this->Product->saveAll($note_arr);
                    echo "Price added for all Products <hr>";
                }
            }
            exit;
        }
        
        public function remove_discount(){
            $this->loadModel('Product');
            $this->Product->updateAll(array('Product.discount' => 0), array('Product.type'=>[1,2,3,4,5]));
            echo "Discount removed from all Products <hr>";
            exit;
        }
   		
        
        public function export_car(){
            $this->autoRender = false;
            $this->loadModel('ItemDetail');
            $this->ItemDetail->bindModel(array('belongsTo'=>array('Brand','Model','Motor')));
            $data = $this->ItemDetail->find('all',['recursive'=>1,'conditions'=>['ItemDetail.status'=>1,'ItemDetail.language'=>'eng']]);
            if(!empty($data)){
                $header_row = array('ID','Brand','Model','Motor','Name','Power','Torque','Weight');
                $filename = "car_lists_".rand().".csv";
                $csv_file = fopen('php://output', 'wr') or die("Can't open php://output") ;
                header('Content-type: application/csv');
                header('Content-Disposition: attachment; filename="'.$filename.'"');
                fprintf($csv_file, chr(0xEF).chr(0xBB).chr(0xBF));
                fputcsv($csv_file,$header_row,',','"');
                foreach ($data as $list){
                    $row = array();
                    $row = [ $list['ItemDetail']['id'],$list['Brand']['name'],$list['Model']['name'], $list['Motor']['name'], 
                        $list['ItemDetail']['name'],$list['ItemDetail']['power'],$list['ItemDetail']['torque'],$list['ItemDetail']['weight'] ];
                    fputcsv($csv_file,$row,',','"');
                }
                fclose($csv_file);
            }
            exit;
        }
        
        public function update_car(){
            die;
            $this->autoRender = false;
            $this->loadModel('ItemDetail');
            $note_arr = $arr =[]; $row = 1;
            if (($handle = fopen("files/car_lists_new.csv", "r")) !== FALSE) {
                while (($data = fgetcsv($handle, 10000, ",")) !== FALSE) {
                    if( $row > 1){
                        $arr['id'] = utf8_encode( trim($data[0]) );
                        $arr['power'] = utf8_encode( trim($data[5]) );
                        $arr['torque'] = utf8_encode( trim($data[6]) );
                        $arr['weight'] = utf8_encode( trim($data[7]) );
                        $note_arr[] = $arr;
                    }
                    $row++;
                } fclose($handle);
            }
            if ( !empty($note_arr) ){
                //ec($note_arr);
                //$this->ItemDetail->saveAll($note_arr);
                ec("Saved");
            }
        }
        
        public function pmt_curl($output_transaction= null) {
            $process_result = null;
            if(!empty($output_transaction)){
                 ob_start();
                 $ch = curl_init ($output_transaction);
                 curl_setopt ($ch, CURLOPT_VERBOSE, 1);
                 curl_setopt ($ch, CURLOPT_POST, 1);
                 curl_setopt ($ch, CURLOPT_POSTFIELDS, null);
                 curl_exec ($ch);
                 curl_close ($ch);
                 $process_result = ob_get_contents();
                 ob_end_clean();
            }
            return $process_result;
        }
        
    public function send_cn_email($id = null) {
        $this->autoRender = false;
        $process_result = $this->pmt_curl("http://armytrix.com.cn/crons/get_emails");
		$data = json_decode($process_result,true);
        if (!empty($data)) {
            foreach ($data as $d) {
                if (filter_var($d['EmailServer']['email_to'], FILTER_VALIDATE_EMAIL)) {
                    if (!empty($d['EmailServer']['email_to'])  && !empty($d['EmailServer']['subject'])) {
                        $this->Email->sendAs = 'both';
                        $this->Email->from = 'Armytrix <web@armytrix.com>';
                        $this->Email->to = $d['EmailServer']['email_to'];
                        $this->Email->subject = $d['EmailServer']['subject'];
                        $this->Email->delivery = 'smtp';
                        $this->Email->smtpOptions = ['host'=>'ssl://smtp.gmail.com','port'=>465,'username'=>'web@armytrix.com','password'=>'JR=n4%5E1','auth' => true ];
                        try {
                            $this->Email->send($d['EmailServer']['message']);
                            if ($d['EmailServer']['status'] == 0) {
                                $u = 'http://armytrix.com.cn/crons/set_emails/'.$d['EmailServer']['id'].'/1';
                                $r = $this->pmt_curl($u);
                                ec( 'Email sent to '.$d['EmailServer']['email_to'] );
                            } elseif ($d['EmailServer']['status'] == 2) {
                                $u = 'http://armytrix.com.cn/crons/set_emails/'.$d['EmailServer']['id'].'/3';
                                $r = $this->pmt_curl($u);
                                ec( 'Email sent to '.$d['EmailServer']['email_to'] );
                            }
                            
                        } catch (Exception $e) { 
                            
                            $u = 'http://armytrix.com.cn/crons/set_emails/'.$d['EmailServer']['id'].'/5';
                            $r = $this->pmt_curl($u);
                            ec( 'Email NOT sent to '.$d['EmailServer']['email_to'] );
                        }
                    }
                    else{ 
                        $u = 'http://armytrix.com.cn/crons/set_emails/'.$d['EmailServer']['id'].'/6';
                        $r = $this->pmt_curl($u);
                        ec( 'Email NOT sent to '.$d['EmailServer']['email_to'] );
                    }
                }
            }
        } else { echo "No email <hr> thank you  <br>"; }
    }
}