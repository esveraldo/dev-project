@extends('adminlte::page')

@section('title', 'Caçula Admin')

@section('content_header')
    <a href="{{route('encartes.index')}}" class="btn btn-primary"><i class="fa fa-angle-left"></i> Voltar para lista de Encartes</a>
@endsection

@section('content')
    @if(Session::get('message'))
        @include('layouts.messages')
    @endif
    <div class="box">
        <form method="post" action="{{route('encartes.update', $encarte->id)}}">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-gift"></i> <strong>Editar Encarte</strong></h3>
            </div>
            <div class="box-body">
                <div class="box-body">
                    <div class="col-sm-12">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="product_id">{{trans('words.lb.name')}}</label>
                                <select disabled class="select2 form-control" id="product_id" name="product_id_mostra" required>
                                    <option value=""></option>
                                    @foreach($products as $product)
                                        <option value="{{$product->id}}" {{$encarte->product_id == $product->id ? 'selected' : null}}>{{$product->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!--PETERSON 22/02/2018 - Coloquei o hidden de baixo, porque não tinha como ler o select com disabled -->
                        <input type="hidden" name="product_id" value="{{$encarte->product_id}}">

                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="type">{{trans('words.lb.type')}}</label>
                                <select class="select2 form-control" id="type" name="type" required>
                                    <option value=""></option>
                                    <option value="Varejo" {{$encarte->type == 'Varejo' ? 'selected' : null}}>Varejo</option>
                                    <option value="Atacado" {{$encarte->type == 'Atacado' ? 'selected' : null}}>Atacado</option>
                                    <option value="Multi-Atacado" {{$encarte->type == 'Multi-Atacado' ? 'selected' : null}}>Multi-Atacado</option>
                                    <option value="Master" {{$encarte->type == 'Master' ? 'selected' : null}}>Master</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="price">{{trans('words.lb.price.product')}}</label>
                                <input disabled type="text" class="form-control" id="price" name="price" maxlength="7" required value="{{$encarte->product->price}}">
                            </div>
                        </div>

                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="start_at">Começa em:</label>
                                <input type="text" class="form-control" value="{{ date('d/m/Y H:i', strtotime($encarte->start_at)) }}"  id="start_at" name="start_at" disabled>
                            </div>
                        </div>

                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="expire_at">{{trans('words.lb.expire_at')}}</label>
                                <input type="text" class="form-control" value="{{ date('d/m/Y H:i', strtotime($encarte->expire_at)) }}" id="expire_at" name="expire_at" disabled>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <!--PETERSON 22/02/2018- Comentaram esta input da info de cima, coloquei uma hidden com name info para não dar erro. -->
                        <input type="hidden" name="info" value="''">

                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="rescue_point">{{trans('words.lb.rescue')}}</label>
                                <input type="number" class="form-control" id="rescue_point" name="rescue_point" required value="{{$encarte->rescue_point}}">
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="price">Preço do Encarte</label>
                                <input type="text" class="form-control" id="price" name="price" maxlength="7" required value="{{$encarte->price}}">
                            </div>
                        </div>

                        <div class="col-md-1">
                            <div class="form-group">
                                <label for="installment">{{trans('words.lb.installment')}}</label>
                                <input type="number" class="form-control" id="installment" value="{{ $encarte->installment }}" name="installment" oninput="maxLengthCheck(this)" min="1" max="99" maxlength="2" required>
                            </div>
                        </div>

                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="unit">{{trans('words.lb.unit')}}</label>
                                <input type="number" min="1" class="form-control" id="unit" name="unit" required value="{{$encarte->unit}}">
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="status">{{trans('words.lb.status')}}</label>
                                <select class="form-control" id="status" name="status" required>
                                    <option value="0" {{$encarte->status == 0 ? 'selected' : null}}>Disabled</option>
                                    <option value="1" {{$encarte->status == 1 ? 'selected' : null}}>Enabled</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="store_id">{{trans('words.lb.stores')}}</label>
                            <select class="select2 form-control" id="store_id" name="store_id[]" multiple required>
                                @foreach($stores as $store)
                                    <option value="{{$store->id}}" {{$encarte->stores()->where('store_id', '=', $store->id)->count() == 0 ? '' : 'selected'}}>{{$store->name}}</option>
                                @endforeach
                            </select>
                        </div>
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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"></script>
    <script src="{{ asset('/js/pages-scripts/encartes-form.js') }}"></script>
@endsection