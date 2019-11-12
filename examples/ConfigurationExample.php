<?php

use Mediadevs\Configuration\Configuration;
use Mediadevs\Configuration\Exceptions\ConfigurationFileException;
use Mediadevs\Configuration\Exceptions\InvalidReturnTypeException;
use Mediadevs\Configuration\Exceptions\ConfigurationDirectoryException;

try {
    $config = (new Configuration())
        ->directory('./config')
        ->config('config_file')
        ->get(Configuration::RETURN_TYPE_ARRAY);
    /**
     * Possible return types:
     * array:   (Configuration::RETURN_TYPE_ARRAY)
     * Json:    (Configuration::RETURN_TYPE_JSON)
     */
} catch (ConfigurationDirectoryException $e) {
    echo $e->errorMessage();
} catch (ConfigurationFileException $e) {
    echo $e->errorMessage();
} catch (InvalidReturnTypeException $e) {
    echo $e->errorMessage();
}
