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

## 📂 Estrutura do Projeto

/projeto
├── index.php # Arquivo principal para executar os testes
├── User.php # Classe que representa um usuário
├── UserManager.php # Classe que gerencia usuários (cadastro, login, reset)
└── Validator.php # Classe que valida dados (email e senha)

## Como executar
1. Instale e configure o **XAMPP**.
2. Copie este projeto para a pasta `htdocs` do XAMPP.
3. Inicie o servidor Apache no painel do XAMPP.
4. No navegador, acesse:
`http://localhost/User-and-Authentication-System`
5. Os exemplos de execução podem ser testados diretamente rodando os arquivos PHP no navegador.
---

## ⚙️ Funcionalidades

- **User** → representa um usuário com `id`, `nome`, `email` e `senha`.  
- **Validator** → valida emails e senhas, além de aplicar `password_hash`.  
- **UserManager** → gerencia as operações do sistema:  
  - Cadastro de usuários.  
  - Login com verificação de credenciais.  
  - Reset de senha.  
---

## Casos de Uso Testados

1. **Cadastro válido**
- Entrada: `nome = Maria Oliveira`, `email = maria@email.com`, `senha = Senha123`
- Resultado esperado: Usuário cadastrado com sucesso

2. **Cadastro com e-mail inválido**
- Entrada: `nome = Pedro`, `email = pedro@@email`, `senha = Senha123`
- Resultado esperado: Erro → “E-mail inválido”

3. **Tentativa de login com senha errada**
- Entrada: `email = joao@email.com`, `senha = Errada123`
- Resultado esperado: Erro → “Credenciais inválidas”

4. **Reset de senha válido**
- Entrada: `id = 1`, `nova senha = NovaSenha1`
- Resultado esperado: Senha alterada com sucesso

5. **Cadastro de usuário com e-mail duplicado**
- Entrada: `email` já existente
- Resultado esperado: Erro → “E-mail já está em uso”

---

## Observações

- Agora cada usuário é representado por um **objeto da classe `User`**, em vez de array.  
- O método `newUser()` cadastra um novo usuário, validando email e senha antes de salvar.  
- O método `validateEmail()` garante formato válido e email não duplicado.  
- O método `validatePassword()` exige no mínimo 8 caracteres, 1 letra maiúscula e 1 número.  
- O método `hashPassword()` usa `password_hash` para segurança.  
- O método `loginUser()` verifica credenciais usando `password_verify`.  
- O método `resetPassword()` redefine a senha de forma validada e segura.  

---

## Limitações
- Não há persistência em banco de dados (uso apenas de arrays em memória).
- Interface simples (sem formulários HTML obrigatórios).
- Projeto desenvolvido apenas em **PHP puro**, sem frameworks.

---

*Feito pelas alunas Jênie Danielle Fedel Teixeira RA: 1993310  
Simone Siqueira de Melo RA: 2001915*  
