# AuthenticateUser em PHP

Este projeto é um exemplo simples de **Sistema de Autenticação de Usuários** feito em PHP, que permite:  

- Cadastrar novos usuários com validação de email e senha.  
- Validar formato de email e evitar duplicidade.  
- Validar força da senha (mínimo de 8 caracteres, pelo menos 1 letra maiúscula e 1 número).  
- Criptografar senhas com `password_hash`.  
- Realizar login com verificação de credenciais.  
- Resetar senha de um usuário existente.  

O código segue boas práticas: **PSR-12, KISS e DRY**.  

---

## Funcionalidades

- Cadastro de novos usuários com id, nome, email e senha.  
- Validação de email (formato correto e não duplicado).  
- Validação de senha com regras de segurança.  
- Senhas criptografadas com `password_hash`.  
- Login com verificação via `password_verify`.  
- Reset de senha com atualização segura no array de usuários.  
- Mensagens de retorno claras em caso de erros ou sucesso.  

---

## Observações

- Cada usuário é representado como um array com: **id, nome, email e senha** (hash).  
- O método `newUser()` cadastra o usuário após validar email e senha.  
- O método `validateEmail()` impede emails inválidos ou duplicados.  
- O método `validatePassword()` garante senha forte (mín. 8 caracteres, 1 maiúscula, 1 número).  
- O método `hashPassword()` utiliza `password_hash` para segurança.  
- O método `loginUser()` verifica credenciais e retorna mensagens adequadas.  
- O método `resetPassword()` redefine a senha de um usuário, validando e aplicando hash.  
- O projeto segue as boas práticas de código **PSR-12**, evitando repetições e mantendo clareza (**KISS e DRY**).  

---

*Feito pelas alunas Jênie Danielle Fedel Teixeira RA: 1993310  
Simone Siqueira de Melo RA: 2001915*  
