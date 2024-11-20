<?php

declare(strict_types=1);

namespace Vjik\Specification\Tests;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Vjik\Specification\AndSpecification;
use Vjik\Specification\Tests\Support\NumberSpecification;

final class AndSpecificationTest extends TestCase
{
    public static function dataBase(): array
    {
        return [
            [true, 1],
            [true, 3],
            [true, 5],
            [false, 6],
            [false, 0],
        ];
    }

    #[DataProvider('dataBase')]
    public function testBase(bool $expected, int $value): void
    {
        $specification = new AndSpecification([
            new NumberSpecification(max: 5),
            new NumberSpecification(min: 1),
        ]);

        $result = $specification->isSatisfiedBy($value);

        $this->assertSame($expected, $result);
    }
}
