<?php

namespace App\Models\Entidades\Carrinho;

class Carrinho
{
    private $codigo_carrinho;
    private $codigo;
    private $medida;
    private $quantidade;

    public function setCodigo_carrinho($codigo_carrinho)
    {
        $this->codigo_carrinho = $codigo_carrinho;
    }

    public function getCodigo_carrinho()
    {
        return $this->codigo_carrinho;
    }

    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    }

    public function getCodigo()
    {
        return $this->codigo;
    }

    public function setMedida($medida)
    {
        $this->medida = $medida;
    }

    public function getMedida()
    {
        return $this->medida;
    }

    public function setQuantidade($quantidade)
    {
        $this->quantidade = $quantidade;
    }

    public function getQuantidade()
    {
        return $this->quantidade;
    }


}




?>