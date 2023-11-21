@extends('layots.main')

@section('title', 'Dashboard')

@section('content')

<!--Nessa parte é a parte de Meus eventos da Navbar, aonde é possivel ver e modificar os eventos do usuario logado.-->

<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Meus eventos</h1>
</div>
<div class="col-md-10 offset-md-1 dashboard-events-container">

<!--Aqui é feita uma verificação para que se caso o usuario não tenha criado nenhum evento, apareça uma mensagem e um link que ó leva para a parte de criação de eventos.-->
    @if(count($events) > 0)
        <table class="table">
                <head>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Participantes</th>
                        <th scope="col">Ações</th>
                    </tr>
                </head>
            <tbody>
            
                @foreach($events as $event)
                
<!--Nessa parte eu estou atribuindo sempre a parte do index +1, para que o número de eventos nunca bugue ou que não dê um erro na contagem do número de eventos cadastrados pelo usuario. -->
                    <tr>
                        <td scope="row"> {{ $loop->index + 1 }} </td>
                        <td><a href="/events/{{ $event->id }}"> {{ $event->title }} </a></td>
                        <td>0</td>
                        <td><a href="#">Editar</a></td>
                        <td><a href="#">Deletar</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Você ainda não tem eventos, <a href="/events/create">Criar evento</a></p>
    @endif
</div>

@endsection

