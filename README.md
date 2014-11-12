Locating Files with Puli
========================

[![Build Status](https://travis-ci.org/webmozart/puli.png?branch=master)](https://travis-ci.org/webmozart/puli)
[![Scrutinizer Quality Score](https://scrutinizer-ci.com/g/webmozart/puli/badges/quality-score.png?s=f1fbf1884aed7f896c18fc237d3eed5823ac85eb)](https://scrutinizer-ci.com/g/webmozart/puli/)
[![Code Coverage](https://scrutinizer-ci.com/g/webmozart/puli/badges/coverage.png?s=5d83649f6fc3a9754297da9dc0d997be212c9145)](https://scrutinizer-ci.com/g/webmozart/puli/)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/728198dc-dc0f-4bab-b5c0-c0b4e2a55bce/mini.png)](https://insight.sensiolabs.com/projects/728198dc-dc0f-4bab-b5c0-c0b4e2a55bce)
[![Latest Stable Version](https://poser.pugx.org/webmozart/puli/v/stable.png)](https://packagist.org/packages/webmozart/puli)
[![Total Downloads](https://poser.pugx.org/webmozart/puli/downloads.png)](https://packagist.org/packages/webmozart/puli)
[![Dependency Status](https://www.versioneye.com/php/webmozart:puli/1.0.0/badge.png)](https://www.versioneye.com/php/webmozart:puli/1.0.0)

Latest release: [1.0.0-alpha3](https://packagist.org/packages/webmozart/puli#1.0.0-alpha3)

PHP >= 5.3.9

Puli manages files and directories in a virtual repository. Whenever you need
to access these resources in your project, you can find them by their Puli path:

```php
$repo = new ResourceRepository();
$repo->add('/css', '/path/to/assets/css');

echo $repo->get('/css/style.css')->getLocalPath();
// => /path/to/assets/css/style.css
```

This is useful when you have to hard-code paths in configuration files:

```yaml
# config.yml
import: /config/routing.yml
```

Or in templates:

```jinja
<div>
    {% include '/views/menu.html.twig' %}
</div>
```

Individual resources can be overridden, if necessary:

```php
$repo->add('/views', '/path/to/views');
$repo->add('/views/menu.html.twig', '/path/to/custom/menu.html.twig');
```

However, Puli only unleashes its full power once you use it together with its
[Composer plugin]. The plugin allows to register resources in the composer.json
file of each package:

```json
{
    "name": "acme/blog",
    "extra": {
        "resources": {
            "export": {
                "/acme/blog": "resources"
            }
        }
    }
}
```

Here, the "acme/blog" package maps its own `resources/` directory to the
repository path `/acme/blog`. The Composer plugin then generate a resource
repository which gives you easy access to the resources of all Puli-enabled
packages:

```php
// Composer autoloader
require_once __DIR__.'/vendor/autoload.php';

// Composer resource repository
$repo = require __DIR__.'/vendor/resource-repository.php';

echo $repo->get('/acme/blog/css/style.css')->getLocalPath();
// => /path/to/project/vendor/acme/blog/resources/css/style.css
```

Was it ever easier to access the files of a Composer package?

Read on to learn more about Puli.

Installation
------------

You can install Puli with [Composer]:

```json
{
    "require": {
        "webmozart/puli": "~1.0@dev"
    }
}
```

Run `composer install` or `composer update` to install the library. At last, include Composer's generated autoloader and you're ready to start:

```php
require_once __DIR__.'/vendor/autoload.php';
```

Documentation
-------------

1. [Basic Usage]: Teaches you about the basic use of Puli.

Bundled Extensions
------------------

The following extensions are provided in the [`Webmozart\Puli\Extension`]
namespace:

Extension | Description                                                                        | Stability | Documentation
--------- | ---------------------------------------------------------------------------------- | --------- | -----------------------------------
Assetic   | You can create [Assetic] assets with Puli paths using the bundled asset factory.   | alpha     | -
Symfony   | Puli provides a file locator for the Symfony [Config] and [HttpKernel] components. | alpha     | [Documentation](doc/ext-symfony.md)
Twig      | The [Twig] extension lets you access templates via Puli paths.                     | alpha     | [Documentation](doc/ext-twig.md)

Tool Integration
----------------

Puli is also integrated into several tools via external libraries:

Tool     | Description                                                                             | Version
-------- | --------------------------------------------------------------------------------------- | ---------------
Composer | The [Puli plugin for Composer] builds resource locators from composer.json definitions. | 1.0.0-alpha1
Pash     | The [Pash shell] lets you interactively browse Puli repositories.                       | 1.0.0-dev
Symfony  | The [Puli bundle] integrates Puli with the [Symfony full-stack framework].              | 1.0.0-dev

[Composer]: https://getcomposer.org
[Basic Usage]: doc/1-basic-usage.md
[Advanced Usage]: doc/2-advanced-usage.md
[Composer plugin]: https://github.com/webmozart/composer-puli-plugin
[Puli plugin for Composer]: https://github.com/webmozart/composer-puli-plugin
[Puli extension for Twig]: https://github.com/webmozart/twig-puli-extension
[Puli bridge]: https://github.com/webmozart/symfony-puli-bridge
[Puli bundle]: https://github.com/webmozart/symfony-puli-bundle
[Pash shell]: https://github.com/webmozart/pash
[Symfony full-stack framework]: http:/symfony.com
[Twig]: http://twig.sensiolabs.org
[Config]: http://symfony.com/doc/current/components/config/introduction.html
[HttpKernel]: http://symfony.com/doc/current/components/http_kernel/introduction.html
[Assetic]: https://github.com/kriswallsmith/assetic
[`Webmozart\Puli\Extension`]: src/Extension
