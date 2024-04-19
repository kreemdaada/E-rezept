<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInsuranceNumbersTable extends Migration
{
    public function up()
    {
        Schema::create('insurance_numbers', function (Blueprint $table) {
            $table->id();
            $table->string('insurance_number')->unique();
            $table->string('krankenkasse');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('insurance_numbers');
    }
}
