<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDoctorIdToPrescriptions extends Migration
{
    public function up()
    {
        Schema::table('prescriptions', function (Blueprint $table) {
            $table->unsignedBigInteger('doctor_id')->nullable(); // Use nullable if a prescription might not always have a doctor.
            $table->foreign('doctor_id')->references('id')->on('users')->onDelete('set null'); // Adjust depending on your business logic.
        });
    }

    public function down()
    {
        Schema::table('prescriptions', function (Blueprint $table) {
            $table->dropForeign(['doctor_id']);
            $table->dropColumn('doctor_id');
        });
    }
}
