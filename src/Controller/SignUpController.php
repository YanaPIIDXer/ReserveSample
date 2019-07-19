<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;

// 登録ページコントローラ
class SignUpController extends AppController
{
    // 初期化
    public function initialize()
    {
        parent::initialize();
        $this->Users = TableRegistry::get('users');
        $this->Auth->allow(['index', 'signup']);
    }
    
    // index
    public function index()
    {
        $user = $this->Users->newEntity();   

        $session = $this->request->getSession();
        $validationError = $session->read('ValidationError');
        if(!empty($validationError))
        {
            $user = $validationError;
            $session->delete('ValidationError');
        }
     
        $this->set(compact('user'), $user);
    }

    // signup
    public function signup()
    {
        if(!$this->request->is('post'))
        {
            $this->Flash->error("不正なアクセスです。");
            $this->redirect(['controller' => 'Top', 'action' => 'index']);
            return;
        }

        $user = $this->Users->newEntity();
        $user = $this->Users->patchEntity($user, $this->request->getData());

        if(!$this->Users->save($user))
        {
            $session = $this->request->getSession();
            $session->write('ValidationError', $user);
            $this->redirect(['action' => 'index']);
            return;
        }
        
        $this->Flash->success("登録しました。");
        $this->redirect(['controller' => 'Top', 'action' => 'index']);
    }
}
