<?php
error_reporting(E_ALL); 
ini_set('display_errors', 1);

// Función para extraer el archivo APK de un archivo RAR
function extraerAPKDesdeRAR($rutaArchivoRAR, $nombreArchivoAPK) {
    $rar = RarArchive::open($rutaArchivoRAR);
    $archivoAPK = $rar->getEntry($nombreArchivoAPK);
    return $archivoAPK->extractAsString();
}

// Nombre del archivo RAR y APK
$nombreArchivoRAR = 'SEAPP-release.rar';
$nombreArchivoAPK = 'SEAPP-release.apk';

// Extraer el APK del RAR
$contenidoAPK = extraerAPKDesdeRAR($nombreArchivoRAR, $nombreArchivoAPK);

// Fuerza la descarga del APK
header('Content-Type: application/vnd.android.package-archive');
header('Content-Disposition: attachment; filename="' . $nombreArchivoAPK . '"');
echo $contenidoAPK;
?>
