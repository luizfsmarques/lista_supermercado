<?php

namespace App\Lib;

class Criptografia
{
    private $primaryKeyCript;
    private $options;

    //Para criptografar primary key
    public function setPrimaryKeyCript($fator=null)
    {
        $this->primaryKeyCript = md5( microtime() );
    }

    public function getPrimaryKeyCript()
    {
        return $this->primaryKeyCript;
    }

}