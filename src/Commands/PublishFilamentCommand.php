<?php

namespace Raid\Core\Filament\Commands;

use Raid\Core\Command\Commands\PublishCommand;

class PublishFilamentCommand extends PublishCommand
{
    /**
     * The console command name.
     */
    protected $name = 'core:publish-filament';

    /**
     * The console command description.
     */
    protected $description = 'Publish core filament config files.';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $this->publishCommand('config-filament');
    }
}
