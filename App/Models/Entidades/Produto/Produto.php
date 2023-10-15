<?php

namespace App\Models\Entidades\Produto;

class Produto
{
    private $codigo;
    private $nome;
    private $categoria_cobranca;
    private $valor;

    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    }

    public function getCodigo()
    {
        return $this->codigo;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setCategoria_cobranca($categoria_cobranca)
    {
        $this->categoria_cobranca = $categoria_cobranca;
    }

    public function getCategoria_cobranca()
    {
        return $this->categoria_cobranca;
    }

    public function setValor($valor)
    {
        $this->valor = $valor;
    }

    public function getValor()
    {
        return $this->valor;
    }

}




?>