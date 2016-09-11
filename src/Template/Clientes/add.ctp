<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Clientes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Chamados'), ['controller' => 'Chamados', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Chamado'), ['controller' => 'Chamados', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="clientes form large-9 medium-8 columns content">
    <?= $this->Form->create($cliente) ?>
    <fieldset>
        <legend><?= __('Add Cliente') ?></legend>
        <?php
            echo $this->Form->input('nome');
            echo $this->Form->input('email');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
