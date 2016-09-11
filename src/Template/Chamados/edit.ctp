<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $chamado->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $chamado->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Chamados'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Clientes'), ['controller' => 'Clientes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cliente'), ['controller' => 'Clientes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pedidos'), ['controller' => 'Pedidos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pedido'), ['controller' => 'Pedidos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="chamados form large-9 medium-8 columns content">
    <?= $this->Form->create($chamado) ?>
    <fieldset>
        <legend><?= __('Edit Chamado') ?></legend>
        <?php
            echo $this->Form->input('clientes_id', ['options' => $clientes, 'empty' => true]);
            echo $this->Form->input('pedidos_id', ['options' => $pedidos, 'empty' => true]);
            echo $this->Form->input('titulo');
            echo $this->Form->input('observacao');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
