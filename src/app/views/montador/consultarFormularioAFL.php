
<?php 
  $title = 'consultar pedido';
  //require '\templates\header.php';
  require dirname(dirname(__FILE__)) .'/templates/header.php'
?>


<div class="container">
    
    <h1>informacoes pedido</h1>


    <form action="/montador/consultar" method="get">
        <div class="form-group">
        <label>codigo pedido</label>
        <input name="codigo" type="text" >
        </div>
        <div class="form-group">
        <button type="submit">buscar</button>
        </div>
    </form>
</div>