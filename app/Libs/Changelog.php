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
     * @var Yaml
     */
    protected $parser;

    /**
     * Changelog constructor.
     *
     * @param ConfigReader $configReader
     * @param Yaml $parser
     *
     * @throws \Exception
     */
    public function __construct(
        ConfigReader $configReader,
        Yaml $parser
    ) {
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
        return $this->orderEntriees(collect(File::files($this->reader->folder))->transform(function ($item) {
            return $this->parser->parse($item->getPathname());
        }));
    }

    public function orderEntriees(Collection $entries): Collection
    {
        $orderedEntries = collect();

        $correctOrder = $this->config['changelogger']['types'];
        collect($correctOrder)->each(function ($type) use ($entries, $orderedEntries) {
            $orderedEntries[$type] = $entries->where('type', $type)->all();
        });

        return $orderedEntries->filter();
    }
}
