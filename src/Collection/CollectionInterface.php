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

namespace Aplorm\Common\Collection;

interface CollectionInterface extends \Iterator, \ArrayAccess, \Countable
{
    public function exist(CollectionnableElementInterface $object): bool;

    public function replace(CollectionnableElementInterface $needle, CollectionnableElementInterface $replacement): self;

    public function add(CollectionnableElementInterface $object): self;

    public function remove(CollectionnableElementInterface $object): self;

    public function destroy(CollectionnableElementInterface $object): void;

    /**
     * @param array<mixed> $elements
     */
    public function fromArray(array $elements): void;

    /**
     * @return array<CollectionnableElementInterface>
     */
    public function toArray(): array;
}
