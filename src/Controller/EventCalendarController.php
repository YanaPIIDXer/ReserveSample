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
        $days = $this->getDaysOfMonth();

        $this->set('days', $days);
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
