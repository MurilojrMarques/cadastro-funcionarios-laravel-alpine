# 🏢 Sistema de Cadastro de Funcionários

![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![Alpine.js](https://img.shields.io/badge/Alpine.js-8BC0D0?style=for-the-badge&logo=alpine.js&logoColor=black)
![MySQL](https://img.shields.io/badge/MySQL-005C84?style=for-the-badge&logo=mysql&logoColor=white)

Sistema CRUD para gerenciamento de funcionários desenvolvido com Laravel 10 e Alpine.js.

## 🚀 Como Executar o Projeto

### Pré-requisitos
- PHP 8.1+
- Laravel 10+
- Composer
- MySQL
- Alpine
- Blade


### Instalação
1. Clone o repositório:
```bash
git clone https://github.com/MurilojrMarques/cadastro-funcionarios-laravel-alpine.git
cd cadastro-funcionarios-laravel-alpine
cp .env.example .env(ou configure manualmente)
composer install
php artisan key:generate
php artisan migrate
php artisan db:seed (opcional caso queira dados para teste)
php artisan serve