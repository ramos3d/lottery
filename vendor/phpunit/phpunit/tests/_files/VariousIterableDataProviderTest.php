<?php declare(strict_types=1);
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
<<<<<<< HEAD
class VariousIterableDataProviderTest extends AbstractVariousIterableDataProviderTest
{
    public static function asArrayStaticProvider()
=======
class VariousIterableDataProviderTest
{
    public static function asArrayProvider()
>>>>>>> 91dcab61a26f2b87ebabfb1b020636b3dcc87f2a
    {
        return [
            ['A'],
            ['B'],
            ['C'],
        ];
    }

<<<<<<< HEAD
    public static function asIteratorStaticProvider()
=======
    public static function asIteratorProvider()
>>>>>>> 91dcab61a26f2b87ebabfb1b020636b3dcc87f2a
    {
        yield ['D'];

        yield ['E'];

        yield ['F'];
    }

<<<<<<< HEAD
    public static function asTraversableStaticProvider()
=======
    public static function asTraversableProvider()
>>>>>>> 91dcab61a26f2b87ebabfb1b020636b3dcc87f2a
    {
        return new WrapperIteratorAggregate([
            ['G'],
            ['H'],
            ['I'],
        ]);
    }

    /**
<<<<<<< HEAD
     * @dataProvider asArrayStaticProvider
     * @dataProvider asIteratorStaticProvider
     * @dataProvider asTraversableStaticProvider
     */
    public function testStatic(): void
    {
    }

    public function asArrayProvider()
    {
        return [
            ['S'],
            ['T'],
            ['U'],
        ];
    }

    public function asIteratorProvider()
    {
        yield ['V'];

        yield ['W'];

        yield ['X'];
    }

    public function asTraversableProvider()
    {
        return new WrapperIteratorAggregate([
            ['Y'],
            ['Z'],
            ['P'],
        ]);
    }

    /**
=======
>>>>>>> 91dcab61a26f2b87ebabfb1b020636b3dcc87f2a
     * @dataProvider asArrayProvider
     * @dataProvider asIteratorProvider
     * @dataProvider asTraversableProvider
     */
<<<<<<< HEAD
    public function testNonStatic(): void
    {
    }

    /**
     * @dataProvider asArrayProviderInParent
     * @dataProvider asIteratorProviderInParent
     * @dataProvider asTraversableProviderInParent
     */
    public function testFromParent(): void
=======
    public function test(): void
>>>>>>> 91dcab61a26f2b87ebabfb1b020636b3dcc87f2a
    {
    }
}
