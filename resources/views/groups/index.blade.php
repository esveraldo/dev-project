@extends('adminlte::page')

@section('title', 'Caçula Admin')

@section('content_header')
    <a href="{{route('groups.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> {{trans('words.bt.groups.create')}}</a>
@endsection

@section('content')
    @if(Session::get('message'))
        @include('layouts.messages')
    @endif
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-object-group"></i> <strong>{{trans('words.pg.groups')}}</strong></h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
        </div>
        <div class="box-body">
            <table id="groupsTable" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th class="col-sm-9">{{trans('words.lb.name')}}</th>
                    <th class="col-sm-1 text-center">{{trans('words.lb.status')}} </th>
                    <th class="col-sm-2 text-center">{{trans('words.lb.actions')}} </th>
                </tr>
                </thead>
                <tbody>
                @foreach($groups as $group)
                    <tr>
                        <td>{{$group->name}}</td>
                        <td class="text-center">
                            @if($group->status == 1)
                                <a href="{{route('groups.status', $group->id)}}" class="btn btn-sm btn-success" title="">
                                    <i class="fa fa-check"></i> {{trans('words.bt.disable')}}
                                </a>
                            @elseif($group->status == 0)
                                <a href="{{route('groups.status', $group->id)}}" class="btn btn-sm btn-default" title="">
                                    <i class="fa fa-ban"></i> {{trans('words.bt.enable')}}
                                </a>
                            @endif
                        </td>
                        <td class="text-center">
                            <form method="post" action="{{route('groups.destroy', $group->id)}}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <a href="{{route('groups.edit', $group->id)}}" type="button" class="btn btn-sm btn-primary">
                                    <i class="fa fa-pencil"></i> {{trans('words.bt.edit')}}
                                </a>
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="fa fa-trash"></i> {{trans('words.bt.delete')}}
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/v/bs/dt-1.10.13/datatables.min.css">
@endsection

@section('js')
    <script src="//cdn.datatables.net/v/bs/dt-1.10.13/datatables.min.js"></script>
    <script src="{{ asset('/js/pages-scripts/groups-index.js') }}"></script>
@endsection