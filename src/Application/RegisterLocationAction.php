<?php

declare(strict_types=1);

namespace ManuelitoDA\PhpNoFramework\Application;

use ManuelitoDA\PhpNoFramework\Domain\Location;
use ManuelitoDA\PhpNoFramework\Domain\LocationRepositoryInterface;
use ManuelitoDA\PhpNoFramework\Domain\MissingDeviceUuidException;
use ManuelitoDA\PhpNoFramework\Domain\MissingLatException;
use ManuelitoDA\PhpNoFramework\Domain\MissingLonException;

final class RegisterLocationAction
{
    private LocationRepositoryInterface $locationRepository;

    public function __construct(LocationRepositoryInterface $locationRepository)
    {
        $this->locationRepository = $locationRepository;
    }

    public function __invoke(string $deviceUuid, string $lat, string $lon)
    {
        $this->validate($deviceUuid, $lat, $lon);
        $location = new Location($deviceUuid, $lat, $lon);
        $this->locationRepository->save($location);
    }

    public function validate(string $deviceUuid, string $lat, string $lon)
    {
        if (empty($deviceUuid)) throw new MissingDeviceUuidException;
        if (empty($deviceUuid)) throw new MissingLatException;
        if (empty($deviceUuid)) throw new MissingLonException;
    }
}
