<?php

require __DIR__."/../vendor/autoload.php";

use fernandoebert\avisaApp\AvisaApp;

//$avisaApp = new AvisaApp("/use-token/");  // using v2
$avisaApp = new AvisaApp("/use-token/", ['version' => 1]);  // using v1 (only on paid plan)

try {

    $send = $avisaApp
        ->message()
        ->send(
            "48991348266",
            "Olá, acabei de baixar o componente e estou testando"
        );

    var_dump($send);

} catch (Exception $e) {
    var_dump($e);
}
