<?php echo $this->element('Header', ['PageTitle' => 'イベント予約']) ?>

<?php
    echo $this->Html->link("戻る",
    [
        'controller' => 'EventCalendar',
        'action' => 'index',
    ]);
?>
