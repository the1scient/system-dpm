<?php 
include("global.php");
include("kernel/verifica_login.php");
include("kernel/get_patente.php");
$usuarioNome = $_SESSION["usuario"];
$typeform = htmlspecialchars($_GET["type"]);

if(isset($_POST["enviar_ts"])) {
    $usuarios = $_POST["usuarios"];
    $str = explode("/", $usuarios);
    $obs = $_POST["observacoes"];
    foreach($str as $usr) {
        $query_inserir = mysqli_query($conn, "INSERT INTO membros(usr_habbo, usr_patente, usr_responsavel) VALUES('{$usr}', '17', '{$usuarioNome}')");
    }
    $query_relatorio_ts = mysqli_query($conn, "INSERT INTO relatorios(usr_habbo, recrutas, observacoes, tipo) VALUES('{$usuarioNome}', '{$usuarios}', '{$obs}', '0')");
    echo "<script type='text/javascript'>alert('Relatório de TS enviado com sucesso.');window.location.href='forms.php?type=add_ts';</script>";
}
elseif(isset($_POST["enviar_aval"])) {
    $data_inicio = $_POST["data_inicio"];
    $data_fim = $_POST["data_fim"];
    $motivos = $_POST["motivos"];
    $query_insert = mysqli_query($conn, "INSERT INTO avais(user, data_inicio, data_fim) VALUES('{$usuarioNome}', '{$data_inicio}', '{$data_fim}')");
    echo "<script type='text/javascript'>alert('Aval solicitado com sucesso.');window.location.href='painel.php';</script>";
}

elseif(isset($_POST['enviar_destaque'])) {
    $sql_update_destaques_inferior = mysqli_query($conn, "UPDATE membros SET usr_destaque = 0 WHERE usr_destaque = 1");
    $sql_update_destaques_superior = mysqli_query($conn, "UPDATE membros SET usr_destaque = 0 WHERE usr_destaque = 2");

    $destaque_inferior = $_POST["destaque_inferior"];
    $destaque_superior = $_POST["destaque_superior"];
$sql_new_destaque_inf = mysqli_query($conn, "UPDATE membros SET usr_destaque = 1 WHERE usr_habbo = '{$destaque_inferior}'");
$sql_new_destaque_sup = mysqli_query($conn, "UPDATE membros SET usr_destaque = 2 WHERE usr_habbo = '{$destaque_superior}'");
echo "<script type='text/javascript'>alert('Destaques atualizados com sucesso!');window.location.href='painel.php';</script>";


}

elseif(isset($_POST['promover'])) {
    # Verificação: usuário auto-promovendo
    $nick = $_POST['nickname'];
    $motivos = $_POST['motivos'];
    
    if($_POST['nickname'] == $usuarioNome) {
        echo "<script type='text/javascript'>alert('Você não pode se auto-promover!');window.location.href='painel.php';</script>";
        $usr_ip = $_SERVER['REMOTE_ADDR'];
        $sql_insertlog = mysqli_query($conn, "INSERT INTO logs(usr_habbo, msg, usr_ip, log_tipo) VALUES('{$usuarioNome}', 'Tentou se auto-promover.', '{$usr_ip}', '2')");

    }
    else {
    # verificação de poder de promoção:
        # pegar patente do usuário sendo promovido
        $sql_get_u_ptt = mysqli_query($conn, "SELECT * FROM membros WHERE usr_habbo = '{$nick}'");
        $fetch_get_u_ptt = mysqli_fetch_array($sql_get_u_ptt);
        $uptt_id = $fetch_get_u_ptt["usr_patente"];
        
        # comparação:
        if($poder_promover_patente < $uptt_id) { # Pode promover
            echo "<script type='text/javascript'>alert('Usuário promovido com sucesso!');window.location.href='painel.php';</script>";
            $newpatente_id = $uptt_id - 1;
            $usr_ip = $_SERVER['REMOTE_ADDR'];
        $sql_promover = mysqli_query($conn, "UPDATE membros SET usr_patente = '{$newpatente_id}', usr_responsavel = '{$usuarioNome}', usr_promo = CURRENT_TIMESTAMP() WHERE usr_habbo = '{$nick}'");
        $sql_insertlog = mysqli_query($conn, "INSERT INTO logs(usr_habbo, msg, usr_ip, log_tipo) VALUES('{$usuarioNome}', 'Promoveu o usuário {$nick} - {$motivos}', '{$usr_ip}', '1')");
        $sql_insertnoti = mysqli_query($conn, "INSERT INTO notificacoes(enviado_por, user, msg, noti_type) VALUES('{$usuarioNome}', '{$nick}', 'Você foi promovido! Motivos/descrições: {$motivos}', '1')");
        $sql_inserhist = mysqli_query($conn, "INSERT INTO historico(enviado_por, usr_habbo, tipo, msg) VALUES('{$usuarioNome}', '{$nick}', '1', '{$motivos}')");

    }
        else { # Não pode promover
            echo "<script type='text/javascript'>alert('Você não pode promover este usuário!');window.location.href='painel.php';</script>";
            $usr_ip = $_SERVER['REMOTE_ADDR'];
            $sql_insertlog = mysqli_query($conn, "INSERT INTO logs(usr_habbo, msg, usr_ip, log_tipo) VALUES('{$usuarioNome}', 'Tentou promover o usuário {$nick} mas não possui permissões.', '{$usr_ip}', '2')");

        }
    
        }



}

elseif(isset($_POST['rebaixar'])) {
    # Verificação: usuário auto-rebaixando
    $nick = $_POST['nickname'];
    $motivos = $_POST['motivos'];
    
    if($_POST['nickname'] == $usuarioNome) {
        echo "<script type='text/javascript'>alert('Você não pode se auto-rebaixar!');window.location.href='painel.php';</script>";
        $usr_ip = $_SERVER['REMOTE_ADDR'];
        $sql_insertlog = mysqli_query($conn, "INSERT INTO logs(usr_habbo, msg, usr_ip, log_tipo) VALUES('{$usuarioNome}', 'Tentou se auto-rebaixar.', '{$usr_ip}', '2')");

    }
    else {
    # verificação de poder de rebaixamento:
        # pegar patente do usuário sendo rebaixado
        $sql_get_u_ptt = mysqli_query($conn, "SELECT * FROM membros WHERE usr_habbo = '{$nick}'");
        $fetch_get_u_ptt = mysqli_fetch_array($sql_get_u_ptt);
        $uptt_id = $fetch_get_u_ptt["usr_patente"];
        
        # comparação:
        if($poder_rebaixar_patente < $uptt_id) { # Pode rebaixar
            echo "<script type='text/javascript'>alert('Usuário rebaixado com sucesso!');window.location.href='painel.php';</script>";
            $newpatente_id = $uptt_id + 1;
            $usr_ip = $_SERVER['REMOTE_ADDR'];
        $sql_promover = mysqli_query($conn, "UPDATE membros SET usr_patente = '{$newpatente_id}', usr_responsavel = '{$usuarioNome}', usr_promo = CURRENT_TIMESTAMP() WHERE usr_habbo = '{$nick}'");
        $sql_insertlog = mysqli_query($conn, "INSERT INTO logs(usr_habbo, msg, usr_ip, log_tipo) VALUES('{$usuarioNome}', 'Rebaixou o usuário {$nick} - {$motivos}', '{$usr_ip}', '1')");
        $sql_insertnoti = mysqli_query($conn, "INSERT INTO notificacoes(enviado_por, user, msg, noti_type) VALUES('{$usuarioNome}', '{$nick}', 'Você foi rebaixado. Motivos/descrições: {$motivos}', '3')");
        $sql_inserhist = mysqli_query($conn, "INSERT INTO historico(enviado_por, usr_habbo, tipo, msg) VALUES('{$usuarioNome}', '{$nick}', '3', '{$motivos}')");

    }
        else { # Não pode rebaixar
            echo "<script type='text/javascript'>alert('Você não pode rebaixar este usuário!');window.location.href='painel.php';</script>";
            $usr_ip = $_SERVER['REMOTE_ADDR'];
            $sql_insertlog = mysqli_query($conn, "INSERT INTO logs(usr_habbo, msg, usr_ip, log_tipo) VALUES('{$usuarioNome}', 'Tentou rebaixar o usuário {$nick} mas não possui permissões.', '{$usr_ip}', '2')");

        }
    
        }



}


elseif(isset($_POST['advertir'])) {
    # Verificação: usuário auto-rebaixando
    $nick = $_POST['nickname'];
    $motivos = $_POST['motivos'];
    
    if($_POST['nickname'] == $usuarioNome) {
        echo "<script type='text/javascript'>alert('Você não pode se auto-advertir!');window.location.href='painel.php';</script>";
        $usr_ip = $_SERVER['REMOTE_ADDR'];
        $sql_insertlog = mysqli_query($conn, "INSERT INTO logs(usr_habbo, msg, usr_ip, log_tipo) VALUES('{$usuarioNome}', 'Tentou se auto-advertir.', '{$usr_ip}', '2')");

    }
    else {
    # verificação de poder de advertencias:
        # pegar patente do usuário sendo advertido
        $sql_get_u_ptt = mysqli_query($conn, "SELECT * FROM membros WHERE usr_habbo = '{$nick}'");
        $fetch_get_u_ptt = mysqli_fetch_array($sql_get_u_ptt);
        $uptt_id = $fetch_get_u_ptt["usr_patente"];
        
        # comparação:
        if($poder_rebaixar_patente < $uptt_id) { # Pode advertir
            $newpatente_id = $uptt_id + 1;
            $usr_ip = $_SERVER['REMOTE_ADDR'];
        $sql_insertlog = mysqli_query($conn, "INSERT INTO logs(usr_habbo, msg, usr_ip, log_tipo) VALUES('{$usuarioNome}', 'Advertiu o usuário {$nick} - {$motivos}', '{$usr_ip}', '1')");
        $sql_insertnoti = mysqli_query($conn, "INSERT INTO notificacoes(enviado_por, user, msg, noti_type) VALUES('{$usuarioNome}', '{$nick}', 'Você foi advertido. Motivos/descrições: {$motivos}', '2')");
        $sql_inserhist = mysqli_query($conn, "INSERT INTO historico(enviado_por, usr_habbo, tipo, msg) VALUES('{$usuarioNome}', '{$nick}', '2', '{$motivos}')");
        echo "<script type='text/javascript'>alert('Usuário advertido com sucesso!');window.location.href='painel.php';</script>";

    }
        else { # Não pode advertir
            echo "<script type='text/javascript'>alert('Você não pode advertir este usuário!');window.location.href='painel.php';</script>";
            $usr_ip = $_SERVER['REMOTE_ADDR'];
            $sql_insertlog = mysqli_query($conn, "INSERT INTO logs(usr_habbo, msg, usr_ip, log_tipo) VALUES('{$usuarioNome}', 'Tentou advertir o usuário {$nick} mas não possui permissões.', '{$usr_ip}', '2')");

        }
    
        }



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
                                    
                                    <?php if($typeform == "aval" && $patente_id <= 14): ?>
                                        <div class="card">
                                    <div class="card-header">
                                       Solicitar <strong>Aval</strong>
                                       nickname                    </div>
                                    <div class="card-body card-block">
                                        <form action="" method="post" class="form-horizontal">
                                           
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="data_inicio" class=" form-control-label">Data de Início</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="datetime-local" id="hf-password" name="data_inicio" placeholder="" class="form-control">
                                                    <span class="help-block">Data de início</span>
                                                </div>
                                                <div class="col col-md-3">
                                                    <label for="data_fim" class=" form-control-label">Data Final</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="datetime-local" id="hf-password" name="data_fim" placeholder="" class="form-control">
                                                    <span class="help-block">Data de fim</span>
                                                </div>
                                                <div class="col col-md-3">
                                                    <label for="motivos" class=" form-control-label">Motivos</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                <textarea name="motivos" id="textarea-input" rows="2" placeholder="Motivo(s) do aval:" class="form-control"></textarea>
                                                    <span class="help-block">Digite o motivo do aval.</span>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                        <button type="submit" name="enviar_aval" class="btn btn-primary btn-sm">
                                            <i class="fa fa-check"></i> Enviar
                                        </button>
                                        <button type="reset" class="btn btn-danger btn-sm">
                                            <i class="fa fa-ban"></i> Resetar
                                        </button>
                                    </div>
                                        </form>
                                    </div>
                                   
                                </div>
                                    <?php endif; ?>


                                

                                    <?php 
                                    $sql_select_guia = mysqli_query($conn, "SELECT * FROM guias WHERE nickname = '{$usuarioNome}'");
                                    $num_select_guia = mysqli_num_rows($sql_select_guia);
                                    
                                    if($typeform == "add_ts" && $num_select_guia > 0): ?>
                                        <div class="card">
                                    <div class="card-header">
                                        <strong>Adicionar</strong> TS (Treinamento de Soldados)
                                       <br> <small>Obs: usuários já serão inseridos diretamente no System.</small>
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="" method="post" class="form-horizontal">
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="usuarios" class=" form-control-label">Nick dos Aprovados</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="usuarios" name="usuarios" placeholder="Digite os novos usuários separados por /" class="form-control">
                                                    <span class="help-block">Separe com /<br> Exemplo: RenatoPires/theGuiihBR/Fulano</span>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="data_inicio" class=" form-control-label">Observações</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                <textarea name="observacoes" id="textarea-input" rows="2" placeholder="Digite aqui observações, caso possua alguma. Caso não possua, deixe em branco." class="form-control"></textarea>
                                                    <span class="help-block">Digite suas observações</span>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                        <button type="submit" name="enviar_ts" class="btn btn-primary btn-sm">
                                            <i class="fa fa-check"></i> Enviar
                                        </button>
                                        <button type="reset" class="btn btn-danger btn-sm">
                                            <i class="fa fa-ban"></i> Resetar
                                        </button>
                                    </div>
                                        </form>
                                    </div>
                                   
                                </div>
                                    <?php endif; ?>




                                    <?php 
                                   $getuserperm = mysqli_query($conn, "SELECT * FROM painel WHERE usr_habbo = '{$usuarioNome}' AND usr_perm = 1");
                                   $perm = mysqli_num_rows($getuserperm);

                                    if($typeform == "add_destaques" && $perm > 0): ?>
                                        <div class="card">
                                    <div class="card-header">
                                        <strong>Adicionar</strong> Destaques
                                       <br> <small>Obs: usuários já serão inseridos diretamente no System como destaques.</small>
                                    </div>
                                    <?php 
                                    #dest superior
                                        $sql_get_superior = mysqli_query($conn, "SELECT * FROM membros WHERE usr_destaque = 2");
                                        $fetch_get_superior = mysqli_fetch_array($sql_get_superior);
                                        $nome_superior = $fetch_get_superior["usr_habbo"];
                                    #dest inferior                                  
                                    $sql_get_inferior = mysqli_query($conn, "SELECT * FROM membros WHERE usr_destaque = 1");
                                    $fetch_get_inferior = mysqli_fetch_array($sql_get_inferior);
                                    $nome_inferior = $fetch_get_inferior["usr_habbo"];
                                    ?>
                                    <div class="card-body card-block">
                                        <form action="" method="post" class="form-horizontal">
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="usuarios" class=" form-control-label">Destaque Inferior</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input style="font-weight: bold;" type="text" id="usuarios" value="<?php echo $nome_inferior ?>" name="destaque_inferior" placeholder="Digite o novo destaque inferior" class="form-control">
                                                    <span class="help-block">Lembre-se de digitar o nick corretamente.</span>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="data_inicio" class=" form-control-label">Destaque Superior</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                <input style="font-weight: bold;" type="text" id="usuarios" value="<?php echo $nome_superior ?>" name="destaque_superior" placeholder="Digite o novo destaque inferior" class="form-control">
                                                <span class="help-block">Lembre-se de digitar o nick corretamente.</span>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                        <button type="submit" name="enviar_destaque" class="btn btn-primary btn-sm">
                                            <i class="fa fa-check"></i> Enviar
                                        </button>
                                        <button type="reset" class="btn btn-danger btn-sm">
                                            <i class="fa fa-ban"></i> Resetar
                                        </button>
                                    </div>
                                        </form>
                                    </div>
                                   
                                </div>
                                    <?php endif; ?>













                                    <?php if($typeform == "promover" && $patente_id <= 12): ?>
                                        <div class="card">
                                    <div class="card-header">
                                       <strong>Promover</strong> Policial
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="" method="post" class="form-horizontal">
                                           
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="data_inicio" class=" form-control-label">Nickname do Policial</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input style='font-weight: bold;'type="text" id="hf-password" name="nickname" value="<?php echo $_GET["user"]; ?>"placeholder="Digite o nick de um policial" class="form-control">
                                                    <span class="help-block">Digite o nick do policial <strong>corretamente</strong>. Apenas um policial por vez.</span>
                                                </div>
                                                
                                                <div class="col col-md-3">
                                                    <label for="motivos" class=" form-control-label">Motivos</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                <textarea name="motivos" id="textarea-input" rows="2" placeholder="Motivo(s) da promoção:" class="form-control"></textarea>
                                                    <span class="help-block">Digite o motivo da promoção. OBS: Estará visível para a administração e nas notificações do usuário promovido.</span>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                        <button type="submit" name="promover" class="btn btn-primary btn-sm">
                                            <i class="fa fa-check"></i> Promover
                                        </button>
                                        <button type="reset" class="btn btn-danger btn-sm">
                                            <i class="fa fa-ban"></i> Resetar
                                        </button>
                                    </div>
                                        </form>
                                    </div>
                                   
                                </div>
                                    <?php endif; ?>



                                    <?php if($typeform == "rebaixar" && $patente_id <= 12): ?>
                                        <div class="card">
                                    <div class="card-header">
                                       <strong>Rebaixar</strong> Policial
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="" method="post" class="form-horizontal">
                                           
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="data_inicio" class=" form-control-label">Nickname do Policial</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input style='font-weight: bold;'type="text" id="hf-password" name="nickname" value="<?php echo $_GET["user"]; ?>"placeholder="Digite o nick de um policial" class="form-control">
                                                    <span class="help-block">Digite o nick do policial <strong>corretamente</strong>. Apenas um policial por vez.</span>
                                                </div>
                                                
                                                <div class="col col-md-3">
                                                    <label for="motivos" class=" form-control-label">Motivos</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                <textarea name="motivos" id="textarea-input" rows="2" placeholder="Motivo(s) do rebaixamento:" class="form-control"></textarea>
                                                    <span class="help-block">Digite o motivo do rebaixamento. OBS: Estará visível para a administração e nas notificações do usuário rebaixado.</span>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                        <button type="submit" name="rebaixar" class="btn btn-primary btn-sm">
                                            <i class="fa fa-check"></i> Rebaixar
                                        </button>
                                        <button type="reset" class="btn btn-danger btn-sm">
                                            <i class="fa fa-ban"></i> Resetar
                                        </button>
                                    </div>
                                        </form>
                                    </div>
                                   
                                </div>
                                    <?php endif; ?>






                                    <?php if($typeform == "advertir" && $patente_id <= 12): ?>
                                        <div class="card">
                                    <div class="card-header">
                                       <strong>Advertir</strong> Policial
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="" method="post" class="form-horizontal">
                                           
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="data_inicio" class=" form-control-label">Nickname do Policial</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input style='font-weight: bold;'type="text" id="hf-password" name="nickname" value="<?php echo $_GET["user"]; ?>"placeholder="Digite o nick de um policial" class="form-control">
                                                    <span class="help-block">Digite o nick do policial <strong>corretamente</strong>. Apenas um policial por vez.</span>
                                                </div>
                                                
                                                <div class="col col-md-3">
                                                    <label for="motivos" class=" form-control-label">Motivos</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                <textarea name="motivos" id="textarea-input" rows="2" placeholder="Motivo(s) da advertência:" class="form-control"></textarea>
                                                    <span class="help-block">Digite o motivo da advertência. OBS: Estará visível para a administração e nas notificações & histórico do usuário advertido.</span>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                        <button type="submit" name="advertir" class="btn btn-primary btn-sm">
                                            <i class="fa fa-check"></i> Advertir
                                        </button>
                                        <button type="reset" class="btn btn-danger btn-sm">
                                            <i class="fa fa-ban"></i> Resetar
                                        </button>
                                    </div>
                                        </form>
                                    </div>
                                   
                                </div>
                                    <?php endif; ?>




















                                    
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
