
<?php 
  $title = 'consultar pedido';
  //require '\templates\header.php';
  require dirname(dirname(__FILE__)) .'/templates/header.php'
?>


<div class="container">
    
    <h1>informacoes pedido</h1>

    <br>
    <form action="/montador/consultar" class="border border-light rounded p-4" method="get">
        <div class="form-group">
        <label >codigo pedido</label>
        <input   class="form-control" name="codigo" type="text" >
        </div>
        <div class="form-group">
        <button type="submit" class="form-control btn-primary">buscar</button>
        </div>
    </form>
</div>