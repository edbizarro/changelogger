<?php

namespace App\Libs;

class ConfigReader
{
    /**
     * @var array
     */
    protected $config;

    /**
     * @var Yaml
     */
    protected $parser;

    /**
     * ConfigReader constructor.
     *
     * @param Yaml $parser
     */
    public function __construct(Yaml $parser)
    {
        $this->parser = $parser;
    }

    /**
     * @param string $filePath
     *
     * @return mixed|null
     * @throws \Exception
     */
    public function load(string $filePath)
    {
        return $this->config = $this->parser->parse($filePath);
    }

    public function __get($name)
    {
        return $this->config['changelogger'][$name] ?? null;
    }
}
