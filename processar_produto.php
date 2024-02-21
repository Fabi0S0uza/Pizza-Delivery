<?php


session_start();



// Conexão com o banco de dados (substitua os valores conforme suas configurações)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "PizzaDelivery";

// Criando a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificando a conexão
if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

// Verifica se os dados foram enviados pelo formulário
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_qty = $_POST['product_qty'];
    $product_code = $_POST['product_code'];

    // Upload da imagem
    $target_dir = "image/"; // Substitua pelo caminho correto
    $target_file = $target_dir . basename($_FILES["product_image"]["name"]);

    if (move_uploaded_file($_FILES["product_image"]["tmp_name"], $target_file)) {
        // Insere os dados na tabela do banco de dados
        $sql = "INSERT INTO `product` (`product_name`, `product_price`, `product_qty`, `product_image`, `product_code`) VALUES ('$product_name', '$product_price', '1', '$target_file', '$product_code')";

        if ($conn->query($sql) === TRUE) {
            echo "Novo produto cadastrado com sucesso!";
        } else {
            echo "Erro ao cadastrar o produto: " . $conn->error;
        }
    } else {
        echo "Erro ao fazer o upload da imagem.";
    }
}

$conn->close();
?>
