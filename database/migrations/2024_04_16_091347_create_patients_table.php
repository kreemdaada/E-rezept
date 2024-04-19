<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            #$table->string('name');
            $table->string('vorname');
            $table->string('email')->unique();
            $table->string('nachname');
            $table->date('geburtsdatum');
            $table->string('adresse');
            $table->string('versicherungsnummer');
            // Fremdschlüssel für die Beziehung zu den Rezepten
            $table->foreignId('prescription_id')->nullable()->constrained()->onDelete('set null');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('patients');
    }
}
