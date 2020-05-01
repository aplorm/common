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

use Aplorm\DataConfigurator\Exceptions\ParameterNotFoundException;

interface MethodConfigurationInterface extends AnnotedDataInterface, ScopedDataInterface
{
    public function getReturnType(): ?string;

    public function isReturnNullable(): bool;

    /**
     * @return ParameterConfigurationInterface[]
     */
    public function getParameters(): array;

    public function getParameter(string $parameter): ParameterConfigurationInterface;

    public function getParameterType(string $parameter): ?string;

    /**
     * @return mixed|null
     */
    public function getParameterDefaultValue(string $parameter);
}
