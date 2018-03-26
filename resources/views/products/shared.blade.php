<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="http://cacula.sixcreative.tk/images/icone.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
    <meta property="og:title" content="{{ $product->name }} | Caçula" />
    <meta property="og:description" content="Dá só uma olhada nesse produto da Caçula!" />
    <meta property="og:type" content="product" />
    <meta property="og:url" content="{{ route('share.product', $product->id) }}" />
    <meta property="og:image" content="{{ $product->path_image }}" />
    <title>{{ $product->name }} | Caçula</title>
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
                    <table class="table panel-body">
                        <tbody>
                        <tr>
                            <td>
                                <div class="col-sm-4 text-center">
                                    <img class="img-responsive center-block" src="{{ $product->path_image }}" alt="{{$product->name}}" title="{{$product->name}}">
                                </div>
                                <div class="col-sm-8">
                                    <h3>{{ $product->name }}</h3>
                                    <h2 style="margin-top: 5px"><strong>R$ {{ $product->price }}</strong></h2>
                                    <table class="table table-striped">
                                        <tbody>
                                        <tr>
                                            <td><i><strong>Código</strong>: {{ $product->code }}</i></td>
                                        </tr>
                                        <tr>
                                            <td><i><strong>Marca</strong>: {{ $product->brand->name }}</i></td>
                                        </tr>
                                        <tr>
                                            <td><i><strong>Informações</strong>: {{ $product->info }}</i></td>
                                        </tr>
                                        <tr>
                                            <td><i><strong>Modo de Uso</strong>: {{ $product->modeofuse }}</i></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
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
            </div>
        </div>
    </main>
</div>

</body>
</html>