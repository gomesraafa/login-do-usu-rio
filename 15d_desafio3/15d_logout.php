
<?php
session_start();

// Encerra os dados da sessão
$_SESSION = [];
session_destroy();

// Volta para a página de login
header("Location: 15d_login.php");
exit();
?>

