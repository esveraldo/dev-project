@extends('adminlte::page')

@section('title', 'Caçula Admin')

@section('content_header')
    <a href="{{route('users.index')}}" class="btn btn-primary"><i class="fa fa-angle-left"></i> {{trans('words.bt.users.list')}}</a>
@endsection


@section('content')
    <div class="box">
        <form method="post" action="{{route('users.store')}}">
            {{ csrf_field() }}
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-users"></i> <strong>{{trans('words.pg.users.create')}}</strong></h3>
            </div>
            <div class="box-body">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="tipo">{{trans('words.lb.tipouser')}}</label>
                        <input type="text" class="form-control" id="name" name="tipo" required>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label for="name">{{trans('words.lb.name')}}</label>
                        <input type="text" class="form-control" id="name" name="nome" required>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label for="name">{{trans('words.lb.email')}}</label>
                        <input type="text" class="form-control" id="name" name="email" required>
                    </div>
                </div>
                <div class="col-sm-12 col-md-3">
                    <div class="form-group">
                        <label for="name">{{trans('words.lb.genero')}}</label>
                        <input type="text" class="form-control" id="name" name="genero" required>
                    </div>
                </div>
                <div class="col-sm-12 col-md-3">
                    <div class="form-group">
                        <label for="idade">{{trans('words.lb.idade')}}</label>
                        <input type="text" class="form-control" id="name" name="idade" required>
                    </div>
                </div>
                <div class="col-sm-12 col-md-3">
                    <div class="form-group">
                        <label for="cpf">{{trans('words.lb.cpf')}}</label>
                        <input type="text" class="form-control" id="name" name="cpf" required>
                    </div>
                </div>
                <div class="col-sm-12 col-md-3">
                    <div class="form-group">
                        <label for="ssn">{{trans('words.lb.ssn')}}</label>
                        <input type="text" class="form-control" id="name" name="ssn" required>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="name">{{trans('words.lb.logradouro')}}</label>
                        <input type="text" class="form-control" id="name" name="logradouro" required>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="form-group">
                        <label for="name">{{trans('words.lb.complemento')}}</label>
                        <input type="text" class="form-control" id="name" name="complemento" required>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="form-group">
                        <label for="name">{{trans('words.lb.numero')}}</label>
                        <input type="text" class="form-control" id="name" name="numero" required>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="form-group">
                        <label for="name">{{trans('words.lb.bairro')}}</label>
                        <input type="text" class="form-control" id="name" name="bairro" required>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="form-group">
                        <label for="name">{{trans('words.lb.cidade')}}</label>
                        <input type="text" class="form-control" id="name" name="cidade" required>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="form-group">
                        <label for="name">{{trans('words.lb.estado')}}</label>
                        <input type="text" class="form-control" id="name" name="estado" required>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="form-group">
                        <label for="name">{{trans('words.lb.pais')}}</label>
                        <input type="text" class="form-control" id="name" name="pais" required>
                    </div>
                </div>
                <div class="col-xs-4 col-sm-2 col-md-2">
                    <div class="form-group">
                        <label for="ddd">{{trans('words.lb.ddd')}}</label>
                        <input type="text" class="form-control" id="name" name="ddd" required>
                    </div>
                </div>
                <div class="col-xs-8 col-sm-4 col-md-4">
                    <div class="form-group">
                        <label for="telefone">{{trans('words.lb.telefone')}}</label>
                        <input type="text" class="form-control" id="name" name="telefone" required>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="form-group">
                        <label for="qtderifas">{{trans('words.lb.qtderifas')}}</label>
                        <input type="text" class="form-control" id="name" name="qtderifas" required>
                    </div>
                </div>
<!--                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="status">{{trans('words.lb.status')}}</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="0">Disabled</option>
                            <option value="1" selected>Enabled</option>
                        </select>
                    </div>
                </div>-->
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