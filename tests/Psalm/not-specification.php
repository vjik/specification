<?php

declare(strict_types=1);

use Vjik\Specification\NotSpecification;
use Vjik\Specification\Tests\Support\LengthSpecification;
use Vjik\Specification\Tests\Support\NumberSpecification;

function invalidTypeInSatisfiedBy(): void
{
    $specification = new NotSpecification(
        new NumberSpecification(min: 3)
    );

    /** @psalm-suppress InvalidArgument */
    $specification->satisfiedBy('hello');
}

function invalidTypeInIsSatisfiedBy(): void
{
    $specification = new NotSpecification(
        new NumberSpecification(min: 3)
    );

    /** @psalm-suppress InvalidArgument */
    $specification->isSatisfiedBy('hello');
}
