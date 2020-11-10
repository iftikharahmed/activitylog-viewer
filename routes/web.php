<?php

$router->group(
    [
        'namespace'  => '\Iftikharahmed\ActivitylogViewer\Http\Controllers',
        'prefix'     => config('iftikharahmed.activitylog-viewer.route.prefix'),
        'as'         => 'activitylog-viewer::',
        'middleware' => config('iftikharahmed.activitylog-viewer.route.middleware')
    ],
    function () use ($router) {
        $router->get('/', ['uses' => 'ActivitylogViewerController@index'])->name('index');
    }
);
