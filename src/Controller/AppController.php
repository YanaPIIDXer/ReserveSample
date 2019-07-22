<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,
        ]);
        $this->loadComponent('Flash');

        if($this->request->getParam('prefix') === "admin")
        {
            $this->loadComponent('Auth',
            [
                'loginAction' =>
                [
                  'controller' => 'AdminAuth',
                  'action' => 'login',
                  'prefix' => 'admin',
                ],
                'loginRedirect' =>
                [
                    // @TODO:仮。
                    'controller' => 'Top',
                    'action' => 'index',
                    'prefix' => false,
                ],
                'logoutRedirect' =>
                [
                    'controller' => 'Top',
                    'action' => 'index',
                    'prefix' => false,
                ],
                'authenticate' =>
                [
                    'Form' =>
                    [
                        'userModel' => 'Admins',
                        'fields' => ['username' => 'user_id', 'password' => 'password']
                    ]
                ],
                'authError' => '不正なアクセスです。',
            ]);
        }
        else
        {
            $this->loadComponent('Auth',
            [
                'loginAction' =>
                [
                  'controller' => 'Auth',
                  'action' => 'login',  
                ],
                'loginRedirect' =>
                [
                    'controller' => 'UserTop',
                    'action' => 'index',
                ],
                'logoutRedirect' =>
                [
                    'controller' => 'Top',
                    'action' => 'index',
                ],
                'authenticate' =>
                [
                    'Form' =>
                    [
                        'userModel' => 'Users',
                        'fields' => ['username' => 'user_id', 'password' => 'password']
                    ]
                ],
                'authError' => 'ログインして下さい。',
            ]);        
        }

        /*
         * Enable the following component for recommended CakePHP security settings.
         * see https://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
    }
}
