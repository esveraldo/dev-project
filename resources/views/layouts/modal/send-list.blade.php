<div class="modal fade" id="sendListModal" tabindex="-1" role="dialog" aria-labelledby="listsLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="formSendList" action="" method="POST">
                {{ csrf_field() }}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="pointsLabel"><strong><i class="fa fa-book"></i> {{ trans('words.lb.lists.send') }}</strong></h4>
                </div>

                <table class="table modal-body" style="margin-bottom: -1px">
                    <tr>
                        <td>
                            <div class="col-sm-12 no-padding">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="list_id">{{trans('words.lb.list')}}</label>
                                        <select class="select22 form-control" id="list_id" name="list_id">
                                            @foreach($lists as $list)
                                                <option value="{{$list->id}}">{{ $list->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="profile_id">{{trans('words.lb.profile')}}</label>
                                        <select class="select22 form-control" id="profile_id" name="profile_id">
                                            <option value="0" selected>Todos os Usuários</option>
                                            @foreach($profiles as $profile)
                                                <option value="{{$profile->id}}">{{ $profile->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> {{trans('words.bt.send')}}</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                </div>
            </form>
        </div>
    </div>
</div>