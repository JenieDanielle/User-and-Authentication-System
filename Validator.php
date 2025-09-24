<?php

class Validator
{
    public static function validateEmail(string $email, array $users): mixed
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return "Formato de email inválido.";
        }

        foreach ($users as $user) {
            if ($user->getEmail() === $email) {
                return "Esse email já está cadastrado.";
            }
        }

        return true;
    }

    public static function validatePassword(string $password): mixed
    {
        if (strlen($password) < 8) {
            return "A senha é muito curta. Minímo 8 caracteres.";
        } elseif (!preg_match("/[A-Z]/", $password)) {
            return "A senha precisa conter ao menos uma letra maiúscula.";
        } elseif (!preg_match("/[0-9]/", $password)) {
            return "A senha precisa conter no minímo um número.";
        }

        return true;
    }

    public static function hashPassword(string $password)
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }
}
