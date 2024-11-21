<?php

declare(strict_types=1);

namespace Vjik\Specification;

/**
 * Composite specification, which represents a logical OR operation over the given specifications.
 *
 * @template T
 * @template-extends BaseSpecification<T>
 * @api
 */
final class OrSpecification extends BaseSpecification
{
    public function __construct(
        /**
         * @var array<array-key, SpecificationInterface<T>> The specifications to combine.
         */
        private readonly array $specifications,
        /**
         * @var string The message to use in the exception thrown when the specification is not satisfied.
         */
        private readonly string $message = 'Specification is not satisfied.',
    ) {}

    /**
     * @param T $value The value to check.
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
