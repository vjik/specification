<?php

declare(strict_types=1);

namespace Vjik\Specification;

/**
 * A specification that is not satisfied if the given specification is satisfied.
 *
 * @template T
 * @template-extends BaseSpecification<T>
 * @api
 */
final class NotSpecification extends BaseSpecification
{
    public function __construct(
        /**
         * @var SpecificationInterface<T> The specification to negate.
         */
        private readonly SpecificationInterface $specification,
        /**
         * @var string The message to use in the exception thrown when the specification is satisfied.
         */
        private readonly string $message = 'Specification is not satisfied.',
    ) {}

    /**
     * @param T $value The value to check.
     */
    public function satisfiedBy(mixed $value): void
    {
        try {
            $this->specification->satisfiedBy($value);
        } catch (SpecificationException) {
            return;
        }
        throw new SpecificationException($this->message);
    }

}
