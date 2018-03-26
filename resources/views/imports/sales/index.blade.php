@extends('adminlte::page')

@section('title', 'Caçula Admin')

@section('content')
    @if(Session::get('message'))
        @include('layouts.messages')
    @endif
    <div class="box">
        <form method="post" action="{{ route('imports.sales.store') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-upload"></i> <strong>{{trans('words.pg.import.index')}}</strong></h3>
            </div>
            <div class="box-body">

                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="image">{{trans('words.lb.file')}}</label>
                        <input type="file" name="file" id="file" accept=".csv" class="form-control">
                    </div>
                </div>

            </div>

            <div class="box-footer">
                <div class="col-sm-4 col-sm-offset-4">
                    <button type="submit" class="btn btn-block btn-success">
                        <i class="fa fa-save"></i> {{trans('words.bt.import')}}
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('css')
@endsection

@section('js')

@endsection