<?php echo $this->element('Header', ['PageTitle' => '管理者ログイン']) ?>

<?php
    echo $this->Html->link("トップページに戻る",
    [
        'controller' => 'Top',
        'action' => 'index',
        'prefix' => false,
    ]);
?>
