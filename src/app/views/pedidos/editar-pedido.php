<?php 
  $title = 'editar pedido';
  require dirname(dirname(__FILE__)) .'/templates/header.php';
  // var_dump($data);
?>

<h1>editar pedido</h1>

  <form method="post" action="/pedidos/update/<?=$data['codigo'] ?>" >

    <div class="form-group">
      <label> AFL </label>
      <input class="form-control" type="text" readonly value=<?=$data['codigo'] ?>>
    </div>


    <div class="form-group">
      <label >nome</label>
      <input class="form-control" type="text" name="nome" readonly value=<?=$data['nome'] ?>>
      <label >cpf</label>
      <input class="form-control" type="text" name="cpf" readonly value=<?=$data['cpf'] ?>>
      <label >rg</label>
      <input class="form-control" type="text" name="rg" readonly value=<?=$data['rg'] ?>>
    </div>

    <div class="form-group">
      <label>telefone</label>
      <input class="form-control" name="telefone" type="text"  value=<?=$data['telefone'] ?>>
    </div>

    
    <div class="form-group">
      <label >email</label>
      <input class="form-control" type="email" name="email"  value=<?=$data['email'] ?>>
    </div>

 

    
    
    <div class="form-group">
      <label>endereço cliente</label>
      <input class="form-control" name="endereco_cliente" type="text"  value=<?=$data['endereco_cliente'] ?>>
    </div>

    
    <div class="form-group">
      <label>cep cliente</label>
      <input class="form-control" name="cep_cliente" type="text"  value=<?=$data['cep_cliente'] ?>>
    </div>

    <div class="form-group">
      <label>endereço montagem</label>
      <input class="form-control" type="text" name="endereco_montagem"  value=<?=$data['endereco_montagem'] ?>>
    </div>

    <div class="form-group">
      <label>cep montagem</label>
      <input class="form-control" type="text" name="cep_montagem" value=<?=$data['cep_montagem'] ?> >
    </div>



  <div class="form-group">
      <label>Descriçao pedido</label>
      <textarea class="form-control" name="desc_pedido" rows="4" >
      <?= $data['descricao_pedido'] ?>
      </textarea>
    </div>


    <div class="form-group">
      <label>valor total</label>
      <input class="form-control" name="valor_total"   step="0.01" type="number" value=<?= $data['valor_total'] ?> >
    </div>

    
    <div class="form-group">
      <label>valor promob</label>
      <input class="form-control" name="valor_promob" step="0.01"  type="number" value=<?= $data['valor_promob'] ?>  >
    </div>

    <div class="form-group">
      <label>descrição pagamento</label>
      <textarea class="form-control" name="desc_pagamento" rows="2"   > <?= $data['descricao_pagamento'] ?> </textarea>
    </div>

    <div class="form-group">
      <select name="status" value=<?=$data['situacao'] ?>>
      <option value="1">venda</option>
      <option value="M">montagem</option>
      <option value="V">vistoria</option>
      <option value="F"> finalizado</option>
  </div>
  </select>
     <div class="form-group">
      <label>data inicio</label>
      <input class="form-control" name="data_inicio" type="date" value=<?=$data['inicio'] ?>>
    </div>

    <div class="form-group">
      <label> data fim</label>
      <input class="form-control" name="data_fim" type="date" value=<?=$data['fim'] ?>>
    </div> 
    <div class="form-group">
      <button>salvar</button>
    </div>
  </form>