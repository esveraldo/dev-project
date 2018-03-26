@extends('adminlte::page')

@section('title', 'Caçula Admin')

@section('content_header')
    <a href="{{route('offers.create')}}" style="display:inline-block" class="btn btn-primary"><i class="fa fa-plus"></i> {{trans('words.bt.offers.create')}}</a>
@endsection

@section('content')
    @if(Session::get('message'))
        @include('layouts.messages')
    @endif
    <div class="box">
        <div class="box-header with-border">
            <div class="row">
                <div class="col-sm-9">
                    <h3 class="box-title">
                        <i class="fa fa-gift"></i>
                        <strong>{{trans('words.pg.offers')}}</strong>
                    </h3>
                </div>

                {{--<div class="col-sm-3 pull-right">--}}
                    {{--<div class="form-group">--}}
                        {{--<label for="offerFilter">Busca</label>--}}
                        {{--<input class="form-control" type="text" id="offerFilter" name="offerFilter" placeholder="Busca por loja">--}}
                    {{--</div>--}}
                {{--</div>--}}
            </div>
        </div>

        <div class="box-body">
            <table id="offersTable" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th class="col-sm-1 text-center">{{trans('words.lb.image')}}</th>
                    <th class="col-sm-2">{{trans('words.lb.name')}}</th>
                    <th style="display: none;">{{trans('words.lb.stores')}}</th>
                    <th class="col-sm-1">{{trans('words.lb.perfis')}}</th>
                    <th class="col-sm-1">{{trans('words.lb.stores')}}</th>
                    <th class="col-sm-2">Começa em</th>
                    <th class="col-sm-2">{{ trans('words.lb.expire_at') }}</th>
                    <th class="col-sm-1 text-center">{{trans('words.lb.status')}} </th>
                    <th class="col-sm-2 text-center">{{trans('words.lb.actions')}} </th>
                </tr>
                </thead>
                <tbody>
                @foreach($offers as $offer)
                    <tr>
                        <td class="text-center">
                            <img src="{{$offer->product->path_image}}" width="50px" alt="{{$offer->product->name}}" title="{{$offer->product->name}}">
                        </td>
                        <td>
                            {{ $offer->product->name }}
                        </td>
                        <td style="display: none;">
                            @foreach($offer->stores as $stores)
                                {{ $stores->name }}
                            @endforeach
                        </td>
                        <td>
                            <button type="submit" class="btn btn-sm btn-default" title="
                            Perfis:
                            @foreach($offer->campaigns as $campaigns)
                                {{ $campaigns->name }}
                            @endforeach
                            ">{{ $offer->campaigns->count() }}</button>
                        </td>
                        <td>
                            <button type="submit" class="btn btn-sm btn-default" title="
                            Lojas:
                            @foreach($offer->stores as $stores)
                                {{ $stores->name }}
                            @endforeach
                            ">{{ $offer->stores->count() }}</button>
                        </td>
                        <td> {{ $offer->start_at->diffForHumans() }}</td>
                        <td> {{ $offer->expire_at->diffForHumans() }}</td>
                        <td class="text-center">
                            @if($offer->status == 1)
                                <a href="{{route('offers.status', $offer->id)}}" class="btn btn-sm btn-success" title="">
                                    <i class="fa fa-check"></i> {{trans('words.bt.disable')}}
                                </a>
                            @elseif($offer->status == 0)
                                <a href="{{route('offers.status', $offer->id)}}" class="btn btn-sm btn-default" title="">
                                    <i class="fa fa-ban"></i> {{ trans('words.bt.enable') }}
                                </a>
                            @endif
                        </td>
                        <td class="text-center">
                            <form method="post" action="{{ route('offers.destroy', $offer->id) }}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}

                                <a href="{{route('offers.edit', $offer->id)}}" type="button" class="btn btn-sm btn-primary">
                                    <i class="fa fa-pencil"></i> {{trans('words.bt.edit')}}
                                </a>

                                <button onclick="sendOffer({{$offer->id}});" type="button" class="btn btn-sm btn-info">
                                    <i class="fa fa-envelope"></i> Notificar
                                </button>

                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="fa fa-trash"></i> {{ trans('words.bt.delete') }}
                                </button>
                            </form>
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @include('layouts.modal.send-offer')
@endsection

@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/v/bs/dt-1.10.13/datatables.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
@endsection

@section('js')
<script src="//cdn.datatables.net/v/bs/dt-1.10.13/datatables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script src="{{ asset('/js/pages-scripts/offers-index.js') }}"></script>
@endsection
<style>
    #offersTable_filter > label > input {
        min-width: 160px;
    }
</style>