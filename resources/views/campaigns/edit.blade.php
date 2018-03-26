@extends('adminlte::page')

@section('title', 'Caçula Admin')

@section('content_header')
    <a href="{{route('campaigns.index')}}" class="btn btn-primary"><i class="fa fa-angle-left"></i> {{trans('words.bt.campaigns.list')}}</a>
@endsection


@section('content')
    @include('layouts.campaigns-filters')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-filter"></i> <strong>{{trans('words.lb.results')}}</strong></h3>
        </div>
        <div class="box-body">
            <table id="usersTable" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th class="col-sm-2">{{trans('words.lb.name')}}</th>
                    <th class="col-sm-1">{{trans('words.lb.age')}}</th>
                    <th class="col-sm-1">{{trans('words.lb.gender')}}</th>
                    <th class="col-sm-1">{{trans('words.lb.platform')}}</th>
                    <th class="col-sm-1">{{trans('words.lb.state')}}</th>
                    <th class="col-sm-2">{{trans('words.lb.city')}}</th>
                    <th class="col-sm-2">{{trans('words.lb.neighborhood')}}</th>
                    <th class="col-sm-1">{{trans('words.lb.store')}}</th>
                    <th class="col-sm-1">{{trans('words.lb.lists')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>
                            @if(isset($user->birth))
                            {{ \Carbon\Carbon::createFromFormat('Y-m-d', date('Y-m-d'))->diffInYears(\Carbon\Carbon::createFromFormat('Y-m-d', $user->birth)) }} anos
                            @endif
                        </td>
                        <td>{{ $user->gender == 'F' ? 'Feminino' : ($user->gender == 'M' ? 'Masculino' : 'Não Informado') }}</td>
                        <td>{{ $user->platform }}</td>
                        <td>{{ $user->state }}</td>
                        <td>{{ $user->city }}</td>
                        <td>{{$user->neighborhood}}</td>
                        <td>{{isset($user->stores->first()->name) ? $user->stores->sortBy('score')->last()->name : null}}</td>
                        <td>{{$user->lists->count()}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/v/bs/dt-1.10.13/datatables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/9.9.0/css/bootstrap-slider.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/skins/all.css">
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script src="{{ asset('/js/select2.multi-checkboxes.js') }}"></script>
    <script src="//cdn.datatables.net/v/bs/dt-1.10.13/datatables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/9.9.0/bootstrap-slider.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>
    <script src="{{ asset('/js/pages-scripts/campaigns-form.js') }}"></script>
@endsection