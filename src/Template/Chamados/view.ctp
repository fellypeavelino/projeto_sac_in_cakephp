<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Chamado'), ['action' => 'edit', $chamado->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Chamado'), ['action' => 'delete', $chamado->id], ['confirm' => __('Are you sure you want to delete # {0}?', $chamado->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Chamados'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Chamado'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Clientes'), ['controller' => 'Clientes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cliente'), ['controller' => 'Clientes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pedidos'), ['controller' => 'Pedidos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pedido'), ['controller' => 'Pedidos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="chamados view large-9 medium-8 columns content">
    <h3><?= h($chamado->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Cliente') ?></th>
            <td><?= $chamado->has('cliente') ? $this->Html->link($chamado->cliente->id, ['controller' => 'Clientes', 'action' => 'view', $chamado->cliente->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pedido') ?></th>
            <td><?= $chamado->has('pedido') ? $this->Html->link($chamado->pedido->id, ['controller' => 'Pedidos', 'action' => 'view', $chamado->pedido->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Titulo') ?></th>
            <td><?= h($chamado->titulo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($chamado->id) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Observacao') ?></h4>
        <?= $this->Text->autoParagraph(h($chamado->observacao)); ?>
    </div>
</div>
