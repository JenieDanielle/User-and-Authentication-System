<?php
require_once "AuthenticateUser.php";

$usuario = new AuthenticateUser();

echo $usuario->newUser("Maria Oliveira", "maria@email.com", "Senha123") . PHP_EOL;
echo $usuario->newUser("Pedro", " pedro@@email", "Senha123") . PHP_EOL;
echo $usuario->newUser("Fernando", "maria@email.com", "Senha123") . PHP_EOL;
echo $usuario->loginUser("joao@email.com", "Senha456") . PHP_EOL; //Senha incorreta
echo $usuario->loginUser("joao@email.com2", "Senha456") . PHP_EOL; //Email incorreto
echo $usuario->resetPassword(1, "Senha498") . PHP_EOL; // Senha atualizada
echo $usuario->resetPassword(3, "Senha498") . PHP_EOL; // Usuário não encontado
