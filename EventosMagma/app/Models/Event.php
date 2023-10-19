<?php

namespace App\Models;
//O model serve para buscar e manipular os dados do meu banco de dados, é muito importante criar o Model.

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
//Nessa parte eu tô dizendo pro Laravel que os dados da coluna items é um array e não um dado comum.

    protected $casts = [
        'items' => 'array'
    ];

}
