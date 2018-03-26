@extends('adminlte::page')

@section('title', 'Caçula Admin')

@section('content_header')
@endsection

@section('content')
    @if(Session::get('message'))
        @include('layouts.messages')
    @endif
    <div class="box">
        <form method="post" action="{{route('messagings.store')}}">
            {{ csrf_field() }}
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-plus"></i> <strong>{{trans('words.pg.messagings.create')}}</strong></h3>
            </div>
            <div class="box-body">
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="title">{{trans('words.lb.title')}}</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="message">{{trans('words.lb.message')}}</label>
                        <input type="text" class="form-control" id="message" name="message" required>
                    </div>
                </div>
                <div class="col-sm-3">
                    <label for="">&nbsp;</label>
                    <button type="submit" class="btn btn-block btn-success">
                        <i class="fa fa-save"></i> {{trans('words.bt.save')}}
                    </button>
                </div>
            </div>
        </form>
    </div>
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-bell"></i> <strong>{{trans('words.pg.messagings')}}</strong></h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
        </div>
        <div class="box-body">
            <table id="messagingsTable" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th class="col-sm-3">{{trans('words.lb.title')}}</th>
                    <th class="col-sm-7">{{trans('words.lb.message')}}</th>
                    <th class="col-sm-2 text-center">{{trans('words.lb.actions')}} </th>
                </tr>
                </thead>
                <tbody>
                    @foreach($messages as $message)
                        <tr>
                            <td>
                                {{ $message->title }}
                            </td>
                            <td>
                                {{ $message->message }}
                            </td>
                            <td class="text-center">
                                <form method="post" action="{{ route('messagings.destroy', $message->id) }}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button onclick="sendMessaging({{$message->id}});" type="button" class="btn btn-sm btn-info">
                                        <i class="fa fa-envelope"></i> {{trans('words.bt.send')}}
                                    </button>

                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="fa fa-trash"></i> {{ trans('words.bt.delete') }}
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="sendMessagingModal" tabindex="-1" role="dialog" aria-labelledby="messagingsLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="formSendMessaging" action="" method="POST">
                    {{ csrf_field() }}
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="pointsLabel"><strong><i class="fa fa-bell"></i> {{ trans('words.lb.messagings.send') }}</strong></h4>
                    </div>

                    <table class="table modal-body" style="margin-bottom: -1px">
                        <tr>
                            <td>
                                <div class="col-sm-12 no-padding">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="offer_name">{{trans('words.lb.profile')}}</label>
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
@endsection

@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/v/bs/dt-1.10.13/datatables.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
@endsection

@section('js')
    <script src="//cdn.datatables.net/v/bs/dt-1.10.13/datatables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script src="{{ asset('/js/pages-scripts/messagings-index.js') }}"></script>
@endsection