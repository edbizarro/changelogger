<?php

namespace App\Commands;

use App\Libs\Changelog;
use LaravelZero\Framework\Commands\Command;


class ChangeloggerCommand extends Command
{
    /**
     * The name and signature of the command.
     *
     * @var string
     */
    protected $signature = 'changelogger';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Changelog generator';

    /**
     * @var Changelog
     */
    protected $changelog;

    public function __construct (Changelog $changelog)
    {
        parent::__construct();
        $this->changelog = $changelog;
    }

    /**
     * Execute the command. Here goes the code.
     *
     * @return void
     */
    public function handle(): void
    {
        if (! file_exists('changelogger.yml')) {
            $this->error('changelogger.yml not found, you must run changelogger:init first!');
            return;
        }

        dd($this->changelog->getEntries());
    }
}
