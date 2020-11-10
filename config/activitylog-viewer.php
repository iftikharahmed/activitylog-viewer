<?php
/*
 * Set specific configuration variables here
 */
return [
    // automatic loading of routes through main service provider
    'route'      => [
        'enabled'    => true,
        'prefix'     => 'activitylog-viewer',
        'middleware' => ['web'],
    ],
    'view'       => [
        'layout'  => 'activitylog-viewer::layout',
        'section' => 'body',
    ],
    'transformer' => \Iftikharahmed\ActivitylogViewer\Transformer::class,
];
