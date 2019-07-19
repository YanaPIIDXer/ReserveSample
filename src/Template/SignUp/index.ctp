<?php echo $this->element('Header', ['PageTitle' => 'ユーザ登録']) ?>

<?= $this->Form->create($user, ['type' => 'post', 'url' => ['controller' => 'SignUp', 'action' => 'signup']]) ?>
    <fieldset>
        <?php
            echo $this->Form->control('user_id', ['type' => 'text','label' => 'ユーザＩＤ']);
            echo $this->Form->control('password', ['label' => 'パスワード']);
            echo $this->Form->control('name', ['label' => 'ユーザ名']);
            echo $this->Form->control('email', ['type' => 'email', 'label' => 'メールアドレス']);
            echo $this->Form->submit('登録');
        ?>
    </fieldset>
<?= $this->Form->end() ?>

<?php
    echo $this->Html->link("トップページに戻る",
    [
        'controller' => 'Top',
        'action' => 'index',
    ]);
?>
