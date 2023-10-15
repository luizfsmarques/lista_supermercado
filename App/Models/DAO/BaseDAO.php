<?php

namespace App\Models\DAO;

use App\Lib\Conexao;

abstract class BaseDAO
{
    private $connection;

    public function __construct()
    {
        $this->connection = Conexao::getConnection();
    }

    public function insert($table,$cols,$values)
    {
        if( !empty($table) && !empty($cols) && !empty($values) )
        {   
            $parametros = $cols;
            $cols = str_replace(':',"",$cols);

            $stmt = $this->connection->prepare("INSERT INTO $table ($cols) VALUES ($parametros)");
            $stmt->execute($values);

            return $stmt->rowCount();
        }else
        {
            return false;
        }
    }

    public function select($sql)
    {
        if(!empty($sql))
        {
            return $this->connection->query($sql);
        }
    }

    public function update($table,$cols,$values,$where=null)
    {
        if(!empty($table) && !empty($cols) && !empty($values))
        {
            if($where)
            {
                $where = "WHERE $where";
            }
            $stmt = $this->connection->prepare("UPDATE $table SET $cols $where");
            $stmt->execute($values);

            return $stmt->rowCount();
        }else
        {
            return false;
        }
    }

    public function delete($table, $where = null)
    {
        if(!empty($table))
        {   
            if($where)
            {
                $where = "WHERE $where";
            }

            $stmt = $this->connection->prepare("DELETE FROM $table $where");
            $stmt->execute();

            return $stmt->rowCount();
        }else
        {
            return false;
        }
    }

    public function zera_auto_increment($tabela)
    {
        $stmt = $this->connection->prepare("ALTER TABLE ".$tabela." AUTO_INCREMENT=1");
        $stmt->execute();
    }
    

}

?>