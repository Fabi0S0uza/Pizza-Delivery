<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "PizzaDelivery";

$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) === TRUE) {
    echo "Banco de dados criado com sucesso!";
} else {
    echo "Erro ao criar o banco de dados: " . $conn->error;
}



session_start();


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}


$sql = "CREATE TABLE IF NOT EXISTS itensPed(
  id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  product_name varchar(100) NOT NULL,
  product_price varchar(50) NOT NULL,
  product_image varchar(255) NOT NULL,
  qty int(10) NOT NULL,
  total_price varchar(100) NOT NULL,
  product_code varchar(10) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Tabela Cart criada com sucesso!";
} else {
    echo "Erro ao criar a tabela Cart: " . $conn->error;
}


$sql = "CREATE TABLE IF NOT EXISTS client (
    CPF varchar(11) NOT NULL PRIMARY KEY,
    Password varchar(15) NOT NULL,
    Phone varchar(11) NOT NULL,
    Name varchar(100) NOT NULL,
    Email varchar(100) NOT NULL,
    DataNasc date NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Tabela Client criada com sucesso!";
} else {
    echo "Erro ao criar a tabela Client: " . $conn->error;
}


$sql = "CREATE TABLE IF NOT EXISTS Pedido (
  id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  name varchar(100) NOT NULL,
  email varchar(100) NOT NULL,
  phone varchar(20) NOT NULL,
  address varchar(255) NOT NULL,
  pmode varchar(50) NOT NULL,
  products varchar(255) NOT NULL,
  amount_paid varchar(100) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Tabela Orders criada com sucesso!";
} else {
    echo "Erro ao criar a tabela Orders: " . $conn->error;
}


$sql = "CREATE TABLE IF NOT EXISTS product (
  id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  product_name varchar(255) NOT NULL,
  product_price varchar(100) NOT NULL,
  product_qty int(11) NOT NULL DEFAULT 1,
  product_image varchar(255) NOT NULL,
  product_code varchar(50) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Tabela Pedidos criada com sucesso!";
} else {
    echo "Erro ao criar a tabela Pedidos: " . $conn->error;
}


$conn->close();
?>
