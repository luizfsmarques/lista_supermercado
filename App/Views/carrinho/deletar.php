<main class="container-fluid">

    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Retirada do carrinho</h4>
        <p>Tem certeza que deseja retirar este produto?</p>
        <hr>
        <a href="<?php echo APP_HOST;?>/carrinho" class="mb-0 btn btn-primary">NÃO</a>
        <a href="<?php echo APP_HOST;?>/carrinho/deletar_carrinho/<?php echo $viewVar['codigo_carrinho'];?>" class=" btn btn-danger position-relative m-4">SIM</a>

    </div>

</main>