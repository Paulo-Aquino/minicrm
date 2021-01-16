# Mini CRM 
El proyecto esta sobre laravel 8 utiliza como base de datos mysql MariaDB, es un sistema simple que administra colaboradores asociados a las empresas registradas en el sistema. Consta de 3 perfiles Administrador, Auditor y Editor.

>Requisitos del sistema

* PHP >= 7.3
* BCMath PHP Extension
* Ctype PHP Extension
* Fileinfo PHP Extension
* JSON PHP Extension
* Mbstring PHP Extension
* OpenSSL PHP Extension
* PDO PHP Extension
* Tokenizer PHP Extension
* XML PHP Extension
* Maria DB mysql
* Composer

>Pasos para instalar

1. Clonar el repo : git clone https://github.com/Paulo-Aquino/mini-crm.git
2. cd Mini-CRM
3. composer install
4. cp .env.example .env
5. php artisan key:generate
6. Crear database on MySQL
7. Configurar las credenciaes de base de datos en el archivo .env
8. php artisan migrate --seed
9. php artisan storage:link
10. Login con:
    * email: admin@admin.com
    * pass: admin