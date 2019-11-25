<?php

$namespace = 'Idy\Idea\Controllers\Web';

$router->addGet('/idea', [
    'namespace' => $namespace,
    'module' => 'idea',
    'controller' => 'idea',
    'action' => 'index'
]);

$router->addGet('/idea/add', [
    'namespace' => $namespace,
    'module' => 'idea',
    'controller' => 'idea',
    'action' => 'add'
]);
$router->addPost('/idea/new', [
    'namespace' => $namespace,
    'module' => 'idea',
    'controller' => 'idea',
    'action' => 'addPost'
]);

$router->addPost('/idea/rate', [
    'namespace' => $namespace,
    'module' => 'idea',
    'controller' => 'idea',
    'action' => 'rate'
]);

$router->addPost('/idea/vote/{id}', [
    'namespace' => $namespace,
    'module' => 'idea',
    'controller' => 'idea',
    'action' => 'vote',
]);