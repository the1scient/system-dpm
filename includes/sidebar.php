<?php 
include_once("./global.php");
include("kernel/get_patente.php");
$usuarioNome = $_SESSION["usuario"];

$sql_get_adm = mysqli_query($conn, "SELECT * FROM painel WHERE usr_habbo = '{$usuarioNome}' AND usr_perm >= 1");
$count_get_adm = mysqli_num_rows($sql_get_adm);

$sql_select_guia = mysqli_query($conn, "SELECT * FROM guias WHERE nickname = '{$usuarioNome}'");
$num_select_guia = mysqli_num_rows($sql_select_guia);
$fetch_select_guia = mysqli_fetch_array($sql_select_guia);
$getlider_guia = $fetch_select_guia["cargo"];


$patente_id = $patente_id;


$getusersudo = mysqli_query($conn, "SELECT * FROM painel WHERE usr_habbo = '{$usuarioNome}'");
$sqlfetchsudo = mysqli_fetch_array($getusersudo);
$usr_sudo = $sqlfetchsudo["usr_perm"];

?>
<!-- MENU SIDEBAR-->
<aside class="menu-sidebar2">
            <div class="logo" style="background: #47494e;">
                <a href="painel.php">
                    <h3 style="color: white;"><img src="<?php echo $imagem_site ?>"> <?php echo $titulo_site ?> </h3>
                </a>
            </div>
            <div class="menu-sidebar2__content js-scrollbar1">
                <div class="account2">
                   
                       <div style="margin-top: -35px; height: 120px; width: 50%; background: url(https://www.habbo.com.br/habbo-imaging/avatarimage?&user=<?php echo $usuarioNome ?>&action=&direction=4&head_direction=3&img_format=png&gesture=&headonly=0&size=l),  radial-gradient(circle, rgba(97,97,97,1) 64%, rgba(0,0,0,1) 85%); background-position: center top -30px; border-radius: 60px; "></div>
                  
                    <h4 style="font-family: cursive;"><?php echo $usuarioNome ?></h4>
                    <a href="#">Patente: <strong><?php echo $patente_nome ?></strong></a>                </div>
                <nav class="navbar-sidebar2">
                    <ul class="list-unstyled navbar__list">
                        <li class="active has-sub">
                            <a class="js-arrow" href="painel.php">
                                <i class="fas fa-home"></i>Home
                              
                            </a>
                           
                        </li>
                      
                      <?php if($count_get_adm > 0): ?>
                        <li class="has-sub">
                            <a class="js-arrow" href="#" style="color: red;">
                                <i class="fas fa-gavel"></i>Administração
                                <span class="arrow">
                                    <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                            <?php if($usr_sudo > 1): ?>
                            <li>
                                    <a href="tables.php?type=gerusers">
                                    <i class="fas fa-gear"><i class="fas fa-users"></i></i>Gerenciar usuários com permissão</a>
                            </li><?php endif; ?>
                                <li>
                                    <a href="viewlogs.php">
                                   <i class="fas fa-search"></i>Logs</a>
                                </li>
                                <li>
                                    <a href="verfakes_nome.php">
                                   <i class="fas fa-search"></i>Ver fakes por nome</a>
                                </li>
                                <li>
                                    <a href="verfakes_ip.php">
                                   <i class="fas fa-search"></i>Ver fakes por IP</a>
                                </li>
                            </ul>
                        </li>
                      
                        <?php if($patente_id <= 5): ?>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-suitcase"></i>Direção
                                <span class="arrow">
                                    <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="forms.php?type=add_ts">
                                        <i class="fas fa-sign-in-alt"></i>T. Soldados (TS)</a>
                                </li>
                               
                           
                            </ul>
                        </li>
                        <?php endif; ?>
                    <?php endif; ?>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-copy"></i>Relatórios
                                <span class="arrow">
                                    <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                            <li>
                                    <a href="forms.php?type=aval">
                                        <i class="fas fa-sign-in-alt"></i>Solicitar Aval</a>
                                </li>
                             
                            </ul>
                        </li>
                        <?php if($num_select_guia > 0): ?>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-user-md"></i>Guias
                                <span class="arrow">
                                    <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                            <?php if($getlider_guia > 1):?>
                            <li >
                                    <a href="forms.php?type=add_guia" style='color: red;'>
                                        <i class="fas fa-sign-in-alt"></i>Adicionar guia</a>
                                </li>
                           <?php endif; ?>
                                <li>
                                    <a href="forms.php?type=add_ts">
                                        <i class="fas fa-sign-in-alt"></i>T. Soldados (TS)</a>
                                </li>
                                <li>
                                    <a href="tables.php?type=ver_guias">
                                        <i class="fas fa-sign-in-alt"></i>Ver lista de Guias</a>
                                </li>
                         
                            </ul>
                        </li>
                        <?php endif; ?>


                     
                            


                        <li>
                            <a href="inbox.html">
                                <i class="fas fa-chart-bar"></i>Inbox</a>
                            <span class="inbox-num">3</span>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fas fa-shopping-basket"></i>eCommerce</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-copy"></i>Pages
                                <span class="arrow">
                                    <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="login.html">
                                        <i class="fas fa-sign-in-alt"></i>Login</a>
                                </li>
                                <li>
                                    <a href="register.html">
                                        <i class="fas fa-user"></i>Register</a>
                                </li>
                                <li>
                                    <a href="forget-pass.html">
                                        <i class="fas fa-unlock-alt"></i>Forget Password</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-trophy"></i>Features
                                <span class="arrow">
                                    <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="table.html">
                                        <i class="fas fa-table"></i>Tables</a>
                                </li>
                                <li>
                                    <a href="form.html">
                                        <i class="far fa-check-square"></i>Forms</a>
                                </li>
                                <li>
                                    <a href="calendar.html">
                                        <i class="fas fa-calendar-alt"></i>Calendar</a>
                                </li>
                                <li>
                                    <a href="map.html">
                                        <i class="fas fa-map-marker-alt"></i>Maps</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-desktop"></i>UI Elements
                                <span class="arrow">
                                    <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="button.html">
                                        <i class="fab fa-flickr"></i>Button</a>
                                </li>
                                <li>
                                    <a href="badge.html">
                                        <i class="fas fa-comment-alt"></i>Badges</a>
                                </li>
                                <li>
                                    <a href="tab.html">
                                        <i class="far fa-window-maximize"></i>Tabs</a>
                                </li>
                                <li>
                                    <a href="card.html">
                                        <i class="far fa-id-card"></i>Cards</a>
                                </li>
                                <li>
                                    <a href="alert.html">
                                        <i class="far fa-bell"></i>Alerts</a>
                                </li>
                                <li>
                                    <a href="progress-bar.html">
                                        <i class="fas fa-tasks"></i>Progress Bars</a>
                                </li>
                                <li>
                                    <a href="modal.html">
                                        <i class="far fa-window-restore"></i>Modals</a>
                                </li>
                                <li>
                                    <a href="switch.html">
                                        <i class="fas fa-toggle-on"></i>Switchs</a>
                                </li>
                                <li>
                                    <a href="grid.html">
                                        <i class="fas fa-th-large"></i>Grids</a>
                                </li>
                                <li>
                                    <a href="fontawesome.html">
                                        <i class="fab fa-font-awesome"></i>FontAwesome</a>
                                </li>
                                <li>
                                    <a href="typo.html">
                                        <i class="fas fa-font"></i>Typography</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="logout.php" style="color: black;">
                                <i class="fas fa-power-off"></i>Logout</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->
