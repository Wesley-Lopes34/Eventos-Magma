@extends('layots.main')

@section('title', $event->title)

@section('content')

        <!--Essa é parte do botão saiba mais, aonde vai mostrar mais informações sobre o evento. -->
    <div class="col-md-10 offset-md-1">
        <div class="row">
            <div id="image-container" class="col-md-6">
                    <img src="/imgs/events/{{ $event->image }}" style="width: 100%;" class="img-fluid" alt="{{ $event->title }}">
                </div>
                <div id="infor-cotainer" class="col-md-6">
                    <h1>{{ $event->title }}</h1>
                    <p class="event-city"><ion-icon name="location-outline"></ion-icon> {{ $event->city }}</p>
                    <p class="events-participants"><ion-icon name="people-outline"></ion-icon>X participantes</p>
                    <p class="events-owner"><ion-icon name="star-outline"></ion-icon>Dono do Evento</p>
                    <a href="#" class="bnt btn-primary" id="event-submit">Confirmar Presença</a>
            </div>
            <div class="col-md-12" id="description-container">
                <h3>Sobre o Evento:</h3>
                    <p class="event-description">{{ $event->description }}</p>
            </div>
        </div>
    </div>

@endsection