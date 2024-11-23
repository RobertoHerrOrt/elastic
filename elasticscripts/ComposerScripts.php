<?php

namespace elasticscripts;

use Composer\Script\Event;
// Composer script
use Symfony\Component\Filesystem\Filesystem;

class ComposerScripts
{
    public static function postInstall(Event $event)
    {
             echo "** entro al script";
            // Obtener el nombre del paquete que se está instalando
            $packageName = $event->getComposer()->getPackage()->getName();

            // Si se está instalando un paquete específico, ejecutar una tarea
            if ($packageName === 'sfa/elastic') {
                echo "** entro al if ";
                // Copiar un archivo de configuración
                $filesystem = new Filesystem();
                $filesystem->dumpFile('var/config.php', '<?php return [ /* ... */ ];');
            }

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