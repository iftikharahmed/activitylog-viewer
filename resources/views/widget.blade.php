<div {!! $attributes !!} data-page="1">
    <div class="ui card fluid">
        <div class="content">
            <div class="header">@lang('activitylog-viewer::widget.title')</div>
        </div>

        @include('activitylog-viewer::items', compact('logs'))

        <div class="extra content">
            <button class="ui button basic fluid" type="submit" data-no-more-content="@lang('activitylog-viewer::widget.no_more_content')" data-url="{{ route('activitylog-viewer::index') }}">@lang('activitylog-viewer::widget.load_more')</button>
        </div>
    </div>
</div>

<script>
    $(function () {
        $('#{{ $id }}').on('click', 'button[type=submit]', function(e){
            e.preventDefault();
            var activitylogviewer = $(e.delegateTarget);
            var btn = $(e.currentTarget);
            if (btn.hasClass('disabled')) {
                return false;
            }
            btn.addClass('loading disabled');
            var logContainer = $(e.delegateTarget).find('.activitylog-viewer-list');
            activitylogviewer.data('page', parseInt(activitylogviewer.data('page')) + 1);
            var param = jQuery.extend({}, activitylogviewer.data());
            var url = btn.data('url');
            delete param.url;
            $.ajax({
                type: "GET",
                url: url + '?' + decodeURIComponent($.param(param)),
                success: function (html) {
                    if (html.length > 0) {
                        $(html).insertBefore(activitylogviewer.find('.extra.content'));
                        btn.removeClass('disabled');
                    } else {
                        btn.attr("disabled", "disabled").html(btn.data('no-more-content'));
                    }
                },
                error: function () {
                    alert('Something goes wrong');
                },
                complete: function () {
                    btn.removeClass('loading');
                }
            });
            return false;
        });
    });
</script>
