<?php 
  $title = 'editar pedido';
  //require '\templates\header.php';
  require dirname(dirname(__FILE__)) .'/templates/header.php';
  var_dump($data);
?>

<h1>editar pedido</h1>

  <form method="post" action="/pedidos/update/<?=$data['codigo'] ?>" >

    <div class="form-group">
      <label> AFL <?=$data['codigo'] ?></label>
    </div>


    <div class="form-group">
      <label >nome</label>
      <input class="form-control" type="text" name="nome"  value=<?=$data['nome'] ?>>
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
      <label>telefone</label>
      <input class="form-control" name="telefone" type="text"  value=<?=$data['telefone'] ?>>
  </div>



    <div class="form-group">
      <label>valor</label>
      <input class="form-control" name="valor" type="text"  value=<?=$data['valor'] ?>>
    </div>

  
    <select name="status" value=<?=$data['situacao'] ?>>
    <option value="M">montagem</option>
    <option value="V">vistoria</option>
    <option value="F"> finalizado</option>
  </select>

    <div class="form-group">
      <label>montador</label>
      <input class="form-control" type="text" name="montador" value=<?=$data['montador'] ?> >
    </div>

    


    

    
 

    <div class="form-group">
      <label>data inicio</label>
      <input class="form-control" name="data-inicio" type="text" value=<?=$data['inicio'] ?>>
    </div>

    <div class="form-group">
      <label> data fim</label>
      <input class="form-control" name="data-fim" type="text" value=<?=$data['fim'] ?>>
    </div>

    <button  >editar</button>
      
  </form>