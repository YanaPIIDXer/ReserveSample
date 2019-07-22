<?php echo $this->element('Header', ['PageTitle' => '予約システム 管理者ページ']) ?>

<?php
    echo $this->Html->link("イベント編集",
    [
        'controller' => 'Events',
        'action' => 'index',
    ]);
    echo "<br />\n";
    echo $this->Html->link("ログアウト",
    [
        'controller' => 'AdminAuth',
        'action' => 'logout',
    ]);
?>
