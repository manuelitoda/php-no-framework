<?php

declare(strict_types=1);

namespace ManuelitoDA\PhpNoFramework\Infrastructure;

use ManuelitoDA\PhpNoFramework\Domain\Location;
use ManuelitoDA\PhpNoFramework\Domain\LocationRepositoryInterface;

final class LocationRepository implements LocationRepositoryInterface
{
    private \PDO $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function save(Location $location): void
    {
        $statement = $this->pdo->prepare("
        INSERT INTO locations (device_uuid, lat, lon) VALUES (:device_uuid, :lat, :lon)
        ");
        $statement->execute([
            'device_uuid' => $location->getDeviceUuid(),
            'lat' => $location->getLat(),
            'lon' => $location->getLon()
        ]);
    }
}
