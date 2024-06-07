@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">Cargar Archivo plano para procesar</div>
        <div class="card-body">
            <form action="/upload-csv" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="file_upload">Seleccione elarchivo</label>
                    <input type="file" class="form-control" required name="upload_csv" id="upload_csv">
                </div>
                <div class="form-group mt-3 text-center">
                    <button class="btn btn-success">Subir archivo</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection