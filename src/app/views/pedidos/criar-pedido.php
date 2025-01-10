<?php 
  $title = 'criar pedido';
  //require '\templates\header.php';
  require dirname(dirname(__FILE__)) .'/templates/header.php'
?>

<h1> cadastrar pedido</h1>

  <form method="post" action="/pedidos/add" >

    <div class="form-group">
      <label> AFL</label>
      <input class="form-control" name="codigo" type="text">
    </div>

    <div class="form-group">
      <label >nome</label>
      <input class="form-control" type="text" name="nome" >
    </div>

    <div class="form-group">
      <label >email</label>
      <input class="form-control" type="email" name="email" >
    </div>

    <div class="form-group">
      <label >data nascimento</label>
      <input class="form-control" type="date" name="data_nascimento" >
    </div>


    <div class="form-group">
      <label >cpf</label>
      <input class="form-control" type="text" name="cpf" >
    </div>

    <div class="form-group">
      <label >rg</label>
      <input class="form-control" type="text" name="rg" >
    </div>
    
    <div class="form-group">
      <label>endereço cliente</label>
      <input class="form-control" name="endereco_cliente" type="text" >
    </div>

    
    <div class="form-group">
      <label>cep cliente</label>
      <input class="form-control" name="cep_cliente" type="text" >
    </div>

    <div class="form-group">
      <label>endereço montagem</label>
      <input class="form-control" type="text" name="endereco_montagem" >
    </div>

    <div class="form-group">
      <label>cep montagem</label>
      <input class="form-control" type="text" name="cep_montagem" >
    </div>

    <div class="form-group">
      <label>telefone</label>
      <input class="form-control" name="telefone" type="text" >
  </div>

    <!-- <div class="form-group">
      <label>Ambientes</label>
      <input class="form-control" name="ambietes[]" type="checkbox" value='cozinha'>
      <input class="form-control" name="ambietes[]" type="checkbox" value='sala'>
      <input class="form-control" name="ambietes[]" type="checkbox" value='dormitorio casal'>
      <input class="form-control" name="ambietes[]" type="checkbox" value='cozinha dormitorio solteiro'>
      <input class="form-control" name="ambietes[]" type="checkbox" value='lavanderia'>
      <input class="form-control" name="ambietes[]" type="checkbox" value='closet'>
      <input class="form-control" name="ambietes[]" type="checkbox" value='varanda'>
    </div> -->



    <div class="form-group">
      <label>Descriçao pedido</label>
      <textarea class="form-control" name="desc_pedido" rows="4" ></textarea>
    </div>


    <div class="form-group">
      <label>valor total</label>
      <input class="form-control" name="valor_total"   step="0.01" type="number" >
    </div>

    
    <div class="form-group">
      <label>valor promob</label>
      <input class="form-control" name="valor_promob" step="0.01"  type="number" >
    </div>

    <div class="form-group">
      <label>descrição pagamento</label>
      <textarea class="form-control" name="desc_pagamento" rows="2"   ></textarea>
    </div>

    <div class="form-group">
      <button  >cadastrar</button>
    </div>
</form>