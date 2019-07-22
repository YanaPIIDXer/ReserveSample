<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Event $event
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li><?= $this->Html->link(__('イベントリスト'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="events form large-9 medium-8 columns content">
    <?= $this->Form->create($event) ?>
    <fieldset>
        <legend><?= __('イベント追加') ?></legend>
        <?php
            echo $this->Form->control('name', ['label' => "イベント名"]);
            echo $this->Form->control('description', ['label' => "説明"]);
            echo $this->Form->control('capacity', ['label' => "定員"]);
            echo $this->Form->control('date', ['label' => "日時"]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('追加')) ?>
    <?= $this->Form->end() ?>
    <?php
        echo $this->Html->link("戻る",
        [
            'controller' => 'Events',
            'action' => 'index',
        ]);
    ?>
</div>
<br />
