<?php

namespace Raid\Core\Command\Commands;

use Raid\Core\Command\Traits\Command\WithCommandHelper;
use Illuminate\Console\Command as IlluminateCommand;
class Command extends IlluminateCommand
{
    use WithCommandHelper;

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
    }
}
