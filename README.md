YiiJadePHP
==========

An extension for Yii Framework for [jade.php](https://github.com/everzet/jade.php).

## Getting started

### Requirements 

Tested with Yii 1.1.14

Requires the [GAutoloader extension](http://www.yiiframework.com/extension/gautoloader/)

### Download

Please get the latest version here: [master.zip](https://github.com/vad-oparin/YiiJadePHP/archive/master.zip)

And get [Jade - template compiler for PHP5.3](https://github.com/everzet/jade.php/archive/master.zip)

### Setup

Unzip the contents of the package under `protected/extensions/yii-jade-php`. The folder structure should now be the following:

```
protected
  └── extensions
      └── yii-jade-php
          └── EJade.php
```

Unzip the contents of the `jade.php` and copy folder `src/Everzet` to `protected/vendor/`. The folder structure should now be the following:

```
protected
  └── vendor
      └── Everzet
          └── Jade
              ├── Dumper
              ├── Exception
              ├── Filter
              ├── Lexer
              ├── Node
              └── Visitor
```

Open your application configuration in `protected/config/main.php` and modify it according to the following example:

```php
<?php
// main configuration file
return array(
	...
    // preloading components
    'preload'        => array(
        ...
        'SemanticYii',
    ),
    // path aliases
    'aliases'    => array(
        ...
        // Everzet JadePHP path alias
        'Jade' => realpath(__DIR__ . '/../vendor/Everzet/Jade'),
    ),
    // application components
    'components' => array(
        ...
        // YiiJadePHP configuration
        'viewRenderer' => array(
            'class' => 'ext.yii-jade-php.EJade',
        ),
    ),
);
```

### Usage

* See [jade.php syntax](https://github.com/everzet/jade.php#syntax).
* Template file extension is `.jade`.
