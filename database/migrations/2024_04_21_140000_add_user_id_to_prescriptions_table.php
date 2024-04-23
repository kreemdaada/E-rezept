<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToPrescriptionsTable extends Migration
{
    public function up()
    {
        Schema::table('prescriptions', function (Blueprint $table) {
            // Add the user_id column if it doesn't already exist
            if (!Schema::hasColumn('prescriptions', 'user_id')) {
                $table->unsignedBigInteger('user_id')->nullable()->after('id');  // Assuming you want it after the 'id' column
            }

            // Only attempt to add the foreign key if the column was just added or already exists
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('prescriptions', function (Blueprint $table) {
            // Drop the foreign key first
            $table->dropForeign(['user_id']);  // Adjust if your FK has a specific name

            // Then drop the column
            $table->dropColumn('user_id');
        });
    }
}
