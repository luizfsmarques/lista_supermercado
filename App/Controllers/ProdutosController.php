<?php 

namespace App\Controllers;

use App\Controllers\Controller;
use App\Lib\Criptografia;
use App\Models\Entidades\Produto\Produto;
use App\Models\DAO\ProdutoDAO;

class ProdutosController extends Controller
{
    public function exibe()
    {   

        $ProdutoDAO = new ProdutoDAO();
        $produtos = $ProdutoDAO->listar_produtos();

    
        if( !empty( $_SESSION['mensagem_sucesso'] ) && ($_SESSION['mensagem_sucesso']==true) )
        {
            $this->setViewVar( 'mensagem_sucesso', true );
            unset( $_SESSION['mensagem_sucesso']  );
        }

        $this->setViewVar( 'produtos', $produtos );

        $this->render_layout('/produtos/produtos','/produtos/produtos');
    }   

    public function logout_now()
    {
        $this->logout();
    }

    public function mensagem_sucesso()
    {
        echo "Sua solicitação foi atendida com sucesso <br><br>";
        echo "<a href='".APP_HOST."/produtos' class='btn btn-primary'> VOLTAR </a>";
    }

    public function cadastro()
    {
        $_SESSION['pode_salvar'] = true;
        $this->render_layout('/produtos/cadastro','/produtos/cadastro');   

    }

    public function salvar_produto()
    {
        if( !empty($_SESSION['pode_salvar']) && ($_SESSION['pode_salvar']==true) )
        {
           
            $Produto = new Produto();

            $Criptografia = new Criptografia();
            $Criptografia->setPrimaryKeyCript();
            $codigo = $Criptografia->getPrimaryKeyCript();
            $Produto->setCodigo( $codigo );

            $Produto->setNome( $_POST['nome'] );
            $Produto->setCategoria_cobranca( $_POST['categoria_cobranca'] );
            $Produto->setValor($_POST["valor"]);

            $ProdutoDAO = new ProdutoDAO();
            $ProdutoDAO->salvar_produto($Produto);
            
            unset($_SESSION['pode_salvar']);

            $_SESSION['mensagem_sucesso'] = true;
            $this->redirect( '/produtos' );

        }
        else
        {
            $this->redirect( '/produtos' );
        }
    }


    public function atualizar($codigo)
    {
        $_SESSION['pode_atualizar'] = true;


        $ProdutoDAO = new ProdutoDAO();
        $produto = $ProdutoDAO->listar_atualizar($codigo);

        $this->setViewVar( 'produto', $produto );

        $this->render_layout('/produtos/atualizar','/produtos/atualizar');   

    }


    public function atualizar_produto($codigo)
    {
        if( !empty($_SESSION['pode_atualizar']) && ($_SESSION['pode_atualizar']==true) )
        {
           
            $Produto = new Produto();

            $Produto->setCodigo( $codigo );
            $Produto->setNome( $_POST['nome'] );
            $Produto->setCategoria_cobranca( $_POST['categoria_cobranca'] );
            $Produto->setValor($_POST["valor"]);

            $ProdutoDAO = new ProdutoDAO();
            $ProdutoDAO->atualizar_produto($Produto);
            
            unset($_SESSION['pode_atualizar']);

            $_SESSION['mensagem_sucesso'] = true;
            $this->redirect( '/produtos' );

        }
        else
        {
            $this->redirect( '/produtos' );
        }
    }




    public function deletar($codigo)
    {
        $_SESSION['pode_deletar'] = true;

        $this->setViewVar( 'codigo', $codigo );

        $this->render_layout('/produtos/deletar','/produtos/deletar');   

    }

    

    public function deletar_produto($codigo)
    {
        if( !empty($_SESSION['pode_deletar']) && ($_SESSION['pode_deletar']==true) )
        {
           
            $Produto = new Produto();

            $ProdutoDAO = new ProdutoDAO();
            $ProdutoDAO->excluir($codigo,'produtos');
            
            unset($_SESSION['pode_deletar']);

            $_SESSION['mensagem_sucesso'] = true;
            $this->redirect( '/produtos' );

        }
        else
        {
            $this->redirect( '/produtos' );
        }
    }



    //PARA O CARRINHO
    public function listar_para_carrinho($codigo)
    {

        $ProdutoDAO = new ProdutoDAO();
        return $ProdutoDAO->listar_para_carrinho($codigo);

    }



}