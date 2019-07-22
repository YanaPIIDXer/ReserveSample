<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Event $event
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li><?= $this->Html->link(__('編集'), ['action' => 'edit', $event->id]) ?> </li>
        <li><?= $this->Form->postLink(__('消去'), ['action' => 'delete', $event->id], ['confirm' => __('Are you sure you want to delete # {0}?', $event->id)]) ?> </li>
        <li><?= $this->Html->link(__('イベントリスト'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('イベント追加'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="events view large-9 medium-8 columns content">
    <h3><?= h($event->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('イベント名') ?></th>
            <td><?= h($event->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('定員') ?></th>
            <td><?= $this->Number->format($event->capacity) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('日付') ?></th>
            <td><?= h($event->date) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('説明') ?></h4>
        <?= $this->Text->autoParagraph(h($event->description)); ?>
    </div>
    <?php
        echo $this->Html->link("戻る",
        [
            'controller' => 'Events',
            'action' => 'index',
        ]);
    ?>
</div>
