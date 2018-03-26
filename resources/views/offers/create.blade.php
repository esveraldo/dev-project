@extends('adminlte::page')

@section('title', 'Caçula Admin')

@section('content_header')
    <a href="{{route('offers.index')}}" class="btn btn-primary"><i class="fa fa-angle-left"></i> {{trans('words.bt.offers.list')}}</a>
@endsection


@section('content')
    @if(Session::get('message'))
        @include('layouts.messages')
    @endif
    <div class="box">
        <form method="post" action="{{route('offers.store')}}">
            {{ csrf_field() }}
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-gift"></i> <strong>{{trans('words.pg.offers.create')}}</strong></h3>
            </div>
            <div class="box-body">
                <div class="col-sm-12">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="product_id">{{trans('words.lb.product')}}</label>
                            <select onchange="mostraParcelamentoAtualDoProduto()" class="select2 form-control" id="product_id" name="product_id" required>
                                <option value=""></option>
                                @foreach($products as $product)
                                    <option value="{{$product->id}}" data-content="{{ $product->installment }}" data-placement="{{ $product->price }}">{{$product->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="price_product">{{trans('words.lb.price.product')}}</label>
                            <input type="text" class="form-control" id="price_product" disabled>
                        </div>
                    </div>

                    {{--<div class="col-md-2">--}}
                        {{--<div class="form-group">--}}
                            {{--<label for="installment">{{trans('words.lb.installment')}}</label>--}}
                            {{--<input type="text" class="form-control" id="installment" name="installment" maxlength="2" required>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="type">{{trans('words.lb.type')}}</label>
                            <select class="select2 form-control" id="type" name="type" required>
                                <option value=""></option>
                                <option value="Varejo">Varejo</option>
                                <option value="Atacado">Atacado</option>
                                <option value="Multi-Atacado">Multi-Atacado</option>
                                <option value="Master">Master</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="start_at">Começa em:</label>
                            <input type="datetime-local" class="form-control" id="start_at" name="start_at" required>
                        </div>
                    </div>

                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="expire_at">{{trans('words.lb.expire_at')}}</label>
                            <input type="datetime-local" class="form-control" id="expire_at" name="expire_at" required>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    {{--<div class="col-sm-3">--}}
                        {{--<div class="form-group">--}}
                            {{--<label for="info">{{trans('words.lb.info')}}</label>--}}
                            {{--<input type="text" class="form-control" id="info" name="info" required>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    <!--PETERSON 22/02/2018- Comentaram esta input da info de cima, coloquei uma hidden com name info para não dar erro. -->
                    <input type="hidden" name="info" value="''">

                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="rescue_point">{{trans('words.lb.rescue')}}</label>
                            <input type="number" class="form-control" id="rescue_point" name="rescue_point" required>
                        </div>
                    </div>

                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="point_to_win">Pontos Para Resgastar</label>
                            <input type="number" class="form-control" id="point_to_win" name="point_to_win" required>
                        </div>
                    </div>

                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="price">{{trans('words.lb.price.offer')}}</label>
                            <input type="text" class="form-control" id="price" name="price" maxlength="7" required>
                        </div>
                    </div>

                    <div class="col-sm-1">
                        <div class="form-group">
                            <label for="installment">{{trans('words.lb.installment')}}</label>
                            <input type="number" class="form-control" id="installment" name="installment" oninput="maxLengthCheck(this)" min="1" max="99" maxlength="2" required>
                        </div>
                    </div>

                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="unit">{{trans('words.lb.unit')}}</label>
                            <input type="number" min="1" class="form-control" id="unit" name="unit" required>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="status">{{trans('words.lb.status')}}</label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="0">Disabled</option>
                                <option value="1" selected>Enabled</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="profile_id">{{ trans('words.pg.campaigns') }}</label>
                        <select class="select2 form-control" id="profile_id" name="profile_id[]" multiple required>
                            @foreach($profiles as $profile)
                                <option value="{{$profile->id}}">{{$profile->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="store_id">{{trans('words.lb.stores')}}</label>
                        <select class="select2 form-control" id="store_id" name="store_id[]" multiple required>
                            @foreach($stores as $store)
                                <option value="{{$store->id}}">{{$store->name}}</option>
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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"></script>
    <script src="{{ asset('/js/pages-scripts/offers-form.js') }}"></script>
@endsection