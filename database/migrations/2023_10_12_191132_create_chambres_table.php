<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChambresTable extends Migration
{
    public function up()
    {
        Schema::create('chambres', function (Blueprint $table) {
            $table->id();
            $table->string('numbre')->unique();
            $table->enum('gender', ['homme', 'femme']);
            $table->integer('capacity')->default(4);
            $table->timestamps();
    
                  });
    }

    public function down()
    {
        Schema::dropIfExists('chambres');
    }
}