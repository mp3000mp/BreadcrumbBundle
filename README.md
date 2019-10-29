# BreadcrumbBundle
Simple library for Symfony 4 that allows you to manage, configure and render breadcrumbs.


[![In Progress](https://img.shields.io/badge/in%20progress-yes-red)](https://img.shields.io/badge/in%20progress-yes-red)
[![Build Status](https://travis-ci.com/mp3000mp/BreadcrumbBundle.svg?branch=master)](https://travis-ci.com/mp3000mp/BreadcrumbBundle)
[![License](https://img.shields.io/badge/License-Apache%202.0-blue.svg)](https://opensource.org/licenses/Apache-2.0)

Table of Contents
-----------------

 - [Installation](#installation)
 - [Usage](#usage)
 - [Examples](#examples)


Installation
------------

```sh
#todo
```


Usage
-----

```php
// todo
```


Examples
--------

```php
// in controller or service
public function myController(BreadcrumbManager $breadcrumbManager)
{
    // add 3 items to default breadcrumb
    $breadcrumbManager->addItem('Home', '/')
        ->addItem('List of items', '/items')
        ->addItem('Selected item');
}
```

```twig
    {# in twig template #}
    {{ mp3000mp_breadcrumb_render() }}
```

