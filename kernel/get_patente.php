<?php 
# Pegar o ID da patente na tabela membros
$usuarioNome = $_SESSION["usuario"];
$get_patente_id = mysqli_query($conn, "SELECT * FROM membros WHERE usr_habbo = '{$usuarioNome}'");
$fetch_patente_id = mysqli_fetch_array($get_patente_id);
$patente_id = $fetch_patente_id["usr_patente"];
$usr_executivo = $fetch_patente_id["usr_executivo"];

# Pegar o nome da patente na tabela patentes
$get_patente_nome = mysqli_query($conn, "SELECT * FROM patentes WHERE id = '{$patente_id}'");
$fetch_patente_nome = mysqli_fetch_array($get_patente_nome);

$poder_promover_patente = $fetch_patente_nome["perm_promover"];
$poder_rebaixar_patente = $fetch_patente_nome["perm_rebaixar"];
if($usr_executivo == 0) {
    $patente_nome = $fetch_patente_nome["patente"];
}
else {
    $patente_nome = $fetch_patente_nome["patente_executivo"];
}

?>