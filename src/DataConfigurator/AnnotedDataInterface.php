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

interface AnnotedDataInterface
{
    /**
     * @return AnnotationInterface[]
     */
    public function getAnnotations(): array;

    /**
     * @param string $annotation
     * @return AnnotationInterface|AnnotationInterface[]
     */
    public function getAnnotation(string $annotation);

    /**
     * @param string $annotation
     * @return bool
     */
    public function hasAnnotation(string $annotation): bool;
}
