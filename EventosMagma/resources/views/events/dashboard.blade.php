@extends('layots.main')

@section('title', 'Dashboard')

@section('content')

<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Meus eventos</h1>
</div>
<div class="col-md-10 offset-md-1 dashboard-events-container">
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

