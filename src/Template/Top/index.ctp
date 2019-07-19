<?php echo $this->element('Header', ['PageTitle' => '予約システム サンプル']) ?>

<?php
    echo $this->Html->link("ユーザ登録",
    [
        'controller' => 'SignUp',
        'action' => 'index',
    ]);
?>
