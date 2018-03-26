@extends('adminlte::page')

@section('title', 'Caçula Admin')

@section('content_header')
    <a href="{{route('banners.index')}}" class="btn btn-primary"><i class="fa fa-angle-left"></i> {{trans('words.bt.banners.list')}}</a>
@endsection

@section('content')
    @if(Session::get('message'))
        @include('layouts.messages')
    @endif
    <div class="box">
        <form method="post" action="{{route('banners.update', $banner->id)}}" enctype="multipart/form-data" onsubmit="return checkCoords();">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <input type="hidden" id="x" name="x" />
            <input type="hidden" id="y" name="y" />
            <input type="hidden" id="w" name="w" />
            <input type="hidden" id="h" name="h" />
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-image"></i> <strong>{{trans('words.pg.banners.edit')}}</strong></h3>
            </div>
            <div class="box-body">
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="name">{{trans('words.lb.name')}}</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $banner->name }}" required>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="type">{{trans('words.lb.type')}}</label>
                        <select class="form-control" id="type" name="type" required>
                            <option value="Catalog" {{ $banner->type == "Catalog" ? 'selected' : null }}>Catalog</option>
                            <option value="Offer" {{ $banner->type == "Offer" ? 'selected' : null }}>Offer</option>
                        </select>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="status">{{trans('words.lb.status')}}</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="0" {{ $banner->status == "0" ? 'selected' : null }}>Disabled</option>
                            <option value="1" {{ $banner->status == "1" ? 'selected' : null }}>Enabled</option>
                        </select>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="image">{{trans('words.lb.image')}}</label>
                        <input type="file" name="image" id="image" accept="image/*" class="form-control">
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

    <div class="box box-solid">
        <div class="box-body">
            <h4 class="text-primary">
                <i class="fa fa-info-circle"></i>
                <i> O tamanho recomendado para imagens do tipo <strong>Catalog</strong> é <strong>300x450</strong>,
                    e para imagens do tipo <strong>Offer</strong> é <strong>1080x1920</strong>.
                </i>
            </h4>
        </div>
    </div>

    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-crop"></i> <strong>Selecione Corte da Imagem</strong></h3>
        </div>
        <div class="box-body" style="text-align: -webkit-center;">
            <img src="{{ $banner->path }}" id="cropbox" />
        </div>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-jcrop/2.0.4/css/Jcrop.min.css" />
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-jcrop/2.0.4/js/Jcrop.min.js"></script>
    <script src="{{ asset('/js/pages-scripts/banners-form.js') }}"></script>
@endsection