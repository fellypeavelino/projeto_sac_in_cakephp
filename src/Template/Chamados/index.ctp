<!--<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Chamado'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Clientes'), ['controller' => 'Clientes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cliente'), ['controller' => 'Clientes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pedidos'), ['controller' => 'Pedidos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pedido'), ['controller' => 'Pedidos', 'action' => 'add']) ?></li>
    </ul>
</nav>-->
    <style type="text/css">
        .red{
            color:red;
            }
        .form-area
        {
            background-color: #FAFAFA;
            padding: 10px 40px 60px;
            margin: 10px 0px 60px;
            border: 1px solid GREY;
        }  
        .custab{
            border: 1px solid #ccc;
            padding: 5px;
            margin: 5% 0;
            box-shadow: 3px 3px 2px #ccc;
            transition: 0.5s;
        }
        .custab:hover{
            box-shadow: 3px 3px 0px transparent;
            transition: 0.5s;
        }   
        .typeahead li {
            width: 500px;
        }       
    </style>
    <h1>lista de Chamados</h1>
<div class="row">
    <div class="col-lg-6 col-md-offset-2 custyle">
        <table class="table table-striped custab">
            <thead>
                    <div class="input-group">
                      <input type="text" class="form-control typeahead" placeholder="emails" value="" aria-describedby="basic-addon2">
                      <span style="cursor:pointer;" class="input-group-addon" id="search">
                          <i class="glyphicon glyphicon-search"></i>
                      </span>
                    </div>
                    <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('clientes_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pedidos_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('titulo') ?></th>
                    </tr>
            </thead>
            <tbody>
                <?php foreach ($chamados as $chamado): ?>
                <tr>
                    <td><?= $this->Number->format($chamado->id) ?></td>
                    <td><?= $chamado->has('cliente') ? $this->Html->link($chamado->cliente->email, ['controller' => 'Clientes', 'action' => 'view', $chamado->cliente->id]) : '' ?></td>
                    <td><?= $chamado->has('pedido') ? $this->Html->link($chamado->pedido->numero, ['controller' => 'Pedidos', 'action' => 'view', $chamado->pedido->id]) : '' ?></td>
                    <td><?= h($chamado->titulo) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <dir class="col-lg-6">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
<script type="text/javascript">
    var array = [<? foreach ($chamados as $chamado) {echo "'".$chamado->cliente->email."',";}?>];
    $(function(){
        if (typeof array != "undefined") {
            doTypeHeader(array);
        } 
        $("#search").click(function(){
            window.location.href = "/chamados/index/"+$(".typeahead").val();
        });        
    });
    function doTypeHeader(array){
        $('.typeahead').typeahead({ source:array })
    } 
</script>


