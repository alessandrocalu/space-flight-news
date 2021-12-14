## Fullstack Challenge 2021 🏅 - Space Flight News

API para acesso a dados de Space Flight News


### Instalação 

- Executar php artisan serve para subir projeto
- Configurar dados de acesso a banco de dados em .env
- Executar php artisan migrate para criação de tabelas

### Métodos de API

[GET]/:  Retorna um Status: 200 e uma Mensagem "Fullstack Challenge 2021 🏅 - Space Flight News"

[GET]/articles/:  Lista todos os artigos da base de dados.

[GET]/articles/{id}: Obtem a informação somente de um artigo


### Rotinas de armazenamento de novos artigos

- Existe uma rotina para armazenar novos artigos que pode ser executada manualmente através do comando php artisan routine:sync-article. 

- Esta rotina também esta configurada através de shedule do laravel para executar todos os dias as 09:00 horas.


### Tela de Listagem

Para acessar listagem de artigos já cadastrados acesse /app.
