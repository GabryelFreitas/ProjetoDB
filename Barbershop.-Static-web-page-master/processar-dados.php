<?php

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];

$server = 'localhost';
$usuario = 'root';
$senha = '';
$banco = 'usuarios';


$conn = new mysqli($server,$usuario,$senha,$banco);

if($conn->connect_error){
    die("falha".$conn->connect_error);
}

$smtp = $conn->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (?,?,?)");
$smtp->bind_param("sss", $nome, $email, $senha);

if($smtp->execute()){
    echo "mens envaida";
}
else{
    echo "erro: ".$smtp->error;
}

$smtp->close();
$conn->close();

?>