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
        'Auth' => array(
            'loginRedirect' => array(
                'controller' => 'index',
                'action'     => 'index'
            ),
            'logoutRedirect' => array(
                'controller' => 'index',
                'action'     => 'index'
            )
        ),
        'Session'
    );

    public $helpers = array('Html', 'Session');

    public function beforeFilter() {

        // Enable form-based authentication
        // $this->Auth->authenticate = array('Form');

        // Pass the current controller name to the view
        $this->set('controller', $this->params['controller']);

    }

    public function isAuthenticated() {

        // ...

    }

}
