<?php

/*
 * This file is part of the Puli package.
 *
 * (c) Bernhard Schussek <bschussek@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Puli\Filesystem\Resource;

use Puli\Resource\ResourceInterface;

/**
 * A resource associated to a file on the local file system.
 *
 * The path of the local file can be accessed with {@link getLocalPath}.
 *
 * @since  1.0
 * @author Bernhard Schussek <bschussek@gmail.com>
 */
interface LocalResourceInterface extends ResourceInterface
{
    /**
     * Returns the path on the local file system.
     *
     * @return string|null The local file system path or `null` if the resource
     *                     has no associated local file.
     */
    public function getLocalPath();

    /**
     * Returns the paths of all associated files on the local file system.
     *
     * A resource can be associated to multiple files. The results are sorted
     * by growing priority. The last entry is equal to the return value of
     * {@link getLocalPath}.
     *
     * @return string[] The local file system paths of all associated local
     *                  files, sorted by priority in ascending order.
     */
    public function getAllLocalPaths();
}
