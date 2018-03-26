@extends('adminlte::page')

@section('title', 'Caçula Admin')

@section('content_header')
    <a href="{{route('campaigns.create')}}" style="display:inline-block" class="btn btn-primary"><i class="fa fa-plus"></i> {{trans('words.bt.campaigns.create')}}</a>
@endsection

@section('content')
    @if(Session::get('message'))
        @include('layouts.messages')
    @endif

    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-flag"></i> <strong>{{ trans('words.pg.campaigns') }}</strong></h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse">
                    <i class="fa fa-minus"></i>
                </button>
            </div>
        </div>

        <div class="box-body">
            <table id="campaignsTable" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <td>Pesquisar:
                            <form method="post" action="{!! url('/campaigns/show-user') !!}">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="text" name="email">
                                <input type="submit" value="Search" />
                            </form>
                        </td>
                    </tr>
                <tr>
                    <th class="col-sm-4">{{trans('words.lb.name')}}</th>
                    <th class="col-sm-5">{{trans('words.lb.description')}}</th>
                    <th class="col-sm-3 text-center">{{trans('words.lb.actions')}} </th>
                </tr>
                </thead>
                <tbody>
                @foreach($campaigns as $campaign)
                    <tr>
                        <td>
                            {{ $campaign->name }}
                        </td>
                        <td>
                            {{ $campaign->description }}
                        </td>
                        <td class="text-center">
                            <form method="post" action="{{ route('campaigns.destroy', $campaign->id) }}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <a href="{{route('campaigns.show', $campaign->id)}}" type="button" class="btn btn-sm btn-primary">
                                    <i class="fa fa-eye"></i> {{trans('words.bt.show')}}
                                </a>

                                <a href="{{route('campaigns.edit', $campaign->id)}}" type="button" class="btn btn-sm btn-primary">
                                    <i class="fa fa-pencil"></i> {{trans('words.bt.edit')}}
                                </a>

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

@endsection

@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/v/bs/dt-1.10.13/datatables.min.css">
@endsection

@section('js')
    <script src="//cdn.datatables.net/v/bs/dt-1.10.13/datatables.min.js"></script>
    <script src="{{ asset('/js/pages-scripts/campaigns-index.js') }}"></script>
@endsection