<?php

declare(strict_types=1);

namespace MyVendor\MyProject\Module;

use BEAR\Dotenv\Dotenv;
use BEAR\Package\AbstractAppModule;
use BEAR\Package\Module\ImportAppModule;
use BEAR\Package\PackageModule;
use BEAR\Package\Module\Import\ImportApp;

use function dirname;

class AppModule extends AbstractAppModule
{
    protected function configure(): void
    {
        (new Dotenv())->load(dirname(__DIR__, 2));
        $this->install(new ImportAppModule([
            new ImportApp('foo', 'MyVendor\Weekday', 'prod-app')
        ]));
        $this->install(new PackageModule());
    }
}
