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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('doctor_name');
            $table->string('doctor_phone');
            $table->string('auth_code')->nullable();
            $table->string('doctor_email');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('doctor_password');
            $table->string('image_path')->nullable();
            $table->enum('doctor_gender',[
                'male','female'
            ]);
            $table->unsignedInteger('doctor_experience');
            $table->double('booking_price')->nullable();
            $table->text('doctor_qualifications');
            $table->text('doctor_certificates');
            $table->string('clinic_location');
            $table->string('clinic_phone');
            $table->string('clinic_name');
            $table->foreignIdFor(\App\Models\Specialtie::class,'specialty_id')->constrained()->casecade()->nullable();
           
            //$table->foreign('specialty_id')->references('id')->on('specialties')->onDelete('cascade');
            $table->timestamps();
            $table->enum('status',[
                'add','cancel'
            ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctors');
    }
};
