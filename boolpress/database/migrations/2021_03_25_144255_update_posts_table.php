<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            //1 metodo
            //$table->unsignedBigInteger('user_id')->nullable(); //creo la colonna
            //$table->foreign('user_id')->references('id')->on('users'); //creo la relazione

            //2 metodo
            $table->foreignId('user_id')->after('id')->nullable()->constrained(); //crea e relaziona
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropForeign(['user_id']); //rimuove la relazione
            $table->dropColumn('user_id'); //rimuove la colonna
        });
    }
}
