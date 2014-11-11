Peridot Dot Reporter
====================

[![Build Status](https://travis-ci.org/peridot-php/peridot-dot-reporter.png)](https://travis-ci.org/peridot-php/peridot-dot-reporter) [![HHVM Status](http://hhvm.h4cc.de/badge/peridot-php/peridot-dot-reporter.svg)](http://hhvm.h4cc.de/package/peridot-php/peridot-dot-reporter)

A simple dot matrix reporter for the Peridot testing framework.

![Peridot dot reporter](https://raw.github.com/peridot-php/peridot-dot-reporter/master/output.png "Peridot dot reporter in action")

##Usage

We recommend installing the reporter to your project via composer:

```
$ composer require --dev peridot-php/peridot-dot-reporter:~1.0
```

You can register the reporter via your [peridot.php](http://peridot-php.github.io/#plugins) file.

```php
<?php
use Peridot\Reporter\Dot\DotReporterPlugin;

return function(EventEmitterInterface $emitter) {
    $dot = new DotReporterPlugin($emitter);
};
```

##Running reporter tests

You can run the reporter specs and also preview the reporter in action like so:

```
$ vendor/bin/peridot specs/ -r dot
```
