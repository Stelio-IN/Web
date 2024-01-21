<?php 
    session_start();

    include 'layout/html_header.php';
    include 'layout/nav.php';
    
    include 'layout/user.php';

    /* rotas - roteamento */
   //Pegando o valor retornado da query String
   $pagina = 'inicio';
   //verificar se existe 
    if(isset($_GET['p'])){
        $pagina = $_GET['p'];
    }

    switch($pagina){

        //logout
        case 'logout':
            session_destroy();
            //reiniciar a pagina/ refresh
            Header('Location: ' .$_SERVER['PHP_SELF']);
            return;
            //include'inicio.php';
            break;
        case 'inicio':
            include'inicio.php';
            break;
        case 'empresa':
             include'empresa.php';
             break;
        case 'servicos':
            include'servicos.php';
            break;
        case 'contactos':
            include'contactos.php';
            break;
        case 'area_reservada':
            //verificar se houve submissa
            $erro = false;
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                if(verificarLogin()){
                    include 'layout/user.php';
                }else{
                    //erro login invalido 
                    $erro = true;
                }
            }    
            include'area_reservada.php';
            break;
        default:
            include'error_page.php';
            break;
    }

   // if($pagina =="inicio"){
   //     include'inicio.php';
   // }elseif($pagina=="empresa"){
   //     include'empresa.php';
   // }elseif($pagina=="servicos"){
   //     include'servicos.php';
   // }elseif($pagina=="contactos"){
   //     include'contactos.php';
   // }else{
   //    include'error_page.php';
   // }


    include 'layout/footer.php';
    include 'layout/html_footer.php';


function verificarLogin(){
/*
    Retornar user
    -se nao existir- login invalido;
    -se exixste{
        - verificar se a senha e valida
        - sim, cria seccao
        - nao, login invalido 
    }
*/
    //trim remover espacos no texto
    $user = trim($_POST['text_usuario']);
    $pass = trim($_POST['text_senha']);

    include 'gestor.php';
    $obj = new Gestor();

    $paramns = array(
        ':usuario' => $user
    );
    $result = $obj->EXE_QUERY('SELECT * FROM users WHERE nome = :usuario ',$paramns);

    //echo '<pre>';
    //print_r($result);
    if(count($result)==0){
        return false;
    }else{
        //usuario existe
        $senha_bd = $result[0]['senha'];

        //verificar senha
        if(password_verify($pass,$senha_bd)){
            $_SESSION['user'] = $result[0]['nome'];
            return true;
        }else{
            return false;
        }
    }

}

?>