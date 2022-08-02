<h1> INSTRUÇÕES <H1>


## DOCUMENTAÇÃO DO ADMINLTE VIA COMPOSER

<p align="justify">  <a href='https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Usage'>Laravel-AdminLTE</a></p>



## COMANDOS PARA START DO PROJETO

### Clone o repositório
<p align="justify">  - git clone -b dev https://github.com/matheusmoc/confeitaria_eds2.git </p>

### Acesse a pasta do projeto
<p align="justify">  - cd cantinho-doce</p>

### Instale as dependências do projeto
<p align="justify">  - composer install</p>
<p align="justify">  - npm install</p>

### Copie o arquivo .env.example para .env
<p align="justify">  - cp .env.example .env</p>

### Gere uma nova chave
<p align="justify">  - php artisan key:generate</p>

### Execute as migrações do banco de dados com os seeders
<p align="justify">  - php artisan migrate:fresh --seed</p>

### Sirva a aplicação
<p align="justify">  - php artisan serve </p>

---

### Teste de email
<p>Para testar o envio de emails localmente baixe e execute a ferramenta mailhog em https://github.com/mailhog/MailHog/releases/tag/v1.0.1 e utilize as configurações de email do .env.example</p>

---

## Admin
email: admin@admin.br

senha: password




