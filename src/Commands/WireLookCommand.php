<?php

namespace Allenjd3\WireLook\Commands;

use Illuminate\Console\Command;

class WireLookCommand extends Command
{
    public $signature = 'wirelook';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
