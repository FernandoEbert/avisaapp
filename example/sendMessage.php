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