
<?php 
  $title = 'consultar pedido';
  //require '\templates\header.php';
  require dirname(dirname(__FILE__)) .'/templates/header.php'
?>


<div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">AFL <?php  echo $data["codigo"]?></h5>
                            <h6 class="card-subtitle mb-2 text-muted"><?php echo $data["nome"]?></h6>
                            <p class="card-text">tel: <?php echo $data["telefone"]?> </p>
                            <p class="card-text">endereco: <?php echo $data["endereco_montagem"]?> </p>
                            <p class="card-text">cep: <?php echo $data["cep_montagem"]?> </p>
                            <p class="card-text">inicio: <?php echo $data["inicio"]?> </p>
                            <p class="card-text">prazo:  <?php echo $data["fim"]?> </p>
                  
                        </div>
</div>