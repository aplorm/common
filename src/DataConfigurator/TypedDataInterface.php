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

namespace Aplorm\Common\DataConfigurator;

interface TypedDataInterface
{
    /**
     * @return string|null the type defined with php7.4 syntax
     */
    public function getType(): ?string;

    /**
     * @return bool if the return is defined has nullable with php7 syntax
     */
    public function isNullable(): bool;

    /**
     * return default value.
     *
     * @return mixed|null
     */
    public function getDefaultValue();
}
