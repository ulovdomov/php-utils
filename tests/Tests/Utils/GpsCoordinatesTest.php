<?php declare(strict_types = 1);

namespace Tests\Utils;

use PHPUnit\Framework\TestCase;
use UlovDomov\GeoLocation\GpsCoordinates;

final class GpsCoordinatesTest extends TestCase
{
    public function testBasic(): void
    {
        $lat = 50.33424;
        $lng = 12.21344;

        $coordinates = GpsCoordinates::from($lat, $lng);
        self::assertSame($lat, $coordinates->getLatitude());
        self::assertSame($lng, $coordinates->getLongitude());
        self::assertSame([
            'lat' => $lat,
            'lng' => $lng,
        ], $coordinates->toArray());
    }
}
