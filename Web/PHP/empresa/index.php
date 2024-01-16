<?php 
    include 'layout/html_header.php';
    include 'layout/nav.php';
    


    /* rotas - roteamento */
   //Pegando o valor retornado da query String
   $pagina = 'inicio';
   //verificar se existe 
    if(isset($_GET['p'])){
        $pagina = $_GET['p'];
    }
 //   /* ver o condeudo retornado*/
 //   if(empty($_POST)==false){
 //       print_r($_POST);
 //   }

    switch($pagina){
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

?>