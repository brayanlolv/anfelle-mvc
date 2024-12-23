
<?php 
  $title = 'login';
  //require '\templates\header.php';
  require dirname(dirname(__FILE__)) .'/templates/header.php'
?>




<div class="container">
    
    <h1>informacoes pedido</h1>


    <form action="/usuario/loging" method="post">
        <div class="form-group">
        <label>cpf</label>
        <input name="cpf" type="text" >
        </div>

        <div class="form-group">
        <label>senha</label>
        <input name="password" type="password" >
        </div>

        <input name='formToken' type='hidden' value='<?php echo $data ?>' >
        
        <div class="form-group">
        <button type="submit">logar</button>
        </div>
    </form>
</div>