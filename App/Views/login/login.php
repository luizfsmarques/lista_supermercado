 <!-- Na sequencia ele e o 1 a ser chamado -->

 <!DOCTYPE html>
 <html lang="pt-br">
    <head> 
         <meta charset="utf-8">
         <meta name="viewport" content="width=device-width,initial-scale=1.0">
         <title>Supermercado</title>
 
         <!-- BOOTSTRAP ICONS -->
         <link rel="stylesheet" href="./public/icons/bootstrap-icons.min.css" type="text/css">
 
         <!-- BOOTSTRAP CSS -->
         <link href="./public/css/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css"> 
 
         <!-- BOOTSTRAP JS -->
         <script src="./public/js/bootstrap/bootstrap.bundle.min.js"></script>
 
         <!-- FONTES -->
         <style>
             @font-face {
             font-family: Roboto-medium;
             src: url('./public/fonts/Roboto/Roboto-Medium.ttf')format('opentype');
             }
             @font-face {
             font-family: Roboto-regular;
             src: url('./public/fonts/Roboto/Roboto-Regular.ttf')format('opentype');
             }
         </style>
 
         <!-- TESTAR SE NA PRODUÇÃO PEGA ASSIM -->
         <link rel="stylesheet" href="./public/css/reset.css" type="text/css">
         <link rel="stylesheet" href="./public/css/layout_novo/geral.css" type="text/css">
         <link rel="stylesheet" href="./public/css/layout_novo/topo-perfil.css" type="text/css">
         <link rel="stylesheet" href="./public/css/layout_novo/menu.css" type="text/css">
         <!-- <link rel="stylesheet" href="./public/css/<?php echo $viewVar['estiloPagina'];?>.css" type="text/css"> -->
         <link rel="stylesheet" href="./public/css/layout_novo/rodape.css" type="text/css">
 
 
         <!-- PARA PRODUÇÃO... NÃO QUIS PEGAR DE OUTRO JEITO NO DESENVOLVIMENTO -->
         <!-- <link rel="icon" href="/public/img/title.png" type="image/png">
         <link rel="stylesheet" href="/public/css/reset.css" type="text/css">
         <link rel="stylesheet" href="/public/css/layout_novo/geral.css" type="text/css">
         <link rel="stylesheet" href="/public/css/layout_novo/topo-perfil.css" type="text/css">
         <link rel="stylesheet" href="/public/css/layout_novo/menu.css" type="text/css">
         <link rel="stylesheet" href="/public/css/<?php //echo $viewVar['estiloPagina'];?>.css" type="text/css">
         <link rel="stylesheet" href="/public/css/layout_novo/rodape.css" type="text/css"> -->
 
    </head>
 
    <body>
 
        <main>

            <div class="container-fluid">

                <form action="<?php echo APP_HOST;?>/login/autenticacao_temporaria" method="POST">
                    <div class="mb-3">
                      <label for="email" class="form-label">Email address</label>
                      <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="password">
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>

            </div>


        </main>    





        










    </body>
