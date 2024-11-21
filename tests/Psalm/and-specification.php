<?php

declare(strict_types=1);

use Vjik\Specification\AndSpecification;
use Vjik\Specification\Tests\Support\LengthSpecification;
use Vjik\Specification\Tests\Support\NumberSpecification;

function differentTypesInSpecifications(): void
{
    /** @psalm-suppress InvalidArgument */
    new AndSpecification([
        new LengthSpecification(12),
        new NumberSpecification(7),
    ]);
}

function invalidTypeInSatisfiedBy(): void
{
    $specification = new AndSpecification([
        new NumberSpecification(min: 3),
        new NumberSpecification(max: 19),
    ]);

    /** @psalm-suppress InvalidArgument */
    $specification->satisfiedBy('hello');
}

function invalidTypeInIsSatisfiedBy(): void
{
    $specification = new AndSpecification([
        new NumberSpecification(min: 3),
        new NumberSpecification(max: 19),
    ]);

    /** @psalm-suppress InvalidArgument */
    $specification->isSatisfiedBy('hello');
}
