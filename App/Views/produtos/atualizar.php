
<main>

    <div class="container-fluid">

        <form action="<?php echo APP_HOST;?>/produtos/atualizar_produto/<?php echo $viewVar['produto']->getCodigo();?>" method="POST">

            <div class="mb-3">
                <label for="nome" class="form-label">Nome:</label>
                <input required type="nome" name="nome" class="form-control" id="nome" aria-describedby="nomeHelp"
                value="<?php echo $viewVar['produto']->getNome();?>">
            </div>

            <div class="mb-3">
                <p for="valor" class="form-label">Categoria de cobrança:</p>
                <div class="form-check">
                    <input class="form-check-input" value="unidade" type="radio" name="categoria_cobranca" id="flexRadioDefault1" 
                    <?php if( $viewVar['produto']->getCategoria_cobranca() == 'unidade' ){ echo 'checked'; }?> >
                    <label class="form-check-label" for="flexRadioDefault1">
                        Unidade
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" value="peso" type="radio" name="categoria_cobranca" id="flexRadioDefault2" 
                    <?php if( $viewVar['produto']->getCategoria_cobranca() == 'peso' ){ echo 'checked'; }?> >
                    <label class="form-check-label" for="flexRadioDefault2">
                        Peso
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" value="volume" type="radio" name="categoria_cobranca" id="flexRadioDefault3" 
                    <?php if( $viewVar['produto']->getCategoria_cobranca() == 'volume' ){ echo 'checked'; }?> >
                    <label class="form-check-label" for="flexRadioDefault3">
                        Volume
                    </label>
                </div>
            </div>

            <div class="mb-3">
                <label for="valor" class="form-label">Valor:</label>
                <input required type="valor" name="valor" class="form-control" id="valor" aria-describedby="valorHelp"
                value="<?php echo $viewVar['produto']->getValor();?>">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>

</main>

<script src="<?php echo APP_HOST;?>/public/js/produtos/input_valor.js" type="text/javascript"></script>
