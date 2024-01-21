<?php
//    $nome = 'Stelio';
//    $apelido = 'Mondlane';
//    echo $nome .' '.$apelido 
    /** array asssociativo cada valor com uma chave de string*/

    //Verificar se os campos existem
    if(isset($_POST['text_usuario'])==false || isset($_POST['text_senha'])==false){
        die('Erro - Nao existem os campos necessarios');
    }

    //Verificar se os campos estao preencchidos
    if(empty($_POST['text_usuario'])){
        die('Erro - campo usuario vazio');
    }else if(empty($_POST['text_senha'])){
        die('Erro - campo senha vazio');
    }

    //validar pelo tipo de campo
    $usuario = $_POST['text_usuario'];
    $senha = $_POST['text_senha'];

    if(strlen($usuario)<5 ||strlen($usuario)>10){
        die('Erro - Usario tem que ter entre 5 e 10');
    }
    if(strlen($senha)<3 ||strlen($senha)>15){
        die('Erro - senha tem que ter entre 3 e 15');
    }

    //verificar se usario e senha existem
   $u = 'stelio';
   $s = '123456';

   if($usuario == $u && $senha ==$s ){
        die('Login efectuado com sucesso');
   }else{
        die('login invalido');
   }


?>    