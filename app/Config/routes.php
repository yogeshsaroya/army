<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
 
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
 
	Router::parseExtensions('html', 'rss', 'xml','json','php');
	Router::connect('/backend/*', array('controller' => 'users', 'action' => 'login', 'lab' => true));
	Router::connect('/', array('controller' => 'pages', 'action' => 'home'));
	
	Router::connect('/login/*', array('controller' => 'users', 'action' => 'login'));
	Router::connect('/register/*', array('controller' => 'users', 'action' => 'sign_up'));
	Router::connect('/forgotten/*', array('controller' => 'users', 'action' => 'forgotten'));
	Router::connect('/account/*', array('controller' => 'accounts', 'action' => 'index'));
	Router::connect('/address/*', array('controller' => 'accounts', 'action' => 'address'));
	Router::connect('/edit/*', array('controller' => 'accounts', 'action' => 'info'));
	Router::connect('/password/*', array('controller' => 'accounts', 'action' => 'password'));
	Router::connect('/newsletter/*', array('controller' => 'accounts', 'action' => 'newsletter'));
	Router::connect('/wishlist/*', array('controller' => 'accounts', 'action' => 'wishlist'));
	Router::connect('/order/*', array('controller' => 'accounts', 'action' => 'order'));
	Router::connect('/search/*', array('controller' => 'pages', 'action' => 'search'));
	Router::connect('/warranty_registration/*', array('controller' => 'homes', 'action' => 'warranty_registration'));
	
	
	Router::connect('/product/*', array('controller' => 'pages', 'action' => 'new_product'));
	Router::connect('/cart/*', array('controller' => 'pages', 'action' => 'cart'));
	Router::connect('/shop/*', array('controller' => 'pages', 'action' => 'extra_product'));
	Router::connect('/check_out/*', array('controller' => 'pages', 'action' => 'check_out'));
	Router::connect('/download_manual/*', array('controller' => 'accounts', 'action' => 'download_manual'));
	
	Router::connect('/collections/products/*', array('controller' => 'pages', 'action' => 'tuning_box_product'));
	Router::connect('/exhaust/*', array('controller' => 'pages', 'action' => 'exhaust'));
	Router::connect('/warranty/*', array('controller' => 'pages', 'action' => 'warranty'));
	Router::connect('/questions/*', array('controller' => 'pages', 'action' => 'questions'));
	Router::connect('/ecu/*', array('controller' => 'pages', 'action' => 'ecu'));
	Router::connect('/ecu-warranty/*', array('controller' => 'pages', 'action' => 'ecu_warranty'));
	Router::connect('/ecu-qa/*', array('controller' => 'pages', 'action' => 'ecu_qa'));
		
	Router::connect('/technology/*', array('controller' => 'pages', 'action' => 'technology'));
	Router::connect('/testimonial/*', array('controller' => 'homes', 'action' => 'testimonial'));
	Router::connect('/dealer/*', array('controller' => 'pages', 'action' => 'our_dealers'));
	Router::connect('/become-dealer/*', array('controller' => 'pages', 'action' => 'become_dealer'));
	Router::connect('/contact/*', array('controller' => 'homes', 'action' => 'contact_us'));
	Router::connect('/privacy-policy/*', array('controller' => 'homes', 'action' => 'privacy_policy'));
	
	
	Router::connect('/featured-video/*', array('controller' => 'pages', 'action' => 'featured_video'));
	Router::connect('/tuning_search/*', array('controller' => 'pages', 'action' => 'tuning_search'));
	
	Router::connect('/product-tuning-box/*', array('controller' => 'pages', 'action' => 'product_tuning_box'));
	Router::connect('/product-exhaust/*', array('controller' => 'pages', 'action' => 'product_exhaust'));
	Router::connect('/motocycle-exhaust/*', array('controller' => 'pages', 'action' => 'motocycle_exhaust'));
	
	Router::connect('/terms_and_conditions/*', array('controller' => 'pages', 'action' => 't_and_c'));
	Router::connect('/faqs/*', array('controller' => 'pages', 'action' => 'faqs'));
	
	Router::connect('/sound/*', array('controller' => 'homes', 'action' => 'index'));
	Router::connect('/performance/*', array('controller' => 'homes', 'action' => 'performance'));
	
	
	Router::connect('/suggest/*', array('controller' => 'homes', 'action' => 'suggest'));
	Router::connect('/instagram/*', array('controller' => 'homes', 'action' => 'instagram'));
	Router::connect('/dyno/*', array('controller' => 'homes', 'action' => 'dyno'));
	
	Router::connect('/customer-support/*', array('controller' => 'pages', 'action' => 'customer_support'));
	Router::connect('/customer-support-thanks/*', array('controller' => 'pages', 'action' => 'customer_support_thanks'));
	Router::connect('/damage/*', array('controller' => 'pages', 'action' => 'customer_support_damage_1'));
	Router::connect('/damage-step2/*', array('controller' => 'pages', 'action' => 'customer_support_damage_2'));
	Router::connect('/damage-step2-2/*', array('controller' => 'pages', 'action' => 'customer_support_damage_2_2'));
	Router::connect('/damage-step3/*', array('controller' => 'pages', 'action' => 'customer_support_damage_3'));
	Router::connect('/damage-step3-2/*', array('controller' => 'pages', 'action' => 'customer_support_damage_3_2'));
	Router::connect('/customer-support-submit/*', array('controller' => 'pages', 'action' => 'customer_support_submit'));
	Router::connect('/lost-parts/*', array('controller' => 'pages', 'action' => 'customer_support_lost_1'));
	Router::connect('/lost-parts-step2/*', array('controller' => 'pages', 'action' => 'customer_support_lost_2'));
	Router::connect('/lost-parts-step2-2/*', array('controller' => 'pages', 'action' => 'customer_support_lost_2_2'));
	Router::connect('/fitment-issue/*', array('controller' => 'pages', 'action' => 'customer_support_fitment_1'));
	Router::connect('/fitment-issue-step2/*', array('controller' => 'pages', 'action' => 'customer_support_fitment_2'));
	Router::connect('/fitment-issue-step2-2/*', array('controller' => 'pages', 'action' => 'customer_support_fitment_2_2'));
	Router::connect('/fitment-issue-step3/*', array('controller' => 'pages', 'action' => 'customer_support_fitment_3'));
	Router::connect('/fitment-issue-step3-2/*', array('controller' => 'pages', 'action' => 'customer_support_fitment_3_2'));
	Router::connect('/fitment-issue-step3-3/*', array('controller' => 'pages', 'action' => 'customer_support_fitment_3_3'));
	Router::connect('/check-engine/*', array('controller' => 'pages', 'action' => 'customer_support_check_engine'));
	Router::connect('/valve-control/*', array('controller' => 'pages', 'action' => 'customer_support_valve_control'));
	
	Router::connect('/mustang-flash-sale/*', array('controller' => 'pages', 'action' => 'mustang_flash_sale'));
	
/**
 * ...and connect the rest of 'Pages' controller's URLs.
 */
	

/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';
