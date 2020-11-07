<?php 
include("global.php");
include("kernel/verifica_login.php");
include("kernel/get_user_patente.php");
include("kernel/get_patente.php");
$usuarioNome = $_SESSION["usuario"];
$typeform = htmlspecialchars($_GET["type"]);
$getuserperm = mysqli_query($conn, "SELECT * FROM painel WHERE usr_habbo = '{$usuarioNome}' AND usr_perm = 1");
$perm = mysqli_num_rows($getuserperm);

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
                                    
                                    <?php if($typeform == "gerusers" && $perm > 0): 
                                    echo '  <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <!-- DATA TABLE-->
                                        <div class="table-responsive m-b-40">
                                            <table class="table table-borderless table-data3">
                                                <thead>
                                                    <tr>
                                                        <th>imagem</th>
                                                        <th>nick</th>
                                                        <th>patente</th>
                                                        <th>status</th>
                                                        <th>ação</th>
                                                    </tr>
                                                </thead>
                                                <tbody>';
                                        $select_all_users = mysqli_query($conn, "SELECT * FROM painel ORDER BY id ASC");
                                    while($r = mysqli_fetch_array($select_all_users)) {
                                        $usr_habbo = $r["usr_habbo"];
                                    $getmembro = mysqli_query($conn, "SELECT * FROM membros WHERE usr_habbo = '{$usr_habbo}'");
                                    $rmembro = mysqli_fetch_array($getmembro);
                                        $patente_id = $rmembro["usr_patente"];
                                        $usr_exec = $rmembro["usr_executivo"];
                                        $usr_status = $rmembro["usr_status"];
                                        $select_u_p = mysqli_query($conn, "SELECT * FROM patentes WHERE id = '{$patente_id}'");
                                        $r_u_p = mysqli_fetch_array($select_u_p);
                                        if($usr_exec == 1) {
                                            $usr_patente = $r_u_p["patente_executivo"];
                                        }
                                        else {
                                            $usr_patente = $r_u_p["patente"];
                                        }

                                        if($usr_status >= 2 && $usr_status <= 4) {
                                            $classe = "denied";
                                            $textoclasse = "Não ativo";
                                        }
                                        else {
                                            $classe = "process";
                                            $textoclasse = "Ativo";
                                        }
                                        ?>
                                      
                                            <tr>
                                                <td><img src="https://www.habbo.com.br/habbo-imaging/avatarimage?user=<?php echo $usr_habbo ?>&action=std&direction=2&head_direction=2&gesture=std&size=b"></td>
                                                <td><?php echo $usr_habbo ?></td>
                                                <td><?php echo $usr_patente ?></td>
                                                <td class="<?php echo $classe ?>"><?php echo $textoclasse ?></td>
                                                <td><a style="color: red" href="kernel/action.php"><i class="fa fa-gavel"></i> Desativar</a></td>
                                            </tr>
                                         
                                    <?php } echo '  
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE-->
                            </div>
                        </div>';
                                endif; ?>


                                

                                    <?php 
                                    
                                    $sql_select_guia = mysqli_query($conn, "SELECT * FROM guias WHERE nickname = '{$usuarioNome}'");
                                    $num_select_guia = mysqli_num_rows($sql_select_guia);
                                    
                                    if($typeform == "ver_guias" && $num_select_guia > 0):
                                    
                                        echo '  <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>imagem</th>
                                                <th>nick</th>
                                                <th>patente</th>
                                                <th>cargo</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>';
                                    $sql_get_guias = mysqli_query($conn, "SELECT * FROM guias ORDER BY id ASC");
                                    while($resguias = mysqli_fetch_array($sql_get_guias)) {
                                    ?>
                                       
                                            <tr>
                                                <td><img src="https://www.habbo.com.br/habbo-imaging/avatarimage?user=<?php echo $resguias['nickname'] ?>&action=std&direction=2&head_direction=2&gesture=std&size=b"></td>
                                                <td style='font-weight: bold;'><?php echo $resguias['nickname'] ?></td>
                                                <td><?php $name = $resguias['nickname']; 
                                                getuserpatente($name); ?></td>
                                                <td>a</td>
                                               <!-- <td><a style="color: red" href="kernel/action.php"><i class="fa fa-gavel"></i> Desativar</a></td> -->
                                            </tr>
                                         
                                    <?php } 
                                echo '  
                                </tr>
                            </tbody>
                        </table>';
                                endif; ?>



                                    
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
