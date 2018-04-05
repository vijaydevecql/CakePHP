<?php

/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
  /*admin routes define */

Router::connect('/', array('controller' => 'homes', 'action' => 'index'));
Router::connect('/about', array('controller' => 'abouts', 'action' => 'index'));
//Router::connect('/collection', array('controller' => 'collections', 'action' => 'collection'));
Router::connect('/collection/:id', array('controller' => 'collections', 'action' => 'collection'),array('pass' => array('id')));

Router::connect('/viewCart', array('controller' => 'collections', 'action' => 'view_cart'));

Router::connect('/admin', array('controller' => 'admins', 'action' => 'dashboard', 'admin' => true));
Router::connect('/admin/login', array('controller' => 'admins', 'action' => 'login', 'admin' => true));
Router::connect('/admin/dashboard', array('controller' => 'admins', 'action' => 'dashboard', 'admin' => true));
Router::connect('/admin/logout', array('controller' => 'admins', 'action' => 'logout', 'admin' => true));
Router::connect('/delete', array('controller' => 'App', 'action' => 'delete'));
Router::connect('/admin/profile', array('controller' => 'admins', 'action' => 'profile', 'admin' => true));
Router::connect('/admin/profile_edit/:id', array('controller' => 'admins', 'action' => 'profile_edit', 'admin' => true),array('pass' => array('id')));
Router::connect('/admin/CMS', array('controller' => 'Contents', 'action' => 'allcontent', 'admin' => true));
Router::connect('/admin/email_templates', array('controller' => 'email_templates', 'action' => 'index', 'admin' => true));

Router::connect('/admin/setting', array('controller' => 'settings', 'action' => 'ui_xedit', 'admin' => true));
Router::connect('/admin/change_password', array('controller' => 'admins', 'action' => 'change_password', 'admin' => true));
Router::connect('/admin/colors', array('controller' => 'ProductAttributes', 'action' => 'colors', 'admin' => true));
Router::connect('/admin/colors/color_add', array('controller' => 'ProductAttributes', 'action' => 'color_add', 'admin' => true));
Router::connect('/admin/colors/color_edit/:id', array('controller' => 'ProductAttributes', 'action' => 'color_edit', 'admin' => true),array('pass' => array('id')));
Router::connect('/admin/colors/color_view/:id', array('controller' => 'ProductAttributes', 'action' => 'color_view', 'admin' => true),array('pass' => array('id')));
Router::connect('/admin/colors/update_status/:id', array('controller' => 'ProductAttributes', 'action' => 'update_status', 'admin' => true),array('pass' => array('id')));
Router::connect('/admin/brands/update_status/:id', array('controller' => 'ProductAttributes', 'action' => 'update_status', 'brand' => true),array('pass' => array('id')));

Router::connect('/admin/brands', array('controller' => 'ProductAttributes', 'action' => 'brands', 'admin' => true));
Router::connect('/admin/brands/brand_add', array('controller' => 'ProductAttributes', 'action' => 'brand_add', 'admin' => true));
Router::connect('/admin/brands/brand_view/:id', array('controller' => 'ProductAttributes', 'action' => 'brand_view', 'admin' => true),array('pass' => array('id')));
Router::connect('/admin/brands/brand_edit/:id', array('controller' => 'ProductAttributes', 'action' => 'brand_edit', 'admin' => true),array('pass' => array('id')));

Router::connect('/admin/weaves', array('controller' => 'ProductAttributes', 'action' => 'weaves', 'admin' => true));
Router::connect('/admin/weaves/weave_add', array('controller' => 'ProductAttributes', 'action' => 'weave_add', 'admin' => true));
Router::connect('/admin/weaves/update_status/:id', array('controller' => 'ProductAttributes', 'action' => 'update_status', 'weave' => true),array('pass' => array('id')));
Router::connect('/admin/weaves/weave_view/:id', array('controller' => 'ProductAttributes', 'action' => 'weave_view', 'admin' => true),array('pass' => array('id')));
Router::connect('/admin/weaves/weave_edit/:id', array('controller' => 'ProductAttributes', 'action' => 'weave_edit', 'admin' => true),array('pass' => array('id')));

Router::connect('/admin/patterns', array('controller' => 'ProductAttributes', 'action' => 'patterns', 'admin' => true));
Router::connect('/admin/patterns/pattern_add', array('controller' => 'ProductAttributes', 'action' => 'pattern_add', 'admin' => true));
Router::connect('/admin/patterns/update_status/:id', array('controller' => 'ProductAttributes', 'action' => 'update_status', 'pattern' => true),array('pass' => array('id')));
Router::connect('/admin/patterns/pattern_view/:id', array('controller' => 'ProductAttributes', 'action' => 'pattern_view', 'admin' => true),array('pass' => array('id')));
Router::connect('/admin/patterns/pattern_edit/:id', array('controller' => 'ProductAttributes', 'action' => 'pattern_edit', 'admin' => true),array('pass' => array('id')));

Router::connect('/admin/abouts', array('controller' => 'contents', 'action' => 'about', 'admin' => true));
Router::connect('/admin/abouts/add', array('controller' => 'contents', 'action' => 'add', 'about' => true));
Router::connect('/admin/abouts/edit/:id', array('controller' => 'contents', 'action' => 'edit', 'about' => true),array('pass' => array('id')));
Router::connect('/admin/abouts/update_status/:id', array('controller' => 'contents', 'action' => 'update_status', 'about' => true),array('pass' => array('id')));
Router::connect('/admin/abouts/delete/:id', array('controller' => 'contents', 'action' => 'delete', 'about' => true),array('pass' => array('id')));




Router::connect('/sign_up', array('controller' => 'users', 'action' => 'sign_up'));
Router::connect('/login', array('controller' => 'users', 'action' => 'sign_in'));
Router::connect('/logout', array('controller' => 'users', 'action' => 'logout'));
Router::connect('/account', array('controller' => 'users', 'action' => 'account'));
Router::connect('/my_order', array('controller' => 'users', 'action' => 'my_order'));
Router::connect('/address', array('controller' => 'collections', 'action' => 'addresses'));
Router::connect('/sequrity', array('controller' => 'users', 'action' => 'sequrity'));
Router::connect('/payment_method/:id', array('controller' => 'collections', 'action' => 'payment_method'),array('pass' => array('id')));
Router::connect('/payment/:id', array('controller' => 'collections', 'action' => 'payment'),array('pass' => array('id')));
Router::connect('/edit_payment_option/:id', array('controller' => 'users', 'action' => 'edit_payment_option'),array('pass' => array('id')));
Router::connect('/product_details/:id/:varient_id', array('controller' => 'collections', 'action' => 'product_details'),array('pass' => array('id','varient_id')));

Router::connect('/my_address', array('controller' => 'users', 'action' => 'my_address'));
Router::connect('/my_payment_option', array('controller' => 'users', 'action' => 'my_payment_option'));
Router::connect('/contact', array('controller' => 'homes', 'action' => 'contact'));
Router::connect('/faqs', array('controller' => 'homes', 'action' => 'terms'));
Router::connect('/PrivacyPolicy', array('controller' => 'homes', 'action' => 'privacy_policy'));


Router::connect('/remove_coupon', array('controller' => 'collections', 'action' => 'remove_coupon'));








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
