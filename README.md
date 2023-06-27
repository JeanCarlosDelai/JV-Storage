
# Projeto Prático da Disciplina de Desenvolvimento de Sistemas

# JV STORAGE








## Funcionalidades

- Cadastro de usuários
- Login de usuários
- Upload de documentos(PDF, DOC, DOCX)
- Redação de documentos(rich-text)
- Edição e exclusão de documentos
- Compartilhamento de documentos entre os usuários
- Busca de documentos cadastrados no sistema


## Instalação

Clonar o repositório para a máquina local

```sh
  git clone https://github.com/JeanCarlosDelai/PROVA-DSI-LARAVEL.git
```
Acessar a pasta clonada    

```sh
  cd PROVA-DSI-LARAVEL
```
Rodar o composer para instalar as dependências  

```sh
  composer install
```
Criar um arquivo chamado.env com base no .env.example 

```sh
  cp .env.example .env
```
Gerar uma nova chave de aplicação 

```sh
  php artisan key:generate
```
Abrir o arquivo .env no VS Code e alterar preferências, caso necessário
(informações de acesso a banco, timezone, diretório de log etc.) 

Se houver migrations, é possível rodá-las agora
```sh
  php artisan migrate
```
Iniciar o servidor  

```sh
  php artisan serve
```
## Stack utilizada

**Front-end:** HTML, blade, TailwindCSS

**Back-end:** Laravel, blade

**Banco de dados:** MySQL


## Autores

- [@Jeandelai](https://github.com/JeanCarlosDelai)

