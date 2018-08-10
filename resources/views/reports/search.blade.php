@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="text-align-vertical">
                            <i class=" material-icons md-36"> assignment </i>
                            <label class="text-padding">Relátorio do Usuário</label></br>
                        </div>
                        <div class="text-align-vertical">
                            <label class="text-padding">{{date('d-m-Y', strtotime($date))}}</label>
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
                                        <th>Ultima Leitura</th>
                                    </tr>
                                    </thead>
                                    @foreach($station_accessusers as $station_accessuser )
                                        @foreach($datas as $data)
                                            @if($station_accessuser->station_id == $station->id and $station_accessuser->access_user_id == $data->id)
                                                <tbody>
                                                <tr>
                                                    <td>{{$data->id}}</td>
                                                    <td>{{$data->name}}</td>
                                                    <td>{{$data->barcode}}</td>
                                                    <td>{{date('d-m-Y', strtotime($station_accessuser->start_date_station))}}</td>
                                                    <td>{{date('d-m-Y', strtotime($station_accessuser->end_date_station))}}</td>
                                                    <td><i class="material-icons">{{$station_accessuser->licensed == 1 ?  'check_circle' : 'block'}}</i></td>
                                                    <td>{{date('d-m-Y H:i', strtotime($station_accessuser->updated_at))}}</td>
                                                </tr>
                                                </tbody>
                                            @endif
                                        @endforeach
                                    @endforeach
                                </table>
                            </div>
                            <label class="asm-float-right"><h4> Teste: <i class="material-icons">{{$station->test == 1 ?  'check_circle' : 'block'}}</i></h4> {{date('d-m-Y H:i', strtotime($station->updated_at))}}</label>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@stop
