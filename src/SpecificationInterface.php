<?php

declare(strict_types=1);

namespace Vjik\Specification;

/**
 * @template T
 * @api
 */
interface SpecificationInterface
{
    /**
     * @param T $value
     * @throws SpecificationException
     */
    public function satisfiedBy(mixed $value): void;

    /**
     * @param T $value
     */
    public function isSatisfiedBy(mixed $value): bool;
}
