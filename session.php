<?php
//iniciando a sessão
session_start();
//Conectando com o banco de dados
require_once 'configDB.php';

if(isset($_SESSION['nomeUsuario'])){
    //echo "Usuário Logado!";
    $usuario = $_SESSION['nomeUsuario'];
    $sql= $conecta-> prepare("SELECT * FROM usuario WHERE nomeUsuario=?");
    $sql-> bind_param("s", $usuario);
    $sql->execute();
    $resultado = $sql->get_result();
    $linha = $resultado->fetch_array(MYSQLI_ASSOC);

    $nome = $linha['nome'];
    $email= $linha['email'];
    $datacriacao=$linha['datacriacao'];
    $urlAvatar=$linha['avatar'];
} else{
    //kick
    header("location:index.php");
}