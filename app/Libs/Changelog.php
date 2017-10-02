<?php

namespace App\Libs;

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
     * Changelog constructor.
     *
     * @param ConfigReader $configReader
     */
    public function __construct(ConfigReader $configReader)
    {
        $this->reader = $configReader;
        $this->config = $this->reader->load('changelogger.yml');
    }
}