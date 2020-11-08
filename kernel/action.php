<?php 
include("../kernel/configs.php");
session_start();
$usuarioNome = $_SESSION["usuario"];


if($_GET["tipo"]) 
{
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

    if($tipo == "desativar_acc") {
        $id = $_GET["user_id"];
        # Pegar permissão de adm
    $query_perm = mysqli_query($conn, "SELECT * FROM painel WHERE usr_habbo = '{$usuarioNome}'");
    $count_perm = mysqli_num_rows($query_perm);
    if($count_perm >= 1) {
        
    }
    else {
        echo "<script type='text/javascript'>alert('Você não pode fazer isso!');window.location.href='painel.php';</script>";
    }

    }




   
}
else 
{

}




?>