@extends('adminlte::page')

@section('title', 'Caçula Admin')

@section('content_header')
    <a href="{{route('tags.index')}}" class="btn btn-primary"><i class="fa fa-angle-left"></i> {{trans('words.bt.tags.list')}}</a>
@endsection


@section('content')
    <div class="box">
        <form method="post" action="{{route('tags.store')}}">
            {{ csrf_field() }}
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-tags"></i> <strong>{{trans('words.pg.tags.create')}}</strong></h3>
            </div>
            <div class="box-body">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="name">{{trans('words.lb.name')}}</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <div class="col-sm-4 col-sm-offset-4">
                    <button type="submit" class="btn btn-block btn-success">
                        <i class="fa fa-save"></i> {{trans('words.bt.save')}}
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection