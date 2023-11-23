# AvisaApp @FernandoEbert
###### A simple class for working with Send WhatsApp in PHP

Uma simples classe para trabalhar com envio de mensagem no whatsapp no PHP

## Installation

Avisa App is available via Composer:

```bash
"fernandoebert/avisaapp": "1.*"
```

or run

```bash
composer require fernandoebert/avisaapp
```

## Documentation

## About Avisa App

###### The Avisa App component abstracts the API of the [Avisa App](https://www.avisaapp.com.br) application. To use it, you need to have an account and a valid instance;

O componente Avisa App faz a abstração da API do aplicativo [Avisa App](https://www.avisaapp.com.br). Para utiliar você
precisa ter uma conta e uma instancia válida;

###### For more details on how to use it, see the example folder with details in the component directory.

Para mais detalhes sobre como usar, veja a pasta de exemplo com detalhes no diretório do componente.

##### Check Info Instance

```php
<?php

require __DIR__."/../vendor/autoload.php";

use fernandoebert\avisaApp\AvisaApp;

$avisaApp = new AvisaApp("/your-token/");

try {
    
    $info = $avisaApp
        ->instance()
        ->info();

    print_r($info);

} catch (Exception $e) {
    print_r($e);
}
```

##### Send Message

```php
<?php

require __DIR__."/../vendor/autoload.php";

use fernandoebert\avisaApp\AvisaApp;

$avisaApp = new AvisaApp("/your-token/");

try {

    $send = $avisaApp
        ->message()
        ->send(
            "48991348266",
            "Olá, acabei de baixar o componente e estou testando"
        );

} catch (Exception $e) {
    print_r($e);
}
```

## Support

###### If you discover a security issue, send an email to fernando@fernandoebert.com.br

Se você descobrir algum problema relacionado à segurança, envie um e-mail para fernando@fernandoebert.com.br

Thank you

## Credits

- [Fernando Ebert](https://github.com/fernandoebert) (Developer)
- [Jones MW10 Digital](https://mw10.com.br/) (Maintainer Avisa App)

## License

The MIT License (MIT). Please see [License File](https://github.com/FernandoEbert/avisaapp/blob/main/LICENSE) for more information.