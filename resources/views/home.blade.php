@extends('layouts.app')

@section('content')

@guest
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Sitios Favoritos Públicos') }}</div>

                <div class="card-body">
                    @foreach($sites as $site)
                    <p>Titulo: {{ $site->title }}</p>
                    <p>Url: {{ $site->url }}</p><br>
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
            <div class="card">
                <div class="card-header">
                    {{ __('Mis Sitios Favoritos') }}
                    <a href="{{ route('favorites') }}">Nuevo Favorito</a>
                </div>

                <div class="card-body">
                    @foreach($sites as $site)
                    <p>Titulo: {{ $site->title }}</p>
                    <p>Url: {{ $site->url }}</p>
                    <p>Categorias: 
                        @foreach($sites_categories as $sit_cat)
                            
                            @if($site->id == $sit_cat->site_id)
                            {{ $sit_cat->name }}
                            @endif
                                              
                        @endforeach
                    </p><br>
                    @endforeach
                </div>
                
            </div>
        </div>
    </div>
</div>
@endguest


@endsection
