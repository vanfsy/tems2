@if($list->exam_status == 'check' || $list->exam_status == 'recheck' || $list->status == 10)
    <a href="#" data-id="{{ $list->id }}" data-toggle="modal" data-target=".bs-modal-sm_{{ $list->id }}" class="fs12">{{ $label }}</a>

    <div class="modal fade bs-modal-sm_{{ $list->id }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">修正内容の入力</h4>
                </div>
                <form method="post" action="{{ route('admin.user.check.post') }}" id="form_{{ $list->id }}">
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ $list->id }}">

                        <div class="form-group">
                            <label for="comment" class="control-label">却下理由</label>
                            <div class="col-sm-12">
                                <textarea id="comment" required="required" class="form-control"
                                          name="comment" rows="10"></textarea>
                            </div>
                        </div>
                        <div class="clearfix"></div>

                        <div class="ln_solid"></div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">送信する</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
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
