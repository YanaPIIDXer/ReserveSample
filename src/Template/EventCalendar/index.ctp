<?php echo $this->element('Header', ['PageTitle' => 'イベントカレンダー']) ?>

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

        echo "<td>" . $day->format('n/j') . "</td>\n";

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
