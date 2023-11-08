<?php
//O controler serve para manipular as paginas do meu projeto, aqui eu posso somente colocar parte que devem ser feita a logica de cada página.
namespace App\Http\Controllers;
//Essa parte é como se fosse a parte de imports, eu estou importando do Model a parte de eventos.
use Illuminate\Http\Request;
use App\Models\Event;
use League\CommonMark\Node\Block\Document;

class EventController extends Controller
{
    public function index(){

//Nessa parte é a lógica para a busca de eventos, se na minha pesquisar tiver uma palavra chave tal ou parecida, eu quero que mostre no meu Welcome esse evento.
        $search = request('search');

        if($search){
            $events = Event::where([
                ['title', 'like', '%'.$search.'%']
            ])->get();

        }
        else{

//Caso não encontre ou não seja feita nenhuma pesquisa, é para mostrar todos os eventos cadastrados.
            $events = Event::all();

        }

     
//Enviando para a parte o index do meu projeto todos os eventos da tabela Events.
      return view('welcome', ['events' => $events, 'search' => $search]);
      
    }

    public function create(){

        return view('events.create');

    }


    public function store(Request $request){

        $events = new Event;

//Nesa parte ta pegando os dados dos forms para colocar no banco de dados. 
        $events->title = $request->title;
        $events->date = $request->date;
        $events->city = $request->city;
        $events->description = $request->description;
        $events->type = $request->type;
        $events->image = $request->image;
        
        $valueCheckbox = $events->items = $request->items;

//nessa parte eu estou pegando a parte de OUTROS na criação de eventos e pegando a parte de mais itens de estrutura, aonde eu crio uma variavel para receber esses dados e coloco eles em um array, depois eu retiro as virgulas e a cada vrigula eu estabeleço um novo dado para o array e depois eu junto os dois arrays, o de que items que recebe os itens do checkbox e da parte de texto.
        $valueTextArea = $_POST['items_textarea'];

        $valueTextArea = explode(',', $valueTextArea);

        $arrayCombinado = array_merge($valueCheckbox, $valueTextArea);

        $events->items = $arrayCombinado;
       
//parte de envio de imagens, lógica.
        if($request->hasFile('image') && $request->file('image')->isValid() && !empty($request)){
            
            $requestImage = $request->image;
           
//Pegar a imagem.
            $extension = $requestImage->extension();

//Pegar nome da imagem.
            $imageName = md5($requestImage->getClientOriginalName() . strtotime('now')) . '.' . $extension;

            $requestImage->move(public_path('imgs/events'), $imageName);

            $events->image = $imageName;

        }else{
            $imageName = 'logo.png';

            $events->image = $imageName;
        }

//Parte de autenticação de usuario para online
        $user = auth()->user();
        $events->user_id = $user->id;

//Salva o evento no banco de dados
        $events->save();

//Parte para checar e mandar mensagem caso o evento tenha sido criado com sucesso e logo após mensagem de alerta caso não tenha dado certo.
        if($events){
            session_start();

            $_SESSION["message"] = " <script>  alert('Evento Criado com sucesso!! ')  </script>";

            return redirect('/');
        }
        else{
            session_start();

            $_SESSION["message"] = "Evento Não foi cadastrado :(";

            return redirect('/');
        }

    }

//Parte que chama a view do botão Saiba Mais, ele pega o id do evento no banco de dados e chama a view puxando as informações daquele evento da id especifica.
    public function show($id){

        $event = Event::findorFail($id);

//Nessa parte que acontece a checagem de que se a data do evento já tiver passado, ele te redirecione para a página principal, um verificação que pode evitar possiveis problemas
            $dataEvento = $event->date;

            $datenow = date('Y-m-d');

            if($datenow > $dataEvento){
                return redirect('/');
            }

        return view('events.show', ['event' => $event]);   
        
    }

    
}
  