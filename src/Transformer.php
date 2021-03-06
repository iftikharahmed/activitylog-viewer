<?php
namespace Iftikharahmed\ActivitylogViewer;

use League\Fractal\TransformerAbstract;

class Transformer extends TransformerAbstract
{
    public function transform(Activity $model)
    {
        return [
            'id'          => (int)$model->id,
            'channel'     => $model->log_name,
            'by'          => $model->causer->name ?? null,
            'on'          => $model->subject_type,
            'properties'  => $model->properties,
            'description' => $model->description,
            'changes'     => $this->normalizeChanges($model->changes),
            'time'        => $model->created_at->diffForHumans(),
            'created_at'  => $model->created_at,
            'updated_at'  => $model->updated_at,
        ];
    }

    protected function normalizeChanges($changes)
    {
        $changes = $changes->toArray();

        $attributes = array_get($changes, 'attributes', []);

        $result = [];
        foreach ($attributes as $field => $value) {
            $oldValue = array_get($changes, 'old.'.$field);

            if ($value != $oldValue) {
                $result[$field]['old'] = $oldValue;
                $result[$field]['new'] = $value;
            }
        }

        return $result;
    }
}
