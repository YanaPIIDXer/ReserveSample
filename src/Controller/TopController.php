<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

// トップページコントローラ
class TopController extends AppController
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

?>