@extends('adminlte::page')

@section('title', 'Caçula Admin')

@section('content_header')

@endsection

@section('content')
    @if(Session::get('message'))
        @include('layouts.messages')
    @endif

    <div class="col-sm-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-plus"></i> <strong>{{ trans('words.pg.lists.create') }}</strong></h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>

            <div class="box-body">

                <form action="{{ route('lists.store') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="col-sm-12 no-padding">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="group_id">{{trans('words.lb.products')}}</label>
                                <select class="select22 form-control" id="product_id" name="product_id[]" multiple>
                                    @foreach($products as $product)
                                        <option value="{{$product->id}}">{{ $product->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="form-group">
                            <label for="name">{{trans('words.lb.name')}}</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <label for="">&nbsp;</label>
                        <button type="submit" class="btn btn-block btn-success">
                            <i class="fa fa-save"></i> {{trans('words.bt.save')}}
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <div class="col-sm-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-book"></i> <strong>{{ trans('words.pg.lists') }}</strong></h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>

            <div class="box-body">
                <table id="listsTable" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th class="col-sm-5">{{ trans('words.lb.name') }}</th>
                        <th class="col-sm-3">{{ trans('words.lb.creator') }}</th>
                        <th class="col-sm-2 text-center">{{ trans('words.lb.products') }}</th>
                        <th class="col-sm-2 text-center">{{ trans('words.lb.actions') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($lists as $list)
                        <tr>
                            <td>{{ $list->name }}</td>
                            <td>{{ $list->admins()->first()->name }}</td>
                            <td class="text-center">
                                <button type="button" class="btn btn-primary btn-sm" onclick="ListProducts({{$list->id}});">
                                    <span class="fa fa-eye"></span> Visualizar
                                    <span class="badge"> {{ $list->products()->count() }}</span>
                                </button>
                            </td>
                            <td class="text-center">
                                <form method="post" action="{{ route('lists.destroy', $list->id) }}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button onclick="sendList({{$list->id}});" type="button" class="btn btn-sm btn-info">
                                        <i class="fa fa-envelope"></i> {{trans('words.bt.send')}}
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
    </div>

    @include('layouts.modal.show-products-list')
    @include('layouts.modal.send-list')

@endsection

@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script src="/js/select2.multi-checkboxes.js"></script>
    <script src="{{ asset('/js/pages-scripts/lists-index.js') }}"></script>
@endsection