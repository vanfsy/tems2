@if(($title[1] == 'User' || $title[1] == 'Company') && ($list->exam_status == 'check' || $list->exam_status == 'recheck') ||
($title[1] == 'Session' && $list->status == 10) ||
($title[1] == 'Ticket' && $list->state == '未入金') ||
($title[1] == 'Ticket' && $list->state == '審査中') ||
($title[1] == 'Withdraw' && $list->status == 0))
    @if($title[1] == 'Ticket')
        @if($list->state == '未入金')
            <a href="#" data-id="{{ $list->id }}" onclick="tmpPost(this);" class="fs12">入金完了</a>
        @else
            <a href="#" data-id="{{ $list->id }}" onclick="tmpPost(this);" class="fs12">チケットを発行する</a>
        @endif
    @else
        <a href="#" data-id="{{ $list->id }}" onclick="tmpPost(this);" class="fs12">{{ $label }}</a>
    @endif
    <form method="post" action="{{ route('admin.' . lcfirst($title[1]) . '.tmp.post') }}" id="form_tmp_{{ $list->id }}">
        @csrf
        <input type="hidden" name="{{lcfirst($title[1])}}_id" value="{{ $list->id }}">
    </form>
    <script>
        function tmpPost(e) {
            'use strict';

            if (confirm('審査が通過され、ユーザーにメールが飛びます')) {
                document.getElementById('form_tmp_' + e.dataset.id).submit();
            }
        }
    </script>
@endif

{{--
<script>
    (function () {
        'use strict';

        var cmds = document.getElementsByClassName('del');
        var i;

        for (i = 0; i < cmds.length; i++) {
            cmds[i].addEventListener('click', function (e) {
                e.preventDefault();
                if (confirm('本当に削除しますか？')) {
                    document.getElementById('form_' + this.dataset.id).submit();
                }
            });
        }

    })();
</script>--}}
