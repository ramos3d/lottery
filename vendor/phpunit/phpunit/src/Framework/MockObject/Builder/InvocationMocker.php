<?php declare(strict_types=1);
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PHPUnit\Framework\MockObject\Builder;

use PHPUnit\Framework\Constraint\Constraint;
use PHPUnit\Framework\MockObject\ConfigurableMethod;
use PHPUnit\Framework\MockObject\IncompatibleReturnValueException;
<<<<<<< HEAD
use PHPUnit\Framework\MockObject\InvocationHandler;
use PHPUnit\Framework\MockObject\Matcher;
use PHPUnit\Framework\MockObject\Rule;
use PHPUnit\Framework\MockObject\RuntimeException;
use PHPUnit\Framework\MockObject\Stub\ConsecutiveCalls;
use PHPUnit\Framework\MockObject\Stub\Exception;
=======
use PHPUnit\Framework\MockObject\Matcher;
use PHPUnit\Framework\MockObject\Matcher\Invocation;
use PHPUnit\Framework\MockObject\RuntimeException;
use PHPUnit\Framework\MockObject\Stub\ConsecutiveCalls;
use PHPUnit\Framework\MockObject\Stub\Exception;
use PHPUnit\Framework\MockObject\Stub\MatcherCollection;
>>>>>>> 91dcab61a26f2b87ebabfb1b020636b3dcc87f2a
use PHPUnit\Framework\MockObject\Stub\ReturnArgument;
use PHPUnit\Framework\MockObject\Stub\ReturnCallback;
use PHPUnit\Framework\MockObject\Stub\ReturnReference;
use PHPUnit\Framework\MockObject\Stub\ReturnSelf;
use PHPUnit\Framework\MockObject\Stub\ReturnStub;
use PHPUnit\Framework\MockObject\Stub\ReturnValueMap;
use PHPUnit\Framework\MockObject\Stub\Stub;

/**
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
<<<<<<< HEAD
final class InvocationMocker implements InvocationStubber, MethodNameMatch
{
    /**
     * @var InvocationHandler
     */
    private $invocationHandler;
=======
final class InvocationMocker implements MethodNameMatch
{
    /**
     * @var MatcherCollection
     */
    private $collection;
>>>>>>> 91dcab61a26f2b87ebabfb1b020636b3dcc87f2a

    /**
     * @var Matcher
     */
    private $matcher;

    /**
     * @var ConfigurableMethod[]
     */
    private $configurableMethods;

<<<<<<< HEAD
    public function __construct(InvocationHandler $handler, Matcher $matcher, ConfigurableMethod ...$configurableMethods)
    {
        $this->invocationHandler   = $handler;
        $this->matcher             = $matcher;
        $this->configurableMethods = $configurableMethods;
    }

