<?php

declare(strict_types=1);

namespace Vjik\Specification\Tests;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Vjik\Specification\NotSpecification;
use Vjik\Specification\Tests\Support\NumberSpecification;

final class NotSpecificationTest extends TestCase
{
    public static function dataBase(): array
    {
        return [
            [false, 2],
            [false, 5],
            [true, 6],
        ];
    }

    #[DataProvider('dataBase')]
    public function testBase(bool $expected, int $value): void
    {
        $specification = new NotSpecification(
            new NumberSpecification(max: 5),
        );

        $result = $specification->isSatisfiedBy($value);

        $this->assertSame($expected, $result);
    }
}
