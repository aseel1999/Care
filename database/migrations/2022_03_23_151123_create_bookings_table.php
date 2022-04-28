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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('time');
            $table->string('date');
            $table->foreignIdFor(\App\Models\Doctor::class,'doctor_id')->constrained()->onDelete('cascade');
            $table->foreignIdFor(\App\Models\User::class,'user_id')->constrained()->onDelete('cascade');
            $table->enum('status', ['accept', 'reject', 'waiting'])->default('waiting');
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
        Schema::dropIfExists('bookings');
    }
};
