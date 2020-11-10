<?php
namespace Iftikharahmed\ActivitylogViewer;

class Facade extends \Illuminate\Support\Facades\Facade
{
    /**
     * {@inheritDoc}
     */
    protected static function getFacadeAccessor()
    {
        return 'iftikharahmed.activitylog-viewer';
    }
}
