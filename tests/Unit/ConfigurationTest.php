<?php

namespace Mediadevs\Configuration\Tests;

use Mediadevs\Configuration\Configuration;
use Mediadevs\Configuration\Exceptions\ConfigurationDirectoryException;
use Mediadevs\Configuration\Exceptions\ConfigurationFileException;
use Mediadevs\Configuration\Exceptions\InvalidReturnTypeException;
use PHPUnit\Framework\TestCase;

class ConfigurationTest extends TestCase
{
    protected const CONFIGURATION_FILE = 'config';
    protected const CONFIGURATION_DIRECTORY = './Fixtures';

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

        $toArray = [
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
                'December'
            ],
            'Days' => [
                'Monday',
                'Tuesday',
                'Wednesday',
                'Thursday',
                'Friday',
                'Saturday',
                'Sunday'
            ]
        ];

        // Loading the expectations.
        $this->expectations = array(
            'array' => $toArray,
            'json'  => json_encode($toArray)
        );
    }

    /**
     * @test Whether the config can be collected and if the results are returned as an array.
     * @testdox The configuration file can be collected as an array.
     * @covers \Mediadevs\Configuration\Configuration::returnArray
     */
    protected function testGetConfigAsArray()
    {
        try {
            $results = $this->configuration
                ->directory(self::CONFIGURATION_DIRECTORY)
                ->config(self::CONFIGURATION_FILE)
                ->get(Configuration::RETURN_TYPE_ARRAY);

            $this->assertSame($results, $this->expectations['array']);
        } catch (ConfigurationDirectoryException $e) {
            // Do nothing
        }
        catch (ConfigurationFileException $e) {
            // Do nothing
        }
        catch (InvalidReturnTypeException $e) {
            // Do nothing
        }
    }

    /**
     * @test Whether the config can be collected and if the results are returned as JSON.
     * @testdox The configuration file can be collected as JSON.
     * @covers \Mediadevs\Configuration\Configuration::returnJson
     */
    protected function testGetConfigAsJSON()
    {
        try {
            $results = $this->configuration
                ->directory(self::CONFIGURATION_DIRECTORY)
                ->config(self::CONFIGURATION_FILE)
                ->get(Configuration::RETURN_TYPE_JSON);

            $this->assertSame($results, $this->expectations['json']);
        } catch (ConfigurationDirectoryException $e) {
            // Do nothing
        }
        catch (ConfigurationFileException $e) {
            // Do nothing
        }
        catch (InvalidReturnTypeException $e) {
            // Do nothing
        }
    }
}
