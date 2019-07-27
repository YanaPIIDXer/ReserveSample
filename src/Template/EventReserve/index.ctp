<?php echo $this->element('Header', ['PageTitle' => 'イベント予約']) ?>

<?= $this->Html->css('EventReserve.css') ?>

<div class="EventName">
    イベント名：<?= $event->name ?>
</div>

<div class="EventDescription">
    <?= $event->description ?><br />
</div>
<br />

<div class="Reserve">
<?php
    if(!$event->date->isPast())
    {
        if(!$isReserved)
        {
            if(!$isFull)
            {
                echo $this->Html->link("予約する。",
                [
                    'controller' => 'EventReserve',
                    'action' => 'reserve',
                    'Id' => $Id,
                ]);
            }
            else
            {
                echo '<div class="IsFull">定員を満たしているため予約できません。</div>';
            }
        }
        else
        {
            echo $this->Html->link("予約を取り消す。",
            [
                'controller' => 'EventReserve',
                'action' => 'cancel',
                'Id' => $Id,
            ]);
    
        }    
    }
    else
    {
        echo '<div class="IsFinished">このイベントは終了しています。</div>';
    }
?>
</div>
<br />

<?php
    echo $this->Html->link("戻る",
    [
        'controller' => 'EventCalendar',
        'action' => 'index',
    ]);
?>
