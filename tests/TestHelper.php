<?php 

use Phalcon\Di;
use Phalcon\Di\FactoryDefault;
use Phalcon\Loader;
use Phalcon\Events\Manager as EventsManager;

ini_set("display_errors", 1);
error_reporting(E_ALL);

define("ROOT_PATH", __DIR__);
define("APP_PATH", ROOT_PATH . '/../apps');

// Required for phalcon/incubator
include __DIR__ . "/../vendor/autoload.php";

// Use the application autoloader to autoload the classes
// Autoload the dependencies found in composer
$loader = new Loader();

$loader->registerNamespaces([

    'Idy\Ipd\Domain\Model' => APP_PATH . '/modules/ipd/domain/model',
    'Idy\Ipd\Application' => APP_PATH . '/modules/ipd/application',
    'Idy\Ipd\Infrastructure' => APP_PATH . '/modules/ipd/infrastructure',

]);

$loader->register();

$di = new FactoryDefault();

Di::reset();

// Add any needed services to the DI here

Di::setDefault($di);