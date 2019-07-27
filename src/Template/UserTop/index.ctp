<?php echo $this->element('Header', ['PageTitle' => '予約システム ユーザページ']) ?>

<h3>ようこそ　<?= $name ?>さん。</h3><br />

<?php
    echo $this->Html->link("イベントカレンダー",
    [
        'controller' => 'EventCalendar',
        'action' => 'index',
    ]);
    echo "<br />\n";
    echo $this->Html->link("ログアウト",
    [
        'controller' => 'Auth',
        'action' => 'logout',
    ]);
?>
