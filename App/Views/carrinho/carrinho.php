<?php
function formatar_para_real($valor)
{
    $valor_formatado = null;
    $array_valor = null;
    $array_formatado = [];
    $valor_formatado = null;
    $e_negativo = false;
    $ultimo_vale = false;
    $penultimo_ponto = false;
    $ultimo_vale_virgula = false;
    $penultimo_virgula = false;


    if( (str_contains($valor,'-')) )
    {
        $valor = str_replace("-","",$valor);
        $e_negativo = true;
    }

    if(str_contains($valor,','))
    {
        $valor = str_replace(",",".",$valor);
        $array_valor = str_split($valor);

        $tamanho = count($array_valor);
        for($i=0;$i<count($array_valor);$i++)
        {
            if( $i == (count($array_valor)-2) )
            {   
                if($array_valor[$i]=='.')
                {
                    $penultimo_ponto = true;
                }
            }
            if( $i == (count($array_valor)-1) )
            {   
                if(floatval($array_valor[$i])>=0)
                {
                    $ultimo_vale = true;
                }
            }
        }

        if( $penultimo_ponto==true && $ultimo_vale==true)
        {
            array_push($array_valor,'0');
        }

        $novo_valor = implode($array_valor);
        $valor = $novo_valor;


    }
    else if(str_contains($valor,'.'))
    {
        $array_valor = str_split($valor);

        $tamanho = count($array_valor);
        for($i=0;$i<count($array_valor);$i++)
        {
            if( $i == (count($array_valor)-2) )
            {   
                if($array_valor[$i]=='.')
                {
                    $penultimo_virgula= true;
                }
            }
            if( $i == (count($array_valor)-1) )
            {   
                if(floatval($array_valor[$i])>=0)
                {
                    $ultimo_vale_virgula = true;
                }
            }
        }

        if( $penultimo_virgula==true && $ultimo_vale_virgula==true)
        {
            array_push($array_valor,'0');
        }

        $novo_valor = implode($array_valor);
        $valor = $novo_valor;


    }
    else if( !(str_contains($valor,'.')) && !(str_contains($valor,',')))
    {
        $valor = $valor.".00";
    }

    $valor = str_replace(".","",$valor);
    $array_valor = str_split($valor);
    
    //Entender a lógica da formatação dos números, então aplicar uma lógica correta.
    $next = null;
    $next1 = null;
    $next2 = null;
    $array_valor = array_reverse($array_valor);

    for($i=0;$i<count($array_valor);$i++)
    {   
       switch($i)
       {
            case 0: 
                array_push($array_formatado,$array_valor[$i]);
                break;
            case 1: 
                array_push($array_formatado,$array_valor[$i]);
                break;
            case 2: 
                array_push($array_formatado,",");
                $next = $array_valor[$i];
                break;
            case 3: 
                array_push($array_formatado,$next);
                $next = $array_valor[$i];
                break;
            case 4: 
                array_push($array_formatado,$next);
                $next = $array_valor[$i];
                break;
            case 5: 
                array_push($array_formatado,$next);
                $next1 = $array_valor[$i];
                $next = ".";
                break;
            case 6: 
                array_push($array_formatado,$next);
                $next = $next1;
                $next1 = $array_valor[$i];
                break;
            case 7: 
                array_push($array_formatado,$next);
                $next = $next1;
                $next1 = $array_valor[$i];
                break;
       }
    }
    if($next1==null)
    {
        array_push( $array_formatado, $next );
    }else
    {
        array_push( $array_formatado, $next );
        array_push( $array_formatado, $next1 );
    }

    $array_formatado = array_reverse($array_formatado);
    $valor_formatado = implode($array_formatado);


    if($e_negativo==true)
    {
        $valor_formatado = "-".$valor_formatado;
    }


    return $valor_formatado;        
}



?>






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

    <h1 class=""> Lista de compras</h1>

    <p class=""> VALOR TOTAL: R$ <?php echo formatar_para_real($viewVar['valor_total']);?> </p>

    <p class=""> QUANTIDADE DE PRODUTOS: <?php echo $viewVar['quantidade_produtos'];?> unidades</p>

    <p class=""> TOTAL DE PESO: <?php echo $viewVar['quantidade_produtos_peso'];?> kg</p>


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
                //$valor = str_replace(",",".",$produto->getValor());
                //$total = floatval($valor)*floatval($produto->getQuantidade());

                echo "<li class='list-group-item'>";
                    echo "<div class='div-list'>";
                        echo "<p class=''> NOME: ".$produto['nome']." </p>";
                        switch($produto['categoria_cobranca'])
                        {
                            case 'unidade':
                                echo "<p class=''> VALOR: R$". $produto['valor'] ." por unidade </p>";
                                break;
                            case 'peso':
                                echo "<p class=''> VALOR: R$". $produto['valor'] ." por kg </p>";
                                break;
                            case 'volume':
                                echo "<p class=''> VALOR: R$". $produto['valor'] ." por litro </p>";
                                break;
                        }
                        switch($produto['medida'])
                        {
                            case 'unidade':
                                echo "<p class=''> QUANTIDADE: ". $produto['quantidade'] ." unidades </p>";
                                break;
                            case 'grama':
                                echo "<p class=''> QUANTIDADE: ". $produto['quantidade'] ." g </p>";
                                break;
                            case 'quilo':
                                echo "<p class=''> QUANTIDADE: ". $produto['quantidade'] ." kg </p>";
                                break;
                            case 'litro':
                                echo "<p class=''> QUANTIDADE: ". $produto['quantidade'] ." l </p>";
                                break;
                        }
                       
                        echo "<p class=''> TOTAL: R$". formatar_para_real($produto['total']) ."</p>";
                        echo "<a href='".APP_HOST."/carrinho/deletar/".$produto['codigo_carrinho']."' class='btn btn-danger position-relative m-1'>Retirar</a>";
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

