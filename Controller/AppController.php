<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
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

	public $components = array(
		'DebugKit.Toolbar',//DebugKitをアクティブにした。2016-02-10
		'Flash',
		'Session',
		'Auth' => array(
			'loginRedirect' => array(
				'controller' => 'staffschedules',
				'action' => 'index'
			),
			'logoutRedirect' => array(
				'controller' => 'staffschedules',
				'action' => 'index'
			),
			'authenticate' => array(
				'Form' => array(
					'passwordHasher' => 'Blowfish'
				)
			)
		)
	);

	public function beforeFilter() {
		$this->Auth->allow(); 
		//全てのコントローラのindexとviewでログインを必要としない。

	}

}
