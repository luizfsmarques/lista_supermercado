<?php
        
namespace App\Models\DAO;
use App\Models\DAO\BaseDAO;
use App\Models\Entidades\Carrinho\Carrinho;

class CarrinhoDAO extends BaseDAO
{

    public function listar_carrinho()
    {
      
        $resultado = $this->select("SELECT * FROM carrinho ");
        return $resultado->fetchAll(\PDO::FETCH_CLASS, Carrinho::class);   
    }

    public function listar_atualizar($codigo_carrinho=null)
    {
        $resultado = $this->select("SELECT * FROM carrinho WHERE codigo_carrinho='$codigo_carrinho'");
        return $resultado->fetchObject(Carrinho::class);   
    }


    public function salvar_carrinho(Carrinho $Carrinho)
    {
        try
        {   
            $codigo_carrinho = $Carrinho->getCodigo_carrinho();
            $codigo = $Carrinho->getCodigo();
            $medida = $Carrinho->getMedida();
            $quantidade = $Carrinho->getQuantidade();

            return  $this->insert(
                'carrinho',
                ':codigo_carrinho,:codigo,:medida,:quantidade',
                [
                    ':codigo_carrinho'=>$codigo_carrinho,
                    ':codigo'=>$codigo,
                    ':medida'=>$medida,
                    ':quantidade'=>$quantidade
                ]
            );

        }catch(Exception $e)
        {
            echo 'O erro foi:' . $e;
        }
    }



    public function atualizar_carrinho(Carrinho $Carrinho)
    {

        try
        {
            $codigo_carrinho =  $Carrinho->getCodigo_carrinho();
            $codigo = $Carrinho->getCodigo();
            $medida = $Carrinho->getMedida();
            $quantidade =  $Carrinho->getQuantidade();
            
            return $this->update(
                "produtos",
                "codigo = :codigo,medida = :medida,quantidade = :quantidade",
                [
                    ":codigo_carrinho"=>$codigo_carrinho,
                    ":codigo"=>$codigo,
                    ":medida"=>$medida,
                    ":quantidade"=>$quantidade
                ],
                "codigo_carrinho = :codigo_carrinho"
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
            $codigo_carrinho = $params;
            $this->delete(
                $table,
                "codigo_carrinho='$codigo_carrinho'"
            );

        }catch(Exception $e)
        {
            echo 'O erro foi: ' . $e;
        }

    }



}

?>