<?php

namespace App\Commands;

use Illuminate\Support\Facades\File;
use LaravelZero\Framework\Commands\Command;

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
        if (!File::exists('changelog')) {
            $this->task('Creating changelog/unreleased folder', function () {
                File::makeDirectory('changelog/unreleased', 0775, true);
            });
        }

        if (!File::exists('changelogger.yml')) {
            $this->task('Creating default config', function () {
                File::copy('vendor/edbizarro/changelogger/app/Stubs/changelogger.yml.stub', 'changelogger.yml');
            });
        }

        $this->task('Check if CHANGELOG.md exists', function () {
            if (!File::exists('CHANGELOG.md')) {
                $this->task('CHANGELOG.md not present, creating', function () {
                    File::put('CHANGELOG.md', '');
                });
            }
        });
    }
}
