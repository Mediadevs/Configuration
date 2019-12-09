<?php

namespace Mediadevs\Configuration\Traits;

use Mediadevs\Configuration\Exceptions\ConfigurationFileException;

trait FileCheckerTrait
{
    /**
     * Whether the configuration file exists.
     *
     * @param string $file
     *
     * @throws ConfigurationFileException
     *
     * @return bool
     */
    public function configurationFileExists(string $file): bool
    {
        // An exception will be thrown if the directory doesn't exist
        if (file_exists($file)) {
            return true;
        } else {
            throw new ConfigurationFileException();
        }
    }
}
