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






