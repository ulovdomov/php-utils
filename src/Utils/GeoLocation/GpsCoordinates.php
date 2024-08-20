<?php declare(strict_types = 1);

namespace UlovDomov\GeoLocation;

final class GpsCoordinates
{
    public const MAX_LAT_TOLERANCE = 0.007; // cca 500m latitude
    public const MAX_LNG_TOLERANCE = 0.005; // cca 500m longitude

    private function __construct(
        public float $latitude,
        public float $longitude,
    ) {
    }

    public function getLatitude(): float
    {
        return $this->latitude;
    }

    public function getLongitude(): float
    {
        return $this->longitude;
    }

    public function isInProximity(
        GpsCoordinates $coordinates,
        float $maxLatitudeTolerance = self::MAX_LAT_TOLERANCE,
        float $maxLongitudeTolerance = self::MAX_LAT_TOLERANCE,
    ): bool
    {
        $latitudeSubtract = $coordinates->getLatitude() - $this->getLatitude();
        $longitudeSubtract = $coordinates->getLongitude() - $this->getLongitude();

        return \abs($latitudeSubtract) <= $maxLatitudeTolerance && \abs($longitudeSubtract) <= $maxLongitudeTolerance;
    }

    /**
     * @return array<float>
     */
    public function toArray(): array
    {
        return [
            'lat' => $this->latitude,
            'lng' => $this->longitude,
        ];
    }

    public static function from(float $latitude, float $longitude): self
    {
        return new self(
            latitude: $latitude,
            longitude: $longitude,
        );
    }
}
