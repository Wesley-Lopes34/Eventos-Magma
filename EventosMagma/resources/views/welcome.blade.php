@extends('layots.main')

@section('title', 'Eventos Magma')

@section('content')
        <!--Essa parte é o index da página-->
<link rel="stylesheet" href="/css/styles.css">

        <!--Parte da lógica que chama a mensagem de que o evento foi criado com sucesso-->

    <div id="search-container" class="col-md-12">
        <h1>Busque um evento</h1>
        <form action="">
            <input type="" id="serach" name="search" class="form-control" placeholder="Procurar">
        </form>
    </div>
    <div id="events-container" class="col-md-12">
        <h2>Próximos eventos</h2>
        <p class="subtitle">Eventos dos próximos dias</p>
 
        <?php 
            if(!empty($events->$event)){
            
            ?>
                <div id="cards-container" class="row">
                    @foreach($events as $event)
                        <div class="card col-md-3">
                            <img src="/imgs/events/{{ $event->image  }}" alt="{{ $event->title; }}">
                            <div class="card-body">
                                <p class="card-date">10/20/20</p>
                                <h5 class="card-title">{{ $event->title }}</h5>
                                <p class="card-participants">x pessoas</p>
                                <a href="/events/{{ $event->id }}" class="btn btn-primary">Saber Mais</a>
                            </div>
                        </div>
                    @endforeach
                        <?php  
                            }else{
                                echo "abacaxi";
                            }
                        ?>
                        

        
                        


        </div>
    </div>
        <!-- Chama a mensagem para dizer se deu certo ou não a criação de um evento. -->

    <?php
    session_start();
    if(isset($_SESSION['message'])){
        echo $_SESSION['message'];

        unset ($_SESSION['message']);
    }
?>

@endsection