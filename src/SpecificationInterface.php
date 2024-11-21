<?php

declare(strict_types=1);

namespace Vjik\Specification;

/**
 * Interface reflects "Specification" design pattern.
 *
 * @see https://designpatternsphp.readthedocs.io/en/latest/Behavioral/Specification/README.html
 *
 * @template T
 * @api
 */
interface SpecificationInterface
{
    /**
     * @param T $value The value to check.
     * @throws SpecificationExceptionInterface If the value does not satisfy the specification.
     */
    public function satisfiedBy(mixed $value): void;

    /**
     * @param T $value The value to check.
     * @return bool Whether the value satisfies the specification.
     */
    public function isSatisfiedBy(mixed $value): bool;
}
