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

namespace Aplorm\Common\Lexer;

interface LexedPartInterface
{
    public const NAMESPACE_PART = 'namespace';
    public const CLASS_NAME_PART = 'classname';
    public const CLASS_ALIASES_PART = 'classalias';
    public const VARIABLE_PART = 'variables';
    public const METHOD_PART = 'method';
    public const USE_PART = 'use';
    public const TRAITS_PART = 'traits';
    public const FILE_NAME_PART = 'filename';
}
