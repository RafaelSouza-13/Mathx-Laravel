<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# 📖 Projeto - Mathx

Projeto em laravel de um sistema que gera exercícios com as operações básicas da matemática.

## ⚙️ Tecnologias Utilizadas

- PHP 8.3
- Laravel 12
- Composer
- Git

## 💡 Funcionalidades
- [x] Submissão de formulário
- [x] Validação de dados

## 🏗️ Estrutura do Projeto

Abaixo está a organização das principais pastas e arquivos deste projeto Laravel:

### 📂 Diretórios Principais

- **app/**  
  Contém a lógica de negócio da aplicação:
  - `Http/`: Controladores.

- **bootstrap/**  
  Inicialização do framework e configuração do autoload.

- **config/**  
  Arquivos de configuração de serviços e do sistema.

- **database/**  
  Estrutura de banco de dados:
  - `factories/`: Criação de dados para testes.
  - `migrations/`: Definições de estrutura das tabelas.
  - `seeders/`: Popular o banco com dados iniciais.

- **public/**  
  Pasta pública acessível pela web. Contém o `index.php` e os assets públicos.

- **resources/**  
  Recursos da aplicação:
  - `views/`: Templates Blade.
  - `css/`: Arquivos CSS.
  - `js/`: Arquivos JavaScript.

- **routes/**  
  Definições de rotas:
  - `web.php`: Rotas para o ambiente web.

- **storage/**  
  Arquivos gerados ou manipulados pela aplicação (logs, cache, uploads).

- **tests/**  
  Testes automatizados.

- **vendor/**  
  Dependências instaladas via Composer (não edite arquivos aqui).

---

> Essa estrutura facilita a manutenção, escalabilidade e organização do projeto conforme boas práticas do Laravel.


## 🛠️ Pré-requisitos
Antes de começar, certifique-se de ter instalado: 
- PHP 8.3 ou superior
- Composer

## 🚀 Executando o projeto
Para executar este projeto Laravel, certifique-se de ter instalado o PHP 8.3 ou superior, Composer.

Siga as etapas abaixo para executar este projeto Laravel em sua máquina local:

1. **Clone o repositório**  
   ```bash
   git clone https://github.com/RafaelSouza-13/alterar-depois.git

2. **Acesse o diretório do projeto**
   ```bash
   cd alterar-depois

3. **Instale as dependências do projeto**
   ```bash
   composer install

4. **Configure as variáveis de ambiente**
    Copie o arquivo `.env.example` para `.env` e configure as variáveis de ambiente conforme o seu ambiente local (como configurações de banco de dados).

6. **Inicie o servidor de desenvolvimento**
   ```bash
   php artisan serve

Agora você pode acessar o projeto em `http://localhost:8000`.

## 📚 Referência

Este projeto foi desenvolvido como parte de um aprendizado baseado na **Laravel 11 & 12: Framework, Ecossistema e Projetos Web** do canal Udemy.

## 🛡️ License

The Laravel framework is open-sourced software licensed under the. Este projeto está licenciado sob a [MIT license](https://opensource.org/licenses/MIT).