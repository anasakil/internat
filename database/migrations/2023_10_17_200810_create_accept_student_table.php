<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcceptStudentTable extends Migration
{
    public function up()
{
    Schema::create('accept_student', function (Blueprint $table) {
        $table->id();
        $table->string('nom')->nullable();
        $table->string('prenom')->nullable();
        $table->string('cne')->nullable();
        $table->unsignedBigInteger('chambre_id')->nullable();
        $table->timestamps();

        // Add foreign key constraint
        $table->foreign('chambre_id')->references('id')->on('chambres')->onDelete('set null');
    });
}

    public function down()
    {
        Schema::dropIfExists('accept_student');
    }
}
