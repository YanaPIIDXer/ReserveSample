<?php echo $this->element('Header', ['PageTitle' => '管理者ログイン']) ?>

<?= $this->Form->create() ?>
    <fieldset>
        <?php
            echo $this->Form->control('user_id', ['type' => 'text','label' => 'ユーザＩＤ']);
            echo $this->Form->control('password', ['label' => 'パスワード']);
            echo $this->Form->submit('ログイン');
        ?>
    </fieldset>
<?= $this->Form->end() ?>

<?php
    echo $this->Html->link("トップページに戻る",
    [
        'controller' => 'Top',
        'action' => 'index',
        'prefix' => false,
    ]);
?>
