# Teste-Pratico-Estuda.com

## Ambiente

* Linux Ubuntu 18.04
* PHP 7.2.24
* Desenvolvido utilizando o servidor embutido da CLI do PHP

## Instruções

### Banco de dados

SQL do DDL do banco de dados da aplicaço [DDL](https://github.com/Ivoff/Teste-Pratico-Estuda.com/blob/master/database/Database/DDL.sql)

### Configurando URL de conexão com o banco

Arquivo da classe de [conexão](https://github.com/Ivoff/Teste-Pratico-Estuda.com/blob/master/database/connection/Connection.php)
 com o banco de dados. Atributos como nome da base de dados, porta, usuário, senha e etc devem ser digitados manualmente na chamada da função de conexão, não tive tempo pra fazer um .env

### Rodando a aplição
 
Os comandos abaixo devem ser digitados no terminal no diretório raiz do projeto
 
```$ composer install ```

```$ php -S locahost:8080 bootstrap.php```
