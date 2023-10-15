<?php

use App\App;
// use Exception; // Tem na produção. Funciona?

error_reporting(E_ALL & ~E_NOTICE); // Os erros não prejudiciais não são avisados.

require_once("vendor/autoload.php");

session_start();

try{

    $app = new App();
    $app->run();

}catch(\Exception $e)
{
    echo "O erro foi: " . $e;
}

?>