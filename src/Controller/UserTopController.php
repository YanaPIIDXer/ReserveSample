<?php
namespace App\Controller;

use App\Controller\AppController;

// ユーザトップページコントローラクラス
class UserTopController extends AppController
{
    // index
    public function index()
    {
        $name = $this->Auth->user('name');
        $this->set('name', $name);
    }
}
