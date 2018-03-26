@extends('adminlte::page')

@section('title', 'Caçula Admin')

@section('content_header')
    <a href="{{route('products.index')}}" class="btn btn-primary"><i class="fa fa-angle-left"></i> {{trans('words.bt.products.list')}}</a>
@endsection


@section('content')
    <div class="box">
        <form method="post" action="{{route('products.store')}}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type='file' id="primaryImage" name="primaryImage" accept="image/*" class="hidden" />
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-shopping-bag"></i> <strong>{{trans('words.pg.products.create')}}</strong></h3>
            </div>
            <div class="box-body">
                <div class="col-md-4 no-padding">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="name">{{trans('words.lb.primaryimage')}}</label>
                            <div class="panel panel-default">
                                <div class="panel-body" style="min-height: 323px">
                                    <a href="#" onclick="openFile();">
                                        <img id="image" style="max-width: 100%;max-height: 293px" src="/api-web-cacula/public/images/products/placeholder300x300.jpg" class="img-responsive center-block">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-8 no-padding">
                    <div class="col-md-12">
                        <div class="col-md-6">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">{{trans('words.lb.name')}}</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="code">{{trans('words.lb.code')}}</label>
                                    <input type="text" class="form-control" id="code" name="code" maxlength="13" required>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="info">{{trans('words.lb.barcode')}}</label>
                                    <input type="text" class="form-control" id="barcode" name="barcode" maxlength="13" required>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="price">{{trans('words.lb.price')}}</label>
                                    <input type="text" class="form-control" id="price" name="price" maxlength="7" required>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="installment">{{trans('words.lb.installment')}}</label>
                                    <input placeholder="Ex: 3" type="text" class="form-control" id="installment" name="installment" maxlength="2" required>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="modeofuse">{{trans('words.lb.modeofuse')}}</label>
                                    <input type="text" class="form-control" id="modeofuse" name="modeofuse" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="info">{{trans('words.lb.info')}}</label>
                                    <input type="text" class="form-control" id="info" name="info" required>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="points">{{trans('words.lb.points.rescue')}}</label>
                                    <input type="number" class="form-control" id="points" name="points" required>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="gallery">{{trans('words.lb.images')}}</label>
                                    <input type="file" name="gallery[]" id="gallery" accept="image/*" class="form-control" multiple>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="brand_id">{{trans('words.lb.brand')}}</label>
                                    <select class="select form-control" id="brand_id" name="brand_id" required>
                                        @foreach($brands as $brand)
                                            <option value="{{$brand->id}}">{{$brand->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="group_id">{{trans('words.lb.groups')}}</label>
                                    <select class="select2 form-control" id="group_id" name="group_id[]" multiple required>
                                        @foreach($groups as $group)
                                            <option value="{{$group->id}}">{{$group->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="tag_id">{{trans('words.lb.tags')}}</label>
                                    <select class="select2 form-control" id="tag_id" name="tag_id[]" multiple required>
                                        @foreach($tags as $tag)
                                            <option value="{{$tag->id}}">{{$tag->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="box-footer">
                <div class="col-md-4 col-md-offset-4">
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
    <script src="/js/select2.multi-checkboxes.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"></script>
    <script src="{{ asset('/js/pages-scripts/products-form.js') }}"></script>
@endsection