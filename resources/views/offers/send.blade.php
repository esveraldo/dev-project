@extends('adminlte::page')

@section('title', 'Caçula Admin')

@section('content_header')
    <a href="{{route('offers.index')}}" class="btn btn-primary"><i class="fa fa-angle-left"></i> {{trans('words.bt.offers.list')}}</a>
@endsection

@section('content')
    @if(Session::get('message'))
        @include('layouts.messages')
    @endif

    <div class="col-sm-3">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-gift"></i> <strong>Produto em Oferta</strong></h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>

            <div class="box-body">
                <div class="col-sm-12 no-padding">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="name">{{trans('words.lb.primaryimage')}}</label>
                            <div class="panel panel-default">
                                <div class="panel-body" style="min-height: 323px">
                                    <img id="image" style="max-width: 100%;max-height: 293px" src="{{$product->path_image}}" class="img-responsive center-block">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="name">{{trans('words.lb.name')}}</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{$product->name}}" disabled>
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="price">{{trans('words.lb.price')}}</label>
                            <input type="text" class="form-control" id="price" name="price" maxlength="7" value="{{$offer->price}}" disabled>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="code">{{trans('words.lb.code')}}</label>
                            <input type="text" class="form-control" id="code" name="code" maxlength="13" value="{{$product->code}}" disabled>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="group_id">{{trans('words.lb.groups')}}</label>
                            <select class="select2 form-control" id="group_id" name="group_id[]" multiple>
                                @foreach($groups as $group)
                                    <option value="{{$group->id}}" {{$product->groups()->where('group_id', '=', $group->id)->count() == 0 ? '' : 'selected'}}>{{$group->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form action="{{ route('messages.send') }}" method="POST">
        {{ csrf_field() }}
        <div class="col-sm-9">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-users"></i> <strong>Usuários</strong></h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>

                <div class="box-body">
                    <table id="usersTable" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th class="col-sm-1" style="width: 20px">#</th>
                            <th class="col-sm-5">{{ trans('words.lb.name') }}</th>
                            <th class="col-sm-6">{{ trans('words.lb.email') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>
                                    <label>
                                        <input type="checkbox" id="{{ $user->id }}" class="minimal checkUser">
                                    </label>
                                </td>
                                <td>
                                    {{ $user->name }}
                                </td>

                                <td>{{ $user->email }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="2">
                                <label>
                                    <strong>Selecione um ou mais usuários para enviar notificações</strong>
                                </label>
                            </td>
                            <td colspan="2" class="text-center">
                                <button type="button"
                                        id="sendPushAll"
                                        class="btn btn-info btn-block"
                                        title="Enviar Notificações"
                                        data-toggle="modal"
                                        data-target="#PushNotificationModal">
                                    <i class="fa fa-envelope"></i> {{trans('words.bt.send_push_notification')}}
                                </button>
                            </td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

        @include('layouts.modal-push-notification')

    </form>

@endsection

@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.js"></script>
    <script src="/js/select2.multi-checkboxes.js"></script>
    <script src="{{ asset('/js/pages-scripts/offers-send.js') }}"></script>
@endsection