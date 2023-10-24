@extends('layots.main')

@section('title', 'Criar Evento')

@section('content')

<!-- Essa é a parte de criação dos eventos, com forms para cada campo do evento -->

<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Crie o seu evento</h1>
    <form action="/events" method="post" enctype="multipart/form-data">
        @csrf
    <div class="form-group">
        <label for="title">Evento: </label>
        <input type="text" class="form-control" id="title" name="title" placeholder="Nome do Evento" required> 
    </div>
    <div class="form-group">
        <label for="title">Cidade: </label>
        <input type="text" class="form-control" id="city" name="city" placeholder="Cidade do Evento" required>
    </div>
    <div class="form-group">
        <label for="date">Data do evento: </label>
        <input type="date" class="form-control" id="date" name="date" required>
    </div>
    <div class="form-group">
        <label for="title">O evento é privado?</label>
        <select name="type" id="type" class="form-control" required>
            <option value="0">Não</option>
            <option value="1">Sim</option>
        </select>
    </div>
    <div class="form-group">
        <label for="image">Descrição: </label>
        <textarea name="description" id="description" class="form-control" placeholder="O que vai acontecer no evento?" required></textarea>
    </div>
    <div class="form-group">
        <label for="title">Adicione itens de infraestrutura: </label>
        <div class="form-group">
            <input type="checkbox" name="items[]" value="Cadeiras"> Cadeiras
        </div>
        <div class="form-group">
            <input type="checkbox" name="items[]" value="Palco"> Palco
        </div>
        <div class="form-group">
            <input type="checkbox" name="items[]" value="Mesas"> Mesas
        </div>
        <div class="form-group">
            <input type="checkbox" name="items[]" value="Comida"> Comida
        </div>
        <div class="form-group">
            <input type="checkbox" name="items[]" value="OpenBar"> OpenBar
        </div>
        <div class="form-group">
            <input type="checkbox" name="items[]" value="Brindes"> Brindes
        </div>
    </div>
        <div class="form-group">
            <label for="image">Imagem do Evento: </label>
                <input type="file" id="image" name="image" class="form-control-file">
        </div>
        <input type="submit" class="btn btn-primary" value="Criar Evento">
    </form>
</div>

@endsection