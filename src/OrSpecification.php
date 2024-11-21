<?php

declare(strict_types=1);

namespace Vjik\Specification;

/**
 * @template T
 * @template-extends BaseSpecification<T>
 * @api
 */
final class OrSpecification extends BaseSpecification
{
    public function __construct(
        /**
         * @var array<array-key, SpecificationInterface<T>>
         */
        private readonly array $specifications,
        private readonly string $message = 'Specification is not satisfied.',
    ) {}

    /**
     * @param T $value
     */
    public function satisfiedBy(mixed $value): void
    {
        foreach ($this->specifications as $specification) {
            try {
                $specification->satisfiedBy($value);
                return;
            } catch (SpecificationException) {
            }
        }
        throw new SpecificationException($this->message);
    }
}
