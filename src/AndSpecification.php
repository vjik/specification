<?php

declare(strict_types=1);

namespace Vjik\Specification;

/**
 * Specification that combines multiple specifications with a logical AND operator.
 *
 * @template T
 * @template-extends BaseSpecification<T>
 * @api
 */
final class AndSpecification extends BaseSpecification
{
    public function __construct(
        /**
         * @var array<array-key, SpecificationInterface<T>> The specifications to combine.
         */
        private readonly array $specifications,
        /**
         * @var string|null The message to use in the exception thrown when the specification is not satisfied.
         */
        private readonly ?string $message = null,
    ) {}

    /**
     * @param T $value The value to check.
     */
    public function satisfiedBy(mixed $value): void
    {
        foreach ($this->specifications as $specification) {
            try {
                $specification->satisfiedBy($value);
            } catch (SpecificationException $exception) {
                throw $this->message === null
                    ? $exception
                    : new SpecificationException($this->message, previous: $exception);
            }
        }
    }
}
