<?php

namespace App;

use App\Controllers\LoginController;


use Exception;

class App{

    private $controller;
    private $controlleName;
    private $controllerFile;
    private $metodo;
    private $params;
    private $params1;

    public function __construct() // Constantes de todo o sistema
    {
        define("APP_HOST", "http://". $_SERVER['HTTP_HOST'] . "/lista_supermercado");
        define("PATH", realpath("./"));
        define("DB_HOST", "localhost");
        define("DB_USER", "root");
        define("DB_PASSWORD", "");
        define("DB_NAME","lista_supermercado");
        define("DB_DRIVER", "mysql");

        // // O de baixo e para producao
        // define("APP_HOST", "https://". $_SERVER['HTTP_HOST'] . "/lista_supermercado");
        // define("PATH", realpath("./"));
        // define("DB_HOST", "br20");
        // define("DB_USER", "codi6043_codigo_pratico");
        // define("DB_PASSWORD", "codigoLuiz2412");
        // define("DB_NAME","codi6043_lista_supermercado");
        // define("DB_DRIVER", "mysql");

        $this->url();

    }

    private function url() //Trata a url para se tornar amigável
    {
        if( isset($_GET['url']))
        {
            $path = $_GET['url'];
            $path = rtrim($path,'/');
            $path = filter_var($path, FILTER_SANITIZE_URL);
            $path = explode('/',$path);

            $this->controller = $this->verifica_array($path,0);
            $this->metodo = $this->verifica_array($path,1);

            if( $this->params = $this->verifica_array($path,2) )
            {
                unset($path[0]);
                unset($path[1]);
                $params = array_values($path);
            }

            if( $this->params1 = $this->verifica_array($path,3) )
            {
                unset($path[0]);
                unset($path[1]);
                unset($path[2]);
                $params1 = array_values($path);
            }
            
        }
    }

    private function verifica_array($array, $key) // verifica se os campos da url estão com conteúdo
    {
        if( isset( $array[$key]) && !empty($array[$key]))
        {
            return $array[$key];
        }
        return null;
    }

    public function run() 
    {
        //TIRANDO O LOGIN, ESSE CÓDIGO FEZ CHAMAR DUAS VEZES A MESMA TELA

        if(!$this->controller)
        {
            $login = new LoginController();
            $login->exibe();

        }

        if($this->controller)
        {
            
            $this->controllerName = ucwords($this->controller) . "Controller";
            $this->controllerName =  preg_replace("/[^A-Za-z]/i",'',$this->controllerName);     
        }else
        {
            $this->controllerName = "LoginController";

        }

        $this->controllerFile = $this->controllerName . ".php";

        if(!file_exists(PATH ."/App/Controllers/" . $this->controllerFile))
        {
            // throw new Exception("Página não encontrada!",404);
            echo "Página não encontrada!";
        }

        $classe = 'App\\Controllers\\' . $this->controllerName;
        $objeto = new $classe();

        if(!class_exists($classe))
        {
            // throw new Exception("Erro na aplicação!",500);
            echo "Erro na aplicação";
        }

        if(!$this->metodo)
        {
            $objeto->exibe();
        }

        if(method_exists($objeto, $this->metodo) )
        {
            $objeto->{$this->metodo}($this->params,$this->params1);
        }else if($this->metodo && !method_exists($objeto, $this->metodo) )
        {
            // throw new Exception ("Erro na aplicação!",500);
            echo "Erro na aplicação!";
        }

    }

    public function getController()
    {
        return $this->controller;
    }

    public function getControllerName()
    {
        return $this->controllerName;
    }

    public function getControllerFile()
    {
        return $this->controllerFile;
    }

    public function getMetodo()
    {
        return $this->metodo;
    }

    public function getParams()
    {
        return $this->params;
    }

    public function getParams1()
    {
        return $this->params;
    }
}

?>