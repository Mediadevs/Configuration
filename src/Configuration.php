<?php

namespace Mediadevs\Configuration;

use Mediadevs\Configuration\Traits\ReturnTypeTrait;
use Mediadevs\Configuration\Traits\FileCheckerTrait;
use Mediadevs\Configuration\Traits\DirectoryCheckerTrait;
use Mediadevs\Configuration\Exceptions\InvalidReturnTypeException;

class Configuration
{
    use ReturnTypeTrait;
    use FileCheckerTrait;
    use DirectoryCheckerTrait;

    /**
     * Return types for collecting the configuration data.
     */
    public const RETURN_TYPE_JSON = 'json';
    public const RETURN_TYPE_ARRAY = 'array';

    /**
     * Path to the configuration directory.
     *
     * @var string
     */
    private $path;

    /**
     * The file name of the desired configuration file.
     *
     * @var string
     */
    private $file;

    /**
     * The path to the config directory.
     *
     * @param string $path
     *
     * @return Configuration
     */
    public function directory(string $path): self
    {
        $this->path = $path;

        return $this;
    }

    /**
     * The name of the configuration file.
     *
     * @param string $file
     *
     * @return Configuration
     */
    public function config(string $file): self
    {
        $this->file = $file;

        return $this;
    }

    /**
     * Returning the contents of the configuration file.
     *
     * @param string $returnType
     *
     * @throws InvalidReturnTypeException
     * @throws Exceptions\ConfigurationFileException
     * @throws Exceptions\ConfigurationDirectoryException
     *
     * @return array|string|void
     */
    public function get(string $returnType = self::RETURN_TYPE_JSON): array
    {
        $configuration = $this->path . DIRECTORY_SEPARATOR . $this->file . '.php';

        // Validating whether the configuration file and directory exists
        if ($this->configurationDirectoryExists($this->path) && $this->configurationFileExists($configuration)) {
            $collection = include $configuration;

            // Returning the configuration in the desired format
            switch ($returnType) {
                case self::RETURN_TYPE_JSON:
                    return $this->returnJson($collection);

                case self::RETURN_TYPE_ARRAY:
                    return $this->returnArray($collection);

                default:
                    throw new InvalidReturnTypeException();
            }
        }
    }
}
