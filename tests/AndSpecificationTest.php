<?php

declare(strict_types=1);

namespace Vjik\Specification\Tests;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Throwable;
use Vjik\Specification\AndSpecification;
use Vjik\Specification\SpecificationException;
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

    public function testCustomMessage(): void
    {
        $specification = new AndSpecification(
            [new NumberSpecification(min: 1)],
            'Test message',
        );

        $exception = null;
        try {
            $specification->satisfiedBy(0);
        } catch (Throwable $exception) {
        }

        $this->assertInstanceOf(SpecificationException::class, $exception);
        $this->assertSame('Test message', $exception->getMessage());
        $this->assertInstanceOf(SpecificationException::class, $exception->getPrevious());
        $this->assertSame('Value is less than minimum.', $exception->getPrevious()->getMessage());
    }
}
