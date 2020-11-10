<?php

$router->group(
    [
        'namespace'  => '\Iftikharahmed\ActivitylogViewer\Http\Controllers',
        'prefix'     => config('iftikhar.activitylog-viewer.route.prefix'),
        'as'         => 'activitylog-viewer::',
        'middleware' => config('iftikhar.activitylog-viewer.route.middleware')
    ],
    function () use ($router) {
        $router->get('/', ['uses' => 'ActivitylogViewerController@index'])->name('index');
    }
);
