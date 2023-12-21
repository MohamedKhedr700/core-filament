<?php

namespace Raid\Core\Enum\Commands;

use Raid\Core\Command\Commands\PublishCommand;
class PublishEnumCommand extends PublishCommand
{
    /**
     * The console command name.
     */
    protected $name = 'core:publish-enum';

    /**
     * The console command description.
     */
    protected $description = 'Publish core enum config files.';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $this->publishCommand('config-enum');
    }
}