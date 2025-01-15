<?php 
  $title = 'vish!!! :(';
  //require '\templates\header.php';
  require dirname(dirname(__FILE__)) .'/templates/header.php';
  require dirname(dirname(__FILE__)) .'/templates/utils.php';
?>

    <div class="d-flex p-2 m-4 flex-column align-items-center  justify-content-center">
        <h1> Vish!!! deu alguma coisa de errada </h1>
        <img class="rounded-circle" 
        src="https://static-00.iconduck.com/assets.00/sad-but-relieved-face-emoji-emoji-2048x2048-3nl02kdk.png" 
         height="100" width="100" alt="">
        <h2><?= $data['error'] ?> </h2>
    </div>
