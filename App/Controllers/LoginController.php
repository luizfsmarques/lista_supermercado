<?php 

namespace App\Controllers;

use App\Controllers\Controller;

class LoginController extends Controller
{

    public function exibe()
    {   
        $this->renderPHP('/login/login');
    }   

    public function autenticacao_temporaria()
    {
        
        if( !empty($_POST) && ( $_POST['email']==='l.fernando.9.lfsm@gmail.com' ) &&  ( $_POST['password']==='Luiz2412' ) )
        {

            $_SESSION['logado'] = true;
            $_SESSION['email'] = $_POST['email'];

            $this->redirect( '/carrinho' );

        }
        else
        {
            echo "vc não pode entrar! <br><br>";

            echo "<a href='".APP_HOST."/'> VOLTAR  </a>";
        }

    }



}


?>