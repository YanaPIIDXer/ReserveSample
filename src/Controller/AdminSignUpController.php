<?php
namespace App\Controller;

use App\Controller\AppController;

// 管理者ログインページ
class AdminSignUpController extends AppController
{
    // 初期化
    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['index']);
    }

    // index
    public function index()
    {
    }
}
