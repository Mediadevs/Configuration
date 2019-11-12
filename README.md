# Configuration
[![Total Downloads](https://poser.pugx.org/mediadevs/configuration/downloads)](https://packagist.org/packages/mediadevs/configuration)
[![Latest Unstable Version](https://poser.pugx.org/mediadevs/configuration/v/unstable)](https://packagist.org/packages/mediadevs/configuration)
[![Latest Stable Version](https://poser.pugx.org/mediadevs/configuration/v/stable)](https://packagist.org/packages/mediadevs/configuration)
[![Version](https://img.shields.io/packagist/v/mediadevs/configuration.svg)](https://packagist.org/packages/mediadevs/configuration)
[![Software License][ico-license]](LICENSE.md)
[![Code Intelligence Status](https://scrutinizer-ci.com/g/mediadevs/configuration/badges/code-intelligence.svg?b=master)](https://scrutinizer-ci.com/code-intelligence)
[![Build Status](https://scrutinizer-ci.com/g/Mediadevs/configuration/badges/build.png?b=master)](https://scrutinizer-ci.com/g/Mediadevs/configuration/build-status/master)
[![Code Coverage](https://scrutinizer-ci.com/g/mediadevs/configuration/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/mediadevs/configuration/?branch=master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/mediadevs/configuration/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/mediadevs/configuration/?branch=master)
[![Minimum PHP Version](https://img.shields.io/badge/php-_%5E7.1-8892BF.svg)](https://github.com/symfony/symfony)

## Install

Via Composer

``` bash
$ composer require mediadevs/configuration
```

Via GIT
``` bash
HTTPS:
git clone https://github.com/mediadevs/configuration.git

SSH:
git clone git@github.com:mediadevs/configuration.git
```

## Usage
```php
<?php

use Mediadevs\Configuration\Configuration;

try {
    $config = (
        new Configuration()
    )->directory('./config')->config('config_file')->get(Configuration::RETURN_TYPE_ARRAY);
    /**
     * Possible return types:
     * array:   (Configuration::RETURN_TYPE_ARRAY)
     * Json:    (Configuration::RETURN_TYPE_JSON)
     */
} catch (\Mediadevs\Configuration\Exceptions\ConfigurationDirectoryException $e) {
    echo $e->errorMessage();
} catch (\Mediadevs\Configuration\Exceptions\ConfigurationFileException $e) {
    echo $e->errorMessage();
} catch (\Mediadevs\Configuration\Exceptions\InvalidReturnTypeException $e) {
    echo $e->errorMessage();
}

``` 

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CODE_OF_CONDUCT](CODE_OF_CONDUCT.md) for details.

## Security

If you discover any security related issues, please email contact@mediadevs.nl instead of using the issue tracker.

## Credits

- [Mike van Diepen](https://github.com/mikevandiepen)
- [All Contributors]()

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/mediadevs/configuration.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/mediadevs/configuration/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/mediadevs/configuration.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/mediadevs/configuration.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/mediadevs/configuration.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/mediadevs/configuration
[link-travis]: https://travis-ci.org/mediadevs/configuration
[link-scrutinizer]: https://scrutinizer-ci.com/g/mediadevs/configuration/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/mediadevs/configuration
[link-downloads]: https://packagist.org/packages/mediadevs/configuration
[link-author]: https://github.com/mikevandiepen
