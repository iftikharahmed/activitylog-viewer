<?php

namespace Iftikharahmed\ActivitylogViewer;

class Factory
{
    public static function create($id, $class)
    {
        if (!$id && !is_string($class)) {
            return false;
        }

        return with(new $class())->find($id);
    }
}
