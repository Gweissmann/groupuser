@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="text-align-vertical">
                            <i class=" material-icons md-36">face</i>
                            <label class="text-padding">Cadastrar Novo Usuário de Acesso</label>
                        </div>
                        <div class="btn-padding">
                            <a class="btn btn-sm btn-primary" href="{{route('register')}}">Adicionar</a>
                            <a class="btn btn-sm btn-danger" href="{{route('home')}}">Voltar</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default asm-table">
                    <div class="panel-body ">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Email</th>
                                    <th></th>
                                </tr>
                                </thead>
                                @foreach($users as $user)
                                    <tbody>
                                    <tr>
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>
                                            <div class="form--inline">
                                                <a class="btn btn-sm btn-primary"
                                                   href="{{route('users.edit',$user->id)}}"><i
                                                            class=" material-icons md-18"> edit </i></a>
                                            </div>
                                            <div class="form--inline">
                                                <form action="{{route('users.destroy',$user->id)}}" method="post">
                                                    <input type="hidden" name="_method" value="delete">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <button type="submit" id="delete-{{$user->id}}"
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
                    @foreach($users as $user)
                        <div class="panel panel-default">
                            <div class="panel-body ">
                                <div class="container-fluid">
                                    <div class="">
                                        <label class="">ID: </label>
                                        <label class="">{{$user->id}}</label>
                                    </div>
                                    <div class="">
                                        <label class="">Nome: </label>
                                        <label class="">{{$user->name}}</label>
                                    </div>
                                    <div class="">
                                        <label class="">Email: </label>
                                        <label class="">{{$user->email}}</label>
                                    </div>
                                    <div class="">
                                        <div class="form-horizontal asm-inline">
                                            <a class="btn btn-sm btn-primary"
                                               href="{{route('users.edit',$user->id)}}"><i
                                                        class=" material-icons md-18"> edit </i></a>
                                        </div>
                                        <div class="form-horizontal asm-inline">
                                            <form action="{{route('users.destroy',$user->id)}}" method="post">
                                                <input type="hidden" name="_method" value="delete">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <button type="submit" id="delete-{{$user->id}}"
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
                <?php echo $users->render(); ?>
            </div>
        </div>
    </div>
@stop