<?php

namespace Raid\Core\Command\Traits\Command;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Pluralizer;

trait WithCreateCommand
{
    /**
     * Create the command.
     */
    public function createCommand(): void
    {
        $path = $this->getSourceFilePath();

        $this->makeDirectory(dirname($path));

        $contents = $this->getSourceFile();

        if (File::exists($path)) {

            $this->info("File : {$path} already exits");

            return;
        }

        File::put($path, $contents);

        $this->info("File : {$path} created");
    }

    /**
     * Get the full path of generated class.
     */
    public function getSourceFilePath(): string
    {
        return '';
    }

    /**
     * Get the stub path and the stub variables.
     */
    public function getSourceFile(): string|array|false
    {
        return $this->getStubContents($this->getStubPath(), $this->getStubVariables());
    }

    /**
     * Replace the stub variables(key) with the desire value.
     */
    public function getStubContents($stub, $stubVariables = []): array|false|string
    {
        $contents = file_get_contents($stub);

        foreach ($stubVariables as $search => $replace) {
            $contents = str_replace('$'.$search.'$', $replace, $contents);
        }

        return $contents;
    }

    /**
     * Return the stub file path.
     */
    public function getStubPath(): string
    {
        return __DIR__.'/../../resources/stubs/stub.stub';
    }

    /**
     * Map the stub variables present in stub to its value.
     */
    public function getStubVariables(): array
    {
        return [
            'NAMESPACE' => 'App',
            'CLASS_NAME' => $this->getClassName(),
        ];
    }

    /**
     * Return the Singular Capitalize Name.
     */
    public function getClassName(): string
    {
        return ucwords($this->argument('classname', ''));
    }


    /**
     * Return the Singular Capitalize Name.
     */
    public function getSingularClassName(): string
    {
        return Pluralizer::singular($this->getClassName());
    }

    /**
     * Build the directory for the class if necessary.
     */
    protected function makeDirectory($path)
    {
        if (! File::isDirectory($path)) {
            File::makeDirectory($path, 0777, true, true);
        }

        return $path;
    }
}
