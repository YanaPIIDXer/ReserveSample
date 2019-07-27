<?php echo $this->element('Header', ['PageTitle' => 'イベント予約']) ?>

<?= $this->Html->css('EventReserve.css') ?>

<div class="EventName">
    イベント名：<?= $event->name ?>
</div>

<div class="EventDescription">
    <?= $event->description ?><br />
</div>
<br />

<?php
    echo $this->Html->link("戻る",
    [
        'controller' => 'EventCalendar',
        'action' => 'index',
    ]);
?>
