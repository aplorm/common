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

namespace Aplorm\Common\Memory;

/**
 * the class ObjectJar allow to store object into one object. It allow to centralize all the object
 * and work only with WeakReference into application and avoid multiple object copy into application.
 * This allow a better memory clean during application.
 */
class ObjectJar
{
    /**
     * @var array<string, array<int, mixed>> store object into multiple named jar
     */
    private static array $jar = [];

    /**
     * @var array<int, string> give subjar for a specific oid
     */
    private static array $objectJar = [];

    /**
     * add object into a specific jar.
     *
     * @param object $object object add to objectJar
     *
     * @throws \Exception when destination is empty
     *
     * @return \WeakReference<object>
     */
    public static function add(string $destination, $object): \WeakReference
    {
        if (empty($destination)) {
            throw new \Exception('Unable to add empty jar');
        }

        $oid = spl_object_id($object);
        if (isset(self::$objectJar[$oid]) && self::$objectJar[$oid] !== $destination) {
            trigger_error('This object already exist into another jar');
        }

        if (isset(self::$objectJar[$oid]) && self::$objectJar[$oid] === $destination) {
            return \WeakReference::create($object);
        }

        if (!isset(self::$jar[$destination])) {
            self::$jar[$destination] = [];
        }

        self::$objectJar[$oid] = $destination;
        self::$jar[$destination][$oid] = $object;

        return \WeakReference::create($object);
    }

    /**
     * this function remove the object from the jar,
     * beware this object will no longer be destroyed when the jar is destroyed.
     *
     * @param object $reference object removed to objectJar
     *
     * @return mixed|null
     */
    public static function remove($reference)
    {
        $oid = spl_object_id($reference);
        if (!isset(self::$objectJar[$oid])) {
            return null;
        }

        $object = self::$jar[self::$objectJar[$oid]][$oid];
        unset(self::$jar[self::$objectJar[$oid]][$oid], self::$objectJar[$oid]);

        return $object;
    }

    /**
     * be careful removing an object from the jar,
     * will pass WeakReference to null when the get function is called.
     *
     * @param object $reference object destroy in objectJar
     *
     * @return bool return true when the object is destroyed, false if object is already destroyed
     */
    public static function destroy($reference): bool
    {
        $oid = spl_object_id($reference);
        if (!isset(self::$objectJar[$oid])) {
            return false;
        }

        unset(self::$jar[self::$objectJar[$oid]], self::$objectJar[$oid]);

        return true;
    }

    /**
     * be careful removing objects from the jar,
     * will pass WeakReference to null when the get function is called.
     */
    public static function destroyJar(string $destination): void
    {
        /** @var array<int, mixed> $oids */
        $oids = self::$jar[$destination];
        foreach ($oids as $oid => $object) {
            unset(self::$objectJar[$oid], self::$jar[$destination][$oid]);
        }

        unset(self::$jar[$destination]);
    }

    /**
     * @param array<mixed>|mixed $objects
     *
     * @return \WeakReference<Object>[]
     */
    public static function addJar(string $destination, $objects): array
    {
        if (!isset(self::$jar[$destination])) {
            self::$jar[$destination] = [];
        }

        if (!\is_array($objects)) {
            $objects = [$objects];
        }

        $references = [];

        foreach ($objects as $object) {
            $references[] = self::add($destination, $object);
        }

        return  $references;
    }

    public static function clean(): void
    {
        self::$jar = [];
        self::$objectJar = [];
    }
}
