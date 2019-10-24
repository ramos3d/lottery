<?php declare(strict_types=1);
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PHPUnit\Framework\MockObject;

<<<<<<< HEAD
use PHPUnit\Framework\MockObject\Builder\InvocationStubber;

/**
 * @method InvocationStubber method($constraint)
 */
interface Stub
{
    public function __phpunit_getInvocationHandler(): InvocationHandler;
=======
use PHPUnit\Framework\MockObject\Builder\InvocationMocker as BuilderInvocationMocker;

/**
 * @method BuilderInvocationMocker method($constraint)
 */
interface Stub
{
    public function __phpunit_getInvocationMocker(): InvocationMocker;
>>>>>>> 91dcab61a26f2b87ebabfb1b020636b3dcc87f2a

    public function __phpunit_hasMatchers(): bool;

    public function __phpunit_setReturnValueGeneration(bool $returnValueGeneration): void;
}
