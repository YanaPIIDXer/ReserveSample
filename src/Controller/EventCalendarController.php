<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Chronos\Chronos;

// イベントカレンダー
class EventCalendarController extends AppController
{
    // index
    public function index()
    {
        $offset = 0;
        if($this->request->getQuery('offset'))
        {
            $offset = $this->request->getQuery('offset');
        }

        if($offset !== 0 && !preg_match('/^[-][1-9]+[0-9]*$|^[1-9]+[0-9]*$/', $offset))
        {
            return $this->redirect(
                [
                    'controller' => 'EventCalendar',
                    'action' => 'index',
                ]);
        }

        $days = $this->getDaysOfMonth($offset);

        $this->set('days', $days);
        $this->set('offset', $offset);
    }

    // 指定した月の日付を取得。
    private function getDaysOfMonth($addMonth = 0)
    {
        $daysOfMonth = [];
        $time = Chronos::now()->startOfMonth();
        if ($addMonth !== 0) {
            $time = $time->addMonths($addMonth);
        }
        $start = $time->startOfMonth()->day;
        $end = $time->endOfMonth()->day;
    
        for($i = $start; $start <= $end; $start++) {
            $daysOfMonth[] = $time;
            $time = $time->addDay();
        }
        return $daysOfMonth;
    }
}
