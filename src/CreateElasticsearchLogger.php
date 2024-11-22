<?php

namespace sfa\elastic;

use Elastic\Elasticsearch\ClientBuilder;
use Monolog\Handler\ElasticsearchHandler;
use Monolog\Logger;

class CreateElasticsearchLogger
{
    /**
     * Create a custom Monolog instance.
     *
     * @param  array  $config
     * @return \Monolog\Logger
     */
    public function __invoke(array $config)
    {
        $logger = new Logger('elasticsearch');
        // ADAN XORRA

        //create the client
        $client = ClientBuilder::create()
                    ->setHosts([env('ELASTICSEARCH_HOST', "https://elastic-devops.michoacan.gob.mx")])
                    ->setBasicAuthentication(env('ELASTICSEARCH_USERNAME', 'user_logs'), env('ELASTICSEARCH_PASSWORD','gBd$s&9Tkjsd5a65'))
                    ->build();

        //create the handler
        $options = [
            'index' => strtolower(env('ELASTICSEARCH_INDEX', 'elastic-test')),
        ];
        $handler = new ElasticsearchHandler($client, $options);

        $logger->setHandlers(array($handler));
        
        return $logger;
        
    }
}