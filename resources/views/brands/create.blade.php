@extends('adminlte::page')

@section('title', 'Caçula Admin')

@section('content_header')
    <a href="{{route('brands.index')}}" class="btn btn-primary"><i class="fa fa-angle-left"></i> {{trans('words.bt.brands.list')}}</a>
@endsection


@section('content')
    <div class="box">
        <form method="post" action="{{route('brands.store')}}">
            {{ csrf_field() }}
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-ticket"></i> <strong>{{trans('words.pg.brands.create')}}</strong></h3>
            </div>
            <div class="box-body">
                <div class="col-sm-8">
                    <div class="form-group">
                        <label for="name">{{trans('words.lb.name')}}</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="status">{{trans('words.lb.status')}}</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="0">Disabled</option>
                            <option value="1" selected>Enabled</option>
                        </select>
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