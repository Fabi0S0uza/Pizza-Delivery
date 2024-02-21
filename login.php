<?php
// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Configurações de conexão ao banco de dados (substitua pelos seus dados)
    $servidor = "localhost"; // Nome do servidor
    $usuario = "root"; // Nome do usuário do banco de dados
    $Password = ""; // Password do banco de dados
    $dbname = "PizzaDelivery"; // Nome do banco de dados

    // Conecta ao banco de dados usando SQLI
    $conn = new mysqli($servidor, $usuario, $Password, $dbname);

    // Verifica a conexão
    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    // Obtém os dados do formulário
    $CPF = $_POST['CPF'];
    $Password = $_POST['Password'];

    // Consulta SQL para verificar se as credenciais existem na tabela Clientes
    $sql = "SELECT * FROM client WHERE CPF='$CPF' AND Password='$Password'";
    $result = $conn->query($sql);

    // Verifica se há resultados na consulta
    if ($result->num_rows > 0) {
        // Login bem-sucedido
        session_start();
        $_SESSION['CPF'] = $CPF;
        header("Location: index.php"); // Altere 'home.php' para a página desejada
        exit();
    } else {
        // Login falhou
        echo "Credenciais inválidas. Tente novamente.";
    }

    // Fecha a conexão com o banco de dados
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<link rel="stylesheet" href="css/login.css">
<head>
    <title>Formulário de Login</title>
     <style>
        /* Estilos para o botão de voltar */
        #voltar-btn {
            position: fixed;
            bottom: 20px;
            right: 20px;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        
    </style>
</head>
<body>
<div class= "container"> 

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">



<div class="container">
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <h2>Formulário de Login</h2>
      <div class="form-group">
        <label for="CPF">CPF:</label>
        <input type="text" id="CPF" name="CPF" required>
      </div>
      <div class="form-group">
        <label for="Password">Senha:</label>
        <input type="Password" id="Password" name="Password" required>
        <input type="submit" value="Entrar">
      </div>
      <div class="form-group">
        <h6 ><a href="registro.php">Ainda não tem conta crie aqui!!</h6>
      </div>
     
    </form>
  </div>

  <button id="voltar-btn" onclick="window.history.back();">Voltar</button>
</body>
</html>
