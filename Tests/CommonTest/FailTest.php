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

class FailTest extends TestCase
{
    protected ?AbstractTest $class = null;

    /**
     * This method is called before each test.
     */
    protected function setUp(): void
    {
        $this->class = new class() extends AbstractTest {
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
        $this->expectException(\RuntimeException::class);
        $this->class::setupBeforeClass();
    }

    public function testTearDownAfterClass(): void
    {
        $this->expectException(\RuntimeException::class);
        $this->class::tearDownAfterClass();
    }
}
