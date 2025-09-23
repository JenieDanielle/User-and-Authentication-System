<?php
require_once "AuthenticateUser.php";

$usuario = new AuthenticateUser();

echo $usuario->newUser("Maria Oliveira", "maria@email.com", "Senha123") . PHP_EOL;
echo $usuario->newUser("Pedro", " pedro@@email", "Senha123") . PHP_EOL;
echo $usuario->newUser("Fernando", "maria@email.com", "Senha123") . PHP_EOL;
echo $usuario->loginUser("joao@email.com", "Errada123") . PHP_EOL; 
echo $usuario->resetPassword(1, "NovaSenha1") . PHP_EOL; 
