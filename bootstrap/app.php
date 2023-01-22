<?php

declare(strict_types=1);

use App\Console\Kernel as AppConsoleKernel;
use App\Exceptions\Handler;
use App\Http\Kernel as AppHttpKernel;
use Illuminate\Contracts\Console\Kernel as ContractsConsoleKernel;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Contracts\Http\Kernel as ContractsHttpKernel;
use Illuminate\Foundation\Application;

/*
|--------------------------------------------------------------------------
| Create The Application
|--------------------------------------------------------------------------
|
| The first thing we will do is create a new Laravel application instance
| which serves as the "glue" for all the components of Laravel, and is
| the IoC container for the system binding all of the various parts.
|
 */

$app = new Application($_ENV['APP_BASE_PATH'] ?? dirname(__DIR__));

/*
|--------------------------------------------------------------------------
| Bind Important Interfaces
|--------------------------------------------------------------------------
|
| Next, we need to bind some important interfaces into the container so
| we will be able to resolve them when needed. The kernels serve the
| incoming requests to this application from both the web and CLI.
|
 */

$app->singleton(ContractsHttpKernel::class, AppHttpKernel::class);

$app->singleton(ContractsConsoleKernel::class, AppConsoleKernel::class);

$app->singleton(ExceptionHandler::class, Handler::class);

/*
|--------------------------------------------------------------------------
| Return The Application
|--------------------------------------------------------------------------
|
| This script returns the application instance. The instance is given to
| the calling script so we can separate the building of the instances
| from the actual running of the application and sending responses.
|
 */

return $app;
