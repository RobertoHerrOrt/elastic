<?php

namespace elastic;

use Composer\Script\Event;

class ComposerScripts
{
    public static function postInstall(Event $event)
    {
        $extra = $event->getComposer()->getPackage()->getExtra();

        if (isset($extra['laravel']['config_path'])) {
            $configPath = $extra['laravel']['config_path'];
        } else {
            $configPath = __DIR__ . '/../../../config';
        }

        // $loggingConfigPath = $configPath . '/logging.php';

        // if (file_exists($loggingConfigPath)) {
        //     $config = file_get_contents($loggingConfigPath);
        //     $newConfig = self::modifyLoggingConfig($config);
        //     file_put_contents($loggingConfigPath, $newConfig);
        // }

        // Definición del nuevo canal
            $newLoggingChannel = "'custom' => [
                'driver' => 'single',
                'path' => storage_path('logs/custom.log'),
                'level' => 'debug',
            ],";

        // Llamada a la función para modificar el archivo
        $newConfig = self::modifyLoggingConfig($newLoggingChannel);
    }

    private static function modifyLoggingConfig($config)
    {
        
        $channelsStart = strpos($config, "'channels' =>");
        $channelsEnd = strpos($config, ']', $channelsStart);

       
        $newConfig = substr_replace($config, $config, $channelsEnd, 0);

        return $newConfig;
    }
}