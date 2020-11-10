@extends(config('iftikhar.activitylog-viewer.view.layout'))

@section(config('iftikhar.activitylog-viewer.view.section'))
    <h2 class="ui header">Hologram</h2>

    {!!
    $suitable->source($collection)
    ->title(trans('activitylog-viewer::table.title'))
    ->columns([
        ['header' => trans('activitylog-viewer::table.header.channel'), 'field' => 'log_name'],
        ['header' => trans('activitylog-viewer::table.header.by'), 'raw' => function($data){
            return $data->causer->name ?? null;
        }],
        ['header' => trans('activitylog-viewer::table.header.activity'), 'field' => 'description'],
        ['header' => trans('activitylog-viewer::table.header.on'), 'raw' => function($data){
            return $data->subject->title ?? null;
        }],
        ['header' => trans('activitylog-viewer::table.header.time'), 'raw' => function($data){
            return $data->created_at->diffForHumans();
        }],
    ])
    ->render()
    !!}
@endsection
