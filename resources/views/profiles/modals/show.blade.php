<div class="modal fade" id="RoleModal{{$role->id}}"
     tabindex="-1" role="dialog"
     aria-labelledby="favoritesModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close"
                        data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"
                    id="favoritesModalLabel">{{$role->name}}</h4>
            </div>
            <div class="modal-body">
                <p>
                    {{ $role->description }}
                </p>
            </div>
            <div class="modal-footer">
                {{--<form method="post" action="{{route('profiles.destroy', $role->id)}}">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}

                    <button type="submit"
                            class="btn btn-danger"
                            style="float: left">
                        <i class="fa fa-trash"></i>
                        @lang('buttons.delete')
                    </button>

                </form>--}}
            </div>
        </div>
    </div>
</div>