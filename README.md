# Specification Pattern

[![Latest Stable Version](https://poser.pugx.org/vjik/specification/v)](https://packagist.org/packages/vjik/specification)
[![Total Downloads](https://poser.pugx.org/vjik/specification/downloads)](https://packagist.org/packages/vjik/specification)
[![Build status](https://github.com/vjik/specification/actions/workflows/build.yml/badge.svg)](https://github.com/vjik/specification/actions/workflows/build.yml)
[![Coverage Status](https://coveralls.io/repos/github/vjik/specification/badge.svg)](https://coveralls.io/github/vjik/specification)
[![Mutation testing badge](https://img.shields.io/endpoint?style=flat&url=https%3A%2F%2Fbadge-api.stryker-mutator.io%2Fgithub.com%2Fvjik%2Fspecification%2Fmaster)](https://dashboard.stryker-mutator.io/reports/github.com/vjik/specification/master)
[![type-coverage](https://shepherd.dev/github/vjik/specification/coverage.svg)](https://shepherd.dev/github/vjik/specification)
[![static analysis](https://github.com/vjik/specification/workflows/static%20analysis/badge.svg)](https://github.com/vjik/specification/actions?query=workflow%3A%22static+analysis%22)
[![psalm-level](https://shepherd.dev/github/vjik/specification/level.svg)](https://shepherd.dev/github/vjik/specification)

The package provides PHP implementation of
"[Specification](https://designpatternsphp.readthedocs.io/en/latest/Behavioral/Specification/README.html)"
software design pattern:

- interface `SpecificationInterface` and abstract `BaseSpecification` to create user specifications;
- composite specifications `AndSpecification` and `OrSpecification`;
- negation specification `NotSpecification`.

## Requirements

- PHP 8.2 or higher.

## Installation

The package could be installed with [composer](https://getcomposer.org/download/):

```shell
composer require vjik/specification
```

## General usage

You can create your own specifications by inheriting from the `BaseSpecification` class:

```php
use Vjik\Specification\BaseSpecification;
    
/**
 * @template T as User
 * @template-extends BaseSpecification<T>
 */
final class UserIsAdultSpecification extends BaseSpecification
{
    /**
     * @param T $value
     */
    public function isSatisfiedBy(mixed $value): bool
    {
        return $value->age >= 18;
    }
}

$specification = new UserIsAdultSpecification();

// true or false
$specification->isSatisfiedBy($user); 

// throws an exception if user is not adult
$specification->satisfiedBy($user); 
```

> We recommend use static analysis tools like [Psalm](https://psalm.dev) and [PHPStan](https://phpstan.org)
> to improve code quality.

### Built-in specifications

You can combine specifications using composite specifications:

```php
use Vjik\Specification\AndSpecification;
use Vjik\Specification\OrSpecification;

// User is adult AND active
$isActiveAdultUserSpecification = new AndSpecification([
    new UserIsAdultSpecification(),
    new UserIsActiveSpecification(),
]);

// User is adult OR user with parents
$userHasAccessSpecification = new OrSpecification([
    new UserIsAdultSpecification(),
    new UserWithParentsSpecification(),
]);
```

Also, you can use negation specification:

```php
use Vjik\Specification\NotSpecification;

// User is not adult
$userIsNotAdultSpecification = new NotSpecification(
    new UserIsAdultSpecification()
);
```

### Static analysis compatible

Static analysis tools like [Psalm](https://psalm.dev) and [PHPStan](https://phpstan.org) helps you to avoid mistakes.
For example, Psalm issues:

```php
$userIsAdultSpecification = new UserIsAdultSpecification();

// ERROR: InvalidArgument Argument 1 of UserIsAdultSpecification::isSatisfiedBy expects User, but 'test' provided
$userIsAdultSpecification->isSatisfiedBy('test')

// ERROR: InvalidArgument Argument 1 of UserIsAdultSpecification::satisfiedBy expects User, but 'test' provided
$userIsAdultSpecification->satisfiedBy('test')

// ERROR: InvalidArgument Incompatible types found for T (must have only one of User, Post)
$isActiveAdultUserSpecification = new AndSpecification([
    new UserIsAdultSpecification(),
    new PostIsActiveSpecificaion(),
]);
```

## Documentation

- [Internals](docs/internals.md)

If you have any questions or problems with this package, use [author telegram chat](https://t.me/predvoditelev_chat)
for communication.

## License

The `vjik/specification` is free software. It is released under the terms of the BSD License.
Please see [`LICENSE`](./LICENSE.md) for more information.
