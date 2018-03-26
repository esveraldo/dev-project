@extends('adminlte::page')

@section('title', 'Caçula Admin')

@section('content_header')
    <a href="{{route('tags.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> {{trans('words.bt.tags.create')}}</a>
@endsection

@section('content')

    @if(Session::get('message'))
        @include('layouts.messages')
    @endif

    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-tags"></i> <strong>{{trans('words.pg.tags')}}</strong></h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
        </div>
        <div class="box-body">
            <table id="tagsTable" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th class="col-sm-10">{{trans('words.lb.name')}}</th>
                    <th class="col-sm-2 text-center">{{trans('words.lb.actions')}} </th>
                </tr>
                </thead>
                <tbody>
                @foreach($tags as $tag)
                    <tr>
                        <td>{{$tag->name}}</td>
                        <td class="text-center">
                            <form method="post" action="{{route('tags.destroy', $tag->id)}}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <a href="{{route('tags.edit', $tag->id)}}" type="button" class="btn btn-sm btn-primary">
                                    <i class="fa fa-pencil"></i> {{trans('words.bt.edit')}}
                                </a>
                                <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> {{trans('words.bt.delete')}}</button>
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
    <script src="{{ asset('/js/pages-scripts/tags-index.js') }}"></script>
@endsection