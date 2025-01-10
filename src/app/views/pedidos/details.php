<?php 
  $title = 'detalhe pedido';
  //require '\templates\header.php';
  require dirname(dirname(__FILE__)) .'/templates/header.php';
  require dirname(dirname(__FILE__)) .'/templates/utils.php';
?>



<div class="container mw-75 ">
<div class="row">
     <div class="col-sm border-dark border">
         <h2> DADOS CLIENTE</h2>
    </div> 
  </div>
  <div class="row">
    <div class="col-8 border-dark border">
      <b>Cliente:</b> <?= $data['nome'] ?>
    </div>
    <div class="col-sm border-dark border">
    <b> Pedido: </b><?= $data['codigo'] ?>
    </div>
  </div>

  <div class="row">
    <div class="col-8 border-dark border">
    <b>Email:</b> <?= $data['email'] ?>
    </div>
    <div class="col-sm border-dark border">
    <b>Data de Nascimento:</b>  <?= $data['email'] ?>
    </div>
  </div>

  <div class="row">
    <div class="col border-dark border">
    <b>Endereco:</b> <?= $data['endereco_cliente'] ?>
    </div>
    <!-- <div class="col-sm border-dark border">
      Complemento
    </div> -->
  </div>

  <div class="row">
    <!-- <div class="col-sm border-dark border">
      Bairro
    </div> -->
    <div class="col-sm border-dark border">
    <b>CEP:</b> <?= $data['cep_cliente'] ?>
    </div>
    <div class="col-sm border-dark border">
    <b> Telefone:</b> <?= $data['telefone'] ?>
    </div>
  </div>

  <div class="row">
    <div class="col-sm border-dark border">
    <b>RG:</b> <?= $data['rg'] ?>
    </div>
    <div class="col-sm border-dark border">
    <b>CPF:</b> <?= $data['cpf'] ?>
    </div>
    <div class="col-sm border-dark border">
    <b>Vendedor:</b>   <?= $data['vendedor'] ?>
    </div>
  </div>
  <div class="row">
     <div class="col-sm border-dark border">
         <h2> DESCRIÇÃO DO PEDIDO</h2>
    </div> 
  </div>
  
  <div class="row">
  
    <div class="col-sm border-dark border">
    <b>CEP Montagem: </b><?= $data['cep_montagem'] ?>
    </div>
    <div class="col-sm border-dark border">
    <b>Endereco Montagem:</b> <?= $data['endereco_montagem'] ?>
    </div>
  </div>

  
  <div class="row">
        <textarea readonly class="w-100" rows="10" >
        <?= $data['descricao_pedido'] ?>   
        </textarea>
  </div>

  <div class="row">
     <div class="col-sm border-dark border">
     <b>VALOR TOTAL:</b> <?= $data['valor_total'] ?> 
    </div> 
    <div class="col-sm border-dark border">
    <b>VALOR PROMOB:</b> <?= $data['valor_promob'] ?> 
    </div> 
  </div>

  <div class="row">
     <div class="col-sm border-dark border">
         <h2>FORMA DE PAGAMENTO</h2>
    </div> 
  </div>

    
  <div class="row">
        <textarea readonly class="w-100" rows="3" >
        <?= $data['descricao_pedido']?> 
        </textarea>
  </div>


    
<div class="d-flex p-2 justify-content-between">
<a href="/pedidos">  
  <button>
    pedidos
  </button>
</a>

<a href="/pedidos/editar/<?= $data['codigo'] ?>">  
  <button>
    editar
  </button>
</a>


</div>      







