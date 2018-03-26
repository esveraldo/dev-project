@extends('adminlte::page')

@section('title', 'Caçula Admin')

@section('content_header')
<a href="{{route('users.index')}}" class="btn btn-primary"><i class="fa fa-angle-left"></i> {{trans('words.bt.users.list')}}</a>
@endsection

@section('content')
@if(Session::get('message'))
@include('layouts.messages')
@endif
<div class="row">
    <div class="col-sm-12">
        <div class="box">
            <div class="box-body box-profile">
                <table class="table table-responsive table-user"> 
                    <tbody>
                        <tr>
                            <td class="title-table-user-avatar">
                                <img class="profile-user-img img-responsive img-circle" src="{{$user->avatar}}" alt="{{ $user->name }}">
                            </td>
                            <td class="title-table-user"><h3 class="profile-username text-center">{{$user->name}}</h3></td>
                            <td class="title-table-user"><h2 class="profile-username text-center"><strong style="font-size: 27px;">5 Rifas</strong></h2></td>
                        </tr>
                    </tbody>
                    <tr>
                    <table class="table table-responsive table-user">
                        <thead>
                            <tr>
                                <th>Valor recebido até agora no app</th>
                                <th>Plataforma</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>R$ 2.675,00</td>
                                <td>{{$user->platform}}</td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table table-responsive table-user">
                        <thead>
                            <tr>
                                <th>{{trans('words.lb.email')}}</th>
                                <th>{{trans('words.lb.cpf')}}</th>
                                <th>SSN</th>
                                <th>{{trans('words.lb.gender')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$user->email}}</td>
                                <td>{{$user->cpf}}</td>
                                <td>{{$user->ssn}}</td>
                                <td>{{$user->gender == 'M' ? 'Masculino' : ($user->gender == 'F' ? 'Feminino' : 'Não Especificado')}}</td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table table-responsive table-user">
                        <thead>
                            <tr>
                                <th>{{trans('words.lb.address')}}</th>
                                <th>{{trans('words.lb.numero')}}</th>
                                <th>{{trans('words.lb.complement')}}</th>
                                <th>{{trans('words.lb.bairro')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$user->address}}</td>
                                <td>{{$user->number}}</td>
                                <td>{{$user->complement}}</td>
                                <td>{{$user->neighborhood}}</td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table table-responsive table-user">
                        <thead>
                            <tr>
                                <th>{{trans('words.lb.phone')}}</th>
                                <th>{{trans('words.lb.city')}}</th>
                                <th>{{trans('words.lb.state')}}</th>
                                <th>{{trans('words.lb.country')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$user->phone}}</td>
                                <td>{{$user->city}}</td>
                                <td>{{$user->state}}</td>
                                <td>{{$user->country}}</td>
                            </tr>
                        </tbody>
                    </table>
                </table>
                <!--                <div class="col-sm-6 form-group">
                                    <button data-toggle="modal" data-target="#transactionsModal" class="btn btn-primary btn-block"><i class="fa fa-exchange"></i> {{trans('words.bt.users.transactions')}}</button>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <button data-toggle="modal" data-target="#pointsModal" class="btn btn-primary btn-block"><i class="fa fa-cogs"></i> {{trans('words.bt.users.point')}}</button>
                                </div>-->

            </div>
        </div>
    </div>
    <div id="col-sm-12">
        <table class="userTable"></table>
    </div>
    <div class="col-sm-12 col-md-6"><!--/Init box raffle one-->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-list"></i> <strong>{{trans('words.lb.raffles')}} promovidas</strong></h3>
            </div>
            <div class="box-body">
                <table id="usersTableOne" class="table table-bordered table-hover userTable">
                    <thead>
                        <tr>
                            <th class="col-sm-4">{{trans('words.lb.name')}}</th>
                            <!--<th class="col-sm-1">{{trans('words.lb.items')}}</th>-->
                            <th class="col-sm-3">{{trans('words.lb.created')}}</th>
                            <th class="col-sm-3">{{trans('words.lb.updated')}}</th>
                            <th class="col-sm-1 text-center">{{trans('words.lb.actions')}} </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($raffles as $raffle)
                           @if($raffle->type_raffle == '1' and $raffle->user_id == $user->id)
                            <tr>
                                <td>{{$raffle->name}}</td>
                                <td>{{ date("d/m/Y", strtotime($raffle->created_at)) }}
                                    às {{ date("H:m", strtotime($raffle->created_at)) }}</td>
                                <td>{{ date("d/m/Y", strtotime($raffle->updated_at)) }}
                                    às {{ date("H:m", strtotime($raffle->updated_at)) }}</td>
                                <td class="text-center">
                                    <button onclick="UserListProducts({{$raffle->id}});" type="button" class="btn btn-sm btn-primary">
                                        <i class="fa fa-eye"></i> {{trans('words.bt.show')}}
                                    </button>
                                </td>
                            </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div><!--/End box raffle one-->

    <div class="col-sm-12 col-md-6"><!--/Init box raffle two-->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-list"></i> <strong>{{trans('words.lb.raffles')}} participante</strong></h3>
            </div>
            <div class="box-body">
                <table id="usersTableTwo" class="table table-bordered table-hover userTable">
                    <thead>
                        <tr>
                            <th class="col-sm-4">{{trans('words.lb.name')}}</th>
                            <!--<th class="col-sm-1">{{trans('words.lb.items')}}</th>-->
                            <th class="col-sm-3">{{trans('words.lb.created')}}</th>
                            <th class="col-sm-3">{{trans('words.lb.updated')}}</th>
                            <th class="col-sm-1 text-center">{{trans('words.lb.actions')}} </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($raffles as $raffleBox2)
                           @if($raffleBox2->type_raffle == '2' and $raffleBox2->user_id == $user->id)
                                <tr>
                                    <td>{{$raffleBox2->name}}</td>
                                    <td>{{ date("d/m/Y", strtotime($raffleBox2->created_at)) }}
                                        às {{ date("H:m", strtotime($raffleBox2->created_at)) }}</td>
                                    <td>{{ date("d/m/Y", strtotime($raffleBox2->updated_at)) }}
                                        às {{ date("H:m", strtotime($raffleBox2->updated_at)) }}</td>
                                    <td class="text-center">
                                        <button onclick="UserListProducts({{$raffleBox2->id}});" type="button" class="btn btn-sm btn-primary">
                                            <i class="fa fa-eye"></i> {{trans('words.bt.show')}}
                                        </button>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div><!--/End box raffle two-->
