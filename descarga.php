<?php
error_reporting(E_ALL); 
ini_set('display_errors', 1);
// Descomprime el RAR y obtiene el APK
$rar = RarArchive::open('SEAPP-release.rar');
$apk = $rar->getEntry('SEAPP-release.apk'); 
$contenidoAPK = $apk->extractAsString();

// Fuerza la descarga del APK  
header('Content-Type: application/vnd.android.package-archive');
header('Content-Disposition: attachment; filename="SEAPP-release.apk"');

echo $contenidoAPK;