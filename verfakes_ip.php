<?php 
include("global.php");
include("kernel/verifica_login.php");
include("kernel/get_patente.php");
$usuarioNome = $_SESSION["usuario"];

$getuserperm = mysqli_query($conn, "SELECT * FROM painel WHERE usr_habbo = '{$usuarioNome}' AND usr_perm = 1");
$perm = mysqli_num_rows($getuserperm);
if($perm == 0) {
    $usu_ip = $_SERVER['REMOTE_ADDR'];
    $insert_log = mysqli_query($conn, "INSERT INTO logs(usr_habbo, msg, usr_ip) VALUES('{$usuarioNome}', 'Tentou acessar uma página proibida com IP: ', '{$usu_ip}')");
    header('Location: index.php');
}

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
    <link rel="shortcut icon" href="<?php echo $imagem_site ?>" />

    <!-- Title Page-->
    <title><?php echo $titulo_site ?> - Painel</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

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
    <link href="vendor/vector-map/jqvmap.min.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">
 
</head>

<body class="animsition">
    <div class="page-wrapper">

        <?php include("includes/sidebar.php");?>

        <!-- PAGE CONTAINER-->
        <div class="page-container2">
            <!-- HEADER DESKTOP-->
            <?php include("includes/header.php"); ?>
            
            <!-- END HEADER DESKTOP-->

            <!-- BREADCRUMB-->
            <section class="au-breadcrumb m-t-75">
               
            </section>
            <!-- END BREADCRUMB-->

            <!-- STATISTIC-->
            <section class="statistic">
               
            </section>
            <!-- END STATISTIC-->
<!-- Começo sistema de formulários -->
            <section>
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="recent-report2">
                                    <h3 class="title-3"></h3>
                                    
                                   
                                    <style>
input[type=text] {
width: 294px;
padding: 12px 20px;
margin: 8px 0;
text-align: center;
box-sizing: border-box;
border: 2px solid #31708f;
border-radius: 6px;
}
.introdução {
background-color: #31708f;
padding-left: 20px;
padding-top: 10px;
padding-bottom: 15px;
padding-right: 25px;
border-radius: 2px;
}
.texto-busca {
color: #fff;
font-size: 14px;
}
.btn{display:inline-block;font-weight:400;line-height:1.25;text-align:center;white-space:nowrap;vertical-align:middle;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none;border:1px solid transparent;padding:.5rem 1rem;font-size:1rem;border-radius:.25rem;-webkit-transition:all .2s ease-in-out;-o-transition:all .2s ease-in-out;transition:all .2s ease-in-out}
.btn-info{color:#31708f;background-color:#fff;border-color:#fff}.btn-info:hover{color:#fff;background-color:#2a6683;border-color:#2a6683}.btn-info.focus,.btn-info:focus{-webkit-box-shadow:0 0 0 2px #99c586;box-shadow:0 0 0 2px #99c586}.btn-info.disabled,.btn-info:disabled{background-color:#4b6a3d;border-color:#4b6a3d}.btn-info.active,.btn-info:active,.show>.btn-info.dropdown-toggle{color:#fff;background-color:#4b6a3d;background-image:none;border-color:#4b6a3d}
</style>
<script>
function Mudarestado(el) {
        var display = document.getElementById(el).style.display;
        if(display == "none")
            document.getElementById(el).style.display = 'block';
    }
</script>
<script type='text/javaScript'>
function Trim(str){
 return str.replace(/( )/ig,"");
}
</script>
<div class='introdução'>
<div style='padding: 15px; text-align: center;'>
<form action='./includes/ajax_verfakes_ip.php' class='buscar' method='get' target='pesquisado'>
<div class='texto-busca'>Digite um IP para pesquisar: </div>
<input class='buscar-barra' id='main2' name='consulta' onkeyup='this.value = Trim( this.value )' placeholder='Insira um IP...' required='' type='text' value=''/>
<input class='btn btn-info' onclick='Mudarestado("exibir")' type='submit' value='Buscar'/>
</form>
</div>
<div id='exibir' style='display: none;'>
<center>
<span style='color:#e3e1e1;padding-top: 5px'><b>Resultado</b></span></center>
<center><iframe frameborder='0' id='pesquisado' name='pesquisado' src='' style='height: auto;min-height:160px; margin-top: 7px; width: 515px;'></iframe></center>
</div>
</div>

                                   
                                        <div class="row m-t-30">
                            <div class="col-md-12">
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                  
                                </div>
                                <!-- END DATA TABLE-->
                            </div>
                        </div>
                                      </div>
                                
                            </div>
               
                        </div>
                    </div>
                </div>
            </section>
<!-- Fim sistema de formulários -->
           <?php include("includes/footer.php"); ?>
            <!-- END PAGE CONTAINER-->
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
    <script src="vendor/vector-map/jquery.vmap.js"></script>
    <script src="vendor/vector-map/jquery.vmap.min.js"></script>
    <script src="vendor/vector-map/jquery.vmap.sampledata.js"></script>
    <script src="vendor/vector-map/jquery.vmap.world.js"></script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

</body>

</html>
<!-- end document-->
