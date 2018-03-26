@extends('adminlte::page')

@section('title', 'Caçula Admin')

@section('content_header')

@endsection

@section('content')
    @if(Session::get('message'))
        @include('layouts.messages')
    @endif
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-bolt"></i> <strong>{{trans('words.pg.about')}}</strong></h3>
        </div>

        <div class="box-body">
            <form method="post" action="{{route('about.update', 2)}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="name">{{ trans('words.lb.name') }}</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ $about->title }}" required readonly="readonly">
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="info">{{ trans('words.lb.content') }}</label>
                        <textarea rows="6" class="form-control" id="content" name="content" required>
                            {{ $about->content }}
                        </textarea>
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
    </div>
@endsection

@section('css')

@endsection

@push('js')

@endpush