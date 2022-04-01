<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_patient_doctor', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Doctor::class,'doctor_id')->constrained()->onDelete('cascade');
            $table->foreignIdFor(\App\Models\User::class,'user_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('table_patient_doctor');
    }
};
