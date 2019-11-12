<?php

namespace Mediadevs\Configuration\Traits;

use Mediadevs\Configuration\Exceptions\ConfigurationDirectoryException;

trait DirectoryCheckerTrait
{
    /**
     * Whether the configuration directory exists
     * @param string $path
     *
     * @return bool
     * @throws ConfigurationDirectoryException
     */
    public function configurationDirectoryExists(string $path): bool
    {
        // An exception will be thrown if the directory doesn't exist
        if (is_dir($path)) {
            return true;
        } else {
            throw new ConfigurationDirectoryException();
        }
    }
}
