# gold-manager
Aplicação desenvolvida para o paper da disciplina de Seminário Interdisciplinar - Uniasselvi

Para executar a aplicação é necessário configurar as variáveis em config/config.php :

```php
define('APP_SEED', getenv('APP_SEED')); // valor aleatório

/* configurações do banco de dados */
define('MYSQL_HOST', getenv('MYSQL_HOST')); 
define('MYSQL_USER', getenv('MYSQL_USER'));
define('MYSQL_PASSWORD', getenv('MYSQL_PASSWORD'));
define('GOLD_APP_DATABASE', getenv('APP_DATABASE'));
```


<host>/<controller>/<action>/<params>

```php
class <Controller>Controller extends Controller{

    public function <action> (...$params){

        $view = new View('template/view', data: array());
        $view->render();
    }
}
```

#Mapa da Aplicação

/
pagina inicial - exibe os conteudos postados

/post
cria uma nova postagem - necessário realizar login

/post/view/:id
exibe a postagem selecionada

/user
lista usuarios

/user/create
cria um novo usuario

/user/view/:id
exibe informações e postagens do usuario selecionado

/login
realiza o login do usuario

/login/logout
realiza o logout do usuario