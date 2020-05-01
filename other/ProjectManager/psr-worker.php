<?php

use Laminas\Diactoros\Response;
use other\ProjectManager\src\Kernel;
use Symfony\Component\ErrorHandler\Debug;
use Symfony\Component\HttpFoundation\Request;
use Spiral\Goridge;
use Spiral\RoadRunner;

require __DIR__ . '/config/bootstrap.php';

if ($_SERVER['APP_DEBUG']) {
    umask(0000);

    Debug::enable();
}

if ($trustedProxies = $_SERVER['TRUSTED_PROXIES'] ?? $_ENV['TRUSTED_PROXIES'] ?? false) {
    Request::setTrustedProxies(explode(',', $trustedProxies), Request::HEADER_X_FORWARDED_ALL ^ Request::HEADER_X_FORWARDED_HOST);
}

if ($trustedHosts = $_SERVER['TRUSTED_HOSTS'] ?? $_ENV['TRUSTED_HOSTS'] ?? false) {
    Request::setTrustedHosts([$trustedHosts]);
}

$kernel = new Kernel($_SERVER['APP_ENV'], (bool) $_SERVER['APP_DEBUG']);

$worker = new RoadRunner\Worker(new Goridge\StreamRelay(STDIN, STDOUT));
$psr7 = new RoadRunner\PSR7Client($worker);

while ($req = $psr7->acceptRequest()) {
    try {
        $request = Request::createFromGlobals();
        $response = $kernel->handle($request);
        $roadRunnerResponse = new Response();
        $roadRunnerResponse->getBody()->write($response->getContent());
        $psr7->respond($roadRunnerResponse);
        $kernel->terminate($request, $response);
    } catch (Throwable $e) {
        $psr7->getWorker()->error((string) $e);
    }
}
