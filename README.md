# iftikharahmed/hologram
Log activity viewer for Laravel.

## Requirements
* Laravel
* Semantic UI
* JQuery
* https://github.com/spatie/laravel-activitylog

## Installation

Install package:

`composer require iftikharahmed/activitylog-viewer`

Register service provider:

`Iftikharahmed\ActivitylogViewer\ServiceProvider::class,`

Register facade:

`'ActivitylogViewer' => \Iftikharahmed\ActivitylogViewer\Facade::class,`

## Usage

```php
{!! \ActivitylogViewer::renderAsWidget() !!}
{!! \ActivitylogViewer::renderAsTable() !!}
{!! \ActivitylogViewer::by($user)->renderAsWidget() !!}
{!! \ActivitylogViewer::by($user)->on($model)->renderAsWidget() !!}
```
