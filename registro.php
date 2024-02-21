
<?php



session_start();



// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Configurações de conexão ao banco de dados (substitua pelos seus dados)
    $servidor = "localhost"; // Nome do servidor
    $usuario = "root"; // Nome do usuário do banco de dados
    $Password = ""; // Password do banco de dados
    $dbname = "PizzaDelivery"; // Nome do banco de dados

  
    $conn = new mysqli($servidor, $usuario, $Password, $dbname);


    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

  
    $CPF = $_POST['CPF'];
    $Name = $_POST['Name'];
    $Email = $_POST['Email'];
    $Password = $_POST['Password'];
    $Phone = $_POST['Phone'];
    $DataNasc = $_POST['DataNasc'];

    // Query SQL para inserir os dados na tabela Clientes
    $sql = "INSERT INTO Client (CPF, Name, Password,Email, Phone,Datanasc) VALUES ('$CPF','$Name', '$Password', '$Email','$Phone', '$DataNasc')";

    // Executa a query e verifica se foi bem-sucedida
    if ($conn->query($sql) === TRUE) {
        echo "Registro inserido com sucesso!";
    } else {
        echo "Erro ao inserir registro: " . $conn->error;
    }

    // Fecha a conexão com o banco de dados
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
    <link rel="stylesheet" href="css/registro.css">
<head>
    <title>Formulário de Cadastro</title>
    <style>
        
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

<div class="container">
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <h2>Formulário de Cadastro</h2>
      <div class="form-group">
        <label for="name">Nome:</label>
        <input type="text" id="name" name="Name" required>
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="text" id="email" name="Email" required>
      </div>
      <div class="form-group">
        <label for="phone">Telefone:</label>
        <input type="text" id="phone" name="Phone" required>
      </div>
      <div class="form-group">
        <label for="cpf">CPF:</label>
        <input type="text" id="CPF" name="CPF" required>
      </div>
      <div class="form-group">
        <label for="data-nasc">Data de Nascimento:</label>
        <input type="date" id="data-nasc" name="DataNasc" required>
      </div>
      <div class="form-group">
        <label for="password">Senha:</label>
        <input type="password" id="password" name="Password" required>
      </div>
      <div class="form-group">
        <input type="submit" value="Cadastrar">
      </div>

      <div class="form-group">
        <h6 ><a href="login.php">Já tem conta? CLique aqui!!</h6>
      </div>
    </form>
  </div>
    <!-- Botão de voltar -->
    <button id="voltar-btn" onclick="window.history.back();">Voltar</button>

</body>
</html>

