@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        Bem Vindo!
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="col-md-3 text-center">
                            <a class="link-no-style" href="{{route('line.index')}}">
                                <div>
                                    <i class="material-icons md-48"> folder_open </i>
                                </div>
                                <label>Linhas</label>
                            </a>
                        </div>
                        <div class="col-md-3 text-center">
                            <a class="link-no-style" href="{{route('station.index')}}">
                                <div>
                                    <i class="material-icons md-48"> folder_shared </i>
                                </div>
                                <label>Postos</label>
                            </a>
                        </div>
                        <div class="col-md-3 text-center">
                            <a class="link-no-style" href="{{route('access_user.index')}}">
                                <div>
                                    <i class="material-icons md-48"> account_box </i>
                                </div>
                                <label>Usuários</label>
                            </a>
                        </div>
                        <div class="col-md-3 text-center">
                            <a class="link-no-style" href="{{route('reports.index')}}">
                                <div>
                                    <i class="material-icons md-48"> assignment </i>
                                </div>
                                <label>Relátorio</label>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
