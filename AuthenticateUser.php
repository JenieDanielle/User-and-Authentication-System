<?php

class AuthenticateUser
{
    private array $users;

    public function __construct(){
        $this->users = [
            ['id' => 1, 'nome' => 'João Silva', 'email' => 'joao@email.com',
            'password' => 'SenhaForte1'],
        ];
    }

    public function newUser(string $nome, string $email, string $password) {
        $checkEmail = $this->validateEmail($email);
        if ($checkEmail !== true) {
            return $checkEmail;
        }

        $checkPassword = $this->validatePassword($password);
        if ($checkPassword !== true) {
            return $checkPassword;
        }

        $hashedPassword = $this->hashPassword($password);

        $newId = count($this->users) + 1;

        $this->users[] = [
            'id' => $newId,
            'nome' => $nome,
            'email' => $email,
            'password' => $hashedPassword
        ];

        return "Usuário {$nome} cadastrado com sucesso!";
    }

    public function validateEmail($email){
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return "Formato de email inválido.";
        }

        foreach ($this->users as $user) {
            if ($user['email'] === $email) {
                return "Esse email já está cadastrado.";
            }
        }
        
        return true;
    }

    public function validatePassword($password) {
        if (strlen($password) < 8) {
            return "A senha é muito curta. Minímo 8 caracteres.";
        } elseif (!preg_match("/[A-Z]/", $password)) {
            return "A senha precisa conter ao menos uma letra maiúscula.";
        } elseif (!preg_match("/[0-9]/", $password)) {
            return "A senha precisa conter no minímo um número.";
        } else {
            return true;
        }
    }

    public function hashPassword($password) {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    public function loginUser(string $email, string $password){
        foreach ($this->users as $user) {
            if ($user['email'] === $email) {
                if (password_verify($password, $user['password'])) {
                    return "Login realizado com sucesso.";
                }
                return "Credenciais inválidas.";
            } else {
                return "Email não encontrado.";
            }
        }
        return "Usuário não encontrado."; 
    }

    public function resetPassword($id, $newPassword) {
        $checkPassword = $this->validatePassword($newPassword);
        if ($checkPassword !== true) {
            return $checkPassword;
        }
        
        foreach ($this->users as $key => $user) {
            if ($user['id'] === $id) {
                $this->users[$key]['password'] = $this->hashPassword($newPassword);

                return "Senha alterada com sucesso";
            }
        }
        return "Usuário não encontrado.";
    }
}