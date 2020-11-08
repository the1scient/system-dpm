<?php 
include_once("../global.php");
$usuarioNome = $_SESSION["usuario"];


$get_user_perm = mysqli_query($conn, "SELECT * FROM painel WHERE usr_habbo = '{$usuarioNome}' AND usr_perm >= 1");
$count_user_perm = mysqli_num_rows($get_user_perm);
if($count_user_perm == 0) {
header('Location: ../painel.php');
}


$consulta = $_GET["consulta"];
echo "";
$sql_get_fakes = mysqli_query($conn, "SELECT * FROM logs WHERE usr_ip = '{$consulta}'");
while($fetchgf = mysqli_fetch_array($sql_get_fakes)) {
    $usr = $fetchgf["usr_habbo"];
    $msg = $fetchgf["msg"];
    $usrip = $fetchgf["usr_ip"];
    $data = date('d/m/y H:i:s', strtotime($fetchgf["data"]));
    echo "<span style='color: white; font-weight: bold; text-shadow: 1px 1px 1px black;'>LOG: </span>{$usr} - {$msg} {$usrip} em {$data} <br>";



}
echo "<br>";

?>