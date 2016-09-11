<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $pedido->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $pedido->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Pedidos'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="pedidos form large-9 medium-8 columns content">
    <?= $this->Form->create($pedido) ?>
    <fieldset>
        <legend><?= __('Edit Pedido') ?></legend>
        <?php
            echo $this->Form->input('numero');
            echo $this->Form->input('descricao');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
