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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            // custom
            $table->string('phone',100)->unique();
            $table->string('image')->nullable();
            $table->string('address',150)->nullable();
            $table->date('date_of_birth')->nullable();
            $table->enum('social_status',["single",
            "married",]);
            $table->enum('blood_type',[
                "A+","AB+","B","AB-","O-","O+"
            ]);
           $table->text('patient_diseases')->nullable();
           $table->text('patient_medicines')->nullable();
            
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
