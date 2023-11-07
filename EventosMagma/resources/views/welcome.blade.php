@extends('layots.main')

@section('title', 'Eventos Magma')

@section('content')
<!--Essa parte é o index da página-->
    <link rel="stylesheet" href="/css/styles.css">

<!--Parte da lógica que chama a mensagem de que o evento foi criado com sucesso-->

    <div id="search-container" class="col-md-12">
        <h1>Busque um evento</h1>
        <form action="/" method="get">
            <input type="" id="serach" name="search" class="form-control" placeholder="Procurar">
        </form>
    </div>

<!-- Essa é uma verificação de busca, é só pra mudar a estetica do site pra caso seja feita uma busca.  -->
    <div id="events-container" class="col-md-12">
        @if($search)
            <h2>Mostrando resultados da busca: {{ $search }}</h2>
            <p><a href="/">Ver todos!!</a></p>
        @else
            <h2>Próximos eventos</h2>
            <p class="subtitle">Eventos dos próximos dias:</p>
        @endif

                <div id="cards-container" class="row">

<!-- Essa parte faz uma pesquisa da tabela Events e caso tenha algo, exiba as informações desse Evento. -->    
                @foreach($events as $event)
                    <div class="card col-md-4">
                        <img src="/imgs/events/{{ $event->image  }}" alt="{{ $event->title; }}">
                        <div class="card-body">
                                <p class="card-date">{{ date('d/m/y', strtotime($event->date)) }}</p>
                                    <h5 class="card-title">{{ $event->title }}</h5>
                                <p class="card-participants">x pessoas</p>

<!--Nessa parte eu estou fazendo uma verificação para que caso a data de um evento já tenha passado, ele fique inacessivel-->
                    <?php 

                        $datenow = date('Y-m-d');
                        if($datenow > $event->date){

                    ?>

                        <button class="btn btn-danger">A data do Eveto já passou, não é mais possivel participar do mesmo!!</button>
                               
                    <?php 

                        }else{
     
                    ?>
         
                        <a href="/events/{{ $event->id }}" class="btn btn-primary">Saber Mais</a>

                    <?php 

                        }
                    ?>

                        </div>    
                    </div>
                    
                 @endforeach
    
<!-- Essa parte é uma verificação para caso não tenha nenhum evento criado apareça uma mensagem, coisa pequena mas que eu demorei tanto tempo pra fazer que quando consegui eu escutei a musica "We Are the Champion" o resto do dia inteiro. -->
            @if(count ($events) == 0 && $search)
                <p>Não foi possivel encontrar nenhum evento com: {{ $search }}!</p>   
            @elseif( count ($events) == 0)
                <p>Não tem nenhum evento cadastrado!!</p>
            @endif            
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