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

use Aplorm\DataConfigurator\Exceptions\AnnotationNotFoundException;
use Aplorm\DataConfigurator\Exceptions\AttributeNotFoundException;
use Aplorm\DataConfigurator\Exceptions\MethodNotFoundException;

interface DataConfigurationInterface
{
    /**
     * @return AnnotationInterface[]
     */
    public function getClassAnnotations(): iterable;

    public function getClassAnnotation(string $annotation): AnnotationInterface;

    /**
     * @return AttributeConfigurationInterface[]
     */
    public function getAttributes(): iterable;

    public function getAttribute(string $attribute): AttributeConfigurationInterface;

    /**
     * @return AnnotationInterface|AnnotationInterface[]
     */
    public function getAttributeAnnotation(string $attribute, ?string $annotation = null);

    /**
     * @return MethodConfigurationInterface[]
     */
    public function getMethods(): iterable;

    public function getMethod(string $method): MethodConfigurationInterface;

    /**
     * @return AnnotationInterface|AnnotationInterface[]
     */
    public function getMethodAnnotation(string $method, ?string $annotation = null);
}
