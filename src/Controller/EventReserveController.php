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
        $this->EventReserves = TableRegistry::get('event_reserves');
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
        if($event == null)
        {
            $this->Flash->error("IDが不正です。");
            $this->redirect([
                'controller' => 'EventCalendar',
                'action' => 'index',
            ]);
            return;
        }
        
        $reserves = $this->EventReserves->find()->where(['event_id' => $Id]);
        $isFull = ($reserves->count() >= $event->capacity);
        $isReserved = ($reserves->where(['user_id' => $this->Auth->user('id')])->first() != null);
        
        $this->set(compact('Id'));
        $this->set(compact('event'));
        $this->set(compact('isReserved'));
        $this->set(compact('isFull'));
    }

    public function reserve()
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

        $reserve = $this->EventReserves->newEntity(['event_id' => $Id, 'user_id' => $this->Auth->user('id')]);
        if(!$this->EventReserves->save($reserve))
        {
            $this->Flash->error("予約に失敗しました。");
            $this->redirect([
                'controller' => 'EventReserve',
                'action' => 'index',
                'Id' => $Id,
            ]);
            return;
        }
        
        $this->Flash->success("予約しました。");
        $this->redirect([
            'controller' => 'EventReserve',
            'action' => 'index',
            'Id' => $Id,
        ]);
    }

    public function cancel()
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

        $reserve = $this->EventReserves->find()->where(['event_id' => $Id, 'user_id' => $this->Auth->user('id')])->first();        
        if($reserve == null || !$this->EventReserves->delete($reserve))
        {
            $this->Flash->error("予約のキャンセルに失敗しました。");
            $this->redirect([
                'controller' => 'EventReserve',
                'action' => 'index',
                'Id' => $Id,
            ]);
            return;
        }
        
        $this->Flash->success("予約をキャンセルしました。");
        $this->redirect([
            'controller' => 'EventReserve',
            'action' => 'index',
            'Id' => $Id,
        ]);
    }
}
