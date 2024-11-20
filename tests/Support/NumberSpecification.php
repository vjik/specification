<?php

declare(strict_types=1);

namespace Vjik\Specification\Tests\Support;

use Vjik\Specification\BaseSpecification;
use Vjik\Specification\SpecificationException;

/**
 * @template T as int
 * @template-extends BaseSpecification<T>
 */
final class NumberSpecification extends BaseSpecification
{
    public function __construct(
        private readonly ?int $max = null,
        private readonly ?int $min = null,
    ) {
    }

    /**
     * @param T $value
     */
    public function satisfiedBy(mixed $value): void
    {
        if ($this->max !== null && $value > $this->max) {
            throw new SpecificationException('Value is greater than maximum.');
        }
        if ($this->min !== null && $value < $this->min) {
            throw new SpecificationException('Value is less than minimum.');
        }
    }
}
