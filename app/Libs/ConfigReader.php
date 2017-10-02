<?php

namespace App\Libs;

use Symfony\Component\Yaml\Exception\ParseException;
use Symfony\Component\Yaml\Yaml;

class ConfigReader
{
    /**
     * @var array
     */
    protected $config;

    /**
     * @var YamlParser
     */
    protected $parser;

    /**
     * ConfigReader constructor.
     *
     * @param YamlParser $parser
     */
    public function __construct(YamlParser $parser)
    {
        $this->parser = $parser;
    }

    /**
     * @param string $filePath
     *
     * @return mixed|null
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