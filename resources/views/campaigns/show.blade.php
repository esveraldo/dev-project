@extends('adminlte::page')

@section('title', 'Caçula Admin')

@section('content_header')

@endsection

@section('content')
    @if(Session::get('message'))
        @include('layouts.messages')
    @endif

    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-users"></i> <strong>{{trans('words.pg.users')}}</strong></h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
        </div>
        <div class="box-body">
            <table id="usersTable" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th class="col-sm-3">{{trans('words.lb.name')}}</th>
                    <th class="col-sm-3">{{trans('words.lb.email')}}</th>
                    <th class="col-sm-3">{{trans('words.lb.phone')}}</th>
                    <th class="col-sm-1">{{trans('words.lb.lists')}}</th>
                    <th class="col-sm-1 text-center">{{trans('words.lb.status')}} </th>
                    <th class="col-sm-1 text-center">{{trans('words.lb.actions')}} </th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>
                            <form name="form_status" id="formEnableDisable" action="{{ route('users.status', $ids = $user->id) }}" method="get">
                                <input type="checkbox" name="ids[]" id="{{ $user->id }}" class="minimal checkUser"> {{ $user->name }}
                            </form>
                        </td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->phone}}</td>
                        <td>{{$user->lists->count()}}</td>
                        <td class="text-center">
                            @if($user->status == 1)
                                <a href="{{route('users.status', $user->id)}}" class="btn btn-sm btn-success" title="">
                                    <!--Botao original-->
                                    <!--<i class="fa fa-check"></i> {{trans('words.bt.disable')}}-->
                                    <i class="fa fa-check"></i> Desativar da lista
                                </a>
                            @elseif($user->status == 0)
                                <a href="{{route('users.status', $user->id)}}" class="btn btn-sm btn-default" title="">
                                    <!--Botao original-->
                                    <!--<i class="fa fa-ban"></i> {{trans('words.bt.enable')}}-->
                                    <i class="fa fa-ban"></i> Ativar na lista
                                </a>
                            @endif
                        </td>
                        <td class="text-center">
                            <a href="{{route('users.show', $user->id)}}" type="button" class="btn btn-sm btn-primary">
                                <i class="fa fa-eye"></i> {{trans('words.bt.show')}}
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    {{--<td colspan="4">
                        <label>
                            <strong>Selecione um ou mais usuários para alteração de status em massa</strong>
                        </label>
                    </td>
                    <td colspan="2" class="text-center">
                        <button name="form_status" form="formEnableDisable" type="button" id="enableAll" class="btn btn-default btn-block" title="" disabled>
                            <i class="fa fa-exchange"></i>
                            {{trans('words.bt.enable_disable_all')}}
                        </button>
                    </td>--}}
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/v/bs/dt-1.10.13/datatables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/skins/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/9.9.0/css/bootstrap-slider.min.css">
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script src="/js/select2.multi-checkboxes.js"></script>
    <script src="//cdn.datatables.net/v/bs/dt-1.10.13/datatables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/9.9.0/bootstrap-slider.min.js"></script>
    <script src="{{ asset('/js/pages-scripts/campaigns-show.js') }}"></script>
@endsection