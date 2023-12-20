<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtudiantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etudiants', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->integer('age');
            $table->string('adresse');
            $table->string('email');
            $table->string('telephone');
            $table->string('sexe');
            $table->date('date_naissance');
            $table->string('ville');
            $table->string('metier_de_mere');
            $table->string('metier_de_pere');
            $table->string('bulletin_de_salaire');
            $table->string('cne');
            $table->string('cni');
            $table->string('filiere_ensam');
            $table->string('niveau_ancienne');
            $table->string('etablissement_ancienne');
            $table->timestamps();
        });
        
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('etudiants');
    }
}
