<?php

declare(strict_types=1);

use Vjik\Specification\Tests\Support\NumberSpecification;

function invalidTypeInSatisfiedBy(): void
{
    $specification = new NumberSpecification(23);

    /** @psalm-suppress InvalidArgument */
    $specification->satisfiedBy('hello');
}

function invalidTypeInIsSatisfiedBy(): void
{
    $specification = new NumberSpecification(23);

    /** @psalm-suppress InvalidArgument */
    $specification->isSatisfiedBy('hello');
}
