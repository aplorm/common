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

namespace Aplorm\Common\Annotations;

interface NativeAnnotations
{

    public const EXCLUED_ANNOTATIONS = [
        'example',
        'internal',
        'inheritdoc',
        'link',
        'see',
        'api',
        'author',
        'category',
        'copyright',
        'deprecated',
        'example',
        'filesource',
        'global',
        'ignore',
        'internal',
        'license',
        'link',
        'method',
        'package',
        'property',
        'property-read',
        'property-write',
        'see',
        'since',
        'source',
        'subpackage',
        'throws',
        'todo',
        'uses',
        'used-by',
        'version',
        'codeCoverageIgnore',
    ];

    public const TYPE_ANNOTATIONS = [
        'var',
        'param',
        'return',
    ];
}
