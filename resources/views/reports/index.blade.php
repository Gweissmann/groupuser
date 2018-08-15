@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="text-align-vertical">
                            <i class=" material-icons md-36"> assignment </i>
                            <label class="text-padding">Relatório</label>
                        </div>
                        <div class="btn-padding">
                            <a class="btn btn-sm btn-danger" href="{{route('home')}}">Voltar</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <form class="form-horizontal" method="GET" action="{{ route('reports.search') }}">
                                {{ csrf_field() }}
                                <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
                                    <label for="start_date" class="col-md-4 control-label">De</label>
                                    <div class="col-md-6">
                                        <div class="input-append" data-date-format="dd-mm-yyyy" data-date-locale="pt-BR">
                                            <input class="form-control datepicker" type="text" name="start_date" value="{{ old('start_date_station') }}" autocomplete="off">
                                            <span class="add-on"><i class="icon-th"></i></span>
                                            @if ($errors->has('start_date'))
                                                <span class="help-block">
                                                 <strong>{{ $errors->first('start_date') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <label for="end_date" class="col-md-4 control-label">Até</label>
                                    <div class="col-md-6">
                                        <div class="input-append" data-date-format="dd-mm-yyyy" data-date-locale="pt-BR">
                                            <input class="form-control datepicker" type="text" name="end_date" value="{{ old('start_date_station') }}" autocomplete="off">
                                            <span class="add-on"><i class="icon-th"></i></span>
                                            @if ($errors->has('end_date'))
                                                <span class="help-block">
                                                 <strong>{{ $errors->first('end_date') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            Buscar
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop