<?php 

namespace App\Controllers;

use App\Controllers\Controller;
use App\Controllers\ProdutosController;
use App\Lib\Criptografia;
use App\Models\Entidades\Carrinho\Carrinho;
use App\Models\DAO\CarrinhoDAO;

class CarrinhoController extends Controller
{
    //vai faltar adicionar dados para compras em litro
    //vai faltar ajeitar a formatacao automatica no input, para cada tipo de medida... 
    //vai faltar altualizar informacoes do carrinhpo - como quantidade...

    public function exibe()
    {   

        $ProdutosController= new ProdutosController();

        $CarrinhoDAO = new CarrinhoDAO();
        $produtos_carrinho = $CarrinhoDAO->listar_carrinho();

        $produtos = [];

        $valor_total = 0;
        $quantidade_produtos = 0;
        $quantidade_produtos_peso = 0;

        foreach( $produtos_carrinho as $carrinho )
        {
            $produto = $ProdutosController->listar_para_carrinho($carrinho->getCodigo());

            if( $produto->getCategoria_cobranca()  == 'unidade' )
            {
                $quantidade_unidade = str_replace( ',','.', $carrinho->getQuantidade() );
                $quantidade_produtos += floatval($quantidade_unidade);
            }
            else if( $produto->getCategoria_cobranca()  == 'peso' )
            {
                //verifico a quantidade de quilos
                if( $carrinho->getMedida() == 'grama' )
                {
                    $quant = $carrinho->getQuantidade();
                    $quantidade_grama = '0.'.$quant[0] . $quant[1] . $quant[2];
                    $quantidade_produtos_peso += floatval($quantidade_grama);
                }
                else if( $carrinho->getMedida() == 'quilo' )
                {
                    $quantidade_quilo = str_replace( ',','.', $carrinho->getQuantidade() );
                    $quantidade_produtos_peso += floatval($quantidade_quilo);
                }   
            }

            if( $produto->getCategoria_cobranca()  == 'unidade' )
            {
                $valor = str_replace(",",".",$produto->getValor());
                $total = floatval($valor)*$quantidade_unidade;
                $valor_total+=$total;
            }
            else if( $produto->getCategoria_cobranca()  == 'peso' )
            {
                if( $carrinho->getMedida() == 'grama' )
                {
                    $valor = str_replace(",",".",$produto->getValor());
                    $total = floatval($valor)*$quantidade_grama;
                    $valor_total+=$total;
                }
                else if( $carrinho->getMedida() == 'quilo' )
                {
                    $valor = str_replace(",",".",$produto->getValor());
                    $total = floatval($valor)*$quantidade_quilo;
                    $valor_total+=$total;
                }
            }   

            $info = array( 
                'codigo_carrinho'=>$carrinho->getCodigo_carrinho(),'codigo'=>$carrinho->getCodigo(),
                'nome'=>$produto->getNome(), 'categoria_cobranca'=>$produto->getCategoria_cobranca(),
                'valor'=>$produto->getValor(),'quantidade'=>$carrinho->getQuantidade(),
                'medida'=>$carrinho->getMedida(), 'total'=>$total
             );

             array_push( $produtos, $info );
        }

        if( !empty( $_SESSION['mensagem_sucesso'] ) && ($_SESSION['mensagem_sucesso']==true) )
        {
            $this->setViewVar( 'mensagem_sucesso', true );
            unset( $_SESSION['mensagem_sucesso']  );
        }

        $this->setViewVar( 'produtos',  $produtos );
        $this->setViewVar( 'quantidade_produtos',  $quantidade_produtos );
        $this->setViewVar( 'quantidade_produtos_peso',  $quantidade_produtos_peso );

        $this->setViewVar( 'valor_total',  str_replace( '.',',',strval($valor_total) ) );

        $this->render_layout('/carrinho/carrinho','/carrinho/carrinho');
    }   
    
    public function logout_now()
    {
        $this->logout();
    }


    public function cadastro( $codigo )
    {

        $_SESSION['pode_salvar_carrinho'] = true;

        $ProdutosController = new ProdutosController();
        $produto = $ProdutosController->listar_para_carrinho( $codigo );

        $this->setViewVar( 'produto', $produto );

        $this->render_layout('/carrinho/cadastro','/carrinho/cadastro');   

    }

    public function salvar_carrinho()
    {
        if( !empty($_SESSION['pode_salvar_carrinho']) && ($_SESSION['pode_salvar_carrinho']==true) )
        {
           
            $Carrinho = new Carrinho();

            $Criptografia = new Criptografia();
            $Criptografia->setPrimaryKeyCript();
            $codigo_carrinho = $Criptografia->getPrimaryKeyCript();
            $Carrinho->setCodigo_carrinho( $codigo_carrinho );

            $Carrinho->setCodigo( $_POST['codigo'] );

            $Carrinho->setMedida( $_POST['medida'] );

            $Carrinho->setQuantidade( $_POST['quantidade'] );

            $CarrinhoDAO = new CarrinhoDAO();
            $CarrinhoDAO->salvar_carrinho($Carrinho);
            
            unset($_SESSION['pode_salvar_carrinho']);

            $_SESSION['mensagem_sucesso'] = true;
            $this->redirect( '/carrinho' );


        }
        else
        {
            $this->redirect( '/carrinho' );
        }
    }


    public function deletar($codigo_carrinho)
    {
        $_SESSION['pode_deletar_carrinho'] = true;

        $this->setViewVar( 'codigo_carrinho', $codigo_carrinho );

        $this->render_layout('/carrinho/deletar','/carrinho/deletar');   

    }

    

    public function deletar_carrinho($codigo_carrinho)
    {
        if( !empty($_SESSION['pode_deletar_carrinho']) && ($_SESSION['pode_deletar_carrinho']==true) )
        {
           
            $Carrinho = new Carrinho();

            $CarrinhoDAO = new CarrinhoDAO();
            $CarrinhoDAO->excluir($codigo_carrinho,'carrinho');
            
            unset($_SESSION['pode_deletar_carrinho']);

            $_SESSION['mensagem_sucesso'] = true;
            $this->redirect( '/carrinho' );


        }
        else
        {
            $this->redirect( '/carrinho' );
        }
    }











}








?>