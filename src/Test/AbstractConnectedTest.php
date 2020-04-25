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

/**
 * Allow test with connection on database.
 */
abstract class AbstractConnectedTest extends AbstractTest
{
    final public static function setupBeforeClass(): void
    {
        static::beforeConnect();
        static::connect();
        static::afterConnect();
    }

    final public static function tearDownAfterClass(): void
    {
        static::beforeDisconnect();
        static::disconnect();
        static::afterDisconnect();
    }

    /**
     * setup function call before the connection.
     */
    protected static function beforeConnect(): void
    {
    }

    /**
     * setup function call after connection.
     */
    protected static function afterConnect(): void
    {
    }

    /**
     * clean function call before disconnection.
     */
    protected static function beforeDisconnect(): void
    {
    }

    /**
     * clean function call after disconnection.
     */
    protected static function afterDisconnect(): void
    {
    }

    /**
     * connect function.
     */
    protected static function connect(): void
    {
        throw new \RuntimeException('you must define the connect function');
    }

    /**
     * disconnect function.
     */
    protected static function disconnect(): void
    {
        throw new \RuntimeException('you must define the disconnect function');
    }
}
