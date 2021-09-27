@extends('layouts.app')

@section('content')

@guest
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center h4">
                    Sitios Favoritos Públicos
                </div>

                <div class="card-body">
                    @foreach($sites as $site)
                    <p>Titulo: <b>{{ $site->title }}</b></p>
                    <p>Url: <a href="{{ $site->url }}" target="_blank">{{ $site->url }}</a></p>
                    <p>Descripción: <b>{{ $site->description }}</b></p>
                    <p>Categorias:
                        @foreach($associated_categories as $associated_category)

                        @if($site->id == $associated_category->site_id)
                        <span class="pr-1 pl-1 mb-2 ml-1 bg-secondary text-white">{{ $associated_category->name }}</span>
                        @endif

                        @endforeach
                    </p>
                    <hr>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</div>
@else
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="{{ url('/favorites/register') }}" class="btn btn-primary float-right">Registrar Sitio Favorito</a><br><br>
            <div class="card">
                <div class="card-header text-center h4">
                    Mis Sitios Favoritos
                </div>

                <div class="card-body">
                    @foreach($sites as $site)
                    <p>Titulo: <b>{{ $site->title }} </b><span class="text-secondary">({{ $site->visibility }})</span></p>
                    <p>Url: <a href="{{ $site->url }}" target="_blank">{{ $site->url }}</a></p>
                    <p>Descripción: <b>{{ $site->description }}</b></p>
                    <p>Categorias:
                        @foreach($associated_categories as $associated_category)

                        @if($site->id == $associated_category->site_id)
                        <span class="pr-1 pl-1 mb-2 ml-1 bg-secondary text-white">{{ $associated_category->name }}</span>
                        @endif

                        @endforeach
                    </p>

                    <form action="{{ route('sites.destroy', $site->id) }}" method="POST">
                        @csrf @method('DELETE')
                        <a href="" class="btn btn-primary pt-0 pb-0">Editar</a>
                        <button class="btn btn-danger pt-0 pb-0">Eliminar</button>
                    </form>
                    <hr>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</div>
@endguest


@endsection