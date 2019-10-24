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

/**
 * @internal This trait is not covered by the backward compatibility promise for PHPUnit
 */
trait UnmockedCloneMethod
{
    public function __clone()
    {
<<<<<<< HEAD
        $this->__phpunit_invocationMocker = clone $this->__phpunit_getInvocationHandler();
=======
        $this->__phpunit_invocationMocker = clone $this->__phpunit_getInvocationMocker();
>>>>>>> 91dcab61a26f2b87ebabfb1b020636b3dcc87f2a

        parent::__clone();
    }
}
