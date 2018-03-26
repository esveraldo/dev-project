@extends('adminlte::page')

@section('title', 'Caçula Admin')

@section('content_header')
    <h1><i class="fa fa-dashboard"></i> {{trans('words.dashboard')}}</h1>
@endsection

@section('content')

    <div class="row">
        @can('marketing_access')
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="ion ion-person"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Usuários</span>
                        <span class="info-box-number">{{ $numUsuarios }}<small></small></span>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-red"><i class="ion ion-ios-list"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Listas</span>
                        <span class="info-box-number">{{ $numListas }}</span>
                    </div>
                </div>
            </div>
        @endcan

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        @can('sales_access')
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Produtos</span>
                        <span class="info-box-number">{{ $numProdutos }}</span>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-yellow"><i class="ion ion-bag"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Ofertas</span>
                        <span class="info-box-number">{{ $numOfertas }}</span>
                    </div>
                </div>
            </div>
        @endcan

    </div>

    <div class="row">
        <div class="col-md-3">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-mobile"></i> <strong>Usuários por Plataforma</strong></h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    {!! $donutAppUsers->render() !!}
                </div>
            </div>
        </div>

        <div class="col-md-9">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-mobile"></i> <strong>Número de Usuários</strong></h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    {!! $chart->render() !!}
                </div>
            </div>
        </div>
    </div>


@endsection

@section('js')

    @endsection