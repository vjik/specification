<?php

declare(strict_types=1);

namespace Vjik\Specification\Tests\Support;

use Vjik\Specification\BaseSpecification;
use Vjik\Specification\SpecificationException;

use function strlen;

/**
 * @template T as string
 * @template-extends BaseSpecification<T>
 */
final class LengthSpecification extends BaseSpecification
{
    public function __construct(
        private readonly ?int $max = null,
        private readonly ?int $min = null,
    ) {}

    /**
     * @param T $value
     */
    public function satisfiedBy(mixed $value): void
    {
        $length = strlen($value);
        if ($this->max !== null && $length > $this->max) {
            throw new SpecificationException('Length is greater than maximum.');
        }
        if ($this->min !== null && $length < $this->min) {
            throw new SpecificationException('Length is less than minimum.');
        }
    }
}
