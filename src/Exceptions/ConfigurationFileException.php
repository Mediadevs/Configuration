<?php

namespace Mediadevs\Configuration\Exceptions;

use Exception;

class ConfigurationFileException extends Exception
{
    /**
     * This exception will be thrown when the configuration file doesn't exist.
     * @return string
     */
    public function errorMessage()
    {
        return 'Invalid config file! Error thrown the file: ' . $this->getMessage() . ' does not exist.' . PHP_EOL
               . 'Error thrown at line: ' . $this->getLine() . ' in file: ' . $this->getFile() . PHP_EOL;
    }
}