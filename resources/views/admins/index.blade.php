@extends('adminlte::page')

@section('title', 'Caçula Admin')

@section('content_header')
@endsection

@section('content')
    @if(Session::get('message'))
        @include('layouts.messages')
    @endif

    <div class="row">
        <div class="col-sm-3">
            <div class="box">
                <form method="post" action="{{route('admin.store')}}">
                    {{ csrf_field() }}
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-user-plus"></i> <strong>{{trans('words.bt.admins.create')}}</strong></h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="name">{{trans('words.lb.name')}}</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="email">{{trans('words.lb.email')}}</label>
                                <input type="text" class="form-control" id="email" name="email" required>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="password">{{trans('words.lb.password')}}</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="category_id">{{trans('words.lb.perfil')}}</label>
                                <select class="select2 form-control" id="role_id" name="role_id" required>
                                    <option value=""></option>
                                    @foreach($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="box-footer">
                        <div class="col-sm-8 col-sm-offset-2">
                            <button type="submit" class="btn btn-block btn-success">
                                <i class="fa fa-save"></i> {{trans('words.bt.save')}}
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        <i class="fa fa-unlock-alt"></i>
                        <strong>@lang('words.pg.profiles')</strong></h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>

                <div class="box-body">
                    <table id="adminsTable" class="table table-bordered table-hover">
                        <tbody>
                        @foreach($roles as $role)
                            <tr>
                                <td style="text-align: center;">
                                    <a id="seeProfile" title="Clique para ver mais detalhes" data-toggle="modal" data-target="#RoleModal{{$role->id}}">
                                        {{ $role->name }}
                                    </a>
                                </td>
                            </tr>

                            <div class="row">
                                @include('profiles.modals.show')
                            </div>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>



        <div class="col-sm-9">


            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-users"></i> <strong>{{trans('words.pg.admins')}}</strong></h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>

                <div class="box-body">
                    <table id="adminsTable" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th class="col-sm-4">{{ trans('words.lb.name') }}</th>
                            <th class="col-sm-2">{{ trans('words.lb.email') }}</th>
                            <th class="col-sm-2 text-center"> {{ trans('words.lb.perfis') }} </th>
                            <th class="col-sm-1 text-center"> {{ trans('words.lb.status') }} </th>
                            <th class="col-sm-3 text-center"> {{ trans('words.lb.actions') }} </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($admins as $admin)
                            <tr>
                                <td>
                                    {{ $admin->name }}
                                </td>
                                <td>{{ $admin->email }}</td>
                                <td>{{ $admin->roles->first()->name }}</td>
                                <td>
                                    @if($admin->status == 1)
                                        <a href="{{route('admin.status', $admin->id)}}" class="btn btn-sm btn-success" title="">
                                            <i class="fa fa-check"></i> {{trans('words.bt.disable')}}
                                        </a>
                                    @elseif($admin->status == 0)
                                        <a href="{{route('admin.status', $admin->id)}}" class="btn btn-sm btn-default" title="">
                                            <i class="fa fa-ban"></i> {{trans('words.bt.enable')}}
                                        </a>
                                    @endif
                                </td>
                                <td class="text-center">

                                    <form method="post" action="{{route('admin.destroy', $admin->id)}}">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <a href="{{route('admin.edit', $admin->id)}}" type="button" class="btn btn-sm btn-primary">
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
        </div>
    </div>

@endsection

@section('css')

@endsection

@section('js')

@endsection