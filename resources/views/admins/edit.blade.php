@extends('adminlte::page')

@section('title', 'Caçula Admin')

@section('content_header')
    <a href="{{route('admin.index')}}" class="btn btn-primary"><i class="fa fa-angle-left"></i> {{trans('words.bt.admins.list')}}</a>
@endsection


@section('content')
    @if(Session::get('message'))
        @include('layouts.messages')
    @endif
    <div class="box">
        <form method="post" action="{{ route('admin.update', $admin->id) }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-object-group"></i> <strong>{{trans('words.bt.admins.create')}}</strong></h3>
            </div>
            <div class="box-body">
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="name">{{trans('words.lb.name')}}</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $admin->name }}" required>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="email">{{trans('words.lb.email')}}</label>
                        <input type="text" class="form-control" id="email" name="email" value="{{ $admin->email }}" required>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="password">{{trans('words.lb.password')}}</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="role_id">{{trans('words.lb.perfil')}}</label>
                        <select class="select2 form-control" id="role_id" name="role_id" required>
                            @foreach($roles as $role)
                                <option value="{{ $role->id }}" {{ $admin->roles->first()->id == $role->id ? 'selected' : null }}>{{ $role->name }}</option>
                            @endforeach
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

@section('css')

@endsection

@section('js')
    <script src="//cdn.datatables.net/v/bs/dt-1.10.13/datatables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script src="{{ asset('/js/pages-scripts/general-select2.js') }}"></script>
@endsection