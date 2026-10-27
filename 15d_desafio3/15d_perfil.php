
<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: 15d_login.php");
    exit();
}

$usuario = $_SESSION['usuario'];
$cor = $_SESSION['cor_fundo'] ?? '#e8edf5';

if (!preg_match('/^#[0-9a-fA-F]{6}$/', $cor)) {
    $cor = '#e8edf5';
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu Perfil</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: <?= htmlspecialchars($cor) ?>;
            color: #333;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        header {
            background-color: #304f83;
            color: white;
            padding: 20px 8%;
        }

        header h1 {
            font-size: 23px;
            font-weight: normal;
        }

        main {
            width: 100%;
            max-width: 750px;
            margin: 60px auto;
            padding: 20px;
            flex: 1;
        }

        .perfil {
            background-color: white;
            padding: 35px;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        }

        .perfil h2 {
            color: #304f83;
            font-size: 27px;
            margin-bottom: 18px;
        }

        .perfil p {
            font-size: 15px;
            line-height: 1.7;
            margin-bottom: 15px;
        }

        .cor-atual {
            display: inline-block;
            width: 18px;
            height: 18px;
            border: 1px solid #ccc;
            border-radius: 4px;
            vertical-align: middle;
            background-color: <?= htmlspecialchars($cor) ?>;
        }

        .sair {
            display: inline-block;
            margin-top: 10px;
            padding: 12px 22px;
            background-color: #304f83;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.2s;
        }

        .sair:hover {
            background-color: #243d68;
        }

        footer {
            text-align: center;
            padding: 18px;
            color: #555;
            font-size: 13px;
        }

        @media (max-width: 500px) {
            main {
                margin: 25px auto;
            }

            .perfil {
                padding: 25px;
            }
        }
    </style>
</head>

<body>

    <header>
        <h1>Área do Usuário</h1>
    </header>

    <main>
        <section class="perfil">
            <h2>
                Olá, <?= htmlspecialchars($usuario) ?>!
            </h2>

            <p>Login realizado com sucesso!</p>

            <p>
                Bem-vindo(a) ao seu perfil. Você já pode acessar
                esta página sempre que fizer login.
            </p>

            <p>
                Cor de fundo escolhida:
                <span class="cor-atual"></span>
                <?= htmlspecialchars($cor) ?>
            </p>

            <a href="15d_logout.php" class="sair">
                Sair do sistema
            </a>
        </section>
    </main>

    <footer>
        Meu Perfil &copy; 2026
    </footer>

</body>
</html>
