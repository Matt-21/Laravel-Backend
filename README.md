## Como Buildar

## 0 
 - Abra o arquivo .env.example e coloque a sua senha do root em `DB_PASSWORD`
## 1
 - Caso use um usuário diferente do root altere também o campo `DB_USERNAME`
## 2
 - Execute no terminal o comando `docker compose up -d --build`
## 3
 - Execute este comando para acessar o container `docker exec -it laravel-backend-laravel-app-1 bash -l`
## 4
 - Após acessar o container execute `php artisan migrate`
## 5
 - Para acessar o banco de dados execute o comando `sudo docker inspect laravel-backend-mysql-db-1 | grep IPAddress`
## 6
 - Copie o IP que o comando na etapa 5 irá mostrar e cole no campo Host do seu SGBD.
## 7
 - Digite sua senha e coloque a mesma database definida no arquivo `.env`
