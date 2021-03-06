<?php

/*
 * This file is part of the Puli package.
 *
 * (c) Bernhard Schussek <bschussek@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Puli\Repository;

/**
 * Thrown when a specific implementation of {@link ResourceInterface} is not
 * accepted by the invoked method.
 *
 * @since  1.0
 * @author Bernhard Schussek <bschussek@gmail.com>
 */
class UnsupportedResourceException extends \RuntimeException
{
}
