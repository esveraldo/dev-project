@extends('adminlte::page')

@section('title', 'Caçula Admin')

@section('content_header')
    <a href="{{route('groups.index')}}" class="btn btn-primary"><i class="fa fa-angle-left"></i> {{trans('words.bt.groups.list')}}</a>
@endsection


@section('content')
    <div class="box">
        <form method="post" action="{{route('groups.store')}}">
            {{ csrf_field() }}
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-object-group"></i> <strong>{{trans('words.pg.groups.create')}}</strong></h3>
            </div>
            <div class="box-body">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="name">{{trans('words.lb.group')}}</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="category_id">{{trans('words.lb.category')}}</label>
                        <select class="select2 form-control" id="category_id" name="category_id" required>
                            <option value=""></option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="status">{{trans('words.lb.status')}}</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="0">Disabled</option>
                            <option value="1" selected>Enabled</option>
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
    <script src="{{ asset('/js/pages-scripts/general-select2.js') }}"></script>
@endsection