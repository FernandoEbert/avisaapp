<?php

require __DIR__."/../vendor/autoload.php";

use fernandoebert\avisaApp\AvisaApp;

//$avisaApp = new AvisaApp("dt7nIGsinj5nabdaJWseiZKfBQofprJpNPjbjF3uSdKEWMtcTA6iNtdm4TCk");  // using v2
$avisaApp = new AvisaApp("dt7nIGsinj5nabdaJWseiZKfBQofprJpNPjbjF3uSdKEWMtcTA6iNtdm4TCk", ['version' => 1]);  // using v1 (only on paid plan)

try {

    $info = $avisaApp
        ->instance()
        ->info();

    print_r($info);

} catch (Exception $e) {
    print_r($e);
}






