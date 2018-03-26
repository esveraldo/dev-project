@extends('adminlte::page')

@section('title', 'Caçula Admin')

@section('content_header')
    <a href="{{route('users.index')}}" class="btn btn-primary"><i class="fa fa-angle-left"></i> {{trans('words.bt.users.list')}}</a>
@endsection

@section('content')
    @if(Session::get('message'))
        @include('layouts.messages')
    @endif
    <div class="box">
        <form method="post" action="{{route('users.update', $user->id)}}">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-users"></i> <strong>{{trans('words.pg.users.edit')}}</strong></h3>
            </div>
            <div class="box-body">
                <div class="col-sm-8">
                    <div class="form-group">
                        <label for="name">{{trans('words.lb.name')}}</label>
                        <input type="text" class="form-control" id="name" name="name" required value="{{$user->name}}">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="status">{{trans('words.lb.status')}}</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="0" {{$user->status == 0 ? 'selected' : null}}>Disabled</option>
                            <option value="1" {{$user->status == 1 ? 'selected' : null}}>Enabled</option>
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