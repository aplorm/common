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

namespace Aplorm\Common;

interface CollectionnableElementInterface
{
    /**
     * @param CollectionInterface<CollectionnableElementInterface> $collection allow item to add a collection that store item
     */
    public function addCollection(CollectionInterface $collection): void;

    /**
     * @param CollectionInterface<CollectionnableElementInterface> $collection allow item to remove a collection that store item
     */
    public function removeCollection(CollectionInterface $collection): void;

    public function __destruct();
}
