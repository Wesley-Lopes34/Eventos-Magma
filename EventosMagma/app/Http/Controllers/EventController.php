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
//Parte de checagem, para ver se não tem nada vazio dentro dos forms.

        if($request->title == "" || $request->city == "" || $request->description == "" || $request->type == ""){
            session_start();

            $_SESSION["message"] = " <script>  alert('Você esqueceu de preencher algum campo, tente novamente!')  </script>";

            return redirect('/');

        }
//Nesa parte ta pegando os dados dos forms para colocar no banco de dados.
        
        $events->title = $request->title;
        $events->city = $request->city;
        $events->description = $request->description;
        $events->type = $request->type;
        $events->image = $request->image;

//parte de envio de imagens, lógica.

        if($request->hasFile('image') && $request->file('image')->isValid()){
            
            
            $requestImage = $request->image;
           
//Pegar a imagem.
            $extension = $requestImage->extension();
//Pegar nome da imagem.
            $imageName = md5($requestImage->getClientOriginalName() . strtotime('now')) . '.' . $extension;

            $requestImage->move(public_path('imgs/events'), $imageName);

            $events->image = $imageName;

        }
        
        $events->save();

//parte para checar e mandar mensagem caso o evento tenha sido criado com sucesso e logo após mensagem de alerta caso n tenha dado certo.
        if($events){
            session_start();

            $_SESSION["message"] = " <script>  alert('Evento Criado com sucesso: ')  </script>";

            return redirect('/');
        }
        else{
            session_start();

            $_SESSION["message"] = "Evento Não foi cadastrado :(";

            return redirect('/');
        }

        

    }


    public function show($id){

        $event = Event::findorFail($id);

        return view('events.show', ['event' => $event]);


    }
}
  