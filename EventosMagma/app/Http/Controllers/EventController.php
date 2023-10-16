<?php
//O controler serve para manipular as paginas do meu projeto, aqui eu posso somente colocar parte que devem ser feita a logica de cada página.
namespace App\Http\Controllers;
//Essa parte é como se fosse a parte de imports, eu estou importando do Model a parte de eventos.
use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function index(){
//Trazendo os eventos para o Controller.
      $events = Event::all();
//Enviando para a parte o index do meu projeto todos os eventos da tabela Events.
      return view('welcome', ['events' => $events]);

    }

    public function create(){

        return view('events.create');

    }

    public function store(Request $request){

        $events = new Event;

        $events->title = $request->title;
        $events->city = $request->city;
        $events->description = $request->description;
        $events->type = $request->type;

        $events->save();

        return redirect('/');

    }


}