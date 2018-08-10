@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="text-align-vertical">
                            <i class=" material-icons md-36"> account_box </i>
                            <label class="text-padding">Cadastrar Novo Usuário</label>
                        </div>
                        <div class="btn-padding">
                            <a class="btn btn-sm btn-primary" href="{{route('access_user.create')}}">Adicionar</a>
                            <a class="btn btn-sm btn-danger" href="{{route('home')}}">Voltar</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default asm-table">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Nascimento</th>
                                    <th>Código de Barras</th>
                                    {{--<th>Data Inicial</th>--}}
                                    {{--<th>Data Final</th>--}}
                                    <th></th>
                                </tr>
                                </thead>
                                @foreach($access_users as $access_user)
                                    <tbody>
                                    <tr>
                                        <td>{{$access_user->id}}</td>
                                        <td>{{$access_user->name}}</td>
                                        <td>{{date('d-m-Y', strtotime($access_user->birth_date))}}</td>
                                        <td>{{$access_user->barcode}}</td>
                                        {{--<td>{{date('d-m-Y', strtotime($access_user->start_date))}}</td>--}}
                                        {{--<td>{{date('d-m-Y', strtotime($access_user->end_date))}}</td>--}}
                                        <td>
                                            <div class="form--inline">
                                                <a class="btn btn-sm btn-primary"
                                                   href="{{route('access_user.edit',$access_user->id)}}"><i
                                                            class=" material-icons md-18"> edit </i></a>
                                            </div>
                                            <div class="form--inline">
                                                <form action="{{route('access_user.destroy',$access_user->id)}}"
                                                      method="post">
                                                    <input type="hidden" name="_method" value="delete">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <button type="submit" id="delete-{{$access_user->id}}"
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
                            <?php echo $access_users->render(); ?>
                        </div>
                    </div>
                </div>
                <div class="asm-card">
                    @foreach($access_users as $access_user)
                        <div class="panel panel-default ">
                            <div class="panel-body">
                                <div class="container-fluid">
                                    <div class="">
                                        <label class="">ID: </label>
                                        <label class="">{{$access_user->id}}</label>
                                    </div>
                                    <div class="">
                                        <label class="">Nome: </label>
                                        <label class="">{{$access_user->name}}</label>
                                    </div>
                                    <div class="">
                                        <label class="">Nascimento: </label>
                                        <label class="">{{date('d-m-Y', strtotime($access_user->birth_date))}}</label>
                                    </div>
                                    <div class="">
                                        <label class="">Código de Barras: </label>
                                        <label class="">{{$access_user->barcode}}</label>
                                    </div>
                                    {{--<div class="">--}}
                                        {{--<label class="">Dat. Ini.: </label>--}}
                                        {{--<label class="">{{date('d-m-Y', strtotime($access_user->start_date))}}</label>--}}
                                    {{--</div>--}}
                                    {{--<div class="">--}}
                                        {{--<label class="">Dat. Fin.: </label>--}}
                                        {{--<label class="">{{date('d-m-Y', strtotime($access_user->end_date))}}</label>--}}
                                    {{--</div>--}}
                                    <div class="">
                                        <div class="form-horizontal asm-inline">
                                            <a class="btn btn-sm btn-primary"
                                               href="{{route('access_user.edit',$access_user->id)}}"><i
                                                        class=" material-icons md-18"> edit </i></a>
                                        </div>
                                        <div class="form-horizontal asm-inline">
                                            <form action="{{route('access_user.destroy',$access_user->id)}}"
                                                  method="post">
                                                <input type="hidden" name="_method" value="delete">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <button type="submit" id="delete-{{$access_user->id}}"
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
                <?php echo $access_users->render(); ?>
            </div>
        </div>
    </div>
@stop