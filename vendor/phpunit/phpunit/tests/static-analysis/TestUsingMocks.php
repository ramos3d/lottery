<?php declare(strict_types=1);
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PHPUnit\StaticAnalysis;

use PHPUnit\Framework\TestCase;

class HelloWorldClass
{
    public function sayHello(): string
    {
        return 'hello world!';
    }
}

/**
 * @small
 */
final class TestUsingMocks extends TestCase
{
    public function testWillSayHelloThroughCreateMock(): void
    {
        $mock = $this->createMock(HelloWorldClass::class);

        $mock
            ->method('sayHello')
            ->willReturn('hello mock!');

        self::assertSame('hello mock!', $mock->sayHello());
    }

<<<<<<< HEAD
    public function testWillSayHelloThroughCreateStub(): void
    {
        $mock = $this->createStub(HelloWorldClass::class);

        $mock
            ->method('sayHello')
            ->willReturn('hello stub!');

        self::assertSame('hello stub!', $mock->sayHello());
    }

=======
>>>>>>> 91dcab61a26f2b87ebabfb1b020636b3dcc87f2a
    public function testWillSayHelloThroughCreateConfiguredMock(): void
    {
        $mock = $this->createConfiguredMock(HelloWorldClass::class, []);

        $mock
            ->method('sayHello')
            ->willReturn('hello mock!');

        self::assertSame('hello mock!', $mock->sayHello());
    }

    public function testWillSayHelloThroughCreatePartialMock(): void
    {
        $mock = $this->createPartialMock(HelloWorldClass::class, []);

        $mock
            ->method('sayHello')
            ->willReturn('hello mock!');

        self::assertSame('hello mock!', $mock->sayHello());
    }

    public function testWillSayHelloThroughCreateTestProxy(): void
    {
        $mock = $this->createTestProxy(HelloWorldClass::class, []);

        $mock
            ->method('sayHello')
            ->willReturn('hello mock!');

        self::assertSame('hello mock!', $mock->sayHello());
    }

    public function testWillSayHelloThroughGetMockBuilder(): void
    {
        $mock = $this
            ->getMockBuilder(HelloWorldClass::class)
            ->getMock();

        $mock
            ->method('sayHello')
            ->willReturn('hello mock!');

        self::assertSame('hello mock!', $mock->sayHello());
    }
}
