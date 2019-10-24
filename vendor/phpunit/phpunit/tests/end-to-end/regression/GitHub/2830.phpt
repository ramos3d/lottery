--TEST--
GH-2830: @runClassInSeparateProcess fails for tests with a @dataProvider
--FILE--
<?php declare(strict_types=1);
$_SERVER['argv'][1] = '--no-configuration';
<<<<<<< HEAD
$_SERVER['argv'][2] = 'Issue2830Test';
=======
$_SERVER['argv'][2] = 'Issue2830';
>>>>>>> 91dcab61a26f2b87ebabfb1b020636b3dcc87f2a
$_SERVER['argv'][3] = __DIR__ . '/2830/Issue2830Test.php';

require __DIR__ . '/../../../bootstrap.php';

PHPUnit\TextUI\Command::main();
--EXPECTF--
PHPUnit %s by Sebastian Bergmann and contributors.

.                                                                   1 / 1 (100%)

Time: %s, Memory: %s

OK (1 test, 1 assertion)
