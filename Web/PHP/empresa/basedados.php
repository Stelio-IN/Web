<?php

   include 'gestor.php';

   $gestor = new Gestor();

   $dados = $gestor->EXE_QUERY("SELECT * FROM emails");
   
   echo $dados[0]['email'];
   echo '<pre>';
   //print_r($dados);
   var_dump($dados);
   echo'<br>';
   die();
