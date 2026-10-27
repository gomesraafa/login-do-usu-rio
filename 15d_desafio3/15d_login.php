
<?php
session_start();

if (isset($_SESSION['usuario'])) {
    header("Location: 15d_perfil.php");
    exit();
}

$mensagem = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $usuario = trim($_POST['usuario'] ?? '');
    $senha = $_POST['senha'] ?? '';
    $cor = $_POST['cor_fundo'] ?? '#ffffff';

    // Verifica se a cor é válida
    if (!preg_match('/^#[0-9a-fA-F]{6}$/', $cor)) {
        $cor = '#ffffff';
    }

    // Conecta com o banco de dados
    $servername = "localhost";
    $username   = "root";
    $password   = "Senai@118";
    $dbname     = "exercicio";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }

    $conn->set_charset("utf8mb4");

    // Consulta o usuário no banco de dados
    $sql = "SELECT * FROM usuarios WHERE usuario = ? AND senha = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $usuario, $senha);
    $stmt->execute();

    $result = $stmt->get_result();

    // Verifica se encontrou o usuário
    if ($result->num_rows > 0) {

        session_regenerate_id(true);

        $_SESSION['usuario'] = $usuario;
        $_SESSION['cor_fundo'] = $cor;

        header("Location: 15d_perfil.php");
        exit();

    } else {
        $mensagem = "Usuário ou senha incorretos!";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #e9edf3;
            color: #333;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        form {
            width: 100%;
            max-width: 380px;
            padding: 30px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        }

        h2 {
            text-align: center;
            color: #304f83;
            margin-bottom: 25px;
        }

        label {
            display: block;
            margin-bottom: 7px;
            font-size: 14px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 11px;
            margin-bottom: 18px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }

        input[type="color"] {
            width: 100%;
            height: 40px;
            margin-bottom: 20px;
            padding: 3px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background: #fff;
            cursor: pointer;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #304f83;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 15px;
            cursor: pointer;
        }

        button:hover {
            background-color: #243d68;
        }

        .erro {
            margin-bottom: 18px;
            padding: 10px;
            background-color: #ffeaea;
            color: #c62828;
            border-radius: 5px;
            font-size: 14px;
        }
    </style>
</head>

<body>

    <form action="" method="post">
        <h2>Login</h2>

        <?php if ($mensagem != ""): ?>
            <p class="erro">
                <?= htmlspecialchars($mensagem) ?>
            </p>
        <?php endif; ?>

        <label for="usuario">Usuário:</label>
        <input
            type="text"
            id="usuario"
            name="usuario"
            required
        >

        <label for="senha">Senha:</label>
        <input
            type="password"
            id="senha"
            name="senha"
            required
        >

        <label for="cor_fundo">Cor de Fundo:</label>
        <input
            type="color"
            id="cor_fundo"
            name="cor_fundo"
            value="#ffffff"
        >

        <button type="submit">Entrar</button>
    </form>

</body>
</html>

