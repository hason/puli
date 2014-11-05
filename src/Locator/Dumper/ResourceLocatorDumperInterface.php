<?php

/*
 * This file is part of the Puli package.
 *
 * (c) Bernhard Schussek <bschussek@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Webmozart\Puli\Locator\Dumper;

use Webmozart\Puli\Locator\ResourceLocatorInterface;

/**
 * @since  1.0
 * @author Bernhard Schussek <bschussek@gmail.com>
 */
interface ResourceLocatorDumperInterface
{
    public function dumpLocator(ResourceLocatorInterface $locator, $targetPath);
}