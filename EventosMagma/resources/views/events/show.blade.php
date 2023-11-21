@extends('layots.main')

@section('title', $event->title)

@section('content')

<!--Essa é parte do botão saiba mais, aonde vai mostrar mais informações sobre o evento. -->
    <div class="col-md-10 offset-md-1">
        <div class="row">
            
            <div id="image-container" class="col-md-6">
                <img src="/imgs/events/{{ $event->image }}" style="width: 100%;" class="img-fluid" alt="{{ $event->title }}">
            </div>
                
<!--Nessa parte eu estou pegando os dados das váriaveis e passando eles para os respectivos campos que é para esses dados aparecerem-->
                <div id="infor-container" class="col-md-6">
                    <h1>{{ $event->title }}</h1>
                    <p class="event-city"><ion-icon name="location-outline"></ion-icon> {{ $event->city }}</p>
                    <p class="events-participants"><ion-icon name="people-outline"></ion-icon>X participantes</p>
                    <p class="events-owner"><ion-icon name="star-outline"></ion-icon> {{ $eventOwner['name'] }}</p>
                    <a href="#" class="btn btn-primary" id="event-submit">Confirmar Presença</a>
                    <h3>O evento conta com:</h3>

<!--  Essa parte exibe a lista de infraestrutura do evento e logo após temos uma verificação para caso não tenha nenhum item selecionado, exiba uma mensagem. -->
                <?php 
                    if(!empty($event->items)){
                ?>
                    <ul id="items-list">
                        @foreach($event->items as $item)
                            <li><ion-icon name="play-outline"></ion-icon><span> {{ $item }} </span></li>
                        @endforeach
                    </ul>

                    <?php 
                        }else{
                            echo "O evento não possui infraestrutura solicitada!";
                        }                 
                    ?>
            </div>
            <div class="col-md-12" id="description-container">
                <h3 style="margin-top: 5px;">Sobre o Evento:</h3>
                    <p class="event-description">{{ $event->description }}</p>
            </div>
       
        </div>
    </div>

@endsection