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

        //Tuve que hacer este condicional para solucionar un error :(
        if (!Schema::hasTable('taggables')) { 
            Schema::create('taggables', function (Blueprint $table) {
                //$table->id();
                $table->integer('tag_id');
                $table->integer('taggable_id');
                $table->string('taggable_type');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('taggles');
    }
};
