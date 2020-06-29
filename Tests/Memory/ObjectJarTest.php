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

namespace Aplorm\Common\Tests\Memory;

use Aplorm\Common\Memory\ObjectJar;
use Aplorm\Common\Test\AbstractTest;

class ObjectJarTest extends AbstractTest
{
    public static function setupBeforeClass(): void
    {
    }

    public static function tearDownAfterClass(): void
    {
    }

    /**
     * {@inheritdoc}
     */
    protected function doSetup(): void
    {
    }

    /**
     * {@inheritdoc}
     */
    protected function doTearDown(): void
    {
        ObjectJar::clean();
    }

    public function testObjectJar(): void
    {
        $a = new \stdClass();

        $reference = ObjectJar::add('__common', $a);

        self::assertEquals($a, $reference->get());
    }

    public function testExistantObjectJar(): void
    {
        $a = new \stdClass();

        $reference = ObjectJar::add('__common', $a);
        $reference2 = ObjectJar::add('__common', $a);

        self::assertEquals($reference2->get(), $reference->get());
    }

    public function testReferenceObjectJar(): void
    {
        $reference = ObjectJar::add('__common', new \stdClass());

        self::assertNotNull($reference->get());
    }

    public function testDestroyReferenceObjectJar(): void
    {
        $reference = ObjectJar::add('__common', new \stdClass());
        ObjectJar::destroy($reference->get());
        self::assertNull($reference->get());
    }

    public function testRemovedObjectJar(): void
    {
        $a = new \stdClass();

        $reference = ObjectJar::add('__common', $a);
        unset($a);
        self::assertNotNull($reference->get());
    }

    public function testDestroyObjectJar(): void
    {
        $a = new \stdClass();

        $reference = ObjectJar::add('__common', $a);
        ObjectJar::destroy($reference->get());
        unset($a);
        self::assertNull($reference->get());
    }

    public function testNoticeOnAddObjectIntoDifferentJar(): void
    {
        self::expectNotice();
        $a = new \stdClass();
        $reference = ObjectJar::add('__common', $a);
        $reference = ObjectJar::add('foo', $a);
    }

    public function testExceptionOnAddObjectIntoEmptyJar(): void
    {
        self::expectException(\Exception::class);
        $a = new \stdClass();
        $reference = ObjectJar::add('', $a);
    }

    public function testRemoveObject(): void
    {
        $a = new \stdClass();
        $ref = ObjectJar::add('__common', $a);
        $object = ObjectJar::remove($ref->get());

        self::assertEquals($object, $a);
    }

    public function testRemoveReferenceObject(): void
    {
        $ref = ObjectJar::add('__common', new \stdClass());
        $object = ObjectJar::remove($ref->get());

        self::assertEquals($object, $ref->get());
    }

    public function testRemoveUnexistantReferenceObject(): void
    {
        $a = new \stdClass();
        $object = ObjectJar::remove($a);

        self::assertNull($object);
    }

    public function testDestroyUnexistantReferenceObject(): void
    {
        $a = new \stdClass();
        $destroy = ObjectJar::destroy($a);

        self::assertFalse($destroy);
    }

    public function testAddArrayToJar(): void
    {
        $a = new \stdClass();
        $b = new \stdClass();
        $references = ObjectJar::addJar('__commong', [$a, $b]);

        self::assertCount(2, $references);
        self::assertEquals($a, $references[0]->get());
        self::assertEquals($b, $references[1]->get());
    }

    public function testAddObjectToJar(): void
    {
        $a = new \stdClass();
        $references = ObjectJar::addJar('__commong', $a);

        self::assertCount(1, $references);
        self::assertEquals($a, $references[0]->get());
    }

    public function testDestroyJar(): void
    {
        $references = ObjectJar::addJar('__common', new \stdClass());
        ObjectJar::destroyJar('__common');

        self::assertCount(1, $references);
        self::assertNull($references[0]->get());
    }
}
