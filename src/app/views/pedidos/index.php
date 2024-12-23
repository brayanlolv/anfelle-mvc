<?php 
  $title = 'lista pedidos';
  //require '\templates\header.php';
  require dirname(dirname(__FILE__)) .'/templates/header.php';
  require dirname(dirname(__FILE__)) .'/templates/utils.php';
?>
<table class="table"> 
                <thead>
                        <tr>
                            <th scope="col">AFL</th>
                            <th scope="col">nome</th>
                            <th scope="col">telefone</th>
                            
                            <th scope="col">endereco cliente</th>
                            <th scope="col">cep cliente</th>
                            <th scope="col">endereco montagem</th>
                            <th scope="col">cep montagem</th>

                            <th scope="col">montador</th>
                            <th scope="col">status</th>
                            <th scope="col">inicio</th>
                            <th scope="col">fim</th>
                            <th scope="col">valor</th>
                        </tr>
                </thead>
                <tbody>
                    <?php foreach($data as $row){ ?> 
                        <tr>
                            <th scope="row"><?php  echo $row["codigo"]?></th>
                                <td><?php echo $row["nome"]?> </td>
                                <td><?php echo $row["telefone"]?> </td>

                                <td><?php echo $row["endereco_cliente"]?> </td>
                                <td><?php echo $row["cep_cliente"]?> </td>
                                <td><?php echo $row["endereco_montagem"]?> </td>
                                <td><?php echo $row["cep_montagem"]?> </td>
                                
                            
                                <td><?php echo $row["montador"]?> </td>
                        
                                <td><?php echo getStatus($row["situacao"]) ?> </td>
                        
                                <td><?php echo $row["inicio"]?> </td>
                                <td><?php echo $row["fim"]?> </td>

                                <td><?php echo $row["valor"]?> </td>
                                <td><a href="./editar-pedido?codigo=<?php echo $row["codigo"] ?>"> editar</a></td>
                        </tr>
                    <?php } ?>
                </tbody>
</table>

    <a href="/pedidos/criar">
      <button>
        Adicionar Pedidos
      </button>
    </a>
                </thead>
<tbody>