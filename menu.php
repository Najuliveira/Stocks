<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Menu</title>
    <link href="css/menu.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  
    <style>
        .offcanvas-body .navbar-nav .nav-link {
            font-size: 2.1rem; /* Aumente ou diminua o valor para ajustar o tamanho da fonte */
            color: #004161;
            font-family: Inter;
            letter-spacing: -0.2rem;
            margin-top: 2.1rem;
        }

        .offcanvas-header{
            margin-top: 1.9rem;
        }

        .btn-close{
            color: #004161;
            font-size: 2.5rem;  
        }

        .icon{
          margin-top: -0.5rem;
        }

        .container-fluid{
          width:  61.3125rem;
          height: 9.5rem;
        }
        
    </style>
  </head>

<body>
<?php 
$id = $_GET['id'];
?> 

  <div id="geral">
    <nav id="superior" class="navbar fixed-top">
        <div class="container-fluid">
        <a id="logoMenu" class="fixed-top" <?php if ($id == 1) { echo 'href="telaLoja.php?id=' . $id . '"'; } ?>>
          <img src="imagens/logo.png" alt="Logo" width="33%" height="25%">
        </a>
                <button id="sanduiche" class="navbar-toggler border border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
          <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
               <p class="offcanvas-title" id="offcanvasNavbarLabel"></p>
                 <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
              <div class="offcanvas-body">
                 <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <!--PROJETOS FUTUROS<li class="nav-item">
                       <a class="nav-link" href="#"><img src="imagens/iconPerfil.png" class="icon" alt="perfil" width="14%" height="9%">&nbsp&nbsp Visualizar perfil</a>
                    </li>-->
                    <li class="nav-item">
                       <a href='sair.php' class="nav-link" href="#"><img src="imagens/iconSair.png" class="icon" alt="sair" width="13%" height="8%">&nbsp&nbsp Sair</a>
                      </li>
                   
                  </form>
                  
              </div>
            </div>
        </div>
    </nav>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
