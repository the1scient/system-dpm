<?php 
session_start();
include("configs.php");
$theuser = htmlspecialchars($_POST['usuario']);
$cod_secreto = $_SESSION["cod_secreto"];
$ssenha = htmlspecialchars($_POST['senha']);
$senha = md5($ssenha);
$HabboAPI = "https://www.habbo.com.br/api/public/users?name=".$theuser;
$ch = curl_init();
$options = array(
    CURLOPT_URL => $HabboAPI,
    CURLOPT_HEADER => false,
    CURLOPT_POST => 0,
    CURLOPT_SSL_VERIFYPEER => false,
    CURLOPT_SSL_VERIFYHOST => false,
    CURLOPT_RETURNTRANSFER => true,
);
curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
curl_setopt_array($ch, $options);
$saida = curl_exec($ch);
/* Decoda o JSON e exibe a missão */
$missao = json_decode($saida)->motto;
curl_close($ch);

if($missao == $cod_secreto) {
$update_user_senha = mysqli_query($conn, "UPDATE painel SET usr_senha = '{$senha}' WHERE usr_habbo = '{$theuser}'");
    echo "<script type='text/javascript'>alert('Sua senha foi atualizada! Log guardado.');window.location.href='../index.php';</script>";

}
else {
    echo "<script type='text/javascript'>alert('Verifique sua missão e tente novamente.');window.location.href='../index.php';</script>";
}


?>