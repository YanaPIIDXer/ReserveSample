<?php echo $this->element('Header', ['PageTitle' => 'イベントカレンダー']) ?>

<div class="Previous">
    <?php
        echo $this->Html->link($days[0]->addMonth(-1)->format('Y年n月'),
        [
            'controller' => 'EventCalendar',
            'action' => 'index',
            'offset' => $offset - 1,
        ]);
    ?>
</div>

<h2><?= $days[0]->format('Y年n月') ?></h2>

<div class="Next">
    <?php
        echo $this->Html->link($days[0]->addMonth(1)->format('Y年n月'),
        [
            'controller' => 'EventCalendar',
            'action' => 'index',
            'offset' => $offset + 1,
        ]);
    ?>
</div>

<br />

<table border="1" class="EventCalendar">
<thead>
    <?=$this->Html->tableHeaders(['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'])?>
</thead>

<?php
    foreach($days as $day)
    {
        if($day->day === $day->startOfMonth() || $day->dayOfWeek === 7)
        {
            echo "<tr>\n";
        }

        if($day->day === 1 && $day->dayOfWeek !== 7)
        {
            for($i = 0; $i < $day->dayOfWeek; $i++)
            {
                echo "<td></td>\n";
            }
        }

        $str = $day->format('n/j');
        $query = $events->find();
        $event = $query->where(['date' => $day])->first();
        if($event != null)
        {
            $str .= "<br />" . $event->name;
        }

        echo "<td>" . $str . "</td>\n";

        if($day->dayOfWeek === 0)
        {
            echo "</tr>\n";
        }
    }
?>
</table>

<?php
    echo $this->Html->link("戻る",
    [
        'controller' => 'UserTop',
        'action' => 'index',
    ]);
?>
