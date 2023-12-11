<?php

namespace App\Models;

//O model serve para buscar e manipular os dados do meu banco de dados, é muito importante criar o Model.
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

//Nessa parte eu tô dizendo pro Laravel que os dados da coluna items é um array e não um dado comum.
    protected $casts = [
        'items' => 'array'
    ];

    protected $dates = ['date'];


//Estou dizendo que os dados podem ser atualizados, ele me permite atualizar tudo, caso eu colocasse algum dado ai ele só permitiria atualizar aquele dado.
    protected $guarded = [];

//Função que diz que um usuario sempre vai pertencer a um usuario, por assim dizer
    public function user(){

        return $this->belongsTo('App\Models\User');
    }

}
