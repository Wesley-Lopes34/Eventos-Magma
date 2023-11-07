<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('events', function (Blueprint $table) {

//Aqui eu declaro que a parte user_id da tabela Events é uma chave estrangeira e depois usando "constrained" eu digo que ela vai ser usada em outras tabelas
           $table->foreignId('user_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('events', function (Blueprint $table) {

//Nessa parte eu estou atrelando todos os outros dados ao user_id e apago junto com esse dado, os outros tbm para que n fique um dado perdido respeitando a hereditariedade de dados ou coisa parecida¯\_(ツ)_/¯
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
        });
    }
}
