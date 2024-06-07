@extends('layouts.app')

@section('content')
@if(Session::get('response'))
<div class="container">
    <div class="alert alert-primary" role="alert">
        {{ Session::get('response') }}
    </div>
</div>
@endif
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Qué desea hacer?</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header text-center">Subir Archivo </div>
                        <div class="card-body text-center">
                            <a href="/upload-csv" class="btn btn-info">ir</a>
                        </div>
                    </div>

                </div>
                <div class="col">
                    <div class="card text-center">
                        <div class="card-header">Visualzar mapa</div>
                        <div class="card-body">
                            <a href="/map-generate" class="btn btn-success">Ver Mapa</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection