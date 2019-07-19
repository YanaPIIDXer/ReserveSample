<?php
    print("トップページ<br />");

    echo $this->Html->link('ユーザ登録',[
        'controller' => 'SignUp',
        'action' => 'index',
    ]);
?>