@extends('layots.main')

@section('title', 'Eventos Magma')

@section('content')
<link rel="stylesheet" href="/css/styles.css">


    <div id="search-container" class="col-md-12">
        <h1>Busque um evento</h1>
        <form action="">
            <input type="" id="serach" name="search" class="form-control" placeholder="Procurar">
        </form>
    </div>
    <div id="events-container" class="col-md-12">
        <h2>Próximos eventos</h2>
        <p class="subtitle">Eventos dos próximos dias</p>
        <div id="cards-container" class="row">
            @foreach($events as $event)
                <div class="card col-md-3">
                    <img src="/imgs/logo.png" alt="{{$event->title;}}">
                    <div class="card-body">
                        <p class="card-date">10/20/20</p>
                        <h5 class="card-title">{{ $event->title }}</h5>
                        <p class="card-participants">x pessoas</p>
                        <a href="#" class="btn btn-primary">Saber Mais</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection