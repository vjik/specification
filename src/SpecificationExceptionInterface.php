<?php

declare(strict_types=1);

namespace Vjik\Specification;

use Throwable;

/**
 * Base interface for exceptions that thrown if the value does not satisfy the specification.
 *
 * @api
 */
interface SpecificationExceptionInterface extends Throwable
{
}
