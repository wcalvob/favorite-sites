@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header text-center h4">
                    Registrar Sitio Favorito
                </div>

                <div class="card-body">

                    @if(session()->has('msj'))
                    <div class="alert alert-danger text-center">{{ session('msj') }}</div>
                    @endif
                    @if(session()->has('msjok'))
                    <div class="alert alert-success text-center">
                        {{ session('msjok') }}
                        <a href="{{ url('/home') }}" class="btn-link">
                            Ver
                        </a>
                    </div>
                    @endif

                    <form method="post" action="{{ route('favorites.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="url" class="col-md-4 col-form-label text-md-right">URL</label>

                            <div class="col-md-6">
                                <input id="url" type="text" class="form-control @error('url') is-invalid @enderror" name="url" value="{{ old('url') }}" required autocomplete="url" autofocus>

                                @error('url')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="titulo" class="col-md-4 col-form-label text-md-right">Título</label>

                            <div class="col-md-6">
                                <input id="titulo" type="text" class="form-control @error('titulo') is-invalid @enderror" name="title" value="{{ old('titulo') }}" required autocomplete="titulo" autofocus>

                                @error('titulo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">Descripción</label>

                            <div class="col-md-6">
                                <textarea id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required autocomplete="description" autofocus></textarea>

                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="category" class="col-md-4 col-form-label text-md-right">Categorías</label>

                            <div class="col-md-6">
                                @foreach($categories as $cat)
                                <div><input id="category" type="checkbox" class="" name="category_id[]" value="{{ $cat->id }}" autocomplete="category" autofocus> {{ $cat->name }} &nbsp;&nbsp;</div>
                                @endforeach
                                <div>
                                    <a href="{{ url('/categories/register') }}" class="btn btn-link">Agregar Categoría</a>
                                </div>
                            </div>

                        </div>

                        <div class="form-group row">
                            <label for="visibility" class="col-md-4 col-form-label text-md-right">Visibilidad</label>

                            <div class="col-md-6">
                                <input id="visibility" type="radio" class="" name="visibility" value="público" required autocomplete="visibility" autofocus> Público <br>
                                <input id="visibility" type="radio" class="" name="visibility" value="privado" required autocomplete="visibility" autofocus> Privado <br>
                            </div>

                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Guardar
                                </button>
                                <a href="{{ url('/home') }}" class="btn btn-link">
                                    Regresar
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection