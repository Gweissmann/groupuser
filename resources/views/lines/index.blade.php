@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="text-align-vertical">
                            <i class=" material-icons md-36">face</i>
                            <label class="text-padding">Cadastrar Nova Linha</label>
                        </div>
                        <div class="btn-padding">
                            <a class="btn btn-sm btn-primary" href="{{route('line.create')}}">Adicionar</a>
                            <a class="btn btn-sm btn-danger" href="{{route('home')}}">Voltar</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default  asm-table">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th></th>
                                </tr>
                                </thead>
                                @foreach($lines as $line)
                                    <tbody>
                                    <tr>
                                        <td>{{$line->id}}</td>
                                        <td>{{$line->title}}</td>
                                        <td>
                                            <div class="form--inline">
                                                <a class="btn btn-sm btn-primary"
                                                   href="{{route('line.edit',$line->id)}}"><i
                                                            class=" material-icons md-18"> edit </i></a>
                                            </div>
                                            <div class="form--inline">
                                                <form action="{{route('line.destroy',$line->id)}}" method="post">
                                                    <input type="hidden" name="_method" value="delete">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <button type="submit" id="delete-{{$line->id}}"
                                                            class="btn btn-sm btn-danger"
                                                            onclick="return confirm('Tem certeza que deseja excluir este registro?');"
                                                            name="name" value="delete"><i class="material-icons md-18">delete</i>
                                                    </button>
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
                    @foreach($lines as $line)
                        <div class="panel panel-default">
                            <div class="panel-body ">
                                <div class="container-fluid">
                                    <div class="">
                                        <label class="">ID: </label>
                                        <label class="">{{$line->id}}</label>
                                    </div>
                                    <div class="">
                                        <label class="">Nome: </label>
                                        <label class="">{{$line->title}}</label>
                                    </div>
                                    <div class="">
                                        <div class="form-horizontal asm-inline">
                                            <a class="btn btn-sm btn-primary"
                                               href="{{route('line.edit',$line->id)}}"><i
                                                        class=" material-icons md-18"> edit </i></a>
                                        </div>
                                        <div class="form-horizontal asm-inline">
                                            <form action="{{route('line.destroy',$line->id)}}" method="post">
                                                <input type="hidden" name="_method" value="delete">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <button type="submit" id="delete-{{$line->id}}"
                                                        class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Tem certeza que deseja excluir este registro?');"
                                                        name="name" value="delete"><i
                                                            class="material-icons md-18">delete</i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <?php echo $lines->render(); ?>
            </div>
        </div>
    </div>
@stop