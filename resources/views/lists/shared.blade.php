<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="http://cacula.sixcreative.tk/images/icone.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
    <meta property="og:title" content="{{ $lista->name }} | Caçula" />
    <meta property="og:description" content="Esta é minha lista criada no App da Caçula!" />
    <meta property="og:type" content="product" />
    <meta property="og:url" content="{{ route('share.list', $lista->token) }}" />
    <meta property="og:image" content="{{ asset('images/logo2.png') }}" />
    <title>{{ $lista->name }} | Caçula</title>
</head>
<body>

<div class="container">
    <main role="main">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2 col-md-12 col-md-offset-0">
                <div class="text-center" style="margin-top: 20px;">
                    <img src="{{ asset('images/logo2.png') }}" alt="Logo Caçula">
                </div>
                <div class="panel panel-default" style="margin-top: 20px;">
                    <div class="panel-heading text-center">
                        <h3><strong>{{ $lista->name }}</strong></h3>
                    </div>
                        <table class="table table-hover panel-body">
                            <thead>
                            <tr>
                                <th class="col-sm-9 col-xs-12" colspan="2" style="border-bottom: 1px solid #ddd">{{trans('words.lb.product')}}</th>
                                <th class="col-sm-3 hidden-xs" style="border-bottom: 1px solid #ddd">{{trans('words.lb.brand')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($lista->products as $product)
                                <tr>
                                    <td class="text-center">
                                        <img src="{{ $product->path_image }}" width="50px" alt="{{$product->name}}" title="{{$product->name}}">
                                    </td>
                                    <td style="vertical-align: middle;">{{$product->name}}</td>
                                    <td class="hidden-xs" style="vertical-align: middle;">{{$product->brand->name}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    <div class="panel-footer text-center">
                        <i>Lista criada por: <strong>{{ $lista->users->first() ? $lista->users->first()->name : 'Caçula' }}</strong></i>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h2 class="text-center"><strong>Faça o Download do Nosso App!</strong></h2>
                        <br>
                        <div class="col-sm-8 col-sm-offset-2" style="margin-bottom: 20px">
                            <div class="col-sm-6 text-center form-group">
                                <a href="#">
                                    <img class="img-responsive center-block" src="{{ asset('images/android.png') }}" alt="Download Android">
                                </a>
                            </div>
                            <div class="col-sm-6 text-center form-group">
                                <a href="#">
                                    <img class="img-responsive center-block" src="{{ asset('images/ios.png') }}" alt="Download IOS">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
            </div>
        </div>
    </main>
</div>

</body>
</html>