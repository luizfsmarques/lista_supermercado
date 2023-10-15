<?php
        
namespace App\Models\DAO;
use App\Models\DAO\BaseDAO;
use App\Models\Entidades\Produto\Produto;

class ProdutoDAO extends BaseDAO
{

    public function listar_produtos()
    {
      
        $resultado = $this->select("SELECT * FROM produtos ");
        return $resultado->fetchAll(\PDO::FETCH_CLASS, Produto::class);   
    }

    public function listar_para_carrinho($codigo=null)
    {
        $resultado = $this->select("SELECT * FROM produtos WHERE codigo='$codigo'");
        return $resultado->fetchObject(Produto::class);   
    }

    public function listar_atualizar($codigo=null)
    {
        $resultado = $this->select("SELECT * FROM produtos WHERE codigo='$codigo'");
        return $resultado->fetchObject(Produto::class);   
    }

    public function salvar_produto(Produto $Produto)
    {
        try
        {   
            $codigo = $Produto->getCodigo();
            $nome = $Produto->getNome();
            $categoria_cobranca = $Produto->getCategoria_cobranca();
            $valor = $Produto->getValor();

            return  $this->insert(
                'produtos',
                ':codigo,:nome,:categoria_cobranca,:valor',
                [
                    ':codigo'=>$codigo,
                    ':nome'=>$nome,
                    ':categoria_cobranca'=>$categoria_cobranca,
                    ':valor'=>$valor
                ]
            );

        }catch(Exception $e)
        {
            echo 'O erro foi:' . $e;
        }
    }



    public function atualizar_produto(Produto $Produto)
    {

        try
        {
            $codigo =  $Produto->getCodigo();
            $nome = $Produto->getNome();
            $categoria_cobranca = $Produto->getCategoria_cobranca();
            $valor =  $Produto->getValor();
            
            return $this->update(
                "produtos",
                "nome = :nome,categoria_cobranca = :categoria_cobranca,valor = :valor",
                [
                    ":codigo"=>$codigo,
                    ":nome"=>$nome,
                    ":categoria_cobranca"=>$categoria_cobranca,
                    ":valor"=>$valor
                ],
                "codigo = :codigo"
            );

        }catch(Exception $e)
        {
            echo 'O erro foi:' . $e;
        }

    }

    public function excluir($params,$table) //aqui excluo pelo idCliente e a tabela
    {
        try
        {
            $codigo = $params;
            $this->delete(
                $table,
                "codigo='$codigo'"
            );

        }catch(Exception $e)
        {
            echo 'O erro foi: ' . $e;
        }

    }



}

?>