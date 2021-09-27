@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center h4">
                    Registrar Categoría
                </div>

                <div class="card-body">

                    @if(session()->has('msjerror'))
                    <div class="alert alert-danger text-center">{{ session('msjerror') }}</div>
                    @endif
                    @if(session()->has('msjok'))
                    <div class="alert alert-success text-center">
                        {{ session('msjok') }}
                        <a href="{{ url('/favorites/register') }}" class="btn-link">
                            Ver
                        </a>
                    </div>
                    @endif

                    <form method="post" action="{{ route('categories.index') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nombre</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Guardar
                                </button>
                                <a href="{{ url('/favorites/register') }}" class="btn btn-link">
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