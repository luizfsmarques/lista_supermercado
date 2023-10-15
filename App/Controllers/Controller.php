<?php //Aqui tem codigo para produção

namespace App\Controllers;

use App\Lib\verificaLogin;
use App\Lib\OrganizaString;
use App\Controllers\Usuarios;
use App\Models\Autenticacao\Autenticacao;

abstract class Controller
{
    private $viewVar;

    public function render($view)
    {
        // require_once "C:/xampp/htdocs/lista_supermercado/App/Views/" . $view . ".php";
        require_once "C:/xampp/htdocs/lista_supermercado/App/Views/" . $view . ".html";
        // O de baixo vai para producao
        // require_once PATH . "/App/Views/" . $view . ".html";   
    }

    public function renderPHP($view)
    {
        $viewVar = $this->getViewVar(); 

        // require_once "C:/xampp/htdocs/lista_supermercado/App/Views/" . $view . ".php";
        // require_once "C:/xampp/htdocs/lista_supermercado/App/Views/" . $view . ".php";
        // O de baixo vai para producao
        require_once PATH . "/App/Views/" . $view . ".php";
        
    }


    //PARA LAYOUT NOVO
    public function render_layout($view=null,$style=null)
    {
        $logado = false;

        if( !empty($_SESSION['logado']) && ($_SESSION['logado'] == true) )
        {   
            $logado = true;
        }
    
        $this->setViewVar('estiloPagina', $style);

        if($logado == true)
        {
            $viewVar = $this->getViewVar();
 
            require_once PATH . "/App/Views/layout/header.php";
            require_once PATH . "/App/Views/layout/navbar.php";
            require_once PATH . "/App/Views/" . $view . ".php";
            // require_once PATH . "/App/Views/" . $view . ".html";
            require_once PATH . "/App/Views/layout/footer.php";

        }else
        {
            header("Location:".APP_HOST."/");

            unset($_SESSION['user']);
            unset($_SESSION['nome']);
            unset($_SESSION['permissao']);
        }
    }




    public function redirect($view)
    {
        header("Location:" . APP_HOST . $view);
        exit;
    }

    // Codigo para fazer o logout do sistema
    public function logout()
    {   
        unset($_SESSION['logado']);
        unset($_SESSION['email']);
        header("Location:".APP_HOST."/");

    }


    // public function mensagem_sucesso()
    // {
    //     $_SESSION['mensagem_sucesso'] = true;
    // }


    public function setViewVar($varName, $varValue)
    {
        if( $varName!="" && $varValue!="")
        {
            $this->viewVar[$varName] = $varValue;
        }
        
    }

    public function getViewVar()
    {
        return $this->viewVar;
    }



}

?>