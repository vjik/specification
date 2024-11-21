<?php

declare(strict_types=1);

namespace Vjik\Specification;

/**
 * Base class that can be used to create specifications.
 *
 * @template T
 * @template-implements SpecificationInterface<T>
 * @api
 */
abstract class BaseSpecification implements SpecificationInterface
{
    /**
     * @param T $value The value to check.
     * @return bool Whether the value satisfies the specification.
     */
    final public function isSatisfiedBy(mixed $value): bool
    {
        try {
            $this->satisfiedBy($value);
            return true;
        } catch (SpecificationException) {
            return false;
        }
    }
}