</div>

<div class="modal fade" id="listProducts" tabindex="-1" role="dialog" aria-labelledby="listProductsLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="listProductsLabel"><i class="fa fa-cubes"></i> <strong id="listName"></strong></h4>
            </div>

            <table class="modal-body table table-responsive table-striped table-bordered" style="margin-bottom: -1px">
                <thead>
                    <tr>
                        <th class="col-md-2 text-center">Imagem</th>
                        <th class="col-md-10">Nome do Produto</th>
                    </tr>
                </thead>
                <tbody class="table" id="products">
                </tbody>
            </table>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="transactionsModal" tabindex="-1" role="dialog" aria-labelledby="transactionsLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="transactionsLabel"><strong><i class="fa fa-exchange"></i> {{ trans('words.lb.transactions') }}</strong></h4>
            </div>

            <table class="modal-body table table-responsive table-striped table-bordered" style="margin-bottom: -1px">
                <thead>
                    <tr>
                        <th class="col-md-3 text-center">{{ trans('words.lb.date') }}</th>
                        <th class="col-md-1 text-center">{{ trans('words.lb.points') }}</th>
                        <th class="col-md-8">{{ trans('words.lb.description') }}</th>
                    </tr>
                </thead>
                <tbody class="table">
                    @foreach($user->transactions as $transaction)
                    <tr>
                        <td class="text-center">{{ date("d/m/Y H:i", strtotime($transaction->created_at)) }}</td>
                        <td class="text-center">{{ $transaction->points }}</td>
                        <td>{{ $transaction->description }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="pointsModal" tabindex="-1" role="dialog" aria-labelledby="pointsLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('users.points') }}" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="user_id" id="user_id" value="{{ $user->id }}">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="pointsLabel"><strong><i class="fa fa-cogs"></i> {{ trans('words.lb.point.change') }}</strong></h4>
                </div>

                <table class="table modal-body" style="margin-bottom: -1px">
                    <tr>
                        <td>
                            <div class="col-sm-12 no-padding">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for=points>{{trans('words.lb.quantity')}}</label>
                                        <input type="number" min="1" class="form-control" id="points" name="points" required>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="group_id">{{trans('words.lb.transaction')}}</label>
                                        <select class="select2 form-control" id="transaction_type_id" name="transaction_type_id">
                                            @foreach($transactions as $transaction)
                                            <option value="{{$transaction->id}}">{{ $transaction->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> {{trans('words.bt.save')}}</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('css')
<link rel="stylesheet" href="//cdn.datatables.net/v/bs/dt-1.10.13/datatables.min.css">
@endsection

@section('js')
<script src="//cdn.datatables.net/v/bs/dt-1.10.13/datatables.min.js"></script>
<script src="{{ asset('/js/pages-scripts/users-show.js') }}"></script>
@endsection