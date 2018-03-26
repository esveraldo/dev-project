@extends('adminlte::page')

@section('title', 'Caçula Admin')

@section('content_header')
    <a href="{{route('stores.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> {{trans('words.bt.stores.create')}}</a>
@endsection

@section('content')
    @if(Session::get('message'))
        @include('layouts.messages')
    @endif
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-building"></i> <strong>{{trans('words.pg.stores')}}</strong></h3>
        </div>
        <div class="box-body">
            <table id="storesTable" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th class="col-sm-2">{{trans('words.lb.image')}}</th>
                    <th class="col-sm-7">{{trans('words.lb.name')}}</th>
                    <th class="col-sm-3 text-center">{{trans('words.lb.actions')}} </th>
                </tr>
                </thead>
                <tbody>
                @foreach($stores as $store)
                    <tr>
                        <td class="text-center">
                            <img src="{{$store->path_image}}" width="50px" alt="{{$store->name}}" title="{{$store->name}}">
                        </td>
                        <td>{{$store->name}}</td>
                        <td class="text-center">
                            <form method="post" action="{{route('stores.destroy', $store->id)}}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button onclick="StoreOffers({{$store->id}});" type="button" class="btn btn-sm btn-default">
                                    <i class="fa fa-eye"></i> {{trans('words.bt.offers.show')}}
                                </button>
                                <a href="{{route('stores.edit', $store->id)}}" type="button" class="btn btn-sm btn-primary">
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

    <div class="modal fade" id="listProducts" tabindex="-1" role="dialog" aria-labelledby="listProductsLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="listProductsLabel"><i class="fa fa-cubes"></i> <strong id="storeName"></strong></h4>
                </div>

                <table class="modal-body table table-responsive table-striped table-bordered" style="margin-bottom: -1px">
                    <thead>
                    <tr>
                        <th class="col-md-2 text-center">Imagem</th>
                        <th class="col-md-10">Nome do Produto</th>
                    </tr>
                    </thead>
                    <tbody class="table" id="products">
                    </tbody>
                </table>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/v/bs/dt-1.10.13/datatables.min.css">
@endsection

@section('js')
    <script src="//cdn.datatables.net/v/bs/dt-1.10.13/datatables.min.js"></script>
    <script src="{{ asset('/js/pages-scripts/stores-index.js') }}"></script>
@endsection