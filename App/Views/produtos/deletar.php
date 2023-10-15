<main class="container-fluid">

    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Exclusão de produto</h4>
        <p>Tem certeza que deseja excluir este produto?</p>
        <hr>
        <a href="<?php echo APP_HOST;?>/produtos" class="mb-0 btn btn-primary">NÃO</a>
        <a href="<?php echo APP_HOST;?>/produtos/deletar_produto/<?php echo $viewVar['codigo'];?>" class=" btn btn-danger position-relative m-4">SIM</a>

    </div>

</main>