<?php

namespace App\Commands;

use LaravelZero\Framework\Commands\Command;
use Illuminate\Support\Facades\File;

class ChangeloggerInitCommand extends Command
{
    /**
     * The name and signature of the command.
     *
     * @var string
     */
    protected $signature = 'init';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Create initial folders and config.';


    public function handle(): void
    {
        if (! File::exists('changelog')) {
            $this->info('Creating changelog/unreleased folder');
            File::makeDirectory('changelog/unreleased', 0775, true);
        }

        if (! File::exists('changelogger.yml')) {
            $this->info('Creating default config');
            File::copy('vendor/edbizarro/changelogger/app/Stubs/changelogger.yml.stub', 'changelogger.yml');
            $this->info('changelogger.yml created');
        }

        $this->info('Check if CHANGELOG.md exists...');
        if (! File::exists('CHANGELOG.md')) {
            $this->info('CHANGELOG.md not present, creating');
            File::put('CHANGELOG.md', '');
        }
    }
}
