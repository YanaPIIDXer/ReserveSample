<?php echo $this->element('Header', ['PageTitle' => 'ユーザ登録']) ?>

<?php
    echo $this->Html->link("トップページに戻る",
    [
        'controller' => 'Top',
        'action' => 'index',
    ]);
?>
