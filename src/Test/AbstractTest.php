<?php
/**
 *  This file is part of the Aplorm package.
 *
 *  (c) Nicolas Moral <n.moral@live.fr>
 *
 *  For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Aplorm\Common\Test;

use PHPUnit\Framework\TestCase;

/**
 * Abstract test class. Contains abstract method that must be develop in each test.
 */
abstract class AbstractTest extends TestCase
{
    /**
     * function call in setUp function.
     */
    abstract protected function doSetup(): void;

    /**
     * function call in tearDown function.
     */
    abstract protected function doTearDown(): void;

    public static function setupBeforeClass(): void
    {
        throw new \RuntimeException('you must the defined '.__METHOD__);
    }

    public static function tearDownAfterClass(): void
    {
        throw new \RuntimeException('you must defined '.__METHOD__);
    }
}
