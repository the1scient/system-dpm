<?php 
include("global.php");
echo "<div style='display: none;'>";

if($_SESSION["usuario"]) {
    header('Location: painel.php');
}
else {
    
}
echo "</div>";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title><?php echo $titulo_site ?> - Esqueceu a senha</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link rel="shortcut icon" href="<?php echo $imagem_site ?>" />

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper" style="background: rgb(0,0,0);
background: radial-gradient(circle, rgba(0,0,0,1) 0%, rgba(97,97,97,1) 37%, rgba(19,32,59,1) 78%);">
        <div class="page-content--bge5" style="background: rgb(0,0,0);
background: radial-gradient(circle, rgba(0,0,0,1) 0%, rgba(97,97,97,1) 37%, rgba(19,32,59,1) 78%);">
            <div class="container" style="background: rgb(0,0,0);
background: radial-gradient(circle, rgba(0,0,0,1) 0%, rgba(97,97,97,1) 37%, rgba(19,32,59,1) 78%);">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                            <h3>System DPM - Esqueci minha senha <img src="<?php echo $imagem_site ?>" /></h3> 
                            </a>
                        </div>
                        <div class="login-form">
                            <form action="kernel/esqueceu_senha.php" method="post">
                                <div class="form-group">
                                    <label>Usuário</label>
                                    <input class="au-input au-input--full" type="text" name="usuario" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <label>Nova senha</label>
                                    <input class="au-input au-input--full" type="password" name="senha" placeholder="Email">
                                </div>
                                <?php $numrand = rand(1000, 9999);
                            $_SESSION["cod_secreto"] = "DPM-".$numrand;
                        ?>
                                <div class="form-group">
                                    <label>Missão</label>
                                    <input class="au-input au-input--full" type="text" name="password" style="background-color: rgba(0,0,0,0.1); border-bottom: 3px solid gray;" disabled value="DPM-<?php echo $numrand ?>">
                                    <small>Coloque o código acima em sua missão. Espere cerca de 10 segundos e clique em mudar senha.</small>
                                </div>
                               
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">Mudar senha</button>
                              
                            </form>
                            <div class="social-login-content">
                                    <div class="social-button">
                                    <button class="au-btn au-btn--block au-btn--black m-b-20" onclick="location.href='index.php'" style="background-color: black;">Ir ao Login</button>
                                    </div>
                                </div>
                            <div class="register-link">
                            <p>Desenvolvido <i class="fa fa-code"></i> com <i class="fa fa-heart"></i> por <a href="https://github.com/the1scient/" target="_blank">theGuiihBR</a></p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

</body>

</html>
<!-- end document-->