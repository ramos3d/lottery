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

use PHPUnit\Framework\MockObject\Builder\InvocationMocker as BuilderInvocationMocker;
<<<<<<< HEAD
use PHPUnit\Framework\MockObject\Rule\InvocationOrder;
=======
use PHPUnit\Framework\MockObject\Matcher\Invocation;
>>>>>>> 91dcab61a26f2b87ebabfb1b020636b3dcc87f2a

/**
 * @method BuilderInvocationMocker method($constraint)
 */
interface MockObject extends Stub
{
    public function __phpunit_setOriginalObject($originalObject): void;

    public function __phpunit_verify(bool $unsetInvocationMocker = true): void;

<<<<<<< HEAD
    public function expects(InvocationOrder $invocationRule): BuilderInvocationMocker;
=======
    public function expects(Invocation $matcher): BuilderInvocationMocker;
>>>>>>> 91dcab61a26f2b87ebabfb1b020636b3dcc87f2a
}
