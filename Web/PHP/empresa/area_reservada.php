
<?php if(isset($_SESSION['user'])): ?>

    <h1>Area Reservada</h1>

<?php else:?>
   
    <div class="container m-3">
        <div class="row">
            <div class="col-5 offset-5">
            <h2>formulario login</h2>
                <form action="?p=area_reservada" method="post">
                    <div class="form-group m-3">
                        <input type="text" name="text_usuario" placeholder="Usuario" class="form-control">
                    </div>
                    <div class="form-group m-3">
                        <input type="password" name="text_senha" class="form-control" placeholder="password" >
                    </div>
                
                    <div class="text-center">
                        <input type="submit" value="Entrar" class="btn btn-primary m-3">
                    </div>
                    <?php if($erro): ?>
                        <div class="alert alert-danger text-center" id="erro">
                            Login invalido
                        </div>
                    <?php endif; ?>

                </form>
            </div>
        </div>
    </div>

<?php endif;?>

<script>
    $('#erro').delay(3000).fadeOut('slow');
</script>
