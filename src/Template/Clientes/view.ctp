<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Cliente'), ['action' => 'edit', $cliente->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Cliente'), ['action' => 'delete', $cliente->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cliente->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Clientes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cliente'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Chamados'), ['controller' => 'Chamados', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Chamado'), ['controller' => 'Chamados', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="clientes view large-9 medium-8 columns content">
    <h3><?= h($cliente->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nome') ?></th>
            <td><?= h($cliente->nome) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($cliente->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($cliente->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Chamados') ?></h4>
        <?php if (!empty($cliente->chamados)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Cliente Id') ?></th>
                <th scope="col"><?= __('Pedidos Id') ?></th>
                <th scope="col"><?= __('Titulo') ?></th>
                <th scope="col"><?= __('Observacao') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($cliente->chamados as $chamados): ?>
            <tr>
                <td><?= h($chamados->id) ?></td>
                <td><?= h($chamados->cliente_id) ?></td>
                <td><?= h($chamados->pedidos_id) ?></td>
                <td><?= h($chamados->titulo) ?></td>
                <td><?= h($chamados->observacao) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Chamados', 'action' => 'view', $chamados->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Chamados', 'action' => 'edit', $chamados->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Chamados', 'action' => 'delete', $chamados->id], ['confirm' => __('Are you sure you want to delete # {0}?', $chamados->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
