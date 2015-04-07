yii2-webix-gii-generators
=====================

This generator generates the grid on a given url with the help of Webix Datatable.

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
$ php composer.phar require "webix/gii": "dev-master"
```

or add

```
"webix/gii": "dev-master"
```

to the ```require``` section of your `composer.json` file.

## Usage

```php
//if your gii modules configuration looks like below:
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = 'yii\gii\Module';

//remove this two lines
```

```php
//Add this into common/config/web.php
    
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
            'class' => 'yii\gii\Module',
            'generators' => [
                'webix-one-table' => [
                    'class' => 'Webix\Gii\SingleTable\Generator',
                ],
                'webix-many-tables' => [
                                    'class' => 'Webix\Gii\ManyTables\Generator',
                                ],
            ],
        ];
```
