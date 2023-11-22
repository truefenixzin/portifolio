# Projeto para melhor comunicação.

A ideia deste projeto foi melhorar a comunicação interna de uma empresa de pequeno porte e para isso foi utilizado o framework Laravel com o mySql como database.

## Itens necessários para funcionamento
1. Instalação do Composer.
2. Instalação de XAMPP / LAMPP / WAMPP

### Instruções de Instalação

1. Clone o repositório
2. Abra o repositório
3. Abro no repositório clonado o terminal e execute os seguintes comandos:
Antes de executar o comando, faça a configuração do seu .env para conexão com o DB e também o login da parte admin.
Lembrando que é necessário criar o database antes.
   - composer install
   - cp .env.example .env 
   - php artisan key:generate
   - php artisan migrate
   - php artisan db:seed
   - php artisan storage:link

#### Informações adicionais.
Se necessário pode entrar em contato comigo pelo e-mail rodrigodossantos8454@gmail.com
