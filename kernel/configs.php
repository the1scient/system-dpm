<?php 
define("HOST", "localhost");
define("USER", "root");
define("PASS", "");
define("DB", "system_dpm");

$conn = mysqli_connect(HOST, USER, PASS, DB) or die("Não é possível conectar-se ao banco de dados.");

$titulo_site = "System DPM";
$imagem_site = "https://www.habbo.com.br/habbo-imaging/badge/b21244s42134s36134s43134s19114726423d67f8e50c371b8cca7ecb990c2.gif";

?>