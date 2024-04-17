<?php
    session_start();

    // Verificar se o usuário está logado
    if (!isset($_SESSION['email'])) {
        // Se o usuário não estiver logado, redirecionar para a página de login
        header('Location: welcome.html');
        exit();
    } else {
        // Se o usuário estiver logado, exibir os dados do usuário
        $nome = $_SESSION['nome_completo'];
        $email = $_SESSION['email'];
        $logradouro = $_SESSION['logradouro'];
        $numero = $_SESSION['numero'];
        $celular = $_SESSION['celular'];
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <link rel="icon" href="images/fevicon.png" type="image/gif" />
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Produtos</title>


  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet"> <!-- range slider -->

  <!-- font awesome style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="css/index.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />

</head>

<body class="sub_page">
  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="header_bottom" style="background-color: #AB8130;">
        <div class="container-fluid">
          <nav class="navbar navbar-expand-lg custom_nav-container ">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class=""> </span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ">
                <li class="nav-item ">
                  <a class="nav-link" href="index.php">Produtos</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Minha conta</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Carrinho</a>
                </li>
              </ul>
            </div>
          </nav>
        </div>
      </div>
    </header>
    <!-- end header section -->
  </div>


  <!-- product section -->

  <section class="product_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Lista de Produtos
        </h2>
      </div>
      <div class="row">
        <div class="col-sm-6 col-lg-4">
          <div class="box">
            <div class="img-box">
              <img src="assets/img/p1.png" alt="">
              <a href="" class="add_cart_btn">
                <span>
                  Adcionar no carrinho
                </span>
              </a>
            </div>
            <div class="detail-box">
              <h5>
                <!-- Colocar nome do produto -->
                Nome do Produto
              </h5>
              <div class="product_info">
                <h5>
                  <!-- COLOCAR O PREÇO DO PRODUTO -->
                  <span>R$35</span>
                </h5>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-4">
          <div class="box">
            <div class="img-box">
              <img src="assets/img/p1.png" alt="">
              <a href="" class="add_cart_btn">
                <span>
                  Adcionar no carrinho
                </span>
              </a>
            </div>
            <div class="detail-box">
              <h5>
                Product Name
              </h5>
              <div class="product_info">
                <h5>
                  <span>R$300</span>
                </h5>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-4">
          <div class="box">
            <div class="img-box">
              <img src="assets/img/p1.png" alt="">
              <a href="" class="add_cart_btn">
                <span>
                  Adcionar no carrinho
                </span>
              </a>
            </div>
            <div class="detail-box">
              <h5>
                Product Name
              </h5>
              <div class="product_info">
                <h5>
                  <span>R$300</span>
                </h5>
              </div>
            </div>
          </div>
        </div>
    </div>
  </section>
  <!-- end product section -->

  <!-- jQery -->
  <script src="js/jquery-3.4.1.min.js"></script>
  <!-- bootstrap js -->
  <script src="js/bootstrap.js"></script>
  <!-- custom js -->
  <script src="js/custom.js"></script>
</body>
</html>


<?php
    }
?>
