<?php

return array(
    'idea' => [
        'namespace' => 'Idy\Idea',
        'webControllerNamespace' => 'Idy\Idea\Controllers\Web',
        'apiControllerNamespace' => 'Idy\Idea\Controllers\Api',
        'className' => 'Idy\Idea\Module',
        'path' => APP_PATH . '/modules/idea/Module.php',
        'defaultRouting' => false,
        'defaultController' => 'idea',
        'defaultAction' => 'index'
    ],
    'ipd' => [
        'namespace' => 'Idy\Ipd',
        'webControllerNamespace' => 'Idy\Ipd\Controllers\Web',
        'apiControllerNamespace' => 'Idy\Ipd\Controllers\Api',
        'className' => 'Idy\Ipd\Module',
        'path' => APP_PATH . '/modules/ipd/Module.php',
        'defaultRouting' => false,
        'defaultController' => 'ipd',
        'defaultAction' => 'index'
    ],

);