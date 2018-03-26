@extends('adminlte::page')

@section('title', 'Caçula Admin')

@section('content_header')
    <a href="{{route('stores.index')}}" class="btn btn-primary"><i class="fa fa-angle-left"></i> {{trans('words.bt.stores.list')}}</a>
@endsection


@section('content')
    @if(Session::get('message'))
        @include('layouts.messages')
    @endif
    <div class="box">
        <form method="post" action="{{route('stores.store')}}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-building"></i> <strong>{{trans('words.pg.stores.create')}}</strong></h3>
            </div>
            <div class="box-body">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="name">{{trans('words.lb.name')}}</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="phone">{{trans('words.lb.phone')}}</label>
                        <input type="text" class="form-control" id="phone" name="phone" required>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="open_on">{{trans('words.lb.open')}}</label>
                        <input type="time" class="form-control" id="open_on" name="open_on" required>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="closed_on">{{trans('words.lb.closed')}}</label>
                        <input type="time" class="form-control" id="closed_on" name="closed_on" required>
                    </div>
                </div>
                <div class="col-sm-6">
                    <label for="location">{{trans('words.lb.search')}}</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="location" name="location" required>
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button" onclick="verify()">{{trans('words.bt.verify')}}</button>
                        </span>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="lat">{{trans('words.lb.lat')}}</label>
                        <input type="text" class="form-control" id="lat" name="lat" value="-51.92528" readonly required>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="long">{{trans('words.lb.long')}}</label>
                        <input type="text" class="form-control" id="lng" name="lng" value="-51.92528" readonly required>
                    </div>
                </div>
                <div class="col-sm-6">
                    <label for="address">{{trans('words.lb.address')}}</label>
                    <input type="text" class="form-control" id="address" name="address" value="Brasil" readonly required>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="image">{{trans('words.lb.image')}}</label>
                        <input type="file" name="image" id="image" accept="image/*">
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.13/jquery.mask.min.js"></script>
    <script src="{{ asset('/js/pages-scripts/stores-form.js') }}"></script>
@endsection