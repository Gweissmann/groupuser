@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="text-align-vertical">
                            <i class=" material-icons md-36"> folder_shared </i>
                            <label class="text-padding">Criação de novo posto</label>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('station.store') }}">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                <label for="title" class="col-md-4 control-label">Título</label>
                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control" name="title"
                                           value="{{ old('title') }}" required autofocus>
                                    @if ($errors->has('title'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('line_id') ? ' has-error' : '' }}">
                                <label for="line_id" class="col-md-4 control-label">Linha</label>
                                <div class="col-md-6">
                                    <select class="form-control" id="line_id" name="line_id">
                                        <option>Escolha uma Linha</option>
                                        @foreach($lines as $line)
                                            <option value="{{$line->id}}">{{$line->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @if ($errors->has('line_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('line_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('critical') ? ' has-error' : '' }}">
                                <div class="form-check">
                                    <label class="col-md-4 control-label" for="critical">Crítico</label>
                                    <div class="col-md-6">
                                        <input class="checkbox" type="checkbox" id="critical" name="critical">
                                    </div>
                                </div>
                                @if ($errors->has('critical'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('critical') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('test') ? ' has-error' : '' }}">
                                <div class="form-check">
                                    <label class="col-md-4 control-label" for="test">Teste</label>
                                    <div class="col-md-6">
                                        <input class="checkbox" type="checkbox" id="test" name="test">
                                    </div>
                                </div>
                                @if ($errors->has('test'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('test') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Salvar
                                    </button>
                                    <a href="{{route('station.index')}}" class="btn btn-danger">
                                        Voltar
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop