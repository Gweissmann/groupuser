@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="text-align-vertical">
                            <i class=" material-icons md-36"> assignment </i>
                            <label class="text-padding">Relátorio do Usuário - ({{date('d-m-Y', strtotime($start_date))}} / {{date('d-m-Y', strtotime($end_date))}})</label></br>
                        </div>
                        <div class="text-align-vertical">
                            <label class="text-padding"></label>
                        </div>
                        <div class="btn-padding">
                            <a class="btn btn-sm btn-danger" href="{{route('reports.index')}}">Voltar</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-10 col-md-offset-1">
                @foreach($stations as $station)
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div>
                                <label class="text-info"><h3>{{$station->title}}</h3></label>
                            </div>
                            <div >
                                <label class="text-padding"><h4>{{$station->line->title}}</h4></label>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nome</th>
                                        <th>Código de Barras</th>
                                        <th>De</th>
                                        <th>Até</th>
                                        <th>Autorizado</th>
                                        <th>Testado</th>
                                        <th>Ultima Leitura</th>
                                    </tr>
                                    </thead>
                                    @foreach($station_accessusers as $station_accessuser )
                                        @foreach($datas as $data)
                                            @if($station_accessuser->station_id == $station->id and $station_accessuser->access_user_id == $data->access_user->id)
                                                <tbody>
                                                <tr>
                                                    <td>{{$data->access_user->id}}</td>
                                                    <td>{{$data->access_user->name}}</td>
                                                    <td>{{$data->access_user->barcode}}</td>
                                                    <td>{{date('d-m-Y', strtotime($station_accessuser->start_date_station))}}</td>
                                                    <td>{{date('d-m-Y', strtotime($station_accessuser->end_date_station))}}</td>
                                                    <td><i class="material-icons">{{$data->licensed == 1 ?  'check_circle' : 'block'}}</i></td>
                                                    <td><i class="material-icons">{{$data->tested == 1 ?  'check_circle' : 'block'}}</i></td>
                                                    <td>{{date('d-m-Y ', strtotime($data->check_date))}}</td>
                                                </tr>
                                                </tbody>
                                            @endif
                                        @endforeach
                                    @endforeach
                                </table>
                            </div>
                            <label class="asm-float-right"> Posto de teste: <i class="material-icons">{{$station->test == 1 ?  'check_circle' : 'block'}}</i> {{date('d-m-Y H:i', strtotime($station->updated_at))}}</label>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@stop
