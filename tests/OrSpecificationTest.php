<?php

declare(strict_types=1);

namespace Vjik\Specification\Tests;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Vjik\Specification\OrSpecification;
use Vjik\Specification\Tests\Support\NumberSpecification;

final class OrSpecificationTest extends TestCase
{
    public static function dataBase(): array
    {
        return [
            [true, 2],
            [true, 3],
            [true, 5],
            [false, 6],
        ];
    }

    #[DataProvider('dataBase')]
    public function testBase(bool $expected, int $value): void
    {
        $specification = new OrSpecification([
            new NumberSpecification(max: 5),
            new NumberSpecification(max: 3),
        ]);

        $result = $specification->isSatisfiedBy($value);

        $this->assertSame($expected, $result);
    }
}
