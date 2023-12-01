<?php

require __DIR__."/../vendor/autoload.php";

use fernandoebert\avisaApp\AvisaApp;

//$avisaApp = new AvisaApp("/use-token/");  // using v2
$avisaApp = new AvisaApp("/use-token/", ['version' => 1]);  // using v1 (only on paid plan)

try {

    $info = $avisaApp
        ->instance()
        ->info();

    print_r($info);

} catch (Exception $e) {
    print_r($e);
}






