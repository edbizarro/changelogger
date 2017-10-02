<?php

namespace App\Libs;

use Exception;
use Symfony\Component\Yaml\Exception\ParseException;
use Symfony\Component\Yaml\Yaml;

class YamlParser
{
    /**
     * @param string $filePath
     *
     * @return array
     * @throws Exception
     */
    public function parse(string $filePath): array
    {
        try {
            return $this->config = Yaml::parse(file_get_contents($filePath));
        } catch (ParseException $e) {
            throw new Exception("Unable to parse the YAML string: %s", $e->getMessage());
        }
    }
}