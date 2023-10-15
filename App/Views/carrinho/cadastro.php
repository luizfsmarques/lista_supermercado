
<main>

    <div class="container-fluid">

        <form action="<?php echo APP_HOST;?>/carrinho/salvar_carrinho" method="POST">

            <div class="mb-3">
                <label for="nome" class="form-label">Nome: <?php echo strtoupper($viewVar['produto']->getNome()) ;?></label>
            </div>

            <div class="mb-3">
                <label for="nome" class="form-label">Categoria de cobrança: <?php echo strtoupper($viewVar['produto']->getCategoria_cobranca()) ;?></label>
            </div>

            <div class="mb-3">
                <label for="nome" class="form-label">Valor: R$<?php echo $viewVar['produto']->getValor() ;?></label>
            </div>

            <div class="mb-3">
                <p for="valor" class="form-label">Medida:</p>
                <div class="form-check">
                    <input class="form-check-input" value="unidade" type="radio" name="medida" id="flexRadioDefault1" checked>
                    <label class="form-check-label" for="flexRadioDefault1">
                        Unidade
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" value="grama" type="radio" name="medida" id="flexRadioDefault2" >
                    <label class="form-check-label" for="flexRadioDefault2">
                        Grama
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" value="quilo" type="radio" name="medida" id="flexRadioDefault3" >
                    <label class="form-check-label" for="flexRadioDefault3">
                        Quilo
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" value="litro" type="radio" name="medida" id="flexRadioDefault4" >
                    <label class="form-check-label" for="flexRadioDefault4">
                        Litro
                    </label>
                </div>
            </div>

            <div class="mb-3">
                <label for="quantidade" class="form-label">Quantidade:</label>
                <input required type="quantidade" id="quantidade" name="quantidade" class="form-control" id="quantidade" aria-describedby="quantidadeHelp">
            </div>

            <div class="mb-3" id="codigo-produto" >
                <label for="codigo" class="form-label">Código:</label>
                <input required type="codigo" value="<?php echo $viewVar['produto']->getCodigo() ; ?>" name="codigo" class="form-control" id="codigo" aria-describedby="codigoHelp">
            </div>

            <button type="submit" class="btn btn-primary">Adicionar</button>
        </form>

    </div>

</main>

<script src="<?php echo APP_HOST;?>/public/js/carrinho/input_quantidade.js" type="text/javascript"></script>

