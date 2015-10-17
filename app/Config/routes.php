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
	Router::connect('/', array('controller' => 'products', 'action' => 'home'));
	Router::connect('/quan-tri/them-danh-muc', array('controller' => 'categories', 'action' => 'admin_add'));
	Router::connect('/quan-tri/them-san-pham', array('controller' => 'products', 'action' => 'admin_add'));
	Router::connect('/sua-san-pham/*', array('controller' => 'products', 'action' => 'admin_edit'));
	Router::connect('/san-pham', array('controller' => 'products', 'action' => 'admin_index'));
	Router::connect('/don-hang', array('controller' => 'orders', 'action' => 'admin_index'));
	Router::connect('/quan-tri/them-tin-tuc', array('controller' => 'NewsPosts', 'action' => 'admin_add'));
	Router::connect('/quan-tri/tin-tuc', array('controller' => 'NewsPosts', 'action' => 'admin_index'));
	Router::connect('/quan-tri/sua-tin-tuc/*', array('controller' => 'NewsPosts', 'action' => 'admin_edit'));
	Router::connect('/gio-hang', array('controller' => 'products', 'action' => 'view_cart'));
	Router::connect('/register', array('controller' => 'users', 'action' => 'register'));
	Router::connect('/logout', array('controller' => 'users', 'action' => 'logout'));
	Router::connect('/login', array('controller' => 'users', 'action' => 'login'));
	Router::connect('/gioi-thieu', array('controller' => 'products', 'action' => 'introduction'));
	Router::connect('/he-thong-cua-hang', array('controller' => 'products', 'action' => 'system'));
	Router::connect('/lien-he', array('controller' => 'products', 'action' => 'contact'));
	Router::connect('/video-rau-huu-co', array('controller' => 'products', 'action' => 'video'));
	Router::connect('/:chi_tiet',array('controller'=>'products','action'=>'view'),array('pass'=>array('chi_tiet')));
	Router::connect('/danh-muc/*',array('controller'=>'categories','action'=>'view'));
	Router::connect('/tin-tuc/*', array('controller' => 'NewsPosts', 'action' => 'view'));
	Router::connect('/chit-tiet-don-hang/*', array('controller' => 'orders', 'action' => 'view_order'));
/**
 * ...and connect the rest of 'Pages' controller's URLs.
 */
	Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));

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
