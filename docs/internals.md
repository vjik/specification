# Internals

## Unit testing

The package is tested with [PHPUnit](https://phpunit.de/). To run tests:

```shell
./vendor/bin/phpunit
```

## Mutation testing

The package tests are checked with [Infection](https://infection.github.io/) mutation framework with
[Infection Static Analysis Plugin](https://github.com/Roave/infection-static-analysis-plugin). To run it:

```shell
./vendor/bin/roave-infection-static-analysis-plugin
```

## Static analysis

The code is statically analyzed with [Psalm](https://psalm.dev/). To run static analysis:

```shell
./vendor/bin/psalm
```

## Psalm testing

Package contains tests of Psalm issues. To run Psalm testing:

```shell
composer test-psalm
```

## Code style

Package used [PHP CS Fixer](https://cs.symfony.com/) to maintain [PER CS 2.0](https://www.php-fig.org/per/coding-style/)
code style. To check and fix code style:

```shell
composer cs-fix
```

## Dependencies

Use [ComposerRequireChecker](https://github.com/maglnet/ComposerRequireChecker) to detect transitive
[Composer](https://getcomposer.org) dependencies:

```shell
./vendor/bin/composer-require-checker
```
