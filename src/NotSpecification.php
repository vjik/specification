<?php

declare(strict_types=1);

namespace Vjik\Specification;

/**
 * @template T
 * @template-extends BaseSpecification<T>
 * @api
 */
final class NotSpecification extends BaseSpecification
{
    public function __construct(
        /**
         * @var SpecificationInterface<T>
         */
        private readonly SpecificationInterface $specification,
        private readonly string $message = 'Specification is not satisfied.',
    ) {
    }

    /**
     * @param T $value
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
