<?php

namespace  sfa\elastic;

use Composer\Script\Event;
// Composer script
use Symfony\Component\Filesystem\Filesystem;

class ComposerScripts
{
    public static function postInstall()
    {
        echo "dddd";
        $rootDir = __DIR__;
    
        // Crear el archivo
        $filename = 'mi_archivoscri.txt';
        $filepath = $rootDir . '/' . $filename;
        
        // Escribir en el archivo
        $handle = fopen($filepath, 'w');
        fwrite($handle, 'Este es el contenido de mi archivo.');
        fclose($handle);
            // Obtener el nombre del paquete que se está instalando
           // $packageName = $event->getComposer()->getPackage()->getName();

            // Si se está instalando un paquete específico, ejecutar una tarea
            // if ($packageName === 'sfa/elastic') {
            //     $rootDir = __DIR__;

            //     // Crear el archivo
            //     $filename = 'mi_archivoif.txt';
            //     $filepath = $rootDir . '/' . $filename;
                
            //     // Escribir en el archivo
            //     $handle = fopen($filepath, 'w');
            //     fwrite($handle, 'Este es el contenido de mi archivo.');
            //     fclose($handle);
            // }

        // $extra = $event->getComposer()->getPackage()->getExtra();

        // if (isset($extra['laravel']['config_path'])) {
        //     $configPath = $extra['laravel']['config_path'];
        // } else {
        //     $configPath = __DIR__ . '/../../../config';
        // }

        // $loggingConfigPath = $configPath . '/logging.php';

        // if (file_exists($loggingConfigPath)) {
        //     $config = file_get_contents($loggingConfigPath);
        //     $newConfig = self::modifyLoggingConfig($config);
        //     file_put_contents($loggingConfigPath, $newConfig);
        // }

        // Definición del nuevo canal
            // $newLoggingChannel = "'custom' => [
            //     'driver' => 'single',
            //     'path' => storage_path('logs/custom.log'),
            //     'level' => 'debug',
            // ],";

        // Llamada a la función para modificar el archivo
      //  $newConfig = self::modifyLoggingConfig($newLoggingChannel);
    }

    private static function modifyLoggingConfig($config)
    {
        
        $channelsStart = strpos($config, "'channels' =>");
        $channelsEnd = strpos($config, ']', $channelsStart);

       
        $newConfig = substr_replace($config, $config, $channelsEnd, 0);

        return $newConfig;
    }
}