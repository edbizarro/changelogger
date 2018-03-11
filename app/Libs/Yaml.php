<?php

namespace App\Libs;

use Exception;
use Symfony\Component\Yaml\Exception\ParseException;
use Symfony\Component\Yaml\Yaml as YamlParser;

class Yaml
{
    /**
     * @param string $filePath
     *
     * @throws Exception
     *
     * @return array
     */
    public function parse(string $filePath): array
    {
        try {
            return YamlParser::parse(file_get_contents($filePath));
        } catch (ParseException $e) {
            throw new Exception(sprintf('Unable to parse the YAML string: %s', $e->getMessage()));
        }
    }
}
