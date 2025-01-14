<?php

use Idy\Ipd\Infrastructure\SqlFrsRepository;
use Phalcon\Mvc\View;
use Phalcon\Mvc\View\Engine\Volt;
use Idy\Ipd\Infrastructure\SqlIpdRepository;
use Idy\Ipd\Infrastructure\SqlJawabanRepository;
use Idy\Ipd\Infrastructure\SqlKelasRepository;
use Idy\Ipd\Infrastructure\SqlKuisonerRepository;
use Idy\Ipd\Infrastructure\SqlPertanyaanRepository;

$di['voltServiceMail'] = function($view) use ($di) {

    $config = $di->get('config');

    $volt = new \Phalcon\Mvc\View\Engine\Volt($view, $di);
    if (!is_dir($config->mail->cacheDir)) {
        mkdir($config->mail->cacheDir);
    }

    $compileAlways = $config->mode == 'DEVELOPMENT' ? true : false;

    $volt->setOptions(array(
        "compiledPath" => $config->mail->cacheDir,
        "compiledExtension" => ".compiled",
        "compileAlways" => $compileAlways
    ));
    return $volt;
};

$di['view'] = function () {
    $view = new View();
    $view->setViewsDir(__DIR__ . '/../views/');

    $view->registerEngines(
        [
            ".volt" => "voltService",
        ]
    );

    return $view;
};

$di['db'] = function () use ($di) {

    $config = $di->get('config');

    $dbAdapter = $config->database->adapter;

    return new $dbAdapter([
        "host" => $config->database->host,
        "username" => $config->database->username,
        "password" => $config->database->password,
        "dbname" => $config->database->dbname
    ]);
};

$di->setShared('sql_ipd_repository', function() use ($di) {
    $repo = new SqlIpdRepository($di->get('db'));
    return $repo;
});

$di->setShared('sql_jawaban_repository', function() use ($di) {
    $repo = new SqlJawabanRepository($di->get('db'));
    return $repo;
});

$di->setShared('sql_pertanyaan_repository', function() use ($di) {
    $repo = new SqlPertanyaanRepository($di->get('db'));
    return $repo;
});

$di->setShared('sql_kuisoner_repository', function() use ($di) {
    $repo = new SqlKuisonerRepository($di->get('db'));
    return $repo;
});

$di->setShared('sql_kelas_repository', function() use ($di) {
    $repo = new SqlKelasRepository($di->get('db'));
    return $repo;
});