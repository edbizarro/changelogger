<?php

namespace App\Libs;

use Symfony\Component\Yaml\Exception\ParseException;
use Symfony\Component\Yaml\Yaml;

class ConfigReader
{
    protected $config;

    public function load(string $filePath)
    {
        try {
            return $this->config = Yaml::parse(file_get_contents($filePath));
        } catch (ParseException $e) {
            printf("Unable to parse the YAML string: %s", $e->getMessage());
        }

        return null;
    }

    public function get()
    {
        return $this->config;
    }
}