<?php

declare(strict_types=1);

namespace Vjik\Specification;

/**
 * @template T
 * @template-implements SpecificationInterface<T>
 * @api
 */
abstract class BaseSpecification implements SpecificationInterface
{
    /**
     * @param T $value
     */
    public function isSatisfiedBy(mixed $value): bool
    {
        try {
            $this->satisfiedBy($value);
            return true;
        } catch (SpecificationException) {
            return false;
        }
    }
}
