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

namespace Aplorm\Common\Tests\CommonTest;

use Aplorm\Common\Test\AbstractTest;
use PHPUnit\Framework\TestCase;

class SuccessTest extends TestCase
{
    protected ?AbstractTest $class = null;

    /**
     * This method is called before each test.
     */
    protected function setUp(): void
    {
        $this->class = new class() extends AbstractTest {
            /**
             * connect function.
             */
            public static function setupBeforeClass(): void
            {
            }

            /**
             * disconnect function.
             */
            public static function tearDownAfterClass(): void
            {
            }

            protected function doSetup(): void
            {
            }

            protected function doTearDown(): void
            {
            }
        };
    }

    /**
     * This method is called after each test.
     */
    protected function tearDown(): void
    {
        $this->class = null;
    }

    public function testSetupBeforeClass(): void
    {
        $this->class::setupBeforeClass();
        self::assertTrue(true);
    }

    public function testTearDownAfterClass(): void
    {
        $this->class::tearDownAfterClass();
        self::assertTrue(true);
    }
}
