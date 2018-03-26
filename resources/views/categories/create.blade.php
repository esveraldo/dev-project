@extends('adminlte::page')

@section('title', 'Caçula Admin')

@section('content_header')
    <a href="{{route('categories.index')}}" class="btn btn-primary"><i class="fa fa-angle-left"></i> {{trans('words.bt.categories.list')}}</a>
@endsection


@section('content')
    <div class="box">
        <form method="post" action="{{route('categories.store')}}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type='file' id="primaryImage" name="primaryImage" accept="image/*" class="hidden" />

            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-filter"></i> <strong>{{trans('words.pg.categories.create')}}</strong></h3>
            </div>
            <div class="box-body">

                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="name">{{trans('words.lb.name')}}</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="image">{{trans('words.lb.primaryimage')}}</label>
                        <div class="panel panel-default">
                            <div class="panel-body" style="min-height: 323px">
                                <a href="#" onclick="openFile();">
                                    <img id="image" style="max-width: 100%;max-height: 293px" src="/api-web-cacula/public/images/categories/placeholder300x300.jpg" class="img-responsive center-block">
                                </a>
                            </div>
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

@section('js')
    <script src="{{ asset('/js/pages-scripts/categories-form.js') }}"></script>
@endsection