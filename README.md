# PHPUnit Overview

## Installation

https://phpunit.de/manual/current/en/installation.html

### PHP Archive (PHAR)

```
$ wget https://phar.phpunit.de/phpunit-6.5.phar
$ chmod +x phpunit-6.5.phar
$ sudo mv phpunit-6.5.phar /usr/local/bin/phpunit
$ phpunit --version
PHPUnit x.y.z by Sebastian Bergmann and contributors.
```

### Composer

```
$ composer install
$ vendor/bin/phpunit --version
PHPUnit 6.5.5 by Sebastian Bergmann, Julien Breux (Docker) and contributors.
```

### Docker

Windows Note: If you are using Docker Toolkit and VirtualBox under Windows, your
project directory must be under C:\Users in order for the volume to be shared
properly out of the box. If you are using Docker for Windows with
virtualization, you should be able to run from anywhere.

**UNIX**
```
$ docker build -t phpunit_overview/phpunit .
...
$ docker run -v $(pwd):/app --rm phpunit_overview/phpunit --version
PHPUnit 6.5.5 by Sebastian Bergmann, Julien Breux (Docker) and contributors.

$ alias phpunit="docker run -v \$(pwd):/app --rm phpunit_overview/phpunit"
$ phpunit --version
PHPUnit 6.5.5 by Sebastian Bergmann, Julien Breux (Docker) and contributors.
```

**Windows**
```
$ docker build -t phpunit_overview/phpunit .
...
$ docker run -v %cd%:/app --rm phpunit_overview/phpunit --version
PHPUnit 6.5.5 by Sebastian Bergmann, Julien Breux (Docker) and contributors.

$ phpunit.bat --version
PHPUnit 6.5.5 by Sebastian Bergmann, Julien Breux (Docker) and contributors.
```

## Running PHPUnit

```
$ phpunit --bootstrap lib/Calculator.php tests/002-Basic-Tests
$ phpunit -c tests/phpunit.xml tests
```

## Examples

### Failing Tests
```
$ phpunit tests/001-Test-Failures/FailingCalculatorTest.php
PHPUnit 6.5.5 by Sebastian Bergmann, Julien Breux (Docker) and contributors.
.                                                                   1 / 1 (100%)
Time: 701 ms, Memory: 2.00MB
There was 1 incomplete test:

1) FailingCalculatorTest::testAdd
This tests has not been implemented yet.

/app/tests/001-Test-Failures/FailingCalculatorTest.php:14

OK, but incomplete, skipped, or risky tests!
Tests: 1, Assertions: 0, Incomplete: 1.
$
```

### Basic Test with Bootstrap

```
$ phpunit --bootstrap lib/Calculator.php tests/002-Basic-Tests/BasicCalulatorTest.php
PHPUnit 6.5.5 by Sebastian Bergmann, Julien Breux (Docker) and contributors.
.                                                                   1 / 1 (100%)
Time: 701 ms, Memory: 2.00MB
OK (1 test, 2 assertions)
$
```

### Basic Test with Autoload

```
$ phpunit -c tests/phpunit.xml tests/003-More-Tests/BetterCalculatorTest.php
PHPUnit 6.5.5 by Sebastian Bergmann, Julien Breux (Docker) and contributors.
Runtime:       PHP 7.1.5 with Xdebug 2.5.3
Configuration: /app/tests/phpunit.xml
...                                                                 4 / 4 (100%)
Time: 61 ms, Memory: 2.00MB
OK (3 tests, 12 assertions)
$
```

### Test Fixtures
```
$ phpunit tests/004-Fixtures
```

### Test Fixtures with a Base Class
```
$ phpunit tests/005-Fixtures-With-Base
```

### Data Providers
```
$ phpunit tests/006-Data-Providers
```

### Database Tests
```
$ phpunit tests/007-Database-Tests
```

### Stub and Mock Tests
```
$ phpunit tests/008-Stubs-And-Mocks
```
