<?php

namespace App\Libs;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;

class Changelog
{
    /**
     * @var ConfigReader
     */
    protected $reader;

    /**
     * @var array
     */
    protected $config;

    /**
     * @var YamlParser
     */
    protected $parser;

    /**
     * Changelog constructor.
     *
     * @param ConfigReader $configReader
     * @param YamlParser $parser
     */
    public function __construct(ConfigReader $configReader, YamlParser $parser)
    {
        $this->reader = $configReader;
        $this->parser = $parser;

        if (file_exists('changelogger.yml')) {
            $this->config = $this->reader->load('changelogger.yml');
        }
    }

    /**
     * Get all entries in the folder
     *
     * @return Collection
     */
    public function getEntries(): Collection
    {
        /** todo Remove 'File' dependency */
        return collect(File::files($this->reader->folder))->transform(function ($item) {
            return $this->parser->parse($item->getPathname());
        });
    }
}