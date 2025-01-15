
<?php 
  $title = 'editar pedido';
  require dirname(dirname(__FILE__)) .'/templates/header.php';
?>



    <h1>Login</h1>

    <form action="/usuario/loging" method="post">
      <div class="form-group">
          <label>CPF:</label>
          <input class="form-control" name="cpf" type="text" >
      
      
          <label>Senha</label>
          <input class="form-control"  name="password" type="password" >
        </div>

        <input type="hidden" name="formToken" value="<?php echo $data ?>" >
        
        <div class="form-group">
          <button class="form-control btn btn-primary" type="submit">logar</button>
        </div>
    </form>
