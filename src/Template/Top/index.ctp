<?php echo $this->element('Header', ['PageTitle' => '予約システム サンプル']) ?>

<?php
    echo $this->Html->link("ログイン",
    [
        'controller' => 'Auth',
        'action' => 'login',
    ]);

    echo "<br />";

    echo $this->Html->link("ユーザ登録",
    [
        'controller' => 'SignUp',
        'action' => 'index',
    ]);
?>

<hr />
<div class="TopFooter">
    <?php
        echo $this->Html->css('Top.css');
        echo $this->Html->link("管理者ログイン",
        [
            'controller' => 'AdminSignUp',
            'action' => 'index',
        ]);
    ?>
<hr />
</div>
