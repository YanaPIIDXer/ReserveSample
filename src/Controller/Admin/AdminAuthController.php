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
        $this->Admins = TableRegistry::get('admins');
    }

    // index
    public function login()
    {
        if(!$this->request->is('post')) { return; }
    }
}
