<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Tela Loja_ADM</title>
  <link href="css/menu.css" rel="stylesheet" type="text/css">
  <meta name="viewport" content="width=device-width, initial-scale=0.4">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
      <style>
        .btn{
          box-sizing: border-box;
          position: absolute;
          width:  48.5625rem;
          height: 13.4375rem;
          left: 11.8%;
          background: #FFFFFF;
          box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
          top:20rem;
        }

        #btn1{
          border: 0.13rem solid #075D87;
          border-radius: 1.2rem;
        }

        #btn2{
          margin-top: 18rem;
          border: 0.13rem solid #075D87;
          border-radius: 1.2rem;
        }

        #btn3{
          margin-top: 38rem;
          border: 0.13rem solid #075D87;
          border-radius: 1.2rem;
        }

        #btnN{
          margin-top: 58rem;
          border: 0.13rem solid #075D87;
          border-radius: 1.2rem;
        }
      
        p{    
          position: absolute;
          height: 72px;
          left: 38%;
          top: 4.3rem;
          font-family: 'Inter';
          font-style: light;
          font-weight: 600;
          font-size: 54px;
          color: #000000;
        }

        .img{
          width:  11rem;
          height: 11rem;
          margin-left: -72%;
          margin-top: 0.5%;
        }
      </style>
</head>

<body>
<?php require "menu.php"?>

<?php 
$id = $_GET['id'];
?>

<div id="telaLojas">
    <a href='telaMenuLoja.php?id_loja=1&id=<?php echo $id; ?>'><button type="button" id="btn1" class="btn"><img src="imagens/hanataba.png" class="img"><p id="p1">Hanataba Sushi</p></button></a>
    <a href='telaMenuLoja.php?id_loja=2&id=<?php echo $id; ?>'><button type="button" id="btn2" class="btn";><img src="imagens/ahka.png" class="img"><p>Ahka Sushi</p></button></a>
    <button type="button" id="btn3" class="btn"><img src="imagens/logoFantasia.png" class="img"><p>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspLoja</p></button>
    <button type="button" id="btnN" class="btn"><img src="imagens/logoFantasia.png" class="img"><p>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspLoja</p></button>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> 
</body>
</html>