<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();

            //'unsigned' especifica que la columna solo debe almacenar enteros no negativos.
            //En otras palabras, asegura que la columna no puede almacenar valores negativos. 

            //'nullable' puede tener valores NULL. Esto significa que la columna es opcional 
            //y no requiere que se especifique un valor al insertar un nuevo registro. 
            $table->integer('user_id')->unsigned()->nullable()->index();
            $table->string('title');
            $table->text('body');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
