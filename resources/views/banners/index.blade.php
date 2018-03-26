@extends('adminlte::page')

@section('title', 'Caçula Admin')

@section('content_header')
    <a href="{{route('banners.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> {{trans('words.bt.banners.create')}}</a>
@endsection

@section('content')
    @if(Session::get('message'))
        @include('layouts.messages')
    @endif
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-filter"></i> <strong>Filtros de Busca</strong></h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
        </div>
        <form action="{{route('banners.index')}}" method="get">
            <div class="box-body">
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="type">Filtrar por Tipo:</label>
                        <select name="type" id="type" class="select2 form-control">
                            <option value="">Todos</option>
                            <option value="Offer" {{isset($whereType) ? ($whereType == 'Offer' ? 'selected' : '') : ''}}>Offer</option>
                            <option value="Catalog" {{isset($whereType) ? ($whereType == 'Catalog' ? 'selected' : '') : ''}}>Catalog</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="status">Filtrar por Status:</label>
                        <select name="status" id="status" class="select2 form-control">
                            <option value="">Todos</option>
                            <option value="0" {{isset($whereStatus) ? ($whereStatus == '0' ? 'selected' : '') : ''}}>Desativado</option>
                            <option value="1" {{isset($whereStatus) ? ($whereStatus == '1' ? 'selected' : '') : ''}}>Ativado</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="bannerFilter">Busca Rápida</label>
                        <input class="form-control" type="text" id="bannerFilter" name="bannerFilter" placeholder="Busca instantânea por nome ou tipo">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label>&nbsp;</label>
                        <a href="{{route('banners.index')}}" class="btn btn-block btn-default" type="button">
                            <i class="fa fa-times"></i>
                            Limpar Filtros
                        </a>
                    </div>
                </div>
                {{--<div class="col-sm-1">
                    <div class="form-group">
                        <label>&nbsp;</label>
                        <button class="btn btn-block btn-success" type="button">
                            <i class="fa fa-file-excel-o"></i>
                            Exportar
                        </button>
                    </div>
                </div>--}}
            </div>
        </form>
    </div>
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-shopping-bag"></i> <strong>{{trans('words.pg.banners')}}</strong></h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
        </div>
        <div class="box-body">
            <table id="bannersTable" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th class="col-sm-1 text-center">{{trans('words.lb.image')}}</th>
                    <th class="col-sm-5">{{trans('words.lb.name')}}</th>
                    <th class="col-sm-2 text-center">Última Atualização</th>
                    <th class="col-sm-1 text-center">{{trans('words.lb.type')}}</th>
                    <th class="col-sm-1 text-center">{{trans('words.lb.status')}} </th>
                    <th class="col-sm-2 text-center">{{trans('words.lb.actions')}} </th>
                </tr>
                </thead>
                <tbody>
                @foreach($banners as $banner)
                    <tr>
                        <td class="text-center">
                            <label><input type="checkbox" id="{{$banner->id}}" class="minimal">
                                <img src="{{$banner->path}}" width="50px" alt="{{$banner->name}}" title="{{$banner->name}}">
                            </label>
                        </td>
                        <td>{{$banner->name}}</td>
                        <td class="text-center">
                            Dia {{ date("d/m/Y", strtotime($banner->updated_at)) }}
                            às {{ date("H:m:i", strtotime($banner->updated_at)) }}
                        </td>
                        <td class="text-center">{{$banner->type}}</td>
                        <td class="text-center">
                            @if($banner->status == 1)
                                <a href="{{route('banners.status', $banner->id)}}" class="btn btn-sm btn-success" title="">
                                    <i class="fa fa-check"></i> {{trans('words.bt.disable')}}
                                </a>
                            @elseif($banner->status == 0)
                                <a href="{{route('banners.status', $banner->id)}}" class="btn btn-sm btn-default" title="">
                                    <i class="fa fa-ban"></i> {{trans('words.bt.enable')}}
                                </a>
                            @endif
                        </td>
                        <td class="text-center">
                            <form method="post" action="{{route('banners.destroy', $banner->id)}}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <a href="{{route('banners.edit', $banner->id)}}" type="button" class="btn btn-sm btn-primary">
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
                <tfoot>
                <tr>
                    <td colspan="3">
                        <label>
                            <strong>Selecione um ou mais banners para alteração de status ou exclusão em massa</strong>
                        </label>
                    </td>
                    <td colspan="2" class="text-center">
                        <button type="button" id="enableAll" class="btn btn-default btn-block" title="" disabled>
                            <i class="fa fa-exchange"></i> {{trans('words.bt.enable_disable_all')}}
                        </button>
                    </td>
                    <td class="text-center">
                        <form method="post" id="formDeleteAll" action="{{route('banners.destroy', 0)}}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <input type="hidden" name="banners" id="banners">
                            <button type="submit" id="deleteAll" class="btn btn-danger btn-block" title="" disabled>
                                <i class="fa fa-trash"></i> {{trans('words.bt.delete_all')}}
                            </button>
                        </form>
                    </td>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection

@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="//cdn.datatables.net/v/bs/dt-1.10.13/datatables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/skins/all.css">
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script src="//cdn.datatables.net/v/bs/dt-1.10.13/datatables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>
    <script src="{{ asset('/js/pages-scripts/banners-index.js') }}"></script>
@endsection