

<main class="container-fluid">

    <?php
    if( !empty($viewVar['mensagem_sucesso']) && ($viewVar['mensagem_sucesso']==true) )
    {
        echo "<div class='alert alert-success d-flex mb-3' role='alert' id='alerta-sucesso'>";
            echo "<div class='p-2'><i class='bi bi-check-circle-fill'></i></div>";
            echo "<div class='p-2'>Sua solicitação foi atendida com sucesso! </div>";
            echo "<div class='ms-auto p-2'><i class='bi bi-x ' id='fechar-sucesso'></i></div>";
        echo "</div>";
    }
    ?>
   
    <a href="<?php echo APP_HOST;?>/produtos/cadastro"class='btn btn-primary' id="btn-cadastro">Cadastrar</a>
   

    <div class="container-fluid">
        <form class="row g-3" id="form-pesquisa">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">PESQUISAR</label>
                <input type="text" class="form-control" id="input-pesquisa"  placeholder="Pesquisar">
            </div>
        </form>
    </div>

    <ul class="list-group">

        <?php
        if( !empty($viewVar['produtos']) )
        {
            foreach( $viewVar['produtos'] as $produto )
            {
                echo "<li class='list-group-item'>";
                    echo "<div class='div-list'>";
                        echo "<p class=''> NOME: ".$produto->getNome()." </p>";
                        echo "<p class=''> Categoria de cobrança: ".$produto->getCategoria_cobranca()."</p>";
                        echo "<p class=''> VALOR: R$". $produto->getValor() ."</p>";
                        echo "<a href='".APP_HOST."/carrinho/cadastro/".$produto->getCodigo()."' class='btn btn-light position-relative m-4'><i class='bi bi-cart3'></i></a>";
                        echo "<a href='".APP_HOST."/produtos/atualizar/".$produto->getCodigo()."' class='btn btn-primary'>ATUALIZAR</a>";
                        echo "<a href='".APP_HOST."/produtos/deletar/".$produto->getCodigo()."' class='btn btn-danger position-relative m-4'>DELETAR</a>";
                    echo "</div>";
                echo "</li>";
            }
        }
        else
        {
            echo "<li class='list-group-item'>";
                    echo "<p class=''> Não existem produtos cadastrados. </p>";
            echo "</li>";
        }
        ?>


    </ul>


</main>

<script src="<?php echo APP_HOST;?>/public/js/produtos/pesquisar_produto.js" type="text/javascript"></script>
<script src="<?php echo APP_HOST;?>/public/js/fechar_mensagem_seucesso.js" type="text/javascript"></script>