    public function id($id): self
    {
        $this->invocationHandler->registerMatcher($id, $this->matcher);
=======
    public function __construct(MatcherCollection $collection, Invocation $invocationMatcher, ConfigurableMethod ...$configurableMethods)
    {
        $this->collection = $collection;
        $this->matcher    = new Matcher($invocationMatcher);

        $this->collection->addMatcher($this->matcher);

        $this->configurableMethods = $configurableMethods;
    }

    public function getMatcher(): Matcher
    {
        return $this->matcher;
    }

    public function id($id): self
    {
        $this->collection->registerId($id, $this);
>>>>>>> 91dcab61a26f2b87ebabfb1b020636b3dcc87f2a

        return $this;
    }

    public function will(Stub $stub): Identity
    {
        $this->matcher->setStub($stub);

        return $this;
    }

    public function willReturn($value, ...$nextValues): self
    {
        if (\count($nextValues) === 0) {
            $this->ensureTypeOfReturnValues([$value]);

            $stub = new ReturnStub($value);
        } else {
            $values = \array_merge([$value], $nextValues);

            $this->ensureTypeOfReturnValues($values);

            $stub = new ConsecutiveCalls($values);
        }

        return $this->will($stub);
    }

<<<<<<< HEAD
    /** {@inheritDoc} */
=======
    /**
     * @param mixed $reference
     */
>>>>>>> 91dcab61a26f2b87ebabfb1b020636b3dcc87f2a
    public function willReturnReference(&$reference): self
    {
        $stub = new ReturnReference($reference);

        return $this->will($stub);
    }

    public function willReturnMap(array $valueMap): self
    {
        $stub = new ReturnValueMap($valueMap);

        return $this->will($stub);
    }

    public function willReturnArgument($argumentIndex): self
    {
        $stub = new ReturnArgument($argumentIndex);

        return $this->will($stub);
    }

<<<<<<< HEAD
    /** {@inheritDoc} */
=======
    /**
     * @param callable $callback
     */
>>>>>>> 91dcab61a26f2b87ebabfb1b020636b3dcc87f2a
    public function willReturnCallback($callback): self
    {
        $stub = new ReturnCallback($callback);

        return $this->will($stub);
    }

    public function willReturnSelf(): self
    {
        $stub = new ReturnSelf;

        return $this->will($stub);
    }

    public function willReturnOnConsecutiveCalls(...$values): self
    {
        $stub = new ConsecutiveCalls($values);

        return $this->will($stub);
    }

    public function willThrowException(\Throwable $exception): self
    {
        $stub = new Exception($exception);

        return $this->will($stub);
    }

    public function after($id): self
    {
        $this->matcher->setAfterMatchBuilderId($id);

        return $this;
    }

    /**
     * @throws RuntimeException
     */
    public function with(...$arguments): self
    {
        $this->canDefineParameters();

<<<<<<< HEAD
        $this->matcher->setParametersRule(new Rule\Parameters($arguments));
=======
        $this->matcher->setParametersMatcher(new Matcher\Parameters($arguments));
>>>>>>> 91dcab61a26f2b87ebabfb1b020636b3dcc87f2a

        return $this;
    }

    /**
     * @param array ...$arguments
     *
     * @throws RuntimeException
     */
    public function withConsecutive(...$arguments): self
    {
        $this->canDefineParameters();

<<<<<<< HEAD
        $this->matcher->setParametersRule(new Rule\ConsecutiveParameters($arguments));
=======
        $this->matcher->setParametersMatcher(new Matcher\ConsecutiveParameters($arguments));
>>>>>>> 91dcab61a26f2b87ebabfb1b020636b3dcc87f2a

        return $this;
    }

    /**
     * @throws RuntimeException
     */
    public function withAnyParameters(): self
    {
        $this->canDefineParameters();

<<<<<<< HEAD
        $this->matcher->setParametersRule(new Rule\AnyParameters);
=======
        $this->matcher->setParametersMatcher(new Matcher\AnyParameters);
>>>>>>> 91dcab61a26f2b87ebabfb1b020636b3dcc87f2a

        return $this;
    }

    /**
     * @param Constraint|string $constraint
     *
     * @throws RuntimeException
     */
    public function method($constraint): self
    {
<<<<<<< HEAD
        if ($this->matcher->hasMethodNameRule()) {
            throw new RuntimeException(
                'Rule for method name is already defined, cannot redefine'
=======
        if ($this->matcher->hasMethodNameMatcher()) {
            throw new RuntimeException(
                'Method name matcher is already defined, cannot redefine'
>>>>>>> 91dcab61a26f2b87ebabfb1b020636b3dcc87f2a
            );
        }

        $configurableMethodNames = \array_map(
            static function (ConfigurableMethod $configurable) {
                return \strtolower($configurable->getName());
            },
            $this->configurableMethods
        );

        if (\is_string($constraint) && !\in_array(\strtolower($constraint), $configurableMethodNames, true)) {
            throw new RuntimeException(
                \sprintf(
                    'Trying to configure method "%s" which cannot be configured because it does not exist, has not been specified, is final, or is static',
                    $constraint
                )
            );
        }

<<<<<<< HEAD
        $this->matcher->setMethodNameRule(new Rule\MethodName($constraint));
=======
        $this->matcher->setMethodNameMatcher(new Matcher\MethodName($constraint));
>>>>>>> 91dcab61a26f2b87ebabfb1b020636b3dcc87f2a

        return $this;
    }

    /**
<<<<<<< HEAD
     * Validate that a parameters rule can be defined, throw exceptions otherwise.
=======
     * Validate that a parameters matcher can be defined, throw exceptions otherwise.
>>>>>>> 91dcab61a26f2b87ebabfb1b020636b3dcc87f2a
     *
     * @throws RuntimeException
     */
    private function canDefineParameters(): void
    {
<<<<<<< HEAD
        if (!$this->matcher->hasMethodNameRule()) {
            throw new RuntimeException(
                'Rule for method name is not defined, cannot define rule for parameters ' .
                'without one'
            );
        }

        if ($this->matcher->hasParametersRule()) {
            throw new RuntimeException(
                'Rule for parameters is already defined, cannot redefine'
=======
        if (!$this->matcher->hasMethodNameMatcher()) {
            throw new RuntimeException(
                'Method name matcher is not defined, cannot define parameter ' .
                'matcher without one'
            );
        }

        if ($this->matcher->hasParametersMatcher()) {
            throw new RuntimeException(
                'Parameter matcher is already defined, cannot redefine'
>>>>>>> 91dcab61a26f2b87ebabfb1b020636b3dcc87f2a
            );
        }
    }

    private function getConfiguredMethod(): ?ConfigurableMethod
    {
        $configuredMethod = null;

        foreach ($this->configurableMethods as $configurableMethod) {
<<<<<<< HEAD
            if ($this->matcher->getMethodNameRule()->matchesName($configurableMethod->getName())) {
=======
            if ($this->matcher->getMethodNameMatcher()->matchesName($configurableMethod->getName())) {
>>>>>>> 91dcab61a26f2b87ebabfb1b020636b3dcc87f2a
                if ($configuredMethod !== null) {
                    return null;
                }

                $configuredMethod = $configurableMethod;
            }
        }

        return $configuredMethod;
    }

    private function ensureTypeOfReturnValues(array $values): void
    {
        $configuredMethod = $this->getConfiguredMethod();

        if ($configuredMethod === null) {
            return;
        }

        foreach ($values as $value) {
            if (!$configuredMethod->mayReturn($value)) {
                throw new IncompatibleReturnValueException(
                    \sprintf(
                        'Method %s may not return value of type %s, its return declaration is "%s"',
                        $configuredMethod->getName(),
                        \is_object($value) ? \get_class($value) : \gettype($value),
                        $configuredMethod->getReturnTypeDeclaration()
                    )
                );
            }
        }
    }
}
