<?php 

function getStatus($char){
    switch ($char){
      case 1:
        return "venda";
      case "M":
        return "montagem";
      case "F": 
        return "finalizado";
      case "V":
            return "vistoria";
    }
}


function getNavigation($actual){
  ?>

  <nav aria-label="...">
  <ul class="pagination">

    <?php if($actual > 1){ ?>

    <li class="page-item disabled">
      <a class="page-link" href="<?= ($actual -1)?>" tabindex="-1">Previous</a>
    </li>
    <li class="page-item"><a class="page-link" href="<?= ($actual -1)?>"><?= ($actual -1)?></a></li>

    <?php } ?>


    <li class="page-item active">
      <a class="page-link" href="<?= $actual ?>"><?= $actual ?> <span class="sr-only">(current)</span></a>
    </li>
    <li class="page-item"><a class="page-link" href="<?= ($actual + 1) ?>"><?= $actual+1 ?></a></li>
    <li class="page-item">
      <a class="page-link" href="<?= $actual+1 ?>">Next</a>
    </li>
  </ul>
</nav>

<?php
//  echo ' <div class="pagination">'.
//    $actual > 1 ?  
//    '<a href="">&laquo;</a>
//    <a href="#">'. $actual -1 .'</a>': ''
//   .'<a class="active" href="#">'. $actual .'</a>
//   <a href="#">'. $actual+1 . '</a>
//   <a href="#">&raquo;</a>
// </div>';
}