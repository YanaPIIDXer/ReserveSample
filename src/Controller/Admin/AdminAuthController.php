<?php

namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;

// 管理者認証コントローラ
class AdminAuthController extends AppController
{
    // 初期化
    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['login']);
    }

    // index
    public function login()
    {
        if(!$this->request->is('post')) { return; }

        $admin = $this->Auth->identify();
        if(!$admin)
        {
            $this->Flash->error("ログインに失敗しました。");
            $this->redirect(['controller' => 'AdminAuth', 'action' => 'login']);
            return;
        }

        $this->Auth->setUser($admin);
        
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
