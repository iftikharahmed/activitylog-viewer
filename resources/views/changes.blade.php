<a href="#" class="button-show-modal" data-target="modal-changes-{{ $data['id'] }}">
    {{ $data['on'] }} #{{ $data['id'] }}
</a>

<div class="ui modal" id="modal-changes-{{ $data['id'] }}">
    <i class="close icon"></i>
    <div class="header">
        @lang('activitylog-viewer::table.header.changes')
    </div>
    <div class="content">

        @if($data['changes'])
            <table class="ui table definition">
                <thead>
                <tr>
                    <th></th>
                    <th>@lang('activitylog-viewer::table.header.old')</th>
                    <th>@lang('activitylog-viewer::table.header.new')</th>
                </tr>
                </thead>
                @foreach($data['changes'] as $field => $value)
                    <tr>
                        <td>{{ $field }}</td>
                        <td>{{ $value['old'] }}</td>
                        <td>{{ $value['new'] }}</td>
                    </tr>
                @endforeach
            </table>
        @else
            <div class="ui message">@lang('activitylog-viewer::messages.blankstate.changes')</div>
        @endif
    </div>
</div>
