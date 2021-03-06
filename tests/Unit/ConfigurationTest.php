<?php

namespace Mediadevs\Configuration\Tests;

use PHPUnit\Framework\TestCase;
use Mediadevs\Configuration\Configuration;
use Mediadevs\Configuration\Exceptions\ConfigurationFileException;
use Mediadevs\Configuration\Exceptions\InvalidReturnTypeException;
use Mediadevs\Configuration\Exceptions\ConfigurationDirectoryException;

class ConfigurationTest extends TestCase
{
    protected const CONFIGURATION_FILE = 'config';
    protected const CONFIGURATION_DIRECTORY = __DIR__ . DIRECTORY_SEPARATOR . 'Fixtures';

    /**
     * The expectations for this test.
     *
     * @var array
     */
    protected $expectations = array();

    /**
     * The instance of the configuration class.
     *
     * @var Configuration
     */
    private $configuration;

    /**
     * Setting up the subject class for this tests.
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();

        // Instantiating the configuration class.
        $this->configuration = new Configuration();

        // Filling in the expectations
        $this->expectations = array(
            'Months' => [
                'January',
                'February',
                'March',
                'April',
                'May',
                'June',
                'July',
                'August',
                'September',
                'October',
                'November',
                'December',
            ],
            'Days' => [
                'Monday',
                'Tuesday',
                'Wednesday',
                'Thursday',
                'Friday',
                'Saturday',
                'Sunday',
            ],
        );
    }

    /**
     * @test Whether the config can be collected and if the results are returned as an array.
     * @testdox The configuration file can be collected as an array.
     *
     * @return void
     */
    public function testGetConfigAsArray(): void
    {
        try {
            $results = $this->configuration
                ->directory(self::CONFIGURATION_DIRECTORY)
                ->config(self::CONFIGURATION_FILE)
                ->get(Configuration::RETURN_TYPE_ARRAY);

            $this->assertSame($results, $this->expectations);
        } catch (ConfigurationDirectoryException $e) {
            $this->expectException(ConfigurationDirectoryException::class);
            echo $e->errorMessage();
        } catch (ConfigurationFileException $e) {
            $this->expectException(ConfigurationFileException::class);
            echo $e->errorMessage();
        } catch (InvalidReturnTypeException $e) {
            $this->expectException(InvalidReturnTypeException::class);
            echo $e->errorMessage();
        }
    }

    /**
     * @test Whether the config can be collected and if the results are returned as JSON.
     * @testdox The configuration file can be collected as JSON.
     *
     * @return void
     */
    public function testGetConfigAsJSON(): void
    {
        try {
            $results = $this->configuration
                ->directory(self::CONFIGURATION_DIRECTORY)
                ->config(self::CONFIGURATION_FILE)
                ->get(Configuration::RETURN_TYPE_JSON);

            $this->assertSame($results, json_encode($this->expectations));
        } catch (ConfigurationDirectoryException $e) {
            $this->expectException(ConfigurationDirectoryException::class);
            echo $e->errorMessage();
        } catch (ConfigurationFileException $e) {
            $this->expectException(ConfigurationFileException::class);
            echo $e->errorMessage();
        } catch (InvalidReturnTypeException $e) {
            $this->expectException(InvalidReturnTypeException::class);
            echo $e->errorMessage();
        }
    }
}
