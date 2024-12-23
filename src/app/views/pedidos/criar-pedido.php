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



    <div class="form-group">
      <label>valor</label>
      <input class="form-control" name="valor" type="text" >
    </div>

  
    <select name="status">
    <option value="M">montagem</option>
    <option value="V">vistoria</option>
    <option value="F"> finalizado</option>
  </select>

    <div class="form-group">
      <label>montador</label>
      <input class="form-control" type="text" name="montador" >
    </div>

    


    

    
 

    <div class="form-group">
      <label>data inicio</label>
      <input class="form-control" name="data-inicio" type="text" >
    </div>

    <div class="form-group">
      <label> data fim</label>
      <input class="form-control" name="data-fim" type="text">
    </div>

    <button  >cadastrar</button>
      
  </form>