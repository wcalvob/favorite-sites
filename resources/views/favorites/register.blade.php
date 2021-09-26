@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registro') }}</div>

                <div class="card-body">
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
                            <label for="titulo" class="col-md-4 col-form-label text-md-right">Categorías</label>

                            <div class="col-md-6">
                                @foreach($categories as $cat)
                                <div><input id="titulo" type="checkbox" class="" name="category_id[]" value="{{ $cat->id }}" autocomplete="titulo" autofocus> {{ $cat->name }} &nbsp;&nbsp;</div>
                                @endforeach
                            </div>

                        </div>

                        <div class="form-group row">
                            <label for="titulo" class="col-md-4 col-form-label text-md-right">Visibilidad</label>

                            <div class="col-md-6">
                                <input id="titulo" type="radio" class="" name="visibility" value="publico" required autocomplete="titulo" autofocus> Público <br>
                                <input id="titulo" type="radio" class="" name="visibility" value="privado" required autocomplete="titulo" autofocus> Privado <br>
                            </div>

                        </div>





                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Guardar
                                </button>
                                <a href="{{ url('/home') }}" class="btn btn-link">
                                    Cancelar
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