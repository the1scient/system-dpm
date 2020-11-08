<?php 
include("../kernel/configs.php");
session_start();
$usuarioNome = $_SESSION["usuario"];


if($_GET["tipo"]) 
{
    $usr_ip = $_SERVER['REMOTE_ADDR'];

    $tipo = $_GET["tipo"];
    if($tipo == "notificacao") { # Marcar notificação como lida:
        $id = $_GET["id"];
        # Verificação para ver se o usuário possui aquela notificação
        $query_not = "SELECT * FROM notificacoes WHERE id = '{$id}' AND is_read = 0";
        $res_not = $conn->query($query_not);
        if($res_not->num_rows > 0) { # Há resultados e vai marcar como lida
            $query_update_not = mysqli_query($conn, "UPDATE notificacoes SET is_read = 1 WHERE id = '{$id}'");
        header('Location: ../painel.php');    
            }
        else {
            header('Location: ../painel.php');
        }
    }

    elseif($tipo == "remover_adm") {
        $u_id = $_GET["user_id"];
        # Pegar permissão de adm
    $query_perm = mysqli_query($conn, "SELECT * FROM painel WHERE usr_habbo = '{$usuarioNome}' AND usr_perm > 1");
    $count_perm = mysqli_num_rows($query_perm);
    if($count_perm > 0) {

        echo "<script type='text/javascript'>alert('Permissão removida com sucesso! Log guardado.');window.location.href='../tables.php?type=gerusers';</script>";
        $sql_insertlog = mysqli_query($conn, "INSERT INTO logs(usr_habbo, msg, usr_ip, log_tipo) VALUES('{$usuarioNome}', 'Removeu a permissão do usuário com ID {$u_id}', '{$usr_ip}', '1')");
    $sql_update_perm = mysqli_query($conn, "UPDATE painel SET usr_perm = 0 WHERE id = '{$u_id}'");
}
    else {
        $sql_insertlog = mysqli_query($conn, "INSERT INTO logs(usr_habbo, msg, usr_ip, log_tipo) VALUES('{$usuarioNome}', 'Tentou tirar a permissão do usuário com ID {$u_id}', '{$usr_ip}', '2')");
        echo "<script type='text/javascript'>alert('Você não pode fazer isso! Log guardado.');window.location.href='../painel.php';</script>";
    }

    }




   
}
else 
{

}




?>