<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

// イベント予約ページコントローラ
class EventReserveController extends AppController
{
    // 初期化
    public function initialize()
    {
        parent::initialize();
        $this->Events = TableRegistry::get('events');
    }
    
    // index
    public function index()
    {
        $Id = $this->request->getQuery('Id');
        if(!$Id)
        {
            $this->Flash->error("IDが不正です。");
            $this->redirect([
                'controller' => 'EventCalendar',
                'action' => 'index',
            ]);
            return;
        }
        
        $event = $this->Events->get($Id);
        $this->set(compact('event'));
    }
}
