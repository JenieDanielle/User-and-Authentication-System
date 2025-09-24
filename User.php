<?php

class User
{
    private int $id;
    private string $nome;
    private string $email;
    private string $password;

    public function __construct(int $id, string $nome, string $email, string $password)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->email = $email;
        $this->password = $password;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password)
    {
        $this->password = $password;
    }
}
