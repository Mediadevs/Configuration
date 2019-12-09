<?php

namespace Mediadevs\Configuration\Exceptions;

use Exception;

class ConfigurationDirectoryException extends Exception
{
    /**
     * This exception will be thrown when the path of the configuration doesn't exist.
     *
     * @return string
     */
    public function errorMessage(): string
    {
        return 'Invalid directory path! error thrown the file: ' . $this->getMessage() . ' does not exist.' . PHP_EOL
               . 'Error thrown at line: ' . $this->getLine() . ' in file: ' . $this->getFile() . PHP_EOL;
    }
}
