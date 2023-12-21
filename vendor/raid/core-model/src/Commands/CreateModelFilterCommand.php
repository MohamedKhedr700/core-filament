<?php

namespace Raid\Core\Model\Commands;

use Raid\Core\Command\Commands\CreateCommand;

class CreateModelFilterCommand extends CreateCommand
{
    /**
     * The name and signature of the console command.
     */
    protected $signature = 'core:make-model-filter {classname}';

    /**
     * The console command description.
     */
    protected $description = 'Make a model filter class';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $this->createCommand();
    }

    /**
     * Return the stub file path.
     */
    public function getStubPath(): string
    {
        return __DIR__.'/../../resources/stubs/model-filter.stub';
    }

    /**
     * Map the stub variables present in stub to its value.
     */
    public function getStubVariables(): array
    {
        return [
            'NAMESPACE' => 'App\\Models\\ModelFilters',
            'CLASS_NAME' => $this->getClassName(),
        ];
    }

    /**
     * Get the full path of generated class.
     */
    public function getSourceFilePath(): string
    {
        return app_path('Models/ModelFilters/'.$this->getClassName()).'.php';
    }
}
