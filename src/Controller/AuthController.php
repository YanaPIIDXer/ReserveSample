<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

// 認証コントローラ
class AuthController extends AppController
{
    // 初期化
    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['login']);
    }

    // login
    public function login()
    {
        if($this->Auth->user() != null)
        {
            $this->redirect($this->Auth->redirectUrl());
            return;
        }
        
        if(!$this->request->is('post')) { return; }

        $user = $this->Auth->identify();
        if(!$user)
        {
            $this->Flash->error("ログインに失敗しました。");
            $this->redirect(['controller' => 'Auth', 'action' => 'login']);
            return;
        }

        $this->Auth->setUser($user);
        
        $this->Flash->success("ログインしました。");
        $this->redirect($this->Auth->redirectUrl());
    }

    // logout
    public function logout()
    {
        $this->Flash->success("ログアウトしました。");
        $this->redirect($this->Auth->logout());
    }
}

?>