@extends('adminlte::page')

@section('title', 'Caçula Admin')

@section('content_header')
    <a href="{{route('products.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> {{trans('words.bt.products.create')}}</a>
@endsection

@section('content')
    @if(Session::get('message'))
        @include('layouts.messages')
    @endif
    @include('layouts.products-filters')

    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-shopping-bag"></i> <strong>{{trans('words.pg.products')}}</strong></h3>
        </div>
        <div class="box-body">
            <table id="productsTable" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th class="col-sm-1 text-center">{{trans('words.lb.image')}}</th>
                    <th class="col-sm-7">{{trans('words.lb.name')}}</th>
                    <th class="col-sm-1">{{trans('words.lb.brand')}}</th>
                    <th class="col-sm-1">{{trans('words.lb.price')}}</th>
                    <th class="col-sm-2 text-center">{{trans('words.lb.actions')}} </th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <td class="text-center">
                            <img src="{{ $product->path_image }}" width="50px" alt="{{$product->name}}" title="{{$product->name}}">
                        </td>
                        <td style="vertical-align: middle;">{{$product->name}}</td>
                        <td style="vertical-align: middle;">{{$product->brand->name}}</td>
                        <td style="vertical-align: middle;">R${{$product->price}}</td>
                        <td class="text-center" style="vertical-align: middle;">
                            <form method="post" action="{{route('products.destroy', $product->id)}}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <a href="{{route('products.edit', $product->id)}}" type="button" class="btn btn-sm btn-primary">
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
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/v/bs/dt-1.10.13/datatables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/9.9.0/css/bootstrap-slider.min.css">
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script src="/js/select2.multi-checkboxes.js"></script>
    <script src="//cdn.datatables.net/v/bs/dt-1.10.13/datatables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/9.9.0/bootstrap-slider.min.js"></script>
    <script src="{{ asset('/js/pages-scripts/products-index.js') }}"></script>
@endsection