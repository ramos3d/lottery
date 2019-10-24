<?php declare(strict_types=1);
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PHPUnit\Runner;

<<<<<<< HEAD
=======
use PHPUnit\Framework\TestCase;
>>>>>>> 91dcab61a26f2b87ebabfb1b020636b3dcc87f2a
use PHPUnit\Util\FileLoader;
use PHPUnit\Util\Filesystem;
use ReflectionClass;

/**
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
final class StandardTestSuiteLoader implements TestSuiteLoader
{
    /**
     * @throws Exception
     * @throws \PHPUnit\Framework\Exception
     */
    public function load(string $suiteClassName, string $suiteClassFile = ''): ReflectionClass
    {
<<<<<<< HEAD
        $suiteClassName = \str_replace('.php', '', \basename($suiteClassName));
=======
        $suiteClassName = \str_replace('.php', '', $suiteClassName);
>>>>>>> 91dcab61a26f2b87ebabfb1b020636b3dcc87f2a

        if (empty($suiteClassFile)) {
            $suiteClassFile = Filesystem::classNameToFilename(
                $suiteClassName
            );
        }

<<<<<<< HEAD
        $loadedClasses = \get_declared_classes();
        $filename      = FileLoader::checkAndLoad($suiteClassFile);
        $loadedClasses = \array_values(
            \array_diff(\get_declared_classes(), $loadedClasses)
        );

        $offset = 0 - \strlen($suiteClassName);
        $class  = null;

        foreach ($loadedClasses as $loadedClass) {
            try {
                $class = new ReflectionClass($loadedClass);
=======
        if (!\class_exists($suiteClassName, false)) {
            $loadedClasses = \get_declared_classes();

            $filename = FileLoader::checkAndLoad($suiteClassFile);

            $loadedClasses = \array_values(
                \array_diff(\get_declared_classes(), $loadedClasses)
            );
        }

        if (!empty($loadedClasses) && !\class_exists($suiteClassName, false)) {
            $offset = 0 - \strlen($suiteClassName);

            foreach ($loadedClasses as $loadedClass) {
                try {
                    $class = new ReflectionClass($loadedClass);
                } catch (\ReflectionException $e) {
                    throw new Exception(
                        $e->getMessage(),
                        (int) $e->getCode(),
                        $e
                    );
                }

                if (\substr($loadedClass, $offset) === $suiteClassName &&
                    $class->getFileName() == $filename) {
                    $suiteClassName = $loadedClass;

                    break;
                }
            }
        }

        if (!empty($loadedClasses) && !\class_exists($suiteClassName, false)) {
            $testCaseClass = TestCase::class;

            foreach ($loadedClasses as $loadedClass) {
                try {
                    $class = new ReflectionClass($loadedClass);
                } catch (\ReflectionException $e) {
                    throw new Exception(
                        $e->getMessage(),
                        (int) $e->getCode(),
                        $e
                    );
                }

                $classFile = $class->getFileName();

                if ($class->isSubclassOf($testCaseClass) && !$class->isAbstract()) {
                    $suiteClassName = $loadedClass;
                    $testCaseClass  = $loadedClass;

                    if ($classFile == \realpath($suiteClassFile)) {
                        break;
                    }
                }

                if ($class->hasMethod('suite')) {
                    try {
                        $method = $class->getMethod('suite');
                    } catch (\ReflectionException $e) {
                        throw new Exception(
                            $e->getMessage(),
                            (int) $e->getCode(),
                            $e
                        );
                    }

                    if (!$method->isAbstract() && $method->isPublic() && $method->isStatic()) {
                        $suiteClassName = $loadedClass;

                        if ($classFile == \realpath($suiteClassFile)) {
                            break;
                        }
                    }
                }
            }
        }

        if (\class_exists($suiteClassName, false)) {
            try {
                $class = new ReflectionClass($suiteClassName);
>>>>>>> 91dcab61a26f2b87ebabfb1b020636b3dcc87f2a
            } catch (\ReflectionException $e) {
                throw new Exception(
                    $e->getMessage(),
                    (int) $e->getCode(),
                    $e
                );
            }

<<<<<<< HEAD
            if ($class->isAbstract()) {
                continue;
            }

            if (\substr($loadedClass, $offset) === $suiteClassName &&
                $class->getFileName() == $filename) {
                $suiteClassName = $loadedClass;

                break;
            }
        }

        if (!\class_exists($suiteClassName, false) ||
            !($class instanceof ReflectionClass)) {
            throw new Exception(
                \sprintf(
                    "Class '%s' could not be found in '%s'.",
                    $suiteClassName,
                    $suiteClassFile
                )
            );
        }

        return $class;
=======
            if ($class->getFileName() == \realpath($suiteClassFile)) {
                return $class;
            }
        }

        throw new Exception(
            \sprintf(
                "Class '%s' could not be found in '%s'.",
                $suiteClassName,
                $suiteClassFile
            )
        );
>>>>>>> 91dcab61a26f2b87ebabfb1b020636b3dcc87f2a
    }

    public function reload(ReflectionClass $aClass): ReflectionClass
    {
        return $aClass;
    }
}
