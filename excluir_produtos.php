<?php


session_start();



// Verifica se foram selecionados produtos para exclusão
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['selected_products'])) {
    // Conexão com o banco de dados (substitua os valores conforme suas configurações)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "PizzaDelivery";

    // IDs dos produtos selecionados para exclusão
    $selected_products = $_POST['selected_products'];

    // Criando a conexão
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificando a conexão
    if ($conn->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conn->connect_error);
    }

    // Convertendo array de IDs para uma string separada por vírgulas para a query
    $product_ids = implode(",", $selected_products);

    // Query para excluir os produtos selecionados
    $sql = "DELETE FROM `product` WHERE `id` IN ($product_ids)";

    if ($conn->query($sql) === TRUE) {
        echo "Produtos excluídos com sucesso!";
    } else {
        echo "Erro ao excluir os produtos: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Nenhum produto selecionado para exclusão.";
}
?>
