 <?php 
//   // echo 'teste';
//   //verificar se existem dados enviados num formulario
//
//   if(empty($_POST)==false){
//        print_r($_POST);
//        var_dump($_POST);
//   }
?>


<h1>Contactos</h1>

<form action="tratar.php" method="post" name="meu_form" onsubmit="return validar()">
    <input type="text" name="text_usuario">
    <input type="password" name="text_senha">
    <input type="submit" value="Entrar">
</form> 

<div style="color:red; margin-left: 5px;" id="erro"></div>

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
