@extends('layots.main')

@section('title', 'Editando: ' . $event->title)

@section('content')

<!-- Essa é a parte de edição dos eventos, com forms para cada campo do evento -->

<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Editando: {{ $event->title }}</h1>
    <form action="/update/{{ $event->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
    <div class="form-group">
        <label for="title">Evento: </label>
        <input type="text" class="form-control" id="title" name="title" placeholder="Nome do Evento" required value="{{ $event->title }}">
    </div>
    <div class="form-group">
        <label for="title">Cidade: </label>
        <input type="text" class="form-control" id="city" name="city" placeholder="Cidade do Evento" value="{{ $event->city }}">
    </div>
    <div class="form-group">
        <label for="date">Data do evento: </label>
        <input type="date" class="form-control" id="date" name="date" value="{{ $event->date->format('Y-m-d') }}">
    </div>
    <div class="form-group">
        <label for="title">O evento é privado?</label>
        <select name="type" id="type" class="form-control" required>
            <option value="0">Não</option>
            <option value="1" {{ $event->private == 1 ? "selected='selected'" : "" }}>Sim</option>
        </select>
    </div>
    <div class="form-group">
        <label for="image">Descrição: </label>
        <textarea name="description" id="description" class="form-control" placeholder="O que vai acontecer no evento?" required>{{ $event->description }}</textarea>
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
        <div class="form-group">

<!--Nessa parte de OUTROS, eu criei uma nova váriavel para receber os valores que forem digitados nessa parte e depois eu junto esses valores com o resto dos itens.-->
            <label for="imagem" id="outros">Outros: </label>
            <textarea type="text" class="form-control" name="items_textarea" placeholder="Outros" value=""></textarea>
            <div id="text-alert">
                <p>ATENÇÃO!! Caso deseje acressentar mais de um item, separe os mesmos por uma virgula(,), o site fará um reconhecimento e colocará os itens em formato de lista.</p>
            </div>
        </div>
    </div>
        <div class="form-group">
            <label for="image">Imagem do Evento: </label>
                <input type="file" id="image" name="image" class="form-control-file">
                <img src="/imgs/events/{{ $event->image }}" alt="{{ $event->title }}" class="img-preview">
        </div>
        <input type="submit" class="btn btn-primary" value="Editar Evento">
    </form>
</div>

@endsection