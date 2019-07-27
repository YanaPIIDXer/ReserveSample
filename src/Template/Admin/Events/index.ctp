<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Event[]|\Cake\Collection\CollectionInterface $events
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li><?= $this->Html->link(__('イベントを追加'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="events index large-9 medium-8 columns content">
    <h3><?= __('イベント') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('name', ['label' => 'イベント名']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('capacity', ['label' => '定員']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('date', ['label' => '日付']) ?></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($events as $event): ?>
            <tr>
                <td><?= h($event->name) ?></td>
                <td><?= $this->Number->format($event->capacity) ?></td>
                <td><?= h($event->date) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('詳細'), ['action' => 'view', $event->id]) ?>
                    <?= $this->Html->link(__('編集'), ['action' => 'edit', $event->id]) ?>
                    <?= $this->Form->postLink(__('消去'), ['action' => 'delete', $event->id], ['confirm' => __('本当に{0}を消去しますか？?', $event->name)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('最初')) ?>
            <?= $this->Paginator->prev('< ' . __('前')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('次') . ' >') ?>
            <?= $this->Paginator->last(__('最後') . ' >>') ?>
        </ul>
    </div>
    <?php
        echo $this->Html->link("トップページに戻る",
        [
            'controller' => 'AdminTop',
            'action' => 'index',
        ]);
    ?>
</div>
