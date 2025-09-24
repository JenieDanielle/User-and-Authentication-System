<?php
require_once "User.php";
require_once "Validator.php";

class UserManager
{
    private array $users;

    public function __construct()
    {
        $this->users = [
            new User(1, 'João Silva', 'joao@email.com',
                Validator::hashPassword('SenhaForte1'))
        ];
    }

    public function newUser(string $nome, string $email, string $password)
    {
        $checkEmail = Validator::validateEmail($email, $this->users);
        if ($checkEmail !== true) {
            return $checkEmail;
        }

        $checkPassword = Validator::validatePassword($password);
        if ($checkPassword !== true) {
            return $checkPassword;
        }

        $hashedPassword = Validator::hashPassword($password);
        $newId = count($this->users) + 1;

        $this->users[] = new User($newId, $nome, $email, $hashedPassword);

        return "Usuário {$nome} cadastrado com sucesso!";
    }

    public function loginUser(string $email, string $password)
    {
        foreach ($this->users as $user) {
            if ($user->getEmail() === $email) {
                if (password_verify($password, $user->getPassword())) {
                    return "Login efetuado com sucesso.";
                }
                return "Credenciais incorretas.";
            }
        }
        return "Email não encontrado.";
    }

    public function resetPassword(int $id, string $newPassword)
    {
        $checkPassword = Validator::validatePassword($newPassword);
        if ($checkPassword !== true) {
            return $checkPassword;
        }

        foreach ($this->users as $user) {
            if ($user->getId() === $id) {
                $user->setPassword(Validator::hashPassword($newPassword));
                return "Senha alterada com sucesso.";
            }
        }

        return "Usuário não encontrado.";
    }
}
