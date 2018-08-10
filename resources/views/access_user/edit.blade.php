@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="text-align-vertical">
                            <i class=" material-icons md-36"> account_box </i>
                            <label class="text-padding">Edição de usuário</label>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('access_user.update', $data->id) }}">
                            {{ csrf_field() }}
                            <input name="_method" type="hidden" value="PATCH">

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Nome</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ $data->name }}" required autofocus>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('birth_date') ? ' has-error' : '' }}">
                                <label for="birth_date" class="col-md-4 control-label">Data de Nascimento</label>
                                <div class="col-md-6">
                                    <div class="input-append" data-date-format="dd-mm-yyyy">
                                        <input class="form-control datepicker" type="text" name="birth_date" value="{{ $data->birth_date }}" autocomplete="off">
                                        <span class="add-on"><i class="icon-th"></i></span>
                                        @if ($errors->has('birth_date'))
                                            <span class="help-block">
                                                 <strong>{{ $errors->first('birth_date') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('barcode') ? ' has-error' : '' }}">
                                <label for="barcode" class="col-md-4 control-label">Código de Barras</label>
                                <div class="col-md-6">
                                    <input id="barcode" type="text" class="form-control" name="barcode" value="{{ $data->barcode }}" required>
                                    @if ($errors->has('barcode'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('barcode') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            {{--<div class="form-group{{ $errors->has('end_date') ? ' has-error' : '' }}">--}}
                                {{--<label for="start_date" class="col-md-4 control-label">Válido de</label>--}}
                                {{--<div class="col-md-6">--}}
                                    {{--<div class="input-append" data-date-format="dd-mm-yyyy">--}}
                                        {{--<input class="form-control datepicker" type="text" name="start_date" value="{{ $data->start_date }}" autocomplete="off">--}}
                                        {{--<span class="add-on"><i class="icon-th"></i></span>--}}
                                        {{--@if ($errors->has('start_date'))--}}
                                            {{--<span class="help-block">--}}
                                                 {{--<strong>{{ $errors->first('start_date') }}</strong>--}}
                                            {{--</span>--}}
                                        {{--@endif--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="form-group{{ $errors->has('end_date') ? ' has-error' : '' }}">--}}
                                {{--<label for="start_date" class="col-md-4 control-label">Até</label>--}}
                                {{--<div class="col-md-6">--}}
                                    {{--<div class="input-append" data-date-format="dd-mm-yyyy">--}}
                                        {{--<input class="form-control datepicker" type="text" name="end_date" value="{{ $data->end_date }}" autocomplete="off">--}}
                                        {{--<span class="add-on"><i class="icon-th"></i></span>--}}
                                        {{--@if ($errors->has('end_date'))--}}
                                            {{--<span class="help-block">--}}
                                                 {{--<strong>{{ $errors->first('end_date') }}</strong>--}}
                                            {{--</span>--}}
                                        {{--@endif--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Salvar
                                    </button>
                                    <a href="{{route('access_user.index')}}" class="btn btn-danger">
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