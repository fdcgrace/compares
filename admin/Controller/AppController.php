<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
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
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

	public $gender;
	public $speak_japanese;
	public $evaluation;
	public $role;
	public $path;
	public $sitePath;
	public $retrieveSite;

	public $components = array(
	    'DebugKit.Toolbar',
	    'Session',
	    'Auth' => array(
	        'loginRedirect' => array('controller' => 'users', 'action' => 'index'),
	        //'loginRedirect' => array('action' => 'index'),
	        'logoutRedirect' => array('controller' => 'users', 'action' => 'login'),
	        'authError' => 'You must be logged in to view this page.',
	        'loginError' => 'Invalid Username or Password entered, please try again.',
	        'authorize' => array('Controller') // Added this line
	    ));
	 
	// only allow the login controllers only
	public function beforeFilter() {
		$this->Auth->authorize = 'Controller';
	    $this->Auth->allow('login');
	    $this->set('loggedIn', $this->Auth->loggedIn());
		$this->set('currUser', $this->Auth->user());

	    $this->gender = array('0' => 'Male', '1' => 'Female');
	    $this->speak_japanese = array('0' => 'Yes', '1' => 'No');
	    $this->evaluation = array('0' => 'Good', '1' => 'Bad');
	    $this->role = array( '0' => 'Admin', '1' => 'User');
	    $this->sitePath = "../../app/webroot/img/sites/";
	    $this->sitePathThumb = "../../app/webroot/img/sites/thumbnail/";
	    /*$this->retrieveSite = "/app/webroot/img/sites/";
	    $this->retrieveSiteThumb = "/app/webroot/img/sites/thumbnail/";*/
	    $this->retrieveSite = "/app/webroot/img/sites/";
	    $this->retrieveSiteThumb = "/app/webroot/img/sites/thumbnail/";
	    $this->set('sitePath', $this->sitePath);
	    $this->set('sitePathThumb', $this->sitePathThumb);
	    $this->set('retrieveSite', $this->retrieveSite);
	    $this->set('retrieveSiteThumb', $this->retrieveSiteThumb);

	    //$this->retrieveSite = "http://localhost/comparison-DEV/app/webroot/img/sites/";
	    //$this->retrieveSite = "http://".compare.fdc-inc.com/app/webroot/img/sites/";

		/*Configure Path*/
	    App::build(array(
	      'Model'=>array(CAKE_CORE_INCLUDE_PATH.'/Model/Base/',CAKE_CORE_INCLUDE_PATH.'/Model/',APP_DIR.'/Model/',CAKE_CORE_INCLUDE_PATH.'/Model/Form/'),
	      //'Lib'=>array(CAKE_CORE_INCLUDE_PATH.'/Lib/'),
	      //'Vendor'=>array(CAKE_CORE_INCLUDE_PATH.'/Vendor/')
	    ));
	    
	    /*Autoload Model*/
	    App::import('Model',array('CommonTable'));
	    
	    /*Autoload Lib*/
	    App::uses('myTools','Lib');
	    App::uses('myMailer','Lib');
	    App::uses('myError','Lib');
	    
	    /*Autoload table class*/
	    spl_autoload_register(function($class){
	      $classFile1 = CAKE_CORE_INCLUDE_PATH.'/Model/'.$class.'.php';
	      $classFile2 = CAKE_CORE_INCLUDE_PATH.'/Model/Form/'.$class.'.php';
	      if(is_file($classFile1)){ require_once($classFile1); }
	      if(is_file($classFile2)){ require_once($classFile2); }
	    });

	}
	 
	public function isAuthorized($user) {
 		// Admin can access every action
		/*if (isset($user['role']) && $user['role'] === 0) {
        	return true;
     	}*/
     	 // Default deny
		return true;
	}
}
