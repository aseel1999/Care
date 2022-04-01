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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->text('details_of_patient');
            $table->text('teartment_details');
            $table->text('recommendation');
            $table->foreignIdFor(\App\Models\Doctor::class,'doctor_id')->constrained();
            $table->foreignIdFor(\App\Models\User::class,'user_id')->constrained();
            $table->foreignIdFor(\App\Models\Appoinment::class,'appoinment_id')->constrained();
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
        Schema::dropIfExists('reports');
    }
};
