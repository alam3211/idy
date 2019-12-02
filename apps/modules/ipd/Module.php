<?php

namespace Idy\Ipd;

use Phalcon\DiInterface;
use Phalcon\Loader;
use Phalcon\Mvc\ModuleDefinitionInterface;

class Module implements ModuleDefinitionInterface
{
    public function registerAutoloaders(DiInterface $di = null)
    {
        $loader = new Loader();

        $loader->registerNamespaces([
            'Idy\Ipd\Domain\Model' => __DIR__ . '/domain/model',
            'Idy\Ipd\Infrastructure' => __DIR__ . '/infrastructure',
            'Idy\Ipd\Application' => __DIR__ . '/application',
            'Idy\Ipd\Controllers\Web' => __DIR__ . '/controllers/web',
            'Idy\Ipd\Controllers\Api' => __DIR__ . '/controllers/api',
            'Idy\Ipd\Controllers\Validators' => __DIR__ . '/controllers/validators',
        ]);
        
        $loader->register();
    }

    public function registerServices(DiInterface $di = null)
    {
        $moduleConfig = require __DIR__ . '/config/config.php';

        $di->get('config')->merge($moduleConfig);

        include_once __DIR__ . '/config/services.php';
    }

}