# Php Utils Package

Php Utils Package

There are many utils:

- `Enum`
  - EnumToArray.php
- `Exceptions`
  - LogicException.php
  - RuntimeException.php
  - UnprocessableException.php
  - ValidationException.php
- `GeoLocation`
  - GpsCoordinates.php
- `Helpers`
  - Dumper.php
- `Http`
  - StatusCode.php

## Installation

Add following to your `composer.json`:

```json
{
  "repositories": [
    {
      "type": "vcs",
      "url": "https://github.com/ulovdomov/php-utils"
    }
  ]
}
```

And run:

```shell
composer require ulovdomov/php-utils
```

## Usage

### `UlovDomov\GeoLocation\GpsCoordinates`

```php
$lat = 50.33424;
$lng = 12.21344;

$coordinates = \UlovDomov\GeoLocation\GpsCoordinates::from($lat, $lng);

self::assertSame($lat, $coordinates->getLatitude());
self::assertSame($lng, $coordinates->getLongitude());
self::assertSame([
   'lat' => $lat,
   'lng' => $lng,
], $coordinates->toArray());
```

Check if your coordinates are in proximity with other coordinates

```php
$maxLatTolerance = 0.007; // cca 500m latitude
$maxLngTolerance = 0.005; // cca 500m longitude

$checked = \UlovDomov\GeoLocation\GpsCoordinates::from(50.63821, 12.02224);
$coordinates->isInProximity($checked, $maxLatTolerance, $maxLngTolerance);
```

### `UlovDomov\Helpers\Dumper`

You can convert any value to string with method `toString`:

```php
$var = /* any value */;
echo UlovDomov\Helpers\Dumper::toString($var);
```

You can convert values to php code `toPhp`:

```php
$var = [
    'foo' => 'bar',
];

$string = UlovDomov\Helpers\Dumper::toPhp($var);

// $string contains
"['foo' => 'bar']"
```

## Development

### First setup

1. Run for initialization
```shell
make init
```
2. Run composer install
```shell
make composer
```

Use tasks in Makefile:

- To log into container
```shell
make docker
```
- To run code sniffer fix
```shell
make cs-fix
```
- To run PhpStan
```shell
make phpstan
```
- To run tests
```shell
make phpunit
```