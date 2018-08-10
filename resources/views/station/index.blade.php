@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="text-align-vertical">
                            <i class=" material-icons md-36"> folder_shared </i>
                            <label class="text-padding">Cadastrar Novo Posto</label>
                        </div>
                        <div class="btn-padding">
                            <a class="btn btn-sm btn-primary" href="{{route('station.create')}}">Adicionar</a>
                            <a class="btn btn-sm btn-danger" href="{{route('home')}}">Voltar</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default asm-table">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Título</th>
                                    <th>Linha</th>
                                    <th>Crítico</th>
                                    <th>Teste</th>
                                    <th></th>
                                </tr>
                                </thead>
                                @foreach($stations as $station)
                                    <tbody>
                                    <tr>
                                        <td>{{$station->id}}</td>
                                        <td>{{$station->title}}</td>
                                        <td>{{$station->line->title}}</td>
                                        <td>
                                            <i class="material-icons">{{$station->critical ?  'check_circle' : 'block'}}</i>
                                        </td>
                                        <td>
                                            <i class="material-icons">{{$station->test ?  'check_circle' : 'block'}}</i>
                                        </td>
                                        <td>
                                            <div class="form--inline">
                                                <a class="btn btn-sm btn-primary"
                                                   href="{{route('station.edit',$station->id)}}"><i
                                                            class=" material-icons md-18"> edit </i></a>
                                            </div>
                                            <div class="form--inline">
                                                <a class="btn btn-sm btn-warning" data-toggle="modal"
                                                   data-target="#add_users_{{$station->id}}"><i
                                                            class=" material-icons md-18"> add </i></a>
                                            </div>
                                            <div class="form--inline">
                                                <button class="btn btn-sm btn-info" data-toggle="modal"
                                                        data-target="#view_users_{{$station->id}}"><i
                                                            class=" material-icons md-18"> open_in_new </i></button>
                                            </div>
                                            <div class="form--inline">
                                                <form action="{{route('station.destroy',$station->id)}}" method="post">
                                                    <input type="hidden" name="_method" value="delete">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <button type="submit" id="delete-{{$station->id}}"
                                                            class="btn btn-sm btn-danger"
                                                            onclick="return confirm('Tem certeza que deseja excluir este registro?');"
                                                            name="name" value="delete"><i class="material-icons md-18">delete</i>
                                                    </button>
                                                    {{--<div class="mdl-tooltip" data-mdl-for="delete-{{$access_user->id}}">Deletar</div>--}}
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
                <div class="asm-card">
                    @foreach($stations as $station)
                        <div class="panel panel-default">
                            <div class="panel-body ">
                                <div class="container-fluid">
                                    <div class="">
                                        <label class="">ID: </label>
                                        <label class="">{{$station->id}}</label>
                                    </div>
                                    <div class="">
                                        <label class="">Título: </label>
                                        <label class="">{{$station->title}}</label>
                                    </div>
                                    <div class="">
                                        <label class="">Linha: </label>
                                        <label class="">{{$station->line->title}}</label>
                                    </div>
                                    <div class="">
                                        <label class="">Crítico: </label>
                                        <label class=""><i class="material-icons">{{$station->critical ?  'check_circle' : 'block'}}</i></label>
                                    </div>
                                    <div class="">
                                        <label class="">Teste: </label>
                                        <label class=""><i class="material-icons">{{$station->test ?  'check_circle' : 'block'}}</i></label>
                                    </div>
                                    <div class="">
                                        <div class="form-horizontal asm-inline">
                                            <a class="btn btn-sm btn-primary"
                                               href="{{route('station.edit',$station->id)}}"><i
                                                        class=" material-icons md-18"> edit </i></a>
                                        </div>
                                        <div class="form-horizontal asm-inline">
                                            <a class="btn btn-sm btn-warning" data-toggle="modal"
                                               data-target="#add_users_{{$station->id}}"><i
                                                        class=" material-icons md-18"> add </i></a>
                                        </div>
                                        <div class="form-horizontal asm-inline">
                                            <button class="btn btn-sm btn-info" data-toggle="modal"
                                                    data-target="#view_users_{{$station->id}}"><i
                                                        class=" material-icons md-18"> open_in_new </i></button>
                                        </div>
                                        <div class="form-horizontal asm-inline">
                                            <form action="{{route('station.destroy',$station->id)}}" method="post">
                                                <input type="hidden" name="_method" value="delete">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <button type="submit" id="delete-{{$station->id}}"
                                                        class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Tem certeza que deseja excluir este registro?');"
                                                        name="name" value="delete"><i
                                                            class="material-icons md-18">delete</i>
                                                </button>
                                                {{--<div class="mdl-tooltip" data-mdl-for="delete-{{$access_user->id}}">Deletar</div>--}}
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <?php echo $stations->render(); ?>
            </div>
            <!-- Modal add users -->
            @foreach($stations as $station)
                <div id="add_users_{{$station->id}}" class="modal fade" role="dialog">
                    <div class=" container modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Adicionar usuário no posto</h4>
                            </div>
                            <div class="modal-body">
                                <form class="form-horizontal" method="POST" id="add_userstation_{{$station->id}}"
                                      name="add_userstation"
                                      action="{{ route('station.adduser') }}">
                                    {{ csrf_field() }}
                                    <input name="station_id" type="hidden" value="{{$station->id}}">

                                    <div class="form-group{{ $errors->has('access_user_id') ? ' has-error' : '' }}">
                                        <label for="user_id" class="col-md-4 control-label">Usuários</label>
                                        <div class="col-md-6">
                                            <select class="form-control" id="access_user_id" name="access_user_id">
                                                <option>Escolha um usuário</option>
                                                @foreach($users as $user)
                                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group{{ $errors->has('end_date') ? ' has-error' : '' }}">
                                        <label for="start_date_station" class="col-md-4 control-label">Válido de</label>
                                        <div class="col-md-6">
                                            <div class="input-append" data-date-format="dd-mm-yyyy" data-date-locale="pt-BR">
                                                <input class="form-control datepicker" type="text" name="start_date_station" value="{{ old('start_date_station') }}" autocomplete="off">
                                                <span class="add-on"><i class="icon-th"></i></span>
                                                @if ($errors->has('start_date_station'))
                                                    <span class="help-block">
                                                 <strong>{{ $errors->first('start_date_station') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group{{ $errors->has('end_date_station') ? ' has-error' : '' }}">
                                        <label for="end_date_station" class="col-md-4 control-label">Até</label>
                                        <div class="col-md-6">
                                            <div class="input-append" data-date-format="dd-mm-yyyy">
                                                <input class="form-control datepicker" type="text" name="end_date_station" value="{{ old('end_date_station') }}" autocomplete="off">
                                                <span class="add-on"><i class="icon-th"></i></span>
                                                @if ($errors->has('end_date_station'))
                                                    <span class="help-block">
                                                 <strong>{{ $errors->first('end_date_station') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" form="add_userstation_{{$station->id}}" class="btn btn-primary">
                                    Salvar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal view users -->
                <div id="view_users_{{$station->id}}" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Usuários cadastrados</h4>
                            </div>
                            <div class="modal-body">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nome</th>
                                            <th>Cód. Barras</th>
                                            <th>Data Posto Ini.</th>
                                            <th>Data Posto Fin.</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($station->station_accessuser as $stationuser)
                                            <tr>
                                                <td>{{$stationuser->access_user->id}}</td>
                                                <td>{{$stationuser->access_user->name}}</td>
                                                <td>{{$stationuser->access_user->barcode}}</td>
                                                <td>{{date('d-m-Y', strtotime($stationuser->start_date_station))}}</td>
                                                <td>{{date('d-m-Y', strtotime($stationuser->end_date_station))}}</td>
                                                <td>
                                                    <form action="{{route('station.destroyuser')}}" method="post">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                        <input type="hidden" name="stationuser_id"
                                                               value="{{$stationuser->id}}">
                                                        <button type="submit"
                                                                id="delete-{{$stationuser->access_user->id}}"
                                                                class="btn btn-sm btn-danger"
                                                                onclick="return confirm('Tem certeza que deseja excluir este registro?');"
                                                                name="name" value="delete"><i
                                                                    class="material-icons md-18">delete</i>
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
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@stop
