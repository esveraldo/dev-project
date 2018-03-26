@extends('adminlte::page')

@section('title', 'Caçula Admin')

@section('content_header')
    <a href="{{route('encartes.create')}}" style="display:inline-block" class="btn btn-primary"><i class="fa fa-plus"></i>  Cadastrar um novo encarte</a>
@endsection

@section('content')
    @if(Session::get('message'))
        @include('layouts.messages')
    @endif
    <div class="box">
        <div class="box-header with-border">
            <div class="row">
                <div class="col-sm-9">
                    <h3 class="box-title">
                        <i class="fa fa-newspaper-o"></i>
                        <strong>Encartes</strong>
                    </h3>
                </div>
            </div>
        </div>

        <div class="box-body">
            <table id="encartesTable" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th class="col-sm-1 text-center">{{trans('words.lb.image')}}</th>
                    <th class="col-sm-3">{{trans('words.lb.name')}}</th>
                    <th style="display: none;">{{trans('words.lb.stores')}}</th>
                    <th class="col-sm-1">{{trans('words.lb.stores')}}</th>
                    <th class="col-sm-2">Começa em</th>
                    <th class="col-sm-2">{{ trans('words.lb.expire_at') }}</th>
                    <th class="col-sm-1 text-center">{{trans('words.lb.status')}} </th>
                    <th class="col-sm-2 text-center">{{trans('words.lb.actions')}} </th>
                </tr>
                </thead>
                <tbody>
                @foreach($encartes as $encarte)
                    <tr>
                        <td class="text-center">
                            <img src="{{$encarte->product->path_image}}" width="50px" alt="{{$encarte->product->name}}" title="{{$encarte->product->name}}">
                        </td>
                        <td>
                            {{ $encarte->product->name }}
                        </td>
                        <td style="display: none;">
                            @foreach($encarte->stores as $stores)
                                {{ $stores->name }}
                            @endforeach
                        </td>
                        <td>
                            <button type="submit" class="btn btn-sm btn-default" title="
                            Lojas:
                            @foreach($encarte->stores as $stores)
                                {{ $stores->name }}
                            @endforeach
                            ">{{ $encarte->stores->count() }}</button>
                        </td>
                        <td> {{ $encarte->start_at->diffForHumans() }}</td>
                        <td> {{ $encarte->expire_at->diffForHumans() }}</td>
                        <td class="text-center">
                            @if($encarte->status == 1)
                                <a href="{{route('encartes.status', $encarte->id)}}" class="btn btn-sm btn-success" title="">
                                    <i class="fa fa-check"></i> {{trans('words.bt.disable')}}
                                </a>
                            @elseif($encarte->status == 0)
                                <a href="{{route('encartes.status', $encarte->id)}}" class="btn btn-sm btn-default" title="">
                                    <i class="fa fa-ban"></i> {{ trans('words.bt.enable') }}
                                </a>
                            @endif
                        </td>
                        <td class="text-center">
                            <form method="post" action="{{ route('encartes.destroy', $encarte->id) }}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}

                                <a href="{{route('encartes.edit', $encarte->id)}}" type="button" class="btn btn-sm btn-primary">
                                    <i class="fa fa-pencil"></i> {{trans('words.bt.edit')}}
                                </a>

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
@endsection

@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/v/bs/dt-1.10.13/datatables.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
@endsection

@section('js')
<script src="//cdn.datatables.net/v/bs/dt-1.10.13/datatables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script src="{{ asset('/js/pages-scripts/encartes-index.js') }}"></script>
@endsection
<style>
    #encartesTable_filter > label > input {
        min-width: 160px;
    }
</style>