<?php
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Debug\Debug;
use \Doctrine\Common\Annotations\AnnotationRegistry;

umask(0000);

/**
 * @var Composer\Autoload\ClassLoader $loader
 */
$loader = require_once __DIR__ . '/../autoload.php';
require_once __DIR__ . '/../AppKernel.php';

// load .env variables into $_SERVER array
$envLoader = new \Dotenv\Dotenv(__DIR__ . '/../');
$envLoader->load();
$env = $_SERVER['SYMFONY_ENV'];
$debug = $_SERVER['SYMFONY_DEBUG'];

if ($debug) {
    Debug::enable();
}

$kernel = new AppKernel($env, $debug);
$kernel->loadClassCache();
$request = Request::createFromGlobals();
$response = $kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);
