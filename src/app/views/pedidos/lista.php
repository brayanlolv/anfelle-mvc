<?php 
  $title = 'lista pedidos';
  //require '\templates\header.php';
  require dirname(dirname(__FILE__)) .'/templates/header.php';
  require dirname(dirname(__FILE__)) .'/templates/utils.php';
?>

<div class="d-flex p-2 justify-content-evenly">
  <form action="/pedidos/pesquisar" class="form-inline" method="get">
      <input type="text" name="nome"  class="form-control m-1" placeholder="pesquisar por nome">
      <button type="button" class="btn btn-outline-success form-control">Buscar</button>
  </form>

  <form action="/pedidos/pesquisar"  class="form-inline" method="get">
      <input type="text" name="afl"  class="form-control m-1"  placeholder="pesquisar por afl">
      <button type="button" class="btn btn-outline-success form-control">Buscar</button>
  </form>
</div> 
          

<table class="table"> 
      <thead>
                        <tr>
                            <th scope="col">AFL</th>
                            <th scope="col">nome</th>
                            <th scope="col">telefone</th>
                            
                            <!-- <th scope="col">endereco cliente</th> -->
                            <!-- <th scope="col">cep cliente</th> -->
                            <th scope="col">endereco montagem</th>
                            <th scope="col">cep montagem</th>

                            <!-- <th scope="col">montador</th> -->
                           <th scope="col">status</th>
                             <!-- <th scope="col">inicio</th>-->
                            <th scope="col">fim</th> 
                            <th scope="col">valor total</th>
                            <th scope="col">detalhes</th>
                            <th scope="col">editar</th> 
                        </tr>
                </thead>
                <tbody>
                    <?php 
                    if(!$data['query']){exit();}
                    foreach($data['query'] as $row){ ?> 
                        <tr>
                            <th scope="row"><?php  echo $row["codigo"]?></th>
                                <td><?php echo $row["nome"]?> </td>
                                <td><?php echo $row["telefone"]?> </td>
                                <td><?php echo $row["endereco_montagem"]?> </td>
                                <td><?php echo $row["cep_montagem"]?> </td>
                                <td><?php echo getStatus($row["situacao"]) ?> </td>
                                <td><?php echo isset($row["fim"])? $row["fim"]:'indefinido'?> </td>
                                <td><?php echo $row["valor_total"]?> </td>
                                <td><a class="btn btn-primary " href="/pedidos/detalhes/<?php echo $row["codigo"]?>">detalhes</a></td>
                                <td><a class="btn btn-primary " href="/pedidos/editar/<?php echo $row["codigo"] ?>"> editar</a></td>
                        </tr>
                    <?php } ?>
                </tbody>
</table>

    <a href="/pedidos/criar">
      <button>
        Adicionar Pedidos
      </button>
    </a>

<?php 
   getNavigation($data['pagNumber']);
?>