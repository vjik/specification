<?php

declare(strict_types=1);

namespace Vjik\Specification;

use RuntimeException;

/**
 * Simple exception that thrown if the value does not satisfy the specification.
 *
 * @api
 */
final class SpecificationException extends RuntimeException implements SpecificationExceptionInterface
{
}
