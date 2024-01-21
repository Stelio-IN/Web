
 <?php 
 /*
    //Validacao de formulario
    if($_SERVER['REQUEST_METHOD']=='POST'){
    
        //verificar se existem todos campos

        $erro = '';
        if(!isset($_POST['text_email']) || !isset($_POST['text_subject']) || !isset($_POST['text_mensagem'])){
            $erro = 'Pelo menos um dos campos nao existe';
        }
        
          $email = $_POST['text_email'];
          $subject = $_POST['text_subject'];
          $mensagem = $_POST['text_mensagem'];
       //se nao tiver nenhum erro vai tentar validar o email e continuar para o processo seguinte 
        if(empty($erro)){
            //verificar se email e valido
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $erro = "Invalid email format";
            }
        }

        if(empty($erro)){
         $resultado =   mail($email,$subject,$mensagem);
            if($resultado){
                echo 'sucesso';
            }else{
                echo 'erro';
            }
        }
    }
*/
?>

<?php
    // Validacao de formulario
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
        // Verificar se existem todos campos
        $erro = '';
        if (!isset($_POST['text_email']) || !isset($_POST['text_subject']) || !isset($_POST['text_mensagem'])) {
            $erro = 'Pelo menos um dos campos nao existe';
        }
        
        $email = isset($_POST['text_email']) ? htmlspecialchars($_POST['text_email']) : '';
        $subject = isset($_POST['text_subject']) ? htmlspecialchars($_POST['text_subject']) : '';
        $mensagem = isset($_POST['text_mensagem']) ? htmlspecialchars($_POST['text_mensagem']) : '';

        // Se não tiver nenhum erro vai tentar validar o email e continuar para o processo seguinte 
        if (empty($erro)) {
            // Verificar se o e-mail é válido
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $erro = "Invalid email format";
            }
        }

        if (empty($erro)) {
            // Configurar cabeçalhos adicionais, se necessário
            $additional_headers = [
                'From' => 'hoteltransilvania@gmail.com', // Substitua com o endereço de e-mail desejado
                'Reply-To' => $email,
                'X-Mailer' => 'PHP/' . phpversion()
            ];

            // Parâmetros adicionais, se necessário
            $additional_params = "";

            // Enviar e-mail
            $resultado = mail($email, $subject, $mensagem, $additional_headers, $additional_params);

            if ($resultado) {
                echo 'sucesso';
            } else {
                echo 'erro';
            }
        }
    }
?>


<h1>Contactos</h1>
<!-- <form action="tratar.php" method="post" name="meu_form"  onsubmit="return validar()">   -->
<form action="?p=contactos" method="post">
  <input type="email" name="text_email"  placeholder="Email" required> <br>
  <input type="text" name="text_subject" placeholder="Assunto" required><br>
  <textarea name="text_mensagem"  cols="40" rows="3" required></textarea> <br>
  <input type="submit" value="Enviar Mensagem">
</form> 

<!-- esse codigo so sera executado se a codicao for satisfeita-->
<?php if(!empty($erro)):?>
    <div style="color:red;"><?php echo $erro ?></div>
<?php endif; ?>

<!-- validacao com JS-->
<script>
    function validar(){
        let text_usuario = document.forms['meu_form']['text_usuario'].value;
        let text_senha = document.forms['meu_form']['text_senha'].value;

        if(text_usuario === ''){
            document.getElementById('erro').innerHTML = 'O usuário deve ser preenchido';
            return false;
        } else if(text_senha === ''){
            document.getElementById('erro').innerHTML = 'A senha deve ser preenchida';
            return false;
        } else {
            return true;
        }
    }
</script>
