<?php

require __DIR__."/../vendor/autoload.php";

use fernandoebert\avisaApp\AvisaApp;

//$avisaApp = new AvisaApp("dt7nIGsinj5nabdaJWseiZKfBQofprJpNPjbjF3uSdKEWMtcTA6iNtdm4TCk");  // using v2
$avisaApp = new AvisaApp("dt7nIGsinj5nabdaJWseiZKfBQofprJpNPjbjF3uSdKEWMtcTA6iNtdm4TCk", ['version' => 1]);  // using v1 (only on paid plan)

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
