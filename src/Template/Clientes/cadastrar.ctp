
<div class="col-md-5">
    <div class="form-area">  
        <?= $this->Form->create($cliente,["class"=>"form-horizontal","role"=>"form"]) ?>
        <br style="clear:both">
                    <h3 style="margin-bottom: 25px; text-align: center;">Contact Form</h3>
    				<div class="form-group">
                        <?= $this->Form->input('nome',[
                        'label' => false, 
                        "placeholder" => "Nome",
                        "require" => "required",
                        "class" => "form-control"
                        ]);?>
					</div>
					<div class="form-group">
                        <?= $this->Form->input('email',[
                        'label' => false, 
                        "placeholder" => "E-mail",
                        "require" => "required",
                        "class" => "form-control"
                        ]);?>
					</div>
					<div class="form-group">
						<?= $this->Form->input('numero',[
                        'label' => false, 
                        'step' => 1,
                        "type" => "number",
                        "require" => "required",
                        "placeholder" => "Numero do Pedido",
                        "class" => "form-control"
                        ]);?>
					</div>
					<div class="form-group">
                        <?= $this->Form->input('titulo',[
                        'label' => false, 
                        "placeholder" => "Título",
                        "require" => "required",
                        "class" => "form-control"
                        ]);?>
					</div>
                    <div class="form-group">
                    <?= $this->Form->textarea('observacao',[
                        'label' => false, 
                        "placeholder" => "Observação",
                        "require" => "required",
                        "class" => "form-control"
                        ]); ?>                   
                    </div>
                        
                    <button type="submit" disabled=true id="submit" name="submit" class="btn btn-primary pull-right">Cadastrar</button>
        <?= $this->Form->end() ?>
    </div>
</div>
<script type="text/javascript">
    $(function(){
            $("#numero").keyup(function(){
                $.ajax({
                    url:"/pedidos/validAjax/"+$("#numero").val(),
                    type:"GET",
                    dataType:"JSON",
                    success:function(data){
                        if(data.success){
                            $(".error").remove();
                            $("#submit").attr("disabled",false);
                        }else{
                            if($(".error").length == 0){
                                var error = "<label class='error'>número do pedido não foi encontrado</label>";
                                $("form div").eq(5).append(error);
                                 $("#submit").attr("disabled",true);
                            }
                        }
                    }
                });
            });
            $("#email").blur(function(){
                $.ajax({
                    url:"/clientes/validAjax/"+$("#email").val(),
                    type:"GET",
                    dataType:"JSON",
                    success:function(data){
                        if(!data.success){
                            $(".error").remove();
                            $("#submit").attr("disabled",false);
                        }else{
                            if($(".error").length == 0){
                                var error = "<label class='error'>E-mail já foi cadastrado</label>";
                                $("form div").eq(3).append(error);
                                $("#submit").attr("disabled",true);
                            }
                        }
                    }
                })                
            });        
    })
</script>
