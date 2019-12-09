<?php

namespace Mediadevs\Configuration\Traits;

trait ReturnTypeTrait
{
    /**
     * Return the data as JSON.
     *
     * @param array $data
     *
     * @return string
     */
    protected function returnJson(array $data): string
    {
        return (string) json_encode($data);
    }

    /**
     * Return the data as an array.
     *
     * @param array $data
     *
     * @return array
     */
    protected function returnArray(array $data): array
    {
        return (array) json_decode(json_encode($data), true);
    }
}
