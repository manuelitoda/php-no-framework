<?php

declare(strict_types=1);

namespace ManuelitoDA\PhpNoFramework\Domain;

interface LocationRepositoryInterface
{
    public function save(Location $location): void;
}
