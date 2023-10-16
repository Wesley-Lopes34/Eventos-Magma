@extends('layots.main')

@section('title', 'Criar Evento')

@section('content')

<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Crie o seu evento</h1>
    <form action="/events" method="post">
        @csrf
    <div class="form-group">
        <label for="title">Evento: </label>
        <input type="text" class="form-control" id="title" name="title" placeholder="Nome do Evento">
    </div>
    <div class="form-group">
        <label for="title">Cidade: </label>
        <input type="text" class="form-control" id="city" name="city" placeholder="Cidade do Evento">
    </div>
    <div class="form-group">
        <label for="title">O evento é privado?</label>
        <select name="type" id="type" class="form-control">
            <option value="0">Não</option>
            <option value="1">Sim</option>
        </select>
    </div>
    <div class="form-group">
        <label for="title">Descrição: </label>
        <textarea name="description" id="description" class="form-control" placeholder="O que vai acontecer no evento?"></textarea>
        <input type="submit" class="btn btm-primary" value="Criar Evento">
    </div>
    </form>
</div>

@endsection