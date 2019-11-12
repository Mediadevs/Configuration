<?php

namespace Mediadevs\Configuration\Exceptions;

use Exception;

class InvalidReturnTypeException extends Exception
{
    /**
     * This exception will be thrown when the invalid return type is given.
     * @return string
     */
    public function errorMessage()
    {
        return 'Invalid return type! Error thrown the file: ' . $this->getMessage() . ' does not exist.' . PHP_EOL
               . 'Error thrown at line: ' . $this->getLine() . ' in file: ' . $this->getFile() . PHP_EOL;
    }
}